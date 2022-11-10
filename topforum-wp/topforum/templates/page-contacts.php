<?php
    get_header();
?>

<section class="map">
    <div class="container">
        <div class="map__flex">
            <div class="map__iframe">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2661.173105982269!2d17.148528514970266!3d48.16474487922556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476c8ed00f935e21%3A0xcb9c726bd2b3cf6b!2zVHJuYXZza8OhIGNlc3RhIDE3Ny84MiwgODIxIDAyIEJyYXRpc2xhdmEsINCh0LvQvtCy0LDQutC40Y8!5e0!3m2!1sru!2sro!4v1664359496168!5m2!1sru!2sro" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                
            </div>
            <div class="map__wrapper">
                <div class="map__contact">
                    <div class="map__contact-title"><?php the_field('delegate_enquiries') ?></div>
                    <div class="map__contact-name"><?php the_field('delegate_name') ?></div>
                    E:
                    <a href="mailto:<?php the_field('delegate_email') ?>"
                        ><?php the_field('delegate_email') ?></a
                    >
                    <br />
                    P: <?php the_field('delegate_phone') ?>
                </div>
                <div class="map__contact">
                    <div class="map__contact-title"><?php the_field('business_development') ?></div>
                    <div class="map__contact-name"><?php the_field('business-dev_name') ?></div>
                    E:
                    <a href="mailto:<?php the_field('business-dev_email') ?>"
                        ><?php the_field('business-dev_email') ?></a
                    >
                    <br />
                    P: <?php the_field('business-dev_phone') ?>
                </div>
                <div class="map__contact">
                    <div class="map__contact-title"><?php the_field('communications_department') ?></div>
                    <div class="map__contact-name"><?php the_field('communications_name') ?></div>
                    E:
                    <a href="mailto:<?php the_field('communications_email') ?>"
                        ><?php the_field('communications_email') ?></a
                    >
                    <br />
                    P: <?php the_field('communications_phone') ?>
                </div>
                <div class="map__contact">
                    <div class="map__contact-title"><?php the_field('marketing') ?></div>
                    <div class="map__contact-name"><?php the_field('marketing_name') ?></div>
                    E:
                    <a href="mailto:<?php the_field('marketing_email') ?>"
                        ><?php the_field('marketing_email') ?></a
                    >
                    <br />
                    P: <?php the_field('marketing_phone') ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Map -->

<!-- Feedback -->
<section class="feedback">
    <div class="container">
        <h2 class="title">Feedback</h2>
        <div class="feedback__wrapper">
            <?php echo do_shortcode('[contact-form-7 id="430" title="Form feedback"]'); ?>
            <div class="feedback__contact">
                <?php the_field('feedback_text'); ?>
            </div>
        </div>
    </div>
</section>
<!-- / Feedback -->

<?php
    get_footer();
?>