@extends('layouts.app')

@section('content')

    @include('partials.titular', ['titular' => __('New role'), 'subtitulo' => ''])

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <label class="col-2 form-label" for="name">{{ __('Name') }}</label>
            <div class="col-10">
                <input class="form-control" type="text" id="name" name="name" placeholder=""
                       value="{{ old('name') }}"/>
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
        </div>
        <div class="row mb-3">
            <span class="col-2 form-label">{{ __('Permissions') }}</span>
            <div class="col-10">
                <div class="row">
                    @foreach($permissions as $permission)
                        <div class="col-3">
                            <label class="form-check-label pe-3">
                                <input class="form-check-inline me-1"
                                       type="checkbox"
                                       name="permissions[]"
                                       value="{{ $permission->name }}"/>
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <span class="text-danger">{{ $errors->first('permissions') }}</span>
            </div>
        </div>
        <div class="mt-5">
            <input class="btn btn-primary" type="submit" name="guardar" value="{{ __('Save') }}"/>
            <a class="btn btn-link link-secondary link-underline-opacity-0 link-underline-opacity-100-hover ms-2"
               href="{{ route('roles.index') }}">{{ __('Cancel') }}</a>
        </div>
    </form>

@endsection
