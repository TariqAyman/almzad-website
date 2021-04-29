@isset($pageConfigs)
{!! \App\Helpers\Helpers::updatePageConfig($pageConfigs) !!}
@endisset

    <!DOCTYPE html>
{{-- {!! \App\Helpers\Helpers::applClasses() !!} --}}
@php
    $configData = \App\Helpers\Helpers::applClasses();
@endphp

<html lang="@if(session()->has('locale')){{session()->get('locale')}}@else{{$configData['defaultLanguage']}}@endif"
      data-textdirection="{{ env('MIX_CONTENT_DIRECTION') === 'rtl' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title') - {{ setting('company_name') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    {{-- Include core + vendor Styles --}}
    @include('dashboard.panels/styles')

</head>



@isset($configData["mainLayoutType"])
    @extends((( $configData["mainLayoutType"] === 'horizontal') ? 'dashboard.layouts.horizontalLayoutMaster' : 'dashboard.layouts.verticalLayoutMaster' ))
@endisset
