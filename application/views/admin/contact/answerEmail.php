<div class="modal fade bs-example-modal-lg" id="modal_MessageAnswer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <form method="post" id="frm-contenttMessage" action="<?php echo base_url().'admin/emails/answerContact'?>">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h4 class="modal-title">Trả lời email</h4>
                  <p class="error_submit"></p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="messageAnswer" class="control-label ">Nội dung email</label>
                              <textarea name="contenttMessage" rows="10" cols="40" class="" style="height: 100% !important; width: 100% !important"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Đóng</button>
                    <button type="submit" class="btn btn-primary" id="send_email">Gửi thông tin</button>
                </div>
              </div>
        </form>
    </div>
</div>