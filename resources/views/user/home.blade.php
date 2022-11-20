@extends('layouts.user')

@section('content')
    <?php
    // dd($posts);
    ?>
    <style>
        .left .sidebar .activeup {
            background: var(--color-light);
        }

        #menu-home h3 {
            color: var(--color-primary);
        }

        .left .sidebar #menu-home::before {
            content: "";
            display: block;
            width: 0.5rem;
            height: 100%;
            position: absolute;
            background: var(--color-primary);
            border-radius: 100% 0% 0% 0% / 0.5rem 0% 10% 0%;
        }

        .left .sidebar .menu-item:first-child #menu-home {
            border-top-left-radius: var(--card-border-radius);
            overflow: hidden;
        }

        .left .sidebar .menu-item:last-child #menu-home {
            border-bottom-left-radius: var(--card-border-radius);
            overflow: hidden;
        }
    </style>
    <div class="middle">
        <livewire:add-posts />
        <livewire:fetch-posts />
    </div>
@endsection
