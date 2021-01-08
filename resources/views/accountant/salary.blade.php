@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header no-border">
                    
                    <div class="row">
                    <div class ="col-md-3">
                      <h3 class="card-title">Цалин</h3>
                    </div>
                    <div class ="col-md-3">
                  
                            <select class="form-control" name="sshop_id" id="sshop_id" onchange="javascript:location.href = 'filter_shop/'+this.value;" >
                            <option value="0">Бүгд</option>
                                @foreach($shop as $item)
                                    <option value="{{ $item->shop_id }}" @if($item->shop_id==$sshop_id) selected @endif>{{ $item->shop_name }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class ="col-md-3">
                 
                            <select class="form-control" name="semp_id" id="semp_id"  onchange="javascript:location.href = 'filter_emp/'+this.value;">
                            <option value="0">Бүгд</option>
                                @foreach($emp as $item)
                                    <option value="{{ $item->id }}"  @if($item->id==$semp_id) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                   
                    </div>
                      <div class="col-md-3" align="right">
                      <a href="" data-toggle="modal" data-target="#modal" onclick="add()"><i class="fa fa-plus"></i> Нэмэх</a>
                      </div>
                        
                       
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Дэлгүүр</th>
                                <th>Ажилтан</th>
                                <th>Огноо</th>
                                <th>Цалин</th>
                                <th style="width: 40px">Засах</th>
                            </tr>
                        @foreach ($salary as $index=>$sal)
                            <tr>
                                <td>{{ $index+1 }}.</td>
                                <td>{{ $sal->shop_name }}</td>
                                <td>{{ $sal->name }}</td>
                                <td>{{ $sal->salary_date }}</td>
                                <td>{{ $sal->salary }}</td>
                                <td><a data-target="#modal" data-toggle="modal" href="#modal" onclick="edit({{$sal->id}})"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Цалин нэмэх</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ Route('store_salary') }}">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">Дэлгүүр</span>
                            </div>
                            <select class="custom-select" name="shop_id" id="shop_id" required>
                                @foreach($shop as $item)
                                    <option value="{{ $item->shop_id }}" >{{ $item->shop_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Ажилтан</span>
                            </div>
                            <select class="custom-select" name="emp_id" id="emp_id" required>
                                @foreach($emp as $item)
                                    <option value="{{ $item->id }}" >{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">Огноо</span>
                            </div>
                            <input type="date" value="{{ date('Y-m-d') }}" id="salary_date" name='salary_date' />
               
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">Цалин</span>
                            </div>
                            <input type="text" class="form-control" name="salary" id="salary" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-danger" type="button" onclick="remove()"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </div>
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
        let shops = {!! json_encode($salary) !!};
        function add() {
            $('#id').val(0);
            $('#shop_id').val('');
            $('#emp_id').val('');
            $('#salary').val('');
        }
        function edit(id) {
            let shop = null;
            shops.forEach(item => {
                if(item.id==id) {
                    shop = item;
                }
            });
            if(shop!=null) {
                $('#shop_id').val(shop.shop_id);
                $('#emp_id').val(shop.emp_id);
                $('#salary').val(shop.salary);
                $('#salary_date').val(shop.salary_date);
                $('#id').val(id);
            }
            else {
                alert('Алдаа гарлаа, мэдээлэл олдсонгүй.');
            }
        }

        function remove() {
            let fid = $('#id').val();
            if(fid != 0) {
                if(" Цалинг устгах уу") {
                    window.location.href = 'removesalary/'+fid;
                }
            }
        }

    </script>
@endsection
