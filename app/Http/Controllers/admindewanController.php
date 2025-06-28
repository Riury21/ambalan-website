<?php

namespace App\Http\Controllers;

use App\Models\Dewan;
use Illuminate\Http\Request;

class AdminDewanController extends Controller
{
        public function index(Request $request)
    {
        $query = Dewan::query();

        if ($request->filled('jabatan')) {
            $query->where('jabatan', 'like', '%' . $request->jabatan . '%');
        }

        if ($request->filled('angkatan')) {
            $query->where('angkatan', 'like', '%' . $request->angkatan . '%');
        }

        if ($request->filled('alamat')) {
            $query->where('alamat', 'like', '%' . $request->alamat . '%');
        }

        if ($request->filled('satuan')) {
            $query->where('satuan', $request->satuan);
        }

        $dewan = $query->get();

        return view('admin.dewan.index', compact('dewan'));
    }

    public function create()
    {
        return view('admin.dewan.dewan_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'required|string|max:50',
            'satuan' => 'nullable|in:Kamajaya,Kamaratih',
            'angkatan' => 'nullable|string|max:10',
            'keaktifan' => 'nullable|in:Menjabat,Purna',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string|max:255',
            'nomer_hp' => 'nullable|string|max:20',
            'sosial_media' => 'nullable|string|max:100',
            'foto' => 'nullable|image|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $namaFile);
            $data['foto'] = $namaFile;
        }

        Dewan::create($data);

        return redirect('/admin/dewan')->with('success', 'Data Dewan Ambalan berhasil ditambahkan!');
    }

    public function edit($id)
        {
            $dewan = Dewan::findOrFail($id);
            return view('admin.dewan.dewan_edit', compact('dewan'));
        }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'required|string|max:50',
            'satuan' => 'nullable|in:Kamajaya,Kamaratih',
            'angkatan' => 'nullable|string|max:10',
            'keaktifan' => 'nullable|in:Menjabat,Purna',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string|max:255',
            'nomer_hp' => 'nullable|string|max:20',
            'sosial_media' => 'nullable|string|max:100',
            'foto' => 'nullable|image|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        $dewan = Dewan::findOrFail($id);
        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $namaFile);
            $data['foto'] = $namaFile;
        }

        $dewan->update($data);

        return redirect('/admin/dewan')->with('success', 'Data Dewan Ambalan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $dewan = Dewan::findOrFail($id);
        $dewan->delete();

        return redirect('/admin/dewan')->with('success', 'Data Dewan Ambalan berhasil dihapus!');
    }

}
