<x-layout>
    <x-slot:title>ShortURL</x-slot>
    
    <div class="w-full px-4">
        <form action="/create" method="post" class="flex gap-4">
            @csrf
            <input type="text" name="long_url" placeholder="Take a link and make it shorter!" class="shadow-md px-2 py-1 w-full rounded-lg border border-violet-800">
            <button class="px-2 py-1 shadow-md bg-violet-800 text-white font-bold rounded-lg hover:bg-violet-300 hover:text-black transition-all">
                <input type="submit" value="Shorten" class="cursor-pointer" >
            </button>
        </form>

        @if ($errors->any())
        <div class="m-2 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</x-layout>
