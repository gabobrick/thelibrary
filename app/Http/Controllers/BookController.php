<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $users = User::all();
        $books = Book::filter()->paginate(10)->appends('category_id', request()->category_id)->appends('book_name', request()->book_name)->appends('user_id', request()->user_id);
        return view('books.index', compact('books', 'categories', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = Book::create($request->validate([
            'name' => ['required', 'min:3'],
            'author' => ['required', 'min:3'],
            'category_id.*' => ['required', 'integer'],
            'publishedDate' => ['required', 'date']
        ]));

        foreach($request->category_id as $category)
        {
            $book->categories()->attach($category);
        }

        //$book->categories()->attach($request->category_id);

        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book'), compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:3'],
            'author' => ['required', 'min:3'],
            'category_id.*' => ['required', 'integer'],
            'publishedDate' => ['required', 'date']
        ]);

        $book->update($attributes);

        foreach($book->categories as $category)
        {
            $book->categories()->detach($category->id);
        }

        foreach($request->category_id as $category)
        {
            $book->categories()->attach($request->category_id);
        }

        return redirect('/');
    }

    public function status(Request $request, Book $book)
    {
        $book->user_id = ($book->user_id) ? null : auth()->id();
        $book->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->categories()->detach($book->category_id);
        $book->delete();
        return back();
    }
}
