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

    <div class="user-table-container">
        <table class="user-table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Email</th>
                    <th>Action</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                <tr>
                    <td>{{ $log->user->name }}</td>
                    <td>{{ $log->user->email }}</td>
                    <td>{{ $log->action }}</td>
                    <td>{{ $log->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $logs->links() }}
    </div>

</body>

</html>
