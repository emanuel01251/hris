<?php

namespace App\Livewire\Attendance;

use Livewire\Component;
use App\Models\Timesheet;
use Illuminate\Support\Facades\Auth;

class TimesheetManager extends Component
{
    public $date;
    public $timeIn;
    public $timeOut;
    public $status = 'present';
    public $notes;

    protected $rules = [
        'date' => 'required|date',
        'timeIn' => 'required',
        'timeOut' => 'required|after:timeIn',
        'status' => 'required|in:present,absent,late',
        'notes' => 'nullable|string|max:255'
    ];

    public function mount()
    {
        $this->date = now()->format('Y-m-d');
        $this->timeIn = now()->format('H:i');
    }

    public function saveTimesheet()
    {
        $this->validate();

        Timesheet::create([
            'user_id' => Auth::id(),
            'date' => $this->date,
            'time_in' => $this->timeIn,
            'time_out' => $this->timeOut,
            'status' => $this->status,
            'notes' => $this->notes
        ]);

        $this->reset(['timeOut', 'notes']);
        session()->flash('message', 'Timesheet entry saved successfully.');
    }

    public function render()
    {
        $timesheets = Timesheet::where('user_id', Auth::id())
            ->orderBy('date', 'desc')
            ->orderBy('time_in', 'desc')
            ->paginate(10);

        return view('livewire.attendance.timesheet-manager', [
            'timesheets' => $timesheets
        ]);
    }
}