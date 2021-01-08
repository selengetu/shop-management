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
                    <select  id="shops" onchange="shop_changed()">
                        @foreach ($shops as $shop)
                        <option value="{{ $shop->shop_id }}" tag="{{ $shop->parent_id }}">{{ $shop->shop_name }}
                        </option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="card-body">
                <form action="toCatch" method="POST" id="target">
                    <table class="table table-bordered" style="font-size:18px;" id="product_table">
                        <thead>
                            <tr>
                                <th>Барааны нэр</th>
                                <th>Үлдэгдэл</th>
                                <th>Нэгж үнэ</th>
                                <th style="width:200px;">Нийт үнэ</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>

                            <tr>
                                <td colspan="3" style="text-align:right">Нийт</td>
                                <td><label class="grandtotal">00</label></td>
                            </tr>
                        </tfoot>
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
    function shop_changed() {
        $('#product_table tbody').empty()
        var shop_id = $('#shops option:selected').val()
        $.get('/showRemain/' + shop_id, function (data) {
            $.each(data, function (i, row) {
                if(row.balance==0){
                    var styles="style='background-color:#FFE5E5;'"
                } else{
                    var styles=''
                }
                $('#product_table tbody').append(
                    "<tr "+styles+"><td> <img src='" + row.thumb_url +
                        "' class='img-circle img-size-32 mr-2' width='80' height='100'/> " + row.name + "</td><td> " + row.balance + " " + addCommas(row.count_unit) + "</td><td> " + addCommas(row.cost) + "</td><td class='subtotal'> " + addCommas(row.price*row.balance) + "</td></tr>")
            });
            setTimeout(function () {
                calcTotalFooter()
                //initDataTable()
            }, 1000);
        });
    }
    function addCommas(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }

    function calcTotalFooter() {
        var sum = 0;
        $('.subtotal').each(function () {
            sum += parseFloat($(this).text()); // Or this.innerHTML, this.innerText
        });
        sum=addCommas(sum)
        $('.grandtotal').text(sum + ' төгрөг')
    }

</script>
@endsection
