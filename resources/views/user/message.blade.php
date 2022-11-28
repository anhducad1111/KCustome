@extends('layouts.user')

@section('content')
    <div class="middle">
        <div class="feeds">
            <div class="feed">
                <div class="user-name">
                    {{-- @php
                        dd($receiver);
                    @endphp --}}
                    {{  $receiver->name }}
                </div>
                <livewire:all-message :receiverId="$receiver->id"/>
                <livewire:send-message :receiverID="$receiver->id"/>
            </div>
        </div>
    </div>
@endsection
