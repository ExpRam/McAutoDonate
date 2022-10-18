<div class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full" id="buy-modal">
    <div class="flex justify-center h-screen items-center antialiased">
        <div
            class="flex flex-col w-11/12 sm:w-5/6 lg:w-4/12 max-w-2xl mx-auto rounded-lg border border-gray-300 shadow-xl">
            <div
                class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg"
            >
                <p class="font-semibold text-gray-800">Your details:</p>
                <svg
                    id="close-buy"
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
            <div class="flex flex-col px-6 py-5 bg-gray-50">
                <div
                    class="flex flex-row items-center justify-between p-5 bg-white border border-gray-200 rounded shadow-sm"
                >
                    <div class="flex flex-row items-center">
                        <img
                            id="avatar"
                            class="w-10 h-10 mr-3 rounded-md"
                            src=""
                            alt=""
                        />
                        <div class="flex flex-col">
                            <p id="nickname" class="font-semibold text-gray-800">{{ auth()->user()->nickname }}</p>
                            <p class="text-gray-400">{{ auth()->user()->rank }}</p>
                        </div>
                    </div>
                </div>
                <input
                    type="text"
                    name="promocode"
                    id="promocode"
                    placeholder="Promo code (Optional)"
                    class="p-5 mt-2 bg-white border border-gray-200 outline-none focus:border-orange-300 rounded shadow-sm"
                >
            </div>
            <div
                class="flex flex-row items-center justify-between p-5 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg"
            >
                <button referrerpolicy="origin" id="buy-button"
                        class="px-4 py-2 w-full text-white font-semibold bg-orange-300 rounded">
                    Buy for 0RUB
                </button>
            </div>
        </div>
    </div>
</div>
