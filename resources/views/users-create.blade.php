<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User - Laravel POS</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
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
    <h1>Add New User</h1>

    <form action="{{ url('/users') }}"
          method="POST"
          enctype="multipart/form-data"
          novalidate>
        @csrf

        <label for="username">Username</label>
        <input type="text"
               id="username"
               name="username"
               value="{{ old('username') }}"
               required>
        @error('username')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="full_name">Full Name</label>
        <input type="text"
               id="full_name"
               name="full_name"
               value="{{ old('full_name') }}"
               required>
        @error('full_name')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="email">Email</label>
        <input type="email"
               id="email"
               name="email"
               value="{{ old('email') }}"
               required>
        @error('email')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="password">Password</label>
        <input type="password"
               id="password"
               name="password"
               required>
        @error('password')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="password_confirmation">
            Confirm Password
        </label>
        <input type="password"
               id="password_confirmation"
               name="password_confirmation"
               required>

        <label for="avatar">Avatar (Optional)</label>
        <input type="file"
               id="avatar"
               name="avatar"
               accept=".jpg,.jpeg,.png,.webp">

        <p style="font-size: 13px; color: #666;">
            JPG, PNG, or WebP. Maximum 2 MB.
        </p>

        @error('avatar')
            <p class="error">{{ $message }}</p>
        @enderror

        <button type="submit">Save User</button>
    </form>

    <p>
        <a href="{{ url('/users') }}">
            Back to Users
        </a>
    </p>
</div>

</body>
</html>
