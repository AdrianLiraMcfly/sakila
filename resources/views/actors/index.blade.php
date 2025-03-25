@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-user"></i> Actors</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Actors</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title"><i class="fas fa-list"></i> List of Actors</h3>
                    @if(session('role_id') !=3 && session('role_id') != 2)
                    <a href="{{ route('actors.create') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Add New Actor
                    </a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    @if(session('role_id') != 3 && session('role_id') != 2)
                                        <th class="text-center">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($actors as $actor)
                                    <tr>
                                        <td>{{ $actor->actor_id }}</td>
                                        <td>{{ $actor->first_name }}</td>
                                        <td>{{ $actor->last_name }}</td>
                                        @if(session('role_id') != 3 && session('role_id') != 2)
                                        <td class="text-center">
                                            <a href="{{ route('actors.edit', $actor->actor_id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm delete-actor" data-id="{{ $actor->actor_id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
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
                        {{ $actors->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-actor').forEach(button => {
            button.addEventListener('click', function() {
                let actorId = this.getAttribute('data-id');
                if (confirm('Are you sure you want to delete this actor?')) {
                    let form = document.createElement('form');
                    form.action = `{{ url('actors') }}/${actorId}`;
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
