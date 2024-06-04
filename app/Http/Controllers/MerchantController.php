<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\Profil_merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantController extends Controller
{
    function index(){
        return view('/merchant/merchant');
    }

    function profil(){
        $profil = Profil_merchant::all();
       
        return view('merchant.profil',compact(['profil']));
    }


    public function edit($id){
        
        $profil = Profil_merchant::find($id);
        
        return view('merchant.editProfil',compact(['profil']));
    } 
    function updateProfil($id,Request $request){
        $profil = Profil_merchant::find($id);
        $profil->update($request->except(['_token','submit']));
        return redirect('/profil');
    }  
    function deleteProfil(){
        return view('merchant.addProfil');
    } 
    
    function createMakanan(){
        return view('merchant.addMakanan');
    }
    function addMakanan(Request $request ){
        $request->validate(['image'=> 'required']);

        $imageName = time() . '.'  .$request->image->extension();

        $request->image->storeAs('public/images', $imageName);

        Makanan::create([
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'foto' => 'storage/images/' . $imageName,
            'harga'=> $request->harga,
            'jenis_makanan'=> $request->jenis_makanan,
        ]);
        $infomakanan = [
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'foto' => 'storage/images/' . $imageName,
            'harga'=> $request->harga,
            'jenis_makanan'=> $request->jenis_makanan,
        ];

        if (Auth::attempt($infomakanan)) {
            return redirect('/merchant');
        } else {
            return redirect('/makanan/create')->withErrors('Failed to add data')->withInput();
        }

        
    } 
    function updateMenu(){
        return view('merchant.addProfil');
    }
    function deleteMenu(){
        return view('merchant.addProfil');
    }
    function invoice(){
        return view('merchant.addProfil');
    }



    


}
