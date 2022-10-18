@extends('layout.admin')

@section('title', 'Admin Panel - Promocodes')

@section('content')
    <main class="flex-1 overflow-x-hidden h-screen overflow-y-auto">
        <div class="container mx-auto px-6 py-8">
            <h3 class="text-gray-700 text-3xl font-medium">{{ isset($promocode) ?  'Edit promocode' : 'Add promocode' }}</h3>
            <div class="mt-8">
            </div>
            <div class="mt-8">
                <form class="space-y-5 mt-5" method="POST"
                      action="{{ isset($promocode) ?  route('admin.promocodes.update', $promocode->id) : route('admin.promocodes.store') }}">
                    @csrf

                    @if(isset($promocode))
                        @method('PUT')
                    @endif

                    @error('promocode')
                    <h1 class="text-red-500">{{ $message }}</h1>
                    @enderror

                    <input name="promocode" type="text"
                           class="w-full h-12 border border-gray-800 rounded px-3 outline-none focus:border-orange-900"
                           placeholder="Promocode name"
                           value="{{ $promocode->promocode ?? '' }}"/>

                    @error('count')
                    <h1 class="text-red-500">{{ $message }}</h1>
                    @enderror

                    <input name="count" type="text"
                           class="w-full h-12 border border-gray-800 rounded px-3 outline-none focus:border-orange-900"
                           placeholder="Count of uses"
                           value="{{ $promocode->count ?? '' }}"/>

                    @error('percent')
                    <h1 class="text-red-500">{{ $message }}</h1>
                    @enderror

                    <input name="percent" type="text"
                           class="w-full h-12 border border-gray-800 rounded px-3 outline-none focus:border-orange-900"
                           placeholder="Discount percentage"
                           value="{{ $promocode->percent ?? '' }}"/>
                    <button type="submit"
                            class="text-center w-full bg-orange-700 rounded-md text-white py-3 font-medium">Save
                    </button>
                </form>
            </div>
        </div>
    </main>
@endsection
