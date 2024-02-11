@extends('layouts.app')

@section('content')

    @include('partials.titular', ['titular' => __('Users'), 'subtitulo' => ''])

    @can('user-create')
        <div class="my-3">
            <a class="btn btn-primary" href="{{ route('users.create') }}">{{ __('New user') }}</a>
        </div>
    @endcan

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <span>{{ $message }}</span>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table align-middle table-hover">
            <thead>
            <tr class="table-dark">
                <th>#</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Roles') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
            </thead>
            <tbody class="align-middle">
            @foreach ($users as $key => $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                                <span class="badge bg-primary">{{ $v }}</span>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <div class="d-flex">
                            @can('user-edit')
                                <a href="{{ route('users.edit', [$user->id]) }}"
                                   title="{{ __('Edit') }}"
                                   class="btn btn-sm btn-secondary me-2" role="button">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            @endcan
                            @can('user-delete')
                                <form action="{{ route('users.destroy', [$user->id]) }}" method="POST">
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
                <th colspan="5" class="border-0">{{ __('Total') }}: {{ $users->count() }}</th>
            </tr>
            </tfoot>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {!! $users->links() !!}
    </div>

@endsection
