<div>
    @foreach ($chirps as $chirp)
        <div class="border p-4 mb-2 rounded">
            <strong>{{ $chirp->user->name }}</strong>
            <p>{{ $chirp->message }}</p>
        </div>
    @endforeach
</div>
