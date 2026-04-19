@extends('layouts.app')

@section('content')
<div class="h-screen flex flex-col bg-gray-100">
    <!-- Chat Header -->
    <div class="bg-white border-b border-gray-200 px-4 py-3 flex items-center space-x-3">
        <a href="{{ route('messages.index') }}" 
           class="text-gray-500 hover:text-gray-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <div class="w-10 h-10 rounded-full overflow-hidden flex-shrink-0">
            @if($otherUser->avatar)
                <img src="{{ Storage::url($otherUser->avatar) }}" alt="{{ $otherUser->name }}" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-teal-500 flex items-center justify-center">
                    <span class="text-white font-semibold text-lg">{{ substr($otherUser->name, 0, 1) }}</span>
                </div>
            @endif
        </div>
        <div class="flex-1">
            <h1 class="text-lg font-semibold text-gray-900">{{ $otherUser->name }}</h1>
            <p class="text-sm text-gray-500">{{ $otherUser->email }}</p>
        </div>
        <div class="flex items-center space-x-2">
            <button class="p-2 text-gray-500 hover:text-gray-700 rounded-full hover:bg-gray-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
            </button>
            <button class="p-2 text-gray-500 hover:text-gray-700 rounded-full hover:bg-gray-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Messages Container -->
    <div class="flex-1 overflow-y-auto bg-gray-100 px-4 py-2" id="messages-container">
        @if($messages->count() > 0)
            @foreach($messages as $message)
                <div class="flex {{ $message->sender_id == auth()->id() ? 'justify-end' : 'justify-start' }} mb-3" data-message-id="{{ $message->id }}">
                    <div class="max-w-xs lg:max-w-md">
                        @if($message->sender_id != auth()->id())
                            <!-- Received Message -->
                            <div class="flex items-end space-x-2">
                                <div class="w-8 h-8 rounded-full overflow-hidden flex-shrink-0">
                                    @if($otherUser->avatar)
                                        <img src="{{ Storage::url($otherUser->avatar) }}" alt="{{ $otherUser->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-teal-500 flex items-center justify-center">
                                            <span class="text-white text-sm font-semibold">{{ substr($otherUser->name, 0, 1) }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="bg-white rounded-lg rounded-bl-md px-4 py-2 shadow-sm">
                                    <p class="text-sm text-gray-900">{{ $message->content }}</p>
                                    <div class="flex items-center justify-between mt-1">
                                        <span class="text-xs text-gray-500">
                                            {{ $message->created_at->format('g:i A') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- Sent Message -->
                            <div class="flex items-end space-x-2">
                                <div class="bg-teal-500 rounded-lg rounded-br-md px-4 py-2 shadow-sm">
                                    <p class="text-sm text-white">{{ $message->content }}</p>
                                    <div class="flex items-center justify-between mt-1">
                                        <span class="text-xs text-teal-100">
                                            {{ $message->created_at->format('g:i A') }}
                                        </span>
                                        <span class="text-xs text-teal-100 ml-2">
                                            @if($message->isRead())
                                                ✓✓
                                            @else
                                                ✓
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="w-8 h-8 rounded-full overflow-hidden flex-shrink-0">
                                    @if(auth()->user()->avatar)
                                        <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-teal-500 flex items-center justify-center">
                                            <span class="text-white text-sm font-semibold">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center py-8">
                <div class="text-gray-400 mb-4">
                    <svg class="mx-auto h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </div>
                <p class="text-gray-500">No messages yet. Start the conversation!</p>
            </div>
        @endif
    </div>

    <!-- Typing Indicator -->
    <div id="typing-indicator" class="bg-white border-t border-gray-200 px-4 py-2 hidden">
        <div class="flex items-center space-x-2">
            <div class="w-8 h-8 rounded-full overflow-hidden flex-shrink-0">
                @if($otherUser->avatar)
                    <img src="{{ Storage::url($otherUser->avatar) }}" alt="{{ $otherUser->name }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-teal-500 flex items-center justify-center">
                        <span class="text-white text-sm font-semibold">{{ substr($otherUser->name, 0, 1) }}</span>
                    </div>
                @endif
            </div>
            <div class="flex space-x-1">
                <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
            </div>
            <span class="text-sm text-gray-500">{{ $otherUser->name }} is typing...</span>
        </div>
    </div>

    <!-- Message Input -->
    <div class="bg-white border-t border-gray-200 px-4 py-3">
        <form method="POST" action="{{ route('messages.store') }}" class="flex items-end space-x-3" id="message-form">
            @csrf
            <input type="hidden" name="receiver_id" value="{{ $otherUser->id }}">
            
            <!-- Emoji Button -->
            <button type="button" class="p-2 text-gray-500 hover:text-gray-700 rounded-full hover:bg-gray-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </button>
            
            <!-- Message Input -->
            <div class="flex-1">
                <textarea 
                    name="content" 
                    placeholder="Type a message..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent resize-none"
                    rows="1"
                    id="message-input"
                ></textarea>
            </div>
            
            <!-- Send Button -->
            <button type="submit" 
                    class="bg-teal-500 hover:bg-teal-600 text-white p-2 rounded-full transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                </svg>
            </button>
        </form>
        @error('content')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

<script>
let lastMessageId = {{ $messages->count() > 0 ? $messages->last()->id : 0 }};
let isPolling = true;
let sentMessageIds = new Set(); // Track sent messages to prevent duplicates

// Auto-scroll to bottom of messages
function scrollToBottom() {
    const messagesContainer = document.getElementById('messages-container');
    if (messagesContainer) {
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }
}

// Check if message already exists
function messageExists(messageId) {
    return document.querySelector(`[data-message-id="${messageId}"]`) !== null;
}

// Add new message to the chat
function addMessage(message, isOwnMessage = false) {
    // Prevent duplicate messages
    if (messageExists(message.id) || sentMessageIds.has(message.id)) {
        return;
    }
    
    const messagesContainer = document.getElementById('messages-container');
    const messageDiv = document.createElement('div');
    messageDiv.className = `flex ${isOwnMessage ? 'justify-end' : 'justify-start'} mb-3`;
    messageDiv.setAttribute('data-message-id', message.id);
    
    const currentUser = {{ auth()->id() }};
    const otherUser = {{ $otherUser->id }};
    const otherUserName = '{{ $otherUser->name }}';
    const currentUserName = '{{ auth()->user()->name }}';
    const otherUserAvatar = '{{ $otherUser->avatar ? Storage::url($otherUser->avatar) : '' }}';
    const currentUserAvatar = '{{ auth()->user()->avatar ? Storage::url(auth()->user()->avatar) : '' }}';

    const avatarHtml = (avatar, name) => avatar
        ? `<img src="${avatar}" alt="${name}" class="w-full h-full object-cover">`
        : `<span class="text-white text-sm font-semibold">${name.charAt(0)}</span>`;

    if (isOwnMessage) {
        messageDiv.innerHTML = `
            <div class="max-w-xs lg:max-w-md">
                <div class="flex items-end space-x-2">
                    <div class="bg-teal-500 rounded-lg rounded-br-md px-4 py-2 shadow-sm">
                        <p class="text-sm text-white">${message.content}</p>
                        <div class="flex items-center justify-between mt-1">
                            <span class="text-xs text-teal-100">${new Date(message.created_at).toLocaleTimeString('en-US', { hour: 'numeric', minute: '2-digit' })}</span>
                            <span class="text-xs text-teal-100 ml-2">✓</span>
                        </div>
                    </div>
                    <div class="w-8 h-8 rounded-full overflow-hidden flex-shrink-0 bg-teal-500 flex items-center justify-center">
                        ${avatarHtml(currentUserAvatar, currentUserName)}
                    </div>
                </div>
            </div>
        `;
    } else {
        messageDiv.innerHTML = `
            <div class="max-w-xs lg:max-w-md">
                <div class="flex items-end space-x-2">
                    <div class="w-8 h-8 rounded-full overflow-hidden flex-shrink-0 bg-teal-500 flex items-center justify-center">
                        ${avatarHtml(otherUserAvatar, otherUserName)}
                    </div>
                    <div class="bg-white rounded-lg rounded-bl-md px-4 py-2 shadow-sm">
                        <p class="text-sm text-gray-900">${message.content}</p>
                        <div class="flex items-center justify-between mt-1">
                            <span class="text-xs text-gray-500">${new Date(message.created_at).toLocaleTimeString('en-US', { hour: 'numeric', minute: '2-digit' })}</span>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
    
    messagesContainer.appendChild(messageDiv);
    scrollToBottom();
    lastMessageId = message.id;
    
    // Track sent messages to prevent duplicates
    if (isOwnMessage) {
        sentMessageIds.add(message.id);
    }
}

// Poll for new messages
function pollForNewMessages() {
    if (!isPolling) return;
    
    fetch(`{{ route('messages.new', $otherUser->id) }}?last_message_id=${lastMessageId}`)
        .then(response => response.json())
        .then(data => {
            if (data.messages && data.messages.length > 0) {
                data.messages.forEach(message => {
                    const isOwnMessage = message.sender_id == {{ auth()->id() }};
                    
                    // Only add messages that don't already exist
                    if (!messageExists(message.id) && !sentMessageIds.has(message.id)) {
                        addMessage(message, isOwnMessage);
                        
                        // Show notification for new messages from other users
                        if (!isOwnMessage && document.hidden) {
                            showNotification(`New message from ${otherUserName}: ${message.content.substring(0, 50)}${message.content.length > 50 ? '...' : ''}`, 'info', 5000);
                            playNotificationSound();
                        }
                    }
                });
                
                // Update unread count in navigation
                if (data.unread_count !== undefined) {
                    updateUnreadCount(data.unread_count);
                }
            }
        })
        .catch(error => console.error('Error polling for messages:', error));
}

// Update unread count in navigation
function updateUnreadCount(count) {
    const unreadBadges = document.querySelectorAll('[data-unread-count]');
    unreadBadges.forEach(badge => {
        if (count > 0) {
            badge.textContent = count > 99 ? '99+' : count;
            badge.style.display = 'flex';
        } else {
            badge.style.display = 'none';
        }
    });
}

// Send message via AJAX
document.getElementById('message-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const messageInput = document.getElementById('message-input');
    const content = messageInput.value.trim();
    
    if (!content) return;
    
    // Disable form while sending
    const submitButton = this.querySelector('button[type="submit"]');
    const originalContent = submitButton.innerHTML;
    submitButton.innerHTML = '<svg class="w-6 h-6 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>';
    submitButton.disabled = true;
    
    fetch(this.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Add message immediately to UI
            addMessage(data.message, true);
            messageInput.value = '';
            messageInput.style.height = 'auto';
            
            // Update last message ID to prevent polling from adding it again
            lastMessageId = data.message.id;
        }
    })
    .catch(error => {
        console.error('Error sending message:', error);
        alert('Failed to send message. Please try again.');
    })
    .finally(() => {
        submitButton.innerHTML = originalContent;
        submitButton.disabled = false;
    });
});

// Auto-resize textarea
document.addEventListener('DOMContentLoaded', function() {
    scrollToBottom();
    
    const messageInput = document.getElementById('message-input');
    if (messageInput) {
        messageInput.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = Math.min(this.scrollHeight, 120) + 'px';
        });
        
        // Show typing indicator when user starts typing
        let typingTimeout;
        messageInput.addEventListener('input', function() {
            // Show typing indicator to other user (simulated)
            const typingIndicator = document.getElementById('typing-indicator');
            if (typingIndicator) {
                typingIndicator.classList.remove('hidden');
                
                // Hide typing indicator after 3 seconds of no typing
                clearTimeout(typingTimeout);
                typingTimeout = setTimeout(() => {
                    typingIndicator.classList.add('hidden');
                }, 3000);
            }
        });
    }
    
    // Start polling for new messages
    setInterval(pollForNewMessages, 3000); // Poll every 3 seconds
    
    // Mark messages as read when user is active
    let isUserActive = true;
    let activityTimeout;
    
    function resetActivityTimeout() {
        clearTimeout(activityTimeout);
        isUserActive = true;
        activityTimeout = setTimeout(() => {
            isUserActive = false;
        }, 30000); // 30 seconds
    }
    
    // Reset timeout on user activity
    document.addEventListener('mousemove', resetActivityTimeout);
    document.addEventListener('keypress', resetActivityTimeout);
    document.addEventListener('click', resetActivityTimeout);
    
    // Mark messages as read when user is active
    setInterval(() => {
        if (isUserActive) {
            fetch(`{{ route('messages.read', $otherUser->id) }}`, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.unread_count !== undefined) {
                    updateUnreadCount(data.unread_count);
                }
            })
            .catch(error => console.error('Error marking messages as read:', error));
        }
    }, 5000); // Check every 5 seconds
    
    resetActivityTimeout();
});

// Play notification sound
function playNotificationSound() {
    try {
        const audio = new Audio('data:audio/wav;base64,UklGRnoGAABXQVZFZm10IBAAAAABAAEAQB8AAEAfAAABAAgAZGF0YQoGAACBhYqFbF1fdJivrJBhNjVgodDbq2EcBj+a2/LDciUFLIHO8tiJNwgZaLvt559NEAxQp+PwtmMcBjiR1/LMeSwFJHfH8N2QQAoUXrTp66hVFApGn+DyvmwhBSuBzvLZiTYIG2m98OScTgwOUarm7blmGgU7k9n1unEiBC13yO/eizEIHWq+8+OWT');
        audio.volume = 0.3;
        audio.play().catch(e => console.log('Audio play failed:', e));
    } catch (e) {
        console.log('Audio notification failed:', e);
    }
}

// Stop polling when page is not visible
document.addEventListener('visibilitychange', function() {
    isPolling = !document.hidden;
});
</script>
@endsection 