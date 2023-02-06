<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>掲示板投稿画面</title>
</head>
<body>
    投稿入力
    @if ($user)
        <form method="POST" action="{{ route('post', ['user_id' => $user->id]) }}">
            <button type="submit">投稿する</button>
        </form>    
    @endif
    
</body>
</html>