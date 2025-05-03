@extends('admin.layout.master')
@section('title','Profil sozlash')
@section('content')
    <div class="row">
        <div class="col-md-12 p-3" >
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Profil sozlamalari</h3>
                </div>
                <form action="{{route('update.setting.admin',\Illuminate\Support\Facades\Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ism</label>
                            <input value="{{\Illuminate\Support\Facades\Auth::user()->name}}" type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="rayon name">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Elektron pochta</label>
                            <input value="{{\Illuminate\Support\Facades\Auth::user()->email}}" class="form-control" name="email" type="email" required="" placeholder="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Rasm</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Faylni tanlang</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Yuklash</span>
                                </div>
                            </div>
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
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tahrirlash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
