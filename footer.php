

<footer class="footer">
    <div class="footer_wrap">
        <div class="container">
            <div class="footer_columns">
                <div class="footer_info">
                    <?php
                        if (function_exists('the_custom_logo')) {
                            the_custom_logo();
                        }
                    ?>
                    <p>Munbox is an multipurpose WordPress theme.</p>
                </div>

                <div class="footer_column">
                    <h4>About</h4>
                    <?php
                        wp_nav_menu([
                            'theme_location' => 'footer_about_menu',
                            'menu_class'     => 'footer_menu',
                            'container'      => false,
                        ]);
                    ?>
                </div>

                <div class="footer_column">
                    <h4>Product</h4>
                    <?php
                        wp_nav_menu([
                            'theme_location' => 'footer_product_menu',
                            'menu_class'     => 'footer_menu',
                            'container'      => false,
                        ]);
                    ?>
                </div>

                <div class="footer_column">
                    <h4>Contact us</h4>
                    <div class="footer_contact">
                        <a href="mailto:contact@munboxweb.com">contact@munboxweb.com</a>
                        <a href="tel:+08450000202">+08455-0000-202</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer_bottom">
        <div class="copyright">
            <p>&copy; 2025 MunBox</p>
        </div>

        <div class="privacy">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
        </div>
    </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>