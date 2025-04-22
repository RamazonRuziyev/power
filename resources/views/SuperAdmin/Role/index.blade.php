@extends('SuperAdmin.layout.master')
@section('title','Rol ko\'rish')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Rol Kurish</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Rol</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $key=>$role)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$role->name}}</td>
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
