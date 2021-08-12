@extends('admin/layouts/mainlayout')
@section('content')

<div class="content-wrapper">

    <section class="content">
        <div style="margin-top: 1rem;" class="container-fluid">

            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5">

                            <div class="card card-dark">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3 class="card-title">Sales Book Data</h3>
                                        </div>
                                    </div>
                                </div>
                                <form method="post" action="save_salesbookdata">
                                    @csrf
                                    <div style="line-height: 00.5;
    padding-top: 10.2px;" class="card-body">
                                        <div class="row">

                                            <input type="hidden" id="invoice" name="invoice" value="">


                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Enter Date</label>
                                                    <input type="text" name="Date" value="{{$salebook->Date}}" disabled id="Date" required class="form-control" placeholder="Enter Date">
                                                </div>
                                            </div>
                                           
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Enter City</label>
                                                    <select name="City"  id="City" required class="form-control select2 select2bs4">
                                                        <option  selected value="{{$salebook->City}}">{{$salebook->City}}</option>
                                                        @foreach($cities as $partydata)

                                                        <option value="{{$partydata->CityName}}"> {{$partydata->CityName}}</option>
                                                        @endforeach

                                                    </select>



                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Enter Party Name</label>
                                                    <select name="PartyName" onchange="getBalance_on_partyname_change(this)" id="PartyName" required class="form-control select2 select2bs4" placeholder="Enter Party Name">
                                                        <option  selected value="{{$salebook->PartyName}}">{{$salebook->PartyName}}</option>
                                                        @foreach($parties as $partydata)
                                                        <option value="{{$partydata->PartyName}}"> {{$partydata->PartyName}}</option>
                                                        @endforeach

                                                    </select>

                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Enter Sender Name</label>
                                                    <input type="text" id="Sender" value="{{$salebook->Sender}}" name="Sender" required class="form-control" placeholder="Enter Sender Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Enter Reciever Name</label>
                                                    <input type="text" id="Reciever" value="{{$salebook->Reciever}}" name="Reciever" required class="form-control" placeholder="Enter Reciever Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Total Bill</label>
                                                    <input type="text" value="{{$salebook->Total}}" disabled name="Total" id="Total" required class="form-control" placeholder="Enter Total Bill">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Enter Rent</label>
                                                    <input type="text" value="{{$salebook->Rent}}" oninput="add_total_and_rent()" name="Rent" id="Rent" required class="form-control" placeholder="Enter Rent">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Final Total</label>
                                                    <input type="text" value="{{$salebook->FinalTotal}}" disabled name="FinalTotal" id="FinalTotal" required class="form-control" placeholder="Enter Final Total">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Balance</label>
                                                    <input type="text" value="{{$salebook->Balance}}" id="Balance" disabled name="Balance" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Enter Builty No.</label>
                                                    <input type="text" value="{{$salebook->BuiltyNo}}" id="BuiltyNo" name="BuiltyNo" required class="form-control" placeholder="Enter Builty No.">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Enter Remarks</label>
                                                    <textarea name="Remarks" id="Remarks" style="width: 100%;" rows="5" required class="form-control" placeholder="Enter Remarks">
                                                    {{$salebook->Remarks}}
                                            </textarea>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </form>
                            </div>


                        </div>
                        <div class="col-md-7">

                            <div class="card card-dark">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3 class="card-title">Sales Book Detail Data</h3>
                                        </div>

                                    </div>


                                </div>
                                <!-- Add Product Detail -->
                                <div style="padding: 12px;line-height: 0.5;" class="card-body">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Enter Item Name</label>
                                                <select onchange="getSelectedProductData(this.id)" required name="ItemName[]" id="ItemName" class="form-control select2 select2bs4">
                                                    <option disabled selected value="">Choose value</option>
                                                    @foreach($items as $item)

                                                    <option value="{{$item->ItemName}}"> {{$item->ItemName}}</option>
                                                    @endforeach

                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Enter Rate</label>
                                                <input type="text" name="Rate[]" id="Rate" required class="form-control" placeholder="Enter Rate">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Enter Quantity</label>
                                                <input type="text" oninput="countTotalWithQuantity()" name="Quantity[]" id="Quantity" required class="form-control" placeholder="Enter Quantity">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bb">
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Enter Category</label>
                                                <input type="text" name="Category[]" id="Category" required class="form-control" placeholder="Enter Category">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Product Total</label>
                                                <input type="text" name="productTotal[]" id="productTotal" required class="form-control" placeholder="Product Total">
                                            </div>
                                        </div>

                                        <div style="padding-top: 16px;" class="col-sm-4">

                                            <button style="width: 100%;" class="btn btn-primary addRow">ADD PRODUCT +</button>
                                        </div>
                                        <button onclick="sendMultipleData()" class="form-control btn btn-primary">Send Data</button>
                                    </div>
                                    <table class="table">
                                        <thead id="hide_by_default">
                                            <tr>
                                                <td>ItemName</td>
                                                <td>Rate</td>
                                                <td>Category</td>
                                                <td>Quantity</td>
                                                <td>P Total</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

                            <script>
                                $('.addRow').on('click', function() {
                                    var ItemName = document.getElementById('ItemName').value;
                                    var Rate = document.getElementById('Rate').value;
                                    var Category = document.getElementById('Category').value;
                                    var Quantity = document.getElementById('Quantity').value;
                                    var productTotal = document.getElementById('productTotal').value;
                                    // alert(aa);
                                    if (Rate != '') {
                                        var tr =
                                            "<tr>" +
                                            "<td><input type='text' class='form-control' name='ItemName[]' value='" + ItemName + "'></td>" +
                                            "<td><input type='text' name='Rate[]' class='form-control' value='" + Rate + "' ></td>" +
                                            "<td><input type='text' name='Category[]'  value='" + Category + "' required class='form-control' ></td>" +
                                            "<td><input type='text' name='Quantity[]' value='" + Quantity + "' required class='form-control' >" +
                                            "<td><input type='text' name='productTotal[]' value='" + productTotal + "' required class='form-control' >" +
                                            "<th> <a class='btn btn-danger deleteRow'>delete</a> </th>" +
                                            "</tr>";
                                        $('tbody').append(tr);

                                    }
                                    $(".deleteRow").click(function() {
                                        $(this).parent().parent().remove();
                                        addTotal();
                                    });
                                    $("#ItemName").val('').trigger('change');
                                    document.getElementById('Rate').value = '';
                                    document.getElementById('Quantity').value = '';
                                    document.getElementById('Category').value = '';
                                    document.getElementById('productTotal').value = '';
                                    addTotal();
                                });
                            </script>

                        </div>
                    </div>
                </div>

            </div>

            <script>
                function getSelectedProductData(id) {
                    var id = document.getElementById(id).value;
                    var token = '{{csrf_token()}}';
                    $.ajax({
                        type: "post",
                        url: "getSelectedProductData",
                        data: {
                            id: id,
                            _token: token
                        },
                        dataType: "json",
                        success: function(data) {
                            // console.log(data);
                            document.getElementById('Rate').value = data[0].Rate;
                            document.getElementById('Category').value = data[0].Category;
                            document.getElementById('Quantity').value = data[0].Quantity;
                            document.getElementById('productTotal').value = data[0].Rate * data[0].Quantity;
                        },
                        error: function(req, status, error) {
                            console.log(error);
                        }
                    });
                }

                function getBalance_on_partyname_change() {
                    var token = '{{csrf_token()}}';
                    $.ajax({
                        type: "post",
                        url: "getBalanceOfCurrentParty",
                        data: {
                            PartyName: document.getElementById('PartyName').value,
                            _token: token
                        },
                        dataType: "text",
                        success: function(data) {

                            console.log(data);
                            document.getElementById('Balance').value = data;

                        },
                        error: function(req, status, error) {
                            console.log(error);
                        }
                    });
                }

                function countTotalWithQuantity() {
                    var rate = document.getElementById('Rate').value;
                    var quantity = document.getElementById('Quantity').value;
                    var productTotal = rate * quantity;
                    document.getElementById('productTotal').value = productTotal;
                }

                function addTotal() {
                    var grandTotal = 0;
                    var productTotal = document.getElementsByName('productTotal[]');
                    for (var i = 1; i < productTotal.length; i++) {
                        var productTotal1 = productTotal[i].value;
                        grandTotal = grandTotal + parseInt(productTotal1);
                    }
                    document.getElementById('Total').value = grandTotal;
                    // alert(grandTotal);
                }

                function add_total_and_rent() {
                    var total = document.getElementById('Total').value;
                    var rent = document.getElementById('Rent').value;
                    var totalbill = parseInt(total) + parseInt(rent);
                    document.getElementById('FinalTotal').value = totalbill;
                }

                function sendMultipleData() {

                    var ItemName = document.getElementsByName('ItemName[]');
                    var Rate = document.getElementsByName('Rate[]');
                    var Category = document.getElementsByName('Category[]');
                    var Quantity = document.getElementsByName('Quantity[]');
                    var productTotal = document.getElementsByName('productTotal[]');
                    var obj;
                    obj = [];

                    for (var i = 1; i < Rate.length; i++) {
                        var ItemName1 = ItemName[i].value;
                        var Rate1 = Rate[i].value;
                        var Category1 = Category[i].value;
                        var Quantity1 = Quantity[i].value;
                        var productTotal1 = productTotal[i].value;
                        //    console.log(ItemName1+"-"+Rate1+"-"+Category1+"-"+Quantity1+"-"+productTotal1);
                        var obje;
                        obje = {
                            ItemName: "",
                            Rate: "",
                            Category: "",
                            Quantity: "",
                            Total: ""
                        };
                        obje.ItemName = ItemName1;
                        obje.Rate = Rate1;
                        obje.Category = Category1;
                        obje.Quantity = Quantity1;
                        obje.Total = productTotal1
                        obj.push(obje);

                    }
                    // console.log(obj);
                    var partyname = document.getElementById('PartyName').value;
                    var City = document.getElementById('City').value;
                    var Sender = document.getElementById('Sender').value;
                    var Reciever = document.getElementById('Reciever').value;
                    var Rent = document.getElementById('Rent').value;
                    var BuiltyNo = document.getElementById('BuiltyNo').value;
                    var Remarks = document.getElementById('Remarks').value;
                    if (partyname != '' && City != '' && Remarks != '' && Sender != '' && Reciever != '' && Rent != '' && BuiltyNo != '') {

                        var token = '{{csrf_token()}}';
                        $.ajax({
                            type: "post",
                            url: "sendMultipleData",
                            data: {

                                obj: obj,
                                Date: document.getElementById('Date').value,
                                City: document.getElementById('City').value,
                                BuiltyNo: document.getElementById('BuiltyNo').value,
                                Sender: document.getElementById('Sender').value,
                                Reciever: document.getElementById('Reciever').value,
                                Total: document.getElementById('Total').value,
                                Rent: document.getElementById('Rent').value,
                                FinalTotal: document.getElementById('FinalTotal').value,
                                Balance: document.getElementById('Balance').value,
                                PartyName: document.getElementById('PartyName').value,
                                Remarks: document.getElementById('Remarks').value,
                                _token: token
                            },
                            dataType: "text",
                            success: function(data) {
                                console.log(data);

                            },
                            error: function(req, status, error) {
                                console.log(error);
                            }
                        });

                        var table = document.getElementById('table');
                        var row = document.getElementsByTagName('tbody')[0];
                        deleteRow();

                        function deleteRow() {
                            row.parentNode.removeChild(row);
                        };
                        document.getElementById('Date').value = '';
                        // document.getElementById('City').value = '';
                        $("#City").val('').trigger('change');
                        // document.getElementById('PartyName').value = '';
                        $("#PartyName").val('').trigger('change');
                        document.getElementById('Sender').value = '';
                        document.getElementById('Reciever').value = '';
                        document.getElementById('Total').value = '';
                        document.getElementById('Rent').value = '';
                        document.getElementById('FinalTotal').value = '';
                        document.getElementById('Balance').value = '';
                        document.getElementById('BuiltyNo').value = '';
                        document.getElementById('Remarks').value = '';
                        

                    }



                }
            </script>



            @endsection