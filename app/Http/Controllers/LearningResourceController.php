<?php

namespace App\Http\Controllers;

use App\Models\LearningResource;
use Illuminate\Http\Request;

class LearningResourceController extends Controller
{
    public function index()
    {
        $resources = LearningResource::latest()->get();

        return view('resources.index', compact('resources'));
    }

    public function create()
    {
        return view('resources.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'academic_program' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'topic' => 'required|string|max:255',
            'year_level' => 'required|string|max:255',
            'uploaded_by' => 'required|string|max:255',
        ]);

        LearningResource::create($validated);

        return redirect()
            ->route('resources.index')
            ->with('success', 'Learning resource added successfully.');
    }

    public function show(LearningResource $resource)
    {
        return view('resources.show', compact('resource'));
    }

    public function edit(LearningResource $resource)
    {
        return view('resources.edit', compact('resource'));
    }

    public function update(Request $request, LearningResource $resource)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'academic_program' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'topic' => 'required|string|max:255',
            'year_level' => 'required|string|max:255',
            'uploaded_by' => 'required|string|max:255',
        ]);

        $resource->update($validated);

        return redirect()
            ->route('resources.index')
            ->with('success', 'Learning resource updated successfully.');
    }

    public function destroy(LearningResource $resource)
    {
        $resource->delete();

        return redirect()
            ->route('resources.index')
            ->with('success', 'Learning resource deleted successfully.');
    }
}
