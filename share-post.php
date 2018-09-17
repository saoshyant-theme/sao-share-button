<?php
/*
Plugin Name: Sao Share Button
Author: Saoshyant
*/ 
  

function sao_share_post_css() {
  	 	wp_enqueue_style( 'sao_share_post', plugins_url( '/share_post.css', __FILE__ ) );  
}
add_action( 'wp_enqueue_scripts', 'sao_share_post_css' ); 

add_action('init', 'sao_share_post_lang');
function sao_share_post_lang() {
    $path = dirname(plugin_basename( __FILE__ )) . '/languages/';
    $loaded = load_plugin_textdomain( 'sao', false, $path);
 
} 
/********************************************************************
Share Post
*********************************************************************/
function sao_share_post(  $facebook =true, $google=true,$twitter=true,$linkedin=true){
	 $url ='http://twitter.com/share?text='.urlencode(get_the_title()).'&url='.get_permalink();$title = str_replace("#",'' ,'send?text='.get_the_title());$per =get_permalink();

	
	if( !empty($twitter) || !empty($facebook) || !empty($google )|| !empty($linkedin )||!empty( $telegram)||!empty( $whatsapp)) { 
	?>
    
	<ul class="rd-share-post">
 		<?php if( !empty($facebook)){ ?>
			<li class="rd-share-facebook">
				<a class="rd-facebook rd-share-social" href="http://www.facebook.com/sharer.php?u=<?php the_permalink() ?>"><?php echo esc_html__('Facebook','sao');?></a>
			</li>
 		<?php } ?> 
        
		<?php if(  !empty($google)){ ?>
			<li  class="rd-share-google" >
				<a class="rd-google rd-share-social" href="https://plus.google.com/share?url=<?php the_permalink() ?>"><?php echo esc_html__('GooglePlus','sao');?></a>
			</li>
 		<?php } ?>
        
		<?php if( !empty($twitter)){ ?>
			<li  class="rd-share-twitter">
				<a class="rd-twitter rd-share-social" href="<?php echo esc_url($url);?>"><?php echo esc_html__('Twitter','sao');?></a>
			</li>
 		<?php } ?> 
        
		<?php if( !empty($linkedin)){ ?>
			<li class="rd-share-linkedin">
				<a class="rd-linkedin rd-share-social" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>"><?php echo esc_html__('Linkedin','sao');?></a>
			</li>
 		<?php } ?>	
        
	 
        </ul>
        
	<?php 
	} 
}
?>
