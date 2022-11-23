<h1>ユーザー検索画面（仮）</h1>
**************************************************************************
<div>現在のログインユーザー</div>
<div style="background: pink">id:{{Auth::user()->id}},名前:{{Auth::user()->name}}</div>
**************************************************************************
<br>
===========================================================================
<div>相互フォローが完了したユーザー一覧</div>
@foreach($users as $user)
    @if(in_array($user->id,Auth::user()->follow_each()))
        <div style="background: greenyellow"">
            {{$user->id}} {{$user->name}}
        </div>    
        <br>
    @endif
@endforeach
===========================================================================
<br>

<div style="background: #aaaaaa; padding: 10px;">
<div>検索ボックス（テスト用、削除予定）</div>
<form method="GET" action="{{route('searchIndex')}}">
    @csrf
    <input type="search" name="search" placeholder="ユーザー名を入力" value="@if (isset($search)) {{$search}} @endif">
    <div>
        <button type="submit">検索</button>
        <a href="{{route('searchIndex')}}">クリア</a>
    </div>
</form>
</div>

<br>
<div>以下、ユーザー一覧</div>
@foreach ($users as $user)
#####################################################################################################
<div style="background: #eeeeee">ID:{{$user->id}},ユーザー名：{{$user->name}}</div>
    {{-- @foreach($followUserIdArray as $a)
        <div>followUserIdArray:{{$a}}</div>
    @endforeach --}}
    @if(!in_array($user->id, $followUserIdArray))
        <form method="POST" action="{{route('addFollow',['addFollowId' => $user->id])}}">
            @csrf
            @if(Auth::user() != $user)
                <button style="background: skyblue" type="submit">フォローする</button>
            @endif
        </form>
    @endif
    @if(in_array($user->id, $followUserIdArray))
        <form method="POST" action="{{route('deleteFollow',['followerId' => $user->id])}}">
            @csrf
            @if(Auth::user() != $user)
                <button style="background: yellow" type="submit">フォロー解除</button>
            @endif
        </form>
    @endif
    #####################################################################################################
    <br>
@endforeach

<div>
    {{-- ページネーター --}}
    {{-- {{$institutions->appends(request()->input()->links())}} --}}
</div>

<br>
<a href="/">ホームに戻る</a>
<br>
<a href="/testpagelist">テストページ一覧に戻る</a>
