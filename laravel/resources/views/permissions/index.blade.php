@extends('layouts.app')

@section('content')

    @include('partials.titular', ['titular' => __('Permissions'), 'subtitulo' => ''])

    @can('permission-create')
        <div class="my-3">
            <a class="btn btn-primary" href="{{ route('permissions.create') }}">{{ __('New permission') }}</a>
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
            <th>{{ __('Action') }}</th>
        </tr>
        </thead>
        <tbody class="align-middle">
        @foreach ($permissions as $key => $permission)
            <tr>
                <td>{{ $permission->id }}</td>
                <td>{{ $permission->name }}</td>
                <td>
                    <div class="d-flex">
                        @can('permission-edit')
                            <a href="{{ route('permissions.edit', [$permission->id]) }}"
                               title="{{ __('Edit') }}"
                               class="btn btn-sm btn-secondary me-2" role="button">
                                <i class="bi bi-pencil"></i>
                            </a>
                        @endcan
                        @can('permission-delete')
                            <form action="{{ route('permissions.destroy', [$permission->id]) }}" method="POST">
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
            <th colspan="3" class="border-0">{{ __('Total') }}: {{ $permissions->count() }}</th>
        </tr>
        </tfoot>
    </table>

    <div class="d-flex justify-content-center">
        {!! $permissions->links() !!}
    </div>

@endsection
