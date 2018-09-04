<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>
<header class="header" role="banner" >
	<div  class="go-c-nav sticky" data-sticky data-options="marginTop:0;stickTo:top;" style="width:100%">
		<div class="top-bar" id="top-bar-menu" >
			<div class="top-bar-left float-left show-for-medium">
				<div class="menu">
					<div class="go-c-nav__title">
						<a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
					</div>
					<div>
						<?php joints_top_nav(); ?>	
					</div>
				</div>
			</div>
			
			<div class="top-bar-right">
				important
			</div>
			
			
			<div class="top-bar-right float-right hide-for-medium go-c-nav--mobile">
				<ul class="menu">
					<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
					<li><a data-toggle="offCanvas"><?php _e( 'Menu', 'go' ); ?></a></li>
				</ul>
			</div>
		</div>	
	</div>
</header> <!-- end .header -->	
