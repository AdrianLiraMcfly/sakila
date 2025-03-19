@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-edit"></i> Edit Inventory</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('inventories.index') }}">Inventories</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-edit"></i> Update Inventory</h3>
                </div>
                <form action="{{ route('inventories.update', $inventory->inventory_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="film">Film</label>
                            <select class="form-control @error('film_id') is-invalid @enderror" 
                                    id="film_id" name="film_id" required>
                                <option value="">Select a Film</option>
                                @foreach($films as $film)
                                    <option value="{{ $film->film_id }}" {{ old('film_id', $inventory->film_id) == $film->film_id ? 'selected' : '' }}>
                                        {{ $film->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('film_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="store">Store</label>
                            <select class="form-control @error('store_id') is-invalid @enderror" 
                                    id="store_id" name="store_id" required>
                                <option value="">Select a Store</option>
                                @foreach($stores as $store)
                                    <option value="{{ $store->store_id }}" {{ old('store_id', $inventory->store_id) == $store->store_id ? 'selected' : '' }}>
                                        {{ $store->store_id }}
                                    </option>
                                @endforeach
                            </select>
                            @error('store_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('inventories.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection