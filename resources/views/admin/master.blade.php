<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('/')}}admin/assets/css/style.css" />
    <!-- End layout styles -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        
           @include('admin.pages.headerTop')
        
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
            
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include ('admin.inc.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('body')
                </div>
            </div>


        </div>
        <!-- page-body-wrapper ends -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('/')}}admin/assets/js/misc.js"></script>
    <script src="{{ asset('/')}}admin/assets/js/dashboard.js"></script>
    <script src="{{ asset('/')}}admin/assets/js/vendor.bundle.base.js"></script>
    <script src="{{asset('/')}}assets/ckeditor/ckeditor.js"></script>
    <script src="{{asset('/')}}assets/ckeditor/adapters/jquery.js"></script>
    <script src="{{asset('/')}}assets/ckeditor/samples/js/sample.js"></script>
    <script>
      $( 'textarea' ).ckeditor();
    </script>

    <script>
            $('.delete-btn').click(function(){

                event.preventDefault();
                var id = $(this).attr('id');
                var check = confirm('Are You Sure!');

                if (check) {

                    document.getElementById('delForm'+id).submit();
                };
            });
    </script>
</body>

</html>