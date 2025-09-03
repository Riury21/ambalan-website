<?php

namespace App\Http\Controllers;

use App\Models\Pembina;
use Illuminate\Http\Request;

class AdminPembinaController extends Controller
{
    public function index(Request $request)
    {
        $query = Pembina::query();

        // Filter jabatan
        if ($request->filled('jabatan')) {
            $query->where('jabatan', 'like', '%' . $request->jabatan . '%');
        }

        // Filter tahun menjabat
        if ($request->filled('tahun_menjabat')) {
            $query->where('tahun_menjabat', 'like', '%' . $request->tahun_menjabat . '%');
        }

        // Urutkan data
        $query->orderByRaw("FIELD(tahun_menjabat, 'Ya', 'Tidak')")
              ->orderByRaw("FIELD(jabatan, 'kamabigus', 'ketua gudep kamajaya', 'ketua gudep kamaratih',
                 'pembina kamajaya', 'pembina kamaratih')");

        $pembina = $query->get();

        return view('admin.pembina.index', compact('pembina'));
    }

    // **Method publik export()**
    public function export(Request $request)
    {
        $query = Pembina::query();

        // Filter jabatan
        if ($request->filled('jabatan')) {
            $query->where('jabatan', 'like', '%' . $request->jabatan . '%');
        }

        // Filter tahun menjabat
        if ($request->filled('tahun_menjabat')) {
            $query->where('tahun_menjabat', 'like', '%' . $request->tahun_menjabat . '%');
        }

        // Urutkan data
        $query->orderByRaw("FIELD(tahun_menjabat, 'Ya', 'Tidak')")
              ->orderByRaw("FIELD(jabatan, 'kamabigus', 'ketua gudep kamajaya', 'ketua gudep kamaratih',
                 'pembina kamajaya', 'pembina kamaratih')");

        $pembina = $query->get();

        return $this->exportCsv($pembina);
    }

    // Fungsi internal untuk membuat CSV
    protected function exportCsv($pembina)
    {
        $filename = 'pembina_export_' . date('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $columns = ['No', 'Nama', 'Jabatan', 'Bertugas', 'HP', 'Email', 'Alamat', 'Keterangan'];

        $callback = function() use ($pembina, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($pembina as $index => $item) {
                fputcsv($file, [
                    $index + 1,
                    $item->nama,
                    $item->jabatan,
                    $item->tahun_menjabat ?? '-',
                    $item->nomer_hp ?? '-',
                    $item->email ?? '-',
                    $item->alamat ?? '-',
                    strip_tags($item->keterangan),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
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
