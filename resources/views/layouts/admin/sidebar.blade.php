<aside id="sidebar"
    class="bg-gray-600 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:translate-x-0 md:relative transition-transform duration-300 ease-in-out z-30">
    <div class="flex justify-between items-center px-4">
        <a href="{{ route('admin.dashboard') }}" class="text-white flex items-center space-x-2">
            <x-lucide-home class="w-8 h-8" />
            <span class="text-2xl font-extrabold">Admin Panel</span>
        </a>

        <button id="closeSidebar" class="md:hidden text-white focus:outline-none">
            <x-lucide-x class="w-6 h-6" />
        </button>
    </div>

    <nav>
        <a href="{{ route('admin.dashboard') }}"
            class="py-2.5 px-4 rounded transition duration-200 hover:bg-gray-800 flex items-center space-x-2">
            <x-lucide-layout-dashboard class="w-6 h-6" />
            <span>Dashboard</span>
        </a>

        <a href="{{ route('users.index') }}"
            class="py-2.5 px-4 rounded transition duration-200 hover:bg-gray-800 flex items-center space-x-2">
            <x-lucide-users class="w-6 h-6" />
            <span>Users</span>
        </a>



        <a href="#"
            class="py-2.5 px-4 rounded transition duration-200 hover:bg-gray-800 flex items-center space-x-2">
            <x-lucide-calendar class="w-6 h-6" />
            <span>Schedules</span>
        </a>

        <a href="#"
            class="py-2.5 px-4 rounded transition duration-200 hover:bg-gray-800 flex items-center space-x-2">
            <x-lucide-book-open class="w-6 h-6" />
            <span>Exams</span>
        </a>

        <a href="#"
            class="py-2.5 px-4 rounded transition duration-200 hover:bg-gray-800 flex items-center space-x-2">
            <x-lucide-file-text class="w-6 h-6" />
            <span>Quizzes</span>
        </a>

        <a href="#"
            class="py-2.5 px-4 rounded transition duration-200 hover:bg-gray-800 flex items-center space-x-2">
            <x-lucide-settings class="w-6 h-6" />
            <span>Settings</span>
        </a>
    </nav>
</aside>
