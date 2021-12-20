<div class="w-full">
    <div class="coding inverse-toggle px-5 pt-4 shadow-lg text-gray-100 text-sm font-mono subpixel-antialiased
              bg-gray-800  pb-6 pt-4 rounded-lg leading-normal overflow-hidden">
        <div class="top mb-2 flex">
            <div class="h-3 w-3 bg-red-500 rounded-full"></div>
            <div class="ml-2 h-3 w-3 bg-yellow-300 rounded-full"></div>
            <div class="ml-2 h-3 w-3 bg-green-500 rounded-full"></div>
        </div>
        <div class="mt-4 flex">
            <span class="text-green-400">{{ gethostname() }}:~$</span>
            <p class="flex-1 typing items-center pl-2">
                {{ $message }}
                <br>
            </p>
        </div>
    </div>
</div>
