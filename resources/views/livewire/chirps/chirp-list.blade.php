<div>
    @foreach ($chirps as $chirp)
        <div class="mb-4 p-4 border rounded">
            @if ($editingChirpId === $chirp->id)
                @livewire('chirps.edit-chirp', ['chirp' => $chirp], key($chirp->id))
            @else
                <p class="font-semibold">{{ $chirp->user->name }}</p>
                <p>{{ $chirp->message }}</p>
                <p class="text-sm text-gray-500">{{ $chirp->created_at->diffForHumans() }}</p>
                <div class="mt-2 space-x-2">
                    <button wire:click="edit({{ $chirp->id }})" class="text-blue-600">Editar</button>
                    <button wire:click="delete({{ $chirp->id }})" class="text-red-600">Eliminar</button>
                </div>
            @endif
        </div>
    @endforeach
</div>
