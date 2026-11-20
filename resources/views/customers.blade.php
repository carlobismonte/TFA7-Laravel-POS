<!DOCTYPE html>
<html>
<head>
    <title>Laravel POS - Customers</title>
</head>
<body>
    <h1>Customer Accounts</h1>

    <nav>
        <a href="/">Home</a> |
        <a href="/about">About</a> |
        <a href="/customers">Customers</a> |
        <a href="/users">Users</a>
    </nav>

    <hr>

    <h2>Customer List</h2>

    <!-- Success Message -->
    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <!-- Add New Customer -->
    <p>
        <a href="{{ url('/customers/create') }}"
           style="background: green;
                  color: white;
                  padding: 10px 15px;
                  text-decoration: none;
                  border-radius: 5px;">
            + Add New Customer
        </a>
    </p>

    <br>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>

        @forelse ($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->full_name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone }}</td>
            <td>
                <a href="{{ url('/customers/' . $customer->id . '/edit') }}"
                   style="background: #2563eb;
                          color: white;
                          padding: 8px 14px;
                          text-decoration: none;
                          border-radius: 5px;">
                    Edit
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">No customers found.</td>
        </tr>
        @endforelse
    </table>

</body>
</html>
