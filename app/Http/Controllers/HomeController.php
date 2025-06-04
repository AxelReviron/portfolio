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
        ])->get();
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        $projects = Project::with(['experiences', 'technologies', 'media'])->get();

        return Inertia::render('Home', [
            'categories' => $categories,
            'experiences' => $experiences,
            'projects' => $projects,
        ]);
    }
}
