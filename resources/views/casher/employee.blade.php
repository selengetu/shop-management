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
                                <th>Дэлгүүр</th>
                                <th>Нэр</th>
                                <th>Өдрийн цалин</th>
                                <th style="width: 40px">Засах</th>
                            </tr>
                        @foreach ($employee as $index=>$emp)
                            <tr>
                                <td>{{ $index+1 }}.</td>
                                <td>{{ $emp->shop_name }}</td>
                                <td>{{ $emp->name }}</td>
                                <td>{{ $emp->day_salary }}</td>
                                <td><a data-target="#modal" data-toggle="modal" href="#modal" onclick="edit({{$emp->id}})"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ажилчид</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ Route('store_employee') }}">
                    <div class="modal-body">
                        <div class="input-group" style="margin-bottom: 1rem;">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Ажилчны нэр</span>
                            </div>
                            <input type="text" class="form-control" name="name" id="name" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-danger" type="button" onclick="remove()"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </div>
                        </div>
                     
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">Дэлгүүр</span>
                            </div>
                            <select class="custom-select" name="shop_id" id="shop_id" required>
                                @foreach($shops as $item)
                                    <option value="{{ $item->shop_id }}" >{{ $item->shop_name }}</option>
                                @endforeach
                            </select>
                        </div>
                     
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Өдрийн цалин</span>
                            </div>
                            <input type="number" class="form-control" name="day_salary" id="day_salary" required>
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
      let employee = {!! json_encode($employee) !!};
        function add() {
            $('#id').val(0);
            $('#name').val('');
            $('#day_salary').val('');
            $('#shop_id').val('0');
        }

        function edit(id) {
            
            let emp = null;
            employee.forEach(item => {
                if(item.id===id) {
                    emp = item;
                }
            });
            console.log(emp);
            if(emp!=null) {
                $('#id').val(emp.id);
                $('#name').val(emp.name);
                $('#shop_id').val(emp.shop_id);
                $('#day_salary').val(emp.day_salary);
            
            }
            else {
                alert('Алдаа гарлаа, мэдээлэл олдсонгүй.');
            }

        }

        function remove() {
            let fid = $('#id').val();
            if(fid != 0) {
                if( confirm( $('#name').val()+" устгах уу") ) {
                    window.location.href = 'remove_employee/'+fid;
                }
            }
        }

    </script>
@endsection
