@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800  text-black px-4 py-2 rounded">
                Clinics
            </h1>
            <a href="{{ route('clinics.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition duration-300 ease-in-out">
                Add New Clinic
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <ul class="divide-y divide-gray-200">
                @foreach ($clinics as $clinic)
                    <li class="px-6 py-4 flex justify-between items-center hover:bg-gray-50 transition duration-150 ease-in-out">
                        <div class="flex items-center">
                            <a href="{{ route('clinics.show', $clinic->id) }}" class="text-blue-600 hover:text-blue-800 hover:underline mr-4">
                                {{ $clinic->name }}
                            </a>
                        </div>
                        <div class="flex items-center space-x-3">
                            <a href="{{ route('clinics.edit', $clinic->id) }}" class="text-yellow-500 hover:text-yellow-600 transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd" d="M2 16V6h4V4H2a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2v-4h-2v4H2z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <form 
                                action="{{ route('clinics.destroy', $clinic->id) }}" 
                                method="POST" 
                                class="inline"
                                onsubmit="return confirm('Are you sure you want to delete this clinic?');"
                            >
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    class="text-red-500 hover:text-red-600 transition duration-300"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        @if ($clinics->isEmpty())
            <div class="text-center text-gray-500 mt-6">
                No clinics found. 
                <a href="{{ route('clinics.create') }}" class="text-blue-500 hover:underline">
                    Create your first clinic
                </a>
            </div>
        @endif
    </div>
@endsection


<!-- resources/views/clinics/index.blade.php -->
{{-- <h1>Clinics</h1>
<ul>
    @foreach ($clinics as $clinic)
        <li>
            <a href="{{ route('clinics.show', $clinic->id) }}">{{ $clinic->name }}</a>
        </li>
    @endforeach
</ul> --}}
