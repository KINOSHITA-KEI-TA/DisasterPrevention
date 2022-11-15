ユーザー検索画面（仮）
<br>

<p>検索ボックス</p>
<form method="GET" action="{{route('searchIndex')}}">
    @csrf
    <input type="search" name="search" placeholder="ユーザー名を入力" value="@if (isset($search)) {{$search}} @endif">
    <div>
        <button type="submit">検索</button>
        <a href="{{route('searchIndex')}}">クリア</a>
    </div>
</form>

@foreach ($users as $user)
    *******************
    <div>ユーザー名：{{$user->name}}</div>
    <form method="POST" action="{{route('addFollow',['addFollowId' => $user->id])}}">
        @csrf
        @if(Auth::user() != $user)
            <button type="submit">フォローする</button>
        @endif
    </form>  
    <form method="POST" action="{{route('deleteFollow',['followerId' => $user->id])}}">
        @csrf
        @if(Auth::user() != $user)
            <button type="submit">フォロー解除</button>
        @endif
    </form>
    *******************
    <br>
@endforeach

<div>
    {{-- ページネーター --}}
    {{-- {{$institutions->appends(request()->input()->links())}} --}}
</div>
