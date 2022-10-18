<div class="rounded-[13px] overflow-hidden shadow-lg text-center bg-white">
    <img class="w-full bg-cover" src="storage/donates/{{ $donate->image }}">
    <div class="px-6 py-4">
        <div class="title font-bold text-4xl mb-2">{{ $donate->title }}</div>
        <p class="text-gray-700 text-3xl font-semibold">
            {{ $donate->price }}RUB
        </p>
        <button
            class="buy hover:shadow-form rounded-md bg-gradient-to-r from-[#FE5A1C] to-[#FE7C22] mt-5 py-3 px-8 text-base font-semibold text-white outline-none">
            Buy
        </button>
    </div>
</div>
