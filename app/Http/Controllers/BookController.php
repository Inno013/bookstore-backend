<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->input('limit', 10);
        $search = $request->input('search', '');

        $books = Book::select(
            'books.id',
            'books.title',
            'categories.name as category_name',
            'authors.name as author_name',
            DB::raw('COALESCE(AVG(ratings.rating), 0) as average_rating'),
            DB::raw('COUNT(ratings.id) as voter_count')
        )
            ->leftJoin('ratings', 'books.id', '=', 'ratings.book_id')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->join('categories', 'books.category_id', '=', 'categories.id')
            ->groupBy('books.id', 'books.title', 'categories.name', 'authors.name');

        if ($search) {
            $books->where(function ($query) use ($search) {
                $query->where('books.title', 'like', "%{$search}%")
                    ->orWhere('authors.name', 'like', "%{$search}%");
            });
        }

        $books = $books->orderByDesc('average_rating')
            ->paginate($limit);

        return view('books.index', compact('books', 'search', 'limit'));
    }
}
