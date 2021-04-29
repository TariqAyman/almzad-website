@section('vendor-style')
    @parent
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')) }}">
@endsection

@section('vendor-script')
    @parent
    {{-- vendor files --}}
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/buttons.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/jszip.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
@endsection

@section('page-script')
    @parent
    <!-- Dependencies -->
    {{--    <script src="{{ mix('dashboard/vendor/libs/datatables/datatables.js') }}"></script>--}}
@endsection
