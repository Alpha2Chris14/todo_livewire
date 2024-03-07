<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Userpage extends Component
{
    #[Title('User Page')]
    #[Layout('livewire.layout.app')]

    public $user;

    public function mount(User $user){
        $this->user = $user;
    }
    public function render()
    {
        return view('livewire.userpage');
    }
}
