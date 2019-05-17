<?php
/**
 * Template part for displaying team block in front-page.php
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
<div class="section section-bg" id="section5"
     style="
         background-image: linear-gradient(to bottom, <?php echo hex2rgba($bg_color, 0); ?>, <?php echo $bg_color; ?>), url(<?php echo $bg_src; ?>);
         background-color: <?php echo $bg_color; ?>;"
>
    <div class="section-content pb-0">
        <div class="container">
            <h2 class="section-title text-center text-white">
                <?php the_sub_field('title'); ?>
            </h2>

            <p class="section-subtitle text-center text-white col-lg-8 mx-auto">
                <?php the_sub_field('subtitle'); ?>
            </p>

            <div class="team-cards">

                <?php if (have_rows('members')) : ?>
                <div class="row justify-content-center">
                    <?php while (have_rows('members')) : the_row(); ?>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-20">
                            <div class="team-card">
                                <?php
                                $image = get_sub_field('image');

                                if (!empty($image)) : ?>
                                    <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
