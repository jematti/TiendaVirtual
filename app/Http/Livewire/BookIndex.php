<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class BookIndex extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        // $users=User::where('name','LIKE','usuario 1')->paginate();
        $book = Book::join("authors","books.author_id","=","authors.id")
            ->join("editorials","books.editorial_id","=","editorials.id")
            ->join("repositories","books.repository_id","=","repositories.id")
            ->where('books.titulo','LIKE',"%". $this->search ."%")
            ->orWhere('authors.nombre_autor', 'LIKE' , '%' .$this->search. '%')
            ->select('books.id','books.imagen','books.titulo','books.precio','authors.nombre_autor','repositories.nombre_repositorio','editorials.nombre_editorial','repositories.sigla')
            ->paginate();



        return view('livewire.book-index', compact('book'));
    }
}
