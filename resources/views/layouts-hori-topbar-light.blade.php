@extends('layouts.master-layouts')

@section('title') @lang('translation.Topbar_Light') @endsection

@section('body')
    <body data-topbar="light" data-layout="horizontal">
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Layouts @endslot
        @slot('title') Topbar Light @endslot
    @endcomponent
        
@endsection