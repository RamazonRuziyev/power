@extends('SuperAdmin.layout.master')
@section('title','Xodim')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Xodim Ko'rish</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Name</th>
                                <th>Ariza umimiy necha</th>
                                <th>Qabul qilinganlar soni</th>
                                <th>Qabul qilinmaganlar soni</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{($employees->currentPage() -1 ) * $employees->perPage() + ($loop->index +1)  }}</td>
                                    <td>{{ $employee->name }}</td>
                                @php
                                    $total = $petitions->where('employee', $employee->id)->count();
                                    $accepted = $petitions->where('employee', $employee->id)->where('status', 1)->count();
                                    $canceled = $petitions->where('employee', $employee->id)->where('status', 2)->count();
                                @endphp
                                    <td>{{ $total }}</td>
                                    <td>{{ $accepted }}</td>
                                    <td>{{ $canceled }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        <div style="margin: 20px;"> {{$employees->links()}}</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
