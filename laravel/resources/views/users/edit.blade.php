@extends('layouts.app')

@section('content')

    @include('partials.titular', ['titular' => __('Edit user'), 'subtitulo' => ''])

    <form action="{{ route('users.update', [$user->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row mb-3">
            <label class="col-2 form-label" for="name">{{ __('Name') }}</label>
            <div class="col-10">
                <input class="form-control" type="text" id="name" name="name" placeholder=""
                       value="{{ old('name') ?: $user->name }}"/>
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-2 form-label" for="email">{{ __('Email Address') }}</label>
            <div class="col-10">
                <input class="form-control" type="text" id="email" name="email" placeholder=""
                       value="{{ old('email') ?: $user->email }}"/>
                <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-2 form-label" for="password">{{ __('Password') }}</label>
            <div class="col-10">
                <input class="form-control" type="password" id="password" name="password" placeholder=""
                       value="{{ old('password') }}"/>
                <span class="text-danger">{{ $errors->first('password') }}</span>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-2 form-label" for="confirm-password">{{ __('Confirm Password') }}</label>
            <div class="col-10">
                <input class="form-control" type="password" id="confirm-password" name="confirm-password" placeholder=""
                       value="{{ old('confirm-password') }}"/>
                <span class="text-danger">{{ $errors->first('confirm-password') }}</span>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-2 form-label" for="roles">{{ __('Roles') }}</label>
            <div class="col-10">
                <select class="form-control" id="roles" name="roles[]" multiple="multiple">
                    @foreach($roles as $role)
                        <option {{ $user->hasRole($role) ? 'selected' : '' }}
                                value="{{ $role }}">{{ $role }}</option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('roles') }}</span>
            </div>
        </div>
        <div class="mt-5">
            <input class="btn btn-primary" type="submit" name="guardar" value="{{ __('Save') }}"/>
            <a class="btn btn-link link-secondary link-underline-opacity-0 link-underline-opacity-100-hover ms-2"
               href="{{ route('users.index') }}">{{ __('Cancel') }}</a>
        </div>
    </form>

@endsection
