<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('menu_order')->get();
        return view('dashboard.menu.index', compact('menus'));
    }

    public function create()
    {
        return view('dashboard.menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_text' => 'required|max:255',
            'menu_icon' => 'nullable|string|max:50',
            'menu_url' => 'required|max:255',
            'menu_order' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        Menu::create($request->all());

        return redirect()->route('menu.index')->with('success', 'Menu created successfully.');
    }

    public function edit(Menu $menu)
    {
        return view('dashboard.menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'menu_text' => 'required|max:255',
            'menu_icon' => 'nullable|string|max:50',
            'menu_url' => 'required|max:255',
            'menu_order' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        $menu->update($request->all());

        return redirect()->route('menu.index')->with('success', 'Menu updated successfully.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu deleted successfully.');
    }
}
