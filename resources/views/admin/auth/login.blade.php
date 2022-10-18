@extends('layout.app')

@section('title', 'Admin Panel - Login')

@section('content')
    <body class="antialiased bg-gradient-to-br from-orange-100 to-white">
    <div class="container px-6 mx-auto">
        <div
            class="flex flex-col text-center md:text-left md:flex-row h-screen justify-evenly md:items-center"
        >
            <div class="flex flex-col w-full">
                <div>
                    <svg
                        class="w-20 h-20 mx-auto md:float-left fill-stroke text-gray-800"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
                        ></path>
                    </svg>
                </div>
                <h1 class="text-5xl text-gray-800 font-bold">Admin Panel</h1>
                <p class="w-5/12 mx-auto md:mx-0 text-gray-500">
                    Created with MCAuto Donate
                </p>
            </div>
            <div class="w-full md:w-full lg:w-9/12 mx-auto md:mx-0">
                <div class="bg-white p-10 flex flex-col w-full shadow-xl rounded-xl">
                    <h2 class="text-2xl font-bold text-gray-800 text-left mb-5">
                        Login
                    </h2>
                    <form action="{{ route('admin.login_process') }}" method="POST" class="w-full">
                        @csrf
                        @error('username')
                        <h1 class="text-red-500">{{ $message }}</h1>
                        @enderror
                        <div class="flex flex-col w-full my-5">
                            <label for="username" class="text-gray-500 mb-2"
                            >Username</label
                            >
                            <input
                                type="text"
                                name="username"
                                placeholder="Username"
                                class="appearance-none border-2 border-gray-100 rounded-lg px-4 py-3 placeholder-gray-300 outline-none focus:border-orange-200 focus:shadow-lg"
                            />
                        </div>
                        @error('password')
                        <h1 class="text-red-500">{{ $message }}</h1>
                        @enderror
                        <div class="flex flex-col w-full my-5">
                            <label for="password" class="text-gray-500 mb-2"
                            >Password</label
                            >
                            <input
                                type="password"
                                name="password"
                                placeholder="Password"
                                class="appearance-none border-2 border-gray-100 rounded-lg px-4 py-3 placeholder-gray-300 outline-none focus:border-orange-200 focus:shadow-lg"
                            />
                        </div>
                        <div id="button" class="flex flex-col w-full my-5">
                            <button
                                type="submit"
                                class="w-full py-4 bg-orange-500 border border-orange-200 rounded-lg text-white transition hover:border-orange-400 hover:bg-orange-600 focus:bg-orange-200"
                            >
                                <div class="flex flex-row items-center justify-center">
                                    <div class="font-bold">Login</div>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
