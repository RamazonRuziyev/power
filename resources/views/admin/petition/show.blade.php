@extends('admin.layout.master')
@section('title','xabar')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ariza</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>FIO</th>
                                <th>MFY</th>
                                <th>Qishloqg'i</th>
                                <th>Telefon</th>
{{--                                <th>Masul Xodim</th>--}}
                                <th>tavsifi</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$petition->fio}}</td>
                                    <td>{{$petition->mfy}}</td>
                                    <td>{{$petition->village}}</td>
                                    <td>{{$petition->phone}}</td>
{{--                                    <td>{{$petition->employee}}</td>--}}
                                    <td>{{$petition->description}}</td>
                                    <td class="d-flex">
                                        <a class="btn btn-primary"  href="{{route('dashboard.notification.accept',$petition)}}">Accept</a>&nbsp;&nbsp;
                                        <a class="btn btn-danger"  href="{{route('dashboard.notification.cancel',$petition)}}">Cancel</a>
                                    </td>
                                </tr
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
