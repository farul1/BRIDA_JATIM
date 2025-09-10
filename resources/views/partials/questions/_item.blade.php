<div class="question-item list-group-item sortable-item mb-3" data-id="{{ $question->id }}">
    <div class="d-flex align-items-center">
        <div class="sortable-handle me-3" style="cursor: move;">
            <i class="fas fa-bars text-muted"></i>
        </div>
        <div class="flex-grow-1">
            <h6 class="mb-1">
                {{ $question->question_text }}
                @if($question->is_required)
                    <span class="text-danger">*</span>
                @endif
            </h6>
            <small class="text-muted">{{ ucfirst($question->type) }}</small>
        </div>
        <div class="btn-group">
            <button class="btn btn-sm btn-outline-primary edit-question" 
                    data-id="{{ $question->id }}">
                <i class="fas fa-edit"></i>
            </button>
            <form action="{{ route('admin.questions.destroy', $question->id) }}" 
                  method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger" 
                        onclick="return confirm('Hapus pertanyaan ini?')">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
    </div>
</div>