@extends('layouts.admin')


@section('content')
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-between">
                <div>
                    <h4 class="mt-5"> create roles </h4>
                </div>
                <div>
                    <a href="{{ route('roles.index') }}"></a>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">

            <form action="{{ route('roles.store') }}"  method="POST">
                @method('PUT')
                @csrf

                {{-- name --}}
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                        placeholder=""  value="{{ $role->name }}"/>
                </div>
                <hr>


                {{-- permission --}}
                <p>
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                      Permission
                    </a>

                </p>
                  <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        @foreach ($permissions as $permission)

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $permission->name }}" id="flexCheckDefault-{{ $permission->id }}" name="{{ $permission->name }}"
                            {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="flexCheckDefault-{{ $permission->id }}">
                              {{ $permission->name }}
                            </label>
                          </div>

                        @endforeach
                    </div>
                  </div>

                <button class="btn btn-outline-primary mt-5" type="submit"> create </button>
            </form>


        </div>
    </div>
@endsection
