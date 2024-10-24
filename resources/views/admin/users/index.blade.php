@extends('layouts.admin')
@section('title', 'User Managerment')

@section('content')
    <div class="relative overflow-x-auto shadow-sm sm:rounded-lg">
        <div class="flex justify-end items-center py-4">
            <x-alert />
            <a href="{{ route('users.create') }}"
                class="flex items-center bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                <x-lucide-user-plus class="w-5 h-5 me-2" />
                Add Teacher
            </a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-md text-gray-700 uppercase  bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Position
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($teachers as $teacher)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-12 h-12 rounded-full" src="{{ asset('storage/' . $teacher->avatar) }}"
                                alt="Profile image">
                            <div class="ps-3">
                                <div class="text-base font-semibold">{{ $teacher->name }}</div>
                                <div class="font-normal text-gray-500">{{ $teacher->email }}</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            @if ($teacher->roles->isNotEmpty())
                                {{ ucfirst($teacher->roles->pluck('name')->implode(', ')) }}
                            @else
                                No role assigned
                            @endif
                        </td>
                        <td class="flex items-center space-x-4">
                            <a href="{{ route('users.edit', $teacher) }}"
                                class="flex items-center font-medium text-blue-600 dark:text-blue-500">
                                <x-lucide-edit class="w-8 h-8 text-blue-500" />
                            </a>
                            <button onclick="openDeleteModal('{{ route('users.destroy', $teacher) }}')"
                                class="flex items-center font-medium text-red-600 hover:text-red-700">
                                <x-lucide-trash class="w-8 h-8" />
                            </button>

                            <x-delete-modal />
                        </td>
                    </tr>
                @empty
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 text-center" colspan="3">
                            No Teacher recently added
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
