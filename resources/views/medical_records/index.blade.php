@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 space-y-4 sm:space-y-0">
        <h1 class="text-2xl font-bold text-gray-800">Medical Records</h1>
        <a href="{{ route('medical_records.create', ['clinic' => $clinic->id]) }}" 
           class="w-full sm:w-auto bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out inline-flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Add New Record
        </a>
    </div>
    

    <!-- Responsive Table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <div class="inline-block min-w-full align-middle">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" 
                            class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Patient
                        </th>
                        <th scope="col" 
                            class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Doctor
                        </th>
                        <th scope="col" 
                            class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">
                            Description
                        </th>
                        <th scope="col" 
                            class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date
                        </th>
                        <th scope="col" 
                            class="px-3 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($records as $record)
                        <tr class="hover:bg-gray-50">
                            <td class="px-3 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $record->patient->name }}
                                </div>
                            </td>
                            <td class="px-3 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $record->doctor->name }}
                                </div>
                            </td>
                            <td class="px-3 py-4 hidden sm:table-cell">
                                <div class="text-sm text-gray-900 max-w-xs truncate">
                                    {{ $record->description }}
                                </div>
                            </td>
                            <td class="px-3 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ \Carbon\Carbon::parse($record->date)->format('d M Y - H:i A') }}
                                </div>
                            </td>
                            <td class="px-3 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-3">
                                    <!-- View Button -->
                                    <a href="{{ route('medical_records.show', ['clinic' => $clinic->id, 'medical_record' => $record->id]) }}" 
                                       class="text-blue-600 hover:text-blue-900 transition-colors duration-200"
                                       title="View Record">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                            
                                    <!-- Edit Button -->
                                    <a href="{{ route('medical_records.edit', ['clinic' => $clinic->id, 'medical_record' => $record->id]) }}" 
                                       class="text-yellow-500 hover:text-yellow-600 transition-colors duration-200"
                                       title="Edit Record">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 16V6h4V4H2a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2v-4h-2v4H2z" clip-rule="evenodd" />
                                    </svg>
                                    </a>
                            
                                    <!-- Delete Button -->
                                    <form action="{{ route('medical_records.destroy', ['clinic' => $clinic->id, 'medical_record' => $record->id]) }}" 
                                          method="POST" 
                                          class="inline-block"
                                          onsubmit="return confirm('Are you sure you want to delete this record?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-500 hover:text-red-600 transition-colors duration-200"
                                                title="Delete Record">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-3 py-4 text-center text-gray-500">
                                No medical records found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->

</div>
@endsection