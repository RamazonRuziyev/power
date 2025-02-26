@extends('profiles.layout.master')
@section('title','Xabarlarni kurish')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ariza Kurish</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>FIO</th>
                                <th>MFY</th>
                                <th>Qishloqg'i</th>
                                <th>Telefon</th>
                                <th>Masul Xodim</th>
                                <th>Aavsifi</th>
                                <th>Natija</th>
                                <th style="width: 40px">Action</th>
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
                                    <td>{{$petition->employee}}</td>
                                    <td>{{$petition->description}}x </td>
                                    <td>
                                        @if($petition->status == 0)
                                                <span class="btn btn-warning">tekshirilmoqda</span>
                                        @elseif($petition->status == 1)
                                            {{--                                    <span class="badge bg-label-success me-1">Accept</span>--}}
                                            <span class="btn btn-success">Qabul qilingan</span>
                                        @elseif($petition->status == 2)
                                            {{--                                    <span class="badge bg-label-danger me-1">cancel</span>--}}
                                            <span class="btn btn-danger">Bekor qilish</span>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        <a class="btn btn-primary"  href="{{route('petition.edit',$petition)}}">Tahrirlash</a>&nbsp;&nbsp;
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
