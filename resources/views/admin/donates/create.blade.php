@extends('layout.admin')

@section('title', 'Admin Panel - Donates')

@section('content')
    <main class="flex-1 overflow-x-hidden h-screen overflow-y-auto">
        <div class="container mx-auto px-6 py-8">
            <h3 class="text-gray-700 text-3xl font-medium">{{ isset($donate) ?  'Edit donate' : 'Add donate' }}</h3>
            <div class="mt-8">
            </div>
            <div class="mt-8">
                <form enctype="multipart/form-data" class="space-y-5 mt-5" method="POST"
                      action="{{ isset($donate) ?  route('admin.donates.update', $donate->id) : route('admin.donates.store') }}">
                    @csrf

                    @if(isset($donate))
                        @method('PUT')
                    @endif

                    @error('title')
                    <h1 class="text-red-500">{{ $message }}</h1>
                    @enderror

                    <input name="title" type="text"
                           class="w-full h-12 border border-gray-800 rounded px-3 outline-none focus:border-orange-900"
                           placeholder="Donate title"
                           value="{{ $donate->title ?? '' }}"/>

                    @error('description')
                    <h1 class="text-red-500">{{ $message }}</h1>
                    @enderror

                    <input name="description" type="text"
                           class="w-full h-12 border border-gray-800 rounded px-3 outline-none focus:border-orange-900"
                           placeholder="Description"
                           value="{{ $donate->description ?? '' }}"/>

                    @error('price')
                    <h1 class="text-red-500">{{ $message }}</h1>
                    @enderror

                    <input name="price" type="text"
                           class="w-full h-12 border border-gray-800 rounded px-3 outline-none focus:border-orange-900"
                           placeholder="Price"
                           value="{{ $donate->price ?? '' }}"/>

                    @error('command')
                    <h1 class="text-red-500">{{ $message }}</h1>
                    @enderror

                    <input name="command" type="text"
                           class="w-full h-12 border border-gray-800 rounded px-3 outline-none focus:border-orange-900"
                           placeholder="Placeholders: {player} - player nickname"
                           value="{{ $donate->command ?? '' }}"/>

                    @error('image')
                    <h1 class="text-red-500">{{ $message }}</h1>
                    @enderror

                    <div class="flex justify-left">
                        <div class="mb-3 w-96">
                            <label class="form-label inline-block mb-2 text-gray-700">Thumbnail</label>
                            <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white
                            bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file"
                                   name="image">
                        </div>
                    </div>

                    @error('is_rank')
                    <h1 class="text-red-500">{{ $message }}</h1>
                    @enderror

                    <div class="flex items-center">
                        <input type="hidden" name="is_rank" value="0">
                        <input name="is_rank" @if(isset($donate) && $donate->is_rank == 1) checked
                               @endif type="checkbox"
                               value="1"
                               class="w-4 h-4 text-orange-600 bg-gray-100 rounded border-gray-300 focus:ring-2">
                        <label class="ml-2 text-sm font-medium text-gray-900">Is rank?</label>
                    </div>
                    <button type="submit"
                            class="text-center w-full bg-orange-700 rounded-md text-white py-3 font-medium">Save
                    </button>
                </form>
            </div>
        </div>
    </main>
@endsection
