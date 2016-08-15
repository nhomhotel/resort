<script type="text/javascript" src="<?php echo base_url();?>public/site/js/jquery.validate.js"></script>
<style>
    #myModalPayment{
        text-align: left !important;
        color: black;
    }
    .error_submit{
        color: red;
        font-size: 14px;
    }
    @media only screen and (min-width : 992px) {
        #payment_type_bank {
            width: 66.666667% !important;
        }
        #payment_type_CVV{
            width: 33.333333% !important;
        }
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
            <form method="post" name="form-save-info-payment" id="form-save-info-payment" action="<?php echo base_url().'paymentOnline';?>">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                            <div class="form-group">
                                <label for="input_name_customer" class="control-label ">Tên đối tác</label>
                                <div class="input-field">
                                    <input type="text" class="form-control " name = "name_customer" value="<?php echo isset($doitac)?$doitac->user_name:''; ?>" id="name_customer" required/>
                                    <div name="name_error" class="clear error"><?php echo form_error('name_customer'); ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input_payment_type" class="control-label ">Loại tiền thanh toán</label>
                                <select name="payment_type" id="input_payment_type" class="form-control" required>
                                    <option value="">--</option>
                                    <option value="cash" >Thanh toán bằng tiền mặt</option>
                                    <option value="bank" >Thanh toán bằng visa/mastercard</option>
                                </select>
                                <div name="name_error" class="clear error"><?php echo form_error('payment_type'); ?></div>
                            </div>
                            <div class="form-group" id="payment-type-group" style="display: none">
                                <label for="input_payment_type_cash" id="label_cash" class="control-label ">Số tiền thanh toán</label>
                                <input name="payment_type_cash" id="input_payment_type_cash" class="form-control" value="<?php echo isset($total_payment)&&isset($doitac)? ($total_payment->total_money*(1-$doitac->profit_rate/100)):''; ?>">
                                <div name="name_error" class="clear error"><?php echo form_error('payment_type_cash'); ?></div>
                                <label for="input_payment_type_bank" id="label_bank" class="control-label ">Số tài khoản visa mastercard</label>
                                <input name="payment_type_bank" class="form-control col-md-8" placeholder="Số Visa/Mastercard" id="payment_type_bank" class="form-control">
                                <div name="name_error" class="clear error"><?php echo form_error('payment_type'); ?></div>
                                <input name="payment_type_CVV" class="form-control col-md-4" placeholder="Số CVV" id="payment_type_CVV" class="form-control">
                                <div name="name_error" class="clear error"><?php echo form_error('payment_type'); ?></div>
                            </div>
                            <div class="form-group">
                                <label for="paymentReason" class="control-label ">Lý do thanh toán</label>
                                <div class="input-field">
                                    <input type="text" class="form-control" name="paymentReason" id="email" required/>
                                    <div name="name_error" class="clear error"><?php echo form_error('payment_type'); ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-field">
                                    <input type="hidden" class="form-control" name="ids" id="email" value="<?php echo implode(',', $ids);?>"/>
                                    <input type="hidden" class="form-control" name="token" id="email" value="<?php echo $token;?>"/>
                                    <div name="name_error" class="clear error"><?php echo form_error('payment_type'); ?></div>
                                    <div name="name_error" class="clear error"><?php echo form_error('payment_type'); ?></div>
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
                checkUserName:true,
                minlength: 6,
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
                checkUserName:'Tên không đúng',
                minlength:'Tên độ dài tối thiểu 6'
            },
            input_payment_type:{
                required:'Trường không được để trống',
            },
            paymentReason:{
                required:'Trường không được để trống',
            }
        },submitHandler: function(form) {
//            console.log($(this).serialize());return false;    
            var url = window.location.href;
            $.ajax({
                url:form.action,
                type: 'POST',
                dataType: 'json',
                data:$('#form-save-info-payment').serialize(),
                success: function (data) {
                        if(!data.success)$('.error_submit').html(data.messages)
                        else{
                            $.toaster({priority:'success', title:"",message:data.messages,display:50000});
                            window.location.href = url;
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        
                    }
            })
        }
        
    })
    $('#input_payment_type').change(function(){
        if($(this).val()=='cash'){
            $('#payment-type-group,#label_cash,#input_payment_type_cash').css('display','block');
            $('#label_bank,#payment_type_bank, #payment_type_CVV').css('display','none');
        }
        else if($(this).val()=='bank'){
            $('#payment-type-group,#label_cash,#input_payment_type_cash').css('display','none');
            $('#payment-type-group,#label_bank,#payment_type_bank, #payment_type_CVV').css('display','block');
        }
        else{
            $('#payment-type-group').css('display','none');
        }
    })
})
</script>