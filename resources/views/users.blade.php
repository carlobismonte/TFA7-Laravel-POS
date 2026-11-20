
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel POS - Users</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }

        .btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 8px 14px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-add {
            background: green;
        }

        .avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }

        .placeholder {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #e5e7eb;
            color: #374151;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h1>User Accounts</h1>

    <nav>
        <a href="/">Home</a> |
        <a href="/about">About</a> |
        <a href="/customers">Customers</a> |
        <a href="/users">Users</a>
    </nav>

    <hr>

    <h2>User List</h2>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <a href="{{ url('/users/create') }}"
       class="btn btn-add">
        + Add New User
    </a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Avatar</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>

                    <td>
                        @if ($user->avatar)
                            <img
                                src="{{ asset('storage/' . $user->avatar) }}"
                                alt="Avatar of {{ $user->username }}"
                                class="avatar"
                            >
                        @else
                            <div class="placeholder">
                                {{ strtoupper(substr($user->username, 0, 1)) }}
                            </div>
                        @endif
                    </td>

                    <td>{{ $user->username }}</td>

                    <td>{{ $user->full_name }}</td>

                    <td>{{ $user->email }}</td>

                    <td>
                        <a href="{{ url('/users/' . $user->id . '/edit') }}"
                           class="btn">
                            Edit
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        No users found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
