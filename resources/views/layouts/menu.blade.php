<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex space-4">
                    <a href="{{ route('apartments.index') }}"
                       class="@if(\Request::routeIs('apartments.*')) bg-gray-700 @endif text-white hover:bg-green-700 px-3 py-2 rounded-md text-sm font-medium">
                        รายการอพาร์ตเมนต์ทั้งหมด
                    </a>
                    <a href="{{ route('tasks.index') }}"
                       class="@if(\Request::routeIs('tasks.*')) bg-gray-700 @endif text-white hover:bg-green-700 px-3 py-2 rounded-md text-sm font-medium">
                        รายการงานทั้งหมด
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
