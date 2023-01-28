<?php

namespace App\Http\Livewire;

use App\Models\Inspection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Inspections extends Component
{

    public function addInspection()
    {
        Inspection::create([
            'user_id' => Auth::id(),
        ]);
    }

    public function render()
    {
        $inspections = Inspection::query()
            ->where('user_id', Auth::id())
            ->get();

        return view('livewire.inspections', [
            'inspections' => $inspections
        ]);
    }
}
