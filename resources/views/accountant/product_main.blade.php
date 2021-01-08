@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <div class="row">
        <div class="col-md-4">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Үйлдвэр</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header no-border">
                    <h3 class="card-title">Бүтээгдэхүүн /Ерөнхий/</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mainModal" onclick="addMain()"><i class="fa fa-plus"></i> Нэмэх</button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th></th>
                                <th>Бүтээгдэхүүн</th>
                                <th>Нэгж</th>
                                <th>1 хайрцаган дахь<br> барааны жин</th>
                                <th>Нэгж үнэ</th>
                                <th>Борлуулах үнэ</th>
                                <th>Тайлбар</th>
                                <th style="width: 40px">Засах</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $index=>$product)
                                <tr>
                                    <td>{{ $index+1 }}.</td>
                                    <td style="max-width:35px;">
                                        @if($product->thumb_url)
                                            <img src="{{ asset($product->thumb_url) }}" class="img-circle img-size-32 mr-2">
                                        @endif
                                    </td>
                                    <td>
                                        {{ $product->name }}
                                    </td>
                                    <td>{{ $product->count_unit }}</td>
                                    <td>{{ $product->count_in_box }} {{ $product->count_unit }}</td>
                                    <td>{{ number_format($product->cost) }}</td>
                                    <td>{{ number_format($product->price) }}</td>
                                    <td>{{ $product->note }}</td>
                                    <td><a data-target="#mainModal" data-toggle="modal" href="#mainModal" onclick="editMain({{$product->id}})"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modals --}}
    <div class="modal fade" id="mainModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Бүтээгдэхүүн /Ерөнхий/</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ Route('store_product_main') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="input-group" style="margin-bottom: 1rem;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Нэр</span>
                                    </div>
                                    <input type="text" class="form-control" name="mname" id="mname" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-danger" type="button" onclick="removeMain()"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group" style="margin-bottom: 1rem;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">1 хайрцаганд хэдэн кг</span>
                                    </div>
                                    <input type="number" class="form-control" name="mbox" id="mbox" maxlength="3" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group" style="margin-bottom: 1rem;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Нэгж/үнэ</span>
                                    </div>
                                    <input type="number" class="form-control" name="mcost" id="mcost" maxlength="5" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group" style="margin-bottom: 1rem;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Худалдах үнэ</span>
                                    </div>
                                    <input type="number" class="form-control" name="mprice" id="mprice" maxlength="5" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group" style="margin-bottom: 1rem;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Нэгж</span>
                                    </div>
                                    <select class="custom-select" name="munit" id="munit" required>
                                        <option value="кг" selected>Кг</option>
                                        <option value="ш">Ширхэг</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group" style="margin-bottom: 1rem;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Зураг</span>
                                    </div>
                                    <input type="file" class="form-control" name="mimage" id="mimage" accept="image/*" onchange="console.log(this.files[0].path);">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="input-group" style="margin-bottom: 1rem;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Тайлбар</span>
                                    </div>
                                    <input type="text" class="form-control" name="mnote" id="mnote">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="mid" id="mid" value="0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Хаах</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Хадгалах</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
    {{-- Modals end --}}
@endsection

@section('script')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('.table').DataTable({
                "displayStart": 20,
                "columnDefs": [{ "orderable": false, "targets": [6] }],
                "language": {
                    "search":      "Хайлт",
                    "lengthMenu":     " _MENU_ өгөгдөл харагдаж байна",
                    "infoEmpty":      "Өгөгдөл байхгүй байна",
                    "info":           " _TOTAL_ өгөгдлөөс _START_ -с _END_",
                    "paginate": {
                        "first":"Эхнийх",
                        "last":"Сүүлийнх",
                    "previous": "<i class='fa fa-arrow-left' aria-hidden='true'></i> ",
                    "next": "<i class='fa fa-arrow-right' aria-hidden='true'></i> "
                    }
            }
        });
        } );

        let products = {!! json_encode($products) !!};

        function addMain() {
            $('#mid').val(0);
            $('#mtype').val('');
            $('#mname').val('');
            $('#mcodename').val('');
            $('#munit').val('ш');
            $('#mnote').val('');
            $('#mcost').val('');
            $('#mprice').val('');
            $('#mbox').val('');
        }
        console.log(products);

        function editMain(id) {
            let product = null;
            products.forEach(item => {
                if(item.id==id) {
                    product = item;
                }
            });
            console.log(product);
            if(product!=null) {
                $('#mid').val(product.id);
                $('#mtype').val(product.pipe_type_id);
                $('#mname').val(product.name);
                $('#munit').val(product.count_unit);
                $('#mnote').val(product.note);
                $('#mcost').val(product.cost);
                $('#mprice').val(product.price);
                $('#mbox').val(product.count_in_box);
            }
            else {
                alert('Алдаа гарлаа, мэдээлэл олдсонгүй.');
            }
        }

        function removeMain() {
            let mid = $('#mid').val();
            if(mid != 0) {
                if( confirm( $('#mname').val()+" устгах уу") ) {
                    window.location.href = 'remove_product_main/'+mid;
                }
            }
        }
    </script>
@endsection
