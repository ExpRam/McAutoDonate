@extends('layout.app')

@section('title', 'YourServer.com - Login')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 xl:px-12">
        <div class="flex h-screen flex-col items-center justify-center space-y-6 text-center">
            <h1 class="text-4xl font-bold tracking-normal sm:text-5xl lg:text-6xl">YOURSERVER.COM</h1>
            <p class="max-w-screen-sm text-lg text-gray-600 sm:text-2xl">Please enter your minecraft nickname to continiune.</p>
            @error('nickname')
                <h1 class="text-red-500">{{ $message }}</h1>
            @enderror
            <form action="{{ route('login_process') }}" method="POST" class="flex w-full max-w-md flex-col items-center space-y-3 sm:flex-row sm:space-y-0 sm:space-x-3">
                @csrf
                <input
                    type="text"
                    name="nickname"
                    class="w-full rounded-md border bg-gray-50 px-4 py-2 outline-none focus:border-orange-200 disabled:cursor-not-allowed disabled:opacity-50 @error('nickname') border-red-500 @enderror"
                    placeholder="Jhon123" />
                <button
                    type="submit"
                    class="w-full mt-32 rounded-md border border-orange-200 bg-orange-500 py-2 px-6 text-white transition hover:border-orange-400 hover:bg-orange-600 outline-none focus:bg-orange-200 sm:max-w-max">
                    Continiune</button>
            </form>
        </div>
    </div>
@endsection
