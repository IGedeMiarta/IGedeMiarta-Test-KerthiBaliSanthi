<?php

namespace App\Livewire\Book;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Livewire\Component;

class Add extends Component
{
    public $authors,$categories;
    public $title,$year,$author_id,$category_id;
    public $success;
    public function mount(){
        $this->success = false;
        $this->authors = Author::all();
        $this->categories = Category::all();
    }
    public function save(){
        Book::create([
            'title' => $this->title,
            'year' => $this->year,
            'author_id' => $this->author_id,
            'category_id' => $this->category_id,
        ]);
        $this->success = true;
        $this->reset();
        $this->mount();
        $this->dispatch('closeModal');
        $this->dispatch('refreshTable');
    }
    public function render()
    {

        return view('livewire.book.add');
    }
}
