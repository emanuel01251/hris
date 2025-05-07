<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;
use App\Models\Attendance;

class HrDashboard extends Component
{
    public $employeeCount = 0;
    public $todayAttendance = 0;
    public $recentActivities = [];

    public function mount()
    {
        $this->loadDashboardData();
    }

    public function loadDashboardData()
    {
        // Get total employee count
        $this->employeeCount = User::where('role', 'employee')->count();

        // Get today's attendance count
        $this->todayAttendance = Attendance::whereDate('created_at', today())->count();

        // Get recent activities
        $this->recentActivities = Attendance::with('user')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($activity) {
                return [
                    'user' => $activity->user->name,
                    'action' => 'checked in',
                    'time' => $activity->created_at->diffForHumans()
                ];
            });
    }

    public function render()
    {
        return view('livewire.dashboard.hr-dashboard');
    }
}
