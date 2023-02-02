<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\BasicArea;
use App\Models\Inspection;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Inspections extends Component
{

    public function addInspection()
    {
        Inspection::createInspection();
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
