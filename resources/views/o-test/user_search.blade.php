<h1>ユーザー検索画面（仮）</h1>
<div>現在のログインユーザー</div>
<div>id:{{Auth::user()->id}},名前:{{Auth::user()->name}}</div>

<br>

<div>検索ボックス</div>
<form method="GET" action="{{route('searchIndex')}}">
    @csrf
    <input type="search" name="search" placeholder="ユーザー名を入力" value="@if (isset($search)) {{$search}} @endif">
    <div>
        <button type="submit">検索</button>
        <a href="{{route('searchIndex')}}">クリア</a>
    </div>
</form>

<div>以下、ユーザー一覧</div>
@foreach ($users as $user)
    *******************
    <div>ID:{{$user->id}},ユーザー名：{{$user->name}}</div>
    @foreach($followUserIdArray as $a)
        <div>followUserIdArray:{{$a}}</div>
    @endforeach
    @if(!in_array($user->id, $followUserIdArray))
        <form method="POST" action="{{route('addFollow',['addFollowId' => $user->id])}}">
            @csrf
            @if(Auth::user() != $user)
                <button type="submit">フォローする</button>
            @endif
        </form>
    @endif
    @if(in_array($user->id, $followUserIdArray))
        <form method="POST" action="{{route('deleteFollow',['followerId' => $user->id])}}">
            @csrf
            @if(Auth::user() != $user)
                <button type="submit">フォロー解除</button>
            @endif
        </form>
    @endif
    *******************
    <br>
@endforeach

<div>
    {{-- ページネーター --}}
    {{-- {{$institutions->appends(request()->input()->links())}} --}}
</div>
