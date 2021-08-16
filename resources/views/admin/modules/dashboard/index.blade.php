@extends('admin/layouts/mainlayout')
@section('content')

<div class="content-wrapper">

    <section class="content">
      <div class="container-fluid">
       <h1 style="text-align: center;">Dashboard</h1>
       <div class="row">
         <div class="col-md-6">
            <button onclick="completeReport()" class="btn btn-primary">COMPLETE REPORT</button>
         </div>
         <div class="col-md-6">
            <button onclick="partyWiseReport()" style="float: left;" class="btn btn-primary">PARTY WISE REPORT</button>
         </div>

       </div>
      </div>
    </section>
   
  </div>
  <script>
    function partyWiseReport(){
      window.location.href = "partyWiseReport";
    }
    function completeReport(){
      window.location.href = "completeReport";
    }
  </script>

  @endsection