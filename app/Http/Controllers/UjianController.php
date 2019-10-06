<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soal;
use Auth;
use App\Pengaturan;
use App\Nilai;
use DB;

class UjianController extends Controller
{
    public function index()
    {
        $soal = Soal::all();
        return view('soal.index', compact('soal'));
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $pilihan     = $request->pilihan;
            $id_soal     = $request->id;
            $jumlah      = $request->jumlah;

            $score = 0;
            $benar = 0;
            $salah = 0;
            $kosong = 0;
            for ($i = 0; $i < $jumlah; $i++) {
                //id nomor soal
                $nomor = $id_soal[$i];

                //jika user tidak memilih jawaban
                if (empty($pilihan[$nomor])) {
                    $kosong++;
                } else {
                    //jawaban dari user
                    $jawaban = $pilihan[$nomor];
                    //cocokan jawaban user dengan jawaban di database
                    $query = DB::table('table_soals')
                        ->where('id', '=', $nomor)
                        ->where('knc_jawaban', '=', $jawaban)
                        ->count();
                    if ($query) {
                        //jika jawaban cocok (benar)
                        $benar++;
                    } else {
                        //jika salah
                        $salah++;
                    }
                }
                $jumlah_soal = DB::table('table_soals')->count();
                $score = 100 / $jumlah_soal * $benar;
                $hasil = number_format($score, 1);
            }
            $qry = Pengaturan::select('nilai_min')->first();
            $ceknilai = $qry->nilai_min;
            if ($hasil > $ceknilai) {
                $dat = [
                    'id_user' => Auth::user()->id,
                    'benar' => $benar,
                    'salah' => $salah,
                    'kosong' => $kosong,
                    'score' => $hasil,
                    'keterangan' => 'LULUS'
                ];
                Nilai::insert($dat);
            } else {
                $dat = [
                    'id_user' => Auth::user()->id,
                    'benar' => $benar,
                    'salah' => $salah,
                    'kosong' => $kosong,
                    'score' => $hasil,
                    'keterangan' => 'TIDAK LULUS'
                ];
                Nilai::insert($dat);
            }
            DB::commit();
            return redirect()->route('ujian')->with('success', "Anda Telah Berhasil Mengisi Soal");
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
