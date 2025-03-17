@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-city"></i> Create City</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('city.index') }}">Cities</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-plus"></i> Add New City</h3>
                </div>
                <form action="{{ route('city.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" 
                                class="form-control @error('name') is-invalid @enderror" 
                                value="{{ old('name') }}" placeholder="Enter city name">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="contry_id">Country</label>
                            <select name="country_id" id="country_id" 
                                class="form-control @error('country_id') is-invalid @enderror">
                                <option value="">Select Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"> {{$country->country}}
                                    </option>
                                @endforeach
                            </select>
                            @error('country_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('city.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Create City
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection