<!DOCTYPE html>
<html>


<body>
  
@include('admin.includes.admin_header')

<div style="padding-left: 20px;" class="add-user-button">
    <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Add New User</a>
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
                        <a href="{{ route('admin.user.destroy', ['id' => $user->id]) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
