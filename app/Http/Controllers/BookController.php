<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\User;

class BookController extends Controller {
    
  public function index() {
    return Book::all();
  }

  public function show($id) {
    $book = Book::find($id);

    if (!$book)
      return response()->json(['error' => 'Book not found']);
    
    return $book;
  }

  public function store(Request $request) {
    $this->validate($request, [
      'title'   => 'required|min:5',
      'author'  => 'required:min:4',
      'publish' => 'required',
      'stock'   => 'required|min:1'
    ]);

    return Book::create([
        'user_id' => 2,
        'title'   => $request->json('title'),
        'author'  => $request->json('author'),
        'publish' => $request->json('publish'),
        'stock'   => $request->json('stock')
    ]);
  }

  public function update(Request $request, $id) {
    $this->validate($request, [
      'title'   => 'required|min:5',
      'author'  => 'required:min:4',
      'publish' => 'required',
      'stock'   => 'required|min:1'
    ]);

    $book = Book::find($id);

    $book->title   = $request->title;
    $book->author  = $request->author;
    $book->publish = $request->publish;
    $book->stock   = $request->stock;
    $book->save();

    return $book;
  }

  public function destroy($id) {
    $book = Book::find($id);
    $book->delete();

    return response()->json([
      'success' => true,
      'message' => 'successfully to delete'
    ], 200);
  }

}
