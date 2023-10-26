<div>
    <form wire:submit.prevent="create_Poll">
        <label>Title</label>

        <input type="text" wire:model.live="title" />
        {{-- Current Title : {{ $title }} --}}
        @error('title')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
        <div>
            <button class="btn" wire:click.prevent="addOption">Add Option</button>
        </div>
        <div>
            @foreach ($options as $index => $option)
                <div>
                    <label>Option {{ $index + 1 }}</label>
                </div>

                <div class="flex gap-2">
                    <input type="text" wire:model.live = "options.{{ $index }}">
                    <button class="btn" wire:click.prevent="remove({{ $index }})">Remove Option</button>
                </div>
                @error("options.{$index}")
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            @endforeach
        </div>
        <button class="btn" type="submit">Create Poll</button>
    </form>
</div>
