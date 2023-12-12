<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reagen;

class ManagementStockController extends Controller
{
    public function index(){
        $data = Reagen::all();

        return view('management-stock.management-stock', ['data' => $data]);
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

}
