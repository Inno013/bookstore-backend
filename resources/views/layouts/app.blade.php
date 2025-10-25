<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bookstore System')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #1a1a1a; color: #fff; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; }
        h1, h2 { margin-bottom: 20px; }
        .nav { background: #2a2a2a; padding: 15px; margin-bottom: 30px; border-radius: 5px; }
        .nav a { color: #4a9eff; text-decoration: none; margin-right: 20px; }
        .nav a:hover { text-decoration: underline; }
        table { width: 100%; border-collapse: collapse; background: #2a2a2a; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #444; }
        th { background: #333; }
        .filter-box { background: #2a2a2a; padding: 20px; border-radius: 5px; margin-bottom: 20px; }
        input, select { padding: 8px; border: 1px solid #444; background: #1a1a1a; color: #fff; border-radius: 3px; }
        button { background: #4a9eff; color: #fff; border: none; padding: 10px 20px; cursor: pointer; border-radius: 3px; }
        button:hover { background: #3a7fd0; }
        .alert { padding: 15px; margin-bottom: 20px; border-radius: 5px; background: #2d5a2d; }
        svg { display: none !important; }
    </style>
    @stack('styles')
</head>
<body>
    <div class="container">
        <div class="nav">
            <a href="{{ route('books.index') }}">List of Books</a>
            <a href="{{ route('authors.top') }}">Top 10 Authors</a>
            <a href="{{ route('ratings.create') }}">Insert Rating</a>
        </div>

        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
    @stack('scripts')
</body>
</html>
