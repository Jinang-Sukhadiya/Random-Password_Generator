<!DOCTYPE html>
<html>
<head>
    <title>Password Generator</title>
</head>
<body>
    <h1>Password Generator</h1>
    <form action="{{route('password.form')}}" method="get">
        @csrf
        <label for="length">Enter the desired password length (0-6):</label>
        {{-- <input type="number" id="length" name="length" min="0" max="6" required> --}}

     <select name="length" id="length">

        <option value="">--Please choose an option--</option>
        <option value="6"></option>
        <option value="5">5</option>
        <option value="4">4</option>
        <option value="3">3</option>
        <option value="2">2</option>
        <option value="1">1</option>
      </select>
      <button type="submit">Generate Password</button>

    </form>
</body>
</html>
