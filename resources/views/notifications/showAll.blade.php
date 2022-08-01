@push('styles')
    <link rel="stylesheet" href=" {{ asset('css/notifications.css') }} ">
@endpush

@extends('layouts.appNotification')

@section('content')
<div class="container" id="notifications">
    <!-- <div class="notification">
        <div class="notification-header d-flex justify-content-between">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
            </svg>
            <small>15:32:12 2022/03/20</small>
        </div>
        <div class="notification-body">
            Laborum elit adipisicing dolor nisi enim eiusmod. Elit labore duis dolore excepteur. Ut incididunt Lorem laborum sunt eu qui reprehenderit dolore. Esse mollit aute mollit sint aliqua reprehenderit commodo velit cillum proident in in consequat reprehenderit. Deserunt deserunt mollit aliqua exercitation excepteur fugiat eu minim minim enim non.
        </div>        
    </div> -->
</div>
@endsection

@push('scripts')
    <script>
        window.axios.get('/api/notifications')
            .then( (response) => {
                const notificationsElement = document.getElementById('notifications');

                let notifications = response.data;

                notifications.forEach( (notification, index) => {
                    let elementParent = document.createElement('div');
                    elementParent.setAttribute('id', notification.id)
                    elementParent.classList.add('notification')

                    let elementHeader = document.createElement('div');
                    elementHeader.classList.add('notification-header','d-flex','flex-row', 'justify-content-between');

                    elementHeader.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                        </svg>
                        <small>${notification.created_at}</small>
                    `

                    elementParent.appendChild(elementHeader);

                    let elementBody = document.createElement('div');
                    elementBody.classList.add('notification-body')
                    elementBody.innerText = notification.message

                    elementParent.appendChild(elementBody);

                    notificationsElement.appendChild(elementParent);

                });
            } )
    </script>
@endpush