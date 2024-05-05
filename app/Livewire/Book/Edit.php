<?php

namespace App\Livewire\Book;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;

class Edit extends Component
{ 
    public $authors,$categories;
    public $title,$year,$author_id,$category_id;
    public $success,$id;
    public function mount(){
        $this->success = false;
        $this->authors = Author::all();
        $this->categories = Category::all();
    }
    #[On('editBook')] 
    public function editBook($id){
        $book = Book::find($id);
        $this->title = $book->title;
        $this->year = $book->year;
        $this->author_id = $book->author_id;
        $this->category_id = $book->category_id;
        $this->render();
        $this->id = $id;
    }
    public function save(){
        $book = Book::find($this->id);
        $book->update([
            'title' => $this->title,
            'year' => $this->year,
            'author_id' => $this->author_id,
            'category_id' => $this->category_id,
        ]);
        $this->success = true;
        $this->reset();
        $this->mount();
        // $this->dispatch('refreshTable');
        $this->dispatch('closeModalEdit');
        $this->dispatch('toast',title:'Book Updated Successfully');
    }
    public function render()
    {
        return view('livewire.book.edit');
    }
}
