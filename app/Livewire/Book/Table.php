<?php

namespace App\Livewire\Book;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;

class Table extends Component
{
    use WithPagination;
    public $authors,$categories;
    public $title,$year,$author_id,$category_id;
    public $books;
    public $search = false;
    public function mount(){
        $this->authors = Author::all();
        $this->categories = Category::all();
    }
   public function save()
    {
        $this->books = Book::query();
        if ($this->title !== null && $this->title !== '') {
            $this->books->where('title','like','%'.$this->title.'%');
        }
        if ($this->year !== null && $this->year !== '') {
            $this->books->whereYear('year', $this->year);
        }
        if ($this->author_id !== null && $this->author_id !== "null") {
            $this->books->where('author_id', $this->author_id);
        }
        if ($this->category_id !== null && $this->category_id !== "null") {
            $this->books->where('category_id', $this->category_id);
        }

        $this->books->with('getAuthor', 'getCategory');
        $this->books->latest();

        $this->books = $this->books->get();
        $this->search = true;
        $this->render();
    }

    public function render()
    {
        if ($this->search) {
            $book = $this->books;
        }else{
            $book =  Book::with('getAuthor','getCategory')->latest()->get();
        }
        $perPage = 10;
        $page = request()->get('page', 1); // Get the current page or default to 1

        $paginatedBooks = new LengthAwarePaginator(
            $book->forPage($page, $perPage),
            $book->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        return view('livewire.book.table',[
            'table' => $paginatedBooks
        ]);
    }


    #[On('refreshTable')] 
    public function refreshTable()
    {
        $this->render();
    }
    public function edit($id){
       $this->dispatch('editBook', id: $id);
    }
    public function delete($id){
        Book::find($id)->delete();
        $this->render();
        $this->dispatch('toast',title:'Book Deleted');
    }

}
