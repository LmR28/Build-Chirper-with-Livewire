<form wire:submit.prevent="save" class="mb-4">
    <textarea wire:model.defer="message" class="w-full border p-2 rounded" placeholder="Escribe tu chirp..."></textarea>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 mt-2 rounded">Guardar</button>
</form>
