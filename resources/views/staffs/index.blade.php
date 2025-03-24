@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-users"></i> Staffs</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Staffs</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title"><i class="fas fa-list"></i> List of Staffs</h3>
                    @if(session('role_id') !=3)
                    <a href="{{ route('staffs.create') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Add Staff
                    </a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Staff ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Address ID</th>
                                    <th>Email</th>
                                    <th>Store ID</th>
                                    <th>Active</th>
                                    <th>Rol</th>
                                    <th>Username</th>
                                    @if(session('role_id') !=3)
                                    <th class="text-center">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($staffs as $staff)
                                    <tr>
                                        <td>{{ $staff->staff_id }}</td>
                                        <td>{{ $staff->first_name }}</td>
                                        <td>{{ $staff->last_name }}</td>
                                        <td>{{ $staff->address->address }}</td>
                                        <td>{{ $staff->email }}</td>
                                        <td>{{ $staff->store_id }}</td>
                                        <td>{{ $staff->active }}</td>
                                        <td>{{ $staff->role ? $staff->role->name : 'No Role Assigned' }}</td>
                                        <td>{{ $staff->username }}</td>
                                        @if(session('role_id') !=3)
                                        <td class="text-center">
                                            <a href="{{ route('staffs.edit', $staff->staff_id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('staffs.destroy', $staff->staff_id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this staff member?')">
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
                        {{ $staffs->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-staff').forEach(button => {
            button.addEventListener('click', function() {
                let staffId = this.getAttribute('data-id');
                if (confirm('Are you sure you want to delete this staff member?')) {
                    let form = document.createElement('form');
                    form.action = `{{ url('staffs') }}/${staffId}`;
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