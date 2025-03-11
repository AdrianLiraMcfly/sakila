@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Languages</h1>
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-primary" href="{{ route('languages.create')}}">Add Language</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Language</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($languages as $language)
                            <tr>
                                <td>{{ $language->name }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('languages.edit', $language->language_id) }}">Edit</a>
                                    <form action="{{ route('languages.destroy', $language->language_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $languages->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection