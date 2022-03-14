<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Zenegal Test</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body style="background: #214a80;">
    <div class="login-dark" style="height: 695px;">
        
        <form method="POST" id="formLogin">
            <div id="detailsView">
                <h2 class="sr-only">Login Form</h2>
                {{ csrf_field() }}
                <div class="illustration">
                    <i class="icon ion-ios-locked-outline"></i>
                </div>

                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email">
                </div>

                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>

                <div class="form-group">
                    <div class="message-box">
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Log In</button>
                </div>
                <a class="forgot" href="#">Forgot your email or password?</a>
            </div>
        </form>
        
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#formLogin").validate({
                rules: {
                    email: {
                        required: true,
                        minlength: 2
                    },
                    password: {
                        required: true,
                        minlength: 5
                    }
                },
                messages: {
                    email: {
                        required: "Email is required",
                        minlength: "Email must consist of at least 2 characters"
                    },
                    password: {
                        required: "Password is required",
                        minlength: "Password must consist of at least 5 characters"
                    }
                },
                submitHandler: function(form) {
                    
                    $('.message-box').html();
                    $.ajax({
                        url: "{{URL::to('/main/checklogin')}}",
                        type: "POST",
                        data: $(form).serialize(),
                        dataType: "json",
                        success: function(data) {
                            //alert(data.status);
                            if(data.status == true){
                                $('.message-box').html('<div class="alert alert-success">'+ data.message +'</div>');
                                $("#detailsView").html('');
                                
                                $.ajax({
                                    url: "{{URL::to('/main/successlogin')}}",
                                    type: "GET",
                                    dataType: 'json',
                                    success: function(ajaxdata) {
                                        if($.isEmptyObject(ajaxdata.error)){
                                            //alert(dep_data.element);
                                            $('#detailsView').html(ajaxdata.element);
                                            setTimeout("location.href = '{{URL::to('dashboard')}}';", 1000);
                                        }
                                    }

                                });

                            }else{
                                $('.message-box').html('<div class="alert alert-danger">'+ data.message +'</div>');
                            }
                        }            
                    });
                }
            });
        });
    </script>
</body>

</html>