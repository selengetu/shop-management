@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0;
    }

    input[type=date]::-webkit-inner-spin-button,
    input[type=date]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0;
    }

</style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text shop_type_name">Дэлгүүр:</label>
                    </div>
                    <select  id="shops" onchange="shop_changed()" style="width:10%;">
                        @foreach ($shops as $shop)
                        <option value="{{ $shop->shop_id }}"  type_id="{{ $shop->type_id }}" tag="{{ $shop->type_name }}" @if(Session::get('sel_shopid')==$shop->shop_id ) selected @endif tag="">{{ $shop->shop_name }}
                        </option>
                        @endforeach
                    </select>
                    <div class="input-group-prepend">
                        <label class="input-group-text">Эхлэх огноо:</label>
                    </div>
                    <input type="date" value="{{ date('Y-m-d') }}" id="start_date" name='start_date' />
                    <div class="input-group-prepend">
                        <label class="input-group-text">Дуусах огноо:</label>
                    </div>
                    <input type="date" value="{{ date('Y-m-d') }}" id="end_date"  name="end_date" />
                    <button class="btn btn-success" onclick="calc()">Хайх </button>
                </div>
            </div>
            <div class="card-body">
                    <table class="table table-bordered" style="font-size:15px;" >
                        <thead>
                            <tr>
                                <th colspan="8" align="center" style="text-align:center" id="shopNameId"></th>
                            </tr>
                            <tr>
                                <th>Огноо</th>
                                <th>Орлого</th>
                                <th>Ирсэн</th>
                                <th>Явсан</th>
                                <th>Хорогдол</th>
                                <th>Касс</th>
                                <th>Туслах</th>
                                <th>Бусад</th>
                            </tr>
                        </thead>
                       <tbody id="balancereport">
                       </tbody>
                    </table>
                    <div class="offset-4 col-md-4">
                        <table style="margin:1rem;" class="table table-bordered">
                            <tr><th>Нийт бараа /Ирсэн/</th><th id="niit">0</th></tr>
                            <tr><th>Орлого</th><th id="orlogo">0</th></tr>
                            <tr><th>Явсан бараа</th><th id="yavsan"  onclick="getInfo(2)" style="cursor:pointer;">0</th></tr>
                            <tr><th>Хорогдол</th><th id="horogdol"  onclick="getInfo(3)" style="cursor:pointer;">0</th></tr>
                            <tr><th>Касс</th><th id="kass"  onclick="getInfo(8)" style="cursor:pointer;">0</th></tr>
                            <tr><th>Туслах</th><th id="tuslah" onclick="getInfo(9)" style="cursor:pointer;">0</th></tr>
                            <tr><th>Бусад</th><th id="busad"  onclick="getInfo(5)" style="cursor:pointer;">0</th></tr>
                            <tr><th></th><th id="alltotoal">0</th></tr>
                        </table>
                    </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>

<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="infoModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Төрөл</th>
                        <th>Огноо</th>
                        <th>Дүн</th>
                        <th>Тайлбар</th>
                    </tr>
                </thead>
                <tbody id="infoBody">
                <t/body>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Хаах</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script>
    function getInfo(typeid) {
        $("#infoModal").modal("show")
        var start_date= $('#start_date').val();
        var end_date= $('#end_date').val();
        var shops= $('#shops').val();
        $('#infoBody ').empty()
        $("#infoModalLabel").text($('#shops option:selected').text())
        if(start_date.length>0 && end_date.length>0){
            $.get('/getbalanceDetail/' + start_date+'/'+end_date+'/'+typeid+'/'+shops, function (data) {
                    $.each(data, function (i, row) {
                        $('#infoBody ').append("<tr><td>"+ row.type_name + "</td><td>"+ row.balance_date+"</td><td>"+ row.balance_value + "</td><td>"+ row.balance_note+ "</td></tr>")
                    });
            });
        }
    }
    function shop_changed() {
        $(".shop_type_name").text(($('#shops option:selected').attr("tag")))
    }
    function calc() {
        var start_date= $('#start_date').val();
        var end_date= $('#end_date').val();
        var shops= $('#shops').val();
        $('#balancereport').empty();
        var orlogo_sum=0;
        var irsen_sum=0;
        var yavsan_sum=0;
        var horogdol_sum=0;
        var busad_sum=0;
        var kass_sum=0;
        var tuslah_sum=0;
        if(start_date.length>0 && end_date.length>0){
            $.get('/getbalance/' + start_date+'/'+end_date+'/'+shops, function (data) {
                    $("#shopNameId").html((data[0].shop_name));
                    $.each(data, function (i, row) {
                        $('#balancereport ').append("<tr><td>"+ row.balance_date + "</td><td>"+ row.orlogo+"</td><td>"+ row.irsen + "</td><td>"+ row.yavsan+ "</td><td>"+ row.horogdol+"</td><td>"+ row.kass+"</td><td>"+ row.tuslah+"</td><td>"+ row.busad+"</td></tr>")
                        orlogo_sum+=parseInt(row.orlogo);
                        irsen_sum+=parseInt(row.irsen);
                        yavsan_sum+=parseInt(row.yavsan);
                        horogdol_sum+=parseInt(row.horogdol);
                        kass_sum+=parseInt(row.kass);
                        tuslah_sum+=parseInt(row.tuslah);
                        busad_sum+=parseInt(row.busad);
                    });
                    $('#balancereport ').append("<tr style='font-weight:bold'><td  align='right'>Нийт</td><td>"+ orlogo_sum+"</td><td>"+ irsen_sum + "</td><td>"+ yavsan_sum+ "</td><td>"+ horogdol_sum+"</td><td>"+ kass_sum+"</td><td>"+ tuslah_sum+"</td><td>"+ busad_sum+"</td></tr>")
                    $("#niit").html(irsen_sum)
                    $("#orlogo").html(orlogo_sum)
                    $("#yavsan").html(yavsan_sum+' <i class="fa fa-info" style="font-size:14px; color:#007bff;"></i>')
                    $("#horogdol").html(horogdol_sum+' <i class="fa fa-info" style="font-size:14px; color:#007bff;"></i>')
                    $("#kass").html(kass_sum+' <i class="fa fa-info" style="font-size:14px; color:#007bff;"></i>')
                    $("#tuslah").html(tuslah_sum+' <i class="fa fa-info" style="font-size:14px; color:#007bff;"></i>')
                    $("#busad").html(busad_sum+' <i class="fa fa-info" style="font-size:14px; color:#007bff;"></i>')
                    $("#alltotoal").html(irsen_sum-orlogo_sum-yavsan_sum-horogdol_sum-kass_sum-tuslah_sum-busad_sum)
            });
        }
    }
    </script>
@endsection
