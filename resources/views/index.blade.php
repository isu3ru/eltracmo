@extends('layouts.master')

@section('title')
    @lang('translation.Dashboards')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Dashboards
        @endslot
        @slot('title')
            Dashboard
        @endslot
    @endcomponent

    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi corrupti iste laborum similique ipsam quas quidem
        impedit explicabo quam, vel quasi quis et expedita assumenda maxime asperiores perferendis ipsum natus?</p>
@endsection
