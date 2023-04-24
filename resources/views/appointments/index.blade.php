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
            Appointments
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-6">
            <div class="card border border-primary">
                <div class="card-header bg-primary text-white">Create new appointments</div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <label for="vehicle_id">Vehicle ID</label>
                        <input type="text" name="vehicle_id" id="vehicle_id"
                            class="form-control @error('vehicle_id') is-invalid @enderror" required value="{{ old('vehicle_id') }}">
                        @error('vehicle_id')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="appointment_date">Appointment Date</label>
                                    <input type="date" name="appointment_date" id="appointment_date"
                                        class="form-control @error('appointment_date') is-invalid @enderror"
                                        value="{{ old('appointment_date') }}" required>
                                    @error('appointment_date')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="appointment_time">Appointment Time</label>
                                    <input type="time" name="appointment_time" id="appointment_time"
                                        class="form-control @error('appointment_time') is-invalid @enderror"
                                        value="{{ old('appointment_time') }}">
                                    @error('appointment_time')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 float-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover" id="itemsTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Vehicle Id</th>
                                <th>Date</th>
                                <th>Time</th>
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
