
<form wire:submit.prevent="save" class="mb-8 bg-white/80 rounded-xl shadow p-6 border border-indigo-100">
    <textarea
        wire:model.defer="message"
        placeholder="¿Qué estás pensando?"
        class="w-full bg-indigo-50 border border-indigo-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition resize-none text-gray-800"
        rows="3"
    ></textarea>
    @error('message')
        <div class="text-pink-600 text-sm mt-2">{{ $message }}</div>
    @enderror
    <div class="flex justify-end mt-4">
        <button
            type="submit"
            class="bg-gradient-to-r from-pink-500 to-yellow-400 hover:from-pink-600 hover:to-yellow-500 text-white font-bold px-6 py-2 rounded-full shadow transition"
        >
            Publicar
        </button>
    </div>
</form>