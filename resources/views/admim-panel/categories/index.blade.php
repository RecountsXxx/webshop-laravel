@extends('layouts.admin')


@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Categories</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            Id
                        </th>
                        <th>
                            Title
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Image
                        </th>
                        <th style="width:40%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>
                                <a>{{$category->title}}</a>
                                <br>
                                <small>{{$category->created_at}}</small>
                            </td>
                            <td>{{$category->description}}</td>
                            <td>{{$category->img}}</td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{route('category.edit',$category['id'])}}" >
                                    <i class="fas fa-pencil-alt" ></i> Edit
                                </a>
                                <form action="{{route('category.destroy', $category['id'])}}" method="POST"  style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type=submit class="delete-btn btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if(count($categories) == 0)
                    <h3 class="m-3">No categories</h3>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
