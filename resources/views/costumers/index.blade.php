@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-users"></i> Customers</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Customers</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title"><i class="fas fa-list"></i> List of Customers</h3>
                    <a href="{{ route('customers.create') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Add Customer
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Store</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Active</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($costumers as $costumer)
                                    <tr>
                                        <td>{{ $costumer->store_id }}</td>
                                        <td>{{ $costumer->first_name }}</td>
                                        <td>{{ $costumer->last_name }}</td>
                                        <td>{{ $costumer->email }}</td>
                                        <td>{{ $costumer->address->address }}</td>
                                        <td>{{ $costumer->active ? 'Active' : 'Inactive' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('customers.edit', $costumer->customer_id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm delete-customer" data-id="{{ $costumer->customer_id }}">
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
                        {{ $costumers->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-customer').forEach(button => {
            button.addEventListener('click', function() {
                let customerId = this.getAttribute('data-id');
                if (confirm('Are you sure you want to delete this customer?')) {
                    let form = document.createElement('form');
                    form.action = `{{ url('customers') }}/${customerId}`;
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