<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">Request Leave</h2>
                        <p class="mt-1 text-sm text-gray-600">Submit your leave request here.</p>
                    </header>

                    @if (session('message'))
                        <div class="mt-4 p-4 bg-green-100 text-green-700 rounded">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="submit" class="mt-6 space-y-6">
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700">Leave Type</label>
                            <select wire:model="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="personal">Personal Leave</option>
                                <option value="sick">Sick Leave</option>
                                <option value="vacation">Vacation</option>
                            </select>
                            @error('type') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                            <input type="date" wire:model="start_date" id="start_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('start_date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                            <input type="date" wire:model="end_date" id="end_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('end_date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="reason" class="block text-sm font-medium text-gray-700">Reason</label>
                            <textarea wire:model="reason" id="reason" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                            @error('reason') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Submit Request
                            </button>
                        </div>
                    </form>
                </section>
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">Leave History</h2>
                        <p class="mt-1 text-sm text-gray-600">Your leave requests history.</p>
                    </header>

                    <div class="mt-6 space-y-6">
                        @forelse ($leaves as $leave)
                            <div class="border-l-4 border-{{ $leave->status === 'approved' ? 'green' : ($leave->status === 'rejected' ? 'red' : 'yellow') }}-400 p-4 bg-gray-50">
                                <div class="flex justify-between">
                                    <div>
                                        <p class="font-medium">{{ ucfirst($leave->type) }} Leave</p>
                                        <p class="text-sm text-gray-600">{{ $leave->start_date->format('M d, Y') }} - {{ $leave->end_date->format('M d, Y') }}</p>
                                    </div>
                                    <div>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $leave->status === 'approved' ? 'green' : ($leave->status === 'rejected' ? 'red' : 'yellow') }}-100 text-{{ $leave->status === 'approved' ? 'green' : ($leave->status === 'rejected' ? 'red' : 'yellow') }}-800">
                                            {{ ucfirst($leave->status) }}
                                        </span>
                                    </div>
                                </div>
                                <p class="mt-2 text-sm text-gray-600">{{ $leave->reason }}</p>
                                @if ($leave->comments)
                                    <p class="mt-2 text-sm text-gray-500 italic">Comments: {{ $leave->comments }}</p>
                                @endif
                            </div>
                        @empty
                            <p class="text-gray-500">No leave requests found.</p>
                        @endforelse
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>