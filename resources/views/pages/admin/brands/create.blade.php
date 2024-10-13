@extends('layouts.admin')


@section('content')
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-between">
                <div>
                    <h4 class="mt-5"> create Brand </h4>
                </div>
                <div>
                    <a href="{{ route('brands.index') }}"></a>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">

            <form action="{{ route('brands.store') }}"  method="POST">
                @csrf

                {{-- name --}}
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                        placeholder="" />
                </div>

                <button class="btn btn-outline-primary" type="submit"> create </button>
            </form>


        </div>
    </div>
@endsection
