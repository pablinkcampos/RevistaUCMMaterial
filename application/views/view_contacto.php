<div class="container clearfix">
    <div class="postcontent nobottommargin">
        <h3><?php echo lang('vcon_formulario de contacto');?></h3>
        <div class="contact-widget">
            <div class="contact-form-result"></div>
            <form class="nobottommargin" id="contactform" name="contactform" action="#" method="post">
                <div class="form-process"></div>

                <div class="col_one_third">
                    <label for="contactform-name"><?php echo lang('vcon_nombre');?> <small>*</small></label>
                    <input type="text" id="contactform-name" name="contactform-name" value="" class="sm-form-control required" />
                </div>

                <div class="col_one_third">
                    <label for="contactform-email"><?php echo lang('vcon_email');?> <small>*</small></label>
                    <input type="email" id="contactform-email" name="contactform-email" value="" class="required email sm-form-control" />
                </div>

                <div class="col_one_third col_last">
                    <label for="contactform-phone">N° <?php echo lang('vcon_celular');?></label>
                    <input type="text" id="contactform-phone" name="contactform-phone" value="" class="sm-form-control" />
                </div>

                <div class="clear"></div>

                <div class="col_full">
                    <label for="contactform-message"><?php echo lang('vcon_mensaje');?> <small>*</small></label>
                    <textarea class="required sm-form-control" id="contactform-message" name="contactform-message" rows="6" cols="30"></textarea>
                </div>

                <div class="col_full hidden">
                    <input type="text" id="contactform-botcheck" name="contactform-botcheck" value="" class="sm-form-control" />
                </div>

                <div class="col_full">
                    <button class="button button-3d button-rounded button-green" type="submit" id="contactform-submit" name="contactform-submit" value="submit"><?php echo lang('vcon_enviar mensaje');?></button>
                </div>

            </form>
        </div>
    </div>
</div>