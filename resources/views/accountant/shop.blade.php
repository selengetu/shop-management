@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header no-border">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Хэрэглэгч</h3>
                        <a href="" data-toggle="modal" data-target="#modal" onclick="add()"><i class="fa fa-plus"></i> Нэмэх</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Төрөл</th>
                                <th>Дэлгүүр</th>
                                <th>Төлөв</th>
                                <th style="width: 40px">Засах</th>
                            </tr>
                        @foreach ($shops as $index=>$shop)
                            <tr>
                                <td>{{ $index+1 }}.</td>
                                <td>{{ $shop->type_name }}</td>
                                <td>{{ $shop->shop_name }}</td>
                                <td>{{ $shop->state_name }}</td>
                                <td><a data-target="#modal" data-toggle="modal" href="#modal" onclick="edit({{$shop->shop_id}})"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modals --}}
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Дэлгүүр нэмэх</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ Route('store_stores') }}">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">Төоөл</span>
                            </div>
                            <select class="custom-select" name="const_shop_type" id="const_shop_type" required>
                                @foreach($const_shop_type as $item)
                                    <option value="{{ $item->type_id }}" >{{ $item->type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Дэлгүүр нэр</span>
                            </div>
                            <input type="text" class="form-control" name="shop_name" id="shop_name" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-danger" type="button" onclick="remove()"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">Төлөв</span>
                            </div>
                            <select class="custom-select" name="const_shop_state" id="const_shop_state" required>
                                @foreach($const_shop_state as $item)
                                    <option value="{{ $item->state_id }}" >{{ $item->state_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id" value="0">
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
        let shops = {!! json_encode($shops) !!};
        function add() {
            $('#id').val(0);
            $('#shop_name').val('');
            $('#shop_state').val('');
            $('#shop_id').val('');
        }
        function edit(id) {
            let shop = null;
            shops.forEach(item => {
                if(item.shop_id==id) {
                    shop = item;
                }
            });
            if(shop!=null) {
                $('#const_shop_type').val(shop.shop_type);
                $('#shop_name').val(shop.shop_name);
                $('#const_shop_state').val(shop.state_id);
                $('#id').val(id);
            }
            else {
                alert('Алдаа гарлаа, мэдээлэл олдсонгүй.');
            }
        }

        function remove() {
            let fid = $('#id').val();
            if(fid != 0) {
                if( confirm( $('#shop_name').val()+" дэлгүүрийг устгах уу") ) {
                    window.location.href = 'removeStore/'+fid;
                }
            }
        }

    </script>
@endsection
