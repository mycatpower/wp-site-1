<?php
/**
 * Template part for displaying originators block in front-page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Tavalor
 * @since 1.0
 * @version 1.0
 */
$bg_image_pattern = get_sub_field('bg_image_pattern');
if (!empty($bg_image_pattern) && is_array($bg_image_pattern)) {
    $bg_src = $bg_image_pattern['sizes']['medium'];
} else {
    $bg_src = '';
}
$bg_color = (get_sub_field('bg_color')) ? get_sub_field('bg_color') : '#ffe0b2';
?>
<div class="section section-bg" id="section4"
     style="
         background-image: linear-gradient(to bottom, <?php echo hex2rgba($bg_color, 0); ?>, <?php echo $bg_color; ?>), url(<?php echo $bg_src; ?>);
         background-color: <?php echo $bg_color; ?>;"
>
    <div class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <h2 class="section-title">
                        <?php the_sub_field('title') ?>
                    </h2>
                    <div class="section-info">
                        <?php the_sub_field('description'); ?>
                    </div>

                </div>

                <div class="col-lg-6 col-12 ml-auto">
                    <div class="section-block-img">

                        <img src="<?php echo get_template_directory_uri() ?>/resources/assets/images/fifth-block.png" alt="">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
