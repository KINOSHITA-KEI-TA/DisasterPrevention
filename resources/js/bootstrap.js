window._ = require('lodash');

try {
    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */


// import Echo from 'laravel-echo';
// import Pusher from 'pusher-js';

// const options = {
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
// }

// window.Echo = new Echo({
//     ...options,
//     client: new Pusher(options.key, options)
// });

// import Echo from 'laravel-echo';

// window.pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true,
//     authEndpoint: '/broadcasting/auth',
// });

// window.Echo.channel('DisasterPrevention')
//     .listen('MessageSent',function(message){
//         console.log('received a message');
//         console.log(message);
//     });

