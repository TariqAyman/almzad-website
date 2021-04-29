<link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/vendors.min.css')) }}"/>
<link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/ui/prism.min.css')) }}"/>
<link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/extensions/toastr.min.css')) }}">
{{-- Vendor Styles --}}
@yield('vendor-style')
{{-- Theme Styles --}}

<link rel="stylesheet" href="{{ asset(mix('dashboard/css/core.css')) }}"/>

{{-- {!! \App\Helpers\Helpers::applClasses() !!} --}}
@php $configData = \App\Helpers\Helpers::applClasses(); @endphp

{{-- Page Styles --}}
@if($configData['mainLayoutType'] === 'horizontal')
    <link rel="stylesheet" href="{{ asset(mix('dashboard/css/base/core/menu/menu-types/horizontal-menu.css')) }}"/>
@endif
<link rel="stylesheet" href="{{ asset(mix('dashboard/css/base/core/menu/menu-types/vertical-menu.css')) }}"/>
<!-- <link rel="stylesheet" href="{{ asset(mix('dashboard/css/base/core/colors/palette-gradient.css')) }}"> -->

{{-- Page Styles --}}
@yield('page-style')
<link rel="stylesheet" href="{{ asset(mix('dashboard/css/base/plugins/extensions/ext-component-toastr.css')) }}">
{{-- Laravel Style --}}
<link rel="stylesheet" href="{{ asset(mix('dashboard/css/overrides.css')) }}"/>

{{-- Custom RTL Styles --}}

@if($configData['direction'] === 'rtl' && isset($configData['direction']))
    <link rel="stylesheet" href="{{ asset(mix('dashboard/css/custom-rtl.css')) }}"/>
    <link rel="stylesheet" href="{{ asset(mix('dashboard/css/style-rtl.css')) }}"/>
@endif

{{-- user custom styles --}}
<link rel="stylesheet" href="{{ asset(mix('dashboard/css/style.css')) }}"/>
