<!DOCTYPE html> <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <head> <meta charset="utf-8"> <meta
    name="viewport" content="width=device-width, initial-scale=1"> <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
body {
min-height: 100vh;
display: flex;
justify-content: center;
align-items: center;
background:
linear-gradient(to right, #3498db, #8e44ad);
margin: 0;
}
.container { width: 100%; text-align: center; } .content {
padding: 10px; border: 2px solid mint; text-align: center; max-width: 800px; margin: 0 auto; }
.content h1 { font-size: 26px; font-weight: bold; color: black; margin-bottom: 16px; } .content p { font-size: 18px;
font-weight: bold; color: black; margin-bottom: 16px; } @media (max-width: 768px) { .content { padding: 10px; }
.content h1 { font-size: 20px; } .content p { font-size: 16px; } }
</style>
</head>

<body class="font-sans text-gray-900 antialiased">
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 w-1/3">
<div class="container">
    <div class="content">
        <h1>Edu-GPT</h1>
        <p>Team: CONNECT </p>
    </div>
</div>

<div>
    <a href="/">
        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
            <!-- Book Cover -->
            <path d="M8 8V64H56V8H8Z" fill="#3498db" />

            <!-- Book Pages -->
            <path d="M15.6 8.07272L8 8L8 64H15.6V8.07272Z" fill="white" />
            <path d="M8 8L15.6 8.07272V64H8V8Z" fill="#8e44ad" />
        </svg>
    </a>
</div>

<div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
    <div style="background-color: #FFF; padding: 20px; border-radius: 8px;">
        {{ $slot }}
    </div>
</div>

    </div>
</body>

</html>