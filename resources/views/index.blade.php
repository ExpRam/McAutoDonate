@extends('layout.app')

@section('title', 'YourServer.com - Main Page')

@section('content')
    <div id="main" class=" w-full h-screen bg-cover text-center flex items-center flex-col justify-center text-white">
        <h1 class="font-semibold text-2xl md:text-5xl">YOURSERVER.COM</h1>
        <h2 class="text-base">The site was created with McAuto Donate</h2>
        <h2 class="text-2xl">
            You`re logged in as:
            <p>{{ auth()->user()->nickname }}</p>
        </h2>
        <form action="{{ route('logout') }}">
            <button
                class="hover:shadow-form rounded-md bg-gradient-to-r from-[#FE5A1C] to-[#FE7C22] mt-5 py-3 px-8 text-base font-semibold text-white outline-none">
                Logout
            </button>
        </form>
        <button id="description"
                class="hover:shadow-form rounded-md bg-gradient-to-r from-[#FE5A1C] to-[#FE7C22] mt-5 py-3 px-8 text-base font-semibold text-white outline-none">
            Donate Description
        </button>
    </div>
    <div>
        <p class="mt-5 text-center text-5xl font-semibold">Donate</p>
        <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-5 gap-5">
            @foreach($donates as $donate)
                <x-cards.donate-card :donate="$donate"/>
            @endforeach
        </div>
    </div>
    <x-modals.checkout/>

    <x-modals.description>
        @foreach($donates as $donate)
            <x-cards.description-card :donate="$donate"/>
        @endforeach
    </x-modals.description>
    <form>@csrf</form>
    @vite('resources/js/ajax.js')
@endsection
