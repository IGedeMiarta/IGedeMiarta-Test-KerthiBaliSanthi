<?php

namespace App\Livewire\Book;

use App\Models\Book;
use Livewire\Attributes\On;
use Livewire\Component;

class Table extends Component
{
    public function render()
    {
        return view('livewire.book.table',[
        'table' => Book::with('getAuthor','getCategory')->latest()->paginate(10)
        ]);
    }
    #[On('refreshTable')] 
    public function refreshTable()
    {
        $this->render();
    }

}
