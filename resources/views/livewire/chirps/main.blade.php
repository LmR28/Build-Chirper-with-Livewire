<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 space-y-6">
        {{-- Formulario para crear un nuevo chirp --}}
        <livewire:chirps.create-chirp />

        {{-- Lista de chirps --}}
        <livewire:chirps.chirp-list />
    </div>
</x-app-layout>
