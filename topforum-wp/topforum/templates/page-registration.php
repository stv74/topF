<?php
    get_header();
?>

    <main class="registration">
        <div class="container">
            <h1 class="title"><?php the_title(); ?></h1>
            <div class="registration__panel">Fill in the form in english</div>
            <img class="registration__arrow" src="<?php echo bloginfo('template_url'); ?>/assets/icons/selectArrow.png" alt="" />
            <div class="registration__panel">Read thoroughly terms&conditions</div>
            <div class="registration__form">
                <?php echo do_shortcode('[contact-form-7 id="465" title="Registration form"]'); ?>
            </div>



            <!-- <form action="#" class="registration__form">
                <label class="registration__label" for="conference"
                    >Please, choose a conference:</label
                >
                <div class="select select_reg">
                    <div class="select__wrapper select__wrapper_reg">
                        <select
                            name="conference"
                            id="conference"
                            class="select__feeld select__feeld_reg"
                        >
                            <option value="1">Wealth TOP FORUM Israel 2016</option>
                            <option value="2">Wealth TOP FORUM Israel 2017</option>
                        </select>
                    </div>
                </div>
                <div class="registration__label">
                    Please choose <span>delegate package:</span>
                </div>
                <div class="registration__radio">
                    <input type="radio" name="package" id="standart" value="standart" />
                    <label for="standart">standart</label>
                    <input type="radio" name="package" id="premium" value="premium" checked />
                    <label for="premium">premium</label>
                </div>
                <label class="registration__label" for="name">Name:</label>
                <input type="text" name="name" id="name" />
                <label class="registration__label" for="surname">Surname:</label>
                <input type="text" name="surname" id="surname" />
                <label class="registration__label" for="company-name">Company Name:</label>
                <input type="text" name="company-name" id="company-name" />
                <label class="registration__label" for="area"
                    >Please, choose a conference:</label
                >
                <div class="select select_reg">
                    <div class="select__wrapper select__wrapper_reg">
                        <select name="area" id="area" class="select__feeld select__feeld_reg">
                            <option value="1">Forex companies</option>
                            <option value="2">Fishing companies</option>
                        </select>
                    </div>
                </div>
                <label class="registration__label" for="position">Position:</label>
                <input type="text" name="position" id="position" />
                <label class="registration__label" for="email-1"
                    >E-mail (for organizers):</label
                >
                <input type="email" name="email-1" id="email-1" />
                <label class="registration__label" for="email-2">E-mail (for sponsors):</label>
                <input type="email" name="email-2" id="email-2" />
                <label class="registration__label" for="phone"
                    >Mobile Number (for organizers):</label
                >
                <input type="tel" name="phone" id="phone" />
                <label class="registration__label" for="country">Country:</label>
                <input type="text" name="country" id="country" />
                <label class="registration__label" for="site">Web-site:</label>
                <input type="text" name="site" id="site" />
                <div class="registration__label">Method of payment</div>
                <div class="registration__radio registration__pay">
                    <input type="radio" name="payment" id="free" value="free" />
                    <label for="free">free</label>
                    <input type="radio" name="payment" id="visa" value="visa" checked />
                    <label for="visa"><img src="icons/visa.svg" alt="visa" /></label>
                    <input type="radio" name="payment" id="invoice" value="invoice" />
                    <label for="invoice">invoice</label>
                    <input type="radio" name="payment" id="paypal" value="paypal" />
                    <label for="paypal"><img src="icons/paypal.svg" alt="" /></label>
                </div>
                <div class="registration__submit">
                    <div class="registration__check">
                        <input type="checkbox" id="accept" required />
                        <label for="accept"></label>
                        <span>I accept <a href="#">Terms&Conditions </a></span>
                    </div>
                    <button class="btn btn_form">Submit</button>
                </div>
            </form> -->
        </div>
    </main>

<?php
    get_footer();
?>