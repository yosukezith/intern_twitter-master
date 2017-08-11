<div class="profile-header" style="background-image: url({{ asset('images/iceland.jpg') }})">
    <div class="container">
        <div class="container-inner">
            <img class="rounded-circle media-object" src="{{ asset('images/no-thumb.png') }}">
            <h3 class="profile-header-user">{{$user->display_name}}</h3>
            <p class="profile-header-bio">{{$user->description}}</p>
        </div>
    </div>

    <nav class="profile-header-nav" id="profile-header">
        <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    ツイート
                    <strong class="d-block">
                        {{$tweets->count()}}
                    </strong>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    フォロー
                    <strong class="d-block">{{$following->count()}}</strong>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    フォロワー
                    <strong class="d-block">{{$follower->count()}}</strong>
                </a>
            </li>
        </ul>
    </nav>
</div>

