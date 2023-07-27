    @if ($success = session('success'))
        <div
            class="bg-white fixed flex items-center p-2 m-6 capitalize border-2 rounded-lg shadow-lg top-20 right-3 transition-all duration-75 ease-out fade-out">
            <div class="mr-2 text-green-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <span class="font-semibold text-gray-700">{{ $success }}</span>
            <button class="text-gray-500 ml-6 focus:outline-none" id="close-alert">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    @endif

    @if ($error = session('error'))
        <div
            class="bg-white fixed flex items-center p-2 m-6 capitalize border-2 rounded-lg shadow-lg top-20 right-3 transition-all duration-75 ease-out fade-out">
            <div class="mr-2 text-red-500">
                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <span class="font-semibold text-gray-700">{{ $error }}</span>
            <button class="text-gray-500 ml-6 focus:outline-none" id="close-alert">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    @endif
