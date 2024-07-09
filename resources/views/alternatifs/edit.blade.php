@extends('layouts.app')

@section('title', 'Edit Alternatif')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Alternatif</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Alternatif</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Edit Alternatif
            </div>
            <div class="card-body">
                <form action="{{ route('alternatifs.update', $alternatif->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $alternatif->name }}" placeholder="Masukkan Nama">
                    </div>
                    @foreach($kriterias as $kriteria)
                        <div class="form-group">
                            <label for="kriteria_{{ $kriteria->id }}">{{ $kriteria->name }}</label>
                            <input type="number" class="form-control" id="kriteria_{{ $kriteria->id }}" name="kriterias[{{ $kriteria->id }}]" value="{{ $alternatif->kriterias->find($kriteria->id)->pivot->value ?? '' }}" placeholder="Masukkan {{ $kriteria->name }}">
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
