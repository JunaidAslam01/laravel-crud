@include('user_header')

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


<form id="edit-form" method="POST" action="{{ route('book.update', ['id' => $book->id]) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Title</label>
        <input type="text" id="title" value="{{$book->title}}" name="title" class="form-control" required maxlength="255">
    </div>

    <div class="form-group">
        <label for="email">Description</label>
        <input type="text" id="description" value="{{$book->description}}" name="description" class="form-control" required maxlength="255">
    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update Book</button>
    </div>
    <div class="form-group">
        <a href='{{ url()->previous() }}' class="btn btn-primary">Go Back</a>
    </div>
</form>