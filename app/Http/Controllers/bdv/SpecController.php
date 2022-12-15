<?php

namespace App\Http\Controllers\bdv;

use App\Http\Controllers\Controller;
use App\Models\bdv\SpecModel;
use Illuminate\Http\Request;

class SpecController extends Controller
{
    //

    public function index(){

        $data = SpecModel::all();

        return view('backend.bdv.spec',compact('data'));
    }

    public function detail($id){

        $data = SpecModel::select('*')
                    ->where('id',$id)
                    ->first();
        return view('backend.bdv.spec_detail', compact('data'));
    }

    public function store(Request $request){
        //  dd($request->all());
        $request->validate([
            'name' => 'required',  
            'category' => 'required',         
            'price_idr' => 'required',  
            'price_sgd' => 'required',  
            'status' => 'required', 
            
        ]);

        if($request->has('image')){
            foreach($request->file('image') as $image){
                $image->storeAs('public/bdv/spec', $image->hashName());
                $name = $image->hashName();
                $data_img[] = $name; 

            }
        }

        if($request->has('property')){
            foreach($request->input('property') as $data){
                $data_property[] = $data; 
            }
        }

        if($request->has('amneties')){
            foreach($request->input('amneties') as $data){
                $data_amneties[] = $data; 
            }
        }

        $gmo = SpecModel::updateOrCreate(
            ['id' => $request->id],
            [
            'name' => $request->input('name'),
            'occupied' => $request->input('status'),
            'price_sgd' => $request->input('price_sgd'),
            'amenities' => json_encode($data_amneties),
            'category' => $request->input('category'),
            'price_idk' => $request->input('price_idr'),
            'property' => json_encode($data_property),
            'description' => $request->input('description'),
            'image' => json_encode($data_img)
            ] 
        );

        //  dd($gmo);
        return back()->with('success', 'File successfully added.');
        
    }

    public function destroy($id){
        SpecModel::find($id)->delete($id);
            return back()->with('success', 'Product was deleted');
    }
}
