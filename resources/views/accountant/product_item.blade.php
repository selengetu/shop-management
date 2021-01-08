@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Үйлдвэр</span>
                </div>
                <select class="custom-select" onchange="javascript:location.href = this.value;">
                    <option value="filter_item_factory/0" @if($fid==0) selected @endif>Бүгд</option>
                    @foreach($factories as $factory)
                        <option value="filter_item_factory/{{ $factory->id }}" @if($fid==$factory->id) selected @endif>{{ $factory->name }} /{{ $factory->iso2 }}/</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Бүтээгдэхүүн /Ерөнхий/</span>
                </div>
                <select class="custom-select" onchange="javascript:location.href = this.value;">
                    <option value="filter_item_main/0" @if($mid==0) selected @endif>Бүгд</option>
                    @foreach($products as $item)
                        <option value="filter_item_main/{{ $item->id }}" @if($mid==$item->id) selected @endif>{{ $item->type_name }} - {{ $item->name }} /{{ $item->code_name }}/ {{ $item->note }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="input-group mb-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mainModal" onclick="addMain()"><i class="fa fa-plus"></i> Нэмэх</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header no-border">
                    <h3 class="card-title">Бүтээгдэхүүн /Нэгж/</h3>
                    <div class="card-tools">
                        <a href="" data-toggle="modal" data-target="#mainModal" onclick="addMain()"><i class="fa fa-plus"></i> Нэмэх</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th colspan="2">Бүтээгдэхүүн</th>
                                <th>Хэмжээ</th>
                                <th>Хайрцаг(Труба-уут)</th>
                                <th>Уут(Труба-урт)</th>
                                <th>Өртөг</th>
                                <th>Үнэ</th>
                                <th style="width: 40px">Засах</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; $fid=0; $mid=0; ?>
                            @foreach ($items as $item)
                                @if($fid != $item->factory_id)
                                    <tr>
                                        <td colspan="8">{{ $item->factory_name }} /{{ $item->iso2 }}/</td>
                                    </tr>
                                    <?php $i=1; $fid=$item->factory_id;?>
                                @endif
                                @if($mid != $item->mainid)
                                    <?php $rowspan=$item->icount; if($rowspan<1){ $rowspan=1; }?>
                                    <tr>
                                        <td>{{ $i }}.</td>
                                        <td rowspan="{{ $rowspan }}" class="align-middle" style="max-width:35px;">
                                            @if($item->thumb_url)
                                                <img src="{{ asset($item->thumb_url) }}" class="img-circle img-size-32 mr-2">
                                            @endif
                                        </td>
                                        <td rowspan="{{ $rowspan }}" class="align-middle">
                                            {{ $item->type_name }} {{ $item->name }}<br>/{{ $item->code_name }}/ {{ $item->note }}
                                        </td>
                                        @if($item->icount>0)
                                            <td>{{ $item->size }}</td>
                                            <td>@if($item->count_in_box!=null) {{ $item->count_in_box }}{{ $item->count_unit }} @endif</td>
                                            <td>@if($item->count_in_bag!=null) {{ $item->count_in_bag }}{{ $item->count_unit }} @endif</td>
                                            <td>{{ $item->cost }}₮</td>
                                            <td>{{ $item->price }}₮</td>
                                            <td><a data-target="#mainModal" data-toggle="modal" href="#mainModal" onclick="editMain({{$item->id}})"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                        @endif
                                    </tr>
                                    <?php $mid=$item->mainid;?>
                                @else
                                    <tr>
                                        <td>{{ $i }}.</td>

                                        <td>{{ $item->size }}</td>
                                        <td>@if($item->count_in_box!=null) {{ $item->count_in_box }}{{ $item->count_unit }} @endif</td>
                                        <td>@if($item->count_in_bag!=null) {{ $item->count_in_bag }}{{ $item->count_unit }} @endif</td>
                                        <td>{{ $item->cost }}₮</td>
                                        <td>{{ $item->price }}₮</td>
                                        <td><a data-target="#mainModal" data-toggle="modal" href="#mainModal" onclick="editMain({{$item->id}})"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                    </tr>
                                @endif
                                <?php $i=$i+1;?>
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
                    <h5 class="modal-title" id="exampleModalLabel">Бүтээгдэхүүн /Нэгж/</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ Route('store_product_item') }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Б/Ерөнхий</span>
                                    </div>
                                    <select class="custom-select" name="imain" id="imain" required>
                                        <option value="">Сонгоно уу...</option>
                                        @foreach ($products as $index=>$product)
                                            <option value="{{ $product->id }}">{{ $product->factory_name }} {{ $product->type_name }} {{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group" style="margin-bottom: 1rem;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Хэмжээ /Ж: 20x1/2"x20/</span>
                                    </div>
                                    <input type="text" class="form-control" name="isize" id="isize" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-danger" type="button" onclick="removeMain()"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group" style="margin-bottom: 1rem;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Дотоод код</span>
                                    </div>
                                    <input type="text" class="form-control" name="icode" id="icode" maxlength="2">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group" style="margin-bottom: 1rem;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Хайрцаг(Труба-уут)</span>
                                    </div>
                                    <input type="number" class="form-control" name="ibox" id="ibox" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group" style="margin-bottom: 1rem;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Уут(Труба-урт)</span>
                                    </div>
                                    <input type="number" class="form-control" name="ibag" id="ibag" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group" style="margin-bottom: 1rem;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Өртөг</span>
                                    </div>
                                    <input type="text" class="form-control" name="icost" id="icost" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">₮</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group" style="margin-bottom: 1rem;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Үнэ</span>
                                    </div>
                                    <input type="text" class="form-control" name="iprice" id="iprice" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">₮</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="iid" id="iid" value="0">
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
    <script type="text/javascript">
        let items = {!! json_encode($items) !!};
        let mid = {{$mid}};

        function addMain() {
            $('#iid').val(0);
            console.log(mid);
            if(mid==0) {
                $('#imain').val('');
            }
            else {
                $('#imain').val(mid);
            }
            $('#isize').val('');
            $('#ibox').val(0);
            $('#ibag').val(0);
            $('#icode').val('');
            $('#icost').val(0);
            $('#iprice').val('');
        }

        function editMain(id) {
            let item = null;
            items.forEach(row => {
                if(row.id==id) {
                    item = row;
                }
            });
            console.log(item);
            if(item!=null) {
                $('#iid').val(item.id);
                $('#imain').val(item.mainid);
                $('#isize').val(item.size);
                $('#ibox').val(item.count_in_box);
                $('#ibag').val(item.count_in_bag);
                $('#icode').val(item.icode);
                $('#icost').val(item.cost);
                $('#iprice').val(item.price);
            }
            else {
                alert('Алдаа гарлаа, мэдээлэл олдсонгүй.');
            }
        }

        function removeMain() {
            let mid = $('#iid').val();
            if(mid != 0) {
                if( confirm( $('#isize').val()+" устгах уу") ) {
                    window.location.href = 'remove_product_item/'+mid;
                }
            }
        }
    </script>
@endsection
