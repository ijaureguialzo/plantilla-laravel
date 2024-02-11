@extends('layouts.app')

@section('content')

    @include('partials.titular', ['titular' => __('Roles'), 'subtitulo' => ''])

    @can('role-create')
        <div class="my-3">
            <a class="btn btn-primary" href="{{ route('roles.create') }}">{{ __('New role') }}</a>
        </div>
    @endcan

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <span>{{ $message }}</span>
        </div>
    @endif

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Permissions') }}</th>
            <th>{{ __('Action') }}</th>
        </tr>
        </thead>
        <tbody class="align-middle">
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->permissions()->count() }}</td>
                <td>
                    <div class="d-flex">
                        @can('role-edit')
                            <a href="{{ route('roles.edit', [$role->id]) }}"
                               title="{{ __('Edit') }}"
                               class="btn btn-sm btn-secondary me-2" role="button">
                                <i class="bi bi-pencil"></i>
                            </a>
                        @endcan
                        @can('role-delete')
                            <form action="{{ route('roles.destroy', [$role->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button title="{{ __('Delete') }}"
                                        name="delete"
                                        type="submit" onclick="return confirm('{{ __('Are you sure?') }}')"
                                        class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        @endcan
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th colspan="4" class="border-0">{{ __('Total') }}: {{ $roles->count() }}</th>
        </tr>
        </tfoot>
    </table>

    <div class="d-flex justify-content-center">
        {!! $roles->links() !!}
    </div>

@endsection
