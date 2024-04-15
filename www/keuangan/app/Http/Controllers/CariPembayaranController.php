<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class CariPembayaranController extends Controller
{
    public function pembayaran(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');

            if ($query) {
                $siswa = Siswa::join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
                                ->join('pembayarans', 'pembayarans.class_id', '=', 'kelas.id')
                                ->join('kejuruans', 'siswas.kejuruan_id', '=', 'kejuruans.id')
                                ->join('tahun_ajarans', 'siswas.tahun_ajaran_id', '=', 'tahun_ajarans.id')
                                ->select('siswas.*', 'kelas.nama_kelas', 'kejuruans.kejuruan', 'tahun_ajarans.tahun_ajaran','pembayarans.kategori', 'pembayarans.nominal')
                                ->where('siswas.nama', 'like', '%' . $query . '%')
                                ->orWhere('siswas.nis', 'like', '%' . $query . '%')
                                ->get();
                if ($siswa->count() > 0) {
                    foreach ($siswa as $key => $value) {
                        $output .= '<tr>' .
                            '<td>' . $value->nis . '</td>' .
                            '<td>' . $value->nama . '</td>' .
                            '<td>' . $value->nama_kelas . '</td>' .
                            '<td>' . $value->kejuruan . '</td>' .
                            '<td>' . $value->tahun_ajaran . '</td>' .
                            '<td>' . $value->kategori . '</td>' .
                            '<td>' . number_format($value->nominal, 0, ',', '.') . '</td>' .
                            '<td class="kondisi-column">' . ($value->kondisi ? 'Sudah Bayar' : 'Belum Bayar') . '</td>' .
                            '<td><button id="toggle-button" class="btn btn-primary" data-id="' . $value->id . '">Bayar</button></td>' .
                            '</tr>';
                    }
                } else {
                    $output = '<tr><td colspan="3">Data not found</td></tr>';
                }
            } else {
                $output = '<tr><td colspan="3">Enter a search query</td></tr>';
            }

            return response()->json(['html' => $output]);
        }

        return view('/cari-pembayaran');
    }
}
