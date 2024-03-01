<div id="tableContainer">
    <table id="dataTable">
        <thead>
            <tr>
                <th>Serial</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
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
