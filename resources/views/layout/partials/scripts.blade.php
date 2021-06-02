<!-- core:js -->
<script src="{{ asset('vendors/core/core.js') }}"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="{{ asset('vendors/chartjs/Chart.min.js') }}"></script>
<script src="{{ asset('vendors/jquery.flot/jquery.flot.js') }}"></script>
<script src="{{ asset('vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('vendors/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('vendors/progressbar.js/progressbar.min.js') }}"></script>
<!-- end plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('js/template.js') }}"></script>
<!-- endinject -->

{{-- Datatables --}}
{{-- <script type="text/javascript"
    src="https://cdn.datatables.net/v/dt/dt-1.10.21/b-1.6.3/b-colvis-1.6.3/b-html5-1.6.3/datatables.min.js"></script> --}}

<!-- custom js for this page -->
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/datepicker.js') }}"></script>
<!-- end custom js for this page -->
<script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('js/data-table.js') }}"></script>




@yield('scripts')
