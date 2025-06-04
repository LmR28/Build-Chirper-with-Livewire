<?php
namespace App\Livewire\Chirps;

use Livewire\Component;
use App\Models\Chirp;

class ChirpList extends Component
{
    public function render()
    {
        return view('livewire.chirps.chirp-list', [
            'chirps' => Chirp::with('user')->latest()->get(),
        ]);
    }
}
