<!-- index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>検索機能</title>
</head>
<body>
    <form action="{{ route('local_government.search') }}" method="POST">
        @csrf
        <label for="query">キーワード：</label>
        <input type="text" name="query" id="keyword">
        <button type="submit">検索</button>
    </form>

    <hr>

    @if (isset($local_governments))
        <div id="search-results">
            @foreach ($local_governments as $local_government)
            <div class="search-result" data-local_government-id="{{ $local_government->id }}">
                <h3>{{ $local_government->name }}</h3>
                <form method="POST" action="{{ route('local_government.save') }}">
                    @csrf
                    
                    <input type="hidden" name="local_government_id" value="{{ $local_government->id }}" id="local_government_id">
                    <button class="select-button">選択</button>
                </form>
                <hr>
            </div>
            @endforeach
        </div>

        {{-- <button id="save-button" disabled>保存する</button> --}}
    @endif
    <script src="{{ asset('js/local_government.js') }}"></script>
</body>
</html>
