@extends('layouts')
@section('title')
Monitor
@endsection

@section('contents')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 min-h-screen">
    <!-- Foods (Left Side) - Takes 2 Rows -->
    <div class="lg:row-span-2 flex flex-col gap-4">
        <div class="shadow-xl rounded-md p-4">
            <h2 class="text-lg font-semibold">Foods</h2>
            <div class="flex flex-col gap-2 mt-2">
                @foreach ($foods as $food)
                <div>
                    <label class="block text-sm font-medium">{{ $food->name }} - <span>{{ $food->presentase }} %</span></label>
                    <progress class="progress progress-secondary w-full" value="{{ $food->current_stock }}" max="{{ $food->weight }}"></progress>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Right Side: Schedules & Devices (Horizontal) -->
    <div class="lg:col-span-2 flex flex-col gap-4">
        <!-- Schedules -->
        <div class="p-4">
            <h2 class="text-lg font-semibold mb-2">Schedules</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($schedules as $schedule)
                    @php
                    $start_hour = (int) substr($schedule['time_start'], 0, 2);
                    $start_minute = (int) substr($schedule['time_start'], 3,4);
                    $end_hour = (int) substr($schedule['time_end'], 0, 2);
                    $end_minute = (int) substr($schedule['time_end'], 3,4);
                    @endphp
                    <div class="card bg-primary-800 text-primary-content shadow-lg rounded-lg p-4 flex flex-col items-center">
                        <h3 class="text-lg font-semibold">{{ $schedule['name'] }}</h3>
                        <span class="text-sm text-pink-500">Device: {{ $schedule['devices']['name'] }}</span>
                        <div class="flex space-x-6 mt-4">
                            <div class="flex flex-col items-center">
                                <div class="radial-progress bg-slate text-primary"
                                    style="--value:{{ substr($schedule['time_start'], 0, 2) * 4.16 }}; --size:4rem;">
                                    {{ sprintf("%02d:%02d", $start_hour, $start_minute) }}
                                </div>
                                <span class="text-xs mt-2">Start</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="radial-progress bg-slate text-secondary"
                                    style="--value:{{ substr($schedule['time_end'], 0, 2) * 4.16 }}; --size:4rem;">
                                    {{ sprintf("%02d:%02d", $end_hour, $end_minute) }}
                                </div>
                                <span class="text-xs mt-2">End</span>
                            </div>
                        </div>
                        <p class="text-xs text-gray-300 mt-2">- {{ sprintf("%02d:%02d", $end_hour, $end_minute) }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Devices -->
        <div class="p-4">
            <h2 class="text-lg font-semibold mb-2">Devices</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($devices as $device)
                <div class="shadow-lg p-4 rounded-lg">
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <h3 class="text-lg font-semibold">{{ $device['name'] }}</h3>
                            <input type="checkbox" class="toggle"  {{ $device->status ? 'checked' : '' }} />
                        </label>
                    </div>
                    <p class="text-sm">
                        Connection:
                        <span class="{{ $device['connection_status'] == 1 ? 'text-green-500' : 'text-red-500' }}">
                            {{ $device['connection_status'] == 1 ? 'On' : 'Off' }}
                        </span>
                    </p>
                    <p class="text-sm">Food: {{ $device['food']['name'] ?? '-' }}</p>
                    <p class="text-xs text-gray-500">Latest Active: {{ \Carbon\Carbon::parse($device['latest_active'])->format('H:i d-m-Y') }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
