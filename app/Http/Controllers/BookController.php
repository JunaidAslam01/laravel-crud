<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('dashboard', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        Book::create($validatedData);

        return redirect('dashboard')->with('success', 'Book added successfully');
    }

    public function edit($id)
    {
        $book = Book::where('id', $id)->first();
        $data['book'] = $book;
        return view('books.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $book = Book::where('id', $id)->first();
        $book->title = $validatedData['title'];
        $book->description = $validatedData['description'];
        $book->save();

        return redirect('dashboard')->with('success', 'Book Updated successfully');
    }

    public function destroy($id)
    {
        try {
            $book = Book::where('id', $id)->first();
            $book->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Book failed to delete');
        }

        return redirect('dashboard')->with('success', 'Book Deleted successfully');
    }
}
