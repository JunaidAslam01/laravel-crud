<!DOCTYPE html>
<html>

<body>

    @include('admin.includes.admin_header')

    @if(session()->has('success'))
    <div class='alert alert-success'>
        {{session()->get('success')}}
    </div>
    @endif

    @if(session()->has('error'))
    <div class='alert alert-danger'>
        {{session()->get('error')}}
    </div>
    @endif

    <div style="padding-left: 20px;" class="add-user-button">
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Add New User</a>
        <a href="{{ route('admin.logs') }}" class="btn btn-primary">Show User Logs</a>
    </div>

    <div class="user-table-container">
        <table class="user-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td class="user-actions">
                        <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}">Edit</a>
                        <a href="#" onclick="confirmDelete('{{ route('admin.user.destroy', ['id' => $user->id]) }}')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>

    <script>
        function confirmDelete(deleteUrl) {
            if (confirm("Are you sure you want to delete this user?")) {
                window.location.href = deleteUrl;
            }
        }
    </script>

</body>

</html>