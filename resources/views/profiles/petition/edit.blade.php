@extends('profiles.layout.master')
@section('title','Ariza tahrirlash')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12 p-3" >
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Xabarlarni tahrirlash</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('petition.update',$petition)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Fio</label>
                            <input type="text" value="{{$petition->fio}}" name="name" class="form-control" id="exampleInputEmail1" placeholder="rayon name">
                        </div>
                        <div class="form-group">
                            <label for="">Mfy</label> <br>
                            <select name="mfy" id="" class="form-control">
                            @if($petition->mfy)
                                    <option selected disabled value="{{$petition->id}}">{{$petition->mfy}}</option>
                                    <option>Churkalon Mfy</option>
                                    <option>Yangijon Mfy</option>
                                    <option>Bekabad Mfy</option>
                            @else
                                    <option>Churkalon Mfy</option>
                                    <option>Yangijon Mfy</option>
                                    <option>Bekabad Mfy</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Qishlog'i</label>
                            <input type="text"  value="{{$petition->village}}"  name="village" class="form-control" id="exampleInputEmail1" placeholder="Qishlog'i">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telefon</label>
                            <input type="text"  value="{{$petition->phone}}" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Telefon">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">tavsifi</label>
                            <textarea class="form-control"  name="desc" id="" cols="30" rows="4" placeholder="tavsifi">{{$petition->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Masul Xodim</label>
                            <input type="text"  value="{{$petition->employee}}" name="employee" class="form-control" id="exampleInputEmail1" placeholder="Xodim">
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tahrirlash</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection
