<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>
	    <section id="slider">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                        <div class="title">
                            <h3>Glosarios <span>Destacados</span></h3>
                        </div>
                        <div id="owl-example" class="owl-carousel">
                            <div>
                                <?php if (dynamic_sidebar('top1')); {  } ?>
                            </div>
                            <div>
                                <?php if (dynamic_sidebar('top2')); {  } ?>
                            </div>
                            <div>
                                <?php if (dynamic_sidebar('top3')); {  } ?>
                            </div>
                            <div>
                                <?php if (dynamic_sidebar('top4')); {  } ?>
                            </div>
                            <!--<div>
                                <?php if (dynamic_sidebar('top5')); {  } ?>
                            </div>
                            <div>
                                <?php if (dynamic_sidebar('top6')); {  } ?>
                            </div> -->  
                        </div>
                    </div>
                </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
        </div><!-- .container close -->
    </section><!-- slider close -->
    <!--
    about-us start
    ============================== -->
    <section id="about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <!--<img class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="400ms" src="<?php echo get_template_directory_uri(); ?>/images/cooker-img.png" alt="cooker-img">-->
                        <!--<h1 class="heading wow fadeInUp" data-wow-duration="400ms" data-wow-delay="500ms" >Your <span>Restaurant’s</span> </br> Website Has To Look <span>Good</span>
                        </h1>-->
                        <h1>Buscador de glosarios</h1>                        
                    </div>
                </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
            <div class="row buscador">
                <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
            </div>
        </div><!-- .containe close -->
    </section><!-- #call-to-action close -->
    <!--
    blog start
    ============================ -->
    
	
<?php get_footer(); ?>
