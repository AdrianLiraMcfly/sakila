@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-map-marker-alt"></i> Addresses</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Addresses</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title"><i class="fas fa-list"></i> List of Addresses</h3>
                    <a href="{{ route('adresses.create') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Add New Address
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Address</th>
                                    <th>Address 2</th>
                                    <th>District</th>
                                    <th>City ID</th>
                                    <th>Postal Code</th>
                                    <th>Phone</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($adresses as $adress)
                                    <tr>
                                        <td>{{ $adress->address_id }}</td>
                                        <td>{{ $adress->address }}</td>
                                        <td>{{ $adress->address2 }}</td>
                                        <td>{{ $adress->district }}</td>
                                        <td>{{ $adress->city->city }}</td>
                                        <td>{{ $adress->postal_code }}</td>
                                        <td>{{ $adress->phone }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('adresses.edit', $adress->address_id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm delete-address" data-id="{{ $adress->address_id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <div class="d-flex justify-content-center">
                        {{ $adresses->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-address').forEach(button => {
            button.addEventListener('click', function() {
                let addressId = this.getAttribute('data-id');
                if (confirm('Are you sure you want to delete this address?')) {
                    let form = document.createElement('form');
                    form.action = `{{ url('adresses') }}/${addressId}`;
                    form.method = 'POST';
                    form.innerHTML = `
                        @csrf
                        @method('DELETE')
                    `;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
    });
</script>
@endsection