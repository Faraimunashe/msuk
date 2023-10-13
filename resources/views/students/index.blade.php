<x-app-layout>
    <x-slot name="header">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students Check Out') }}
        </h2>
    </x-slot>

    <div>
        <form action="{{ route('students.search') }}" method="POST" class="mt-5">
            @csrf
            <div class="flex justify-center">
                <input type="text" name="reg_num" class="border border-gray-400 rounded px-12 py-2 mr-2" placeholder="Enter Registration Number">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Search</button>
            </div>
        </form>

<!--        @if(session('error'))-->
<!--        <div class="alert alert-danger">-->
<!--            {{ session('error') }}-->
<!--        </div>-->
<!--        @endif-->
        @if(session('error'))
        <!-- Center the error message and apply the specified style -->
        <div class="flex justify-center items-center mt-5" style="{{ session('style') }}">
            {{ session('error') }}
        </div>
        @endif

        <!-- Display student details -->
        @isset($student)

        @endisset
    </div>
</x-app-layout>
