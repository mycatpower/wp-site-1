<?php
/**
 * Template part for displaying banner block in front-page.php
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
$bg_color = (get_sub_field('bg_color')) ? get_sub_field('bg_color') : '#fff';
?>

<div class="section section-bg" id="section0"
     style="
           background-image: linear-gradient(to bottom, <?php echo hex2rgba($bg_color, 0); ?>, <?php echo $bg_color; ?>), url(<?php echo $bg_src; ?>);
           background-color: <?php echo $bg_color; ?>;"
>
    <div class="section-content">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <h1 class="section-title">
                        <?php the_sub_field('title'); ?>
                    </h1>
                    <p class="section-subtitle">
                        <?php the_sub_field('subtitle'); ?>
                    </p>

                    <form method="POST" class="mc-subscribe mt-4">
                        <input type="hidden" name="action" value="subscribe">
                        <input type="hidden" name="listid" value="b922a1412d">
                        <label class="form-group row">
<!--                            <div class="col-sm-12 col-form-label">-->
<!--                                --><?php //_e('Subscribe our newsletter', THEME_OPT); ?>
<!--                            </div>-->
                            <div class="col-sm-10">
                                <div class="group-field">
                                    <input type="email" name="email" class="form-control mc-email" placeholder="<?php _e('Your email', THEME_OPT); ?>" required>

                                    <button type="submit" class="btn btn-primary">
                                      <?php _e('Join Our Newsletter', THEME_OPT); ?>
                                    </button>
                                </div>
                            </div>
                        </label>
                    </form>

                </div>

                <div class="col-lg-6 col-12 ml-auto">
                    <div class="section-block-img">
                        <div class="animation-1">
                          <svg version="1.1"
                               xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3501 3251">

                            <g class="small-clouds">
                              <g>
                                <?php echo repeater_svg(
                                    2,
                                    "animations/animation1/image_cloud3.png",
                                    89,
                                    244,
                                    "small-cloud-1",
                                    -20
                                ); ?>
                              </g>

                              <g>
                                <image xlink:href="<?php echo get_template_directory_uri() ?>/resources/assets/images/animations/animation1/image_cloud3.png"
                                       x="0" y="0" height="89px" width="244px" class="small-cloud-2" style="animation-delay: -10s"/>
                                <image xlink:href="<?php echo get_template_directory_uri() ?>/resources/assets/images/animations/animation1/image_cloud3.png"
                                       x="0" y="0" height="89px" width="244px" class="small-cloud-2" style="animation-delay: -30s"/>
                              </g>

                            </g>

                            <g class="big-clouds">
                              <image xlink:href="<?php echo get_template_directory_uri() ?>/resources/assets/images/animations/animation1/image_cloud1.png"
                                     x="0" y="0" height="239px" width="676px" class="big-cloud big-cloud-1"/>

                              <image xlink:href="<?php echo get_template_directory_uri() ?>/resources/assets/images/animations/animation1/image_cloud1.png"
                                     x="0" y="0" height="239px" width="676px" class="big-cloud big-cloud-1-2"/>

                              <image xlink:href="<?php echo get_template_directory_uri() ?>/resources/assets/images/animations/animation1/image_cloud2.png"
                                     x="0" y="0" height="168px" width="480px" class="big-cloud big-cloud-2"/>

                              <image xlink:href="<?php echo get_template_directory_uri() ?>/resources/assets/images/animations/animation1/image_cloud2.png"
                                     x="0" y="0" height="168px" width="480px" class="big-cloud big-cloud-2-2"/>
                            </g>

                            <g class="balloons">
                              <image xlink:href="<?php echo get_template_directory_uri() ?>/resources/assets/images/animations/animation1/image_balloon.png"
                                     x="0" y="0" height="414px" width="264px" class="balloon"/>
                            </g>

                            <g class="animation-t-b">
                              <g class="dollars">
                                <g>
                                  <?php echo repeater_svg(
                                      7,
                                      "animations/animation1/image_dollar.png",
                                      80,
                                      80,
                                      "dollar dollar-0-6",
                                      -1
                                  ); ?>
                                </g>

                                <g>
                                  <?php echo repeater_svg(
                                      9,
                                      "animations/animation1/image_dollar.png",
                                      80,
                                      80,
                                      "dollar dollar-4-10",
                                      -1
                                  ); ?>
                                </g>

                                <g>
                                  <?php echo repeater_svg(
                                      9,
                                      "animations/animation1/image_dollar.png",
                                      80,
                                      80,
                                      "dollar dollar-8-2",
                                      -1
                                  ); ?>
                                </g>
                              </g>

                              <image xlink:href="<?php echo get_template_directory_uri() ?>/resources/assets/images/animations/animation1/image_image.png"
                                     x="0" y="0" height="3251" width="3501"/>

                              <g class="lamps">
                                <circle class="lamp" r="21.5" cx="191.5" cy="1601.5" fill="yellow"></circle>

                                <circle class="lamp" r="21.5" cx="258.5" cy="1556.5" fill="yellow"></circle>

                                <circle class="lamp" r="21.5" cx="325.5" cy="1601.5" fill="yellow"></circle>

                                <circle class="lamp" r="21.5" cx="3321.5" cy="1601.5" fill="yellow"></circle>

                                <circle class="lamp" r="21.5" cx="3387.5" cy="1556.5" fill="yellow"></circle>

                                <circle class="lamp" r="21.5" cx="3454.5" cy="1601.5" fill="yellow"></circle>
                              </g>

                            </g>

                            <g class="drones">
                              <image xlink:href="<?php echo get_template_directory_uri() ?>/resources/assets/images/animations/animation1/image_drone.png"
                                     x="0" y="0" height="172px" width="213px" class="drone"/>
                            </g>
                          </svg>
                        </div>
                    </div>
                </div>
            </div>

<!--            <img class="section-img-duplicate" src="https://img.clearme.com/img/how_Asset_2.png" alt="">-->
        </div>
    </div>
</div>
