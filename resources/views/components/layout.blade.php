<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? 'ShortURL' }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        @production
            @php
                $manifest = json_decode(file_get_contents(public_path('dist/manifest.json')), true);
            @endphp
            <script type="module" src="/dist/{{ $manifest['resources/js/app.ts']['file'] }}"></script>
            <link rel="stylesheet" href="/dist/{{ $manifest['resources/js/app.ts']['css'][0] }}">
        @else
            @vite
            @client
        @endproduction
    </head>
    <body class="antialiased min-h-screen overflow-hidden bg-gradient-to-b from-slate-100 via-slate-50 to-violet-500">
        <div class="flex justify-center mt-8 md:mt-16">
            <h1 class="font-extrabold">
                <a href="/">
                    <span class="text-violet-800 text-4xl  md:text-6xl">SHORT</span>
                    <span class="text-6xl md:text-8xl">URL</span>
                </a>
            </h1>
        </div>
        <div class="flex justify-center mt-8 max-w-lg m-auto">
            {{ $slot }}
        </div>
    </body>
</html>
