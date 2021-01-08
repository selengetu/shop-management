@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header no-border">
                    <h3 class="card-title">Бүтээгдэхүүн /Нэгж/</h3>
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
                                <th>Үнэ</th>
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
                                            {{ $item->type_name }} {{ $item->name }}<br>{{ $item->note }}
                                        </td>
                                        @if($item->icount>0)
                                            <td>{{ $item->size }}</td>
                                            <td>@if($item->count_in_box!=null) {{ $item->count_in_box }}{{ $item->count_unit }} @endif</td>
                                            <td>@if($item->count_in_bag!=null) {{ $item->count_in_bag }}{{ $item->count_unit }} @endif</td>
                                            <td>{{ $item->price }}₮</td>
                                        @endif
                                    </tr>
                                    <?php $mid=$item->mainid;?>
                                @else
                                    <tr>
                                        <td>{{ $i }}.</td>

                                        <td>{{ $item->size }}</td>
                                        <td>@if($item->count_in_box!=null) {{ $item->count_in_box }}{{ $item->count_unit }} @endif</td>
                                        <td>@if($item->count_in_bag!=null) {{ $item->count_in_bag }}{{ $item->count_unit }} @endif</td>
                                        <td>{{ $item->price }}₮</td>
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
@endsection