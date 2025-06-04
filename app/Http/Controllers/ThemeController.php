<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $themes = Theme::query()
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->q . '%')
                      ->orWhere('folder', 'like', '%' . $request->q . '%');
            })
            ->paginate(10);

        return view('dashboard.themes.index', [
            'themes' => $themes,
            'q' => $request->q
        ]);
    }

    public function create()
    {
        return view('dashboard.themes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'folder' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            Theme::create($request->all());
            return redirect()->route('themes.index')->with('successMessage', 'Tema berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()->route('themes.create')->with('errorMessage', 'Gagal membuat tema: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theme $theme)
    {
        return view('dashboard.themes.edit', compact('theme'));
    }

    public function update(Request $request, Theme $theme)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'folder' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            $theme->update($request->all());
            return redirect()->route('themes.index')->with('successMessage', 'Tema berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('themes.edit', $theme)->with('errorMessage', 'Gagal memperbarui tema: ' . $e->getMessage());
        }
    }

    public function destroy(Theme $theme)
    {
        try {
            $theme->delete();
            return redirect()->route('themes.index')->with('successMessage', 'Tema berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('themes.index')->with('errorMessage', 'Gagal menghapus tema: ' . $e->getMessage());
        }
    }
}
