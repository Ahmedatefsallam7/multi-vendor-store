<div class="modal fade" id="confirm-edit-modal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="confirm-edit-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirm-edit-modal-label">Confirm Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="hidden" class="form-control" id="id" name="id" value="{{ $category->id }}">
                        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" placeholder="Enter Category name">
                    </div>
                    <div class="form-group">
                        <label for="parent">Category Parent</label>
                        <select name="parent_id" id="parent" class="form-control">
                            <option value="" selected disabled>Select Category Parent</option>
                            <option value="">Primary Category</option>
                            @forelse ($categories as $cat)

                            <option value="{{ $cat->id }}" @selected($category->parent_id == $cat->id)>{{ $cat->name }}
                            </option>
                            @empty
                            <option value="" disabled>There are no parent categories</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Category Description</label>
                        <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter Category description">{{ $category->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Category Image</label>
                        <div class="custom-file">
                            <img src="{{ asset($category->image ?? 'default_image_url.jpg') }}" alt="Image" class="img-thumbnail" style="width: 50px; height: 50px;">
                            <p class="mt-1 mb-0">{{ Str::limit(pathinfo($category->image , PATHINFO_FILENAME), 10,
                                '...') }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image">Update Image</label>
                        <div class="custom-file">
                            <input type="file" class="form-control" id="image" name="image" accept=".jpg, .png, .jpeg">
                            {{-- <label class="custom-file-label" for="image">Choose file</label> --}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="active" value="active" {{
                                $category->status == 'active' ? 'checked' : '' }}>
                            <label class="form-check-label" for="active">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="archived" value="archived" {{
                                $category->status == 'archived' ? 'checked' : '' }}>
                            <label class="form-check-label" for="archived">
                                Archived
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
