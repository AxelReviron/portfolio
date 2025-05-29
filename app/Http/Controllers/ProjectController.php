<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Utils\HandlesCrudOperations;

class ProjectController extends Controller
{
    use HandlesCrudOperations;

    protected string $model = Project::class;
}
