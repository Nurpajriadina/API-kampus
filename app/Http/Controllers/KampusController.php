<?php

namespace App\Http\Controllers;

use App\Models\Kampus;
use Illuminate\Http\Request;

class KampusController extends Controller
{
    // GET: /kampus
    public function index()
    {
        return response()->json(Kampus::all());
    }

    // GET: /kampus/{id}
    public function show($id)
    {
        $kampus = Kampus::find($id);

        if (!$kampus) {
            return response()->json(['message' => 'Kampus not found'], 404);
        }

        return response()->json($kampus);
    }

    // POST: /kampus
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:20',
            'kategori' => 'required|in:Swasta,Negeri',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'jurusan' => 'required|string|max:255',
        ]);

        $kampus = Kampus::create($request->all());

        return response()->json($kampus, 201);
    }

    // PUT: /kampus/{id}
    public function update(Request $request, $id)
    {
        $kampus = Kampus::find($id);

        if (!$kampus) {
            return response()->json(['message' => 'Kampus not found'], 404);
        }

        $kampus->update($request->all());

        return response()->json($kampus);
    }

    // DELETE: /kampus/{id}
    public function destroy($id)
    {
        $kampus = Kampus::find($id);

        if (!$kampus) {
            return response()->json(['message' => 'Kampus not found'], 404);
        }

        $kampus->delete();

        return response()->json(['message' => 'Kampus deleted successfully']);
    }
}
