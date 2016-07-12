<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package zbratheme
 */

?>

		<!-- Tab to top scrolling -->
		<div class="scroll-top-wrapper"> <span class="scroll-top-inner">
  			<i class="fa fa-2x fa-angle-up"></i>
    		</span>
    	</div> 
		
		<footer>
		<div class="container">

				<?php 
                    $show_social_in_footer = get_theme_mod('socialicon_display' );
                    {?>   
			        <div class="pull-left">
				            <ul class="list-inline social">
	                            <?php 
	                            $facebook =  get_theme_mod('facebook_textbox');
	                            $twitter = get_theme_mod('twitter_textbox');
	                            $googleplus = get_theme_mod('googleplus_textbox');
	                            $youtube = get_theme_mod('youtube_textbox');
	                            $linkedin = get_theme_mod('linkedin_textbox');

	                            if($facebook){?>
	                              <li><a href="<?php echo $facebook;?>"><i class="fa fa-facebook"></i></a></li>
	                            <?php }
	                            if($twitter){?>
	                              <li><a href="<?php echo $twitter;?>"><i class="fa fa-twitter"></i></a></li>
	                            <?php }
	                            if($googleplus) {?>
	                              <li><a href="<?php echo $googleplus;?>"><i class="fa fa-google-plus"></i></a></li>
	                            <?php }
	                            if($youtube){?>
	                              <li><a href="<?php echo $youtube;?>"><i class="fa fa-youtube-play"></i></a></li>
	                            <?php }
	                            if($linkedin){?>
	                              <li><a href="<?php echo $linkedin;?>"><i class="fa fa-linkedin"></i></a></li>
	                            <?php }?>
                        	</ul>
                        	<div class="phone-email">
                        		<i class="fa fa-envelope"></i> <a href="<?php echo get_theme_mod( 'top_email', 'mailto:info@example.com' ); ?>" title=""><?php echo get_theme_mod( 'top_email', 'info@example.com' ); ?></a>
								<i class="fa fa-phone"></i> <?php echo get_theme_mod( 'top_phone', '(123)-123-1234' ); ?>
							</div>	
					</div>
				<?php }?> 
			    <div class="pull-right">
			        <?php echo get_theme_mod( 'copyright_textbox', 'Copyright &copy; 2015. The Bootstrap Themes. All Rights Reserved.' ); ?>
			      	</div>
			    </div>

		</footer>

	
		
		<?php wp_footer(); ?>
	</body>
</html>