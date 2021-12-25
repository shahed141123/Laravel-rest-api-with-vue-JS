<!doctype html>
<html lang="en">

@include('backend.partials.head')

<body class="bg-theme bg-theme2">
<!--wrapper-->
<div class="wrapper" id="app">
    <!--sidebar wrapper -->
@include('backend.partials.sidebar')
<!--end sidebar wrapper -->
    <!--start header -->
    <header>
        @include('backend.partials.navbar')
    </header>

    <!--end header -->
    <!--start page wrapper -->

    <div class="page-wrapper">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 text-center">
                @include('backend.partials.notifications')
            </div>
            <div class="col-md-2"></div>
        </div>
        <admin-master></admin-master>
    </div>
    <!--end page wrapper -->
    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    @include('backend.partials.footer')
</div>
<!--end wrapper-->
<!--start switcher-->
<div class="switcher-wrapper">
    <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
    </div>
    <div class="switcher-body">
        <div class="d-flex align-items-center">
            <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
            <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
        </div>
        <hr/>
        <p class="mb-0">Gaussian Texture</p>
        <hr>
        <ul class="switcher">
            <li id="theme1"></li>
            <li id="theme2"></li>
            <li id="theme3"></li>
            <li id="theme4"></li>
            <li id="theme5"></li>
            <li id="theme6"></li>
        </ul>
        <hr>
        <p class="mb-0">Gradient Background</p>
        <hr>
        <ul class="switcher">
            <li id="theme7"></li>
            <li id="theme8"></li>
            <li id="theme9"></li>
            <li id="theme10"></li>
            <li id="theme11"></li>
            <li id="theme12"></li>
        </ul>
    </div>
</div>
<!--end switcher-->
@include('backend.partials.script')
</body>

</html>
