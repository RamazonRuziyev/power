@extends('SuperAdmin.layout.master')
@section('title','Role tahrirlash')
@section('content')
    <div class="row">
        <div class="col-md-12 p-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Rol tahrirlash</h3>
                </div>
                <form action="{{ route('roles.update',$role)}}"  method="post" id="ajax_form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Rol Tahrirlash</label>
                            <input type="text" value="{{$role->name}}" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Yaratish">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tahrirlash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
