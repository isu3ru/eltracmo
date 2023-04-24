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
            Holidays
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-6">
            <div class="card border border-primary">
                <div class="card-header bg-primary text-white">Create new employee</div>
                <div class="card-body">
                    <form action="{{ route('employees.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="date">Date</label>
                                <input type="date" name="date" id="date"
                                    class="form-control @error('date') is-invalid @enderror" required
                                    value="{{ old('date') }}">
                                @error('date')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-8">
                                <label for="title">Title</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                            @error('title')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
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
                    <table class="table table-bordered table-striped table-hover" id="holidayTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Title</th>
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
