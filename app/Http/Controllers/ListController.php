<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Skripsi;

class ListController extends Controller
{
    public function index()
    {
        $admins = Admin::all(); //menampilkan semua data pada tabel Admin
        $users = User::all(); //menampilkan semua data pada tabel user
        $skripsis = Skripsi::all(); //menampilkan semua data pada tabel skripsi

        return view('welcome', compact('admins','users', 'skripsis'));
    }
}
