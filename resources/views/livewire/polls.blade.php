<div>

    @forelse ($polls as $poll)
        <div class="mb-4">
            <h3 class="mb-4 text-xl">
                {{ $poll->title }}
            </h3>

            @foreach ($poll->options as $option)
                <div class="mb-2">
                    <button class="btn" wire:click.live="vote({{ $option->id }})">Votes</button>
                    {{ $option->options }} ({{ $option->votes->count() }})
                </div>
            @endforeach

        @empty
            <div class="text-gray-500">No polls available</div>
    @endforelse
</div>
