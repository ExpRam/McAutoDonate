<div class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 h-full" id="description-modal">
    <div class="flex justify-center h-screen items-center antialiased">
        <div
            class="flex flex-col w-11/12 sm:w-5/6 lg:w-4/12 max-w-2xl mx-auto rounded-lg border border-gray-300 shadow-xl">
            <div
                class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg"
            >
                <p class="font-semibold text-gray-800">Donate Description:</p>
                <svg
                    id="close-desc"
                    class="w-6 h-6 cursor-pointer"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    ></path>
                </svg>
            </div>
            <div class="flex flex-col px-6 py-5 bg-gray-50 overflow-y-auto h-[400px]">
                    {{ $slot }}
                <div class="flex flex-row items-center justify-between p-5 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg">
                </div>
            </div>
        </div>
    </div>
</div>
