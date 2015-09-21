<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="/admin/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        
        
    </head>
            <div class="form-box" id="login-box">
            <div><?php echo (isset($message) ? $message : ''); ?></div>
            <div class="header">Sign In</div>
            <form name='loginForm' id="loginForm"  method="post" action="/airlines/validate" data-abide novalidate="novalidate">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required=""/>
                    </div>
                    
                </div>
                <div class="footer bg-gray">
                    <button type="submit" name="submit" class="btn bg-olive btn-block">Sign me in</button>
                </div>
            </form>
        </div>

        <script src="/admin/js/jquery.min.js"></script>
        <script src="/admin/js/bootstrap.min.js" type="text/javascript"></script>
        
        <?php
        /*
        <script type="text/javascript">
          
            $(document).ready(function() {
                
                validiteFormBeforeSubmit();
                $("#loginForm").submit(function(e) {
                    e.preventDefault();
                    validiteFormBeforeSubmit();
                });
                
            });
            
            function validiteFormBeforeSubmit() {
                
                $('#loginForm').unbind('valid');
                $('#loginForm').on('valid', function() {
                    var formAction = '/user/validate';
                    postArray = {
                        email: $('#email').val(),
                        password: $('#password').val()
                    };

                    $.post(formAction, postArray, function(data) {
                        if ($.trim(data.result) == 'yes') {
                           document.location = "/user/dashboard";
                        } else if ($.trim(data.result) == 'dashboard') {
                            document.location = "/user/dashboard";
                        } else {
                            $('#error_message_block').show();
                            $("#message").show().removeClass().addClass("small-6 columns error_message_align alert alert-box").html("Invalid Email/Password");
                        }
                    }, 'json');
                });
            }
            
        </script>
        ?>
        
    </body>
</html>
