<?php

namespace App\Livewire\Leave;

use App\Models\Leave;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LeaveManager extends Component
{
    public $start_date;
    public $end_date;
    public $reason;
    public $type = 'personal';
    public $leaves = [];

    protected $rules = [
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'reason' => 'required|string|min:10',
        'type' => 'required|in:sick,vacation,personal'
    ];

    public function mount()
    {
        $this->leaves = Leave::where('user_id', Auth::id())->latest()->get();
    }

    public function submit()
    {
        $this->validate();

        Leave::create([
            'user_id' => Auth::id(),
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'reason' => $this->reason,
            'type' => $this->type,
            'status' => 'pending'
        ]);

        $this->reset(['start_date', 'end_date', 'reason']);
        $this->leaves = Leave::where('user_id', Auth::id())->latest()->get();

        session()->flash('message', 'Leave request submitted successfully.');
    }

    public function render()
    {
        return view('livewire.leave.manager');
    }
}