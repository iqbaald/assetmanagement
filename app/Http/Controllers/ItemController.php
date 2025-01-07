<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{

    public function index()
    {
        $items = Item::latest()->paginate(10);
        return view('dashboard', compact('items'));
    }

    public function showSearchPage()
    {
        $items = Item::latest()->paginate(10);
        return view('item.search', compact('items'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $items = Item::where('itemName', 'LIKE', "%{$query}%")->get();
        return view('item.search', compact('items'));
    }

    private function processProductName($name)
    {
        $words = explode(' ', $name);
        $firstTwoWords = array_slice($words, 0, 2);
        $processedName = implode('-', $firstTwoWords);
        return strtolower($processedName);
    }

    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();
        return view('item.add', compact('categories','locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'itemName' => 'required|string|max:255',
            'conditionPercentage' => 'required|integer|min:0|max:100',
            'purchaseDate' => 'required|date',
            'purchasePrice' => 'required|numeric|min:0',
            'categoryId' => 'required|integer',
            'locationId' => 'required|integer',
            'itemPhoto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $item = new Item();
        $item->itemName = $request->itemName;
        $item->conditionPercentage = $request->conditionPercentage;
        $item->purchaseDate = $request->purchaseDate;
        $item->purchasePrice = $request->purchasePrice;
        $item->categoryId = $request->categoryId;
        $item->locationId = $request->locationId;


        if ($request->hasFile('itemPhoto')) {
            $processedName = $this->processProductName($item->itemName);
            $image = $request->file('itemPhoto');
            $fileExtension = $image->getClientOriginalExtension();
            $fileName = $processedName . '-' . rand(100, 999) . '.' . $fileExtension;

            $location = public_path('img/items');
            $image->move($location, $fileName);

            $item->itemPhoto = $fileName;
        } else {
            $item->itemPhoto = 'placeholder.jpeg';
        }

        $item->save();

        return redirect()->route('item.index')->with('success', 'Data barang berhasil ditambahkan.');
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
        // dd($request->all());
        $request->validate([
            'itemName' => 'required|string|max:255',
            'conditionPercentage' => 'required|integer|min:0|max:100',
            'purchaseDate' => 'required|date',
            'purchasePrice' => 'required|numeric|min:0',
            'categoryId' => 'required|integer',
            'locationId' => 'required|integer',
            'itemPhoto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        
        if ($request->hasFile('itemPhoto')) {
            $processedName = $this->processProductName($request->itemName);
            $image = $request->file('itemPhoto');
            $fileExtension = $image->getClientOriginalExtension();
            $fileName = $processedName . '-' . rand(100, 999) . '.' . $fileExtension;

            $location = public_path('img/items');
            $image->move($location, $fileName);

            if ($request->itemPhoto && file_exists(public_path('img/items/' . $request->itemPhoto))) {
                unlink(public_path('img/items/' . $request->itemPhoto));
            }
        }

        $item = Item::findOrFail($id);


        $item->itemName = $request->itemName;
        $item->conditionPercentage = $request->conditionPercentage;
        $item->purchaseDate = $request->purchaseDate;
        $item->purchasePrice = $request->purchasePrice;
        $item->categoryId = $request->categoryId;
        $item->locationId = $request->locationId;
        $item->itemPhoto = $fileName;


        $item->save();

        return redirect()->route('item.index')->with('success', 'Data barang berhasil diperbarui.');
    }


    public function destroy(string $id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('item.index')->with('success','Data Barang Telah Berhasil Diubah.');
    }
}
