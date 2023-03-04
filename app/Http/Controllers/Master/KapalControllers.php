<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\JenisKapalModel;
use App\Models\Master\KapalModel;
use Carbon\Carbon;
use Validator;

class KapalControllers extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*** Index ***/
    public function index()
    {
        $data_kapal = KapalModel::join('jenis_kapal', 'jenis_kapal.kode_jenis_kapal', '=', 'kapal.jenis_kapal')
            ->get(['kapal.*', 'jenis_kapal.nama_jenis_kapal']);

        return view('master.kapal.kapal', compact('data_kapal'));
    }

    public function daftarKapal()
    {
        $data_kapal = KapalModel::join('jenis_kapal', 'jenis_kapal.kode_jenis_kapal', '=', 'kapal.jenis_kapal')
            ->get(['kapal.*', 'jenis_kapal.nama_jenis_kapal']);

        return view('master.daftar_kapal.kapal', compact('data_kapal'));
    }

    /*** pencarian kapal ***/
    public function pencarianKapal(Request $request)
    {
        $data_kapal = KapalModel::OrderBy('nama_kapal', 'desc')
            ->where('nama_kapal', 'like', "%{$request->pencarian}%")
            ->get();

        return view('master.kapal.data_list_kapal', compact('data_kapal'));
    }

    /*** Create Kapal ***/
    public function createKapal()
    {
        // load model
        $jenisKapal = JenisKapalModel::OrderBy('nama_jenis_kapal', 'desc')->get();

        return view('master.kapal.add_kapal', compact('jenisKapal'));
    }

    /*** Edit Kapal ***/
    public function editKapal($id)
    {
        $jenis_kapal    = JenisKapalModel::OrderBy('nama_jenis_kapal', 'desc')->get();
        $data_kapal     = KapalModel::join('jenis_kapal', 'jenis_kapal.kode_jenis_kapal', '=', 'kapal.jenis_kapal')
            ->where('id_kapal', '=', "%{$id}%")
            ->OrderBy('kapal.id_kapal', 'desc')->get()->first();

        if (isset($data_kapal)) {
            return view('master.kapal.edit_kapal', compact('data_kapal', 'jenis_kapal'));
        } else {
            abort(404);
        }
    }

    /*** Save jenis kapal ***/
    public function saveKapal(Request $request)
    {
        $time       = Carbon::now();
        $validasi   = Validator::make($request->all(), [
            'nama_kapal'    => 'required|max:35|unique:kapal',
            'no_lambung'    => 'required|max:5|unique:kapal',
            'jenis_kapal'   => 'required',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi->errors());
        } else {
            $input              = new KapalModel();
            $input->no_lambung  = $request->no_lambung;
            $input->nama_kapal  = $request->nama_kapal;
            $input->jenis_kapal = $request->jenis_kapal;
            $input->created_at  = $time;
            $input->updated_at  = $time;
            $input->save();

            return redirect()->back()->with('info', 'Data kapal berhasil disimpan');
        }
    }

    /*** Delete kapal ***/
    public function deleteKapal(Request $request)
    {
        KapalModel::where('id_kapal', '=', "{$request->id_hapus}")->delete();

        return redirect()->back()->with('info', 'Data kapal berhasil dihapus');
    }

    /*** Update kapal ***/
    public function updateKapal(Request $request, $id)
    {
        $time       = Carbon::now();
        $validasi   = Validator::make($request->all(), [
            'no_lambung'    => 'required|max:5',
            'nama_kapal'    => 'required|max:35',
        ]);

        $data_kapal = KapalModel::where('id_kapal', '=', "{$id}")->get()->first();

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi->errors());
        } else {
            KapalModel::where('id_kapal', '=', "{$id}")
                ->update([
                    'nama_kapal'    => $request->nama_kapal,
                    'no_lambung'    => $request->no_lambung,
                    'jenis_kapal'   => $request->jenis_kapal,
                    'created_at'    => $data_kapal->created_at,
                    'updated_at'    => $time,
                ]);

            return redirect()->back()->with('info', 'Data kapal berhasil diupdate');
        }
    }
}
