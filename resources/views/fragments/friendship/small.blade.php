<form action="#" method="POST">
    {{ csrf_field() }}

    <button type="submit" class="btn btn-outline-danger btn-sm following" style="width: 6rem;">
        <span>フォロー中</span>
        <span>解除</span>
    </button>
</form>

{{--<form action="#" method="POST">--}}
    {{--{{ csrf_field() }}--}}

    {{--<button type="submit" class="btn btn-outline-primary btn-sm">フォローする</button>--}}
{{--</form>--}}
