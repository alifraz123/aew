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
                        <h2 id="partyORcomplete">Complete Report</h2>
                        <p>Date : From <span style="font-weight: bold;" id="fromDate"></span>
                            To : <span style="font-weight: bold;" id="toDate"></span></p>
                    </div>
                    <div style="text-align: right;" class="col-md-4">
                        <button class="btn btn-primary" onclick="printfun()">Print</button>
                    </div>

                </div>
                <hr>

              

                <table id="table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Ref</th>
                            <th scope="col">PartyName</th>
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
    

    var token = '{{csrf_token()}}';
    $.ajax({
        type: "post",
        url: "getCompleteReport",
        data: {
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
                    var sum = parseInt(el.Rent)+parseInt(el.Total) ;
                    output += `
                                    <tr>
                                        <td>${el.Ref}</td>
                                        <td>${el.PartyName}</td>
                                        <td>${el.invoice}</td>
                                        <td>${el.Date}</td>
                                        <td>${el.Rent}</td>
                                        <td>${el.Total}</td>
                                        <td>${sum}</td>
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
                    url: "getDebit",
                    data: {
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
                    url: "getCredit",
                    data: {
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