@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-calendar-alt"></i> Rentals</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Rentals</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title"><i class="fas fa-list"></i> List of Rentals</h3>
                    <a href="{{ route('rentals.create') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Add Rental
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Rental Date</th>
                                    <th>Inventory</th>
                                    <th>Customer</th>
                                    <th>Return Date</th>
                                    <th>Staff</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rentals as $rental)
                                    <tr>
                                        <td>{{ $rental->rental_date }}</td>
                                        <td>{{ $rental->inventory_id }}</td>
                                        <td>{{ $rental->customer->first_name }}</td>
                                        <td>{{ $rental->return_date }}</td>
                                        <td>{{ $rental->staff->first_name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('rentals.edit', $rental->rental_id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm delete-rental" data-id="{{ $rental->rental_id }}">
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
                        {{ $rentals->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-rental').forEach(button => {
            button.addEventListener('click', function() {
                let rentalId = this.getAttribute('data-id');
                if (confirm('Are you sure you want to delete this rental?')) {
                    let form = document.createElement('form');
                    form.action = `{{ url('rentals') }}/${rentalId}`;
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