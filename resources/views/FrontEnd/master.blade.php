<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ABCD School</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
</head>

<body id="page-top">

    @include('FrontEnd.head')
    @yield('body')
    @include('FrontEnd.foot')
    @stack('scripts')
    @stack('links')


    <!-- Bootstrap core JS-->

    <!-- Core theme JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="{{asset('js/scripts.js')}}"></script>
    <script>
        $('#login_by_ajax').on('click', function(e) {
            $('#loginmodal').modal('show');
        });

        $('.custom-login').on('click', function(e) {
            var email = $("#email_ajax").val();
            var password = $("#password_ajax").val();
            var token = "{{csrf_token()}}";
            $.ajax({
                type: 'POST',
                url: "{{route('login.custom.ajax')}}",
                data: {
                    email: email,
                    password: password,
                    _token: token,
                },
                success: function(response) {
                    console.log(response);
                    if (response == 1) {
                        window.location.replace("{{route('studenthome.details')}}");
                    } else if (response == 3) {
                        $("#err").hide().html("Username or Password  Incorrect. Please Check").fadeIn('slow');
                    }
                }
            });
        })
    </script>
</body>

</html>