<?php

namespace App\Livewire\Chirps;

use Livewire\Component;
use App\Models\Chirp;
use Illuminate\Support\Facades\Auth;

class CreateChirp extends Component
{
    public string $message = '';

    protected $rules = [
        'message' => 'required|string|max:255',
    ];

    public function save()
    {
        $this->validate();

        Chirp::create([
            'user_id' => Auth::id(),
            'message' => $this->message,
        ]);

        $this->reset('message');

        $this->dispatch('chirpCreated');
    }

    public function render()
    {
        return view('livewire.chirps.create-chirp');
    }
}
