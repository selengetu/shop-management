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
                        <label class="input-group-text shop_type_name" for="inputGroupSelect01">Дэлгүүр</label>
                    </div>
                    <select  id="shops" onchange="shop_changed()" style="width:10%;">
                        @foreach ($shops as $shop)
                        <option value="{{ $shop->shop_id }}"  type_id="{{ $shop->type_id }}" tag="{{ $shop->type_name }}" @if(Session::get('sel_shopid')==$shop->shop_id ) selected @endif tag="">{{ $shop->shop_name }}
                        </option>
                        @endforeach
                    </select>
                    <div class="input-group-prepend">
                        <label class="input-group-text">Огноо:</label>
                    </div>
                    <input type="date" value="{{ date('Y-m-d') }}" id="action_date" />
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Үйлдэл</label>
                    </div>
                    <select  id="balance_type" style="width:120px;">
                        @foreach ($const_balance_type as $balance_type)
                        <option value="{{ $balance_type->type_id }}" >{{ $balance_type->type_name }}
                        </option>
                        @endforeach
                    </select>
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Төлб/хэлбэр</label>
                    </div>
                    <select  id="pay_type" style="width:80px;">
                        @foreach ($const_pay_type as $pay_type)
                        <option value="{{ $pay_type->id }}" >{{ $pay_type->name }}
                        </option>
                        @endforeach
                    </select>
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Мөнгөн дүн</label>
                    </div>
                    <input type="number" style="width:120px;" id="values" />
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Тайлбар</label>
                    </div>
                    <input type="text" class="form-control" id="notes" />
                    <button class="btn btn-success" onclick="payBtn()">Орлого бүртгэх</button>
                </div>
            </div>
            <div class="card-body">

                    <table class="table table-bordered" style="font-size:15px;" id="product_table">
                        <thead>
                            <tr>
                                <th>Дэлгүүр</th>
                                <th>Балансын төрөл</th>
                                <th>Пос/Бэлэн</th>
                                <th>Эхний үлдэгдэл</th>
                                <th>Гүйлгээ</th>
                                <th>Сүүлийн үлдэгдэл</th>
                                <th>Огноо</th>
                                <th>Тайлбар</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content ">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Захиалгын бүтээгдэхүүн</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered" style="font-size:15px;" id="product_table_item">
                <thead>
                    <tr>
                        <th colspan="5">Бүтээгдэхүүн</th>
                    </tr>
                    <tr>
                        <th>Нэр</th>
                        <th>Нийт хайрцаг</th>
                        <th>Нийт тоо/кг</th>
                        <th>Үнэ</th>

                    </tr>
                </thead>
                <tbody>
                </tbody>

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
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script>
    $( document ).ready(function() {
        shop_changed()
        $('#values').val("")
        $('#notes').val("")
    });
    function payBtn() {
        var shop= $('#shops').val();
        var pay_type= $('#pay_type').val();
        var values= $('#values').val();
        var action_date= $('#action_date').val();
        var balance_type= $('#balance_type').val();
        var notes= $('#notes').val();
        if(values.length>0 && notes.length>0){
            $.get('/insertBalance/' + shop+'/'+pay_type+'/'+values+'/'+action_date+'/'+balance_type+'/'+notes, function (data) {
                if(data==0){
                    shop_changed()
                } else{
                    alert("Хүсэлт амжилтгүй боллоо.")
                }
            });
        }
        else {
                alert("Мөнгөн дүн болон тайлбар оруулна уу.")
        }

    }

    function getitem($id) {
        $("#myModal").modal();
        $('#product_table_item tbody').empty();
        $.get('/showBalanceitem/' +$id, function (data) {
            $.each(data, function (i, row) {
                $('#product_table_item tbody').append(
                    "<tr><td><img src='" + row.thumb_url +
                    "' class='img-circle img-size-32 mr-2' width='80' height='100'/> " + row.name + "</td><td>"+ row.box + "</td><td>"+ row.kg + "</td><td>"+ row.price+ "</td></tr>")
                    });
        });
        }
    function shop_changed() {
        let const_balance_type = {!! json_encode($const_balance_type) !!}
        $('#balance_type').empty()
        var seltype=$('#shops option:selected').attr("type_id");
        const_balance_type.forEach(balance_type => {
            if(seltype==3){
                if(balance_type.type_id==7){
                    $('#balance_type').append($('<option>', {
                        value: balance_type.type_id,
                        text: balance_type.type_name
                    }));
                }
            } else {
                if(balance_type.type_id!=7){
                    $('#balance_type').append($('<option>', {
                        value: balance_type.type_id,
                        text: balance_type.type_name
                    }));
                }
            }

        })



        $(".shop_type_name").text(($('#shops option:selected').attr("tag")))
        $('#product_table tbody').empty()
        var shop_id = $('#shops option:selected').val()
        var parent_id = $('#shops option:selected').attr('tag')
        if (parent_id == 0) {
            $('.hinttext').text('Та агуулахын ')
        } else {
            $('.hinttext').text('Та дэлгүүрт ')
        }
        $('#selShopid').val(shop_id)
        var delhtml=""
        var morebtn=""
        $.get('/showBalance/' + shop_id, function (data) {
            $.each(data, function (i, row) {
                delhtml="<i class='fa fa-trash' style='color:red' onclick='delFunc("+row.balance_id+")'></i>"
                {{--  if(i==0){
                    delhtml="<i class='fa fa-trash' style='color:red' onclick='delFunc("+row.balance_id+")'></i>"
                } else{
                    delhtml=""
                }  --}}
                if(row.balance_type!=5 && row.balance_type!=6 ){
                    morebtn="<button class='btn btn-primary btn-sm' onclick='getitem("+row.balance_id+")'><i class='fa fa-search-plus' aria-hidden='true'></i> Дэлгэрэнгүй </button>"
                } else {
                    morebtn=""
                }
                 $('#product_table tbody').append(
                    "<tr  id='"+row.balance_id+"'><td> "+ row.to_shop_name + "</td><td> "+ row.type_name + "</td><td>"+ row.pay_name + "</td><td>"
                        + row.balance_c1 + "</td><td>"+ row.balance_value + "</td><td>"+ row.balance_c2 + "</td><td>"+ row.balance_date + "</td><td style='font-size:12px;'>"
                            + row.balance_note + "</td><td> "+morebtn+delhtml+"</td></tr>")
            });
        });
    }

    function delFunc(bal_id) {
        if(confirm("Сүүлийн гүйлгээг устгах уу ?")){
            $.get('/delBalance/' + bal_id, function (data) {
                if(data==1){
                    shop_changed()
                } else {
                    alert("Хүсэлт амжилтгүй")
                }
        });
        }

    }
</script>
@endsection
