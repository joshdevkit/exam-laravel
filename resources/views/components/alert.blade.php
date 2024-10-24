@if (session()->has('success') || session()->has('error'))
    <div id="alert" class="fixed top-0 right-0 mt-4 mr-4 z-50">
        <div class="flex items-center bg-white border rounded-lg shadow-lg p-4 mb-4">
            <div class="flex-1">
                @if (session('success'))
                    <div class="flex items-center text-green-600">
                        <span class="font-semibold">{{ session('success') }}</span>
                    </div>
                @elseif (session('error'))
                    <div class="flex items-center text-red-600">
                        <span class="font-semibold">{{ session('error') }}</span>
                    </div>
                @endif
            </div>
            <button class="ml-4 text-gray-600 hover:text-gray-900" onclick="this.parentElement.parentElement.remove()">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    <script>
        setTimeout(() => {
            const alertElement = document.getElementById('alert');
            if (alertElement) {
                alertElement.remove();
            }
        }, 2500);
    </script>
@endif
