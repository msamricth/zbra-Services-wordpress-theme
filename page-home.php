<?php
/**
 * Template Name: home page
 * The template used for displaying fullwidth page content in fullwidth.php
 *
 * @package zbratheme
 */
get_header(); ?>


<!-- theme-slider 
<section class="theme-slider">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  			<!-- Wrapper for slides 
  			<div class="carousel-inner" role="listbox">
          <?php
    				$cid = get_theme_mod('slider_category_display');
    				$category_link = get_category_link($cid);
    				$thebootstrapthemes_cat = get_category($cid);
    				if ($thebootstrapthemes_cat) {
        	?>

        	<?php
            $args = array(
              'posts_per_page' => 3,
              'paged' => 1,
              'cat' => $cid
            );
            $loop = new WP_Query($args);
            
            $cn = 0;
            if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();$cn++;
          ?>

    			<div class="item <?php echo $cn == 1 ? 'active' : ''; ?>">
  						  <?php if(has_post_thumbnail()){
                	$arg =
                  	array(
                      'class' => 'img-responsive',
                      'alt' => ''
                		);
                		the_post_thumbnail('',$arg);
              	  } 
                ?>
            <div class="slide-caption">
              <div class="container">
                <div class="slide-caption-details">
                <h4><?php the_title();?></h4>
                <div class="summary"><?php the_excerpt('thebootstrapthemes_excerpt_length');?></div>
                <a href="<?php the_permalink();?>" title="" class="btn btn-danger">View</a>
                </div>
              </div>
            </div>
      		</div> <!-- /.end of item 
        
    			<?php                 
      			endwhile;
      				wp_reset_postdata();  
      			endif;                             
    				}
    			?> 
        </div>  <!-- /.end of carousel inner -->

        <!-- Controls
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
  				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"><i class="fa fa-angle-left"></i></span>
  				<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
  				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"><i class="fa fa-angle-right"></i></span>
  				<span class="sr-only">Next</span>
				</a>

      </div> -->
<div class="spacer">
<div class="container-fluid">
    <div class="row">
        <div class="paralax-layover col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">
            <section class="page-section">

                  
                  <div class="<?php echo $class;?> detail-content">

                          <?php while ( have_posts() ) : the_post(); ?>
                              <?php get_template_part( 'template-parts/content', 'page' ); ?>   

                          <?php endwhile; // End of the loop. ?>     

                      </div> <!-- /.end of detail-content -->


            </section><!-- /.end of section -->
        </div>
    </div>
</div>
</div>
<div class="spacer nopadding ytborderbttm">
    <div id='hero' class='hidden-xs'>
        <div class='layer-bg layer' data-enllax-ratio="1"></div>
        <div class='layer-1 layer'data-enllax-ratio="0.2"></div>
        <div class='layer-2 layer' data-enllax-ratio="0.6" data-enllax-direction="horizontal"></div>
        <div class='layer-3 layer' data-enllax-ratio="0.4"></div>
    </div>
<div class="container-fluid">
    <div class="row">
        <div class="paralax-layover col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">
            <section class="page-section">

                    <div class="<?php echo $class;?> detail-content">

                        <div class="page-title">
                            <h1>Who We Are</h1>
                        </div>
                        <div class="spacer">
                            <div class="row">
                                <div class="col-lg-4">
                                     <div class="well profile">
                                        <div class="col-sm-12">
                                            <div class="col-xs-12 col-sm-8">
                                                <h2>Dany Sigwalt</h2>
                                                <p><strong>About: </strong> Digital Strategist</p>
                                                <p><strong>Hobbies: </strong> I organize people, systems and files to help people do social justice work better. </p>
                                                <p><strong>Skills: </strong>
                                                    <span class="tags">Digital Strategy</span>
                                                    <span class="tags">Organizer</span>
                                                    <span class="tags">Operations</span>
                                                    <span class="tags">Administration</span>
                                                    <span class="tags">Board Development</span>
                                                    <span class="tags">Fundraising</span>
                                                </p>
                                            </div>             
                                            <div class="col-xs-12 col-sm-4 text-center">
                                                <figure>
                                                  <img class="img-responsive media-object dp img-circle" src="http://beta.zbraservices.com/wp-content/themes/zbra/images/dany.jpg" style="width: 100px;height:100px;">
                                                </figure>
                                            </div>
                                        </div>            
                                        <div class="col-xs-12 divider text-center">
                                            <div class="col-xs-12 col-sm-6 emphasis">
                                                <a href="https://www.linkedin.com/in/dsigwalt" class="btn btn-success btn-block"><span class="fa fa-linkedin"></span> Linkedin </a>
                                            </div>
                                        </div>
                                     </div>                 
                                </div>
                                <div class="col-lg-4">
                                     <div class="well profile">
                                        <div class="col-sm-12">
                                            <div class="col-xs-12 col-sm-8">
                                                <h2>Mark Perkins</h2>
                                                <p><strong>About: </strong> Design and Film</p>
                                                <p><strong>Hobbies: </strong> Coming soon </p>
                                                <p><strong>Skills: </strong>
                                                    <span class="tags">Graphics</span>
                                                    <span class="tags">Web</span>
                                                    <span class="tags">Film</span>
                                                    <span class="tags">Logo</span>
                                                    <span class="tags">Print</span>
                                                </p>
                                            </div>             
                                            <div class="col-xs-12 col-sm-4 text-center">
                                                <figure>
                                                  <img class="img-responsive media-object dp img-circle" src="http://beta.zbraservices.com/wp-content/themes/zbra/images/no-image.jpg" style="width: 100px;height:100px;">
                                                </figure>
                                            </div>
                                        </div>            
                                     </div>                 
                                </div>
                                <div class="col-lg-4">
                                     <div class="well profile">
                                        <div class="col-sm-12">
                                            <div class="col-xs-12 col-sm-8">
                                                <h2>Emmelia Talarico</h2>
                                                <p><strong>About: </strong> Web Developer</p>
                                                <p><strong>Hobbies: </strong>Stack Developer, DJ, cycling, cooking. Is really into geeking out on jQuery and PHP!</p>
                                                <p><strong>Skills: </strong>
                                                    <span class="tags">jQuery</span>
                                                    <span class="tags">HTML5</span>
                                                    <span class="tags">Drupal</span>
                                                    <span class="tags">Wordpress</span>
                                                    <span class="tags">PHP</span>
                                                    <span class="tags">SASS</span>
                                                    <span class="tags">Nationbuilder</span>                                                    
                                                </p>
                                            </div>             
                                            <div class="col-xs-12 col-sm-4 text-center">
                                                <figure>
                                                  <img class="img-responsive media-object dp img-circle" src="http://beta.zbraservices.com/wp-content/themes/zbra/images/emm.jpg" style="width: 100px;height:100px;">
                                                </figure>
                                            </div>
                                        </div>            
                                        <div class="col-xs-12 divider text-center">
                                            <div class="col-xs-12 col-sm-6 emphasis">
                                                <a href="https://www.linkedin.com/in/emmelia-talarico" class="btn btn-success btn-block"><span class="fa fa-linkedin"></span> Linkedin </a>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 emphasis">
                                                <a href="https://github.com/msamricth" class="btn btn-info btn-block"><span class="fa fa-github"></span> Github </a>
                                            </div>
                                        </div>
                                     </div>                 
                                </div>
                            </div>    
                        </div>
                      </div> <!-- /.end of detail-content -->



            </section><!-- /.end of section -->
        </div>
    </div>
