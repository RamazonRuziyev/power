@extends('SuperAdmin.layout.master')
@section('title','Xabarlar')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header d-flex  align-items-center justify-content-around">
                            <h3 class="card-title">Ariza Kurish</h3>
                            <a class="btn btn-success" id="downloadWord" href="">Word</a>
                            <a class="btn btn-success" id="printTable" href="">Print</a>
                            <a class="btn btn-success" id="downloadExcel" href="#">Excel</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="data-table" class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>FIO</th>
                                <th>MFY</th>
                                <th>Qishloqg'i</th>
                                <th>Telefon</th>
                                <th>Masul Xodim</th>
                                <th>Tavsifi</th>
                                <th>Natija</th>
                                <th style="width: 40px">Action</th> <!-- This column will remain in the HTML -->
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
                                    <td>{{$petition->employee_name}}</td>
                                    <td>{{$petition->description}}x </td>
                                    <td>
                                        @if($petition->status == 0)
                                            <span class="btn btn-warning">tekshirilmoqda</span>
                                        @elseif($petition->status == 1)
                                            <span class="btn btn-success">Qabul qilingan ariza</span>
                                        @elseif($petition->status == 2)
                                            <span class="btn btn-danger">Bekor qiligan ariza </span>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        <form action="{{route('superAdmin.petition.delete',$petition->id)}}" method="post" >
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
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
