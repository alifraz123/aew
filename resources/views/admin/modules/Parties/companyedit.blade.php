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
                            <h3 class="card-title">Edit Company Data</h3>
                        </div>
                        
                      
                        <form method="post" action="../edit_companydata">
                            @csrf
                            <input type="text" value="{{$data[0]->PartyCode}}" name="id">
                            <div class="card-body">
                            <div class="row">
                                    <div class="col-sm-5">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Enter Party Code</label>
                                            <input type="text" name="PartyCode" value="{{$data[0]->PartyCode}}" required class="form-control" placeholder="Enter Party Code">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Enter Party Name</label>
                                            <input type="text" name="PartyName" value="{{$data[0]->PartyName}}" required class="form-control" placeholder="Enter Party Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Enter CNIC</label>
                                            <input type="text" name="CNIC" value="{{$data[0]->CNIC}}" required class="form-control" placeholder="Enter CNIC">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Enter NTN</label>
                                            <input type="text" name="NTN" value="{{$data[0]->NTN}}" required class="form-control" placeholder="Enter NTN">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Enter Sales Tax</label>
                                            <input type="text" name="SalesTex" value="{{$data[0]->SalesTex}}" required class="form-control" placeholder="Enter Company Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Enter Cell</label>
                                            <input type="text" name="Cell" value="{{$data[0]->Cell}}" required class="form-control" placeholder="Enter Sales Tax">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Enter Address</label>
                                            <input type="text" name="Adress" value="{{$data[0]->Adress}}" required class="form-control" placeholder="Enter Address">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Enter City</label>
                                            <input type="text" name="City" value="{{$data[0]->City}}" required class="form-control" placeholder="Enter City">
                                        </div>
                                    </div>
                                </div>
                                <button style="float:right; margin-right:80px; margin-top: -55px;" type="submit" class="btn btn-primary">Update</button>
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