</div>
</div>
<div class="spacer nopadding ytborderbttm">
<div class="container-fluid">
    <div class="row">
        <div class="paralax-layover col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">
            <section class="page-section">

                    <div class="<?php echo $class;?> detail-content">

                        <div class="page-title">
                            <h1>Consult With Us</h1>
                        </div>

                        <div class="single-post">
                            <div class="post-content">      
                                <?php 
                                $id=174; 
                                $post = get_post($id); 
                                $content = apply_filters('the_content', $post->post_content); 

                                ?>

                                <article>
                                    <?php echo $content;  ?>
                                </article> <!-- /.end of article -->
                            </div>


                        </div>      

                      </div> <!-- /.end of detail-content -->



            </section><!-- /.end of section -->
        </div>
    </div>
</div>
<div class="spacer nopadding">
<div id='hero' class='hidden-xs rainlax'>
    <div class='rlayer-bg layer' data-enllax-ratio="1"></div>
    <div class='rlayer-1 layer'data-enllax-ratio="0.2"></div>
    <div class='rlayer-2 layer' data-enllax-ratio="0.6"></div>
    <div class='flowergif'></div>
</div>
<!-- post list  -->
<div class="container-fluid">
    <div class="row">
        <div class="paralax-layover col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">    
            <section class="post-list">
                <div class="container">
                      <?php
                        $cid = get_theme_mod('features_display');
                        $category_link = get_category_link($cid);
                        $thebootstrapthemes_cat = get_category($cid);
                        if ($thebootstrapthemes_cat) {
                      ?>

                      <div class="clearfix">
                        <h4><?php echo get_theme_mod( 'features_title', 'Featured Category' ); ?></h4>
                        <a href="<?php echo esc_url( $category_link ); ?>" title="" class="pull-right">View All</a>
                      </div>

                      <div class="row">

                        <?php
                            $args = array(
                                'posts_per_page' => 8,
                                'paged' => 1,
                                'cat' => $cid
                            );
                            $loop = new WP_Query($args);                                   
                            if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 eq-blocks">
                          <div class="post-block">
                            <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" rel="bookmark" class="featured-image"><?php the_post_thumbnail('home-thumb'); ?></a>
                            <?php else : ?>
                            <a href="<?php the_permalink(); ?>" rel="bookmark" class="featured-image"><img src="<?php echo get_template_directory_uri(); ?>/images/no-blog-thumbnail.jpg" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive" /></a>
                          <?php endif; ?>  
                          <!-- summary -->
                          <div class="summary">
                            <h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title();?></a></h3>

                            <?php the_excerpt('thebootstrapthemes_excerpt_length');?>

                          <a href="<?php the_permalink(); ?>" rel="bookmark" class="readmore">Read More</a>
                          </div>
                             <!-- summary -->
                          </div>
                        </div>

                        <?php
                            endwhile;
                                wp_reset_postdata();
                            endif; }
                        ?>
                  </div>
                            </div>  <!-- /.end of container -->
            </section>  <!-- /.end of section -->
        </div>
    </div>
</div>
<!-- post list  -->
    </div>
<?php get_footer();?>