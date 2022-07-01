<x-layout>
    <x-slot:title>ShortURL</x-slot>
    
    <div class="w-full px-4">
        <div class="text-center">
            <p class="font-bold">Success! Your short url is:</p>
            <p class="text-violet-800 hover:underline text-lg mt-1">
                <a href="{{ $shortUrl }}" target="_blank" id="url">{{ $shortUrl }}</a>
            </p>
        </div>

        <div class="text-center mt-24">
            <a href="/">
                <button class="px-2 py-1 shadow-md bg-violet-800 text-white font-bold rounded-lg hover:bg-violet-300 hover:text-black transition-all">
                    Short another one!
                </button>
            </a>
        </div>
    </div>
</x-layout>
