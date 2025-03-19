@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-store"></i> Edit Store</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('stores.index') }}">Stores</a></li>
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
                    <h3 class="card-title"><i class="fas fa-edit"></i> Update Store</h3>
                </div>
                <form action="{{ route('stores.update', $store->store_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="manager_staff_id">Manager Staff ID</label>
                            <select class="form-control @error('manager_staff_id') is-invalid @enderror" 
                                id="manager_staff_id" name="manager_staff_id">
                                <option value="">-- Select Manager Staff ID --</option>
                                @foreach($staffs as $staff)
                                    <option value="{{ $staff->staff_id }}" {{ old('manager_staff_id', $store->manager_staff_id) == $staff->staff_id ? 'selected' : '' }}>
                                        {{ $staff->first_name }} {{ $staff->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('manager_staff_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address_id">Address ID</label>
                            <select class="form-control @error('address_id') is-invalid @enderror" 
                                id="address_id" name="address_id">
                                <option value="">-- Select Address ID --</option>
                                @foreach($addresses as $address)
                                    <option value="{{ $address->address_id }}" {{ old('address_id', $store->address_id) == $address->address_id ? 'selected' : '' }}>
                                        {{ $address->address }}
                                    </option>
                                @endforeach
                            </select>
                            @error('address_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('stores.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Update Store
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection