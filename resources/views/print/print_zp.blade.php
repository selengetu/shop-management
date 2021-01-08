@extends('layouts.master')

@section('headbuttons')    
    <li class="nav-item d-none d-sm-inline-block" style="margin-right:150px;">
        <a class="nav-link" onclick="print();"><i class="fa fa-print" aria-hidden="true"></i>Хэвлэх</a>
    </li>
@endsection

@section('content')
    <div class="row" id="SelectorToPrint" style="font-weight: 400;
    font-style: normal;
    text-decoration: none;
    font-family: Arial, sans-serif;">
    @foreach ($orders as $order)
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <table border="0" width="100%" style="font-size:12px; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <td colspan="8" width="48%" style="table-layout: fixed;font-weight:bold;">НХМаягт БМ-3</td>
                                <td></td>
                                <td colspan="8" width="48%" align="right" style="font-size:9px;padding-left:20px;">СЭЗ-ийн сайд, ҮСГ-ын даргын 2002 оны 171/111 тоот тушаалын хавсралт</td>
                            </tr>
                            <tr>
                                <td colspan="17" align="center" valign="bottom" style="font-weight:bold;">ЗАРЛАГЫН БАРИМТ № __{{ $order->id }}__</td>
                            </tr>
                            <tr height="20" align="center">
                                <td colspan="8" style="border-bottom: 0.5pt solid">{{ $order->coname }}</td>
                                <td></td>
                                <td colspan="8" style="border-bottom: 0.5pt solid">{{ $order->cuname }}</td>
                            </tr>
                            <tr align="center" style="font-size:10px;">
                                <td colspan="8">(байгууллагын нэр)</td>
                                <td></td>
                                <td colspan="8">(худалдан авагчийн нэр)</td>
                            </tr>
                            <tr align="center" valign="middle" style="font-size:10px;">
                                <td align="right">Регистрийн №</td>
                                <td width="20" style="border: 0.5pt solid">{{ substr($order->coreg, 0, 1) }}</td>
                                <td width="20" style="border: 0.5pt solid">{{ substr($order->coreg, 1, 1) }}</td>
                                <td width="20" style="border: 0.5pt solid">{{ substr($order->coreg, 2, 1) }}</td>
                                <td width="20" style="border: 0.5pt solid">{{ substr($order->coreg, 3, 1) }}</td>
                                <td width="20" style="border: 0.5pt solid">{{ substr($order->coreg, 4, 1) }}</td>
                                <td width="20" style="border: 0.5pt solid">{{ substr($order->coreg, 5, 1) }}</td>
                                <td width="20" style="border: 0.5pt solid">{{ substr($order->coreg, 6, 1) }}</td>
                                <td></td>
                                <td align="right">Регистрийн №</td>
                                <td width="20" style="border: 0.5pt solid">{{ substr($order->cureg, 0, 1) }}</td>
                                <td width="20" style="border: 0.5pt solid">{{ substr($order->cureg, 1, 1) }}</td>
                                <td width="20" style="border: 0.5pt solid">{{ substr($order->cureg, 2, 1) }}</td>
                                <td width="20" style="border: 0.5pt solid">{{ substr($order->cureg, 3, 1) }}</td>
                                <td width="20" style="border: 0.5pt solid">{{ substr($order->cureg, 4, 1) }}</td>
                                <td width="20" style="border: 0.5pt solid">{{ substr($order->cureg, 5, 1) }}</td>
                                <td width="20" style="border: 0.5pt solid">{{ substr($order->cureg, 6, 1) }}</td>
                            </tr>
                            <tr height="26" valign="bottom">
                                <td colspan="17">20 ….. он ..... сар ....... өдөр</td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="1" width="100%" style="font-size:11px; border-collapse: collapse;">
                        <tbody style="font-weight:bold;" valign="middle" align="center">
                            <tr height="20">
                                <td rowspan="2" width="30">№</td>
                                <td rowspan="2" width="200">Материалын үнэт зүйлийн нэр, зэрэг, дугаар</td>
                                <td rowspan="2" width="35">Код</td>
                                <td rowspan="2" width="35">Хэм-жих нэгж</td>
                                <td colspan="3">Худалдах</td>
                            </tr>
                            <tr height="40">
                                <td width="40">Тоо</td>
                                <td width="60">Нэгжийн үнэ</td>
                                <td width="100">Нийт дүн</td>
                            </tr>
                            <?php $sum=0 ?>
                            @foreach ($fees as $index=>$fee)
                                <tr height="22">
                                    <td>{{ $index+1 }}</td>
                                    <td align="left">{{ $fee->name }}</td>
                                    <td>{{ $fee->code }}</td>
                                    <td>{{ $fee->unit }}</td>
                                    <td>{{ $fee->count }}</td>
                                    <td>{{ $fee->price }}</td>
                                    <td>{{ $fee->total }}</td>
                                </tr>
                                <?php $sum=$sum+$fee->total ?>
                            @endforeach
                            @for ($i = 0; $i < 19-sizeof($fees); $i++)
                                <tr height="22">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endfor
                            <tr height="22">
                                <td></td>
                                <td colspan="3"> Нийт: </td>
                                <td colspan="3">{{ $sum }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" width="100%" style="font-size:10px;margin-top:10px;">
                        <tbody>
                            <tr height="20">
                                <td rowspan="3" height="60" width="70" align="center">Тэмдэг</td>
                                <td>Хүлээлгэн өгсөн эд хариуцагч:</td>
                                <td>…………………………………/………………………/</td>
                            </tr>
                            <tr height="20">
                                <td>Хүлээн авагч:</td>
                                <td>…………………………………/………………………/</td>
                            </tr>
                            <tr height="20">
                                <td>Шалгасан наягтлан бодогч:</td>
                                <td>…………………………………/………………………/</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <!-- /.row -->
@endsection

@section('script')
    <script>
        $(function () {
        });

        
        function print() {
            var divToPrint=document.getElementById("SelectorToPrint");
            newWin= window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
        }

    </script>
@endsection