@if($friendship->count()==1)
    <form action="{{route('user_followed',$user->id)}}" method="POST" >
        {{ csrf_field() }}

        <button type="submit" class="btn btn-outline-danger btn-md following" style="width: 7rem;">

                <span>フォロー中</span>
                <span>解除</span>
        </button>
    </form>

@elseif($friendship->count()==0)
    <form action="{{route('user_followed',$user->id)}}" method="POST" >
        {{ csrf_field() }}

        <button type="submit" class="btn btn-outline-primary btn-md">フォローする</button>
    </form>

@endif
