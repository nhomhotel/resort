<script type="text/javascript" src="<?php echo base_url();?>public/site/js/jquery.validate.js"></script>
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
            <?php if(isset($ids)||  is_array($ids)):?>
            <form method="post" name="form-save-info-payment" id="form-save-info-payment">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                            <div class="form-group">
                                <label for="input_name_customer" class="control-label ">Tên khách hàng</label>
                                <div class="input-field">
                                    <input type="text" class="form-control " name = "name_customer" id="name_customer" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input_payment_type" class="control-label ">Loại tiền thanh toán</label>
                                <select name="input_payment_type" id="input_payment_type" class="form-control" required>
                                    <option value="">--</option>
                                    <option value="cash" >Thanh toán bằng tiền mặt</option>
                                    <option value="bank" >Thanh toán bằng visa/mastercard</option>
                                </select>
                            </div>
                            <div class="form-group" id="payment-type-group" style="display: none">
                                <label for="input_payment_type_cash" id="label_cash" class="control-label ">Số tiền thanh toán</label>
                                <input name="input_payment_type_cash" id="input_payment_type_cash" class="form-control">
                                <label for="input_payment_type_bank" id="label_bank" class=" col-xs-3 control-label ">Số tài khoản visa mastercard</label>
                                <input name="input_payment_type_bank" class="col-xs-9" id="input_payment_type_bank" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="paymentReason" class="control-label ">Lý do thanh toán</label>
                                <div class="input-field">
                                    <input type="text" class="form-control" name="paymentReason" id="email" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-field">
                                    <input type="hidden" class="form-control" name="ids" id="email" value="<?php echo '';?>"/>
                                </div>
                            </div>
                        
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Đóng</button>
                <button type="submit" class="btn btn-primary" id="save_info_customer">Thanh toán</button>
                
            </div>
            </form>
            <?php endif;?>
        </div>
    </div>
</div>
<script>$(function(){
    $('#form-save-info-payment').validate({
        rules:{
            name_customer:{
                required:true,
                checkUserName:true
            },
            input_payment_type:{
                required:true,
            },
            paymentReason:{
                required:true,
            }
            
        },messages:{
            name_customer:{
                required:'Trường không được để trống',
                checkUserName:'Tên không đúng'
            },
            input_payment_type:{
                required:'Trường không được để trống',
            },
            paymentReason:{
                required:'Trường không được để trống',
            }
        },submitHandler: function(form) {
            form.submit();
        }
        
    })
    $('#input_payment_type').change(function(){
        if($(this).val()=='cash'){
            $('#input_payment_type_cash,label_cash').css('display','block');
            $('#payment-type-group').css('display','block');
            $('#input_payment_type_bank,#payment-type-group #label_bank').css('display','none');
        }
        else if($(this).val()=='bank'){
            $('#input_payment_type_cash, #payment-type-group #label_bank').css('display','none');
            $('#input_payment_type_bank,#label_bank').css('display','block');
            $('#payment-type-group').css('display','block');
        }
        else{
            $('#payment-type-group').css('display','none');
        }
    })
})
</script>