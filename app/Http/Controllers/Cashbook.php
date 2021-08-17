<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Cashbook extends Controller
{
    public function getPartyData_method(Request $request){
        return DB::table('parties')->where('PartyName',$request->PartyName)->first();

    }
    public function getBalanceOfCurrentParty_method(Request $request)
    {
        $debit = DB::table('salebook')->where('PartyName', $request->PartyName)->get('Debit');
        $aa = 0;
        $bb = 0;
        for ($a = 0; $a < count($debit); $a++) {
            $aa = $aa + $debit[$a]->Debit;
        }
        $credit = DB::table('salebook')->where('PartyName', $request->PartyName)->get('Credit');
        for ($b = 0; $b < count($credit); $b++) {
            $bb = $bb + $credit[$b]->Credit;
        }
        return  $bb - $aa;
    }
    public function sendCashbookData_method(Request $request){
        $data =  DB::insert("insert into salebook(Ref,Date,City,BuiltyNo,Sender,Reciever,Total
        ,Rent,FinalTotal,Balance,Cash,Debit,Credit,Username,PartyName,Remarks)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", [
            "cb", $request->Date, "0", "0", "0", "0", "0", "0", "0", $request->Balance,$request->Cash, "0",$request->Cash, Auth::user()->name, $request->PartyName, $request->Remarks
        ]);
    }
    public function updateCashbookData_method(Request $request){
        $update = DB::table('salebook')->where('invoice',$request->invoice)->update([
            'Cash'=>$request->Cash,
            'Credit'=>$request->Cash,
            'Remarks'=>$request->Remarks
        ]);
       
    }
   
}
