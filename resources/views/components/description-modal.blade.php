<td>
    @if (str_word_count($category->description) > 5 || strlen($category->description) > 10)
    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#description-modal-{{ $category->id }}">View</button>
    <div class="modal fade" id="description-modal-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="description-modal-{{ $category->id }}-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="description-modal-{{ $category->id }}-label">{{ $category->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ $category->description }}
                </div>
            </div>
        </div>
    </div>
    @else
    {{ $category->description }}
    @endif
</td>
