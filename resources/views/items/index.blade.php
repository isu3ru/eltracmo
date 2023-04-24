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
            Items
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-6">
            <div class="card border border-primary">
                <div class="card-header bg-primary text-white">Create new item</div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" required value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror

                        
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="model">Model</label>
                                    <input type="text" name="model" id="model"
                                        class="form-control @error('model') is-invalid @enderror"
                                        value="{{ old('model') }}" required>
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

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-2">
                                    <label for="weight">Weight</label>
                                    <input type="text" name="weight" id="weight"
                                        class="form-control @error('weight') is-invalid @enderror"
                                        value="{{ old('weight') }}">
                                    @error('weight')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-2">
                                    <label for="height">Height</label>
                                    <input type="text" name="height" id="height"
                                        class="form-control @error('height') is-invalid @enderror"
                                        value="{{ old('height') }}">
                                    @error('height')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-2">
                                    <label for="length">Length</label>
                                    <input type="text" name="length" id="length"
                                        class="form-control @error('length') is-invalid @enderror"
                                        value="{{ old('length') }}">
                                    @error('length')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="unit_price">Unit Price</label>
                                    <input type="number" name="unit_price" id="unit_price"
                                        class="form-control @error('unit_price') is-invalid @enderror" required
                                        value="{{ old('unit_price') }}">
                                    @error('unit_price')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="reorder_qty">Reorder qty</label>
                                    <input type="number" name="reorder_qty" id="reorder_qty"
                                        class="form-control @error('reorder_qty') is-invalid @enderror" required
                                        value="{{ old('reorder_qty') }}">
                                    @error('reorder_qty')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 float-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover" id="itemsTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Model</th>
                                <th>Price</th>
                                <th>qty</th>
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
