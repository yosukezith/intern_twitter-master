@extends('layouts.app')

@section('content')
    <div class="col-lg-3">
        <div class="card card-profile mb-4">
            <div class="card-header bg-danger"></div>
            <div class="card-block text-center">
                <a href="{{route('profile')}}">
                    <img class="avatar card-profile-img" src="{{ asset('images/no-thumb.png') }}">
                </a>

                <div class="card-title my-2">
                    <a href="{{route('profile')}}" class="font-weight-bold text-inherit d-block">
                        {{$user->display_name}}
                    </a>
                    <a href="{{route('profile')}}" class="text-inherit">
                        &#64;{{$user->url_name}}
                    </a>
                </div>

                <p class="mb-4">{{$user->description}}

                <ul class="card-profile-stats">
                    <li class="card-profile-stat">
                        <a href="#" class="text-inherit">
                            フォロー
                            <strong class="d-block">
                                {{$following->count()}}
                            </strong>
                        </a>
                    </li>
                    <li class="card-profile-stat">
                        <a href="#" class="text-inherit">
                            フォロワー
                            <strong class="d-block">
                                {{$follower->count()}}
                            </strong>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <ul class="list-group media-list-stream mb-4">
            <li class="media list-group-item p-4 {{ $errors->has('body') ? 'has-danger' : '' }}">
                <form method="POST" action="{{ route('post_home') }}" class="input-group">
                    {{ csrf_field() }}

                    <input  name="body" type="text" id="body" class="form-control" value="{{ old('body') }}" placeholder="いまどうしてる？">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-secondary">
                            <span class="icon icon-new-message"></span>
                        </button>
                    </div>
                </form>

                @if($errors->has('body'))
                    <div class="form-control-feedback">
                        <strong>{{ $errors->first('body') }}</strong>
                    </div>
                @endif
            </li>
            @foreach($tweets as $tweet)
                @include('fragments.tweet')
            @endforeach
        </ul>
    </div>

    <div class="col-lg-3">
        @include('fragments.footer')
    </div>
@endsection
