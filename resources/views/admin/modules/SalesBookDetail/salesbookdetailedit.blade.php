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
                            <h3 class="card-title">Edit Sales Book Detail Data</h3>
                        </div>
                      
                        <form method="post" action="../edit_companydata">
                            @csrf
                            <input type="text" value="{{$data[0]->CompanyName}}" name="id">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Enter Company Name</label>
                                            <input type="text" name="CompanyName" value="{{$data[0]->CompanyName}}" required class="form-control" placeholder="Enter Company Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Enter Company Code</label>
                                            <input type="text" name="CompanyCode" value="{{$data[0]->CompanyCode}}" required class="form-control" placeholder="Enter Company Code">
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