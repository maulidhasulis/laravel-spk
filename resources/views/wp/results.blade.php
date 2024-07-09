@extends('layouts.app')

@section('title', 'Hasil Perhitungan WP')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Hasil Perhitungan WP</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Hasil Perhitungan WP</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-calculator me-1"></i>
                Hasil Perhitungan WP
            </div>
            <div class="card-body">
                <h2>Nilai Vektor (s)</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Nilai Vektor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rankedResults as $id => $result)
                        <tr>
                            <td>{{ $alternatifs->find($id)->name }}</td>
                            <td>{{ number_format($vektors[$id], 4) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <h2>Nilai Peringkat</h2>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Nama</th>
                            <th>Nilai WP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rankedResults as $id => $result)
                        <tr>
                            <td>{{ $result['rank'] }}</td>
                            <td>{{ $alternatifs->find($id)->name }}</td>
                            <td>{{ number_format($result['value'], 4) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
