add_user_info
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/save_localgovernment') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="local_government" class="col-md-4 col-form-label text-md-end">{{ __('local_government') }}</label>

                            <div class="col-md-6">
                                <select name="local_government" id="local_government">
                                    @foreach ($local_governments as $local_government)
                                        <option value="{{ $local_government->id }}">{{ $local_government->name }}</option>    
                                    @endforeach
                                </select>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
