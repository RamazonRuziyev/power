@extends('profiles.layout.master')
@section('title','Ariza junatish')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12 p-3" >
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ariza junatish</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form   method="post" id="ajax_form" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Familiya, Ism, Ochestva</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="rayon name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Mahalla Fuqarolar Yig‘ini</label> <br>
                            <select name="mfy" id="" class="form-control @error('mfy') is-invalid @enderror">
                                <option selected disabled >Mfy</option>
                                <option>Churkalon Mfy</option>
                                <option>Yangijon Mfy</option>
                                <option>Bekabad Mfy</option>
                            </select>
                            @error('mfy')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Qishlog'i</label>
                            <input type="text" name="village" class="form-control @error('village') is-invalid @enderror" id="exampleInputEmail1" placeholder="Qishlog'i">
                            @error('village')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telefon raqam</label>
                            <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Telefon">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">tavsifi</label>
                            <textarea class="form-control" name="desc" id="" cols="30" rows="4" placeholder="tavsifi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Masul</label> <br>
                            <select name="employee" id="" class="form-control @error('employee') is-invalid @enderror">
                                <option selected disabled >Masul Xodim</option>
                                @foreach($users as $user )
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            @error('employee')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Saqlash</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            // Formni yuborishni oldini olish
            $("#ajax_form").submit(function(e) {
                e.preventDefault(); // Formni yubormaslik

                // sendAjaxForm funksiyasini chaqiramiz
                sendAjaxForm('result_form', 'ajax_form', '{{ route('petition.store') }}');
            });
        });

        function sendAjaxForm(result_form, ajax_form, url) {
            $.ajax({
                url: url, // URL (Laravelda route orqali yuboriladi)
                type: "POST", // Yuborish usuli (POST)
                dataType: "json", // Javob formati (JSON)
                data: $("#" + ajax_form).serialize(), // Formni serialize qilib yuboramiz
                success: function(response) { // Agar muvaffaqiyatli bo'lsa
                    if(response.success) {
                        // Javobni olish
                        // $('#result_form').html('Ism: ' + response.name + '<br>Telefon: ' + response.phone);

                        // Success alert for the user
                        alert('Petitsiya muvaffaqiyatli yaratildi');

                        // Formni tozalash (bo\'sh qilish)
                        $("#ajax_form")[0].reset();
                        $('#ajax_form').html('');
                        // Reset the form
                        // Optionally, reset select elements to their default option
                        $("#ajax_form").each(function() {
                            $(this).prop('selectedIndex', 0);  // Reset each select field to the first option
                        });

                        // If there are any error messages in the result, clear them after success
                        $('#ajax_form').html('');
                    }
                    else {
                        // Xatolik bo'lsa, error message
                        $('#ajax_form').html('Xato. Ma\'lumotlar yuborildi: ' + response.message);
                    }
                },
                error: function()
                { // Agar xatolik bo'lsa (server tarafidan)
                    $("#ajax_form")[0].reset();
                }
            });
        }
    </script>
@endpush
