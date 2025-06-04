<?php

namespace App\Livewire\Chirps;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Chirp;
use Illuminate\Support\Facades\Auth;

class CreateChirp extends Component
{
    #[Validate('required|string|max:255')]
    public string $message = '';

    public ?string $successMessage = null;

    public function save()
    {
        $validated = $this->validate();

        Chirp::create([
            'user_id' => Auth::id(),
            'message' => $validated['message'],
        ]);

        $this->reset('message'); // Limpia el textarea
        $this->successMessage = '¡Chirp Creado con éxito!';
        $this->dispatch('chirp-created');
    }

    public function render()
    {
        return view('livewire.chirps.create-chirp');
    }
}