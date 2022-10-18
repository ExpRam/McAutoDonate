@extends('layout.admin')

@section('title', 'Admin Panel - Main Page')

@section('content')
    <main class="w-full mt-32 bg-cover text-center flex items-center flex-col justify-center">
        <h1 class="font-semibold text-2xl md:text-5xl">Welcome back, {{ auth()->user()->username }}</h1>
        <h2 class="text-base">You`re in MCAuto Donate Admin Panel</h2>
    </main>
@endsection
