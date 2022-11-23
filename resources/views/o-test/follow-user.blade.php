<h2>ログイン中のユーザー</h2>
{{Auth::user()->id}},{{Auth::user()->name}}

<h2>ユーザー一覧</h2>
<p>id,name</p>
@foreach($users as $user)
{{$user->id}} ,{{$user->name}}
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
    <br>
@endforeach

<h2>相互フォローが完了したユーザー一覧</h2>
@foreach($users as $user)
    @if(in_array($user->id,Auth::user()->follow_each()))
        {{$user->id}} {{$user->name}}
        <br>
    @endif
@endforeach

<br>
<a href="/">ホームに戻る</a>
<br>
<a href="/testpagelist">テストページ一覧に戻る</a>