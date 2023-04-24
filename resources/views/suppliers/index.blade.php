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
            Suppliers
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-6">
            <div class="card border border-primary">
                <div class="card-header bg-primary text-white">Create new supplier</div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="mb-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" required
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address"
                                class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                            @error('address')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="telephone">Telephone</label>
                            <input type="tel" name="telephone" id="telephone"
                                class="form-control @error('telephone') is-invalid @enderror"
                                value="{{ old('telephone') }}">
                            @error('telephone')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" required
                                value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="contact_person_name">Contact Person Name</label>
                            <input type="text" name="contact_person_name" id="contact_person_name"
                                class="form-control @error('contact_person_name') is-invalid @enderror" required
                                value="{{ old('contact_person_name') }}">
                            @error('contact_person_name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="contact_person_telephone">Contact Person Telephone</label>
                            <input type="tel" name="contact_person_telephone" id="contact_person_telephone"
                                class="form-control @error('contact_person_telephone') is-invalid @enderror" required
                                value="{{ old('contact_person_telephone') }}">
                            @error('contact_person_telephone')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="contact_person_email">Contact Person Email</label>
                            <input type="email" name="contact_person_email" id="contact_person_email"
                                class="form-control @error('contact_person_email') is-invalid @enderror" required
                                value="{{ old('contact_person_email') }}">
                            @error('contact_person_email')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
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
                    <table class="table table-bordered table-striped table-hover" id="suppliersTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Telephone</th>
                                <th>Contact Person Name & Telephone</th>
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
