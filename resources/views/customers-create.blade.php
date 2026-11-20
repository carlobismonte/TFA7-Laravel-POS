<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer - Laravel POS</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 30px;
        }

        .container {
            max-width: 500px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px #ddd;
        }

        h1 {
            color: #2563eb;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            padding: 12px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background: #2563eb;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
        }

        .error {
            color: #dc2626;
            font-size: 14px;
        }

        a {
            color: #2563eb;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Add New Customer</h1>

    <form action="{{ url('/customers') }}" method="POST">
        @csrf

        <label for="full_name">Full Name</label>
        <input
            type="text"
            id="full_name"
            name="full_name"
            value="{{ old('full_name') }}"
            required
        >
        @error('full_name')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="email">Email</label>
        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            required
        >
        @error('email')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="phone">Phone</label>
        <input
            type="text"
            id="phone"
            name="phone"
            value="{{ old('phone') }}"
        >
        @error('phone')
            <p class="error">{{ $message }}</p>
        @enderror

        <button type="submit">Save Customer</button>
    </form>

    <p>
        <a href="{{ url('/customers') }}">Back to Customers</a>
    </p>
</div>

</body>
</html>
