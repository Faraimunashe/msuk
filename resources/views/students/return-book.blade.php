
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students Returning Details') }}
        </h2>
    </x-slot>

    <!--    <h1>Student Details</h1>-->

    <div class="flex justify-center mt-5">
        <table class="w-3/4 min-w-full divide-y divide-gray-200">
            <tr>
                <th scope="col"
                    class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Registration Number
                </th>
                <th scope="col"
                    class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>
                <th scope="col"
                    class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Program
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $student->reg_num }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $student->name }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $student->program }}
                </td>
            </tr>
            </tbody>
        </table>

        <br>
        <br>


        <br>

        <form action="{{ route('save-student') }}" method="POST" id="student-form">
            @csrf
            <input type="hidden" name="reg_num" value="{{ $student->reg_num }}">
            <input type="hidden" name="name" value="{{ $student->name }}">
            <input type="hidden" name="program" value="{{ $student->program}}">
            <label for="barcode" class="block font-bold">BARCODE</label>
            <div class="flex items-center">
                <input type="text" name="barcode" id="barcode" class="border border-gray-400 rounded px-4 py-2">
                <button type="button" onclick="openSummaryModal()" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Save</button>
            </div>
        </form>
    </div>


    <style>
        .summary-container {
            background-color: white;
            width: 50%;
            height: 50%;
        }

        .summary-table {
            width: 50%;
            height: 50%;
            border-collapse: separate;
            border-spacing: 0 8px;
            background-color: white;
        }

        .summary-table th,
        .summary-table td {
            border-bottom: 1px solid #e2e8f0;
            padding: 8px;
        }
    </style>

    <div id="summary-modal" class="fixed inset-0 flex items-center justify-center z-20 hidden">
        <div class="modal-content bg-white p-12 rounded-lg shadow-lg w-25 h-25 summary-container">
            <table class="summary-table">
                <tr>
                    <th class="text-lg font-semibold py-2">Field</th>
                    <th class="text-lg font-semibold py-2">Value</th>
                </tr>
                <tr>
                    <td class="py-2"><strong>Registration Number:</strong></td>
                    <td class="py-2">{{ $student->reg_num }}</td>
                </tr>
                <tr>
                    <td class="py-2"><strong>Name:</strong></td>
                    <td class="py-2">{{ $student->name }}</td>
                </tr>
                <tr>
                    <td class="py-2"><strong>Program:</strong></td>
                    <td class="py-2">{{ $student->program }}</td>
                </tr>
                <tr>
                    <td class="py-2"><strong>Barcode:</strong></td>
                    <td class="py-2"><span id="barcode-summary"></span></td>
                </tr>
            </table>
            <div class="mt-4 flex justify-center">
                <button onclick="saveStudent()" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">SAVE</button>
                <button onclick="continueEditing()" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Continue Editing</button>
            </div>
        </div>
    </div>

    <script>
        function openSummaryModal() {
            const modal = document.getElementById('summary-modal');
            const barcodeInput = document.getElementById('barcode');
            const barcodeSummary = document.getElementById('barcode-summary');
            barcodeSummary.textContent = barcodeInput.value;
            modal.classList.remove('hidden');
        }

        function saveStudent() {
            document.getElementById('student-form').submit();
        }

        function continueEditing() {
            const modal = document.getElementById('summary-modal');
            modal.classList.add('hidden');
        }
    </script>
</x-app-layout>
