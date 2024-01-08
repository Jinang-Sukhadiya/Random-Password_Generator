<!DOCTYPE html>
<html>
<head>
    <title>Password Result</title>
</head>
<body>
    <h1>Password Result</h1>
    <p>Generated Passwords ({{ $length }} characters):</p>
    <ul>
        @foreach ($passwords as $password)
            <li>{{ $password }}</li>
        @endforeach
    </ul>
    <form action="{{ route('passwords.download') }}" method="get">
        @csrf
        <button type="submit">Download Passwords</button>
    </form>
</body>
</html>



