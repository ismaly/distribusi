<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisBarang;
use App\Models\Distribution;

class DistributionController extends Controller
{
    public function index()
    {
        $distributions = Distribution::with('jenisBarang')->get();
        return view('index', compact('distributions'));
    }

    public function inputdata($id = null)
    {
        $jenis_barang = JenisBarang::all();
        $distribution = null;

        if ($id) {
            // Ambil data distribution berdasarkan ID
            $distribution = Distribution::find($id);
            if (!$distribution) {
                return redirect()->route('index')->with('error', 'Data tidak ditemukan.');
            }
        }

        return view('input-data', compact('jenis_barang', 'distribution'));
    }

    public function store(Request $request)
    {
        $distribution = new Distribution();
        if ($request->id) {
            $distribution = Distribution::find($request->id);
            if (!$distribution) {
                return redirect()->route('index')->with('error', 'Data tidak ditemukan.');
            }
        }

        $distribution->nama_barang = $request->nama_barang;
        $distribution->stok = $request->stok;
        $distribution->jumlah_terjual = $request->jumlah_terjual;
        $distribution->tanggal_transaksi = $request->tgl_transaksi;
        $distribution->jenis_barang = $request->jenis_barang;
        $distribution->save();

        return redirect()->route('index')->with('success', 'Data berhasil disimpan.');
    }

    public function delete($id)
    {
        $distribution = Distribution::find($id);
        if (!$distribution) {
            return redirect()->route('index')->with('error', 'Data tidak ditemukan.');
        }

        $distribution->delete();
        return redirect()->route('index')->with('success', 'Data berhasil dihapus.');
    }

    public function transaksi()
    {
        $transactions = Distribution::with('jenisBarang')
            ->orderBy('jumlah_terjual', 'desc') // Mengurutkan dari terbesar
            ->get();
        return view('transaksi', compact('transactions'));
    }
}
