<?php

namespace App\Http\Controllers;
use App\Models\Reagen;

use Illuminate\Http\Request;

class LogbookController extends Controller
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
    
        return view('logbook.logbook', compact('reagens'));
    }
    
}
