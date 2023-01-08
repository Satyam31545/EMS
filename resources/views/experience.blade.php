@extends('layout.main')

@push('title')
    <title>EMS | Create</title>
    <style>
        #login {
            height: 100%;
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

        #add {
            text-align: center;
        }
    </style>
@endpush
@section('main-section')
    <div id="login_box">

        <div id="login">
            <div id="login_h">
                Add experience
            </div>

            <div id="form_container">
                <div id="forms">
                    <form id="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <input type="number" name="emp_id" id="emp_id" aria-describedby="helpId"
                                placeholder="     Employee Id">
                        </div>
                        <div id="rep">
                            <div class="form-group">

                                <input type="text" name="compony1" id="compony1" aria-describedby="helpId"
                                    placeholder="    Compony">

                            </div>
                                                        <div class="form-group">

                                <input type="number" name="last_salary1" id="last_salary1" aria-describedby="helpId"
                                    placeholder="    Last salary">

                            </div>
                                                        <div class="form-group">

                                <input type="text" name="desigiation1" id="desigiation1" aria-describedby="helpId"
                                    placeholder="    Desigiation">

                            </div>
                            <div class="form-group">

                                <input type="number" name="experience1" id="experience1" aria-describedby="helpId"
                                    placeholder="    Experience (in month)">

                            </div>
                            <hr>
                        </div>
                        <div onclick="addq(this);" id="add">
                            <p>ADD</p>
                        </div>
                        <input type="hidden" class="add" name="add" value=2>
                        <div class="form-group">
                            <input type="submit" name="submit" id="send" value="REGISTER">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="jquary.js"></script>

    <script>
        function addq(value) {

            opnum = $(value).attr('id');

            append2 = '<div id="rep"><div class="form-group"><input type="text" name="compony'+$('.' + opnum).attr('value')+'" id="compony'+$('.' + opnum).attr('value')+'" aria-describedby="helpId" placeholder="    Compony"></div><div class="form-group"><input type="number" name="last_salary'+$('.' + opnum).attr('value')+'" id="last_salary'+$('.' + opnum).attr('value')+'" aria-describedby="helpId" placeholder="    Last salary"></div><div class="form-group"><input type="text" name="desigiation'+$('.' + opnum).attr('value')+'" id="desigiation'+$('.' + opnum).attr('value')+'" aria-describedby="helpId" placeholder="    Desigiation"></div><div class="form-group"><input type="number" name="experience'+$('.' + opnum).attr('value')+'" id="experience'+$('.' + opnum).attr('value')+'" aria-describedby="helpId" placeholder="    Experience (in month)"></div><hr></div>';

            $("#" + opnum).before(append2);
            rqpnum = $("." + opnum).attr('value');
            rqpnum = eval(rqpnum);
            $("." + opnum).attr('value', rqpnum + 1);
        }
        // ajax

        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({

                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
                url: "{{ url('/experience') }}",
                type: "POST",
                data: jQuery('#form').serialize(),
                success: function(result) {
                    if (result == 1) {
                        window.location = '/view';
                    }

                }
            });
        });
    </script>
@endsection
