<style>
    .notification-item {
        display: flex;
        align-items: center;
        padding: 10px;
        transition: background-color 0.3s ease;
    }

    /* Unread notifications style */
    .notification-item.unread {
    background-color: #545f8b; /* Background for unread notifications */
    color: #fff; /* Text color for unread notifications */
    }
    .notification-item.read {
        background-color: #fff; /* Background for read notifications */
        color: #000; /* Text color for read notifications */
    }
    /* Hover styles for the li */
    .notification-item:hover {
        background-color: #545fb8; /* Hover background color */
        cursor: pointer;
    }
    /* a tag inside the notification item */
    .notification-item a {
        color: #000; /* Default link color */
        text-decoration: none;
        transition: color 0.3s ease;
    }

    /* Hover effect on li should affect the a tag */
    .notification-item:hover a {
        color: #fff; /* Change link color on hover */
    }

    /* Notification image styles */
    .notification-image {
        width: 35px;
        height: 35px;
        border-radius: 100%;
        object-fit: cover;
        background-color: #f0f0f0;
    }

    /* Notification text size */
    .notification-text {
        font-size: 14px;
    }

    .dropdown-menu {
        max-height: 300px;
        overflow-y: auto;
        width: 280px;
    }
    .dropdown-menu-end[data-bs-popper] {
        right: -142px !important;
    }
    </style>
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ url('/') }}" class=" d-flex align-items-center">
            <img src="{{asset('admin/assets/img/logo.svg')}}" alt="">
        </a>
       <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            @if (Auth::check())
                <div class="dropdown me-4">
                    <a href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bx bxs-bell mt-1 rounded-circle p-1 fs-6" style="color:#545f8b; border: 1px solid #545f8b"></i>
                    </a>
                    @if (Auth::user()->unreadNotifications->count() > 0)
                        <span class="badge bg-danger rounded-circle position-absolute" style="top: 0; right: 0; transform: translate(50%, -50%); font-size:10px;">
                            {{ Auth::user()->unreadNotifications->count() }}
                        </span>
                    @endif
                    <ul class="dropdown-menu dropdown-menu-end mt-2 mx-auto pb-0" aria-labelledby="notificationDropdown" style="width: 280px; max-height: 300px; overflow-y: auto;">
                        <h6 class="text-center pt-2">Notifications</h6>
                        <hr class="p-0 m-0">
                        @foreach (Auth::user()->notifications as $notification)
                            @php
                                $Id = $notification->data['id'] ?? null;
                                $adRoute = $Id ? route('admin.user_data', ['id' => $Id]) : null;
                                $isUnread = is_null($notification->read_at);
                            @endphp
                            <li class="notification-item d-flex align-items-center p-2 {{ $isUnread ? 'unread' : 'read' }}" 
                                data-id="{{ $notification->id }}" style="border-bottom:1px solid #ddd;">
                                <!-- Notification image -->
                                <img src="{{ asset('assets/images/1720135995_Profile-Male-PNG.png') }}" alt="Notification Image" class="notification-image me-2">
                                <!-- Notification content -->
                                <div class="flex-grow-1">
                                    @if ($adRoute)
                                        <a href="{{ $adRoute }}" class="text-decoration-none">
                                            <span class="notification-text">{{ $notification->data['message'] }}</span><br>
                                            <p style="font-size:11px !important">{{ $notification->created_at->diffForHumans() }}</p>
                                        </a>
                                        @else
                                        <span class="notification-text">{{ $notification->data['message'] }}</span><br>
                                        <p style="font-size:11px !important">{{ $notification->created_at->diffForHumans() }}</p>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                        @if (Auth::user()->notifications->isEmpty())
                            <li><span class="dropdown-item">No notifications</span></li>
                        @endif
                    </ul>
                </div>
            @endif
        </ul>
    </nav>
</header>