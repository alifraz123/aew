<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class SavePartydataController extends Controller
{
    public function save_partydata_method(Request $party){
       $data =  DB::insert("insert into parties(PartyCode,PartyName,CNIC,NTN,SalesTex,Cell,Adress,City)
        values(?,?,?,?,?,?,?,?)",[$party->PartyCode,$party->PartyName,$party->CNIC,$party->NTN,$party->SalesTex,$party->Cell,$party->Adress,$party->City]);
        if($data){
            return redirect('/parties');
        }

    }

    public function sendMultipleData_method(Request $request){
        $ab = DB::table('salebook')->get();
        $invoice_r = 1;
        $final_total = $request->FinalTotal;
        if($ab->count()!=0){
            $invoice_id = DB::table('salebook')->latest('invoice')->first();
            $invoice = $invoice_id->invoice+1; 
    }
    else
    {
        $invoice = $invoice_r;
    }

    $data =  DB::insert("insert into salebook(Ref,invoice,Date,City,BuiltyNo,Sender,Reciever,Total
        ,Rent,FinalTotal,Balance,Debit,Username,PartyName,Remarks)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",["sb",$invoice,$request->Date,$request->City,$request->BuiltyNo,$request->Sender,$request->Reciever
        ,$request->Total,$request->Rent,$final_total,$request->Balance,$final_total,Auth::user()->name,$request->PartyName
        ,$request->Remarks]);


        $abc = [];
        foreach($request->obj as $key => $value){
            $abc=[
                'invoice' =>$invoice,
                'ItemName' =>$request->obj[$key]['ItemName'],
                'Rate' =>$request->obj[$key]['Rate'],
                'Category' =>$request->obj[$key]['Category'],
                'Quantity' =>$request->obj[$key]['Quantity'],
                'Total' =>$request->obj[$key]['Total']

            ]; 
            DB::table('salebook_detail')->insert($abc);
        }
}

public function getBalanceOfCurrentParty_method(Request $request){
    $debit = DB::table('salebook')->where('PartyName',$request->PartyName)->get('Debit');
    $aa = 0;
    $bb = 0;
    for($a = 0; $a<count($debit); $a++){
        $aa = $aa + $debit[$a]->Debit;
    }
    $credit = DB::table('salebook')->where('PartyName',$request->PartyName)->get('Credit');
    for($b = 0; $b<count($credit); $b++){
        $bb = $bb + $credit[$b]->Credit;
    }
    return  $aa-$bb;
}
    
    public function show_companydata_method(){
      return  $parties = DB::table('parties')->get();
       
    }
    public function delete_companydata_method($id){
        DB::table('parties')
            ->where('PartyCode', $id)
            ->delete();
            return redirect('/parties');
    }
    public function edit_companydata_method($id){
       $editdata =  DB::table('parties')
        ->where('PartyCode', $id)
        ->get();
        // return $editdata;
        return view('/admin/modules/Parties/companyedit',['data'=>$editdata]);
    }
    public function update_companydata_method(Request $updatecompany){
        $data = DB::table('parties')
        ->where('PartyCode', $updatecompany->id)
        ->update([
            'PartyCode' => $updatecompany->PartyCode,
            'PartyName' => $updatecompany->PartyName,
            'CNIC' => $updatecompany->CNIC,
            'NTN' => $updatecompany->NTN,
            'SalesTex' => $updatecompany->SalesTex,
            'Cell' => $updatecompany->Cell,
            'Adress' => $updatecompany->Adress,
            'City' => $updatecompany->City,
        ]);
        // return $data;
        if($data){
            return redirect('/parties');
        }
    }
}
