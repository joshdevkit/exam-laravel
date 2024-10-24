@extends('layouts.admin')

@section('title', 'Add Teacher')

@section('content')
    <div class="relative overflow-x-auto shadow-sm sm:rounded-lg p-6 bg-white ">

        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 py-2 gap-3">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('name') }}">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('email') }}">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                        Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

            </div>

            <div class="mb-4 col-span-1 md:col-span-2">
                <label for="avatar" class="block text-sm font-medium text-gray-700">Avatar</label>
                <div
                    class="flex items-center justify-between border-dashed border-2 bg-gray-100 border-gray-300 rounded-md p-8">
                    <input type="file" id="avatar" name="avatar" accept="image/*" class="hidden w-full"
                        onchange="previewImage(event)">
                    <label for="avatar" class="cursor-pointer text-gray-700">
                        Click here to upload Avatar
                    </label>
                    <div id="image-preview" class="ml-4">
                        @if (old('avatar') || (isset($teacher) && $teacher->avatar))
                            <img src="{{ old('avatar') ? old('avatar') : asset($teacher->avatar) }}" alt="Teacher Avatar"
                                id="preview"
                                class="w-20 h-20 rounded-full object-cover {{ old('avatar') ? '' : 'hidden' }}">
                        @else
                            <img src="" alt="Teacher Avatar" id="preview"
                                class="w-20 h-20 rounded-full object-cover hidden">
                        @endif
                    </div>
                </div>
            </div>

            <div class="mb-4 flex items-center">
                <input id="notify_email" name="notify_email" type="checkbox"
                    class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                <label for="notify_email" class="ml-2 block text-sm font-medium text-gray-700">
                    Notify the user with Email
                </label>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">
                    Add Teacher
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
