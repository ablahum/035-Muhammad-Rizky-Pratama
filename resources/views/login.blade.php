@extends('layouts/sign')

@section('content')
  <div class="md:w-2/3 lg:w-1/2 w-11/12 bg-white rounded-xl shadow-xl p-8">
    <div class="mb-4 text-center">
      <h3 class="font-bold uppercase text-2xl">login</h3>
      
      <p class="font-semibold mt-2"><span class="capitalize">please </span>login before continue</p>
    </div>

    @if (session()->has('success_message'))
    <div class="bg-green-300 py-2 px-4 rounded-lg mb-4">
      <p class="font-semibold">{{ session('success_message') }}</p>
    </div>
    @endif

    <form class="mb-4" action={{ route('user.login') }} method="POST">
      @csrf
      <div class="mb-4">
        <label for="email" class="block mb-2"><span class="capitalize">email </span>address:</label>

        <input type="email" name="email" id="email" class="text-black border @error('email') border-red-500 @enderror rounded-lg w-full p-2" placeholder="Your email..."  value="{{ old('email') }}"/>

        @error('email')
        <p class="text-red-500 font-semibold text-end">{{ $message }}</p>
        @enderror
      </div> 

      <div class="mb-4">
        <label for="password" class="block mb-2 capitalize">password:</label>

        <input type="password" name="password" id="password" class="text-black border @error('password') border-red-500 @enderror rounded-lg w-full p-2" placeholder="Your password..." />

        @error('password')
        <p class="text-red-500 font-semibold text-end">{{ $message }}</p>
        @enderror
      </div>
      
      @if (session()->has('failed_message'))
      <div class="bg-red-500 py-2 px-4 rounded-lg mb-4">
        <p class="font-semibold text-white">{{ session('failed_message') }}</p>
      </div>
      @endif
      
      <button type="submit" class="tracking-widest text-white bg-indigo-700 font-semibold rounded-lg w-full px-4 py-2 text-center uppercase">login</button>
    </form>

    <p class="text-center"><span class="capitalize">don't </span>have an account? <a href="/register" class="capitalize text-indigo-700 font-semibold">register </a>now</p>
  </div>
@endsection