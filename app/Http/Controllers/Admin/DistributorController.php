<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distributors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;



class DistributorController extends Controller
{
    public function index()
    {
        $distributors = Distributors::all();

        confirmDelete('Hapus Data!', 'Apakah anda yakin ingin menghapus data ini?');

        return view('pages.admin.distributor.index', compact('distributors'));
    }
    public function create()
    {
        return view('pages.admin.distributor.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_distributor' => 'required|string|max:255',
            'kota' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100',
            'kontak' => 'required|string|max:50',
            'email' => 'required|email|unique:distributors',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Distributors::create([
            'nama_distributor' => $request->nama_distributor,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'kontak' => $request->kontak,
            'email' => $request->email,
        ]);

        Alert::success('Berhasil!', 'Distributor berhasil ditambahkan!');
        return redirect()->route('admin.distributor');
    }

    public function edit($id)
    {
        $distributors = Distributors::findOrFail($id);

        return view('pages.admin.distributor.edit', compact('distributors'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_distributor' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kontak' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back();
        }

        $distributors = Distributors::findOrFail($id);


        $distributors->update([
            'nama_distributor' => $request->nama_distributor,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'kontak' => $request->kontak,
            'email' => $request->email,
        ]);

        if ($distributors) {
            Alert::success('Berhasil!', 'Distributor berhasil diperbarui!');
            return redirect()->route('admin.distributor');
        } else {
            Alert::error('Gagal!', 'Distrbutor gagal diperbarui!');
            return redirect()->back();
        }
    }
    public function detail($id)
    {
        $distributor = Distributors::findOrFail($id);
        return view('pages.admin.distributor.detail', compact('distributor'));
    }

    public function delete($id)
    {
        $distributors = Distributors::findOrFail($id);


        $distributors->delete();

        if ($distributors) {
            Alert::success('Berhasil!', 'Distributor berhasil dihapus!');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Distributor gagal dihapus');
            return redirect()->back();
        }
    }


}
