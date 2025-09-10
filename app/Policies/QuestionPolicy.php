<?php

namespace App\Policies;

use App\Models\Question;
use App\Models\User;
use App\Models\Form;

class QuestionPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Question $question): bool
    {
        return $user->id === $question->form->user_id || $user->is_admin;
    }

    // ✅ Pastikan di middleware kirim form, contoh: can:create,form
    public function create(User $user, Form $form): bool
    {
        return $user->id === $form->user_id || $user->is_admin;
    }

    public function update(User $user, Question $question): bool
    {
        return $user->id === $question->form->user_id || $user->is_admin;
    }

    public function delete(User $user, Question $question): bool
    {
        return $user->id === $question->form->user_id || $user->is_admin;
    }

    public function restore(User $user, Question $question): bool
    {
        return $user->is_admin;
    }

    public function forceDelete(User $user, Question $question): bool
    {
        return $user->is_admin;
    }
}
