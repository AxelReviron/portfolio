<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Experience;
use App\Models\Project;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class HomeController extends Controller
{
    public function index(): InertiaResponse
    {
        $categories = Category::with([
            'technologies' => function ($query) {
                $query->where('is_active', true);
            }
        ])->get()->toResourceCollection();

        $experiences = Experience::orderBy('start_date', 'desc')->get()->toResourceCollection();

        $projects = Project::with(['experiences', 'technologies', 'media'])->orderBy('created_at', 'desc')->get()->toResourceCollection();

        return Inertia::render('Home', [
            'categories' => $categories,
            'experiences' => $experiences,
            'projects' => $projects,
        ]);
    }
}
