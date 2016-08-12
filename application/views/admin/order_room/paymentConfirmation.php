<style>
    #myModalPayment{
        text-align: left !important;
        color: black;
    }
</style>
<div class="modal fade hidden-print" id="myModalPayment" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thanh toán hóa đơn</h4>
                <p class="error_submit"></p>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if(isset($ids)||isset($ids)):?>
                        <form method="post" name="form-save-info" id="form-save-info">
                            <div class="form-group">
                                <label for="input_name_customer" class="control-label ">Tên khách hàng</label>
                                <div class="input-field">
                                    <input type="text" class="form-control " name = "name_customer" id="name_customer" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input_payment_type" class="control-label ">Loại tiền thanh toán</label>
                                <select name="input_payment_type" class="form-control">
                                    <option value="">--</option>
                                    <option value="cash" >Thanh toán bằng tiền mặt</option>
                                    <option value="bank" >Thanh toán bằng chuyển khoản ngân hàng</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="input_email" class="control-label ">Lý do thanh toán</label>
                                <div class="input-field">
                                    <input type="email" class="form-control" name="email" id="email"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-field">
                                    <input type="hidden" class="form-control" name="ids" id="email" value="<?php echo '';?>"/>
                                </div>
                            </div>
                        </form>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <?php if(isset($ids)||isset($ids)):?>
                <button type="button" data-dismiss="modal" class="btn btn-default">Đóng</button>
                <button type="submit" class="btn btn-primary" id="save_info_customer">Thanh toán</button>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>