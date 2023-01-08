<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EMS | Login</title>
    <link rel="stylesheet" href="mystyle.css">

</head>

<body>
    <div id="container">
        <div id="header">
            EMS
        </div>
    </div>
    <div id="login_box">

        <div id="login">
            <div id="login_h">
                LOGIN 

            </div>

            <div id="form_container">
                <div id="forms">
                    <form id="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">

                            <input type="email" name="email" id="email" aria-describedby="helpId"
                                placeholder="     Email">

                            <span id="eemail"></span>
                        </div>
                        <div class="form-group">

                            <input type="password" name="password" id="password" aria-describedby="helpId"
                                placeholder="    Password">
                                <span id="epassword"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="send" value="LOGIN">
                        </div>
                        <p id="err"> </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="jquary.js"></script>
    <script>
        jQuery('#form').submit(function(e) {
            e.preventDefault();
            jQuery.ajax({
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
                url: "{{ url('/login') }}",
                type: "POST",
                data: jQuery('#form').serialize(),
                error:function (request,status,error){
                    var go= request.responseText;
                        var goo = JSON.parse(go);
                    goo = goo.errors;

                        document.getElementById("eemail").innerHTML=goo.email[0];
                        document.getElementById("epassword").innerHTML=goo.password[0];

                },
                

                success: function(data) {
if (data==1) {
    window.location = '/view';
}else{
    document.getElementById("err").innerHTML="Wrong Email Or Password";

}
                }
            });
        });
    </script>

</body>

</html>