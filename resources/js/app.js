require('./bootstrap');


Echo.channel('notifications')
    .listen('UserSessionChanged', (event) => {
        const notificationElement = document.getElementById('notification');

        notificationElement.innerText = event.message;
        notificationElement.classList.remove('invisible');
        notificationElement.classList.remove('alert-success');
        notificationElement.classList.remove('alert-danger');

        console.log(event);

        notificationElement.classList.add('alert-' + event.type);
    })