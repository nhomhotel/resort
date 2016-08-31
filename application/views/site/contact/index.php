<div class="container">
    <div id="desk-external-variables-email_new" class="desk-external-variables" style="display: none;">
        <div id="system-snippets-name_required">Name is required.</div>
        <div id="system-snippets-email_required">Email address is required.</div>
        <div id="system-snippets-invalid_email">Invalid email address</div>
        <div id="system-snippets-subject_required">Subject is required</div>
        <div id="system-snippets-question_required">Question is required.</div>
        <div id="system-snippets-exceeding_max_chars">Exceeding max length of 5KB</div>
        <div id="max_number_attachments">5</div>
        <div id="system-snippets-add_attachment">Add Another Attachment</div>
    </div>
    <div id="breadcrumbs">
        <a href="/">Home</a> › Email us
    </div>
    <div id="support-main">
        <div class="support-body">
            <div class="content">
                <h3>Email us</h3>
                <div id="form">
                    <form action="<?php echo base_url() ?>customer/portal/emails/pre_create" enctype="multipart/form-data" class="new_email" id="new_email" method="post" novalidate="novalidate">
                        <input id="authenticity_token" name="authenticity_token" type="hidden" value="9LTY7B2i2D9XKHygn/3rJpRuraEf3BPkCkU5ha8UHxI=">
                        <div class="input-block form-group">
                            <div class="form-label">Your name <span>(required)</span></div>
                            <input class="form-control" value="" id="interaction_name" maxlength="100" name="interaction[name]" type="text">
                        </div>
                        <div class="input-block form-group">
                            <div class="form-label">Your email address <span>(required)</span></div>
                            <input class="form-control" value="" id="interaction_name" maxlength="100" name="interaction[email]" type="email">
                        </div>
                        <div class="input-block">
                            <div class="dependent-dropdown">
                                <div class="form-label">Are you travelling or hosting? <span>(required)</span></div>
                                <select class="default xl" data-custom-value="Please select" data-dependency-map="{&quot;questions&quot;:{&quot;Traveller&quot;:[&quot;Book a vacation rental&quot;,&quot;Contact a host&quot;,&quot;Cancel my booking&quot;,&quot;Change my booking&quot;,&quot;Check-in details&quot;,&quot;Post reservation&quot;,&quot;Payment&quot;,&quot;Refund&quot;,&quot;Safety&quot;,&quot;Others&quot;],&quot;Host&quot;:[&quot;List my space&quot;,&quot;Manage my listings&quot;,&quot;Payout&quot;,&quot;Contact a guest&quot;,&quot;Cancel a booking&quot;,&quot;Modify a booking&quot;,&quot;Others&quot;]}}" data-name="customertype" data-options="[&quot;Traveller&quot;,&quot;Host&quot;]" data-top-data-value="false" id="dropdown-customertype" name="ticket[custom5]"><option value="" selected="selected">Please select</option>
                                    <option value="Traveller">Traveller</option>
                                    <option value="Host">Host</option></select>
                            </div>
                        </div>
                        <div class="input-block">
                            <div class="dependent-dropdown" style="display: none;">
                                <div class="form-label">What do you need help on?<span>(required)</span></div>
                                <select class="default xl" data-controlling-field="customertype" data-custom-value="Please select" data-dependency-map="{}" data-name="questions" data-options="[&quot;Book a vacation rental&quot;,&quot;Contact a host&quot;,&quot;Cancel my booking&quot;,&quot;Change my booking&quot;,&quot;Check-in details&quot;,&quot;Post reservation&quot;,&quot;Payment&quot;,&quot;Refund&quot;,&quot;Safety&quot;,&quot;List my space&quot;,&quot;Manage my listings&quot;,&quot;Payout&quot;,&quot;Contact a guest&quot;,&quot;Cancel a booking&quot;,&quot;Modify a booking&quot;,&quot;Others&quot;]" data-top-data-value="false" id="dropdown-questions" name="ticket[custom4]"><option value="" selected="selected">Please select</option>
                                    <option value="Book a vacation rental">Book a vacation rental</option>
                                    <option value="Contact a host">Contact a host</option>
                                    <option value="Cancel my booking">Cancel my booking</option>
                                    <option value="Change my booking">Change my booking</option>
                                    <option value="Check-in details">Check-in details</option>
                                    <option value="Post reservation">Post reservation</option>
                                    <option value="Payment">Payment</option>
                                    <option value="Refund">Refund</option>
                                    <option value="Safety">Safety</option>
                                    <option value="List my space">List my space</option>
                                    <option value="Manage my listings">Manage my listings</option>
                                    <option value="Payout">Payout</option>
                                    <option value="Contact a guest">Contact a guest</option>
                                    <option value="Cancel a booking">Cancel a booking</option>
                                    <option value="Modify a booking">Modify a booking</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>           
                        <div class="input-block">
                            <div class="form-label">
                                Subject <span>(required)</span>
                            </div>
                            <div>
                                <input class="form-control" id="email_subject" maxlength="100" name="email[subject]" type="text" value="">
                            </div>
                        </div>
                        <div class="input-block">
                            <div class="label">
                                Message <span>(required)</span>
                            </div>
                            <div>
                                <textarea class="form-control" id="email_body" name="email[body]"></textarea>
                            </div>
                        </div>
                        <div class="input-block">
                            <span class="label">
                                File Attachment
                            </span>
                            <div class="desk_file_upload">
                                <input name="case_attachment[attachment]" size="84" type="file">
                                <div class="faux-file-field">
                                    <input disabled="disabled" type="text">
                                </div>
                                <input value="Choose File" type="button">
                            </div><a href="javascript::void(0)" id="add_attachment" class="add_attachment" style="display:none;">Add Another Attachment</a>
                        </div>
                        <div>
                            <div class="input-button" style="margin-top: 12px;">
                                <input id="email_submit" class="btn btn-primary" name="commit" type="submit" value="Send Email">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>