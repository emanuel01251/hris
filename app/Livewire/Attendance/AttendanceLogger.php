<?php

namespace App\Livewire\Attendance;

use Livewire\Component;
use App\Models\AttendanceLog;
use Illuminate\Support\Facades\Auth;

class AttendanceLogger extends Component
{
    public $lastLog;
    public $currentTime;

    public function mount()
    {
        $this->lastLog = AttendanceLog::where('user_id', Auth::id())
            ->whereDate('created_at', today())
            ->latest()
            ->first();
        $this->currentTime = now()->setTimezone('Asia/Manila')->format('g:i A');
    }

    public function timeIn()
    {
        $this->lastLog = AttendanceLog::create([
            'user_id' => Auth::id(),
            'time_in' => now(),
        ]);

        session()->flash('message', 'Time in recorded successfully.');
    }

    public function timeOut()
    {
        if ($this->lastLog && !$this->lastLog->time_out) {
            $this->lastLog->update([
                'time_out' => now(),
            ]);
            session()->flash('message', 'Time out recorded successfully.');
        } else {
            session()->flash('error', 'Please time in first.');
        }
    }

    public function render()
    {
        $logs = AttendanceLog::with('user')
            ->whereDate('created_at', today())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.attendance.attendance-logger', [
            'logs' => $logs
        ]);
    }
}