<?php include("header.php"); ?>
<?php include("menu.php"); ?>
<header class="intro-header" style="background-image: url('/img/contact-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="page-heading">
                    <h1><?php echo $language->getContactTitle(); ?></h1>
                    <hr class="small">
                    <span class="subheading"><?php echo $language->getContactSubTitle(); ?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <p><?php echo $language->getContactText(); ?></p>
            <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
            <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
            <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
            <form name="sentMessage" id="contactForm" novalidate="">
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label><?php echo $language->getContactName(); ?></label>
                        <input type="text" class="form-control" placeholder="<?php echo $language->getContactName(); ?>" id="name" required="" data-validation-required-message="Please enter your name.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label><?php echo $language->getContactEmail(); ?></label>
                        <input type="email" class="form-control" placeholder="<?php echo $language->getContactEmail(); ?>" id="email" required="" data-validation-required-message="Please enter your email address.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label><?php echo $language->getContactPhone(); ?></label>
                        <input type="tel" class="form-control" placeholder="<?php echo $language->getContactPhone(); ?>" id="phone" required="" data-validation-required-message="Please enter your phone number.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label><?php echo $language->getContactMessage(); ?></label>
                        <textarea rows="5" class="form-control" placeholder="<?php echo $language->getContactMessage(); ?>" id="message" required="" data-validation-required-message="Please enter a message."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-default"><?php echo $language->getContactSend(); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<hr>
<?php include("footer.php"); ?>
