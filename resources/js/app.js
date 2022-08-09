require('./bootstrap');




import Echo from 'laravel-echo'

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'e1ae740b12b367a28285',
    cluster: 'ap2',
    forceTLS: true
});

var channel = Echo.channel('testChannel');
channel.listen('testChannel', function (data) {
    alert(JSON.stringify(data));
});
