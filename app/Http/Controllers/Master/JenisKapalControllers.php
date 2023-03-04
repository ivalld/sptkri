<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\JenisKapalModel;
use App\Models\Master\KapalModel;
use Carbon\Carbon;
use Validator;
use Response;
use View;
use DB;
use File;

class JenisKapalControllers extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*** Index ***/
    public function index()
    {
        $data_jeniskapal = JenisKapalModel::OrderBy('kode_jenis_kapal', 'desc');

        return view('master.jenis_kapal.jenis_kapal', compact('data_jeniskapal'));
    }

    /*** pencarian jenis kapal ***/
    public function pencarianJenisKapal(Request $request)
    {
        $data_jeniskapal = JenisKapalModel::OrderBy('nama_jenis_kapal', 'desc')
            ->where('nama_jenis_kapal', 'like', "%{$request->pencarian}%")
            ->get();

        return view('master.jenis_kapal.data_list_jenis_kapal', compact('data_jeniskapal'));
    }

    /*** Create Jenis Kapal ***/
    public function createJenisKapal()
    {
        return view('master.jenis_kapal.add_jenis_kapal');
    }

    /*** Edit Jenis Kapal ***/
    public function editJenisKapal($id)
    {

        $data_jenis_kapal =  JenisKapalModel::where('kode_jenis_kapal', '=', "{$id}")->get()->first();
        if (isset($data_jenis_kapal)) {
            return view('master.jenis_kapal.edit_jenis_kapal', compact('data_jenis_kapal'));
        } else {
            abort(404);
        }
    }

    /*** Save jenis kapal ***/
    public function saveJenisKapal(Request $request)
    {
        $time       = Carbon::now();
        $validasi   = Validator::make($request->all(), [
            'nama_jenis_kapal'    => 'required|max:35|unique:jenis_kapal',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi->errors());
        } else {
            $input                      = new JenisKapalModel();
            $input->nama_jenis_kapal    = $request->nama_jenis_kapal;
            $input->created_at          = $time;
            $input->updated_at          = $time;
            $input->save();

            return redirect()->back()->with('info', 'Data jenis kapal berhasil disimpan');
        }
    }

    /*** Delete jenis kapal ***/
    public function deleteJenisKapal(Request $request)
    {
        JenisKapalModel::where('kode_jenis_kapal', '=', "{$request->id_hapus}")->delete();

        return redirect()->back()->with('info', 'Data jenis kapal berhasil dihapus');
    }

    /*** Update jenis kapal ***/
    public function updateJenisKapal(Request $request, $id)
    {
        $validasi = Validator::make($request->all(), [
            'nama_jenis_kapal'    => 'required|max:35',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi->errors());
        } else {
            JenisKapalModel::where('kode_jenis_kapal', '=', "{$id}")
                ->update([
                    'nama_jenis_kapal'    => $request->nama_jenis_kapal,
                ]);

            return redirect()->back()->with('info', 'Data jenis kapal berhasil diupdate');
        }
    }
}
