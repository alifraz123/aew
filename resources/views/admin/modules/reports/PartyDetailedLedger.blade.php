@extends('admin/layouts/reportlayout')
@section('content')
<input type="hidden" id="hidden_debit">
<input type="hidden" id="hidden_credit">
<div class="container">
    <section style="margin-top: 40px;" class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        ABDUL WAHAB ENGINEERING WORKS
                    </div>
                    <div style="text-align: center;" class="col-md-4">
                        <h2 id="partyORcomplete">Party Detailed Ledger</h2>
                        <p>Date : From <span style="font-weight: bold;" id="fromDate"></span>
                            To : <span style="font-weight: bold;" id="toDate"></span></p>
                    </div>
                    <div style="text-align: right;" class="col-md-4">
                        <button class="btn btn-primary" onclick="printfun()">Print</button>
                    </div>

                </div>
                <hr>

                <div class="row">
                    <div class="col-md-4">
                        <p><span>Party Code: </span> <span id="partycode"></span></p>
                        <p><span>Party Name :</span> <span id="partyname"></span></p>
                    </div>
                    <div style="text-align: center;" class="col-md-4">
                        <p><span>City: </span> <span id="city"></span></p>
                        <p><span>Address :</span> <span id="address"></span></p>
                    </div>
                    <div class="col-md-4">

                    </div>

                </div>

                <table id="table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Ref</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Date</th>
                            <th scope="col">Rent</th>
                            <th scope="col">Total</th>
                            <th scope="col">Net Sale</th>
                            <th scope="col">Cash</th>
                            <th scope="col">Sender</th>
                            <th scope="col">Reciever</th>
                            <th scope="col">BuiltyNo</th>
                            <th scope="col">Remarks</th>
                            <th scope="col">Balance</th>

                        </tr>
                    </thead>
                    <tbody id="table_body">

                    </tbody>
                </table>

               <div id="table_body2">

               </div>

            </div>
        </div>
    </section>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    var url = new URL(window.location.href);
    var PartyName = url.searchParams.get('PartyName');
    var startDate = url.searchParams.get('startDate');
    var endDate = url.searchParams.get('endDate');
    document.getElementById('fromDate').innerHTML = startDate;
    document.getElementById('toDate').innerHTML = endDate;
    document.getElementById('partyname').innerHTML = PartyName;


    var token = '{{csrf_token()}}';
    $.ajax({
        type: "post",
        url: "getPartyNameForReport",
        data: {
            PartyName: PartyName,
            _token: token
        },
        dataType: "json",
        success: function(data) {
            console.log(data);
            document.getElementById('partycode').innerHTML = data[0].PartyCode;
            document.getElementById('city').innerHTML = data[0].City;
            document.getElementById('address').innerHTML = data[0].Adress;

        },
        error: function(req, status, error) {
            console.log(error);
        }
    });

    var token = '{{csrf_token()}}';
    $.ajax({
        type: "post",
        url: "getPartyLedger",
        data: {
            PartyName: PartyName,
            startDate: startDate,
            endDate: endDate,
            _token: token
        },
        dataType: "json",
        success: function(data) {
            if (data) {
                getDebitAndCredit();

                let output = '';
                data.forEach(el => {
                    output += `
                                    <tr>
                                        <td>${el.Ref}</td>
                                        <td>${el.invoice}</td>
                                        <td>${el.Date}</td>
                                        <td>${el.Rent}</td>
                                        <td>${el.Total}</td>
                                        <td>${el.Rent+el.Total}</td>
                                        <td>${el.Cash}</td>
                                        <td>${el.Sender}</td>
                                        <td>${el.Reciever}</td>
                                        <td>${el.BuiltyNo}</td>
                                        <td>${el.Remarks}</td>
                                        <td>${el.Balance}</td>
                                        </tr>

                                    `;

                });


                if (output) {



                    document.getElementById('table_body').innerHTML = output;

                    // window.print();
                } else {
                    alert("Sorry not any data between these dates ");
                }

                setTimeout(function() {
                    var debit = document.getElementById('hidden_debit').value;
                    var credit = document.getElementById('hidden_credit').value
                    console.log(debit - credit);
                    var output = `
                                    <div style="text-align:right">
                                       
                                       
                                      <span style="font-weight:bold"> Debit : ${debit}</span> 
                                       <span style="font-weight:bold"> Credit :${credit}</span> 
                                       
                                        
                                       <span style="font-weight:bold">Your Balance Till Date is :</span> 
                                      <span style="font-weight:bold">${debit-credit}</span>  
                                        
                                        
                                        </div>
                                    `;
                    document.getElementById('table_body2').innerHTML = output;
                }, 1000);





            }





        },
        error: function(req, status, error) {
            console.log(error);
        }

    });

    function getDebitAndCredit(){
        var token = '{{csrf_token()}}';
                $.ajax({
                    type: "post",
                    url: "getDebitOfCurrentParty",
                    data: {
                        PartyName: PartyName,
                        _token: token
                    },
                    dataType: "text",
                    success: function(data) {
                        document.getElementById('hidden_debit').value = data;

                    },
                    error: function(req, status, error) {
                        console.log(error);
                    }
                });
                $.ajax({
                    type: "post",
                    url: "getCreditOfCurrentParty",
                    data: {
                        PartyName: PartyName,
                        _token: token
                    },
                    dataType: "text",
                    success: function(data) {
                        document.getElementById('hidden_credit').value = data;

                    },
                    error: function(req, status, error) {
                        console.log(error);
                    }
                });
    }
    function printfun(){
        window.print();
    }
</script>



@endsection