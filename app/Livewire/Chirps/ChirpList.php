<?php

namespace App\Livewire\Chirps;

use Livewire\Component;
use App\Models\Chirp;
use Illuminate\Support\Facades\Auth;

class ChirpList extends Component
{
    public $editingChirpId = null;

    protected $listeners = [
        'chirpUpdated' => '$refresh',
        'chirpCreated' => '$refresh',
        'chirpDeleted' => '$refresh',
        'cancelEdit' => 'cancelEdit',
    ];

    public function edit($chirpId)
    {
        $this->editingChirpId = $chirpId;
    }

    public function cancelEdit()
    {
        $this->editingChirpId = null;
    }

    public function delete($chirpId)
    {
        $chirp = Chirp::findOrFail($chirpId);

        if ($chirp->user_id !== Auth::id()) {
            abort(403);
        }

        $chirp->delete();

        $this->dispatch('chirpDeleted');
    }

    public function render()
    {
        return view('livewire.chirps.chirp-list', [
            'chirps' => Chirp::with('user')->where('user_id', Auth::id())->latest('updated_at')->get(),
            'editingChirpId' => $this->editingChirpId,
        ]);
    }
}
