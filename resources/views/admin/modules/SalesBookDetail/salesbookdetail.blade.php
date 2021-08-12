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
                            <h3 class="card-title">Sales Book Detail Data</h3>
                        </div>
                        <form method="post" action="save_partydata">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Enter Item Name</label>
                                            <input type="text" name="ItemName" required class="form-control" placeholder="Enter Item Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Enter Rate</label>
                                            <input type="text" name="Rate" required class="form-control" placeholder="Enter Rate">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Enter Category</label>
                                            <input type="text" name="Category" required class="form-control" placeholder="Enter Category">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Enter Quantity</label>
                                            <input type="text" name="Quantity" required class="form-control" placeholder="Enter Quantity">
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


            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Parties Data Show Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Party Code</th>
                                <th>Party Name</th>
                                <th>CNIC</th>
                                <th>NTN</th>
                                <th>Sales Tax</th>
                                <th>Cell</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id="companydata">
                           
                        
            
                        </tbody>
                       
                    </table>
                </div>
                <!-- /.card-body -->
            </div>



        </div>
</div>
</section>
<script>
    fetch('show_companydata')
  .then(response => response.json())
  .then(data => {
  let output = '';
  data.forEach(el=>{
    output += `
                           <tr>
                               
                               <td> ${el.PartyCode}</td>
                               <td>${el.PartyName}</td>
                               <td> ${el.CNIC}</td>
                               <td>${el.NTN}</td>
                               <td> ${el.SalesTex}</td>
                               <td>${el.Cell}</td>
                               <td> ${el.Adress}</td>
                               <td>${el.City}</td>
                               <td><a href='edit_companydata/${el.PartyCode}' class="btn btn-success">Edit</a> </td>
                               <td><a href='delete_companydata/${el.PartyCode}' class="btn btn-danger">Delete</a> </td>
                           </tr>
    `;
  });
  document.getElementById('companydata').innerHTML = output;
});
</script>



@endsection