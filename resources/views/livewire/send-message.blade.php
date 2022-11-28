<div>
    <form class="pt-4 d-flex" wire:submit.prevent="store({{ $receiverID }})">
        <input type="hidden" wire:model="receiverId" value="{{ request()->user_id }}">
        <input type="text" name="" id="" class="text-black border p-2 px-4 rounded-2" wire:model="message" style="width: 85%">
        <button class="py-2 px-4 rounded-2 bg-info" style="width: 15%">Send</button>
    </form>
</div>
