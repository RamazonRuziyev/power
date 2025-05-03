@extends('admin.layout.master')
@section('title','Ariza bekor qiligan')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-3">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-around">
                        <h3 class="card-title">Ariza bekor qilish</h3>
                        <h4 class="btn  btn-danger" >{{$count}}</h4>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>FIO</th>
                                <th>MFY</th>
                                <th>Qishlog'i</th>
                                <th>Telefon</th>
                                <th>tavsifi</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($petitions as $key=>$petition)
                                <tr>
                                    <td>{{($petitions->currentPage() -1) * $petitions->perPage() + ($loop->index +1)}}</td>
                                    <td>{{$petition->fio}}</td>
                                    <td>{{$petition->mfy}}</td>
                                    <td>{{$petition->village}}</td>
                                    <td>{{$petition->phone}}</td>
                                    <td>{{$petition->description}}</td>
                                    <td>
                                        @if($petition->status == 2)
                                            <span class="btn btn-danger">Bekor qilingan ariza</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        <div style="margin: 20px;"> {{$petitions->links()}}</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
