<?php

namespace App\Http\Livewire\Inspection;

use App\Models\Area;
use App\Models\BasicArea;
use App\Models\Inspection;
use App\Models\MediaInspection;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Inspections extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function addInspection()
    {
        Inspection::createInspection();
    }

    public function render()
    {
        $inspections = Inspection::query()
            ->where('user_id', Auth::id())
            ->when($this->search, fn($query) =>
            $query->where('title', 'like', '%' . $this->search . '%')
            )
            ->with('media')
            ->latest()
            ->simplePaginate(9);

        return view('livewire.inspection.inspections', [
            'inspections' => $inspections,
        ]);
    }
}
