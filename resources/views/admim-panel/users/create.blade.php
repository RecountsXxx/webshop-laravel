@extends('layouts.admin')

@section('content')
    <!doctype html>
<section class="content">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success mb-3" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
            </div>
        @endif
        <div class="card card-primary">
            <form action="{{route('user.store')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" required class="form-control" id="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="title">Email</label>
                        <input type="text" name="email" required class="form-control" id="email" placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label for="title">Password</label>
                        <input type="password" name="password" required class="form-control" id="password" placeholder="Enter password">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
