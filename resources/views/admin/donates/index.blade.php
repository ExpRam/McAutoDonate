@extends('layout.admin')

@section('title', 'Admin Panel - Donates')

@section('content')
    <main class="flex-1 overflow-x-hidden h-screen overflow-y-auto">
        <div class="container mx-auto px-6 py-8">
            <h3 class="text-gray-700 text-3xl font-medium text-center">Donates</h3>
            <div class="mt-8 text-center">
                <a href="{{ route('admin.donates.create') }}" class="text-orange-600 hover:text-orange-900">Add</a>
            </div>
            <div class="flex flex-col mt-8">
                <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div
                        class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                        <table class="min-w-full">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Donate title
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">
                            @foreach($donates as $donate)
                                <x-cards.admin.donate-card :donate="$donate"/>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="mt-5">{{ $donates->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
