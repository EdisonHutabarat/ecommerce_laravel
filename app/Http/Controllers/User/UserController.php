<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Flashsale;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $flashsales = Flashsale::where(column: 'status', operator: true)-> get();
 
        return view('pages.user.index', compact('products','flashsales'));
    }

    public function detail_product($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.user.detail', compact('product'));
    }

    public function purchase($productId, $userId)
    {
        $product = Product::findOrFail($productId);
        $user = User::findOrFail($userId);

        if ($user->point >= $product->price) {
            $totalPoints = $user->point - $product->price;

            $user->update([
                'point' => $totalPoints,
            ]);

            Alert::success('Berhasil!', 'Produk berhasil dibeli!');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Point anda tidak cukup!');
            return redirect()->back();
        }

    }
    
    public function purchaseProduct($productId, $userId)
{
    // Logika pembelian produk atau Flash Sale
    $product = Product::find($productId);
    
    if (!$product) {
        return redirect()->back()->withErrors(['error' => 'Produk tidak ditemukan.']);
    }

    // Lanjutkan dengan logika pembelian (kurangi stok, tambahkan ke pembelian user, dll.)
    
    return redirect()->route('user.products')->with('success', 'Pembelian berhasil!');
}


}
