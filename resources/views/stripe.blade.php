{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stripe payment gateway</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h1 class="text-center mb-5 mt-5">Student Payment Gateway</h1>

        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
        @endif


        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width:18rem;">
                    <img src="https://dummyimage.com/300x200/000/fff" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Term 1</h5>
                        <p class="card-text">
                            To Make The PAYMENT Of Your Due Amount With Your DEBIT or CREDIT Card Click On The "PAYMENT
                            BUTTON" Which Is Present Below.
                        </p>
                        <a href="{{ route('stripe.checkout', ['price' => 3000, 'product' => 'Term 1']) }}">
                            <button type="button" class="btn btn-primary">
                                Make Payment
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width:18rem;">
                    <img src="https://dummyimage.com/300x200/000/fff" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Term 2</h5>
                        <p class="card-text">
                            To Make The PAYMENT Of Your Due Amount With Your DEBIT or CREDIT Card Click On The "PAYMENT
                            BUTTON" Which Is Present Below.
                        </p>
                        <a href="{{ route('stripe.checkout', ['price' => 8000, 'product' => 'Term 2']) }}">
                            <button type="button" class="btn btn-primary">
                                Make Payment
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width:18rem;">
                    <img src="https://dummyimage.com/300x200/000/fff" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Term 3</h5>
                        <p class="card-text">
                            To Make The PAYMENT Of Your Due Amount With Your DEBIT or CREDIT Card Click On The "PAYMENT
                            BUTTON" Which Is Present Below.
                        </p>
                        <a href="{{ route('stripe.checkout', ['price' => 10000, 'product' => 'Term 3']) }}">
                            <button type="button" class="btn btn-primary">
                                Make Payment
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html> --}}


{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stripe Payment Gateway</title>
    <!-- Include Tailwind CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container flex flex-col mx-auto p-6">

        <h1 class="text-3xl text-center font-serif mb-8 mt-16">Student Fee Details</h1>

        @if (Session::has('success'))
            <div class="bg-green-200 text-green-700 border border-green-400 px-4 py-2 rounded mb-6">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
        @endif

        <div class="flex flex-wrap mt-5 px-40 justify-between">
            <div class="w-full md:w-80 px-4 ">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="https://dummyimage.com/300x200/000/fff" alt="Term 1" class="w-full h-48 object-cover">
                    <img src="https://picsum.photos/seed/200/110?" alt="Term 1" class="w-full h-48 aspect-video rounded ">

                    <div class="p-6">
                        <h5 class="text-xl font-semibold mb-2">Term 1</h5>
                        <p class="text-gray-600">
                            To make the payment of your due amount with your debit or credit card, click on the "Payment
                            button" below.
                        </p>
                        <a href="{{ route('stripe.checkout', ['price' => 3000, 'product' => 'Term 1']) }}"
                            class="block mt-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full text-center">
                            Make Payment
                        </a>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-80 px-4 ">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="https://picsum.photos/seed/200/110?" alt="Term 2" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h5 class="text-xl font-semibold mb-2">Term 2</h5>
                        <p class="text-gray-600">
                            To make the payment of your due amount with your debit or credit card, click on the "Payment
                            button" below.
                        </p>
                        <a href="{{ route('stripe.checkout', ['price' => 8000, 'product' => 'Term 2']) }}"
                            class="block mt-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full text-center">
                            Make Payment
                        </a>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-80 px-4 ">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="https://picsum.photos/seed/200/110?" alt="Term 3" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h5 class="text-xl font-semibold mb-2">Term 3</h5>
                        <p class="text-gray-600">
                            To make the payment of your due amount with your debit or credit card, click on the "Payment
                            button" below.
                        </p>
                        <a href="{{ route('stripe.checkout', ['price' => 10000, 'product' => 'Term 3']) }}"
                            class="block mt-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full text-center">
                            Make Payment
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Payment Gateway</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            position: relative;
            /* background: linear-gradient(to bottom, #0070f3, #00c4cc); */
            background: linear-gradient(90deg, rgba(0, 112, 243, 0.5), rgba(0, 196, 204, 0.5), rgba(0, 112, 243, 0.5), rgba(0, 196, 204, 0.5));
            background-size: 400% 100%;
            animation: gradientAnimation 10s linear infinite;
            overflow: hidden;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card-container {
            display: flex;
            justify-content: center;
            /*space-between*/
            margin-top: 20px;
            animation: fadeInUp 1s ease-in-out;
        }

        .card {
            /* background-color: #fff; */
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 250px;
            text-align: center;
            margin: 20px;
            opacity: 0;
            animation: fadeIn 1s ease-in-out forwards;
        }

        @keyframes fadeInUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 0%;
            }

            25% {
                background-position: 100% 0%;
            }

            50% {
                background-position: 100% 0%;
            }

            75% {
                background-position: 0% 0%;
            }

            100% {
                background-position: 0% 0%;
            }
        }

        .wave {
            position: absolute;
            width: 100%;
            height: 100px;
            bottom: 0;
            left: 0;
            background: linear-gradient(to right, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.4));
            animation: waveAnimation 5s linear infinite;
            z-index: 0;
        }

        @keyframes waveAnimation {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <em><h1 class="text-3xl text-center font-serif mb-8 mt-16 text-red-500">Student Fee Details</h1></em>

        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
        @endif

        <div class="card-container">
            <div class="card">
                <img src="https://picsum.photos/seed/200/110" alt="Term 1" class="w-full h-48 aspect-video rounded">
                <h5 class="text-xl font-semibold mb-2 mt-2">Term 1: 5000/-</h5>
                <p class="text-gray-600">
                    To make the payment of your due amount with your debit or credit card, click on the "Payment
                    button" below.
                </p>
                <a href="{{ route('stripe.checkout', ['price' => 5000, 'product' => 'Term 1']) }}"
                    class="block mt-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full text-center">
                    Make Payment
                </a>
            </div>

            <div class="card">
                <img src="https://picsum.photos/seed/201/110" alt="Term 2" class="w-full h-48 aspect-video rounded">
                <h5 class="text-xl font-semibold mb-2 mt-2">Term 2: 8000/-</h5>
                <p class="text-gray-600">
                    To make the payment of your due amount with your debit or credit card, click on the "Payment
                    button" below.
                </p>
                <a href="{{ route('stripe.checkout', ['price' => 8000, 'product' => 'Term 2']) }}"
                    class="block mt-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full text-center">
                    Make Payment
                </a>
            </div>

            <div class="card">
                <img src="https://picsum.photos/seed/202/110" alt="Term 3" class="w-full h-48 aspect-video rounded">
                <h5 class="text-xl font-semibold mb-2 mt-2">Term 3: 10000/-</h5>
                <p class="text-gray-600">
                    To make the payment of your due amount with your debit or credit card, click on the "Payment
                    button" below.
                </p>
                <a href="{{ route('stripe.checkout', ['price' => 10000, 'product' => 'Term 3']) }}"
                    class="block mt-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full text-center">
                    Make Payment
                </a>
            </div>
        </div>
    </div>

</body>
