<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProkerVisiMisi;
use App\Models\ProkerTimeline;
use App\Models\ProkerProgramUmum;

class ProkerController extends Controller
{
    // ============================
    // INDEX
    // ============================
    public function index()
    {
        $visiMisi    = ProkerVisiMisi::all();
        $programUmum = ProkerProgramUmum::all();
        $timeline    = ProkerTimeline::orderBy('tahun', 'asc')
                                      ->orderBy('bulan', 'asc')
                                      ->get();

        return view('admin.proker.index', compact('visiMisi', 'programUmum', 'timeline'));
    }
    
    public function showPublic()
    {
        $visi        = ProkerVisiMisi::where('jenis', 'visi')->first();
        $misi        = ProkerVisiMisi::where('jenis', 'misi')->get();
        $programUmum = ProkerProgramUmum::all();
        $timeline    = ProkerTimeline::orderBy('tahun','asc')
                            ->orderByRaw("FIELD(bulan,'Juli','Agustus','September','Oktober','November','Desember','Januari','Februari','Maret','April','Mei','Juni')")
                            ->get();

        return view('pages.proker', compact('visi','misi','programUmum','timeline'));
    }

    // ============================
    // VISI MISI
    // ============================
    public function storeVisiMisi(Request $request)
    {
        $request->validate([
            'jenis' => 'required|in:visi,misi',
            'isi'   => 'required|string'
        ]);

        ProkerVisiMisi::create($request->only(['jenis','isi']));
        return redirect()->route('proker.index')->with('success', 'Visi/Misi berhasil ditambahkan.');
    }

    public function updateVisiMisi(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required|in:visi,misi',
            'isi'   => 'required|string'
        ]);

        $data = ProkerVisiMisi::findOrFail($id);
        $data->update($request->only(['jenis','isi']));
        return redirect()->route('proker.index')->with('success', 'Visi/Misi berhasil diperbarui.');
    }

    public function destroyVisiMisi($id)
    {
        ProkerVisiMisi::findOrFail($id)->delete();
        return redirect()->route('proker.index')->with('success', 'Visi/Misi berhasil dihapus.');
    }

    // ============================
    // PROGRAM UMUM
    // ============================
    public function storeProgramUmum(Request $request)
    {
        $request->validate([
            'nama_program' => 'required|string',
            'status'       => 'required|in:terlaksana,berlangsung,gagal,belum'
        ]);

        ProkerProgramUmum::create($request->only(['nama_program','status']));
        return redirect()->route('proker.index')->with('success', 'Program Umum berhasil ditambahkan.');
    }

    public function updateProgramUmum(Request $request, $id)
    {
        $request->validate([
            'nama_program' => 'required|string',
            'status'       => 'required|in:terlaksana,berlangsung,gagal,belum'
        ]);

        $data = ProkerProgramUmum::findOrFail($id);
        $data->update($request->only(['nama_program','status']));
        return redirect()->route('proker.index')->with('success', 'Program Umum berhasil diperbarui.');
    }

    public function destroyProgramUmum($id)
    {
        ProkerProgramUmum::findOrFail($id)->delete();
        return redirect()->route('proker.index')->with('success', 'Program Umum berhasil dihapus.');
    }

    // ============================
    // TIMELINE
    // ============================
    public function storeTimeline(Request $request)
    {
        $request->validate([
            'bulan'    => 'required|string', // bulan teks: Januari, Februari, dst.
            'tahun'    => 'required|integer',
            'kegiatan' => 'required|string',
            'status'   => 'required|in:terlaksana,berlangsung,gagal,belum'
        ]);

        ProkerTimeline::create($request->only(['bulan','tahun','kegiatan','status']));
        return redirect()->route('proker.index')->with('success', 'Timeline berhasil ditambahkan.');
    }

    public function updateTimeline(Request $request, $id)
    {
        $request->validate([
            'bulan'    => 'required|string',
            'tahun'    => 'required|integer',
            'kegiatan' => 'required|string',
            'status'   => 'required|in:terlaksana,berlangsung,gagal,belum'
        ]);

        $data = ProkerTimeline::findOrFail($id);
        $data->update($request->only(['bulan','tahun','kegiatan','status']));
        return redirect()->route('proker.index')->with('success', 'Timeline berhasil diperbarui.');
    }

    public function destroyTimeline($id)
    {
        ProkerTimeline::findOrFail($id)->delete();
        return redirect()->route('proker.index')->with('success', 'Timeline berhasil dihapus.');
    }
}
