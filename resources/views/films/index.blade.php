@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-film"></i> Films</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Films</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title"><i class="fas fa-list"></i> List of Films</h3>
                    <a href="{{ route('films.create') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Add New Film
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Rating</th>
                                    <th>Release Year</th>
                                    <th>Rental Rate</th>
                                    <th>Length</th>
                                    <th>Replacement Cost</th>
                                    <th>Special Features</th>
                                    <th>Language</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($films as $film)
                                    <tr>
                                        <td>{{ $film->film_id }}</td>
                                        <td>{{ $film->title }}</td>
                                        <td>{{ $film->description }}</td>
                                        <td>{{ $film->rating }}</td>
                                        <td>{{ $film->release_year }}</td>
                                        <td>{{ $film->rental_rate }}</td>
                                        <td>{{ $film->length }}</td>
                                        <td>{{ $film->replacement_cost }}</td>
                                        <td>{{ $film->special_features }}</td>
                                        <td>{{ $film->language ? $film->language->name : 'No Language' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('films.edit', $film->film_id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm delete-film" data-id="{{ $film->film_id }}">
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
                        {{ $films->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-film').forEach(button => {
            button.addEventListener('click', function() {
                let filmId = this.getAttribute('data-id');
                if (confirm('Are you sure you want to delete this film?')) {
                    let form = document.createElement('form');
                    form.action = `{{ url('films') }}/${filmId}`;
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