@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row">
                <!-- Small table -->
                <div class="col-md-12 my-4">
                    <h2 class="h4 mb-1">List Chapter</h2>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="toolbar">
                            </div>
                            <!-- table -->
                            <table class="table table-borderless table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Create Date</th>
                                        <th>Update Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($chapter as $key => $value)
                                    <tr>
                                        <td>
                                            <p class="mb-0 text-muted"><strong>{{ $value->id }}</strong></p>
                                        </td>
                                        <td>
                                            <p class="mb-0 text-muted"><strong>{{ $value->name }}</strong></p>
                                        </td>
                                        <td class="text-muted"><strong>{{ $value->created_at }}</strong></td>
                                        <td class="text-muted"><strong>{{ $value->updated_at }}</strong></td>
                                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only"><strong>Action</strong></span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{URL::TO('/admin/chapter/edit/'.$value->id )}}">Edit</a>
                                                <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                    document.getElementById('detroy-form-{{$value->id}}').submit();">Remove</a>
                                                <form id="detroy-form-{{$value->id}}" action="{{URL::TO('/admin/chapter/detroy/'. $value->id )}}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <nav aria-label="Table Paging" class="mb-0 text-muted">
                                <ul class="pagination justify-content-center mb-0">

                                    @if($chapter->currentPage() == 1)
                                        <li class="page-item disabled"><a class="page-link"
                                            href="{{ $chapter->previousPageUrl() }}"><strong>Previous</strong></a></li>
                                    @else
                                        <li class="page-item"><a class="page-link"
                                            href="{{ $chapter->previousPageUrl() }}"><strong>Previous</strong></a></li>
                                    @endif

                                    @for($i=1; $i<=$chapter->lastPage();$i++)
                                        @if($i==$chapter->currentPage())
                                            <li class="page-item active"><a class="page-link"
                                                href="#"><strong>{{ $chapter->currentPage() }}</strong></a></li>
                                        @else
                                            <li class="page-item"><a class="page-link"
                                                href="{{$chapter->url($i)}}"><strong>{{ $i }}</strong></a></li>
                                        @endif
                                    @endfor

                                    @if($chapter->currentPage() == $chapter->lastPage())
                                        <li class="page-item disabled"><a class="page-link"
                                            href="{{ $chapter->nextPageUrl() }}"><strong>Next</strong></a></li>
                                    @else
                                        <li class="page-item"><a class="page-link"
                                            href="{{ $chapter->nextPageUrl() }}"><strong>Next</strong></a></li>
                                    @endif

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div> <!-- customized table -->
            </div> <!-- end section -->
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
@endsection