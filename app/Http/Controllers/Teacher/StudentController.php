<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Cls;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Student;
use Stripe\StripeClient;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Teacher\StoreStudentRequest;
use App\Http\Requests\Teacher\UpdateStudentRequest;

class StudentController extends Controller
{
    public function index(): Response
    {
        $user = Auth()->user();

        $students = Student::all();

        if (!$user->hasPermissionTo('view_class', 'web')) {
            return response('unauthorize');
        }

        return Inertia::render('Teacher/Students/Index', [
            'students' => $students,
        ]);
    }

    public function create()
    {
        $user = Auth()->user();
        if (!$user->hasPermissionTo('create_student', 'web')) {
            return response('unauthorize');
        }

        return Inertia::render('Teacher/Students/Create');
    }

    public function store(StoreStudentRequest $request)
    {
        $user = Auth()->user();

        if (!$user->hasPermissionTo('create_student', 'web')) {
            return response()->json(['msg' => 'unauthorize']);
        }

        $user = User::create([
            'name' => $request['student_name'],
            'email' => $request['email'],
            'password' => '',
        ]);

        $student = Student::create([
            'student_code' => 'TES-ID' . rand(10, 999),
            'student_name' => $request['student_name'],
            'age' => $request['age'],
            'gender' => $request['gender'],
            'phone_number' => $request['phone_number'],
            'email' => $request['email'],
            'address' => $request['address'],
            'user_id' => 3,

        ]);

        $data = [
            'name' => $request['student_name'],
            'email' => $request['email'],
            'phone' => $request['phone_number'],

            /* 'address' => [
                'city' => 'Hyderabad',
                'country' => 'India',
                'line1' => '',
                'line2' => '',
                'postal_code' => '500081',
                'state' => 'Telangana',
            ], */

        ];

        // $stripe = new StripeClient('sk_test_51Nx2rlSDf7lhISGogCwnmQdgUp4HSWqK570aGWjkGzpoJqC4LNkkKQ08C32321wfmrGmAC7dxTms9jQwPrc5LHjb00pc0ylf6L');
        // $response = $stripe->customers->create($data);

        $url = 'https://api.stripe.com/v1/customers';
        $token = env('STRIPE_SECRET_KEY');

        $response = Http::asForm()->withToken($token)
            ->post($url, $data)
            ->json();

        logger($response);

        // $response_decode = json_decode($response);
        // logger($response_decode);
        // $student->update([
        //     'stripe_customer_id' => $response['id'],
        // ]);
        
        Student::where('id', $student->id)->update(['stripe_customer_id' => $response['id']]);

        return redirect()->route('teacher.students.index')
            ->withStatus('Student created successfully.');
    }

    public function edit(Student $student): Response
    {
        $user = Auth()->user();
        if (!$user->hasPermissionTo('update_student', 'web')) {
            return response('Unauthorize');
        }

        return Inertia::render('Teacher/Students/Edit', [
            'student'    => $student,
        ]);
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $user = Auth()->user();

        if (!$user->hasPermissionTo('update_student', 'web')) {
            return response('Unauthorized');
        }

        $validated = $request->validated();

        $student->update($validated);

        return redirect()->route('teacher.students.index')
            ->with('status', 'Student updated successfully.');
    }

    public function destroy(Student $student): RedirectResponse
    {
        $user = Auth()->user();

        if (!$user->hasPermissionTo('delete_student', 'web')) {
            return response('Unauthorized');
        }

        $student->delete();

        return redirect()->route('teacher.students.index')
            ->withStatus('Student deleted successfully.');
    }

    public function show(STudent $student): Response
    {
        return Inertia::render('Teacher/Students/Index', [
            'student' => $student,
        ]);
    }
}
