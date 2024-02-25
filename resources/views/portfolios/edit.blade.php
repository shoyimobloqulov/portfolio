@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tizimda Portfolio taxrirlash
            <small> Portfolio</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Bosh sahifa</a></li>
            <li class="active">Portfolio</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Portfolio taxrirlash</h3>
                    </div>

                    <div class="box-body">
                        <form action="{{ route('portfolios.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Portfolio Name:</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Image URL:</label>
                                <input type="text" name="image" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="link">Link:</label>
                                <input type="text" name="link" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Category:</label>
                                <select name="category_id" class="form-control select2" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Portfolio</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
