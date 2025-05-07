<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employee Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Profile Card -->
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-6">
                            <h3 class="text-lg font-semibold mb-4">My Profile</h3>
                            <ul class="space-y-2">
                                <li>
                                    <a href="#" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                        View Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                        Update Information
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                        Documents
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Leave Management Card -->
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-6">
                            <h3 class="text-lg font-semibold mb-4">Leave Management</h3>
                            <ul class="space-y-2">
                                <li>
                                    <a href="#" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                        Request Leave
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                        Leave History
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                        Leave Balance
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Attendance Card -->
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-6">
                            <h3 class="text-lg font-semibold mb-4">Attendance</h3>
                            <ul class="space-y-2">
                                <li>
                                    <a href="#" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                        Time In/Out
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                        Attendance History
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                        Request Adjustment
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
