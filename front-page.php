<?php 
/**
 * The front page template
 */

get_header('home'); ?>

  <div class="off-canvas-wrapper">
    <div class="off-canvas position-left" id="offCanvas" data-off-canvas>
      <!-- Your menu or Off-canvas content goes here -->
    </div>
    <div class="off-canvas-content" data-off-canvas-content>
      <!-- Your page content lives here -->
	 	<div class="content">
	 		
			<header class="header" role="banner">
						
				 <!-- This navs will be applied to the topbar, above all content 
					  To see additional nav styles, visit the /parts directory -->
				 <?php get_template_part( 'parts/nav', 'offcanvas-topbar' ); ?>
	 
			</header> <!-- end .header -->	 
		
			<div class="inner-content grid-x grid-margin-x grid-padding-x">
		
			    <main class="main small-12 large-8 medium-8 cell" role="main">
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
				    	<?php get_template_part( 'parts/loop', 'page' ); ?>
				    
				    <?php endwhile; endif; ?>							
				    					
				</main> <!-- end #main -->
	
			    <?php get_sidebar(); ?>
			    
			</div> <!-- end #inner-content -->
	
		</div> <!-- end #content -->       
    </div> <!-- end .off-canvas-content -->  
  
  </div> <!--end of off-canvas-wrapper-->

		


<?php get_footer('home'); ?>