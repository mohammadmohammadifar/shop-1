@extends('layouts.admin')


@section('content')
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-between">
                <div>
                    <h4 class="mt-5"> create categories </h4>
                </div>

            </div>
        </div>

        <hr>

        <div class="row">

            <form action="{{ route('attributes.store') }}" method="POST">
                @csrf

                <div class="row">
                    {{-- name --}}
                    <div class="mb-3 col-md-4">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                            placeholder="" />
                    </div>

                    {{-- parent_id --}}
                    <div class="mb-3 col-md-4">
                        <label for="" class="form-label">parent_id</label>
                        <select class="form-select form-select-lg" name="parent_id" id="">
                            <option selected>Select one</option>
                            @foreach ($parentId as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    {{-- id_active --}}
                    <div class="mb-3 col-md-4">
                        <label for="" class="form-label">is_active</label>
                        <select class="form-select form-select-lg" name="is_active" id="">
                            <option selected>Select one</option>
                            <option value="0">not-active</option>
                            <option value="1">active</option>
                        </select>
                    </div>

                    {{-- description --}}
                    <div class="mb-3">
                        <label for="" class="form-label">description</label>
                        <textarea class="form-control" name="description" id="" rows="3"></textarea>
                    </div>


                </div>


                <hr>

                <div class="row">
                    <div>
                        <h6 style="color: red">Attribute & variations</h6>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">attributes</label>
                        <select class="form-select form-select-lg" name="attributes_ids[]" id="" multiple>
                            @foreach ($attributes as $attribute)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">variations</label>
                        <select class="form-select form-select-lg" name="variations-ids[]" id="" multiple>
                            @foreach ($attributes as $attribute)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">is_filter</label>
                        <select class="form-select form-select-lg" name="is_filter" id="">
                            <option selected>Select one</option>
                            @foreach ($attributes as $attribute)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endforeach
                        </select>
                    </div>


                </div>



                <button class="btn btn-outline-primary" type="submit"> create </button>
            </form>


        </div>
    </div>
@endsection
