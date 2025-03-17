@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-boxes"></i> Add Inventory</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('inventories.index') }}">Inventories</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-plus"></i> Add New Inventory</h3>
                </div>
                <form action="{{ route('inventories.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="film_id">Film</label>
                            <select class="form-control @error('film_id') is-invalid @enderror" 
                                id="film_id" name="film_id">
                                <option value="">Select Film</option>
                                @foreach ($films as $film)
                                    <option value="{{ $film->film_id }}">{{ $film->title }}</option>
                                @endforeach
                            </select>
                            @error('film_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="store_id">Store</label>
                            <select class="form-control @error('store_id') is-invalid @enderror" 
                                id="store_id" name="store_id">
                                <option value="">Select Store</option>
                                @foreach ($stores as $store)
                                    <option value="{{ $store->store_id }}">{{ $store->store_id }}</option>
                                @endforeach
                            </select>
                            @error('store_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('inventories.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection