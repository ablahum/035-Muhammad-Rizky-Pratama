<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('public/style/main.css')
  <title>BookingTel | {{ $title }}</title>
</head>
<body>
  <div class="h-[100vh] flex items-center justify-center bg-sign-page bg-cover bg-left">
    @yield('content')
  </div>
</body>
</html>