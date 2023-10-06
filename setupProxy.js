const { createProxyMiddleware } = require('http-proxy-middleware');

module.exports = function (app) {
    app.use(
        '/stripe', // Change this to the appropriate endpoint
        createProxyMiddleware({
            target: 'https://dashboard.stripe.com',
            changeOrigin: true,
        })
    );
};
