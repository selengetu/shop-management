@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header no-border">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Үйлдвэр</h3>
                        <a href="" data-toggle="modal" data-target="#factoryModal" onclick="addFactory()"><i class="fa fa-plus"></i> Нэмэх</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <tbody><tr>
                            <th style="width: 10px">#</th>
                            <th>Нэр</th>
                            <th>Улс</th>
                            <th style="width: 40px">Засах</th>
                        </tr>
                        @foreach ($factories as $index=>$factory)
                            <tr>
                                <td>{{ $index+1 }}.</td>
                                <td>{{ $factory->name }}</td>
                                <td>{{ $factory->iso2 }}</td>
                                <td><a data-target="#factoryModal" data-toggle="modal" href="#factoryModal" onclick="editFactory({{$factory->id}})"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header no-border">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Төлбөрийн хэлбэр</h3>
                        <a href="" data-toggle="modal" data-target="#payTypeModal" onclick="addPayType()"><i class="fa fa-plus"></i> Нэмэх</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <tbody><tr>
                            <th style="width: 10px">#</th>
                            <th>Нэр</th>
                            <th style="width: 40px">Засах</th>
                        </tr>
                        @foreach ($paytypes as $index=>$type)
                            <tr>
                                <td>{{ $index+1 }}.</td>
                                <td>{{ $type->name }}</td>
                                <td><a data-target="#payTypeModal" data-toggle="modal" href="#payTypeModal" onclick="editPayType({{$type->id}})"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header no-border">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Бүтээгдэхүүний төрөл</h3>
                        <a href="" data-toggle="modal" data-target="#typeModal" onclick="addType()"><i class="fa fa-plus"></i> Нэмэх</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <tbody><tr>
                            <th style="width: 10px">#</th>
                            <th>Нэр</th>
                            <th style="width: 40px">Засах</th>
                        </tr>
                        @foreach ($types as $index=>$type)
                            <tr>
                                <td>{{ $index+1 }}.</td>
                                <td>{{ $type->name }}</td>
                                <td><a data-target="#typeModal" data-toggle="modal" href="#typeModal" onclick="editType({{$type->id}})"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modals --}}
    <div class="modal fade" id="factoryModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Үйлдвэр</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ Route('store_factory') }}">
                    <div class="modal-body">
                        <div class="input-group" style="margin-bottom: 1rem;">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Үйлдвэрийн нэр</span>
                            </div>
                            <input type="text" class="form-control" name="fname" id="fname" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-danger" type="button" onclick="removeFactory()"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Улс</label>
                            </div>
                            <select class="custom-select" name="fcountry" id="fcountry" required>
                                <option value="">Сонгоно уу...</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->iso_code }}">{{ $country->name }} /{{ $country->iso2 }}/</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="fid" id="fid" value="0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Хаах</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Хадгалах</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="typeModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Төрөл</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ Route('store_pipe_type') }}">
                    <div class="modal-body">
                        <div class="input-group" style="margin-bottom: 1rem;">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Төрлийн нэр</span>
                            </div>
                            <input type="text" class="form-control" name="tname" id="tname" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-danger" type="button" onclick="removeType()"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="tid" id="tid" value="0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Хаах</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Хадгалах</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="payTypeModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Төлбөрийн хэлбэр</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ Route('store_pay_type') }}">
                    <div class="modal-body">
                        <div class="input-group" style="margin-bottom: 1rem;">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Нэр</span>
                            </div>
                            <input type="text" class="form-control" name="pname" id="pname" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-danger" type="button" onclick="removePayType()"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="pid" id="pid" value="0">
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
        let factories = {!! json_encode($factories) !!};

        function addFactory() {
            $('#fid').val(0);
            $('#fname').val('');
            $('#fcountry').val('');
        }

        function editFactory(id) {
            let factory = null;
            factories.forEach(item => {
                if(item.id==id) {
                    factory = item;
                }
            });
            console.log(factory);
            if(factory!=null) {
                $('#fid').val(factory.id);
                $('#fname').val(factory.name);
                $('#fcountry').val(factory.country_code);
            }
            else {
                alert('Алдаа гарлаа, мэдээлэл олдсонгүй.');
            }
        }

        function removeFactory() {
            let fid = $('#fid').val();
            if(fid != 0) {
                if( confirm( $('#fname').val()+" устгах уу") ) {
                    window.location.href = 'remove_factory/'+fid;
                }
            }
        }

        let types = {!! json_encode($types) !!};

        function addType() {
            $('#tid').val(0);
            $('#tname').val('');
        }

        function editType(id) {
            let type = null;
            types.forEach(item => {
                if(item.id===id) {
                    type = item;
                }
            });
            console.log(type);
            if(type!=null) {
                $('#tid').val(type.id);
                $('#tname').val(type.name);
            }
            else {
                alert('Алдаа гарлаа, мэдээлэл олдсонгүй.');
            }
        }

        function removeType() {
            let tid = $('#tid').val();
            if(tid != 0) {
                if( confirm( $('#tname').val()+" устгах уу") ) {
                    window.location.href = 'remove_pipe_type/'+tid;
                }
            }
        }

        let paytypes = {!! json_encode($paytypes) !!};

        function addPayType() {
            $('#pid').val(0);
            $('#pname').val('');
        }

        function editPayType(id) {
            let type = null;
            paytypes.forEach(item => {
                if(item.id===id) {
                    type = item;
                }
            });
            console.log(type);
            if(type!=null) {
                $('#pid').val(type.id);
                $('#pname').val(type.name);
            }
            else {
                alert('Алдаа гарлаа, мэдээлэл олдсонгүй.');
            }
        }

        function removePayType() {
            let tid = $('#pid').val();
            if(tid != 0) {
                if( confirm( $('#pname').val()+" устгах уу") ) {
                    window.location.href = 'remove_pay_type/'+tid;
                }
            }
        }
    </script>
@endsection
