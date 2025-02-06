@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold">Add Doctor</h1>
    
    <form action="{{ route('doctors.store') }}" method="POST" class="mt-4">
        @csrf
        <label class="block">Name</label>
        <input type="text" name="name" class="border p-2 w-full" required>
        
        <label class="block mt-2">Specialization</label>
        <input type="text" name="specialization" class="border p-2 w-full" required>

        <label class="block mt-2">Clinic</label>
        <select name="clinic_id" class="border p-2 w-full" required>
            @foreach($clinics as $clinic)
                <option value="{{ $clinic->id }}">{{ $clinic->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="mt-4 bg-green-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection
