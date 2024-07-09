@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="mt-4">Welcome, {{ Auth::user()->name }} </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Selamat datang di sistem pendukung keputusan calon kandidat organisasi</li>
    </ol>
    
@endsection
