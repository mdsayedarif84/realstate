<script src="{{asset('backend/assets/vendors/core/core.js')}}"></script>
	<!-- endinject -->
	<!-- Plugin js for this page -->
    <script src="{{asset('backend/assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{asset('backend/assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/template.js')}}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
    <script src="{{asset('backend/assets/js/dashboard-dark.js')}}"></script>
    <script src="{{asset('backend/assets/js/jequery.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/jequery.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/toastr.min.js')}}"></script>
	<!-- datatable link -->
	<script src="{{asset('backend/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  	<script src="{{asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
  	<script src="{{asset('backend/assets/js/data-table.js')}}"></script>
	<!-- end datatable -->
	<script>
		@if(Session::has('message'))
		var type = "{{ Session::get('alert-type','info') }}"
		switch(type){
			case 'info':
			toastr.info(" {{ Session::get('message') }} ");
			break;

			case 'success':
			toastr.success(" {{ Session::get('message') }} ");
			break;

			case 'warning':
			toastr.warning(" {{ Session::get('message') }} ");
			break;

			case 'error':
			toastr.error(" {{ Session::get('message') }} ");
			break; 
		}
		@endif 
	</script>
	<!-- sweetAlertMessage -->
	<script src="{{asset('backend/assets/code/code.js')}}"></script>
	<!-- sweetAlert -->
	<script src="{{asset('backend/assets/sweetAlert/sweetalert.js')}}"></script>

