<div class="my-3 p-5 bg-white border border-gray-200 rounded shadow-sm">
    <div class="flex flex-row relative items-center">
        <label class="font-semibold ml-3 text-gray-800 text-3xl">{{ $donate->title }}</label>
        <label class="show-button cursor-pointer text-base text-gray-500 ml-auto">Show</label>
    </div>
    <div class="data mt-2 float-left ml-3 hidden">
        <div class="max-w-[320px] w-full mb-5">
            <h1>{{ $donate->description }}</h1>
        </div>
    </div>
</div>
