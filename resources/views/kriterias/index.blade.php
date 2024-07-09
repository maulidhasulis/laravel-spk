@extends('layouts.app')

@section('title', 'List Kriteria')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List Kriteria</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">List Kriteria</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-table me-1"></i>
                    List Kriteria
                </div>
                <a href="{{ route('kriterias.create') }}" class="btn btn-primary">Add</a>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Weight</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($kriterias as $kriteria)
                        <tr>
                            <td>{{ $kriteria->name }}</td>
                            <td>{{ $kriteria->weight }}</td>
                            <td>{{ ucfirst($kriteria->type) }}</td>
                            <td>
                                <a href="{{ route('kriterias.edit', $kriteria->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('kriterias.destroy', $kriteria->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
