<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\JenisDokumenModel;
use Validator;

class JenisDokumenController extends Controller
{
    /*** Index jenis dokumen ***/
    public function index()
    {
        $dokumen = JenisDokumenModel::OrderBy('id_dokumen', 'desc')->get();
        return view('master.jenis_dokumen.jenis_dokumen', compact('dokumen'));
    }

    /*** Pencarian Jenis Dokumen ***/
    public function PencarianJenisDokumen(Request $request)
    {
        $dokumen = JenisDokumenModel::where('jenis_dokumen', 'like', "%{$request->pencarian}%")->get();
        return view('master.jenis_dokumen.data_jenis_dokumen', compact('dokumen'));
    }

    /*** Create Jenis Dokumen ***/
    public function createJenisDokumen()
    {
        return view('master.jenis_dokumen.create_jenis_dokumen');
    }

    /*** Save Jenis Dokumen ***/
    public function saveJenisDokumen(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'jenis_dokumen' => 'required|max:100'
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi->errors());
        } else {

            $input                  = new JenisDokumenModel();
            $input->jenis_dokumen   = $request->jenis_dokumen;
            $input->kode_dokumen    = $request->kode_dokumen;
            $input->keterangan      = $request->keterangan;
            $input->save();
            return redirect()->back()->with('info', 'Data jenis dokumen berhasil disimpan');
        }
    }

    /*** Update Jenis Dokumen ***/
    public function updateJenisDokumen(Request $request, $id)
    {
        $validasi = Validator::make($request->all(), [
            'jenis_dokumen' => 'required|max:50'
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi->errors());
        } else {

            JenisDokumenModel::where('id_dokumen', '=', "{$id}")
                ->update([
                    'jenis_dokumen' => $request->jenis_dokumen,
                    'kode_dokumen'  => $request->kode_dokumen,
                    'keterangan'    => $request->keterangan,
                    'kategori'      => $request->kategori,
                ]);

            return redirect()->back()->with('info', 'Data jenis dokumen berhasil diupdate');
        }
    }

    /*** Edit Jenis Dokumen ***/
    public function editJenisDokumen($id)
    {
        $dokumen = JenisDokumenModel::where('id_dokumen', '=', "{$id}")->get()->first();
        return view('master.jenis_dokumen.edit_jenis_dokumen', compact('dokumen'));
    }

    /*** Delete Jenis Dokumen ***/
    public function deleteJenisDokumen(Request $request)
    {
        JenisDokumenModel::where('id_dokumen', '=', "{$request->id_hapus}")->delete();
        return redirect()->back()->with('info', 'Data jenis dokumen berhasil dihapus');
    }
}
