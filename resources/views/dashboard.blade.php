<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @livewire('chirps.create-chirp')
        <hr class="my-6">
        @livewire('chirps.chirp-list')
    </div>
</x-app-layout>
