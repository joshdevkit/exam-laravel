@extends('layouts.admin')

@section('title', 'Edit Teacher')

@section('content')
    <div class="relative overflow-x-auto shadow-sm sm:rounded-lg p-6 bg-white">

        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('name', $user->name) }}">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('email', $user->email) }}">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="Leave blank if you don't want to change">
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New
                        Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="Leave blank if you don't want to change">
                </div>

                <div class="mb-4 col-span-1 md:col-span-2">
                    <label for="avatar" class="block text-sm font-medium text-gray-700">Avatar</label>
                    <div
                        class="flex items-center justify-between border-dashed border-2 bg-gray-100 border-gray-300 rounded-md p-4">
                        <input type="file" id="avatar" name="avatar" accept="image/*" class="hidden w-full"
                            onchange="previewImage(event)">
                        <label for="avatar" class="cursor-pointer text-gray-700">
                            Click here to update Avatar
                        </label>
                        <div id="image-preview" class="ml-4">
                            @if ($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Teacher Avatar" id="preview"
                                    class="w-16 h-16 rounded-full object-cover">
                            @else
                                <img src="" alt="Teacher Avatar" id="preview"
                                    class="w-16 h-16 rounded-full object-cover hidden">
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">
                    Update Teacher
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.classList.add('hidden');
            }
        }
    </script>
@endsection
