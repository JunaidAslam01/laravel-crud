<x-app-layout>

    @include('user_header')

    @if(session()->has('success'))
    <div class='alert alert-success'>
        {{ session()->get('success') }}
    </div>
    @endif

    @if(session()->has('error'))
    <div class='alert alert-danger'>
        {{ session()->get('error') }}
    </div>
    @endif

    <div style="padding-left: 20px;" class="add-user-button">
        <a href="{{ route('book.create') }}" class="btn btn-primary">Add New Book</a>
    </div>

    <div class="user-table-container">
        <table class="user-table">
            <thead>
                <tr>
                    <th>Book Name</th>
                    <th>Book Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->description }}</td>
                    <td class="user-actions">
                        <a href="{{ route('book.edit', $book->id) }}">Edit</a>
                        <!-- <a href="#" onclick="confirmDelete('{{ route('book.destroy', $book->id) }}')">Delete</a> -->
                        <form onclick="confirmDelete('{{ route('book.destroy', $book->id) }}')" id="delete-form-{{ $book->id }}" action="{{ route('book.destroy', $book->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border: none; background-color: transparent; color: red; cursor: pointer;">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function confirmDelete(deleteUrl) {
            if (confirm("Are you sure you want to delete this book?")) {
                window.location.href = deleteUrl;
            }
        }
    </script>
</x-app-layout>