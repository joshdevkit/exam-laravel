@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-4 md:grid-cols-1 gap-4">
        <div class="bg-white shadow-lg rounded-lg p-6 flex items-center">
            <x-lucide-users class="w-8 h-8 text-blue-600 mr-4" />
            <div>
                <h2 class="text-lg font-bold">Count of Students</h2>
                <p class="text-2xl font-extrabold text-blue-600">30</p>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6 flex items-center">
            <x-lucide-user class="w-8 h-8 text-blue-600 mr-4" />
            <div>
                <h2 class="text-lg font-bold">Count of Teachers</h2>
                <p class="text-2xl font-extrabold text-blue-600">21</p>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6 flex items-center">
            <x-lucide-book-open class="w-8 h-8 text-blue-600 mr-4" />
            <div>
                <h2 class="text-lg font-bold">Count of Total Exams</h2>
                <p class="text-2xl font-extrabold text-blue-600">100</p>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6 flex items-center">
            <x-lucide-check-square class="w-8 h-8 text-blue-600 mr-4" />
            <div>
                <h2 class="text-lg font-bold">Count of Total Quizzes</h2>
                <p class="text-2xl font-extrabold text-blue-600">55</p>
            </div>
        </div>
    </div>
@endsection
