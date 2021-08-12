<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SavecitydataController extends Controller
{
    public function save_citydata_method(Request $party){
        $data =  DB::insert("insert into cities(CityName) values(?)",[$party->CityName]);
         if($data){
             return redirect('/cities');
         }
 
     }
     public function show_companydata_method(){
       return  $parties = DB::table('cities')->get();
        
     }
     public function delete_companydata_method($id){
         DB::table('cities')
             ->where('CityName', $id)
             ->delete();
             return redirect('/cities');
     }
     public function edit_companydata_method($id){
        $editdata =  DB::table('cities')
         ->where('CityName', $id)
         ->get();
        //  return $editdata;
         return view('/admin/modules/Cities/cityedit',['data'=>$editdata]);
     }
     public function update_companydata_method(Request $updatecompany){
         $data = DB::table('cities')
         ->where('CityName', $updatecompany->id)
         ->update([
             'CityName' => $updatecompany->CityName
         ]);
         // return $data;
         if($data){
             return redirect('/cities');
         }
     }
}
