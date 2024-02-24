<div>

    <table class="table-fixed">
        <thead>
          <tr>
            <th>Song</th>
            <th>Artist</th>
            <th>Year</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)
                @include('livewire.include.user-card')
            @endforeach
        </tbody>

      </table>
      <div class="my-2">
        <!-- Pagination goes here -->
        {{$users->links()}}
    </div>

</div>
