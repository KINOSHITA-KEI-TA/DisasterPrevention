<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
</head>
<body>
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('自治体選択画面') }}</div>

                    <div class="card-body">

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
                                {{-- <button id="save-button" disabled>保存する</button> --}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="{{ asset('js/local_government.js') }}"></script> --}}
</div>

</body>
</html>