@extends('SuperAdmin.layout.master')
@section('title','Xabarlarni kurish')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Kurish</h3>
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
                                        <td class="d-flex">
                                            <a class="btn btn-success" href="{{route('user.edit',$user)}}" title="Tahrirlash"><i class="far fa-edit"></i></a>&nbsp;&nbsp;
                                            <form action="{{route('user.destroy',$user)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <div class="delete">
                                                <button type="submit" id="delete" class="btn btn-danger show_confirm delete" title="O'chirish"><i class="far fa-trash-alt"></i></button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <div style="margin: 20px;"> {{$users->links()}}</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('script')
    <script type="text/javascript">

        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: Вы хотите убрать Категории?,
                // text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
        $(function (){
            $('#delete').on('click',function (e)
            {
                e.preventDefault();
                var form = $(this).closest('form');
                swal({
                    title : "Are you sure ?",
                    text : "You want to delete this record",
                    type : "warning",
                    buttons : ["No","Yes"],
                    confirmButtonColor: "#dc3545"
                }).then(function (result)
                {
                    if (result)
                    {
                        form.submit()
                    }
                })
            })
        })
    </script>
@endpush
