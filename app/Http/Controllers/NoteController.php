<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Inertia\Inertia;


class NoteController extends Controller
{
    /**
     * render the index page for the notes.
    */
    public function index()
    {
        return Inertia::render('notes/Index');
    }

    /**
     * render the create page for the notes.
    */
    public function create()
    {
        return Inertia::render('notes/Create');
    }

    /**
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $noteData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'content' => ['required', 'string'],
        ]);

        // register the new note.
        if (Note::create($noteData))
        {
            return to_route('notes.show');
        }

        return redirect()->route('notes.create')->with('failure', 'Note could not be created.');
    }

    public function show()
    {
        $notes = Note::latest()->get();
        return Inertia::render('notes/Show', ['notes' => $notes]);
    }
}
