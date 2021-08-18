@extends('admin/layouts/mainlayout')
@section('content')

<div class="content-wrapper">

    <section class="content">


        <div style="margin-top: 1rem;" class="container-fluid">
            <div class="row">
                <a style="margin-bottom: 20px;" href="enterPartyData"> <button class="btn btn-primary">Insert Party</button> </a>
            </div>

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Parties Data Show Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Party Code</th>
                                <th>Party Name</th>
                                <th>CNIC</th>
                                <th>NTN</th>
                                <th>Sales Tax</th>

                                <th>Address</th>
                                <th>City</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody id="companydata">
                            @foreach($parties as $party)
                            <tr>
                                <td> {{$party->PartyCode}}</td>
                                <td>{{$party->PartyName}}</td>
                                <td> {{$party->CNIC}}</td>
                                <td>{{$party->NTN}}</td>
                                <td> {{$party->SalesTex}}</td>

                                <td> {{$party->Adress}}</td>
                                <td>{{$party->City}}</td>
                                <td><a href='edit_partydata/{{$party->PartyCode}}' class="btn btn-success">Edit</a> </td>
                                <td><a href='delete_partydata/{{$party->PartyCode}}' class="btn btn-danger">Delete</a> </td>

                            </tr>
                            @endforeach
                        </tbody>


                    </table>
                    {{$parties->links()}}
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

<script>
    //     fetch('show_companydata')
    //   .then(response => response.json())
    //   .then(data => {
    //   let output = '';
    //   data.forEach(el=>{
    //     output += `
    //                            <tr>

    //                                <td> ${el.PartyCode}</td>
    //                                <td>${el.PartyName}</td>
    //                                <td> ${el.CNIC}</td>
    //                                <td>${el.NTN}</td>
    //                                <td> ${el.SalesTex}</td>
    //                                <td>${el.Cell}</td>
    //                                <td> ${el.Adress}</td>
    //                                <td>${el.City}</td>
    //                                <td><a href='edit_partydata/${el.PartyCode}' class="btn btn-success">Edit</a> </td>
    //                                <td><a href='delete_partydata/${el.PartyCode}' class="btn btn-danger">Delete</a> </td>
    //                            </tr>
    //     `;
    //   });
    //   document.getElementById('companydata').innerHTML = output;
    // });
</script>



@endsection