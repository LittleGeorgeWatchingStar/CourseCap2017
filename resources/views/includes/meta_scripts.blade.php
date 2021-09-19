    <script src="{{asset('js/theme/jquery.min.js')}}"></script> 
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('js/theme/popper.min.js')}}"></script>
    <script src="{{asset('js/theme/bootstrap.min.js')}}"></script>
    <!-- apps -->
    <script src="{{asset('js/theme/app.min.js')}}"></script>
    <script src="{{asset('js/theme/app.init.js')}}"></script>
    <script src="{{asset('js/theme/app-style-switcher.js')}}"></script>
    
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('js/theme/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('js/theme/sparkline.js')}}"></script>
   
    <!--Wave Effects -->
    <script src="{{asset('js/theme/waves.js')}}"></script>
   
    <!--Menu sidebar -->
    <script src="{{asset('js/theme/sidebarmenu.js')}}"></script>
   
    <!--Custom JavaScript -->
    <script src="{{asset('js/theme/custom.min.js')}}"></script>
  
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{asset('js/theme/chartist.min.js')}}"></script>
    <script src="{{asset('js/theme/chartist-plugin-tooltip.min.js')}}"></script>
   
    <!--c3 charts -->
    <script src="{{asset('js/theme/d3.min.js')}}"></script>
    <script src="{{asset('js/theme/c3.min.js')}}"></script>
    
    <!--chartjs -->
    <script src="{{asset('js/theme/raphael.min.js')}}"></script>
    <script src="{{asset('js/theme/morris.min.js')}}"></script>  
   
    <script src="{{asset('js/theme/dashboard1.js')}}"></script>  
	<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});	
	</script>
    @yield('scripts')