@extends('admin/layouts/reportlayout')
@section('content')

<div class="container">


    <section id="section" class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <h1>Sales Invoice Edit</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div id="cardStart" style="padding:20px" class="card card-outline card-info">

                    <div class="row">

                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Select Party Name :</label>
                                <select name="PartyName" id="PartyName" required class="form-control select2 select2bs4">
                                    <option disabled selected value="">Choose value...</option>
                                    @foreach($parties as $partydata)
                                    <option value="{{$partydata->PartyName}}"> {{$partydata->PartyName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div style="margin-top: 32px;" class="form-group">
                                <input onclick="getReport()" class="btn btn-primary" value="Send" type="button">
                                <!-- <button  class="btn btn-info">Open Invoices</button> -->
                            </div>

                        </div>
                        <!-- /.col-->
                    </div>


                </div>

                <div class="row">
                <div class="col-md-4">
                    D.C
                </div>
                <div class="col-md-4">
                    <p>Booker Wise Report(Asif(Swl)016)</p>
                    <p>Date : From this and To :()</p>
                </div>
                <div style="text-align: right;" class="col-md-4">
                    A.B
                </div>

            </div>

            <table id="table" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody id="table_body">


                </tbody>
            </table>
            </div>

            


        </div>
    </section>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


</div>
</div>
</div>

</div>

<script>
    function getReport() {

        var token = '{{csrf_token()}}';
        $.ajax({
            type: "post",
            url: "getPartyWiseReport",
            data: {
                PartyName: document.getElementById('PartyName').value,
                _token: token
            },
            dataType: "json",
            success: function(data) {

                if (data) {
                    document.getElementById('cardStart').style = "display:none";
                    document.getElementById('section').style = "display:none";
                    data.forEach(el => {
                        let output = '';
                        output += `
                                    <tr>
                                        <td>${el.PartyName}</td>
                                        <td>${el.PartyName}</td>
                                        <td>${el.PartyName}</td>
                                        <td>${el.PartyName}</td>
                                        </tr>
                                    `;
                        document.getElementById('table_body').innerHTML = output;
                        if(output){
                            window.print();
                        }
                    });

                }

            },
            error: function(req, status, error) {
                console.log(error);
            }
        });

        
    }
</script>



@endsection