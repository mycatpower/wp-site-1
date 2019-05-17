<?php
/**
 * The template for displaying the footer
 *
 * Contains footer block, the closing of the #fullPage div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Tavalor
 * @since 1.0
 * @version 1.0
 */

$theme_options = get_option( 'tavalor_options' );
?>

        <footer class="section fp-auto-height" id="footer">
            <div class="footer-top" style="background-color: <?php echo (isset($theme_options['subscr_bg'])) ? $theme_options['subscr_bg'] : '#fcc35c'; ?>">
                <div class="container">
                    <div class="row justify-content-center">
<!--                        <div class="col-lg col-12">-->
<!--                            <ul class="footer-links">-->
<!--                                <li><a target="_blank" href="--><?php //echo home_url(); ?><!--/wp-content/uploads/2018/06/Tavalor-Summary.pdf">--><?php //_e('Summary', THEME_OPT); ?><!--</a></li>-->
<!--                            </ul>-->
<!--                        </div>-->

                        <div class="col-lg-5 col-md-8">
                            <form method="POST" class="mc-subscribe">
                                <input type="hidden" name="action" value="subscribe">
                                <input type="hidden" name="listid" value="b922a1412d">
                                <label class="form-group row justify-content-center mb-0">
<!--                                    <div class="col-sm-12 col-form-label text-center">-->
<!--                                        --><?php //_e('Subscribe our newsletter', THEME_OPT); ?>
<!--                                    </div>-->
                                    <div class="col-12">
                                        <div class="group-field">
                                            <input type="email" name="email" class="form-control form-control-sm mc-email border-transparent" required placeholder="<?php _e('Your email', THEME_OPT); ?>">
                                            <button type="submit" class="btn btn-sm btn-primary">
                                              <?php _e('Join Our Newsletter', THEME_OPT); ?>
                                            </button>
                                        </div>
                                    </div>
                                </label>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-auto col-lg-2 text-center text-md-left">
                            <?php if ($footer_logo_url = get_theme_mod( 'footer_logo' )) : ?>
                                <img src="<?php echo $footer_logo_url; ?>" class="footer-logo" alt="Tavalor">
                            <?php endif; ?>
                        </div>

                        <div class="col-6 col-md text-center">
                            <div class="d-inline-block text-center text-md-left">
                                <div class="footer-links footer-links-vertical">
                                    <?php if ( is_active_sidebar( 'footer-list-1' ) ) : ?>
                                      <?php dynamic_sidebar( 'footer-list-1' ); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md text-center">
                            <div class="d-inline-block text-center text-md-left">
                                <div class="footer-links footer-links-vertical">
                                    <?php if ( is_active_sidebar( 'footer-list-2' ) ) : ?>
                                      <?php dynamic_sidebar( 'footer-list-2' ); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-5">
                            <div class="footer-text">
                                <?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
                                    <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                                <?php endif; ?>
                            </div>
                            <div class="footer-links-line">
                                <?php if ( is_active_sidebar( 'footer-links' ) ) : ?>
                                    <?php dynamic_sidebar( 'footer-links' ); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright text-center">
                <div class="container">
                    <?php echo get_theme_mod( 'copyright' ); ?>
                </div>
            </div>
        </footer>

    </div><!-- #fullPage -->
</div><!-- .page-wrapper -->

<?php get_template_part('templates/parts/modals/success-subscribe'); ?>

<?php wp_footer(); ?>

</body>
</html>
