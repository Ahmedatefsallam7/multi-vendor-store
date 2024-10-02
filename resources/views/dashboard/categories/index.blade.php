@extends('layouts.index')

@section('page-title')
Categories
@endsection

@section('page-content')

@section('breadcrumbs')
@parent
<li class="breadcrumb-item active"><a href="{{ route('categories.index') }}">Categories</a></li>
@endsection

<x-alerting />
<x-alert-errors />

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Categories</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">
        <i class="fa fa-plus"></i> New
    </a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Parent</th>
            <th>Description</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td class="text-center">
                <img src="{{ asset($category->image ?? 'default_image_url.jpg') }}" alt="Image" class="img-thumbnail" style="width: 50px; height: 50px;">
                <p class="mt-1 mb-0">{{ Str::limit(pathinfo($category->image , PATHINFO_FILENAME), 5, '...') }}</p>
            </td>

            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>{{ $category->parent->name ?? "Primary" }}</td>

            <x-description-modal :category="$category" />

            <td class="text-center">
                @switch($category->status)
                @case('active')
                <i class="mr-1 fas fa-check-circle text-success" style="font-size: 1.5rem;" data-toggle="tooltip" title="Active"></i>
                @break

                @case('archived')
                <i class="mr-1 fas fa-times-circle text-danger" style="font-size: 1.5rem;" data-toggle="tooltip" title="Archived"></i>
                @break
                @endswitch
            </td>

            <td>{{ $category->created_at->format('M d, Y') }}</td>

            <td>
                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#confirm-edit-modal{{ $category->id }}">
                    <i class="fa fa-edit"></i> Edit
                </button>
                <x-confirm_edit_modal :category="$category" :categories="$categories" />

                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#confirm-delete-modal{{ $category->id }}">
                    <i class="fa fa-trash"></i> Delete
                </button>
                <x-confirm_delete_modal :category="$category" />
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="9" class="text-center text-danger">
                {{ ucwords("there are no categories at this moment.") }}
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $categories->links() }}

@endsection
