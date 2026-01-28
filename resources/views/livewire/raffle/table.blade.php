<div class="space-y-4">
    <x-ui.h1 class="flex justify-between items-center">
        <span>Raffles</span>
        {{-- raffle::create can be any string. Could be 'potato'. In the livewire class (Create.php), On attribute should have the same string --}}
        <x-ui.button @click="$dispatch('raffle::create')">+ Create</x-ui.button>
    </x-ui.h1>

    <x-ui.table>
        <x-ui.table.thead>
            <x-ui.table.th>ID</x-ui.table.th>
            <x-ui.table.th>Name</x-ui.table.th>
            <x-ui.table.th>Published</x-ui.table.th>
            <x-ui.table.th></x-ui.table.th>
        </x-ui.table.thead>
        <x-ui.table.tbody>
            @foreach ($this->records as $record)
                <x-ui.table.tr>
                    <x-ui.table.td>{{ $record->id }}</x-ui.table.td>
                    <x-ui.table.td>{{ $record->name }}</x-ui.table.td>
                    <x-ui.table.td>{{ $record->published_at ? '✅' : '❌'}}</x-ui.table.td>
                    <x-ui.table.td>
                        <x-ui.button secondary @click="$dispatch('raffle::edit', { id: {{ $record->id }} })"> Edit </x-ui.button>
                        <x-ui.button secondary @click="$dispatch('raffle::destroy', { id: {{ $record->id }} })"> Delete </x-ui.button>
                        @unless ($record->published_at)
                            <x-ui.button secondary @click="$dispatch('raffle::publish', { id: {{ $record->id }} })">
                                Publish
                            </x-ui.button>
                        @else
                            <x-ui.button secondary @click="$dispatch('raffle::unpublish', { id: {{ $record->id }} })">
                                Unpublish
                            </x-ui.button>
                        @endunless
                    </x-ui.table.td>
                </x-ui.table.tr>
            @endforeach
        </x-ui.table.tbody>
    </x-ui.table>

    {{ $this->records->links() }}
</div>