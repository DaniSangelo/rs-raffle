<div>
    @if ($modal)
        <x-ui.modal title="Deleting Raffle #{{ $id }}">
            <p class="text-yellow-700 font-bold mb-4 bg-yellow-200 rounded border-2 border-yellow-400 p-4">
                Are you sure you want to unpublish this raffle?
            </p>

            <div class="flex items-center justify-between">
                <x-ui.button type="button" wire:click="$set('modal', false)" class="bg-gray-300">
                    No... I'm ok!
                </x-ui.button>

                <x-ui.button type="button" wire:click="handle" wire:loading.attr="disabled" wire:target="handle">
                    Yes, please!!!
                </x-ui.button>
            </div>
        </x-ui.modal>
    @endif
</div>
