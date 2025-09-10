<?php

namespace App\Policies;

use App\Models\Response;
use App\Models\User;
use App\Models\Form;

class ResponsePolicy
{
    public function viewAny(User $user, Form $form): bool
    {
        return $user->id === $form->user_id || $user->is_admin;
    }

    public function view(User $user, Response $response): bool
    {
        return $user->id === $response->form->user_id || $user->is_admin;
    }

    public function export(User $user, Form $form): bool
    {
        return $user->id === $form->user_id || $user->is_admin;
    }

    public function delete(User $user, Response $response): bool
    {
        return $user->is_admin;
    }
}
