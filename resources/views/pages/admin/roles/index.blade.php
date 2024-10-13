@extends('layouts.admin')


@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="d-flex justify-content-between">
                <div>
                    <h4 class="mt-5"> index Roles: {{ $roles->count() }} </h4>
                </div>
                <div>
                    <a href="{{ route('roles.create') }}" class="btn btn-outline-primary"> create </a>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td><a href="{{ route('roles.edit', $role->id) }}">edit</a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
@endsection
