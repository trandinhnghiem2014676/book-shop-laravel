@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="page-title">Add Chapter</h2>
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">Chapter</strong>
                </div>
                <div class="card-body">
                <form method="post" action="{{URL::TO('/admin/chapter/store') }}" class="needs-validation" >
                        {{csrf_field()}}
                        <div class="form">
                            <div class="mb-3">
                                <label for="validationCustom3">Chapter name</label>
                                <input type="text" class="form-control" name="name" required>
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label for="validationCustom3">Chapter summary</label>
                                <input type="text" class="form-control" name="summary" required>
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label for="validationCustom3">Chapter content</label>
                                <textarea name="content" class="form-control" rows="5" style="resize = none"></textarea>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="books">Book</label>
                                <select class="custom-select" id="books" name="id_books" required>
                                    <option selected disabled value="">Choose Story</option>
                                    @foreach($books as $key=>$book)
                                        <option value="{{ $book->id }}">{{ $book->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary" type="submit">Add</button>
                        </div>
                    </form>
                </div> <!-- /.card-body -->
            </div>
        </div>
    </div>
</div> <!-- .container-fluid -->
@endsection