
<style type="text/css">

    /* Reset */
    html, body, div, span, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym,
    address, code, del, dfn, em, img, q, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption,
    tbody, tfoot, thead, tr, th, td { margin: 0; padding: 0; border: 0; font-size: 100%; font-family: inherit; vertical-align: baseline; outline: none; }
    html { font-size: 14px; height: 100%; line-height: 1.5em;}
    body { margin: 0; padding: 0; border: 0; font-family: 'Helvetica Neue', 'Helvetica', sans-serif; background: #F8F8F8; }
    h1, h2, h3, h4, h5, h6, p, address { color: #272727;}
    h3 { font-size: 24px; }
    h4 { font-size: 18px; }
    h5 { font-size: 14px; color: #414141; }
    a img { border: 0; }
    p { line-height: 18px; color: #535353; margin: 0 0 20px; }
    a { color: #254689; text-decoration: none; }
    a:link { color: #254689; }
    a:visited { color: #254689; }
    a:hover, a:focus { color: #254689; text-decoration: underline; }
    a:active { color: #254689; }

    /* Flash Messages */

    #flash {
        font-size: 20px;
        text-align: center;
        display:none;
    }

    .flash_html {
        display: inline;
    }

    .flash_ajax{
        display:block;
        margin:0 auto 0 -200px;
        position:fixed;
        top:0px;
        left:50%;
        width:400px;
        z-index:1003;
        color:#222;
    }

    .flash_html div, .flash_ajax div {
        text-align: center;
        font-size: 14px;
        margin: 0px auto;
        width: 400px;
        padding: 5px 40px;
        background-color: #FFFDD7;
        border-bottom: 3px solid #FDFBA8;
        border-left: 3px solid #FDFBA8;
        border-right: 3px solid #FDFBA8;
        -moz-border-radius-bottomleft: 5px;
        -moz-border-radius-bottomright: 5px;
        -webkit-border-bottom-left-radius: 5px;
        -webkit-border-bottom-right-radius: 5px;
    }

    .flash_ajax div.flash_error,
    .flash_html div.flash_error,
    .flash_ajax div.flash_critical,
    .flash_html div.flash_critical {
        border-color: #FF0000;
        background-color: #FFBABA;
    }

    /* Portal Wrappers */

    .wrapper {
        margin: 0 auto;
        width: 950px;
    }

    #company-support-portal {
        padding: 0 0 10px;
        overflow: hidden;
    }

    /* Breadcrumbs */

    #breadcrumbs {
        color: #888888;
        float: left;
        line-height: 30px;
        margin: 0 0 10px;
        width: 55%;
    }

    #status-update {
        float: right;
        margin-right: 250px;
    }

    #status-update .myaccount-form {
        padding-top: 0;
    }

    /* Portal Company Header */

    #company-header {
        background: #000;
        padding: 20px 0 0 0;
    }

    #company-header h1 {
        background: url('https://cdn.desk.com/images/portal/portal-icon.png') 0 center no-repeat;
        color: #FFF;
        font-size: 25px;
        padding: 0 0 0 35px;
        float: left;
    }

    #company-header a {
        color: #FFF;
    }

    #company-header a:hover {
        color: #999;
        text-decoration: none;
    }

    #customer-account {
        float: right;
        color: #FFF;
        margin: 3px 0 0;
    }

    #customer-account span {
        float: left;
        padding: 4px 9px;
        font-weight: bold;
    }

    #customer-account a {
        float: left;
        display: inline-block;
        padding: 4px 9px;
        background: #2B2B2B;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
    }

    #customer-account a:hover {
        background: #3B3B3B;
        color: #FFF;
    }

    /* Portal Support Header */

    #support-header {
        background: #E5E5E5;
        padding: 20px 0;
    }

    #support-header .wrapper {
        position: relative;
    }

    #support-header h2 {
        font-size: 32px;
        display: none;
        text-shadow: 0 1px 0 #FFF;
    }

    /* Support Side Column */

    #support-side {
        float: left;
        margin: 0 0 0 20px;
        width: 230px;
    }

    #support-side .content {
        margin: 0 0 40px;
    }

    #support-side h3 {
        margin: 20px 0 10px 0;
        padding: 0 0 20px 0;
    }

    #support-side ul {
        list-style: none;
    }

    #support-side li {
        margin: 0 0 5px;
    }

    /* Support Side Column Twitter */

    #tweets .tweet_avatar {
        display: none;
    }

    #tweets .tweet_time a {
        color: #999;
        display: block;
    }

    #tweets li {
        margin: 0 0 20px;
        line-height: 18px;
    }

    /* Support Side Twitter Widget */

    #support-side .twitter-timeline-rendered {
        margin-top: 20px;
    }

    #support-side a.twitter-timeline {
        clear: both;
        display: block;
        margin-top: 20px;
    }

    /* Support Main Column */

    #support-main {
        float: left;
        width: 700px;
    }

    #support-main.main-customer-feedback {
        float: none;
        margin: 60px auto;
    }

    #support-main .support-body {
        background: #FFF;
    }

    #support-main .content {
        overflow: hidden;
        padding: 20px;
    }

    #support-main .headline-image {
        margin-top: 5px;
    }

    /* Support Main Column Headers */

    #support-main h3 {
        margin: 0 0 20px;
        padding: 0 0 20px;
    }

    #support-main h3.verify-title {
        background: url('/images/twitter-small.gif') no-repeat 0 3px;
        padding-left: 35px;
    }

    #support-main h4 {
        margin: 0 0 12px;
    }

    #support-main h5 {
        margin: 0 0 9px;
    }

    #support-main h5 a {
        background: #F9F9F9;
        color: #666;
        font-size: 11px;
        padding: 2px 6px;
        margin: -2px 0 0 9px;
        position: absolute;
        text-decoration: none;
        -moz-border-radius: 24px;
        -webkit-border-radius: 24px;
    }

    /* Dashboard */

    #support-main .dashboard h5 a:hover {
        text-decoration: none;
        color: #FFF;
        background: #254689;
    }

    #support-main .dashboard td {
        padding: 20px 0 10px;
    }

    #support-main .dashboard .row1 td {
        padding: 0 0 10px;
    }

    #support-main .dashboard .last td {
        border-bottom: none;
    }

    #support-main .dashboard .topic {
        margin: 0;
    }

    #support-main .dashboard .topic ul {
        color: #254689;
        margin: 0 15px 20px 0;
        list-style: none;
    }

    #support-main .dashboard .topic li {
        margin: 0 0 12px;
    }

    #support-main .dashboard .topic li.featured a {
        background: #FAFBCA;
        font-weight: bold;
    }

    #support-main .dashboard h5 {
        color: #888888 !important;
        height: 30px;
        font-size: 12px;
        text-transform: uppercase;
    }

    #support-main .dashboard h5.questions {
        background-position: 0 -109px;
    }

    /* Article Lists */

    #support-main .articles ul {
        list-style: none;
    }

    #support-main .articles h4 {
        margin: 0 0 5px;
        font-weight: normal;
    }

    #support-main .articles li {
        margin: 0 0 30px;
    }

    #support-main .articles li.question {
        background: url('https://cdn.desk.com/images/portal/icon-types.png') 0 3px no-repeat;
        padding: 0 0 0 40px;
    }

    #support-main .articles li.article {
        background: url('https://cdn.desk.com/images/portal/icon-types.png') 0 -276px no-repeat;
        padding: 0 0 0 40px;
    }

    #support-main .articles li.question.featured {
        background-position: 0 -138px;
    }

    #support-main .articles li.article.featured {
        background-position: 0 -415px;
    }

    #support-main .articles li.featured h4 a {
        font-weight: bold;
        background: #FAFBCA;
    }

    #support-main .articles li p {
        margin: 0 0 5px;
        color: #777;
    }

    #support-main .articles .condensed {
        background: #FFFDF4;
        border: 1px solid #E3DEBF;
        margin: 0 0 30px;
        padding: 20px 20px 0;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
    }

    #support-main .articles .condensed li {
        margin: 0;
        padding: 0;
    }

    #support-main .articles .condensed h4 {
        font-size: 15px;
    }

    #support-main .articles .condensed p {
        margin: 0 0 20px 30px;
        color: #777;
    }

    #support-main .articles .condensed a {
        margin: 0 0 20px 30px;
    }

    /* Article List Metas */

    #support-main #search-results .meta,
    #support-main .articles .meta {
        text-transform: uppercase;
        font-size: 11px;
        color: #888888;
        margin: 5px 0;
    }

    #support-main .articles .meta .answered {
        background: url('https://cdn.desk.com/images/portal/check.png') 0 center no-repeat;
        border-right: 1px solid #DDD;
        color: #549b07;
        padding: 0 5px 0 14px;
        margin: 0 5px 0 0;
    }

    #support-main .articles .meta .count,
    #support-main .articles .meta .date,
    #support-main .question-details .meta .name {
        margin: 0 5px 0 0;
        padding: 0 5px 0 0;
        border-right: 1px solid #DDD;
    }

    /* Article List Toggles */

    #toggle div {
        float: right;
        margin: -62px 0 0 0;
    }

    #toggle a {
        background: #FFF;
        color: #666;
        font-size: 11px;
        font-weight: bold;
        padding: 5px 7px;
        text-decoration: none;
        text-transform: uppercase;
        -moz-border-radius: 24px;
        -webkit-border-radius: 24px;
    }

    #toggle a:hover {
        text-decoration: none;
        color: #FFF;
        background: #254689;
    }

    #toggle .active, #toggle a.active:hover {
        background: #DDD;
        color: #000;
    }

    /* Page Title */

    #support-main .title {
        border-bottom: 1px solid #CCC;
        margin: 0 0 20px 0;
        padding: 0 0 20px 0;
    }

    #support-main .title h3 {
        margin: 0 0 3px;
        padding: 0;
        border: 0;
    }

    #support-main .title .meta {
        margin: 0;
        color: #888888;
    }

    /* Article View & Question View */

    #support-main .article-content h1,
    #support-main .article-content h2,
    #support-main .article-content h3,
    #support-main .article-content h4,
    #support-main .article-content h5,
    #support-main .answer-details h1,
    #support-main .answer-details h2,
    #support-main .answer-details h3,
    #support-main .answer-details h4,
    #support-main .answer-details h5 {
        margin: 0 0 20px;
    }

    #support-main .article-content h1, #support-main .answer-details h1 {
        font-size: 22px;
    }

    #support-main .article-content h2, #support-main .answer-details h2 {
        font-size: 20px;
    }

    #support-main .article-content h3, #support-main .answer-details h3 {
        font-size: 18px;
    }

    #support-main .article-content h4, #support-main .answer-details h4 {
        font-size: 16px;
    }

    #support-main .article-content h5, #support-main .answer-details h5 {
        font-size: 15px;
    }

    #support-main .article-content ul, ol, #support-main .answer-details ul, #support-main .answer-details ol {
        margin-left:15px;
        list-style-position:inside;
    }
    #support-main .article-content p {
        margin:0;
    }
    #support-main .article-content blockquote, #support-main .article-content q,
    #support-main .answer-details blockquote, #support-main .answer-details q {
        margin: 0.80em 0 0.80em 20px;
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
        quotes: "" "";
    }
    #support-main .article-content blockquote p, #support-main .article-content q p,
    #support-main .answer-details blockquote p, #support-main .answer-details q p {
        margin: 0;
        padding: 0.80em;
        color: #666;
        background: inherit;
    }

    /* Article View Attachments */

    #attachments {
        border-bottom: 1px solid #CCC;
        padding: 0 0 20px;
        margin: 20px 0 0;
    }

    #attachments strong {
        background: url('https://cdn.desk.com/images/attachment.png') -1px 0 no-repeat;
        display: block;
        margin: 0 0 10px;
        padding: 0 0 0 16px;
    }

    #attachments ul {
        list-style: none;
    }

    /* Article View Rating */

    #rate_article_container {
        margin: 20px 0 0 0;
    }

    #rate_article div {
        color: #265007;
        float: left;
        width: 100%;
        margin: 0 0 6px;
        font-style: italic;
        height: 1%;
    }

    #rate_article_container a {
        background: url('https://cdn.desk.com/images/portal/rating-arrows.gif') center 4px no-repeat;
        overflow: hidden;
        float: left;
        width: 20px;
        height: 16px;
        overflow: hidden;
        border: 1px solid #ccc;
        text-indent: -999px;
        margin: -2px 5px 0 0;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
    }

    #rate_article_container .rate-link-down {
        color: #9b0909;
    }

    #rate_article_container .rate-link-down a {
        background-position: center -28px;
    }

    #rate_article_container span {
        float: left;
    }

    /* Question View */

    #support-main .question {
        padding: 0;
    }

    #support-main .question .question-body {
        background: #FFFDF4;
        border-bottom: 1px solid #E3DEBF;
        margin: 0 0 20px;
        overflow: hidden;
        padding: 20px 20px 0;
    }

    #support-main .question .gravatar-wrapper {
        float: left;
        border: 1px solid #CCC;
        width: 56px;
        height: 56px;
    }

    #support-main .question .gravatar {
        float: left;
        border: 3px solid #FFF;
    }

    #support-main .question .question-details {
        padding: 0 0 0 70px;
    }

    #support-main .question .question-details h3 {
        border: 0;
        margin: 0 0 5px;
        padding: 0;
    }

    #support-main .question .question-details .meta {
        font-size: 11px;
        font-weight: bold;
        text-transform: uppercase;
    }
    #support-main .question .meta {
        font-weight: bold;
        margin: 0 0 10px;
    }

    /* Question Answers */

    #support-main .question .replies {
        padding: 0 20px;
        margin: 0 0 20px;
    }

    #support-main .question .replies h4 {
        border-bottom: 1px solid #CCC;
        font-size: 15px;
        margin: 0;
        padding: 10px 0;
        text-transform: uppercase;
    }

    #support-main .question .replies.agents h4 {
        background: url('https://cdn.desk.com/images/portal/check.png') 0 center no-repeat;
        padding: 10px 0 10px 20px;
    }

    #support-main .question .replies.agents .reply {
        background: #FFF;
        padding: 20px 0 0;
    }

    #support-main .question .reply {
        margin: 0;
        overflow: hidden;
        height: 1%;
        padding: 20px 0 0 70px;
        position: relative;
    }

    #support-main .question .answer-details,
    #support-main .myportal .interaction-details {
        padding: 0 0 0 70px;
    }

    #support-main .question .answer-details .meta {
        float: left;
        width: 100%;
        margin: 0;
    }

    #support-main .question .answer-details .meta span {
        display: block;
    }

    #support-main .question .answer-details .meta span.date {
        float: none;
        display: block;
        margin: 0 0 10px;
        font-size: 11px;
        font-weight: bold;
        color: #666;
        text-transform: uppercase;
    }

    #support-main .question .answer-details .meta span.date-short {
        float: none;
        display: block;
        margin: 0;
        font-size: 11px;
        font-weight: bold;
        color: #666;
        text-transform: uppercase;
    }

    #support-main .question .answer-details .answer-body {
        margin-bottom: 20px;
    }

    #support-main .interactions .interaction-details .interaction-body {
        margin-top: 10px;
    }

    /* Question View Rating */

    #support-main .question .answer-rating {
        font-size: 20px;
        height: 53px;
        line-height: 20px;
        position: absolute;
        margin: 0 0 0 -70px;
        *margin: 0 0 0 -120px;
        text-align: center;
        width: 54px;
    }

    #support-main .question .answer-rating div {
        border: 1px solid #CCC;
        padding: 4px;
        height: 48px;
        overflow: hidden;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
    }

    #support-main .question .answer-rating a {
        background: url('https://cdn.desk.com/images/portal/rating-arrows.gif') center top no-repeat;
        display: block;
        height: 14px;
        text-align: center;
        text-indent: -900px;
        overflow: hidden;
    }

    #support-main .question .answer-rating .decrement {
        background-position: center -25px;
    }

    #support-main .question .dialog {
        display: none;
    }

    #support-main .question .rating-true .score {
        display: inline-block;
        margin: 5px 0 0 0;
    }

    #support-main .question .rating-true .dialog {
        display: inline-block;
        color: #999;
        font-weight: bold;
        font-size: 11px;
        text-transform: uppercase;
    }

    #support-main .question .score-positive {
        color: #396905;
    }

    #support-main .question .score-negative {
        color: #69050c;
    }

    /* Question View and Private Portal Reply Form */

    #support-main .question #form,
    #support-main .myportal #form {
        background: #f8f8f8;
        border: 1px solid #CCC;
        margin: 20px;
        padding: 20px;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
    }

    #support-main .question .form-notice,
    #support-main .myportal .form-notice {
        border-top: 1px solid #DDD;
        margin: 0 20px 20px;
        padding: 15px 0 0 0;
    }

    #support-main .question #form h4,
    #support-main .myportal #form h4 {
        font-size: 15px;
        text-transform: uppercase;
        margin: 0 0 20px;
        padding: 0;
    }

    #support-main .question #form .input-block input[type=text],
    #support-main .question #form .input-block textarea,
    #support-main .myportal #form .input-block textarea {
        width: 610px;
    }

    /* Pre Create Headers */

    #support-main .pre-create h4 {
        margin: 0 0 30px 0;
    }

    #support-main .pre-create ul h4 {
        margin: 0;
    }

    /* Support Forms */

    #form .label {
        display: block;
        font-weight: bold;
        margin: 0 0 5px;
    }

    #form .label span {
        color: #999;
    }

    #form .input-block input[type=text],
    #form .input-block textarea {
        /*display: block;*/
        font-size: 13px;
        margin: 0 0 20px;
        width: 650px;
    }

    #form .input-block textarea {
        height: 200px;
    }

    #form .input-block select {
        margin: 0 0 20px;
    }

    #form .input-block .input-radio-group {
        margin: 0 0 20px;
    }

    #form .input-button input {
        background: url('https://cdn.desk.com/images/portal/button.gif') 0 0 repeat-x;
        border: 0;
        color: #FFF;
        font-size: 12px;
        font-weight: bold;
        padding: 0 6px;
        height: 32px;
        text-transform: uppercase;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        cursor: pointer;
    }

    #form .input-button .disabled {
        background-position: 0 -38px;
    }

    #form .input-button img {
        display: none;
        margin: 7px 0 0 5px;
        position: absolute;
    }

    #form label.invalid {
        color: red;
        display: inline-block;
        margin: -20px 0 20px 0;
    }

    /* Pagination */

    #paginate_block {
        margin: 0;
        position: auto;
        text-align: center;
        width: 100%;
    }

    #paginate_block .pagination {
        background-color: #FFF;
        height: auto;
        margin: 0;
        padding-top: 0;
        position: auto;
        width: auto;
    }

    #paginate_block .current {
        background-color: #DDD;
        border: 1px solid #CCC;
        padding: 4px;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
    }

    /* Small Search */

    .support-search-small {
        position: absolute;
        right: 0;
        top: 3px;
        width: 230px;
    }

    .support-search-small div {
        position: relative;
    }

    .support-search-small #support-search-submit {
        background: url('https://cdn.desk.com/images/portal/search.gif') no-repeat;
        border: 0;
        cursor: pointer;
        height: 18px;
        line-height: 900px;
        overflow: hidden;
        position: absolute;
        right: 0px;
        text-indent: 900px;
        top: 9px;
        width: 21px;
    }

    .support-search-small #q {
        border: 0;
        border: 1px solid #CCC;
        color: #000;
        font-size: 13px;
        font-weight: bold;
        height: auto;
        margin-left: 0;
        margin-top: 0;
        padding: 7px 30px 7px 5px;
        width: 195px;
        outline: none;
        outline-width: 0;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
    }

    /* Big Search */

    .support-search-big {
        margin: 0pt 0pt 30px;
        -moz-border-radius: 6px;
        -webkit-border-radius: 6px;
    }

    .support-search-big .outer {
        position: relative;
    }

    .support-search-big .inner {
        background: #FFF;
        border: 1px solid #DDD;
        overflow: hidden;
        height: 46px;
        margin: 0;
        padding: 0 5px;
        width: 774px;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
    }

    .support-search-big #q {
        font-size: 18px;
        border: 0pt none;
        width: 100%;
        padding: 13px 0 0 13px;
        margin: 0;
        outline: none;
        outline-width: 0;
        background: none;
    }

    .support-search-big #support-search-submit {
        background: url('https://cdn.desk.com/images/portal/button.gif') 0 0 repeat-x;
        color: #FFF;
        cursor: pointer;
        position: absolute;
        right: 0;
        _right: 6px;
        top: 0;
        padding: 0;
        width: 140px;
        height: 48px;
        border: 0;
        margin: 0;
        text-transform: uppercase;
        font-size: 16px;
        font-weight: bold;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }

    /* Footer */

    #footer {
        display: block;
        clear: both;
        color: #999;
        padding: 20px 0 30px;
    }

    #footer a {
        color: #999;
        text-decoration: none;
    }

    #question-mask {
        color: #aaa;
        position: absolute;
        width: 90%;
        white-space: nowrap;
        overflow-x: hidden;
        overflow-y: hidden;
        display: block;
        text-overflow: ellipsis;
    }

    .question-big {
        font-size: 20px;
        top: 13px;
        left: 13px;
    }

    .question-small {
        font-size: 13px;
        top: 0;
        left: 0;
        padding: 6px;
    }

    .search-bg {
        display: none;
    }

    .highlight{
        background-color: #FFFAE1;
    }

    /* Modals */

    #modal-screen {
        background: #000;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 200;
    }

    #modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 300;
    }

    #modal .inner {
        background: rgba(0,0,0,0.4);
        width: 700px;
        left: 50%;
        top: 50%;
        margin: -230px 0 0 -350px;
        position: absolute;
        padding: 5px;
        -moz-border-radius: 7px;
        -webkit-border-radius: 7px;
    }

    #modal .inner h1 {
        text-align: center;
        font-size: 27px;
        padding: 25px 0 0;
    }

    #modal .inner p.subheader {
        font-size: 18px !important;
        color: #767676 !important;
        text-align: center;
        margin: 4px 0 30px 0;
    }

    #modal .inner .input-button {
        text-align: center;
        padding: 0 0 30px;
        font-size: 12px;
        font-weight: bold;
    }

    #modal .inner .input-button input {
        margin: 0 0 0 10px;
    }

    #modal .inner .note {
        text-align: center;
        color: #616161;
        margin: 0 0 20px 0 !important;
        font-size: 15px;
        font-style: italic;
    }

    #modal .main {
        background: #FFF;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
    }

    #modal .close {
        float: right;
        margin: -16px -16px 0 0;
    }

    /* Auto Completion */

    .ui-autocomplete {
        background: #FFF;
        border: 1px solid #C0C0C0;
        width: 100px;
        list-style: none;
        margin: 0;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
    }

    .ui-autocomplete a {
        padding: 9px;
        cursor: pointer;
        display: block;
    }

    .ui-autocomplete a:hover,
    .ui-autocomplete a.ui-state-hover {
        background: #FFFAE1;
        text-decoration: none;
    }

    .ui-autocomplete li:first-child a {
        -moz-border-radius: 5px 5px 0 0;
        -webkit-border-top-left-radius: 5px;
        -webkit-border-top-right-radius: 5px;
    }

    .ui-autocomplete li:last-child a {
        -moz-border-radius: 0 0 5px 5px;
        -webkit-border-bottom-left-radius: 5px;
        -webkit-border-bottom-right-radius: 5px;
    }

    .ui-autocomplete .KbArticle,
    .ui-autocomplete .QnaThread {
        background: url('https://cdn.desk.com/images/portal/icon-types-small.png') 0 4px no-repeat;
        display: block;
        padding: 0 0 0 25px;
        overflow: hidden;
    }

    .ui-autocomplete .QnaThread {
        background-position: 0 -106px;
    }

    .ui-autocomplete .article-autocomplete-subject {
        display: block;
        font-weight: bold;
        font-size: 15px;
    }

    .ui-autocomplete .article-autocomplete-body {
        display: block;
        font-size: 13px;
        color: #666;
    }

    /* Get Satisfaction Styles */
    .gs-idea {
        background: url('https://cdn.desk.com/images/portal/getsatisfaction/idea_mini.png') 0 0 no-repeat !important;
        background-position: 0px 1px;
    }

    .gs-question {
        background: url('https://cdn.desk.com/images/portal/getsatisfaction/question_mini.png') 0 0 no-repeat !important;
        background-position: 0px 1px;
    }

    .gs-praise {
        background: url('https://cdn.desk.com/images/portal/getsatisfaction/praise_mini.png') 0 0 no-repeat !important;
        background-position: 0px 1px;
    }

    .gs-update {
        background: url('https://cdn.desk.com/images/portal/getsatisfaction/update_mini.png') 0 0 no-repeat !important;
        background-position: 0px 1px;
    }

    .gs-problem {
        background: url('https://cdn.desk.com/images/portal/getsatisfaction/problem_mini.png') 0 0 no-repeat !important;
        background-position: 0px 1px;
    }

    .gs_search_result {
        width:100% !important;
    }

    #gs_Sidebar_Results .tweet_time, .gs-search-result {
        padding-left: 20px;
    }

    #gs_search_title h5 {
        font-size:20px;
        border-bottom:1px solid #DDDDDD;
        margin:0 0 20px;
        padding:0 0 20px;
    }

    #question-best-answer {
        border: 1px solid #ddd;
        background: #FFF;
        border-radius: 5px;
        margin: 0 0 25px 70px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        padding: 20px 20px 0;
    }

    #support-main .agent-answer-label {
        margin: 0 0 10px;
    }

    #support-main #question-best-answer .reply {
        height: 1%;
        margin: 0;
        overflow: hidden;
        padding: 0;
        position: relative;
    }

    #support-main .best-answer-green {
        position: absolute;
        right: 0;
        background: url('https://cdn.desk.com/images/portal/check.png') 0 center no-repeat;
        padding: 0 0 0 15px;
        color: #6db400;
        font-weight: bold;
    }

    #support-main .best-answer-green a {
        color: #6db400;
    }

    #support-main .best-answer-green a:hover {
        text-decoration: none;
    }

    #support-main #question-best-answer-heading {
        margin: 30px 0 10px 0;
    }

    #social-share {
        float: left;
        width: 80px;
        margin-left: -90px;
    }

    #social-share .share-btn {
        margin: 0 auto 15px auto;
        width: 60px;
        text-align: center;
    }

    #social-share .share-btn .fb-like {
        margin-left: 6px;
    }

    /* Private Portal */

    #support-main .myportal .content {
        background: #FFF;
    }

    .myportal-label {
        margin: 0 0 8px 0;
        padding-left: 22px;
        background: url('../images/mail.png') 0 0 no-repeat;
    }

    .myportal .mycases-filters {
        padding: 20px 0 0 0;
        height: 50px;
    }

    .myportal .a-selectbox {
        border: 1px solid #BEBEBE;
        border-radius: 4px;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        background: #FFF;
        -webkit-border-image: none;
        display: block;
        float: left;
        padding: 4px;
        text-decoration: none;
        zoom: 1;
    }

    .myportal .a-selectbox select {
        background: url("/images/arrow_down.png") right 0px no-repeat;
        border: none;
        box-sizing: border-box;
        white-space: pre;
        appearance: textfield;
        -moz-appearance: textfield;
        -webkit-appearance: textfield;
        padding: 2px 3px;
        font-size: 12px;
        width: 190px;
    }

    .myportal .a-checkbox {
        float: left;
        margin: 5px;
        color: #333;
        font-size: 11px;
    }

    .myportal-button, .myportal-button:visited {
        float: right;
        padding: 8px 6px;
        border: 0;
        background: url(/images/portal/button.gif) 0 0 repeat-x;
        font-weight: bold;
        font-size: 11px;
        display: block;
        border-radius: 3px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        color: #fff !important;
        text-transform: uppercase;
    }

    .myportal-button:hover {
        text-decoration: none;
    }

    .myportal .mycases {
        background:#E5E5E5;
        width: 100%;
        border-collapse:collapse;
        font:normal 12px verdana, arial, helvetica, sans-serif;
        margin: 0px 0px 30px 0px;
        -moz-box-shadow: 0 3px 4px #CCC;
        -webkit-box-shadow: 0 3px 4px #CCC;
    }

    .myportal .mycases caption {
        border:1px solid #5C443A;
        color:#5C443A;
        font-weight:bold;
        letter-spacing:20px;
        padding:6px 4px 8px 0px;
        text-align:center;
        text-transform:uppercase;
    }

    .myportal .mycases td, th {
        color:#363636;
        padding: 11px 5px;
    }

    .myportal .mycases tr {
        background: #FFF;
        border: 1px solid #ccc;
    }

    .myportal .mycases tbody tr:hover {
        cursor: pointer;
    }

    .myportal .mycases thead th, tfoot th {
        background: #E8E8E8;
        font-size: 10px;
        font-weight: bold;
        color:#666;
        padding: 6px 5px;
        text-align:left;
        text-transform:uppercase;
    }

    .myportal .mycases a {
        text-decoration:none;
    }

    .myportal .mycases a:hover {
        text-decoration: underline;
    }

    .myportal .mycases tbody th, .myportal .mycases tbody td {
        text-align:left;
        vertical-align:middle;
    }

    .myportal .mycases tfoot td {
        background:#5C443A;
        color:#FFFFFF;
        padding-top:3px;
    }

    .myportal .mycases .a-casechannel {
        text-align: center;
        vertical-align: middle;
        width: 20px;
        padding: 11px 0 11px 11px;
    }

    .myportal .case-block{
        float: left;
        margin-right: 60px;
    }

    .myportal .a-caseid {
        padding-left: 15px;
    }

    .myportal .a-caseid, .myportal .a-casestatus {
        width: 70px;
    }

    .myportal .a-casecreated {
        width: 60px;
    }

    #support-main .case {
        padding: 0;
    }

    #support-main .myportal .case-details, #support-main .myportal .interaction {
        padding: 25px 20px;
    }

    #support-main .myportal .interaction {
        min-height: 60px;
        padding-bottom: 0;
    }

    #support-main .myportal .case-details {
        background-color: #fffdef;
    }

    #support-main .myportal .case-details h3 {
        border: 0;
        margin: 0 0 20px;
        padding: 0;
        width: 510px;
        font-size: 18px;
        vertical-align: top;
        float: left;
    }

    #support-main .myportal .status {
        float: right;
        font-weight: bold;
    }

    #support-main .myportal .status img {
        vertical-align: middle;
    }

    #support-main .myportal .status .a-New,
    #support-main .myportal .status .a-Open,
    #support-main .myportal .status .a-Pending,
    #support-main .myportal .status .a-Resolved,
    #support-main .myportal .status .a-Closed {
        color: #fff;
        padding: 2px 8px;
        font-weight:bold;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
    }

    #support-main .myportal .status .a-New {
        background-color: #5B75AF;
        border: #465A86 1px solid;
    }

    #support-main .myportal .status .a-Open {
        background-color: #61A00F;
        border: #4A7B0B 1px solid;
    }

    #support-main .myportal .status .a-Pending {
        background-color: #DE901B;
        border: #AA6E14 1px solid;
    }

    #support-main .myportal .status .a-Resolved {
        background-color: #A5A5A5;
        border: #7E7E7E 1px solid;
    }

    #support-main .myportal .status .a-Closed {
        background-color: #DE901B;
        border: #AA6E14 1px solid;
    }

    #support-main .myportal .meta {
        clear: both;
        color: #888;
        line-height: 16px;
    }

    #support-main .myportal .meta strong {
        color: #000;
    }

    .myportal #paginate_block .pagination {
        background-color: transparent;
    }

    /* Private Portal - Case Detail */

    #support-main .myportal .case-details .meta span.date,
    #support-main .myportal .interaction-details span.date {
        margin: 0;
        color: #888;
    }

    #support-main .myportal .interaction-details span.date {
        float: right;
        text-align: right;
    }

    #support-main .myportal .meta .case-data {
        list-style: none;
        width: 50%;
        float: left;
        position: relative;
    }

    #support-main .myportal .meta .case-dates {
        list-style: none;
        width: 50%;
        float: right;
        position: relative;
    }

    #support-main .myportal .meta .case-dates strong {
        display: inline-block;
        text-align: right;
        width: 50%;
        *display: inline;
        zoom: 1;
    }

    #support-main .myportal .meta .name {
        font-weight: bold;
        text-transform: uppercase;
    }

    #support-main .myportal .interactions {
        border-top: 1px solid #E3DEBF;
        padding-bottom: 20px;
    }

    #customer-account a {
        margin-left: 9px;
    }

    #support-main .myportal .gravatar-wrapper {
        position: absolute;
        border: 1px solid #CCC;
        width: 56px;
        height: 56px;
    }

    #support-main .myportal .gravatar {
        float: left;
        border: 3px solid #FFF;
    }

    #support-main .myportal .gravatar.twitter-avatar {
        border: 4px solid #fff;
    }

    #support-main .myportal .interaction-details .meta {
        width: 100%;
        margin: 0;
    }

    #support-main .myportal .interactions .system-message {
        padding: 15px 20px 0 20px;
        color: #aaa;
        font-size: 12px;
    }

    #support-main .myportal .interactions .chat {
        padding: 18px 20px 10px;
    }

    #support-main .myportal .interactions .chat .interaction-details {
        padding: 0;
    }

    #support-main .myportal .interactions .chat .interaction-details .meta span {
        color:#000;
        font-weight:bold;
    }

    #support-main .myportal .interactions .chat .interaction-details .meta span.date {
        color: #888;
        font-weight: normal;
    }

    #support-main .myportal .interactions .chat .interaction-body {
        padding-right: 50px;
        margin-top: 5px;
    }

    #support-main .myportal .case-footer {
        border-top: 1px solid #ccc;
        margin-top: 20px;
        padding: 25px 20px 0;
    }

    #support-main .myportal .case-footer p {
        margin-bottom: 5px;
    }

    /* Private Portal - My Profile */

    .myaccount-form {
        padding-top: 20px;
    }

    .myaccount-form .new_customer_contact_email {
        padding: 30px 0;
        border-top: 1px solid #DDD;
    }

    .myaccount-form div img {
        vertical-align: middle;
    }

    .myaccount-form div[id^="email_"],
    .myaccount-form div[id^="twitter_user_"],
    .myaccount-form div[id^="facebook_user_"],
    .myaccount-form div[id^="add_"] {
        padding: 15px 0;
        font-size: 14px;
        color: #666;
        position: relative;
        border-top: 1px solid #DDD;
    }

    .myaccount-form div[id^="twitter_user_"] form div,
    .myaccount-form div[id^="facebook_user_"] form div {
        position: absolute;
        top: 10px;
        right: 0px;
    }

    .myaccount-form div[id^="email_"] div[id^="delete_"] form div {
        position: absolute;
        top: 10px;
        right: 78px;
    }

    .myaccount-form input[id^="update_status"]:disabled {
        cursor: help;
    }

    .myaccount-form div[id^="verified_"] input,
    .myaccount-form div[id^="delete_"] input,
    .myaccount-form input[id^="update_status"],
    .myaccount-form input[id^="update_status"]:disabled {
        background-color: #f9f9f9;
        border: 1px solid #cfcfcf;
        color: #666;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        cursor: pointer;
        padding: 6px 15px 7px;
        height: 30px;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 10px;
    }

    .myaccount-form div[id^="verified_"] input:hover,
    .myaccount-form div[id^="delete_"] input:hover,
    .myaccount-form input[id^="update_status"]:hover {
        background-color: #fff;
        border-color: #b4b4b4;
    }

    .myaccount-form div[id^="email_"]:hover,
    .myaccount-form div[id^="twitter_user_"]:hover,
    .myaccount-form div[id^="facebook_user_"]:hover,
    .myaccount-form div[id^="add_"]:hover {
        background-color:#f9f9f9;
    }

    #authentication-verification-copy {
        display: inline-block;
        padding-left: 20px;
        width: 50%;
        zoom: 1;
        *display: inline;
    }

    .authentication_verification-form {
        display: inline-block;
        height: 100px;
        zoom: 1;
        *display: inline;
    }

    .authentication_verification-form form {
        background-color: #eefaff;
        display: inline-block;
        padding: 25px 20px;
        zoom: 1;
        *display: inline;
    }

    .myaccount-form .verified,
    .authentication_verification-form .verified {
        position: absolute;
        top: 10px;
        right: 0;
        color: #3d8933;
        padding: 7px 1px 0 0;
        font-weight: bold;
        font-size: 13px;
    }

    .myaccount-form div[id^="email_"] .verified form div,
    .myaccount-form div[id^="twitter_user_"] .verified form div,
    .myaccount-form div[id^="facebook_user_"] .verified form div {
        margin-top: -7px;
    }

    .myaccount-form input[type="text"],
    .authentication_verification-form input[type="text"] {
        font-size: 12px;
        border: 1px solid #C0C0C0;
        float: left;
        margin: 0 5px 8px 0;
        width: 195px;
        padding: 8px 4px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
    }

    .myaccount-form button,
    .authentication_verification-form button {
        height: 32px;
        padding: 0 6px;
        border: 1px solid #C0C0C0;
        background: url('/images/portal/button.gif') 0 0 repeat-x;
        color: #FFF;
        cursor: pointer;
        border: 0;
        float: left;
        margin: 0;
        text-transform: uppercase;
        font-size: 13px;
        font-weight: bold;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }

    .myaccount-form label.invalid,
    .authentication_verification-form label.invalid {
        font-weight: normal;
        display: block !important;
        clear: both;
        margin: 10px 0 20px 0;
    }

    /* Private Portal - Login and Registration */

    .login-form, .registration-form, .forgotpw-form, .alternatelogins {
        padding: 20px 0;
    }

    .alternatelogins {
        float: right;
        padding: 20px 0;
    }

    .login-form .field label, .registration-form .field label, .forgotpw-form .field label {
        font-weight: bold;
        font-size: 14px;
        display: block;
    }

    .login-form .field input, .registration-form .field input, .forgotpw-form .field input {
        font-size: 14px;
        border: 1px solid #999;
        display: block;
        margin: 4px 0 15px 0;
        width: 250px;
        padding: 8px 4px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
    }

    .login-form .actions input {
        width: 80px;
        margin-bottom: 40px;
    }

    .login-form .newaccount, .login-form .forgotpw {
        font-weight: bold;
        float: left;
    }

    .login-form .forgotpw {
        margin-left: 8px;
        padding-left: 8px;
        border-left: 1px solid #999;
    }

    .registration-form label.invalid,
    .forgotpw-form label.invalid {
        font-weight: normal;
        display: block;
        margin: -10px 0 20px 0;
    }

    .login-form form {
        float: left;
        width: 330px;
    }

    .left-divider {
        border-left: 1px solid #ccc;
    }

    .alternatelogins {
        float: left;
        height: 200px;
        padding-left: 25px;
    }

    .alternatelogins div {
        margin: 0 0 20px 0;
    }

    .alternatelogins a,
    #add_facebook input,
    #add_twitter input {
        position: relative;
        display: inline-block;
        height: 36px;
        line-height: 36px;
        font-size: 20px;
        padding: 0 1em;
        border: 1px solid #999;
        border-radius: 2px;
        margin: 0;
        text-align: center;
        text-decoration: none;
        white-space: nowrap;
        cursor: pointer;
        color: #222;
        background: #fff;
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
        -webkit-appearance: none;
        *overflow: visible;
        *display: inline;
        *zoom: 1;
    }

    .alternatelogins a:hover,
    .alternatelogins a:focus,
    .alternatelogins a:active,
    #add_facebook input,
    #add_twitter input {
        color: #222;
        text-decoration: none;
    }

    .alternatelogins a:before {
        content: "";
        float: left;
        width: 36px;
        height: 36px;
        background: url(/images/portal/auth-icons.png) no-repeat 99px 99px;
    }

    .alternatelogins #twitter,
    #add_twitter input {
        border-color: #a6cde6;
        color: #327695;
        background: #cfe4f0;
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#f1f5f7), to(rgba(255,255,255,0)));
        background-image: -webkit-linear-gradient(#f1f5f7, rgba(255,255,255,0));
        background-image: -moz-linear-gradient(#f1f5f7, rgba(255,255,255,0));
        background-image: -ms-linear-gradient(#f1f5f7, rgba(255,255,255,0));
        background-image: -o-linear-gradient(#f1f5f7, rgba(255,255,255,0));
        background-image: linear-gradient(#f1f5f7, rgba(255,255,255,0));
        -webkit-box-shadow: inset 0 1px 0 #fff;
        box-shadow: inset 0 1px 0 #fff;
    }

    .alternatelogins #twitter:hover,
    .alternatelogins #twitter:focus,
    .alternatelogins #twitter:active,
    #add_twitter input:hover,
    #add_twitter input:focus,
    #add_twitter input:active {
        color: #327695;
        border-color: #8dc2e4;
        background-color: #cadde9;
    }

    .alternatelogins #twitter:active,
    #add_twitter input:active {
        background: #cadde9;
        -webkit-box-shadow: inset 0 1px 0 #bbd6e7;
        box-shadow: inset 0 1px 0 #bbd6e7;
    }

    .alternatelogins #twitter:before {
        margin: 0 0.6em 0 -0.6em;
        background-position: -36px -22px;
    }

    .alternatelogins #facebook,
    #add_facebook input {
        border-color: #29447e;
        border-bottom-color: #1a356e;
        color: #fff;
        background-color: #5872a7;
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#637bad), to(#5872a7));
        background-image: -webkit-linear-gradient(#637bad, #5872a7);
        background-image: -moz-linear-gradient(#637bad, #5872a7);
        background-image: -ms-linear-gradient(#637bad, #5872a7);
        background-image: -o-linear-gradient(#637bad, #5872a7);
        background-image: linear-gradient(#637bad, #5872a7);
        -webkit-box-shadow: inset 0 1px 0 #879ac0;
        box-shadow: inset 0 1px 0 #879ac0;
    }

    .alternatelogins #facebook:hover,
    .alternatelogins #facebook:focus,
    #add_facebook input:hover,
    #add_facebook input:focus {
        color: #fff;
        background-color: #3b5998;
    }

    .alternatelogins #facebook:active,
    #add_facebook input:active {
        color: #fff;
        background: #4f6aa3;
        -webkit-box-shadow: inset 0 1px 0 #45619d;
        box-shadow: inset 0 1px 0 #45619d;
    }

    .alternatelogins #facebook:before {
        border-right: 1px solid #465f94;
        margin: 0 1em 0 -1em;
        background-position: 0 -22px;
    }

    #add_facebook input,
    #add_twitter input {
        height: 22px;
        font-size: 11px;
        line-height: 22px;
        padding-left: 35px;
    }

    #add_facebook input {
        background: url(/images/portal/auth-icons.png) no-repeat -265px -25px #5872a7;
    }

    #registration-in-progress {
        display: none;
        padding: 5px;
        background-color: #fffdef;
        border-color: 2px solid #ede9c2;
    }

    #registration-in-progress img {
        float: left;
        margin-right: 5px;
    }

    #add_twitter input {
        background: url(/images/portal/auth-icons.png) no-repeat -261px 0 #cfe4f0;
    }

    .desk-external-variables {
        display: none;
    }


    #verification_step_1 { display: none; }
    #verification_step_2 { display: show; }


    .hidden {
        display: none;
    }

    .desk_file_upload {
        overflow: hidden;
    }

    .desk_file_upload input[type=file] {
        float: left;
        outline:none;
        position: relative;
        text-align: right;
        -moz-opacity:0 ;
        filter:alpha(opacity: 0);
        opacity: 0;
        z-index: 2;
        width:100%;
        height:100%;
        margin-left: -99999px;
    }

    .desk_file_upload input[type=button] {
        float: left;
    }

    .desk_file_upload .faux-file-field {
        padding: 0 8px 0 0;
        margin: 0;
        z-index: 1;
        float: left;
    }

    .desk_file_upload .faux-file-field input[type=text] {
        width:180px !important;
    }

    .radio-label-rating-type {
        margin-right: 12px;
        vertical-align: middle;
    }

