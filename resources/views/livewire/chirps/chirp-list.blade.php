<div>
    @if ($successMessage)
        @php
            $isDelete = str_contains($successMessage, 'eliminado');
        @endphp
        <div 
            x-data="{ show: true }" 
            x-init="setTimeout(() => show = false, 3000)" 
            x-show="show"
            class="mb-4 px-4 py-2 rounded-lg shadow transition
                {{ $isDelete ? 'bg-pink-100 text-pink-700 border border-pink-200' : 'bg-green-100 text-green-700 border border-green-200' }}"
        >
            {{ $successMessage }}
        </div>
    @endif

    @if ($chirps->isEmpty())
        <div class="mb-6 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-800 rounded-xl shadow p-5 text-center font-semibold">
            No cuentas con Chirp, genera uno nuevo.
        </div>
    @endif

    @foreach ($chirps as $chirp)
        <div class="mb-6 bg-white/90 rounded-2xl shadow border border-indigo-100 p-5 transition hover:shadow-lg">
            @if ($editingChirpId === $chirp->id)
                @livewire('chirps.edit-chirp', ['chirp' => $chirp], key($chirp->id))
            @else
                <div class="flex items-center mb-2">
                    <span class="font-bold text-indigo-700">{{ $chirp->user->name }}</span>
                    <span class="ml-2 text-xs text-gray-400">{{ $chirp->created_at->diffForHumans() }}</span>
                </div>
                <div class="text-gray-800 mb-3">{{ $chirp->message }}</div>
                <div class="flex gap-4 text-sm">
                    <button wire:click="edit({{ $chirp->id }})" class="text-indigo-600 hover:underline font-semibold">Editar</button>
                    <button wire:click="delete({{ $chirp->id }})" class="text-pink-600 hover:underline font-semibold">Eliminar</button>
                </div>
            @endif
        </div>
    @endforeach
</div>