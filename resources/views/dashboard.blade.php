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
                        <a href="#" onclick="confirmDelete('{{ route('book.destroy', ['id' => $book->id]) }}')">Delete</a>
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