</style>

<style type="text/css">
    /* LINK COLOR */
    a{
        color: #398FD1 !important;
    }
    /* BODY STYLES */
    body{
        font-family: Arial,Arial,Helvetica,sans-serif !important;
        background: #ffffff !important;
        color: #434343 !important;
    }
    .ui-autocomplete a:hover,
    .ui-autocomplete a.ui-state-hover,
    li.featured a,
    .highlight  {
        background: #FFFAE1 !important;
        background-color: #FFFAE1 !important;
    }
    #support-main h5 a,
    #toggle .active {
        background: #ffffff !important;
        color: #434343 !important;
    }
    #support-main .dashboard h5 a:hover,
    #toggle a:hover {
        background: #398FD1 !important;
        color: #ffffff !important;
    }
    #toggle a {
        background: #ffffff !important;
    }
    #form label.invalid {
        color: #FF0000 !important;
    }
    /* HEADER BACKGROUND COLOR */
    #company-header{
        background: #ffffff !important;
    }
    /* TITLE BACKGROUND COLOR */
    #support-header{
        background: #ffffff !important;
    }
    #support-header h2{
        text-shadow: 0 1px 0 #ffffff !important;
    }
    #breadcrumbs{
        color: #434343 !important;
    }
    /* FORM BACKGROUND COLOR */
    .support-body, .question-body, #form, .pagination, .reply, .condensed{
        background: #ffffff !important;
    }
    /* TEXT COLOR */
    p{
        font: 12pt Arial,Arial,Helvetica,sans-serif !important;
        color: #434343 !important;
    }
    /* HEADING TEXT COLOR */
    h2, h3, h4, h5{
        color: #434343 !important;
        font-family: Arial,Arial,Helvetica,sans-serif !important;
    }
    .ui-autocomplete{
        background: #ffffff !important;
        font: 12pt Arial,Arial,Helvetica,sans-serif !important;
    }
    .ui-autocomplete .article-autocomplete-subject{
        color: #398fd1 !important;
        font: 12pt Arial,Arial,Helvetica,sans-serif !important;
    }
    .article-autocomplete-body{
        color: #888888 !important;
        font: 12pt Arial,Arial,Helvetica,sans-serif !important;
        font-size: 90% !important;
    }
    .support-search-big #support-search-submit, #question_submit,
    #email_submit, #chat_submit, #answer_submit{
        background: #398FD1 url() !important;
        /*color: # !important;*/
    }
    .support-search-big{
        background: #ffffff !important;
    }
    /* Override for jquery spinner position */
    .ui-autocomplete-loading { background-position: 85% !important; }
