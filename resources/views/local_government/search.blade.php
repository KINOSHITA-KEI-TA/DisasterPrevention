@extends('layouts.app')

@section('content')
    <h1>検索結果</h1>

    @if (count($local_governments) > 0)
        <ul>
            @foreach ($local_governments as $local_government)
                <li>{{ $local_government->name }}</li>
            @endforeach
        </ul>
    @else
        <p>該当するアイテムはありません。</p>
    @endif
@endsection
