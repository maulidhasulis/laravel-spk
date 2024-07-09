@extends('layouts.app')

@section('title', 'Edit Kriteria')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Kriteria</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Kriteria</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Edit Kriteria
            </div>
            <div class="card-body">
                <form action="{{ route('kriterias.update', $kriteria->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $kriteria->name }}" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="weight">Weight</label>
                        <input type="number" step="0.01" class="form-control" id="weight" name="weight" value="{{ $kriteria->weight }}" placeholder="Masukkan Weight">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control" id="type" name="type">
                            <option value="benefit" {{ $kriteria->type == 'benefit' ? 'selected' : '' }}>Benefit</option>
                            <option value="cost" {{ $kriteria->type == 'cost' ? 'selected' : '' }}>Cost</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