</style>
<style type="text/css">
    #company-header h1 {
        background: url('https://travelmob.desk.com/customer/portal/theme_attachments/27578?cb=1429257013231') no-repeat scroll 0 center transparent;
        height: 42px;
    }
    #company-header img.logo {
        background: url('https://travelmob.desk.com/customer/portal/theme_attachments/27578?cb=1429257013231') no-repeat scroll 0 center transparent;
        height: 42px;
        width: 440px;
        margin-right: 10px;
        display: inline-block;
        vertical-align: top;
    }
    #company-header h1 a {
        padding-left: 440px;
    }
    #company-header h1.page-header {
        background: none !important;
        padding: 0px;
    }
    #company-header h1.page-header a {
        padding-left: 0px !important;
        vertical-align: top;
    }
</style>
<!-- OVERRIDES -->

<style type="text/css">
    .fb_hidden{position:absolute;top:-10000px;z-index:10001}.fb_reposition{overflow:hidden;position:relative}.fb_invisible{display:none}.fb_reset{background:none;border:0;border-spacing:0;color:#000;cursor:auto;direction:ltr;font-family:"lucida grande", tahoma, verdana, arial, sans-serif;font-size:11px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:1;margin:0;overflow:visible;padding:0;text-align:left;text-decoration:none;text-indent:0;text-shadow:none;text-transform:none;visibility:visible;white-space:normal;word-spacing:normal}.fb_reset>div{overflow:hidden}.fb_link img{border:none}@keyframes fb_transform{from{opacity:0;transform:scale(.95)}to{opacity:1;transform:scale(1)}}.fb_animate{animation:fb_transform .3s forwards}
    .fb_dialog{background:rgba(82, 82, 82, .7);position:absolute;top:-10000px;z-index:10001}.fb_reset .fb_dialog_legacy{overflow:visible}.fb_dialog_advanced{padding:10px;-moz-border-radius:8px;-webkit-border-radius:8px;border-radius:8px}.fb_dialog_content{background:#fff;color:#333}.fb_dialog_close_icon{background:url(https://static.xx.fbcdn.net/rsrc.php/v2/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;_background-image:url(https://static.xx.fbcdn.net/rsrc.php/v2/yL/r/s816eWC-2sl.gif);cursor:pointer;display:block;height:15px;position:absolute;right:18px;top:17px;width:15px}.fb_dialog_mobile .fb_dialog_close_icon{top:5px;left:5px;right:auto}.fb_dialog_padding{background-color:transparent;position:absolute;width:1px;z-index:-1}.fb_dialog_close_icon:hover{background:url(https://static.xx.fbcdn.net/rsrc.php/v2/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent;_background-image:url(https://static.xx.fbcdn.net/rsrc.php/v2/yL/r/s816eWC-2sl.gif)}.fb_dialog_close_icon:active{background:url(https://static.xx.fbcdn.net/rsrc.php/v2/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent;_background-image:url(https://static.xx.fbcdn.net/rsrc.php/v2/yL/r/s816eWC-2sl.gif)}.fb_dialog_loader{background-color:#f6f7f9;border:1px solid #606060;font-size:24px;padding:20px}.fb_dialog_top_left,.fb_dialog_top_right,.fb_dialog_bottom_left,.fb_dialog_bottom_right{height:10px;width:10px;overflow:hidden;position:absolute}.fb_dialog_top_left{background:url(https://static.xx.fbcdn.net/rsrc.php/v2/ye/r/8YeTNIlTZjm.png) no-repeat 0 0;left:-10px;top:-10px}.fb_dialog_top_right{background:url(https://static.xx.fbcdn.net/rsrc.php/v2/ye/r/8YeTNIlTZjm.png) no-repeat 0 -10px;right:-10px;top:-10px}.fb_dialog_bottom_left{background:url(https://static.xx.fbcdn.net/rsrc.php/v2/ye/r/8YeTNIlTZjm.png) no-repeat 0 -20px;bottom:-10px;left:-10px}.fb_dialog_bottom_right{background:url(https://static.xx.fbcdn.net/rsrc.php/v2/ye/r/8YeTNIlTZjm.png) no-repeat 0 -30px;right:-10px;bottom:-10px}.fb_dialog_vert_left,.fb_dialog_vert_right,.fb_dialog_horiz_top,.fb_dialog_horiz_bottom{position:absolute;background:#525252;filter:alpha(opacity=70);opacity:.7}.fb_dialog_vert_left,.fb_dialog_vert_right{width:10px;height:100%}.fb_dialog_vert_left{margin-left:-10px}.fb_dialog_vert_right{right:0;margin-right:-10px}.fb_dialog_horiz_top,.fb_dialog_horiz_bottom{width:100%;height:10px}.fb_dialog_horiz_top{margin-top:-10px}.fb_dialog_horiz_bottom{bottom:0;margin-bottom:-10px}.fb_dialog_iframe{line-height:0}.fb_dialog_content .dialog_title{background:#6d84b4;border:1px solid #365899;color:#fff;font-size:14px;font-weight:bold;margin:0}.fb_dialog_content .dialog_title>span{background:url(https://static.xx.fbcdn.net/rsrc.php/v2/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;float:left;padding:5px 0 7px 26px}body.fb_hidden{-webkit-transform:none;height:100%;margin:0;overflow:visible;position:absolute;top:-10000px;left:0;width:100%}.fb_dialog.fb_dialog_mobile.loading{background:url(https://static.xx.fbcdn.net/rsrc.php/v2/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;min-height:100%;min-width:100%;overflow:hidden;position:absolute;top:0;z-index:10001}.fb_dialog.fb_dialog_mobile.loading.centered{width:auto;height:auto;min-height:initial;min-width:initial;background:none}.fb_dialog.fb_dialog_mobile.loading.centered #fb_dialog_loader_spinner{width:100%}.fb_dialog.fb_dialog_mobile.loading.centered .fb_dialog_content{background:none}.loading.centered #fb_dialog_loader_close{color:#fff;display:block;padding-top:20px;clear:both;font-size:18px}#fb-root #fb_dialog_ipad_overlay{background:rgba(0, 0, 0, .45);position:absolute;bottom:0;left:0;right:0;top:0;width:100%;min-height:100%;z-index:10000}#fb-root #fb_dialog_ipad_overlay.hidden{display:none}.fb_dialog.fb_dialog_mobile.loading iframe{visibility:hidden}.fb_dialog_content .dialog_header{-webkit-box-shadow:white 0 1px 1px -1px inset;background:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#738ABA), to(#2C4987));border-bottom:1px solid;border-color:#1d4088;color:#fff;font:14px Helvetica, sans-serif;font-weight:bold;text-overflow:ellipsis;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0;vertical-align:middle;white-space:nowrap}.fb_dialog_content .dialog_header table{-webkit-font-smoothing:subpixel-antialiased;height:43px;width:100%}.fb_dialog_content .dialog_header td.header_left{font-size:12px;padding-left:5px;vertical-align:middle;width:60px}.fb_dialog_content .dialog_header td.header_right{font-size:12px;padding-right:5px;vertical-align:middle;width:60px}.fb_dialog_content .touchable_button{background:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#4966A6), color-stop(.5, #355492), to(#2A4887));border:1px solid #29487d;-webkit-background-clip:padding-box;-webkit-border-radius:3px;-webkit-box-shadow:rgba(0, 0, 0, .117188) 0 1px 1px inset, rgba(255, 255, 255, .167969) 0 1px 0;display:inline-block;margin-top:3px;max-width:85px;line-height:18px;padding:4px 12px;position:relative}.fb_dialog_content .dialog_header .touchable_button input{border:none;background:none;color:#fff;font:12px Helvetica, sans-serif;font-weight:bold;margin:2px -12px;padding:2px 6px 3px 6px;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog_content .dialog_header .header_center{color:#fff;font-size:16px;font-weight:bold;line-height:18px;text-align:center;vertical-align:middle}.fb_dialog_content .dialog_content{background:url(https://static.xx.fbcdn.net/rsrc.php/v2/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;border:1px solid #555;border-bottom:0;border-top:0;height:150px}.fb_dialog_content .dialog_footer{background:#f6f7f9;border:1px solid #555;border-top-color:#ccc;height:40px}#fb_dialog_loader_close{float:left}.fb_dialog.fb_dialog_mobile .fb_dialog_close_button{text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog.fb_dialog_mobile .fb_dialog_close_icon{visibility:hidden}#fb_dialog_loader_spinner{animation:rotateSpinner 1.2s linear infinite;background-color:transparent;background-image:url(https://static.xx.fbcdn.net/rsrc.php/v2/yD/r/t-wz8gw1xG1.png);background-repeat:no-repeat;background-position:50% 50%;height:24px;width:24px}@keyframes rotateSpinner{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}
    .fb_iframe_widget{display:inline-block;position:relative}.fb_iframe_widget span{display:inline-block;position:relative;text-align:justify}.fb_iframe_widget iframe{position:absolute}.fb_iframe_widget_fluid_desktop,.fb_iframe_widget_fluid_desktop span,.fb_iframe_widget_fluid_desktop iframe{max-width:100%}.fb_iframe_widget_fluid_desktop iframe{min-width:220px;position:relative}.fb_iframe_widget_lift{z-index:1}.fb_hide_iframes iframe{position:relative;left:-10000px}.fb_iframe_widget_loader{position:relative;display:inline-block}.fb_iframe_widget_fluid{display:inline}.fb_iframe_widget_fluid span{width:100%}.fb_iframe_widget_loader iframe{min-height:32px;z-index:2;zoom:1}.fb_iframe_widget_loader .FB_Loader{background:url(https://static.xx.fbcdn.net/rsrc.php/v2/y9/r/jKEcVPZFk-2.gif) no-repeat;height:32px;width:32px;margin-left:-16px;position:absolute;left:50%;z-index:4}
</style>
<div id="flash" class="flash_html flash_ajax" style="display: none;">
    <div class="agent_notifier_msg a-flash flash_notice">
    </div>
</div

<div id="company-support-portal">
    <div id="company-header">
        <div class="wrapper">
            <h1 class="page-header"><a href="https://support.homeaway.asia/"><img class="logo" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="></a></h1>
            <div style="float:right">
                <select id="a-content-select" name="a-content-select"><option value="en" selected="selected">English</option>
                    <option value="zh_cn">简体中文</option>
                    <option value="zh_tw">繁體中文</option>
                    <option value="ja">日本語</option>
                    <option value="es">Español</option>
                </select>
            </div>
            <div style="clear:both"></div>
        </div>
    </div>

    <div id="support-header">
        <div class="wrapper">
            <h2>Support Center</h2>
            <form action="https://support.homeaway.asia/customer/portal/articles/search" method="get" id="support-search" class="support-search-small">
                <div>
                    <input id="q" maxlength="100" name="q" type="text" value="" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
                    <input type="hidden" name="b_id" value="7855">
                    <div id="question-mask" class="question-small">How can we help?</div>
                    <input id="support-search-submit" type="submit" value="Search">
                </div>
            </form>
        </div>
    </div>
    <div class="wrapper">
        <!--begin:portal_body-->

        <!--begin:email_new-->
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
            <a href="https://support.homeaway.asia/">Home</a> › Email us
        </div>
        <div id="support-main">
            <div class="support-body">
                <div class="content">
                    <h3>Email us</h3>
                    <div id="form">
                        <form action="https://support.homeaway.asia/customer/portal/emails/pre_create" enctype="multipart/form-data" class="new_email" id="new_email" method="post" novalidate="novalidate">
                            <input id="authenticity_token" name="authenticity_token" type="hidden" value="9LTY7B2i2D9XKHygn/3rJpRuraEf3BPkCkU5ha8UHxI=">
                            <div class="input-block">
                                <span class="label">
                                    Your name <span>(required)</span>
                                </span>
                                <div>
                                    <input value="" id="interaction_name" maxlength="100" name="interaction[name]" type="text">
                                </div>
                            </div>
                            <div class="input-block">
                                <span class="label">
                                    Your email address <span>(required)</span>
                                </span>
                                <div>
                                    <input value="" id="interaction_email" maxlength="100" name="interaction[email]" type="text">
                                </div>
                            </div>
                            <div class="input-block">
                                <div class="dependent-dropdown">
                                    <div>
                                        <span class="label">
                                            Are you travelling or hosting?
                                        </span>
                                    </div>
                                    <select class="default xl" data-custom-value="Please select" data-dependency-map="{&quot;questions&quot;:{&quot;Traveller&quot;:[&quot;Book a vacation rental&quot;,&quot;Contact a host&quot;,&quot;Cancel my booking&quot;,&quot;Change my booking&quot;,&quot;Check-in details&quot;,&quot;Post reservation&quot;,&quot;Payment&quot;,&quot;Refund&quot;,&quot;Safety&quot;,&quot;Others&quot;],&quot;Host&quot;:[&quot;List my space&quot;,&quot;Manage my listings&quot;,&quot;Payout&quot;,&quot;Contact a guest&quot;,&quot;Cancel a booking&quot;,&quot;Modify a booking&quot;,&quot;Others&quot;]}}" data-name="customertype" data-options="[&quot;Traveller&quot;,&quot;Host&quot;]" data-top-data-value="false" id="dropdown-customertype" name="ticket[custom5]"><option value="" selected="selected">Please select</option>
                                        <option value="Traveller">Traveller</option>
                                        <option value="Host">Host</option></select>
                                </div>
                            </div>
                            <div class="input-block">
                                <div class="dependent-dropdown" style="display: none;">
                                    <div>
                                        <span class="label">
                                            What do you need help on?
                                        </span>
                                    </div>
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
                                        <option value="Others">Others</option></select>
                                </div>
                            </div>           
                            <div class="input-block">
                                <span class="label">
                                    Subject <span>(required)</span>
                                </span>
                                <div>
                                    <input id="email_subject" maxlength="100" name="email[subject]" type="text" value="">
                                </div>
                            </div>
                            <div class="input-block">
                                <span class="label">
                                    Message <span>(required)</span>
                                </span>
                                <div>
                                    <textarea id="email_body" name="email[body]"></textarea>
                                </div>
                            </div>
                            <div class="input-block">
                                <span class="label">
                                    File Attachment
                                </span>
                                <div class="desk_file_upload">
                                    <input name="case_attachment[attachment]" size="84" type="file">
                                    <div class="faux-file-field">
                                        <input type="text" disabled="disabled">
                                    </div>
                                    <input type="button" value="Choose File">
                                </div><a href="javascript::void(0)" id="add_attachment" class="add_attachment" style="display:none;">Add Another Attachment</a>
                            </div><br>
                            <input id="interaction_lat" name="interaction[lat]" type="hidden" value="">
                            <input id="interaction_lng" name="interaction[lng]" type="hidden" value="">
                            <input id="interaction_city" name="interaction[city]" type="hidden" value="">
                            <input id="interaction_region" name="interaction[region]" type="hidden" value="">
                            <input id="interaction_country" name="interaction[country]" type="hidden" value="">
                            <input id="interaction_country_code" name="interaction[country_code]" type="hidden" value="">
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    if (google.loader.ClientLocation) {
                                        $('#interaction_lat').val(google.loader.ClientLocation.latitude);
                                        $('#interaction_lng').val(google.loader.ClientLocation.longitude);
                                        $('#interaction_city').val(google.loader.ClientLocation.address.city);
                                        $('#interaction_region').val(google.loader.ClientLocation.address.region);
                                        $('#interaction_country').val(google.loader.ClientLocation.address.country);
                                        $('#interaction_country_code').val(google.loader.ClientLocation.address.country_code);
                                    }
                                });
                                //]]>
                            </script>
                            <div>
                                <script src="./HomeAway Asia _ Email us_files/api.js" async="" defer=""></script>
                                <div class="g-recaptcha" data-theme="white" data-callback="captcahCallback" data-sitekey="6LfAPscSAAAAAFgATIGBuRpj-z2OFJq2AeqQ_6Q1" data-stoken="1w7mxCdzJj9BgFCqnzdIeGXbE8BfRHk7rh8rJhgbjiDuWYp5Sxoaq5L_5E5eZLLRAqeBvgNDtuvZA6k1V9xDtdXjv7xeT9d7O7kSreCgdo0"><div style="width: 304px; height: 78px;"><div><iframe src="./HomeAway Asia _ Email us_files/anchor.html" title="recaptcha widget" width="304" height="78" role="presentation" frameborder="0" scrolling="no" name="undefined"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; "></textarea></div></div><div class="input-button" style="margin-top: 12px;">
                                <input id="email_submit" name="commit" type="submit" value="Send Email">
                                <img alt="Ajax-loader-small" id="email_submit_spinner" src="./HomeAway Asia _ Email us_files/ajax-loader-small.gif" style="display: none; margin: 7px 0 0 5px; position: absolute;">
                              </div>
                                </div>
</form>
      </div>
    </div>
  </div>
  </div>
</div>