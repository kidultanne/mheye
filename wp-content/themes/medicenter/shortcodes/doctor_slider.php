<?php
function mh_doctor_slider_shortcode($atts)
{
	global $themename;
	extract(shortcode_atts(array(
		"id" => "doc_slider",
		"doctor" => "",
		"title" => "",
		"images" => "",
		"top_margin" => "page_margin_top_section",
		"position"=>1,
		"summary"=>"",
        //  "title"=>"",
         "doctor_link"=>"",
		 "link"=>"#", 
	), $atts));
	$output = '<div id="doctor_slider">';
	$images = explode(',', $images);
	$i=0;
	foreach($images as $attach_id)
	{
		$attachment = get_posts(array('p' => $attach_id, 'post_type' => 'attachment'));
		// $output .= '<li>' . wp_get_attachment_image($attach_id, $themename . "-gallery-image", false, array("alt" => ""/*, "class" => "mc_preload"*/));
		$output .= '<div class="special-doctor-box clearfix"'.($position==1 ? ' Annetrick ':' m-sec-content ').'>
						<img src="'.($attachment[i]->guid).'" alt=""/>
						<div class="special-doctor-content">
							<h2>'. esc_attr($atts["doctor" . $i]) .'<span>/'. esc_attr($atts["title" . $i]) .'</span></h2>
							<p>'. esc_attr($atts["summary" . $i]) .'</p>
							<div class="sec-page-button-box"><button><a href="'. esc_attr($atts["link" . $i]) .'">立即咨询</a></button></div>
						</div>
					</div>';
		$i++;
	}
	$output .= '</div><ul id="doctor_slider_box"></ul>';
	// $output .= '</div>';
	return $output;
}
add_shortcode("mh_doctor_slider", "mh_doctor_slider_shortcode");

$params = array(
	array(
		"type" => "textfield",
		"class" => "",
		"heading" => __("Id", 'medicenter'),
		"param_name" => "id",
		"value" => "doctor_slider",
		"description" => __("Please provide unique id for each carousel on the same page/post", 'medicenter')
	),
	array(
		"type" => "attach_images",
		"class" => "",
		"heading" => __("Images", 'medicenter'),
		"param_name" => "images",
		"value" => ""
	)
);
for($i=0; $i<10; $i++)
{
	$params[] = 	array(
		"type" => "textfield",
		"class" => "",
		"heading" => __("医生姓名", 'medicenter'). " " . ($i+1),
		"param_name" => "doctor". $i,
		"value" => ""
	);
	$params[] = 	array(
		"type" => "textfield",
		"class" => "",
		"heading" => __("医生头衔", 'medicenter'). " " . ($i+1),
		"param_name" => "title". $i,
		"value" => ""
	);
	$params[] = 	array(
		"type" => "textfield",
		"class" => "",
		"heading" => __("医生简介", 'medicenter'). " " . ($i+1),
		"param_name" => "summary". $i,
		"value" => ""
	);
	$params[] = 	array(
		"type" => "textfield",
		"class" => "",
		"heading" => __("医生链接地址", 'medicenter'). " " . ($i+1),
		"param_name" => "doctor_link". $i,
		"value" => ""
	);
	$params[] = 	array(
		"type" => "textfield",
		"class" => "",
		"heading" => __("预约链接地址", 'medicenter'). " " . ($i+1),
		"param_name" => "link". $i,
		"value" => ""
	);

}
$params = array_merge($params, array(
	array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("所在位置", 'medicenter'),
            "param_name" => "position",
            "value" => array(__("PC端", 'medicenter') => 1, __("手机端页面", 'medicenter') => 0)
        ),
	array(
		"type" => "dropdown",
		"class" => "",
		"heading" => __("Top margin", 'medicenter'),
		"param_name" => "top_margin",
		"value" => array(__("Section (large)", 'medicenter') => "page_margin_top_section", __("Page (small)", 'medicenter') => "page_margin_top", __("None", 'medicenter') => "none")
	)
));
vc_map( array(
	"name" => __("美和医生组件", 'medicenter'),
	"base" => "mc_doctor_slider",
	"class" => "",
	"controls" => "full",
	"show_settings_on_create" => true,
	"icon" => "icon-wpb-layer-box-header",
	"category" => __('MediCenter', 'medicenter'),
	"params" => $params
));
?>
