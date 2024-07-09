@extends('layouts.app')

@section('title', 'List Alternatif')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List Alternatif</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">List Alternatif</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-table me-1"></i>
                    List Alternatif
                </div>
                <div>
                    <a href="{{ route('alternatifs.create') }}" class="btn btn-primary">Add</a>
                </div>
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
                            @foreach($kriterias as $kriteria)
                                <th>{{ $kriteria->name }}</th>
                            @endforeach
                            <th>Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($alternatifs as $alternatif)
                        <tr>
                            <td>{{ $alternatif->name }}</td>
                            @foreach($alternatif->kriterias as $kriteria)
                                <td>{{ $kriteria->pivot->value }}</td>
                            @endforeach
                            <td>
                                <a href="{{ route('alternatifs.edit', $alternatif->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('alternatifs.destroy', $alternatif->id) }}" method="POST" style="display:inline;">
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
