@extends('layouts.app')

@section('content')
    <h1>自治体検索</h1>

    <form action="{{ route('local_government.search') }}" method="get">
        <div class="form-group">
            <label for="q">自治体名で検索:</label>
            <input type="text" name="q" id="q" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">検索</button>
    </form>

    <div class="list-group mt-3">
        @foreach($local_governments as $local_government)
            <a href="{{ route('local_government.select', $local_government) }}" class="list-group-item list-group-item-action">
                {{ $local_government->name }}
            </a>
        @endforeach
    </div>
@endsection
