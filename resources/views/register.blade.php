<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/css/app.css')
  <title>Sign Up</title>
</head>
<body>
  <div class="h-[100vh] flex items-center justify-center bg-sign-page bg-cover bg-left">
    <div class="md:w-2/3 lg:w-1/3 w-11/12 bg-card rounded-xl shadow-xl md:p-8 p-4">
      <div class="mb-4 text-center">
        <h3 class="font-bold uppercase text-2xl">sign up</h3>
        
        <p class="font-semibold mt-2"><span class="capitalize">please </span>register before continue</p>
      </div>

      <form class="mb-4">
        <div class="mb-4">
          <label for="name" class="block mb-2 capitalize">name:</label>

          <input type="name" id="name" class="border border-gray-300 rounded-lg w-full p-2" placeholder="Your name..." required />
        </div> 

        <div class="mb-4">
          <label for="email" class="block mb-2"><span class="capitalize">email </span>address:</label>

          <input type="email" id="email" class="border border-gray-300 rounded-lg w-full p-2" placeholder="Your email..." required />
        </div> 

        <div class="mb-4">
          <label for="password" class="block mb-2 capitalize">password:</label>

          <input type="password" id="password" class="border border-gray-300 rounded-lg w-full p-2" placeholder="Your password..." required />
        </div> 

        <div class="mb-4 flex items-center gap-2">
          <label for="role" class="block"><span class="capitalize">select </span>role:</label>

          <ul class="flex">
            <li>
              <input type="radio" id="user" name="role" value="user" class="hidden peer" required />

              <label for="user" class="py-1 px-4 uppercase bg-white border border-gray-300 rounded-l-lg cursor-pointer peer-checked:bg-primary peer-checked:text-white">user</label>
              </li>

            <li>
              <input type="radio" id="admin" name="role" value="admin" class="hidden peer" required />

              <label for="admin" class="py-1 px-4 uppercase bg-white border border-gray-300 rounded-r-lg cursor-pointer peer-checked:bg-primary peer-checked:text-white">admin</label>
            </li>
          </ul>
        </div>
        
        <button type="submit" class="tracking-widest text-white bg-primary font-semibold rounded-lg w-full px-4 py-2 text-center uppercase">login</button>
      </form>

      <p class="text-center"><span class="capitalize">already </span>have an account? <a href="/login" class="capitalize text-primary font-semibold">login </a>instead</p>
    </div>
  </div>
</body>
</html>