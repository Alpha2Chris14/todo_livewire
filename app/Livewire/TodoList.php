<?php

namespace App\Livewire;

use App\Models\todo;
use Exception;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    #[Rule("required|min:4|max:100")]
    public $name;

    public $search;

    public $editingTodoID;

    #[Rule("required|min:4|max:100")]
    public $editingTodoName;

    public function create(){
        // validate the input
        $validated = $this->validateOnly('name');
        // create the todo
        todo::create($validated);
        // clear the input
        $this->reset();
        // send flash message
        session()->flash("success","Todo created successfully");

        $this->resetPage();
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
        try{
            Todo::findOrFail($id)->delete();
        }catch(Exception $e){
            session()->flash('error','failed to delete todo');
            return;
        }

    }

    public function edit($id){
        $this->editingTodoID = $id;
        $this->editingTodoName = Todo::find($id)->name;
    }

    public function update(){
        $this->validateOnly('editingTodoName');
        $todo = Todo::find($this->editingTodoID);
        $todo->name = $this->editingTodoName;
        $todo->save();
        $this->cancelEdit();
        session()->flash("success","Todo updated successfully");
    }

    public function cancelEdit(){
        $this->reset("editingTodoID","editingTodoName");
    }
}
