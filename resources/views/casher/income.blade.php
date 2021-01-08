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
                <div class="input-group col-md-8">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Дэлгүүр</label>
                    </div>
                    <select class="custom-select" id="shops" onchange="shop_changed()">
                        @foreach ($shops as $shop)
                        <option value="{{ $shop->shop_id }}" tag="">{{ $shop->shop_name }}
                        </option>
                        @endforeach
                    </select>
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Төлбөрийн хэлбэр</label>
                    </div>
                    <select class="custom-select" id="pay_type">
                        @foreach ($const_pay_type as $pay_type)
                        <option value="{{ $pay_type->id }}" >{{ $pay_type->name }}
                        </option>
                        @endforeach
                    </select>
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Мөнгөн дүн</label>
                    </div>
                    <input type="number" class="form-control" id="values" />
                    <button class="btn btn-success" onclick="payBtn()">Орлого бүртгэх</button>
                </div>

            </div>
            <div class="card-body">
                <form action="toCatch" method="POST" id="target">
                    <table class="table table-bordered" style="font-size:18px;" id="product_table">
                        <thead>
                            <tr>
                                <th>Огноо</th>
                                <th>Эхний үлдэгдэл</th>
                                <th>Орлого</th>
                                <th>Сүүлийн үлдэгдэл</th>
                                <th>Төлбөрийн хэлбэр</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    @csrf
                    <input type="hidden" value="0" id="selShopid" name="selShopid" />
                </form>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->
@endsection

@section('script')
<script>
    $( document ).ready(function() {
        shop_changed()
    });


    function payBtn() {
        var shop= $('#shops').val();
        var pay_type= $('#pay_type').val();
        var values= $('#values').val();
        $.get('/insIncome/' + shop+'/'+pay_type+'/'+values, function (data) {
            if(data==0){
                shop_changed()
            } else{
                alert("Хүсэлт амжилтгүй боллоо.")
            }
        });
    }
    function shop_changed() {
        $('#product_table tbody').empty()
        var shop_id = $('#shops option:selected').val()
        $.get('/showIncome/' + shop_id, function (data) {
            $.each(data, function (i, row) {
                $('#product_table tbody').append(
                    "<tr><td> " + row.balance_date + "</td><td> " + row.balance_c1 + "</td><td> " + row.balance_value + "</td><td> " + row.balance_c2 + "</td><td> " + row.name + "</td></tr>")
            });
        });
    }


</script>
@endsection
