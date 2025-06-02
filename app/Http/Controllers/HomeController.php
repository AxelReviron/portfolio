<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Technology;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class HomeController extends Controller
{
    public function index(): InertiaResponse
    {
        $categories = Category::with('technologies')->get();
        $experiences = Experience::all();
        $projects = Project::with(['experiences', 'technologies'])->get();

        return Inertia::render('Home', [
            'categories' => $categories,
            'experiences' => $experiences,
            'projects' => $projects,
        ]);
    }
}
