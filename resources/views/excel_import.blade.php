@extends('layout.main')

@push('title')
    <title>EMS | Create</title>
    <style>
        body {
            background-color: #df9ef5;
            margin: 0px;

        }


        #login {
            height: 550px;
            width: 400px;
            box-shadow: 0.5px 0.5px 3px 3px #888888;
            background-color: #ffffff;
        }

        select {
            height: 30px;
            border: 0px solid black;
            font-size: 15px;
            box-shadow: 0.5px 3px 3px #888888;
            width: 220px;

        }
    </style>
@endpush
@section('main-section')
    <div id="login_box">

        <div id="login">
            <div id="login_h">
                Import User
            </div>

            <div id="form_container">
                <div id="forms">
                    <form id="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group" >

                            <input type="file" name="myfile" id="myfile" aria-describedby="helpId" >
                            <span id="emyfile"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="send" value="Import">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="jquary.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  --}}
    <script>
        jQuery('#form').submit(function(e) {
            e.preventDefault();
            jQuery.ajax({
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
                url: "{{ url('/excel_import') }}",
                type: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                processData: false,
                success: function(result) {
                    window.location = '/view';
                }
            });
        });
    </script>
@endsection
