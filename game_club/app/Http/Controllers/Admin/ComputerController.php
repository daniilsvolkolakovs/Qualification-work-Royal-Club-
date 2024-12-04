<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    public function index(Request $request)
    {
        $sortField = $request->input('sort');
        $sortOrder = $request->input('order') ?? 'asc';

        $searchQuery = $request->input('search');

        $computers = Computer::query();

        if ($searchQuery) {
            $computers = $computers->where(function ($query) use ($searchQuery) {
                $query->where('id', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('name', 'LIKE', '%' . $searchQuery . '%');
            });
        }

        if ($sortField) {
            $computers = $computers->orderBy($sortField, $sortOrder);
        }

        $computers = $computers->get();

        return view('admin.computers.index', compact('computers', 'sortField', 'sortOrder'));
    }

    public function create()
    {
        return view('admin.computers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|max:1000',
            'quantity' => 'required|integer|min:1|max:255',
        ]);

        $quantity = $request->input('quantity');
        $name = $request->input('name');
        $price = $request->input('price');

        for ($i = 0; $i < $quantity; $i++) {
            Computer::create([
                'name' => $name,
                'price' => $price,
                'computer_id' => uniqid('PC_'),
            ]);
        }

        // Flash message for successful creation
        session()->flash('success', 'Компьютеры успешно добавлены!');

        return redirect()->route('admin.computers.index');
    }

    public function edit($id)
    {
        $computer = Computer::findOrFail($id);
        return view('admin.computers.edit', compact('computer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|max:1000',
        ]);

        $computer = Computer::findOrFail($id);
        $computer->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ]);

        // Flash message for successful update
        session()->flash('success', 'Компьютер успешно обновлён!');

        return redirect()->route('admin.computers.index');
    }

    public function destroy($id)
    {
        $computer = Computer::findOrFail($id);
        $computer->delete();

        // Flash message for successful deletion
        session()->flash('success', 'Компьютер успешно удалён!');

        return redirect()->route('admin.computers.index');
    }
}