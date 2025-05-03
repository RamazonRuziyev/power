@extends('SuperAdmin.layout.master')
@section('title','Xabarlarni foydalanuvch tahrirlash')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User role tahrirlash</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key=>$user)
                                <tr>
                                    <td>{{($users->currentPage() -1 ) * $users->perPage() + ($loop->index + 1)}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->role_id == 1)
                                            Xodim
                                        @elseif($user->role_id ==2)
                                            Administrator
                                        @elseif($user->role_id == 3)
                                            user
                                        @endif
                                    </td>
                                    <td >
                                        <a class="btn btn-success" href="{{route('user.roleEdit',$user)}}" title="Tahrirlash"><i class="far fa-edit"></i></a>&nbsp;&nbsp;
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
