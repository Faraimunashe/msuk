<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Receipt Book') }}
        </h2>
    </x-slot>


<div>
    <!-- Search form -->
    <form action="{{ route('students.search') }}" method="POST">
        @csrf
        <div class="flex justify-center mt-5">
            <input type="text" name="reg_num" class="border border-gray-400 rounded px-4 py-2" placeholder="Enter Registration Number">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ml-4 rounded">Search</button>
        </div>
    </form>

    <!-- Display student details -->
    @isset($student)
    <div class="mt-5">
        <p><strong>Name:</strong> {{ $student->name }}</p>
        <p><strong>Program:</strong> {{ $student->program }}</p>
        <p><strong>Barcode:</strong> {{ $student->barcode }}</p>
    </div>
    @endisset
    </div>

</x-app-layout>
