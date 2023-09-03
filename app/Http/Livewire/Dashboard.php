<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    protected $queryString = ['sortField', 'sortDirection'];
    public $search = "";
    public $sortDirection = 'asc';
    public $sortField = 'name';
    public $showEditModal = false;

    public function edit()
    {
        $this->showEditModal = true;
    }

    public function sortBy($field)
    {

        if ($this->sortField == $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    public function render()
    {
        return view('livewire.dashboard', [
            'users' => User::search('name', $this->search)->orderBy($this->sortField, $this->sortDirection)->paginate(10),
        ]);
    }
}
