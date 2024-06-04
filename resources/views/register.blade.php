@extends('layouts/sign')

@section('content')
  <div class="md:w-2/3 lg:w-1/2 w-11/12 bg-white rounded-xl shadow-xl p-8">
    <div class="mb-4 text-center">
      <h3 class="font-bold uppercase text-2xl">register</h3>
      
      <p class="font-semibold mt-2"><span class="capitalize">please </span>register before continue</p>
    </div>

    <form class="mb-4" action={{ route('user.register') }} method="POST">
      @csrf
      <div class="mb-4">
        <label for="name" class="block mb-2 capitalize">name:</label>

        <input type="name" name="name" id="name" class="text-black border @error('name') border-red-500 @enderror rounded-lg w-full p-2" placeholder="Enter your name..."  value="{{ old('name') }}"/>

        @error('name')
        <p class="text-red-500 font-semibold text-end">{{ $message }}</p>
        @enderror
      </div> 

      <div class="mb-4">
        <label for="email" class="block mb-2"><span class="capitalize">email </span>address:</label>

        <input type="email" name="email" id="email" class="text-black border @error('email') border-red-500 @enderror rounded-lg w-full p-2" placeholder="Enter your email..."  value="{{ old('email') }}"/>

        @error('email')
        <p class="text-red-500 font-semibold text-end">{{ $message }}</p>
        @enderror
      </div> 

      <div class="mb-4">
        <label for="password" class="block mb-2 capitalize">password:</label>

        <input type="password" name="password" id="password" class="text-black border @error('password') border-red-500 @enderror rounded-lg w-full p-2" placeholder="Enter your password..." />

        @error('password')
        <p class="text-red-500 font-semibold text-end">{{ $message }}</p>
        @enderror
      </div> 

      <div class="mb-4 flex justify-center flex-col">
        <div class="flex gap-2 items-center">
          <label for="role" class="block capitalize">role:</label>
          
          <ul class="flex text-black">
            @foreach ($roles as $role)
            <li>
              <input type="radio" id={{ $role->name }} name="role_id" value={{ $role->id }} class="hidden peer" />
              
              <label for={{ $role->name }} class="py-1 px-4 uppercase bg-white border @error('role_id') border-red-500 @enderror {{ $role->id ===  1 ? 'rounded-l-lg' : 'rounded-r-lg'  }} cursor-pointer peer-checked:bg-indigo-700 peer-checked:text-white">{{ $role->name }}</label>
            </li>
            @endforeach
          </ul>
        </div>

        @error('role_id')
        <p class="text-red-500 font-semibold self-end">{{ $message }}</p>
        @enderror
      </div>
      
      <button type="submit" class="tracking-widest text-white bg-indigo-700 font-semibold rounded-lg w-full px-4 py-2 text-center uppercase">register</button>
    </form>
    
    <p class="text-center"><span class="capitalize">already </span>have an account? <a href="/login" class="capitalize text-indigo-700 font-semibold">login </a>instead</p>
  </div>
@endsection