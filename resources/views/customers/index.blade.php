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
            Customers
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-6">
            <div class="card border border-primary">
                <div class="card-header bg-primary text-white">Create new customer</div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="first_name">Firstname</label>
                                    <input type="text" name="first_name" id="first_name"
                                        class="form-control @error('first_name') is-invalid @enderror" required
                                        value="{{ old('first_name') }}">
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="last_name">Lastname</label>
                                    <input type="text" name="last_name" id="last_name"
                                        class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-2">
                            <label for="address">Address</label>
                            <input type="tel" name="address" id="address"
                                class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                            @error('address')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="photo">Photo</label>
                            <input type="file" name="photo" id="photo"
                                class="form-control @error('photo') is-invalid @enderror" required
                                value="{{ old('photo') }}" accept=".jpg, .jpeg, .png">
                            @error('photo')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-3 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="is_mobile_customer" name="is_mobile_customer">
                            <label class="form-check-label" for="is_mobile_customer">
                              Is mobile customer
                            </label>
                          </div>
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
                    <table class="table table-bordered table-striped table-hover" id="customersTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Address</th>
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
