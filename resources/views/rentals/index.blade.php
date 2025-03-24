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
                    @if(session('role_id') !=3)
                    <a href="{{ route('rentals.create') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Add Rental
                    </a>
                    @endif
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
                                    @if(session('role_id') !=3)
                                    <th class="text-center">Actions</th>
                                    @endif
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
                                        @if(session('role_id') !=3)
                                        <td class="text-center">
                                            <a href="{{ route('rentals.edit', $rental->rental_id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('rentals.destroy', $rental->rental_id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this rental?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                        @endif
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