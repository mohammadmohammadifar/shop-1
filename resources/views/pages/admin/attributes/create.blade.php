@extends('layouts.admin')


@section('content')
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-between">
                <div>
                    <h4 class="mt-5"> create Attribute </h4>
                </div>

            </div>
        </div>

        <hr>

        <div class="row">

            <form action="{{ route('attributes.store') }}"  method="POST">
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
