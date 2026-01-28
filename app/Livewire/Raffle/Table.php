<?php

namespace App\Livewire\Raffle;

use App\Models\Raffle;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Features\SupportPagination\HandlesPagination;

class Table extends Component
{
    use HandlesPagination;

    public function render()
    {
        return view('livewire.raffle.table');
    }

    #[Computed]
    public function records(): LengthAwarePaginator
    {
        return Raffle::query()
            ->paginate();
    }
}
