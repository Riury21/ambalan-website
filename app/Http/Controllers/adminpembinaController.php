<?php

namespace App\Http\Controllers;

use App\Models\Pembina;
use Illuminate\Http\Request;

class AdminPembinaController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Pembina::query();

        if ($request->filled('jabatan')) {
            $query->where('jabatan', 'like', '%' . $request->jabatan . '%');
        }

        if ($request->filled('tahun_menjabat')) {
            $query->where('tahun_menjabat', 'like', '%' . $request->tahun_menjabat . '%');
        }

        $pembina = $query->get();

        return view('admin.pembina.index', compact('pembina'));
    }


    public function create()
    {
        return view('admin.pembina.pembina_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'required|string|max:50',
            'tahun_menjabat' => 'nullable|string|max:20',
            'nomer_hp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'alamat' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $pembina = new Pembina();
        $pembina->nama = $request->nama;
        $pembina->jabatan = $request->jabatan;
        $pembina->tahun_menjabat = $request->tahun_menjabat;
        $pembina->nomer_hp = $request->nomer_hp;
        $pembina->email = $request->email;
        $pembina->alamat = $request->alamat;
        $pembina->keterangan = $request->keterangan;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $namaFile);
            $pembina->foto = $namaFile;
        }

        $pembina->save();

        return redirect('/admin/pembina')->with('success', 'Data pembina berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pembina = Pembina::findOrFail($id);
        return view('admin.pembina.pembina_edit', compact('pembina'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'required|string|max:50',
            'tahun_menjabat' => 'nullable|string|max:20',
            'nomer_hp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'alamat' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $pembina = Pembina::findOrFail($id);
        $pembina->nama = $request->nama;
        $pembina->jabatan = $request->jabatan;
        $pembina->tahun_menjabat = $request->tahun_menjabat;
        $pembina->nomer_hp = $request->nomer_hp;
        $pembina->email = $request->email;
        $pembina->alamat = $request->alamat;
        $pembina->keterangan = $request->keterangan;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $namaFile);
            $pembina->foto = $namaFile;
        }

        $pembina->save();

        return redirect('/admin/pembina')->with('success', 'Data pembina berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pembina = Pembina::findOrFail($id);
        $pembina->delete();

        return redirect('/admin/pembina')->with('success', 'Data pembina berhasil dihapus!');
    }
}
