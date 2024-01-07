<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reagen;
use App\Models\StockReagen;

class ManagementStockController extends Controller
{
    public function index(Request $request){
        $keyword = $request->input('keyword');
    
        // Query data Reagen dengan menggunakan Eloquent
        $query = Reagen::withCount(['stockReagen as totalStock' => function ($query) {
            $query->select(\DB::raw("SUM(quantity)"));
        }]);
    
        // Jika ada kata kunci pencarian, tambahkan kondisi pencarian
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('noCatalog', 'LIKE', '%' . $keyword . '%')
                  ->orWhere('nameReagen', 'LIKE', '%' . $keyword . '%')
                  ->orWhere('merk', 'LIKE', '%' . $keyword . '%');
            });
        }
    
        // Ambil data sesuai dengan hasil query
        $reagens = $query->get();
    
        return view('management-stock.management-stock', compact('reagens'));
    }

    public function addReagen(){
        return view('management-stock.add-reagen');
    }

    public function addReagenStore(Request $request){
        // Validasi jika diperlukan
        $validatedData = $request->validate([
            'noCatalog' => 'required',
            'nameReagen' => 'required',
            'merk' => 'required',
            'packSize' => 'required',
            'hazardOptions' => 'required|array',
            'msds' => 'required',
            'price' => 'required'
            // tambahkan validasi lainnya jika diperlukan
        ]);

        // konversi array menjadi string
        $validatedData['hazardOptions'] = implode(',', $validatedData['hazardOptions']);
        Reagen::create($validatedData);
    }

    // view data reagen
    public function viewReagen($noCatalog)
    {
        $data = Reagen::find($noCatalog);
        $hazardOptions = explode(',', $data->hazardOptions);
        return view('management-stock.view-reagen', compact('data', 'hazardOptions'));
    }

    // edit data reagen
    public function editReagen($noCatalog)
    {
        $data = Reagen::find($noCatalog);
        $hazardOptions = explode(',', $data->hazardOptions);
        return view('management-stock.edit-reagen', compact('data', 'hazardOptions'));
    }
    
    // delete data reagen
    public function deleteReagen($noCatalog)
    {
        $data = Reagen::find($noCatalog);
        $data->delete();
        return redirect()->route('management-stock');
    }

    // update data reagen
    public function updateReagen(Request $request, $noCatalog)
    {
        // Ambil data reagen berdasarkan nomor katalog
        $data = Reagen::find($noCatalog);

        // Validasi input
        $validatedData = $request->validate([
            'noCatalog' => 'required',
            'nameReagen' => 'required',
            'merk' => 'required',
            'packSize' => 'required',
            'hazardOptions' => 'required|array',
            'msds' => 'required',
            'price' => 'required'
            // Tambahkan validasi lainnya jika diperlukan
        ]);

        // Konversi array menjadi string
        $validatedData['hazardOptions'] = implode(',', $validatedData['hazardOptions']);

        // Perbarui data reagen
        $data->update($validatedData);

        return redirect()->route('data.view', ['noCatalog' => $data->noCatalog]);
    }

    // add stock reagen
    public function addStockReagen(){
        $reagens = Reagen::all(['noCatalog', 'nameReagen']);
        return view('management-stock.add-stock-reagen', compact('reagens'));
    }

    public function getReagenData($noCatalog)
    {
        $reagen = Reagen::where('noCatalog', $noCatalog)->first();
        return response()->json($reagen);
    }

    public function addStock(Request $request)
    {
        // Validasi input data
        $validatedDataStock = $request->validate([
            'noCatalog' => 'required',
            'batch' => 'required',
            'quantity' => 'required|numeric', // Pastikan 'quantity' adalah angka
            'expiredDate' => 'required|date', // Validasi sebagai tanggal
            'note' => 'nullable'
        ]);

        StockReagen::create($validatedDataStock);
    }

}
