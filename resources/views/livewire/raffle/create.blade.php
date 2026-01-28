<div>
    @if ($modal)
        <x-ui.modal title="Create new raffle">
            <form wire:submit="handle" class="space-y-4">
                <x-ui.input label="Name" name="name" type="text" wire:model.defer="name"
                    placeholder="Enter raffle name" />
                <x-ui.button type="submit" class="w-full" wire:loading.attr="disabled" wire:target="handle">
                    Save
                </x-ui.button>
            </form>
        </x-ui.modal>
    @endif
</div>