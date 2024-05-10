<?php
// In your controller method
use App\Models\Message;
// Fetch unread messages
// $messages = Message::whereNull('read_at')->get();
$messages = Message::all();

?>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto" name="fomr1">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
            <input class="form-control" type="search" name="search1" id="search1" onchange="fom1.submit()" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>

        </div>
    </form>
    <ul class="navbar-nav navbar-right">
        @php
        $unreadExists = false;
        foreach($messages as $message) {
        if ($message->read_at == null) {
        $unreadExists = true;
        break;
        }
        }
        @endphp
        @if ($unreadExists)
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep "><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Messages
                    <div class="float-right">
                        <a href="#" class="text-primary">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-message">
                    @foreach($messages as $message)
                    @if ($message->read_at == null)
                    <a href="{{ route('Messages.show', $message->id) }}" class="dropdown-item">
                        <div class="dropdown-item-avatar">
                            @if (empty($message->image))
                            <img alt="image" src="{{ asset('assets/img/avatar/user.png') }}" class="rounded-circle">
                            @else
                            <img alt="image" src="{{ asset('storage/'. $message->image) }}" class="rounded-circle">
                            @endif
                            @if ($message->is_online)
                            <div class="is-online"></div>
                            @endif
                        </div>
                        <div class="dropdown-item-desc">
                            <b>{{ $message->name }}</b>
                            <p>{{ $message->message }}</p>
                            <div class="time">{{ $message->created_at->diffForHumans() }}</div>
                        </div>
                    </a>
                    @endif
                    @endforeach
                </div>
                <div class="dropdown-footer text-center">
                    <a href="/Messages" class="text-primary">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        @else
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle  "><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Messages
                    <div class="float-right">
                        <a href="#" class="text-primary">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-message">
                    <div class="card">
                        <div class="card-body">
                            <div class="empty-state">
                                <div class="empty-state-icon" style="background-color: #e7391e;"><i class="fas fa-question"></i></div>
                                <h2>We couldn't find any Message</h2>
                                <a href="/admin/Messages" class="btn btn-primary btn-lg mt-4" style="background-color: #e7391e;border: none;font-size: large;">see the old messages </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="/admin/Messages" class="text-primary">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        @endif
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifications
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-icon bg-primary text-white">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="dropdown-item-desc"> Template update is available now!
                            <div class="time text-primary">2 Min Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-info text-white">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                            <div class="time">10 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-success text-white">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                            <div class="time">12 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-danger text-white">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            Low disk space. Let's clean it!
                            <div class="time">17 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-info text-white">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            Welcome to CodiePie template!
                            <div class="time">Yesterday</div>
                        </div>
                    </a>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        <li class="dropdown ">
            <a href="/" class="nav-link  nav-link-lg" target="_blank"><i class="fa fa-home"></i></a>

        </li>
        @auth
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{asset('storage/'.auth()->user()->image)}}" style="height: 30px !important; width: 30px !important;" class="rounded-circle mr-1 img-fluid">
                <div class="d-sm-none d-lg-inline-block">Hi,{{auth()->user()->nom}} {{auth()->user()->prenom}}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="{{route('profile.show',auth()->user()->id)}}" class="dropdown-item has-icon"><i class="far fa-user"></i> Profile</a>
                <a href="features-activities.html" class="dropdown-item has-icon"><i class="fas fa-bolt"></i> Activities</a>
                <a href="features-settings.html" class="dropdown-item has-icon"><i class="fas fa-cog"></i> Settings</a>
                <div class="dropdown-divider"></div>
                <a href="{{Route('login.logout')}}" class="dropdown-item has-icon text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </li>
        @endauth
        @guest
        <li class="dropdown"><a href="{{route('login')}}" class="nav-link  nav-link-lg nav-link-user"><i class="fa fa-user mr-2"></i>login</a></li>
        @endguest
    </ul>
</nav>