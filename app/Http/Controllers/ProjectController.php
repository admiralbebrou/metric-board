<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function create()
    {
        return Inertia::render('Projects/Create');
        // Файл будет: resources/js/Pages/Projects/Create.vue
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Project::create([
            'name' => $request->name,
        ]);

        return redirect()->route('projects.create')->with('success', 'Project created!');
    }
}
