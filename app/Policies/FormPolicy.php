<?php

namespace App\Policies;

use App\Models\Form;
use App\Models\User;

class FormPolicy
{
    public function viewAny(User $user): bool
    {
        // Semua user login bisa lihat list form miliknya
        return true;
    }

    public function view(User $user, Form $form): bool
    {
        return $user->id === $form->user_id || $user->is_admin;
    }

    public function create(User $user): bool
    {
        return true; // semua user login bisa bikin form
    }

    public function update(User $user, Form $form): bool
    {
        return $user->id === $form->user_id || $user->is_admin;
    }

    public function delete(User $user, Form $form): bool
    {
        return ($user->id === $form->user_id || $user->is_admin)
            && $form->responses()->doesntExist();
    }
}
