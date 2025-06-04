<?php

namespace App\Livewire\Chirps;

use Livewire\Component;
use App\Models\Chirp;
use Illuminate\Support\Facades\Auth;

class EditChirp extends Component
{
    public Chirp $chirp;
    public string $message;

    protected $messages = [
    'message.required' => 'El mensaje no puede editar si esta vacío.',
    'message.max' => 'El mensaje no puede superar más de 255 caracteres.',

    ];
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
        session()->flash('success', '¡Chirp editado con éxito!');
        $this->dispatch('chirpUpdated')->to('chirps.chirp-list');
        $this->dispatch('cancelEdit')->to('chirps.chirp-list');
       

    }

    public function cancel()
    {
        $this->dispatch('cancelEdit')->to('chirps.chirp-list');

    }

    public function render()
    {
        return view('livewire.chirps.edit-chirp');
    }
}