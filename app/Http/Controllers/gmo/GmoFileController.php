<?php

namespace App\Http\Controllers\gmo;

use App\Http\Controllers\Controller;
use App\Models\gmo\GmoCategoryModel;
use App\Models\gmo\GmoFileModel;
use App\Models\gmo\GmoSubCategoryModel;
use Illuminate\Http\Request;

class GmoFileController extends Controller
{
    //

    public function index(){


        $gmo_kategori = GmoCategoryModel::all();
        $list = GmoFileModel::select(['gmo_file.*',
                                'gmo_category.name as category','gmo_sub_category.name as subcategory' 
                            ])
                            ->join('gmo_category', 'gmo_file.id_category', '=', 'gmo_category.id')
                            ->join('gmo_sub_category', 'gmo_file.id_sub_category', '=', 'gmo_sub_category.id')
                            ->get();
        return view('backend.gmo.index', compact('gmo_kategori', 'list'));
    }

    public function getSubCategory($param){
        $sc = GmoSubCategoryModel::where("id_category",$param)->pluck('id','name');
        return response()->json($sc);
    }
}
