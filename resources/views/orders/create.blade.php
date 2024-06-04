@extends('layouts/dashboard')

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    <div class="container px-6 py-8 mx-auto">
        <h3 class="text-3xl font-semibold text-gray-700 capitalize">create {{ $title }}</h3>
        
        <form class="mt-8 p-6 rounded-lg bg-white grid grid-rows-[auto_auto_auto_auto] grid-cols-1 gap-4" action="/orders" method="POST">
            @csrf
            <div class="grid md:grid-cols-3 grid-cols-1 md:grid-rows-1 grid-rows-[auto_auto_auto] gap-4 items-start">
                <div class="grid grid-cols-1 grid-rows-[auto_auto] gap-2">
                    <label for="name" class="block capitalize">guest name:</label>

                    <input type="name" name="name" id="name" class="text-black border @error('name') border-red-500 @enderror rounded-lg w-full p-2" placeholder="Enter name..." value="{{ old('name') }}"/>

                    @error('name')
                    <p class="text-red-500 font-semibold text-end">{{ $message }}</p>
                    @enderror
                </div> 

                <div class="grid grid-cols-1 grid-rows-[auto_auto] gap-2">
                    <label for="origin" class="block capitalize">guest origin:</label>

                    <input type="text" name="origin" id="origin" class="text-black border @error('origin') border-red-500 @enderror rounded-lg w-full p-2" placeholder="Enter origin..."  value="{{ old('origin') }}"/>

                    @error('origin')
                    <p class="text-red-500 font-semibold text-end">{{ $message }}</p>
                    @enderror
                </div> 

                <div class="grid grid-cols-1 grid-rows-[auto_auto] gap-2">
                    <label for="phone" class="block capitalize">guest phone:</label>

                    <input type="number" name="phone" id="phone" class="text-black border @error('phone') border-red-500 @enderror rounded-lg w-full p-2" placeholder="Enter phone..." value="{{ old('phone') }}"/>
                    
                    @error('phone')
                    <p class="text-red-500 font-semibold text-end">{{ $message }}</p>
                    @enderror
                </div> 
            </div>
            
            <div class="grid md:grid-cols-2 grid-cols-1 md:grid-rows-1 grid-rows-2 gap-4 items-start">
                <div class="grid grid-cols-1 grid-rows-[auto_auto] gap-2">
                    <label for="start_date" class="block capitalize">start date:</label>

                    <input type="date" name="start_date" id="start_date" class="text-black border @error('start_date') border-red-500 @enderror rounded-lg w-full p-2" placeholder="Enter date..."  value="{{ old('start_date') }}" />

                    @error('start_date')
                    <p class="text-red-500 font-semibold text-end">{{ $message }}</p>
                    @enderror
                </div> 

                <div class="grid grid-cols-1 grid-rows-[auto_auto] gap-2">
                    <label for="end_date" class="block capitalize">end date:</label>

                    <input type="date" name="end_date" id="end_date" class="text-black border @error('end_date') border-red-500 @enderror rounded-lg w-full p-2" placeholder="Enter date..."  value="{{ old('end_date') }}" />

                    @error('end_date')
                    <p class="text-red-500 font-semibold text-end">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="grid md:grid-cols-2 grid-cols-1 md:grid-rows-1 grid-rows-2 gap-4">
                <div class="grid grid-cols-1 grid-rows-[auto_auto] gap-2">
                    <label for="room_id" class="block capitalize">room number:</label>

                    <select name="room_id" id="room_id" class="text-black border @error('room_id') border-red-500 @enderror rounded-lg w-full p-2">
                        @foreach($rooms as $room)
                        <option value={{ $room->id }}>{{ $room->number }}</option>
                        @endforeach
                    </select>

                    {{-- @error('room_id')
                    <p class="text-red-500 font-semibold text-end">{{ $message }}</p>
                    @enderror --}}
                </div> 

                <div class="grid grid-cols-1 grid-rows-[auto_auto] gap-2">
                    <label for="total_price" class="block capitalize">total price:</label>

                    <input type="number" name="total_price" id="total_price" class="text-black border rounded-lg w-full p-2"/>
                </div>
            </div>
            
            <button type="submit" class="tracking-widest text-white bg-indigo-700 font-semibold rounded-lg w-full px-4 py-2 text-center uppercase">create</button>
        </form>
    </div>
</main>
@endsection