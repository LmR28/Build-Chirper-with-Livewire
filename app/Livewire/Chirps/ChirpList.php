<?php


namespace App\Livewire\Chirps;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Chirp;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ChirpList extends Component
{
    public Collection $chirps;
    public $editingChirpId = null;
    public ?string $successMessage = null;

    public function mount(): void
    {
        $this->getChirps();
    }

    #[On('chirp-created')]
    #[On('chirp-updated')]
    #[On('chirp-deleted')]
    public function getChirps(): void
    {
        $this->chirps = Chirp::with('user')
            ->where('user_id', Auth::id())
            ->latest('updated_at')
            ->get();
    }

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

        $this->successMessage = '¡Chirp eliminado!';
        $this->dispatch('chirp-deleted');
    }

    public function render()
    {
        return view('livewire.chirps.chirp-list', [
            'chirps' => $this->chirps,
            'editingChirpId' => $this->editingChirpId,
            'successMessage' => $this->successMessage,
        ]);
    }
}