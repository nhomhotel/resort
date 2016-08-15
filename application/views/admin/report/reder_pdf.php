<html>
    <head>
        <script type="text/javascript" src="http://hotel.git-dev.new.nhom/public/admin/js/jquery/jquery-1.11.3.min.js"></script>
    </head>
    <body>
    
    </body>
</html>


<style>
    .reder-pdf{
        width: 700px;
    }
    table{
        margin: 15px auto;
        border-collapse: collapse;
        font-size: 12px;
    }
    thead tr{
        border-top: 2px solid;
    }
    table img{
        width: 100px;
        height: 100px;
        padding: 1px 0px;
    }
    tr th{
        text-align: center;
        padding: 7px 5px;
        background: #1e5a96;
        color: #FFFFFF;
    }
    td,tr{
        border: 1px solid ;
    }
    .text-center{
        text-align: center;
    }
    thead{
        text-align: center;
        padding: 7px 5px;
        background: #1e5a96;
        color: #FFFFFF;
    }
    .print_order{
        background-color: blue;
        height: 21px;
        width: 89px;
        color: white;
        text-align: center;
    }
</style>
<div class="reder-pdf">
<h2 class="text-center">Thống kê danh sách đơn hàng</h2>
<span> VNĐ / USD</span>
<div class="table-responsive">
    <table class="table sTable mTable myTable">
        <thead class="title_order_room text-center">
            <tr>
                <th>STT</th>
                <td colspan="2" class="" >Tên căn/phòng</td>
                <th>Giá nhập</th>
                <th>Giá bán</th>
                <th>Lợi nhuận</th>
                <th>Người thuê phòng</th>
                <?php if ($user->role_id == 1): ?><th>Đối tác</th><?php endif; ?>
                <th>Ngày nhận phòng</th>
                <th>Ngày trả phòng</th>
                <th>Số người ở</th>
            </tr>
        </thead>
        <?php if(isset($table_body_order)) echo $table_body_order?>
    </table>
    <div class="print_order">In hóa đơn</div>
</div>
<script>$(document).ready(function(){
    $('.print_order').on('click',function(){
        window.print();
        window.closed;
    });
})</script>
</div>