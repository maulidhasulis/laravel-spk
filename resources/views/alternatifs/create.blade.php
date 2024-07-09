@extends('layouts.app')

@section('title', 'Add Alternatif')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Alternatif</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="{{ route('alternatifs.index') }}">List Alternatif</a></li>
            <li class="breadcrumb-item active">Add Alternatif</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-plus me-1"></i>
                Add Alternatif
            </div>
            <div class="card-body">
                <form action="{{ route('alternatifs.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
                    </div>
                    @foreach($kriterias as $kriteria)
                        <div class="form-group">
                            <label for="kriteria_{{ $kriteria->id }}">{{ $kriteria->name }}</label>
                            <input type="number" class="form-control" id="kriteria_{{ $kriteria->id }}" name="kriterias[{{ $kriteria->id }}]" placeholder="Masukkan {{ $kriteria->name }}">
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
