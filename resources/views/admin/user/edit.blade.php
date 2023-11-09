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

<form id="edit-form" method="POST" action="{{ route('admin.user.update', ['id' => $user->id]) }}">
    @csrf
    @method('PUT')
    
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control" required maxlength="255">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control" required maxlength="255">
    </div>

    <div class="form-group">
        <label for="role">Role</label>
        <select id="role" name="role" class="form-control">
            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update User</button>
    </div>
</form>
