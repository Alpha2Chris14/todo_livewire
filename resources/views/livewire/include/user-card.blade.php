<tr wire:key='{{$user->id}}'>
    <td>{{++$count}}</td>
    <td>
        <img class="rounded w-20 h-20 mt-5 block" src="{{ asset('storage/' . $user->image) }}" alt="">
    </td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
  </tr>
