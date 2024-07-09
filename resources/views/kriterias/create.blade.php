@extends('layouts.app')

@section('title', 'Add Kriteria')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Kriteria</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="{{ route('kriterias.index') }}">List Kriteria</a></li>
            <li class="breadcrumb-item active">Add Kriteria</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-plus me-1"></i>
                Add Kriteria
            </div>
            <div class="card-body">
                <form action="{{ route('kriterias.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="weight">Weight</label>
                        <input type="number" step="0.01" class="form-control" id="weight" name="weight" placeholder="Masukkan Weight">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control" id="type" name="type">
                            <option value="benefit">Benefit</option>
                            <option value="cost">Cost</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
