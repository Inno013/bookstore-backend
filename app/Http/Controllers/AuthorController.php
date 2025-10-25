<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function topAuthors()
    {
        $authors = Author::select(
            'authors.id',
            'authors.name as author_name',
            DB::raw('COUNT(ratings.id) as voter_count')
        )
            ->join('books', 'authors.id', '=', 'books.author_id')
            ->join('ratings', 'books.id', '=', 'ratings.book_id')
            ->where('ratings.rating', '>', 5)
            ->groupBy('authors.id', 'authors.name')
            ->orderByDesc('voter_count')
            ->limit(10)
            ->get();

        return view('authors.top', compact('authors'));
    }
}
