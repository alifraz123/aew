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
                            <h3 class="card-title">Cities Data</h3>
                        </div>
                        <form method="post" action="save_citydata">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Enter City</label>
                                            <input type="text" name="CityName" required class="form-control" placeholder="Enter City">
                                        </div>
                                    </div>
                                    
                                    
                                
                                </div>
                                <button style="float:right; margin-right:31rem; margin-top: -55px;" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="card-footer">
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Company Data Show Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table  class="table table-bordered table-striped">
                        <thead>
                            <tr>
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
    fetch('show_citydata')
  .then(response => response.json())
  .then(data => {
  let output = '';
  data.forEach(el=>{
    output += `
                           <tr>
                              
                               <td>${el.CityName}</td>
                               <td><a href='edit_citydata/${el.CityName}' class="btn btn-success">Edit</a> </td>
                               <td><a href='delete_citydata/${el.CityName}' class="btn btn-danger">Delete</a> </td>
                           </tr>
    `;
  });
  document.getElementById('companydata').innerHTML = output;
});
</script>



@endsection