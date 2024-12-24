<?php

namespace App\Http\Livewire\Admin;

use App\Models\OrdenesPaypal;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
/*         $transactions = OrdenesPaypal::where('user_id', auth()->user()->id)
        ->where('name', 'LIKE', '%'.$this->search.'%')
        ->latest('id')
        ->paginate(10); */

        $transactions = OrdenesPaypal::orderBy('id', 'DESC')->paginate(12);
        return view('livewire.admin.transactions-index', compact('transactions'));
    }
}
