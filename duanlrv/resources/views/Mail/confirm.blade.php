<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    hi {{$name}}
    mã đơn hàng:  {{$order_id}}
    @foreach($xaphuong as $item)
    {{$item->name_xaphuong}}
    @endforeach
    @foreach($quanhuyen as $item)
    {{$item->name_quanhuyen}}
    @endforeach
    @foreach($thanhpho as $item)
    {{$item->name_thanhpho}}
    @endforeach
  

                                

                       


                                <table class="table table-bordered" border="1">
                                <thead>
                                    <tr>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Đơn giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php 
                                $total = 0;
                                @endphp
                                @foreach($cart_array as $id => $CartItem)
                                @php 
                                $total += $CartItem['price'] * $CartItem['quantity'];
                                @endphp
                                <tr>
                                    <td>{{$CartItem['name']}}</td>
                                    <td>{{number_format($CartItem['price'])}} đ</td>
                                    <td>{{$CartItem['quantity']}}</td>
                                    <td>{{number_format($CartItem['quantity'] * $CartItem['price']) }}đ</td>
                                </tr>
                                @endforeach
                                    <tr>   Thanh toán: {{ number_format($total) }} đ</tr> 
                                    
                                </tbody>
                                </table>
                            
                
                   
         
</body>
</html>