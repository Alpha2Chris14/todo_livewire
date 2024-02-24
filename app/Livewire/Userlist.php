<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Userlist extends Component
{
    use WithPagination;
    public function render()
    {
        $data['users'] = User::latest()->paginate(3);
        return view('livewire.userlist',$data);
    }
}
