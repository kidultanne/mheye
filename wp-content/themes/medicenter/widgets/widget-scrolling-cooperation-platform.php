<?php
class scrolling_cooperation_platform_widget extends WP_Widget 
{
	/** constructor */
    function scrolling_cooperation_platform_widget() 
	{
		global $themename;
		$widget_options = array(
			'classname' => 'scrolling_cooperation_platform_widget',
			'description' => '显示滚动平台'
		);
        parent::__construct('medicenter_scrolling_recent_posts', __('Scrolling Cooperation Platform', 'medicenter'), $widget_options);
    }
	
	/** @see WP_Widget::widget */
    function widget($args, $instance) 
	{
        extract($args);

		//these are our widget options
		$title = isset($instance['title']) ? $instance['title'] : "";
		$animation = isset($instance['animation']) ? $instance['animation'] : "";
		$count = isset($instance['count']) ? $instance['count'] : "";

		//get recent posts
		query_posts(array( 
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => $count,
			'order' => 'DESC'
		));
		
		echo $before_widget;
		?>
		<div class="clearfix">
			<div class="header_left">
				<?php
				if($title) 
				{
					echo ((int)$animation ? str_replace("box_header", "box_header animation-slide", $before_title) : str_replace("animation-slide", "", $before_title)) . apply_filters("widget_title", $title) . $after_title;
				}
				?>
			</div>
			<div class="header_right">
				<a href="#" id="footer_recent_posts_prev" class="scrolling_list_control_left icon_small_arrow left_white"></a>
				<a href="#" id="footer_recent_posts_next" class="scrolling_list_control_right icon_small_arrow right_white"></a>
			</div>
		</div>
		<div style="margin-top:20px;">
			<ul class="scrolling_list footer_recent_posts">

			<li><img src="/wp-content/uploads/2013/04/bjysxh_icon.png"><img src="/wp-content/uploads/2013/04/bjykxh_icon.png"></li>
			<li><img src="/wp-content/uploads/2013/04/bjwjw_icon.png"><img src="/wp-content/uploads/2013/04/bjfybjxh_icon.png"></li>
			<li><img src="/wp-content/uploads/2013/04/zgysgxh_icon.png"><img src="/wp-content/uploads/2013/04/hdfzx_icon1.png"></li>
			<li><img src="/wp-content/uploads/2013/04/yhys_icon.png"><img src="/wp-content/uploads/2013/04/wdf_icon.png"></li>
			<li><img src="/wp-content/uploads/2013/04/tays_icon.png"><img src="/wp-content/uploads/2013/04/fd_icon.png"></li>
			<li><img src="/wp-content/uploads/2013/04/dxy_icon.png"><img src="/wp-content/uploads/2013/04/cyys_icon.png"></li>
			<li><img src="/wp-content/uploads/2013/04/awys_icon.png"><img src="/wp-content/uploads/2013/04/bbs_icon.png"></li>			

			</ul>
		</div>
		<?php
        echo $after_widget;
    }
	
	/** @see WP_Widget::update */
    function update($new_instance, $old_instance) 
	{
		$instance = $old_instance;
		$instance['title'] = isset($new_instance['title']) ? strip_tags($new_instance['title']) : "";
		$instance['animation'] = isset($new_instance['animation']) ? strip_tags($new_instance['animation']) : "";
		$instance['count'] = isset($new_instance['count']) ? strip_tags($new_instance['count']) : "";
		return $instance;
    }
	
	 /** @see WP_Widget::form */
	function form($instance) 
	{	
		global $themename;
		$title = isset($instance['title']) ? esc_attr($instance['title']) : "";
		$animation = isset($instance['animation']) ? esc_attr($instance['animation']) : "";
		$count = isset($instance['count']) ? esc_attr($instance['count']) : "";
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'medicenter'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('animation'); ?>"><?php _e('Title border animation', 'medicenter'); ?></label>
			<select id="<?php echo $this->get_field_id('animation'); ?>" name="<?php echo $this->get_field_name('animation'); ?>">
				<option value="0"><?php _e('no', 'medicenter'); ?></option>
				<option value="1"<?php echo ((int)$animation==1 ? ' selected="selected"' : ''); ?>><?php _e('yes', 'medicenter'); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Count', 'medicenter'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" />
		</p>
		<?php
	}
}
//register widget
add_action('widgets_init', create_function('', 'return register_widget("scrolling_cooperation_platform_widget");'));
?>