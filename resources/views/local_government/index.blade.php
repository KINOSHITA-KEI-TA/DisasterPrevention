@extends('layouts.base')

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