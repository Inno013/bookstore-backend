@extends('layouts.app')

@section('title', 'Top 10 Most Famous Authors')

@section('content')
<h1>Top 10 Most Famous Authors</h1>
<p style="color: #ff6b6b; margin-bottom: 20px;">
    <strong>Note:</strong> Just for voters with rating greater than 5
</p>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Author Name</th>
            <th>Voter</th>
        </tr>
    </thead>
    <tbody>
        @foreach($authors as $index => $author)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $author->author_name }}</td>
            <td>{{ $author->voter_count }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
