<form wire:submit.prevent="update" class="mb-4">
    <textarea wire:model.defer="message" class="w-full border p-2 rounded"></textarea>
    <div class="mt-2 space-x-2">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Actualizar</button>
        <button type="button" wire:click="cancel" class="bg-gray-600 text-white px-4 py-2 rounded">Cancelar</button>
    </div>
</form>
