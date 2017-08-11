@extends('layouts.user')

@section('content')
    @if($login_user->id!=$user->id)
        <div class="col-lg-3">
            @include('user.fragments.friendship')
        </div>
    @endif

    <div class="col-lg-6">
        <ul class="list-group media-list-stream mb-4">
            @foreach($tweets as $tweet)
                @include('fragments.tweet')
            @endforeach
        </ul>
    </div>

    <div class="col-lg-3">
        @include('fragments.footer')
    </div>
@endsection