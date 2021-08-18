@extends('admin/layouts/mainlayout')
@section('content')

<div class="content-wrapper">

    <section class="content">
        <div style="margin-top: 1rem;" class="container-fluid">
        
        <div class="row">
                <a style="margin-bottom: 20px;" href="enterCityData"> <button class="btn btn-primary">Insert City</button> </a>
            </div>


            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">City Data Show Table</h3>
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
                           
                        @foreach($cities as $city)
                        <tr>
                              
                               <td>{{$city->CityName}}</td>
                               <td><a href='edit_citydata/{{$city->CityName}}' class="btn btn-success">Edit</a> </td>
                               <td><a href='delete_citydata/{{$city->CityName}}' class="btn btn-danger">Delete</a> </td>
                           </tr>
                           @endforeach
            
                        </tbody>
                       
                    </table>
                    {{$cities->links()}}
                    <style>
                        .w-5 {
                            display: none;
                        }
                    </style>
                </div>
                <!-- /.card-body -->
            </div>



        </div>
</div>
</section>


@endsection