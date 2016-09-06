<div class="container" style="margin-top: 72px; ">
    <form action="/customer/portal/articles/search" method="get" id="support-search" class="form-inline" role="form">
        <div class="outer">
            <div class="inner">
                <input type="text" id="q" name="q" maxlength="100" value="" class="ui-autocomplete-input form-control" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" placeholder="How can we help?">
                <input type="hidden" name="b_id" value="7855">
                <input type="submit" id="support-search-submit" value="Search" class="btn btn-primary">
            </div>
        </div>
    </form>
    <div id="support-main">

        <div class="support-body">
            <div class="content dashboard">
                <h3>Browse by Topic</h3>

                <table width="100%" cellspacing="0">
                    <tbody>
                        <?php if(!empty($topics)&&!empty($post_guides)):?>
                        <?php $number = count($topics);$topic_title = '';?>
                        <?php foreach ($post_guides as $row):?>
                        <?php if($topic_title!==$row->topic_title)?>
                        <tr class="row1">
                            <td class="col1">
                                <div class="topic topic642516">
                                    <h4>Getting Started</h4>
                                    <h5 class="articles">
                                        6
                                        Articles
                                        <a href="/customer/en/portal/topics/642516-getting-started/articles">View All</a>
                                    </h5>
                                    <ul>
                                        <li>
                                            <a href="/customer/en/portal/articles/1859338-how-it-works-">How it works?</a>
                                        </li>

                                        <li>
                                            <a href="/customer/en/portal/articles/1859339-planning-a-trip-">Planning a trip?</a>
                                        </li>

                                        <li>
                                            <a href="/customer/en/portal/articles/1859363-hosting-travellers-">Hosting travellers?</a>
                                        </li>

                                        <li>
                                            <a href="/customer/en/portal/articles/1952148-about-travelmob-homeaway-">About travelmob/HomeAway </a>
                                        </li>

                                        <li>
                                            <a href="/customer/en/portal/articles/1995100-about-the-revamped-homeaway-co-in">About the revamped HomeAway.co.in</a>
                                        </li>

                                    </ul>
                                </div>
                            </td>
                            <td class="col2">
                                <div class="topic topic704065">
                                    <h4>Account &amp; Settings</h4>

                                    <h5 class="articles">
                                        6
                                        Articles
                                        <a href="/customer/en/portal/topics/704065-account-settings/articles">View All</a>
                                    </h5>
                                    <ul>

                                        <li>
                                            <a href="/customer/en/portal/articles/1916897-how-do-i-create-an-account-">How do I create an account?</a>
                                        </li>

                                        <li>
                                            <a href="/customer/en/portal/articles/1692021-do-i-have-to-complete-my-profile-">Do I have to complete my profile?</a>
                                        </li>

                                        <li>
                                            <a href="/customer/en/portal/articles/1694837-how-do-i-change-my-password-">How do I change my password?</a>
                                        </li>

                                        <li>
                                            <a href="/customer/en/portal/articles/1859386-how-do-i-edit-my-profile-">How do I edit my profile?</a>
                                        </li>

                                        <li>
                                            <a href="/customer/en/portal/articles/1859405-how-do-i-verify-my-contact-details-">How do I verify my contact details?</a>
                                        </li>

                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr class="row2">
                            <td class="col1">
                                <div class="topic topic731741">
                                    <h4>For Guests (Travellers)</h4>

                                    <h5 class="articles">
                                        21
                                        Articles
                                        <a href="/customer/en/portal/topics/731741-for-guests-travellers-/articles">View All</a>
                                    </h5>
                                    <ul>

                                        <li>
                                            <a href="/customer/en/portal/articles/1916831-i-want-to-book-an-accommodation-how-does-it-work-">I want to book an accommodation. How doe...</a>
                                        </li>

                                        <li>
                                            <a href="/customer/en/portal/articles/1882852-how-do-i-contact-a-host-">How do I contact a host?</a>
                                        </li>

                                        <li>
                                            <a href="/customer/en/portal/articles/1884815-why-can-t-i-contact-the-host-via-email-or-phone-">Why can't I contact the host via em...</a>
                                        </li>

                                        <li>
                                            <a href="/customer/en/portal/articles/1897696-how-do-i-make-a-reservation-">How do I make a reservation?</a>
                                        </li>

                                        <li>
                                            <a href="/customer/en/portal/articles/1900367-what-payment-methods-can-i-use-to-make-a-reservation-">What payment methods can I use to make a...</a>
                                        </li>

                                    </ul>
                                </div>
                            </td>
                            <td class="col2">
                                <div class="topic topic753730">
                                    <h4>For Hosts (Property Owners)</h4>

                                    <h5 class="articles">
                                        22
                                        Articles
                                        <a href="/customer/en/portal/topics/753730-for-hosts-property-owners-/articles">View All</a>
                                    </h5>
                                    <ul>

                                        <li>
                                            <a href="/customer/en/portal/articles/1867551-how-do-i-list-my-property-">How do I list my property?</a>
                                        </li>

                                        <li>
                                            <a href="/customer/en/portal/articles/1877794-is-it-free-to-list-a-property-">Is it free to list a property?</a>
                                        </li>

                                        <li>
                                            <a href="/customer/en/portal/articles/1877814-when-do-i-get-paid-">When do I get paid?</a>
                                        </li>

                                        <li>
                                            <a href="/customer/en/portal/articles/1877816-how-do-i-update-by-payout-preference-">How do I update by payout preference?</a>
                                        </li>

                                        <li>
                                            <a href="/customer/en/portal/articles/1877819-tips-for-successful-hosting">Tips for successful hosting</a>
                                        </li>

                                    </ul>
                                </div>
                            </td></tr>
                        <tr class="row3">
                            <td class="col1">
                                <div class="topic topic760921">
                                    <h4>Safety &amp; Security</h4>

                                    <h5 class="articles">
                                        9
                                        Articles
                                        <a href="/customer/en/portal/topics/760921-safety-security/articles">View All</a>
                                    </h5>
                                    <ul>

                                        <li>
                                            <a href="/customer/en/portal/articles/1900385-how-do-i-pay-securely-for-my-reservation-">How do I pay securely for my reservation...</a>
                                        </li>

                                        <li>
                                            <a href="/customer/en/portal/articles/1900378-how-can-i-protect-myself-from-online-scam-or-fraud-">How can I protect myself from online sca...</a>
                                        </li>

                                        <li>
                                            <a href="/customer/en/portal/articles/1900386-what-is-phishing-">What is phishing?</a>
                                        </li>

                                        <li>
                                            <a href="/customer/en/portal/articles/1900387-how-do-i-report-a-phishing-email-">How do I report a phishing email?</a>
                                        </li>

                                        <li>
                                            <a href="/customer/en/portal/articles/1900388-safety-tips-for-guests">Safety tips for guests</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td class="col2">
                                <div class="topic topic760920">
                                    <h4>Mobile</h4>

                                    <h5 class="articles">
                                        2
                                        Articles
                                        <a href="/customer/en/portal/topics/760920-mobile/articles">View All</a>
                                    </h5>
                                    <ul>

                                        <li>
                                            <a href="/customer/en/portal/articles/1900375-where-can-i-download-the-ios-app-">Where can I download the iOS app?</a>
                                        </li>

                                        <li>
                                            <a href="/customer/en/portal/articles/1900376-where-can-i-download-the-android-app-">Where can I download the Android app?</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <?php endif;?>
                    </tbody></table>
            </div>
        </div>
        <div id="footer">

            <br>
            <a href="http://www.desk.com">Customer service software</a> powered by Desk.com
        </div>
    </div>
</div>