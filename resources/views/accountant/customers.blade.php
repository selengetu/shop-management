@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header no-border">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Харилцагч</h3>
                        <a href="" data-toggle="modal" data-target="#modal" onclick="add()"><i class="fa fa-plus"></i> Нэмэх</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <tbody><tr>
                            <th style="width: 10px">#</th>
                            <th>Нэр</th>
                            <th>Регистр</th>
                            <th style="width: 40px">Засах</th>
                        </tr>
                        @foreach ($customers as $index=>$customer)
                            <tr>
                                <td>{{ $index+1 }}.</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->register }}</td>
                                <td><a data-target="#modal" data-toggle="modal" href="#modal" onclick="edit({{$customer->id}})"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Харилцагч</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ Route('store_customer') }}">
                    <div class="modal-body">
                        <div class="input-group" style="margin-bottom: 1rem;">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Харилцагчийн нэр</span>
                            </div>
                            <input type="text" class="form-control" name="name" id="name" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-danger" type="button" onclick="remove()"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Регистр</label>
                            </div>
                            <input type="text" class="form-control" name="register" id="register" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="cid" id="cid" value="0">
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
        let customers = {!! json_encode($customers) !!};

        function addFactory() {
            $('#cid').val(0);
            $('#name').val('');
            $('#register').val('');
        }

        function edit(id) {
            let customer = null;
            customers.forEach(item => {
                if(item.id==id) {
                    customer = item;
                }
            });
            console.log(customer);
            if(customer!=null) {
                $('#cid').val(customer.id);
                $('#name').val(customer.name);
                $('#register').val(customer.register);
            }
            else {
                alert('Алдаа гарлаа, мэдээлэл олдсонгүй.');
            }
        }

        function remove() {
            let fid = $('#cid').val();
            if(fid != 0) {
                if( confirm( $('#name').val()+" устгах уу") ) {
                    window.location.href = 'remove_customer/'+fid;
                }
            }
        }

    </script>
@endsection
