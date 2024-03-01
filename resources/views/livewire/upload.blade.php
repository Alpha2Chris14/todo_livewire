<div>
    <div class="w-full max-w-lg mt-4">
        @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Success!</span> {{session('success')}}.
          </div>
        @endif
        <form wire:submit='register' class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            {{-- username --}}
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
              Username
            </label>
            <input wire:model='username' class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
            @error('username')
            <p class="text-red-500 text-xs italic">{{$message}}.</p>
            @enderror
          </div>

        {{-- email --}}
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
              Email
            </label>
            <input wire:model='email' class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email">
            @error('email')
            <p class="text-red-500 text-xs italic">{{$message}}.</p>
            @enderror
        </div>

          {{-- password --}}
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
              Password
            </label>
            <input wire:model='password' class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
            @error('password')
            <p class="text-red-500 text-xs italic">{{$message}}.</p>
            @enderror
          </div>

          {{-- password --}}
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
              Upload Image
            </label>
            <input wire:model='image' class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="image" type="file">
            @error('image')
            <p class="text-red-500 text-xs italic">{{$message}}.</p>
            @enderror
            <div wire:loading wire:target='image'>
                <div>
                    <span class="flex h-3 w-3 pointer-events-none">
                        <span class="animate-ping absolute inline-flex h-10 w-10 rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                      </span>
                </div>
            </div>
            @if ($image)
                <img class="rounded w-20 h-20 mt-5 block" src="{{$image->temporaryUrl() }}" alt="">
            @endif
          </div>

          <div wire:loading.delay>
                <span class="flex h-3 w-3 pointer-events-none">
                    <span class="animate-ping absolute inline-flex h-10 w-10 rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                </span>
          </div>

          <div class="flex items-center justify-between">
            <button type="button" @click="$dispatch('user_created')" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Refresh
              </button>

            <button wire.loading.class="bg-red-500" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
              Sign Up
            </button>

          </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
          &copy;2020 Acme Corp. All rights reserved.
        </p>
      </div>
</div>
