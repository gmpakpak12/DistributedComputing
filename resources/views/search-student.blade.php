<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    </head>
<body>
    <div class="container">  <h1>Student Search</h1>
        <form method="GET" action="{{ route('search-student') }}">
            <label for="student_id">Student ID:</label>
            <input type="text" id="student_id" name="student_id" required>

            <button type="submit">Search</button>
        </form>

        @if (session()->has('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif
    </div>

    </body>
</html>
