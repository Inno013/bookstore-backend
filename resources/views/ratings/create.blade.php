@extends('layouts.app')

@section('title', 'Insert Rating')

@section('content')
<h1>Insert Rating</h1>

<div style="background: #2a2a2a; padding: 30px; border-radius: 5px; max-width: 500px;">
    <form method="POST" action="{{ route('ratings.store') }}">
        @csrf

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px;">Book Author:</label>
            <select name="author_id" id="author-select" required style="width: 100%;">
                <option value="">-- Select Author --</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px;">Book Name:</label>
            <select name="book_id" id="book-select" required style="width: 100%;" disabled>
                <option value="">-- Select Author First --</option>
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px;">Rating:</label>
            <select name="rating" required style="width: 100%;">
                @for($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <button type="submit" style="width: 100%;">SUBMIT</button>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('author-select').addEventListener('change', function() {
    const authorId = this.value;
    const bookSelect = document.getElementById('book-select');

    if (!authorId) {
        bookSelect.innerHTML = '<option value="">-- Select Author First --</option>';
        bookSelect.disabled = true;
        return;
    }

    bookSelect.disabled = true;
    bookSelect.innerHTML = '<option value="">Loading...</option>';

    fetch(`/api/books-by-author/${authorId}`)
        .then(response => response.json())
        .then(books => {
            bookSelect.innerHTML = '<option value="">-- Select Book --</option>';
            books.forEach(book => {
                const option = document.createElement('option');
                option.value = book.id;
                option.textContent = book.title;
                bookSelect.appendChild(option);
            });
            bookSelect.disabled = false;
        })
        .catch(error => {
            console.error('Error:', error);
            bookSelect.innerHTML = '<option value="">Error loading books</option>';
        });
});
</script>
@endpush
