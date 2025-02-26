@extends('SuperAdmin.layout.master')
@section('title','Tahrirlash')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12 p-3" >
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tahrirlash</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form   method="post" action="{{route('user.update',$user)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ism</label>
                            <input type="text" value="{{$user->name}}" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="rayon name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" value="{{$user->email}}" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="rayon name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label>Eski parol</label>
                            <div class="form-input position-relative">
                                <input class="form-control @error('old_password') is-invalid @enderror" type="password" name="old_password" required="" placeholder="*********">
                                @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label>Parol</label>
                            <div class="form-input position-relative">
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required="" placeholder="*********">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label>Paroln takrorlashi</label>
                            <div class="form-input position-relative">
                                <input name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" type="password"  required="" placeholder="*********">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Saqlash</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection
