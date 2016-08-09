<style>
    #pdf_title {
        width: 100%;
        text-align: center;
        text-transform: uppercase;
        font-weight: bold;
        font-size: 16px;
        margin-top: 12px;
    }

    #pdf_tbl_items {
        border-collapse: collapse;
        font-size: 12px;
        margin: 10px 0;
    }

    #pdf_tbl_items tboby {
        display: table-row-group;
        vertical-align: middle;
        border-color: inherit;
    }

    #pdf_tbl_items tr {
        display: table-row;
        vertical-align: inherit;
        border-color: inherit;
    }

    #pdf_tbl_items th, #pdf_tbl_items td {
        border: 1px solid #000;
        padding: 3px;
    }

    #pdf_signature {
        min-height: 150px;
    }

    #pdf_signature div {
        text-align: center;
    }

    #pdf_signature lable {
        font-size: 14px;
        font-weight: bold;
    }

    .fl {
        float: left;
    }

    .fr {
        float: right;
    }

    .clb {
        clear: both;
    }

    .w50 {
        width: 50%;
    }

    .w20 {
        width: 20%;
    }

    .w100 {
        width: 100%;
    }

    .pb20 {
        padding-bottom: 20px;
    }

    .pt20 {
        padding-top: 20px;
    }

    #pdf_header h3, #pdf_header p {
        text-align: left !important;
    }

    #pdf_footer {
        /* 	text-align: center; */
    }

    #pdf_content table td, #pdf_content table th {
        text-align: right;
        height: auto !important;
    }

    p {
        margin: 3px 0;
    }

    .w150px {
        width: 150px;
    }

    .w220px {
        width: 220px;
    }

    .fontI {
        font-style: italic;
    }

    .border-bottom {
        border-bottom: 1px dotted rgb(0, 0, 0) !important;
    }

    .border-left {
        border-left: none !important;
    }

    .border-right {
        border-right: none !important;
    }

    .border-top {
        border-top: none !important;
    }

    #policy {
        font-weight: bold;
        text-align: center;
        font-size: 1.3em;
        margin-top: 10px;
    }

    .text-center {
        direction: rtl !important;
        text-align: center !important;
    }

    .text-bold {
        font-weight: bold !important;
    }

    table th, table td {
        line-height: normal !important;
    }
    /* Medium Devices, Desktops */
    @media only screen and (max-width : 992px) {
    }

    /* Small Devices, Tablets */
    @media only screen and (max-width : 768px) {
        .table-responsive {
            max-width: 700px;
        }
    }

    @media only screen and (max-width : 767px) and (max-width: 481px) {
        .table-responsive {
            max-width: 700px;
        }
    }

    /* Extra Small Devices, Phones */
    @media only screen and (max-width : 480px) {
        .table-responsive {
            max-width: 300px;
        }
    }

    /* Custom, iPhone Retina */
    @media only screen and (max-width : 320px) {
        .table-responsive {
            max-width: 284px;
        }
    }
    /*@media screen and (min-device-width: 481px) and (max-device-width: 768px)*/
</style>
<div class="modal fade hidden-print" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Hóa đơn Chi</h4>
                <p class="error_submit"></p>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="pdf_header">
                            <div id="pdf_company" class="fl">
                                <p id="company_name"><?php echo $this->config->item('company'); ?></p>
                                <p><?php echo 'công ty'; ?></p>
                                <p>Điện Thoại: <?php echo 'cong ty'; ?></p>
                                <?php if ($this->config->item('website')) { ?>
                                    <p>Website: <?php echo 'website'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div >
                            <div id="pdf_customer" class="clb">
                                <p>Người nhận tiền: <?php echo 'nguyen van a' ?></p>
                                <p>Địa chỉ: <?php echo 'dia chi'; ?></p>
                                <p>Lý do nộp: <?php echo 'ly do nop'; ?></p>
                                <p>Số tiền: <?php echo 'số tiền' ?> </p>
                                <p>Số tiền viết bằng chữ: <?php echo 'số tiền băng chữ'; ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="clb">
                                <div class="fr">
                                    <p>Ngày ..... tháng ..... năm .......</p>
                                </div>
                            </div>
                            <div id="pdf_signature" class="w100 clb">
                                <div class="w20 fl">
                                    <p><lable>Người lập phiếu</lable></p>
                                    <p class="fontI">(ký, họ tên)</p>
                                    <p></p>
                                </div>
                                <div class="w20 fl">
                                    <p><lable>Người thu tiền</lable></p>
                                    <p class="fontI">(ký, họ tên)</p><p></p>
                                </div>
                                <div class="w20 fl">
                                    <p><lable>Kế toán trưởng</lable></p>
                                    <p class="fontI">(ký, họ tên)</p>
                                    <p></p>
                                </div>
                                <div class="w20 fl">
                                    <p><lable>Giám đốc</lable></p>
                                    <p class="fontI">(ký, họ tên)</p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Đóng</button>
                <button type="submit" class="btn btn-primary" id="save_info_customer">In hóa đơn</button>
            </div>
        </div>
    </div>
</div>