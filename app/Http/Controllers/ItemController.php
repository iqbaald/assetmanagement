<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index()
    {
        $items = Item::latest()->paginate(10);
        return view('dashboard', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'itemName' => 'required|string|max:255',
            'itemPhoto' => 'nullable|string|mimes:jpeg,png,jpg,gif|max:2048',
            'conditionPercentage' => 'required|integer|min:max:100',
            'purchaseDate' => 'required|date',
            'purchasePrice' => 'required|numeric',
            'categoryId' => 'required|exists:category,categoryId',
            'locationId' => 'required|exists:category,locationId',
        ]);

        if ($request->hasFile('itemPhoto')) {
            $file = $request->file('itemPhoto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img'), $filename);
        }
        Item::create([
            'itemName' => $request->itemName,
            'itemPhoto' => $filename,
            'conditionPercentage' => $request->conditionPercentage,
            'purchaseDate' => $request->purchaseDate,
            'purchasePrice' => $request->purchasePrice,
            'categoryId' => $request->categoryId,
            'locationId' => $request->locationId,
        ]);
        return redirect()->route('item.index')->with('success', 'Data Barang Telah Berhasil Ditambahkan.');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all();
        $locations = Location::all();

         // Menghitung harga jual
         $harga_beli = $item->purchasePrice; // Ambil harga beli dari item
         $kondisi = $item->conditionPercentage; // Ambil kondisi dari item
 
         // Menghitung faktor berdasarkan tanggal beli
         $tanggal_beli = Carbon::parse($item->purchaseDate);
         $now = Carbon::now();
         $selisih_hari = $now->diffInDays($tanggal_beli);
 
         // Misalkan kita mengurangi 1% untuk setiap 30 hari
         $faktor = 1 - ($selisih_hari / 30) * 0.01; // Mengurangi 1% untuk setiap 30 hari
         $faktor = max($faktor, 0.5); // Pastikan faktor tidak kurang dari 0.5
 
         // Menghitung harga jual
         $sellingPriceUnformated = $harga_beli * ($kondisi / 100) * $faktor;

         $sellingPrice = number_format($sellingPriceUnformated, 0, ',', '.');

        return view('item.edit', compact('item', 'categories', 'locations', 'sellingPrice'));
    }

    public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'itemName' => 'required|string|max:255',
        'foto_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'conditionPercentage' => 'required|integer|min:0|max:100',
        'purchaseDate' => 'required|date',
        'purchasePrice' => 'required|numeric',
        'categoryId' => 'required|exists:category,categoryId',
        'locationId' => 'required|exists:location,locationId',
    ]);

    // Mencari item berdasarkan ID
    $item = Item::findOrFail($id);

    // Memproses upload foto jika ada
    if ($request->hasFile('foto_barang')) {
        // Hapus foto lama jika ada
        if ($item->itemPhoto) {
            $oldPhotoPath = public_path('assets/img/' . $item->itemPhoto);
            if (file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath); // Menghapus file lama
            }
        }

        // Menyimpan foto baru
        $file = $request->file('foto_barang');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/img'), $filename); // Simpan di folder public/assets/img
        $item->itemPhoto = $filename; // Update nama file di item
    }

    // Update item dengan atribut yang relevan
    $item->update([
        'itemName' => $request->itemName,
        'conditionPercentage' => $request->conditionPercentage,
        'purchaseDate' => $request->purchaseDate,
        'purchasePrice' => $request->purchasePrice,
        'categoryId' => $request->categoryId,
        'locationId' => $request->locationId,
    ]);

    return redirect()->route('item.index')->with('success', 'Item updated successfully.');
}

    public function destroy(string $id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('item.index')->with('success','Data Barang Telah Berhasil Diubah.');
    }
}
