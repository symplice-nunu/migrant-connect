@props(['type' => 'info', 'message' => '', 'id' => null])

@php
$classes = match($type) {
    'success' => 'bg-green-500 text-white',
    'error' => 'bg-red-500 text-white',
    'warning' => 'bg-yellow-500 text-white',
    'info' => 'bg-blue-500 text-white',
    default => 'bg-gray-500 text-white'
};
@endphp

<div id="{{ $id ?? 'notification' }}" 
     class="fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg transform transition-all duration-300 translate-x-full {{ $classes }}"
     x-data="{ show: false }"
     x-show="show"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="transform translate-x-full"
     x-transition:enter-end="transform translate-x-0"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="transform translate-x-0"
     x-transition:leave-end="transform translate-x-full">
    <div class="flex items-center space-x-3">
        @if($type === 'success')
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        @elseif($type === 'error')
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        @elseif($type === 'warning')
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
            </svg>
        @else
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        @endif
        <span class="font-medium">{{ $message }}</span>
        <button @click="show = false" class="ml-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>

<script>
function showNotification(message, type = 'info', duration = 5000) {
    const notification = document.getElementById('notification');
    if (notification) {
        notification.querySelector('span').textContent = message;
        notification.className = notification.className.replace(/bg-\w+-500/g, `bg-${type}-500`);
        notification.__x.$data.show = true;
        
        setTimeout(() => {
            notification.__x.$data.show = false;
        }, duration);
    }
}
</script> 