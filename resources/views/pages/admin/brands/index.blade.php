@extends('layouts.admin')


@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="d-flex justify-content-between">
                <div>
                    <h4 class="mt-5"> index Brand: {{ $brands->count() }} </h4>
                </div>
                <div>
                    <a href="{{ route('brands.create') }}" class="btn btn-outline-primary"> create </a>
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
                    @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->name }}</td>
                            <td><a href="{{ route('brands.edit', $brand->id) }}">edit</a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
@endsection
