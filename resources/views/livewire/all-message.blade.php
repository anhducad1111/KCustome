<div wire:poll>
    @foreach ($messages as $message)
        @php
            // dd($receiverId);
        @endphp
        @if ($message->user_id == Auth::id() && $message->receiver_id == $receiverId)
            <div class="row mt-2">
                <div class="col-8"></div>
                <div class="col-4">
                    <div class="rounded-2 p-2 bg-secondary">
                        {{ $message->message }}
                    </div>
                </div>
            </div>
        @elseif($receiverId == $message->user_id && $message->receiver_id == Auth::id())
            <div class="row mt-2">
                <div class="col-4">
                    <div class="rounded-2 p-2 bg-danger">
                        {{ $message->message }}
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
