<?php
/*
17-03-15 made by Anne
*/
//加载小工具
//mc_get_theme_file("/widgets/widget-consult.php");
//增强默认编辑器
function Bing_editor_buttons($buttons){
	$buttons[] = 'fontselect';
	$buttons[] = 'fontsizeselect';
	$buttons[] = 'backcolor';
	$buttons[] = 'underline';
	$buttons[] = 'sub';
	$buttons[] = 'sup';
	$buttons[] = 'cut';
	$buttons[] = 'copy';
	$buttons[] = 'paste';
	$buttons[] = 'wp_page';
	$buttons[] = 'newdocument';
    $buttons[] = 'textIndent';
	return $buttons;
}
add_filter("mce_buttons_3", "Bing_editor_buttons");
// 挂载函数到正确的钩子
function my_add_mce_button() {
	// 检查用户权限
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// 检查是否启用可视化编辑
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'my_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'my_register_mce_button' );
	}
}
add_action('admin_head', 'my_add_mce_button');
 
 
// 在编辑器上注册新按钮
function my_register_mce_button( $buttons ) {
	array_push( $buttons, 'my_mce_button' );
	return $buttons;
}
function paipk1_quicktags() { 
 	 if (wp_script_is('quicktags')){?>
 	 <script type="text/javascript">
  		  QTags.addButton( 'textIndent','取消首行缩进','<p style="text-indent:none">','</p>','','首行缩进2字符',101);
  	</script>
<?php }}
add_action('admin_print_footer_scripts', 'paipk1_quicktags');


//获取特色图片地址 全大小
function get_post_full_url($post_id){
	$post_id = ( null === $post_id ) ? get_the_ID() : $post_id;
	$thumbnail_id = get_post_thumbnail_id($post_id);
	if($thumbnail_id ){
		$thumb = wp_get_attachment_image_src($thumbnail_id, 'full');
		return $thumb[0];
	}else{
		return false;
	}

}
//获取特色图片地址 缩略大小
function get_post_thumbnail_url($post_id){
	$post_id = ( null === $post_id ) ? get_the_ID() : $post_id;
	$thumbnail_id = get_post_thumbnail_id($post_id);
	if($thumbnail_id ){
		$thumb = wp_get_attachment_image_src($thumbnail_id, 'thumbnail');
		return $thumb[0];
	}else{
		return false;
	}
}
//隐藏后台title Wordpress信息
add_filter('admin_title', 'wpdx_custom_admin_title', 10, 2);
function wpdx_custom_admin_title($admin_title, $title){
return $title.' &lsaquo; '.get_bloginfo('name');
}

//去掉关于Wordpress的图标
function annointed_admin_bar_remove() {
global $wp_admin_bar;
$wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);

/*隐藏自动更新，插件更新信息*/
add_action('admin_menu','wp_hide_nag');
function wp_hide_nag() {
	remove_action( 'admin_notices', 'update_nag', 3 );
}

add_filter ('pre_site_transient_update_core', '__return_null');
 
remove_action ('load-update-core.php', 'wp_update_plugins');
add_filter ('pre_site_transient_update_plugins', '__return_null');
 
remove_action ('load-update-core.php', 'wp_update_themes');
add_filter ('pre_site_transient_update_themes', '__return_null');

// 增加post_type 试水
// function my_custom_banner() {
// 	$labels = array(
// 	  'name'               => _x( 'banner', 'post type 名称' ),
// 	  'singular_name'      => _x( 'banner', 'post type 单个 item 时的名称，因为英文有复数' ),
// 	  'add_new'            => _x( '新建banner', '添加新内容的链接名称' ),
// 	  'add_new_item'       => __( '新建一个电影' ),
// 	  'edit_item'          => __( '编辑电影' ),
// 	  'new_item'           => __( '新电影' ),
// 	  'all_items'          => __( '所有电影' ),
// 	  'view_item'          => __( '查看电影' ),
// 	  'search_items'       => __( '搜索电影' ),
// 	  'not_found'          => __( '没有找到有关电影' ),
// 	  'not_found_in_trash' => __( '回收站里面没有相关电影' ),
// 	  'parent_item_colon'  => '',
// 	  'menu_name'          => 'banner'
// 	);
// 	$args = array(
// 	  'labels'        => $labels,
// 	  'description'   => '我们网站的banner',
// 	  'public'        => true,
// 	  'menu_position' => 5,
// 	  'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
// 	  'has_archive'   => true
// 	);
// 	register_post_type( 'banner', $args );
//   }
//   add_action( 'init', 'my_custom_banner' );
 
function create_media_category() {
	$args = array(
	  'label' => '媒体分类',
	  'hierarchical' => true,
	  'show_admin_column' => true,
	  'show_ui'      => true,
	  'query_var'    => true,
	  'rewrite'      => true,
	);
  
	register_taxonomy( 'attachment_category', 'attachment', $args );
  }
  
  add_action( 'init', 'create_media_category' );
?>
