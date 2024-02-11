@extends('layouts.app')

@section('content')

    @include('partials.titular', ['titular' => __('New permission'), 'subtitulo' => ''])

    <form action="{{ route('permissions.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <label class="col-2 form-label" for="name">{{ __('Name') }}</label>
            <div class="col-10">
                <input class="form-control" type="text" id="name" name="name" placeholder=""
                       value="{{ old('name') }}"/>
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
        </div>
        <div class="mt-5">
            <input class="btn btn-primary" type="submit" name="guardar" value="{{ __('Save') }}"/>
            <a class="btn btn-link link-secondary link-underline-opacity-0 link-underline-opacity-100-hover ms-2"
               href="{{ route('permissions.index') }}">{{ __('Cancel') }}</a>
        </div>
    </form>

@endsection
