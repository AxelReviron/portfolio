<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use App\Utils\HandlesPolicies;
use Illuminate\Database\Eloquent\Model;

class ProjectPolicy
{
    use HandlesPolicies;

    protected string $model = Project::class;

    protected function isOwn(User $user, Model $model): bool
    {
        return $model instanceof User && $user->getKey() === $model->getKey();
    }
}
