@extends('admin.layout.master')
@section('title','xabar')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Arizalar</h3>
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
{{--                                <th>Masul Xodim</th>--}}
                                <th>tavsifi</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($petitions as $key=>$petition)
                                <tr id="petition {{ $petition->id }}" >
                                    <td>{{($petitions->currentPage() -1) * $petitions->perPage() + ($loop->index +1)}}</td>
                                    <td>{{$petition->fio}}</td>
                                    <td>{{$petition->mfy}}</td>
                                    <td>{{$petition->village}}</td>
                                    <td>{{$petition->phone}}</td>
{{--                                    <td>{{$petition->employee}}</td>--}}
                                    <td>{{$petition->description}}</td>
                                    <td class="d-flex">
                                        <a class="btn btn-primary accept-btn" data-petition-id="{{ $petition->id }}" href="{{route('dashboard.notification.accept',$petition)}}">Qabul qiling</a>&nbsp;&nbsp;
                                        <a class="btn btn-danger"  href="{{route('dashboard.notification.cancel',$petition)}}">Bekor qilish</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@push('script')
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            // Accept Petition--}}
{{--            $(document).on('click', '.accept-btn', function (e) {--}}
{{--                e.preventDefault();--}}

{{--                // Get the petition ID from the button's data attribute--}}
{{--                var petitionId = $(this).data('petition-id');--}}

{{--                // Prepare the URL by replacing :id with the petition's ID--}}
{{--                var url = '{{ route("dashboard.notification.accept", ":id") }}';--}}
{{--                url = url.replace(':id', petitionId);--}}

{{--                $.ajax({--}}
{{--                    url: url, // The route URL to send the request to--}}
{{--                    type: 'POST', // Using POST method--}}
{{--                    data: {--}}
{{--                        _token: '{{ csrf_token() }}', // CSRF token for security--}}
{{--                        petition_id: petitionId // Send petition ID to the server--}}
{{--                    },--}}
{{--                    success: function (response) {--}}
{{--                        if (response.success) {--}}
{{--                            // Show success message--}}
{{--                            alert(response.message);--}}

{{--                            // Fade out the row of the accepted petition--}}
{{--                            $('#petition' + petitionId).fadeOut();--}}
{{--                        }--}}
{{--                        // else {--}}
{{--                        //     // If there's an error, show the error message--}}
{{--                        //     alert('Xato! ' + response.message);--}}
{{--                        // }--}}
{{--                    },--}}
{{--                    error: function () {--}}
{{--                        // In case of error, alert the user--}}
{{--                        alert('Xatolik yuz berdi!');--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endpush
