<?php

namespace App\Livewire;

use App\Models\todo;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;
    #[Rule("required|min:4|max:100")]
    public $name;

    public $search;

    public function create(){
        // validate the input
        $validated = $this->validateOnly('name');
        // create the todo
        todo::create($validated);
        // clear the input
        $this->reset();
        // send flash message
        session()->flash("success","Todo created successfully");
    }

    public function toggle($id){
        $todo = Todo::find($id);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function render()
    {
        $data['todos'] = Todo::latest()->where("name","like","%{$this->search}%")->paginate(5);
        return view('livewire.todo-list',$data);
    }

    public function delete($id){
        Todo::find($id)->delete();
    }
}
