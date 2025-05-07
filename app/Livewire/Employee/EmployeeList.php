<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use App\Models\User;

class EmployeeList extends Component
{
    public $search = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        $query = User::query();

        // Apply search filter
        if ($this->search) {
            $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

        // Get authenticated user's role
        $user = \Illuminate\Support\Facades\Auth::user();
        
        // Exclude super_admin users from the list
        $query->where('role', '!=', 'super_admin');

        $employees = $query->orderBy($this->sortField, $this->sortDirection)
                          ->paginate(10);

        return view('livewire.employee.employee-list', [
            'employees' => $employees
        ]);
    }
}