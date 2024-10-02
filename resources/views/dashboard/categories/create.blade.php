@extends('layouts.index')

@section('page-title')
Create Category
@endsection

@section('page-content')

@section('content-title')
Add New Category
@endsection

@section('breadcrumbs')
@parent
<li class="breadcrumb-item active"><a href="{{ route('categories.index') }}">Categories</a></li>
<li class="breadcrumb-item active"><a href="{{ route('categories.create') }}">Create</a></li>
@endsection

<x-alert-errors />

{{-- start write the content here --}}
<form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="name">Category Name</label>
        <input name="name" type="text" autofocus class="form-control" id="name" value="{{ old('name') }}" placeholder="category name">
    </div>

    <div class="form-group">
        <label for="parent">Category Parent</label>
        <select name="parent_id" id="parent" class="form-control form-select">
            <option selected disabled>Select Category</option>
            <option value="">Primary Category</option>
            @forelse ($parents as $parent )
            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
            @empty
            <option value="" selected disabled>{{ ucwords("there are no categoies yet") }}</option>
            @endforelse

        </select>
    </div>

    <div class="form-group">
        <label for="dsecription">Description</label>
        <textarea name="description" type="text" class="form-control" id="description" placeholder="category description">{{ old('description') }}</textarea>
    </div>

    <div class="form-group">
        <label for="image">Category Image</label>
        <input name="image" class="form-control" accept=".jpg, .png, .jpeg" type="file" id="image">
    </div>

    <div class="form-group">
        <label>Status</label>
        <div class="form-check">
            <input type="radio" class="form-check-input" checked name="status" value="active">
            <label class="form-check-label"> Active </label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="status" value="archived">
            <label class="form-check-label"> Archived </label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
