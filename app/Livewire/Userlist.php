<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Userlist extends Component
{
    use WithPagination;
    public $count = 0;

    #[On('user_created')]
    public function updateList($user=null){
        dd("Hello");
    }
    public function render()
    {
        $data['users'] = User::latest()->paginate(3);
        return view('livewire.userlist',$data);
    }
}
