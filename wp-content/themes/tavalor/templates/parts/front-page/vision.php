<?php
/**
 * Template part for displaying vision block in front-page.php
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
$bg_color = (get_sub_field('bg_color')) ? get_sub_field('bg_color') : '#e3f2fd';
?>
<div class="section section-bg" id="section1"
     style="
           background-image: linear-gradient(to bottom, <?php echo hex2rgba($bg_color, 0); ?>, <?php echo $bg_color; ?>), url(<?php echo $bg_src; ?>);
           background-color: <?php echo $bg_color; ?>;"
>
    <div class="section-content">
        <div class="container">
            <div>
                <div class="row justify-content-center">

                    <div class="col-lg-10 col-11">
                        <h2 class="section-title text-center">
                            <?php the_sub_field('title'); ?>
                        </h2>
                    </div>

                    <div class="col-12">
                        <?php $items_count = count(get_sub_field('vision_items')); ?>
                        <?php if (have_rows('vision_items')) : ?>
                            <?php $count = ($items_count >= 5) ? 5 : 4; ?>
                            <div class="vision-block row justify-content-center">

                                <?php while (have_rows('vision_items')) : the_row(); ?>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl col-xxl-20 section-block-item-col">
                                        <div class="section-block-item">
                                            <?php
                                            $image = get_sub_field('image');

                                            if (!empty($image)) : ?>
                                                <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>">
                                            <?php endif; ?>
                                            <h3 class="section-block-item__title">
                                                <?php the_sub_field('title'); ?>
                                            </h3>
                                            <p class="section-block-item__text">
                                                <?php the_sub_field('body'); ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endwhile; ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
