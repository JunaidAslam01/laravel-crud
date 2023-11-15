<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        try {
            $books = Auth::user()->books;
            return view('dashboard', compact('books'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to fetch books');
        }
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'description' => 'required',
            ]);

            Auth::user()->books()->create($validatedData);

            return redirect('dashboard')->with('success', 'Book added successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to add book');
        }
    }

    public function edit($id)
    {
        try {
            $book = Auth::user()->books()->findOrFail($id);
            return view('books.edit', compact('book'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Book not found');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'description' => 'required',
            ]);

            $book = Auth::user()->books()->findOrFail($id);
            $book->update($validatedData);

            return redirect('dashboard')->with('success', 'Book Updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to update book');
        }
    }

    public function destroy($id)
    {
        try {
            Auth::user()->books()->findOrFail($id)->delete();
            return redirect('dashboard')->with('success', 'Book Deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to delete book');
        }
    }
}
