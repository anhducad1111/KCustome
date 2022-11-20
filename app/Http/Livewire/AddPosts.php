<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddPosts extends Component
{
    public function render()
    {
        $categories = DB::table('categories')->orderBy('id', 'desc')->get();
        return view('livewire.add-posts')->with('categories', $categories);
    }
}
