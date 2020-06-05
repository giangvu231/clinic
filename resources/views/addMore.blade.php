<!DOCTYPE html>
<html>
<head>
    <title>kê đơn</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
   
<div class="container">
    <h2 align="center">Thêm đơn thuốc</h2> 
   
    <form action="{{ route('addmorePost') }}" method="POST">
       {{ csrf_field() }}
   
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
   
        @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif
   
        <table class="table table-bordered" id="dynamicTable">  
            <tr>
                <th>Tên thuốc</th>
                <th>số lượng</th>
                <th>liều dùng</th>
                <th>thêm</th>
            </tr>
            <tr>  
                <td><input type="text" name="addmore[0][name]" placeholder="Nhập tên thuốc" class="form-control" /></td>  
                <td><input type="text" name="addmore[0][qty]" placeholder="Nhập số lượng" class="form-control" /></td>  
                <td><input type="text" name="addmore[0][price]" placeholder="Nhập liều dùng" class="form-control" /></td>  
                <td><button type="button" name="add" id="add" class="btn btn-success">thêm</button></td>  
            </tr>  
        </table> 
    
        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
</div>
   
<script type="text/javascript">
   
    var i = 0;
       
    $("#add").click(function(){
   
        ++i;
   
        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][name]" placeholder="Nhập tên thuốc" class="form-control" /></td><td><input type="text" name="addmore['+i+'][qty]" placeholder="nhập số lượng" class="form-control" /></td><td><input type="text" name="addmore['+i+'][price]" placeholder="Nhập liều dùng" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">hủy</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
   
</script>
  
</body>
</html>