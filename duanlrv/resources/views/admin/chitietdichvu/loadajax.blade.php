<thead>
    <tr>
        <th class="serial">#</th>
        <th class="serial">Tên dịch vụ</th>
        <th>Trạng thái</th>
        <th style="width:100px;">Action</th>
        <!-- <th>Quantity</th> -->
        <!-- <th>Status</th> -->
    </tr>
</thead>
<tbody>
    @php
    $i = 1;
    @endphp
    @foreach($data as $dt)
        <tr>
            <td class="serial">{{$i++}}</td>
            <td class="edit_name" contenteditable data-id='{{$dt->id}}'>
                <span>{{$dt->name_dichvu}}</span>
            </td>
            <td>
                @if($dt->id_status == 1)
                    <span class="badge badge-complete">thành công</span>
                @elseif ($dt->id_status == 2)
                    <span class="badge badge-warning">đợi xét duyệt</span>
                @else
                    <span class="badge badge-danger">đã hủy</span>
                @endif
            </td>
            <td>
                <a href="{{route('chitietdichvu.destroy',$dt->id)}}" class="btn btn-sm btn-danger btndelete"><i class="fa fa-trash"></i> Xóa</a>
            </td>
        </tr>
    @endforeach
</tbody>
<div class="table-stats order-table ov-h">
    <form method="POST" action="" id="form-delete">
    @method('DELETE')
    @csrf
    </form>
</div> 
<!-- model thêm -->

<script>
        jQuery(document).ready(function($) {
            $('.btndelete').click(function(ev) {
                ev.preventDefault();
                var _href = $(this).attr('href');
                $('form#form-delete').attr('action',_href);
                if(confirm('bạn muốn xóa chứ ?')){
                    $('form#form-delete').submit();
                }
            });
        });
    </script>