@extends('layouts.master')

@section('style')
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
                        <label class="input-group-text">Үйлдэл:</label>
                    </div>
                    <select id="action">
                        <option value="1">Бараа худалдан АВАХ</option>
                        <option value="2">Бараа ШИЛЖҮҮЛЭХ</option>
                        <option value="3">ХОРОГДСОН бараа бүртгэх</option>
                    </select>
                    <div class="input-group-prepend">
                        <label class="input-group-text">Огноо:</label>
                    </div>
                    <input type="date" value="{{ date('Y-m-d') }}" id="action_date" />
                    <div class="input-group-prepend" style="margin-left: 1rem;">
                        <label class="input-group-text">Хаанаас:</label>
                    </div>
                    <select id="from_shop_type">
                        @foreach ($shops as $shop)
                        <option value="{{ $shop->type }}">{{ $shop->type_name }}
                        </option>
                        @endforeach
                    </select>
                    <select id="from_shop"></select>
                    <div class="input-group-prepend" style="margin-left: 1rem;">
                        <label class="input-group-text">Хаана:</label>
                    </div>
                    <select id="to_shop_type">
                        @foreach ($shops as $shop)
                        @if($shop->type!=3)
                        <option value="{{ $shop->type }}">{{ $shop->type_name }}
                        </option>
                        @endif
                        @endforeach
                    </select>
                    <select id="to_shop"></select>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-7" style="max-height: 81vh; overflow-y: auto;">
                        <table class="table-bordered" style="font-size:13px; width:100%;" id="product_table">
                            <thead>
                                <tr>
                                    <th style="width: 35px;">#</th>
                                    <th>Бараа</th>
                                    <th style="width: 255px;">Хэмжээ (нэгж/Хайрцаг)</th>
                                    <th style="width: 225px;">Үнэ</th>
                                    <th style="width: 125px;">Нийт үнэ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td style="text-align:center;">
                                        <input type='checkbox' id='checkbox_{{ $product->id }}' name='products'  value='{{ $product->id }}'>
                                    </td>
                                    <td>
                                        @if($product->thumb)
                                            <img src='{{ asset($product->thumb) }}' class='img-circle img-size-32 mr-2' width='80' height='80'/>
                                        @endif
                                        {{ $product->name }}
                                    </td>
                                    <td>
                                        <input type='number' id='weight_{{ $product->id }}' onKeyup='calcTotal({{ $product->id }})' min='0' value='0' style="margin-left: 1rem;"/>
                                        {{ $product->unit }}/{{ $product->box }}{{ $product->unit }}
                                    </td>
                                    <td style="text-align:center;">
                                        <input type='number' id='price_{{ $product->id }}' onKeyup='calcTotal({{ $product->id }})' min='0' value='{{ $product->price }}'/>₮
                                    </td>
                                    <td style="text-align:center;">
                                        <span id='total_{{ $product->id }}' class='subtotal'>0</span>₮
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-5" style="text-align: center; margin:auto;">
                        <h2 id="label_from">Агуулах 1-с</h2>
                        <h2 id="label_to">Нарны хороолол 1-р салбар-руу</h2>
                        <h2 id="grandtotal" style="font-weight: bold;">Нийт: 0₮</h2>
                        <h3 id="label_action">Бараа ШИЛЖҮҮЛЭХ гэж байна</h3>
                        <br>
                        <button onclick="pushtoCatch()" class="btn btn-primary btn-lg">
                            <i class="fa fa-save"></i> Баталгаажуулах / Хадгалах
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->
@endsection

@section('script')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script>
    let shops = {!! json_encode($shops) !!}
    
    $(document).ready(function () {
        $('#action').trigger('change')
    })

    $('#action').change(function() {
        if(this.value==2) {
            $('#from_shop_type').prop('disabled', false)
            $('#from_shop').prop('disabled', false)
            $('#label_from').show()
        }
        else {
            $('#from_shop_type').prop('disabled', true)
            $('#from_shop').prop('disabled', true)
            $('#label_from').hide()
        }
        $('#from_shop_type').trigger('change')
    })

    $('#from_shop_type').change(function() {
        $('#from_shop').empty()
        shops.forEach(shoptype => {
            if(shoptype.type==this.value) {
                shoptype.shops.forEach( shop => {
                    $('#from_shop').append($('<option>', {
                        value: shop.shop,
                        text: shop.shop_name
                    }));
                })
            }
        })
        if (this.value==1) {
            $('#to_shop_type').val(2)
        }
        $('#from_shop').trigger('change')
    })

    $('#from_shop').change(function() {
        $('#to_shop_type').trigger('change')
    })

    $('#to_shop_type').change(function() {
        let fromshop = $('#from_shop').val()
        if($('#action').val()!=2) {
            fromshop = 0
        }
        $('#to_shop').empty()
        shops.forEach(shoptype => {
            if(shoptype.type==this.value) {
                shoptype.shops.forEach( shop => {
                    if(shop.shop!=fromshop) {
                        $('#to_shop').append($('<option>', {
                            value: shop.shop,
                            text: shop.shop_name
                        }));
                    }
                })
                $('#to_shop').trigger('change')
            }
        });
    })

    $('#to_shop').change(function() {
        updateTotal()
    })

    function pushtoCatch() {
        event.preventDefault()
        let products = $('input[name="products"]:checked')

        if (products.length > 0) {
            let jsonArray = []
            let from_shop = $('#from_shop').val()
            let to_shop = $('#to_shop').val()
            let action = $('#action').val()
            let date = $('#action_date').val()
            var note = $( "#action option:selected" ).text()+': '+$( "#from_shop option:selected" ).text()+' -> '+$( "#to_shop option:selected" ).text();
            if($("#action").val()!=2) {
                note = $( "#action option:selected" ).text()+': '+$( "#to_shop option:selected" ).text();
            }
            products.each(function () {
                let pid = $(this).val()
                let weight = $('#weight_' + pid).val()
                let price = $('#price_' + pid).val()
                item = {}
                item["pid"] = pid
                item["weight"] = weight
                item["price"] = price
                jsonArray.push(item)
            });
            let jsonObj = {}
            jsonObj['action'] = action
            jsonObj['from_shop'] = from_shop
            jsonObj['to_shop'] = to_shop
            jsonObj['date'] = date
            jsonObj['note'] = note
            jsonObj['products'] = jsonArray

            let jsonString = JSON.stringify(jsonObj)
            console.log(jsonString)
            $.post("/toCatch", jsonString, function (data) {
                $(".result").html(data);
                window.location.replace("/cashreport_sel/" + to_shop);
            });
        } else {
            alert("Та бараа сонгоно уу...")
        }
    }

    function calcTotal(prod_id) {
        let price = $("#price_" + prod_id).val()
        let kg = $("#weight_" + prod_id).val()
        if (kg > 0) {
            $("#checkbox_" + prod_id).prop("checked", true);
        } else {
            $("#checkbox_" + prod_id).prop("checked", false);
        }
        $('#total_' + prod_id).text(kg * price)
        calcTotalFooter()
    }

    function calcTotalFooter() {
        var sum = 0;
        $('.subtotal').each(function () {
            sum += parseFloat($(this).text());
        });
        $('#grandtotal').text('Нийт: '+sum + '₮')
    }

    function updateTotal() {
        let action = $( "#action option:selected" ).text();
        let from = $( "#from_shop option:selected" ).text();
        let to = $( "#to_shop option:selected" ).text();
        $('#label_from').text(from+'-с')
        $('#label_to').text(to+'-т')
        $('#label_action').text(action+' гэж байна')
    }

</script>
@endsection
