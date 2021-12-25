    <script src="{{asset('backend')}}/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{asset('backend')}}/assets/js/jquery.min.js"></script>
	<script src="{{asset('backend')}}/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{asset('backend')}}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{asset('backend')}}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!-- Vector map JavaScript -->
	<script src="{{asset('backend')}}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="{{asset('backend')}}/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<!-- highcharts js -->
	<script src="{{asset('backend')}}/assets/plugins/highcharts/js/highcharts.js"></script>
	<script src="{{asset('backend')}}/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="{{asset('backend')}}/assets/js/index2.js"></script>
	<!--app JS-->
	<script src="{{asset('backend')}}/assets/js/app.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        new PerfectScrollbar('.dashboard-top-countries');
    </script>



    <script>
        setTimeout(function(){
          $('.alert').slideUp();
        },4000);
    </script>







    <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
    </script>
    <!--   Core JS Files   -->



