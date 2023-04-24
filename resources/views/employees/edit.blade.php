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
            Employees
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-6">
            <div class="card border border-warning">
                <div class="card-header bg-warning text-white">Update employee</div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="firstname">Firstname</label>
                                    <input type="text" name="firstname" id="firstname"
                                        class="form-control @error('firstname') is-invalid @enderror" required
                                        value="{{ $employee->name }}">
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="lastname">Lastname</label>
                                    <input type="text" name="lastname" id="lastname"
                                        class="form-control @error('lastname') is-invalid @enderror"
                                        value="{{ old('lastname') }}">
                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="mobile_number">Mobile Number</label>
                            <input type="tel" name="mobile_number" id="mobile_number"
                                class="form-control @error('mobile_number') is-invalid @enderror"
                                value="{{ old('mobile_number') }}">
                            @error('mobile_number')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="email_address">Email Address</label>
                            <input type="tel" name="email_address" id="email_address"
                                class="form-control @error('email_address') is-invalid @enderror" required
                                value="{{ old('email_address') }}">
                            @error('email_address')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <button type="submit" class="btn btn-warning">Update Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover" id="employeeTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Mobile Number</th>
                                <th>Email</th>
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
