@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="page-title">Edit Chapter</h2>
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">Chapter</strong>
                </div>
                <div class="card-body">
                    <form method="post" action="{{URL::TO('/admin/chapter/update/'.$chapter->id) }}" class="needs-validation" >
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form">
                            <div class="mb-3">
                                <label for="validationCustom3">ID</label>
                                <input type="text" class="form-control" value="{{$chapter->id}}" name="id" disabled required>
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label for="validationCustom3">Chapter name</label>
                                <input type="text" class="form-control" name="name" value="{{$chapter->name}}" required>
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label for="validationCustom3">Chapter summary </label>
                                <input type="text" class="form-control" name="summary" value="{{$chapter->summary}}" required>
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label for="validationCustom3">Chapter content </label>
                                <input type="text" class="form-control" name="content" value="{{$chapter->content}}" required>
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="books">Story</label>
                                <select class="custom-select" id="books" name="id_books" required>
                                    <option selected disabled value="">Choose Story</option>
                                    @foreach($books as $key=>$book)
                                        @if($chapter->id==$book->id_books)
                                            <option value="{{ $book->id }}" selected>{{ $book->name }}</option>
                                        @else
                                            <option value="{{ $book->id }}">{{ $book->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary" type="submit">Sửa</button>
                        </div>
                    </form>
                </div> <!-- /.card-body -->
            </div>
        </div>
    </div>
</div> <!-- .container-fluid -->
@endsection