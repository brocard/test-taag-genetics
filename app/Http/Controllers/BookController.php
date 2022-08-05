<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Books/Index', [
            'books' => Book::with('author')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Books/Create', [
            'authors' => Author::orderBy('name')
                ->get()
                ->map
                ->only(['id', 'name']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function store(StoreBookRequest $request)
    {
        Book::create([
            'title' => $request->title,
            'author_id' => $request->author_id,
            'edition' => $request->edition,
        ]);

        return Redirect::route('books.index')
            ->with('success', 'Libro Creado.');
    }

    public function show(Book $book)
    {

    }

    public function edit(Book $book)
    {
        return Inertia::render('Books/Edit', [
            'book' => $book,
        ]);
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update([
            'title' => $request->title,
            'author_id' => $request->author_id,
            'edition' => $request->edition,
        ]);

        return Redirect::route('books.index')->with('success', 'Libro Actualizado.');;
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return Redirect::back()->with('success', 'Libro eliminado.');
    }
}
