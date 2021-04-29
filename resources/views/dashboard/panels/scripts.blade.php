{{-- Vendor Scripts --}}
<script src="{{ asset(mix('dashboard/vendors/js/vendors.min.js')) }}"></script>
<script src="{{ asset(mix('dashboard/vendors/js/ui/prism.min.js')) }}"></script>
@yield('vendor-script')
{{-- Theme Scripts --}}
<script src="{{ asset(mix('dashboard/js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('dashboard/js/core/app.js')) }}"></script>
@if($configData['blankPage'] === false)
    <script src="{{ asset(mix('dashboard/js/scripts/customizer.js')) }}"></script>
@endif
<script src="{{ asset(mix('dashboard/vendors/js/extensions/toastr.min.js')) }}"></script>
{{-- page script --}}
@yield('page-script')
{{-- page script --}}


