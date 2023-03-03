@extends('layouts.master')

@section('title') @lang('translation.Scrollable') @endsection

@section('body')
    <body data-sidebar="dark" data-layout-scrollable="true">
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Layouts @endslot
        @slot('title') Scrollable @endslot
    @endcomponent
        

@endsection