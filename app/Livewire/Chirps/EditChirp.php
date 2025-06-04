<?php

namespace App\Livewire\Chirps;

use Livewire\Component;
use App\Models\Chirp;
use Illuminate\Support\Facades\Auth;

class EditChirp extends Component
{
    public Chirp $chirp;
    public string $message;

    protected $rules = [
        'message' => 'required|string|max:255',
    ];

    public function mount(Chirp $chirp)
    {
        if ($chirp->user_id !== Auth::id()) {
            abort(403);
        }

        $this->message = $chirp->message;
    }

    public function update()
    {
        $this->validate();

        $this->chirp->update([
            'message' => $this->message,
        ]);

        $this->dispatch('chirpUpdated');
    }

    public function render()
    {
        return view('livewire.chirps.edit-chirp');
    }
}
