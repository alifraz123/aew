@extends('admin/layouts/mainlayout')
@section('content')

<div class="content-wrapper">

    <section class="content">
        <div style="margin-top: 1rem;" class="container-fluid">
        
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                        <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title">Sales Book Data</h3>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="card-title">| &nbsp; Sales Book Detail Data</h3>
                                </div>
                            </div>
                        </div>
                        
                        <form method="post" action="../edit_salesbookdata">
                            @csrf
                            <input type="text" value="{{$data[0]->invoice}}" name="id">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Enter Salesbook Refference</label>
                                            <input type="text" name="Ref" value="{{$data[0]->Ref}}" required class="form-control" placeholder="Enter Salesbook Refference">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Enter Date</label>
                                            <input type="date" name="Date" value="{{$data[0]->Date}}" required class="form-control" placeholder="Enter Date">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Enter Item Name</label>
                                            <input type="text" name="ItemName"value="{{$salebook_detail[0]->ItemName}}" required class="form-control" placeholder="Enter Item Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Enter Rate</label>
                                            <input type="text" name="Rate" value="{{$salebook_detail[0]->Rate}}" required class="form-control" placeholder="Enter Rate">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Enter Builty No.</label>
                                            <input type="text" name="BuiltyNo" value="{{$data[0]->BuiltyNo}}" required class="form-control" placeholder="Enter Builty No.">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Enter Sender Name</label>
                                            <input type="text" name="Sender" value="{{$data[0]->Sender}}" required class="form-control" placeholder="Enter Sender Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Enter Category</label>
                                            <input type="text" name="Category" value="{{$salebook_detail[0]->Rate}}" required class="form-control" placeholder="Enter Category">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Enter Quantity</label>
                                            <input type="text" name="Quantity" value="{{$salebook_detail[0]->Rate}}" required class="form-control" placeholder="Enter Quantity">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Enter Reciever Name</label>
                                            <input type="text" name="Reciever" value="{{$data[0]->Reciever}}" required class="form-control" placeholder="Enter Reciever Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Enter Total Bill</label>
                                            <input type="text" name="Total" value="{{$data[0]->Total}}" required class="form-control" placeholder="Enter Total Bill">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Enter Rent</label>
                                            <input type="text" name="Rent" value="{{$data[0]->Rent}}" required class="form-control" placeholder="Enter Rent">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Enter Final Total</label>
                                            <input type="text" name="FinalTotal" value="{{$data[0]->FinalTotal}}" required class="form-control" placeholder="Enter Final Total">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Enter Rent</label>
                                            <input type="text" name="Rent" value="{{$data[0]->Rent}}" required class="form-control" placeholder="Enter Rent">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Enter Cash</label>
                                            <input type="text" name="Cash" value="{{$data[0]->Cash}}" required class="form-control" placeholder="Enter Cash">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Enter Debit</label>
                                            <input type="text" name="Debit" value="{{$data[0]->Debit}}" required class="form-control" placeholder="Enter Debit">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Enter Credit</label>
                                            <input type="text" name="Credit" value="{{$data[0]->Credit}}" required class="form-control" placeholder="Enter Credit">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Enter Balance</label>
                                            <input type="text" name="Balance" value="{{$data[0]->Balance}}" required class="form-control" placeholder="Enter Rent">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Enter Party Name</label>
                                            <input type="text" name="PartyName" value="{{$data[0]->PartyName}}" required class="form-control" placeholder="Enter Party Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Enter City</label>
                                            <input type="text" name="City" value="{{$data[0]->City}}" required class="form-control" placeholder="Enter City">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Enter Remarks</label>
                                            <textarea name="Remarks" id="Remarks" cols="30" rows="10" required class="form-control" placeholder="Enter Remarks">
                                            {{$data[0]->Remarks}}
                                            </textarea>
                                          
                                        </div>
                                    </div>
                                </div>
                                <button style="float:right; margin-right:80px; margin-top: -55px;" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="card-footer">
                            </div>
                        </form>
                    </div>
                </div>
            </div>


           



        </div>
</div>
</section>
@endsection