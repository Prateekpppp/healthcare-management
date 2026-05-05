
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>{{$title ?? 'Clinic Management'}}</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">



   <!-- Place favicon.ico in the root directory -->
   <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets') }}/img/logo/favicon.png">

<link rel="stylesheet" href="{{ asset('assets') }}/vendors/flag-icon-css/css/flag-icons.min.css">
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/mdi/css/materialdesignicons.min.css">  
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/font-awesome/css/font-awesome.min.css">  
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/simple-line-icons/css/simple-line-icons.css">  
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/feather/feather.css">
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/css/vendor.bundle.base.css">
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/jquery-bar-rating/fontawesome-stars.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/vertical-layout-light/style.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/app_style.css">


</head>

<body>
    <div class="container-scroller">
    
        <div class="container-fluid page-body-wrapper full-page-wrapper">

            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                            <img src="{{ asset('assets') }}/images/faces/face10.jpg" width="30px" alt="image">
                        </div>
                        <!-- <h4>Hello! let's get started</h4>
                        <h6 class="fw-light">Sign in to continue.</h6> -->
                        <form class="pt-3" method="post" action="{{route('post.login')}}">
                            @csrf
                        <div class="form-group">
                            <input type="text" name="username" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="mt-3 d-grid gap-2">
                            <button class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">SIGN IN</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    @include('includes/app_toast')
    <script src="{{ asset('assets') }}/vendors/js/vendor.bundle.base.js"></script>
    <script src="{{ asset('assets') }}/vendors/chart.js/chart.umd.js"></script>
    <script src="{{ asset('assets') }}/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/raphael/raphael.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/morris.js/morris.min.js"></script>
    <script src="{{ asset('assets') }}/js/off-canvas.js"></script>
    <script src="{{ asset('assets') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('assets') }}/js/template.js"></script>
    <script src="{{ asset('assets') }}/js/settings.js"></script>
    <script src="{{ asset('assets') }}/js/todolist.js"></script>
    <script src="{{ asset('assets') }}/js/dashboard.js"></script>
    @include('includes/ajaxCalls')
    @include('includes/script')
    
    @if (session('code')=='304')

    <script>
        responseToast("{{session('message')}}",'bg-danger');
    </script>

    @endif
</body>

</html>