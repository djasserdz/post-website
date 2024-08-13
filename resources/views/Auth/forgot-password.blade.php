<x-layout>

<form action="{{route('password.email')}}" method="POST">
    @csrf
    <div class="flex flex-col">
        <label for="email" class="mb-1 font-semibold text-gray-700">Email</label>
        <input type="text" name="email" class="p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-slate-800">
        @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex justify-center">
        <button type="submit" class="bg-slate-800 text-white py-2 px-4 rounded-md hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-800">send</button>
    </div>
</form>
    
</x-layout>