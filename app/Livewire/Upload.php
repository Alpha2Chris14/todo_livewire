<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Upload extends Component
{
    /* handles file upload */
    use WithFileUploads;

    #[Rule("required|min:4")]
    public $username;

    #[Rule("required|unique:users")]
    public $email;

    #[Rule("required")]
    public $password;

    #[Rule("nullable|sometimes|file|max:1024")]
    public $image;

    public function register(){
        $validated = $this->validate();
        if($this->image){
            $validated['image'] = $this->image->store("uploads","public");
        }
        $validated['password'] = Hash::make($this->password);
        $validated['name'] = $this->username;
        User::create($validated);
        $this->reset();
        session()->flash("success","user created succcessfully");
    }
    public function render()
    {
        return view('livewire.upload');
    }
}
