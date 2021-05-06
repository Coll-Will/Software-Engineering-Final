<?php
  require_once "../pageformat.php";
  pagenavbar();
  ?>
 <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- the 2 lines below is needed -->
    <link href="fcf-assets/css/fcf.default.css" rel="stylesheet">
    <link href="fcf-assets/css/fcf.default-custom.css" rel="stylesheet">

    <title>Comments Form</title>
</head>

<body>

    <!-- the lines below are needed -->
    <div class="fcf-body">
        <div class="fcf-form-wrap">
            <div id="fcf-form">
                <form class="fcf-form-class" method="post" action="contactushandle.php">

                    <div class="fcf-field">
                        <label for="Name" class="fcf-label has-text-weight-normal">Your name</label>
                        <div class="fcf-control">
                            <input name="name" id="name" class="fcf-input is-full-width" maxlength="60"
                                data-validate-field="name">
                        </div>
                    </div>
                    <div class="fcf-field">
                        <label for="email" class="fcf-label has-text-weight-normal">Your email address</label>
                        <div class="fcf-control">
                            <input name="email" id="email" class="fcf-input is-full-width" maxlength="100"
                                data-validate-field="email">
                        </div>
                    </div>
                    <div class="fcf-field">
                        <label for="phone" class="fcf-label has-text-weight-normal">Your phone number (optional)</label>
                        <div class="fcf-control">
                            <input name="phone" id="phone" class="fcf-input is-full-width" maxlength="30"
                                data-validate-field="phone">
                        </div>
                    </div>
                    <div class="fcf-field">
                        <label for="msg" class="fcf-label has-text-weight-normal">Your message</label>
                        <div class="fcf-control">
                            <textarea name="msg" id="msg" class="fcf-textarea" maxlength="3000" rows="5"
                                data-validate-field="msg"></textarea>
                        </div>
                    </div>
                    <div id="fcf-status" class="fcf-status"></div>
                    <div class="fcf-field">
                        <div class="fcf-buttons">
                            <button id="fcf-button" type="submit" class="fcf-button is-link is-medium is-fullwidth">Leave Comment</button>
                        </div>
                    </div>
                    <!-- You MUST retain the attribution below -->
                    <div class="fcf-attribution"> <a href="https://www.freecontactform.com/"
                            class="fcf-attribution-link"></a></div>
                </form>
            </div>
            <div id="fcf-thank-you" style="display:none">
                <!-- Thank you message goes below -->
                <p>Thanks for leaving a commentwith us, we will get back in touch with you soon!</p>
                <!-- Thank you message goes above -->
            </div>
        </div>
    </div>
    <!--
    <script src="fcf-assets/js/lang/fcf.en.js"></script>
    <script src="fcf-assets/js/fcf.just-validate.min.js"></script>
    <script src="fcf-assets/js/fcf.form.js"></script>
    <!-- the lines above are needed -->
    -->
<?php pagefooter();?>
</body>
</html>