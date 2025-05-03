@extends('SuperAdmin.layout.master')
@section('title','Rol ko\'rish')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Rol Ko'rish</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Rol</th>
                                <th>Harakat</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $key=>$role)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$role->name}}</td>
                                        <td class="d-flex">
                                            <a class="btn btn-success" href="{{route('role_edit',$role)}}" title="Tahrirlash"><i class="far fa-edit"></i></a>&nbsp;&nbsp;
                                            <form action="{{route('role.destroy',$role)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger show_confirm" title="O'chirish"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
{{--                        <div style="margin: 20px;"> {{$users->links()}}</div>--}}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
