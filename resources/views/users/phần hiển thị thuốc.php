<!-- Phần hiển thị bảng thuốc -->


  @if ($medical_bill->study_status == 3)
  <div style="font-size: 30px; font-weight: bold; text-align: center; color: #337ab7;">
    Danh sách thuốc kê
  </div>
  <br>
  @endif  

  <div class="container">
    <table width="100%" border="1" style="vertical-align: middle; text-align: center; border-collapse: collapse; margin-bottom: 15px;">    
      <tr>
        <th width="5%">STT</th>
        <th width="20%">Tên thuốc</th>
        <th width="10%">Số lượng</th>
        <th width="30%">Liều dùng</th>
        <th width="20%">Giá thành</th>
        <th width="25%">Thành tiền</th>
        <th>action</th>
      </tr> 
        <div style="display: none">
            {{ $total = 0 }}
            {{$tien_kham = $medical_bill->tien_kham}}         
        </div>
      </tr>
      <?php $i = 1 ?>
      @foreach ($product_stocks as $key => $product_stocks)
      <tr class="main" id="view-radiologist">
        <td style="padding-left: 10px;">
          <div>{{ $i++ }}</div>
        </td>
        <td>
          <div name="name">{{ $product_stocks->name }}</div>
        </td>
        <td>
          <div name="name">{{ $product_stocks->qty }}</div>
        </td>
        <td>
          <div name="name">{{ $product_stocks->lieu_dung }}</div>
        </td>
        <td>
          <div name="price">{{ $product_stocks->price }}</div>       
        </td>
        <td >
          <div name="thanh_tien">{{ $thanh_tien = $product_stocks->price * $product_stocks->qty}}</div>
           <div style="display: none">{{$total += $thanh_tien}}</div>
        </td>
        <td>
          @if($medical_bill->study_status == "3")
          <a href="{{ route('del.product_stocks',['id'=>$product_stocks->id]) }}" onclick="return confirm('Bạn có chắc chắn xóa?')"><i class="fa fa-times-circle" style="color: red; cursor: pointer;"></i></a>
          @endif  
        </td>    
      </tr>   
      @endforeach 
      <tr>
        <th colspan="2" ></th>
        <th colspan="2"> Tiền khám : </th>
        <td></td>
        <th>{{$medical_bill->tien_kham}} </th>
        <td></td>
      </tr>
      <tr>
        <th colspan="2" ></th>
        <th colspan="2"> Tổng tiền thanh toán : </th>
        <td></td>
        <th>{{$total + $tien_kham}} </th>
        <td></td>
      </tr>


    </table>
  </div>