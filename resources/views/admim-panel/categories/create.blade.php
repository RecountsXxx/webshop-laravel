@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success mb-3" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
                </div>
            @endif
            <div class="card card-primary">
                <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" required class="form-control" id="title" placeholder="Enter title category">
                            <label for="description">Description</label>
                            <input type="text" name="description" required class="form-control" id="description" placeholder="Enter title description">
                            <label for="image">Image category</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
