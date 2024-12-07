<?php
namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::all();
        return view('trainings.index', compact('trainings'));
    }

    public function create()
    {
        return view('trainings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'time' => 'required',
            'price' => 'required|numeric',
            'type' => 'required|string',
            'image_url' => 'nullable|string',
        ]);

        Training::create($request->all());

        return redirect()->route('trainings.index');
    }

    public function show(Training $training)
    {
        return view('trainings.show', compact('training'));
    }

    public function edit(Training $training)
    {
        return view('trainings.edit', compact('training'));
    }

    public function update(Request $request, Training $training)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'time' => 'required',
            'price' => 'required|numeric',
            'type' => 'required|string',
            'image_url' => 'nullable|url',
        ]);

        $training->update($request->all());

        return redirect()->route('trainings.index');
    }

    public function destroy(Training $training)
    {
        $training->delete();

        return redirect()->route('trainings.index');
    }
}