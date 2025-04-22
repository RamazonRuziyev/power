@extends('SuperAdmin.layout.master')
@section('title','Role yaratish')
@section('content')
    <div class="row">
        <div class="col-md-12 p-3" >
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Rol yaratish</h3>
                </div>
                <form   method="post" id="ajax_form" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Rol yaratish</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Yaratish">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
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
                sendAjaxForm('result_form', 'ajax_form', '{{ route('roles.store') }}');
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
