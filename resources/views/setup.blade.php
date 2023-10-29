@extends('layout.app')

@section('title', 'McAutoDonate Setup')

@section('content')
    @if($errors->isEmpty())
        <div class="flex flex-col items-center justify-center p-12 h-screen text-center">
            <h1 class="mb-5 font-semibold text-5xl">McAuto Donate</h1>
            <h1 class="mb-5 font-semibold text-4xl">Let`s get started!</h1>
            <h2 class="mb-5 text 3xl">You need to fill some fields.</h2>
            <button onclick="showDiv()"
                    class="hover:shadow-form rounded-md bg-gradient-to-r from-[#FFAFBD] to-[#ffc3a0] py-3 px-8 text-base font-semibold text-white outline-none">
                Okay
            </button>
        </div>
    @endif
    <div id="form-div" class="items-center justify-center p-12 @if($errors->isEmpty()) hidden @endif">
        <div class="mx-auto w-full max-w-[550px] bg-white">
            <form action="{{ route('setup_process') }}" method="POST">
                @csrf
                <div class="mb-5 pt-3">
                    <label
                        class="mb-5 block text-base text-center font-semibold text-[#07074D] sm:text-xl"
                    >
                        Admin Credentials
                    </label>
                    <div class="text-center mb-3">
                        @error('username')<h1 class="text-red-500">{{ $message }}</h1>@enderror
                        @error('password')<h1 class="text-red-500">{{ $message }}</h1>@enderror
                    </div>
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    placeholder="Username"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#FFAFBD] focus:shadow-md"
                                />
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">

                            <div class="mb-5">
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    placeholder="Password"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#FFAFBD] focus:shadow-md"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-5 pt-3">
                    <label
                        class="mb-5 block text-base text-center font-semibold text-[#07074D] sm:text-xl"
                    >
                        Qiwi Api Details
                    </label>
                    <div class="text-center mb-3">
                        @error('yoomoney_secret')<h1 class="text-red-500">{{ $message }}</h1>@enderror
                        @error('bill_number')<h1 class="text-red-500">{{ $message }}</h1>@enderror
                    </div>
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <input
                                    type="text"
                                    name="yoomoney_secret"
                                    id="yoomoney_secret"
                                    placeholder="Secret token"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#FFAFBD] focus:shadow-md"
                                />
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <input
                                    type="text"
                                    name="bill_number"
                                    id="bill_number"
                                    placeholder="Bill Number"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#FFAFBD] focus:shadow-md"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-5 pt-3">
                    <label
                        class="mb-5 block text-base text-center font-semibold text-[#07074D] sm:text-xl"
                    >
                        Rcon details
                    </label>
                    <div class="text-center mb-3">
                        @error('rcon_host')<h1 class="text-red-500">{{ $message }}</h1>@enderror
                        @error('rcon_port')<h1 class="text-red-500">{{ $message }}</h1>@enderror
                        @error('rcon_password')<h1 class="text-red-500">{{ $message }}</h1>@enderror
                    </div>
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <input
                                    type="text"
                                    name="rcon_host"
                                    id="rcon_host"
                                    placeholder="Host"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#FFAFBD] focus:shadow-md"
                                />
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <input
                                    type="text"
                                    name="rcon_port"
                                    id="rcon_port"
                                    placeholder="Rcon port"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#FFAFBD] focus:shadow-md"
                                />
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <input
                                    type="password"
                                    name="rcon_password"
                                    id="rcon_password"
                                    placeholder="Rcon password"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#FFAFBD] focus:shadow-md"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button
                        class="hover:shadow-form w-full rounded-md bg-gradient-to-r from-[#FFAFBD] to-[#ffc3a0] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                        Confirm
                    </button>
                </div>
            </form>
        </div>
        <h1 class="justify-end text-center">Made with ❤️ Created by <a href="https://github.com/expram"><span
                    class="text-cyan-500">@ExpRam</span></a></h1>
    </div>
    <script>
        const form = document.getElementById("form-div");

        function showDiv() {
            form.style.display = "block";
            form.scrollIntoView({
                behavior: 'smooth'
            });
        }
    </script>
@endsection
