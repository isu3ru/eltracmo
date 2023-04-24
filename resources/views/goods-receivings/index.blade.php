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
            Good Receivings
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card border border-primary">
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover" id="goodReceivingsTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order ID</th>
                                <th>Received By</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
