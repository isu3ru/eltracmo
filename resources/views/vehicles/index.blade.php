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
            Vehicles
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-6">
            <div class="card border border-primary">
                <div class="card-header bg-primary text-white">Add new vehicle</div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="customer_id">Customer ID</label>
                                    <input type="text" name="customer_id" id="customer_id"
                                        class="form-control @error('customer_id') is-invalid @enderror" required
                                        value="{{ old('customer_id') }}">
                                    @error('customer_id')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title') }}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="model">Model</label>
                                    <input type="text" name="model" id="model"
                                        class="form-control @error('model') is-invalid @enderror"
                                        value="{{ old('model') }}">
                                    @error('model')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="color">Color</label>
                                    <input type="text" name="color" id="color"
                                        class="form-control @error('color') is-invalid @enderror"
                                        value="{{ old('color') }}">
                                    @error('color')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="edition">Edition</label>
                                    <input type="text" name="edition" id="edition"
                                        class="form-control @error('edition') is-invalid @enderror"
                                        value="{{ old('edition') }}">
                                    @error('edition')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="registered_year">Registered Year</label>
                                    <input type="text" name="registered_year" id="registered_year"
                                        class="form-control @error('registered_year') is-invalid @enderror" 
                                        value="{{ old('registered_year') }}">
                                    @error('registered_year')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="registration_number">Registration Number</label>
                                    <input type="text" name="registration_number" id="registration_number"
                                        class="form-control @error('registration_number') is-invalid @enderror"
                                        value="{{ old('registration_number') }}">
                                    @error('registration_number')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="current_mileage">Current Mileage</label>
                                    <input type="text" name="current_mileage" id="current_mileage"
                                        class="form-control @error('current_mileage') is-invalid @enderror" 
                                        value="{{ old('current_mileage') }}">
                                    @error('current_mileage')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="remarks">Remarks</label>
                            <textarea name="remarks" id="remarks" cols="30" rows="2" class="form-control"></textarea>
                        </div>

                        <div class="mb-2">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover" id="vehiclesTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Registration Number</th>
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
