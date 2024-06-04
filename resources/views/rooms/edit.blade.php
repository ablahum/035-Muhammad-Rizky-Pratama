@extends('layouts/dashboard')

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    <div class="container px-6 py-8 mx-auto">
        <h3 class="text-3xl font-semibold text-gray-700 capitalize">{{ $title }}</h3>
                    
        <form class="mt-8 p-6 rounded-lg bg-white grid grid-rows-[auto_auto_auto] grid-cols-1 gap-4" action="/rooms/{{ $room->id }}" method="POST">
            @method('put')
            @csrf
            <div class="grid md:grid-cols-2 grid-cols-1 md:grid-rows-1 grid-rows-[auto_auto] gap-4 items-start">
                <div class="grid grid-cols-1 grid-rows-[auto_auto] gap-2">
                    <label for="number" class="block capitalize">room number:</label>

                    <input type="number" name="number" id="number" class="text-black border @error('number') border-red-500 @enderror rounded-lg w-full p-2" placeholder="Enter number..." value="{{ old('number', $room->number) }}"/>

                    @error('number')
                    <p class="text-red-500 font-semibold text-end">{{ $message }}</p>
                    @enderror
                </div> 

                <div class="grid grid-cols-1 grid-rows-[auto_auto] gap-2">
                    <label for="category_id" class="block capitalize">room category:</label>

                    <select name="category_id" id="category_id" class="text-black border @error('category_id') border-red-500 @enderror rounded-lg w-full p-2 uppercase">
                        @foreach($categories as $category)
                        <option value={{ $category->id }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div> 
            </div>
            
            <div class="grid md:grid-cols-2 grid-cols-1 md:grid-rows-1 grid-rows-2 gap-4">
                <div class="grid grid-cols-1 grid-rows-[auto_auto] gap-2">
                    <label for="status" class="block capitalize">room status:</label>

                    <select name="status" id="status" class="text-black border @error('status') border-red-500 @enderror rounded-lg w-full p-2 uppercase">
                        <option value="available">available</option>
                        <option value="unavailable">unavailable</option>
                    </select>
                </div> 

                <div class="grid grid-cols-1 grid-rows-[auto_auto] gap-2">
                    <label for="price" class="block capitalize">total price:</label>

                    <input type="number" name="price" id="price" class="text-black border rounded-lg w-full p-2" value="{{ old('price', $room->price) }}"/>
                </div>
            </div>
            
            <button type="submit" class="tracking-widest text-white bg-indigo-700 font-semibold rounded-lg w-full px-4 py-2 text-center uppercase">edit</button>
        </form>
    </div>
</main>
@endsection