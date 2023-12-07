<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Bookshelf;

class BookController extends Controller
{
    public function index()
    {
        $data['books'] = Book::with('bookshelf')->get();
        return view('books.index', $data);
    }
    public function create()
    {
        // Mungkin Anda perlu menyediakan data seperti bookshelves untuk dipass ke view
        $data['bookshelves'] = Bookshelf::pluck('name', 'id');
        return view('books.create', ['bookshelves' => $bookshelves]);
    }
    public function store(Request $request){
        // dd($request->file('image'));
        $validated = $request->validate([
            'title' => 'required|max:255',
            'name' => 'required|max:150',
            'year' => 
            'required|digits:4|integer|min:1900|max:'.(date('Y')),
            'publisher' => 'required|max:100',
            'city' => 'required|numeric',
            'bookshelf_id' => 'required',
            'cover' => 'nullable|image',

        ]);

        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->storeAs(
            'public/cover_buku',
            'cover_buku_'.time() . '.' . $request->file('cover')->extension()
            );
            $validated['cover'] = basename($path);
        }

        Bookshelf::create($validated);

        $notification = [
            'message' => 'Data buku berhasil ditambahkan',
            'alert-type' => 'success'
        ];
        if($request->save == true){
            return redirect()->route('book')->with($notification);

        }else{
            return redirect()->route('book.create')->with($notification);
        }
       
    }
}
