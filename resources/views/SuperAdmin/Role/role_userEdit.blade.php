@extends('SuperAdmin.layout.master');
@section('title','User role tahrirlash')
@section('content')
    <div class="row">
        <div class="col-md-12 p-3" >
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">User Rol Tahrirlash</h3>
                </div>
                <form action="{{route('user.roleUpdate',$user)}}"  method="post" enctype="multipart/form-data">
                    @csrf
                   @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" value="{{$user->name}}" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Yaratish">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" value="{{$user->email}}" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Yaratish">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select name="role_id" id="" class="form-control">
                                @if($user->role_id == 2)
                                    <option selected  value="2">Administrator</option>
                                    <option value="1">Xodim</option>
                                    <option value="3">user</option>
                                @elseif($user->role_id == 1)
                                    <option value="2">Administrator</option>
                                    <option selected value="1">Xodim</option>
                                    <option value="3">user</option>
                                @elseif($user->role_id == 3)
                                    <option value="2">Administrator</option>
                                    <option value="1">Xodim</option>
                                    <option selected value="3">user</option>
                                @endif
                            </select>
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
