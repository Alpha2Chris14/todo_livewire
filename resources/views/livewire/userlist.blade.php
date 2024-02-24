<div>
    @if (session('error'))
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Error !</span> {{session('error')}}.
      </div>
    @endif
    <div id="todos-list  ml-4">
        @foreach ($users as $user)
            @include('livewire.include.user-card')
        @endforeach
        <div class="my-2">
            <!-- Pagination goes here -->
            {{$users->links()}}
        </div>
    </div>
</div>