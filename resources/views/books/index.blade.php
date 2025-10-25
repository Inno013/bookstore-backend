@extends('layouts.app')

@section('title', 'List of Books')

@section('content')
<h1>List of Books with Filter</h1>

<div class="filter-box">
    <form method="GET" action="{{ route('books.index') }}">
        <label>List shown:</label>
        <select name="limit" onchange="this.form.submit()">
            @for($i = 10; $i <= 100; $i += 10)
                <option value="{{ $i }}" {{ request('limit') == $i ? 'selected' : '' }}>
                    {{ $i }}
                </option>
            @endfor
        </select>

        <label style="margin-left: 20px;">Search:</label>
        <input type="text" name="search" value="{{ $search }}" placeholder="Book name or author...">
        <button type="submit">SUBMIT</button>
    </form>
</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Book Name</th>
            <th>Category Name</th>
            <th>Author Name</th>
            <th>Average Rating</th>
            <th>Voter</th>
        </tr>
    </thead>
    <tbody>
        @forelse($books as $index => $book)
        <tr>
            <td>{{ $books->firstItem() + $index }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->category_name }}</td>
            <td>{{ $book->author_name }}</td>
            <td>{{ number_format($book->average_rating, 2) }}</td>
            <td>{{ $book->voter_count }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="6" style="text-align: center;">No books found</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div style="margin-top: 20px;">
    {{ $books->links() }}
</div>
@endsection
