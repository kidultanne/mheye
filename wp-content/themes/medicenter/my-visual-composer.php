<?php
/*
17-07-03 splited from myfunctions.php by Anne
*/
//禁止前台编辑
//vc_disable_frontend();
                                                                                                                                                                                                                                                                                                
//闭合标签 带 i标签的 有 icon   id控制图标的样式,实际是类名 PC端选h2 
function custom_box_iheader($atts,$content=null)
{
	extract(shortcode_atts(array(
        "parent"=>"sec-page-content-left",
		"title" => "",
		"type" => "h2",
		"class" => "", 
		"top_margin" => "none",
        "id"=>" ",
		"icon"=>1
	), $atts));
	return '<div class="'.$parent.'"><' . $type . ' class="sec-page-title' . ($class!="" ? ' ' . $class : '') . ($top_margin!="none" ? ' ' . $top_margin : '') .($id!="" ? ' ' . $id : '') . '">'.((int)$icon==1?'<i></i>':'&nbsp').(do_shortcode($title)). '</' . $type . '>'.$content.'</div>';
}
add_shortcode("custom_iheader", "custom_box_iheader");
//visual composer
vc_map( array(
    "name" => __("新框标题", 'medicenter'),
    "base" => "custom_iheader",
    "class" => "",
    "controls" => "full",
    "show_settings_on_create" => true,
    "icon" => "icon-wpb-layer-box-header",
    "category" => __('美和眼科', 'medicenter'),
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("标题内容", 'medicenter'),
            "param_name" => "title",
            "value" => ""
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("标题大小", 'medicenter'),
            "param_name" => "type",
            "value" => array(__("H3", 'medicenter') => "h3",  __("H1", 'medicenter') => "h1", __("H2", 'medicenter') => "h2", __("H4", 'medicenter') => "h4", __("H5", 'medicenter') => "h5")
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("所在位置", 'medicenter'),
            "param_name" => "parent",
            "value" => array(__("PC端页面左侧", 'medicenter') => "sec-page-content-left",  __("PC端页面右侧", 'medicenter') => "sec-page-content-right", __("手机端页面", 'medicenter') => "m-sec-content")
        ),        
		array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("是否带图标", 'medicenter'),
            "param_name" => "icon",
            "value" => array(__("yes", 'medicenter') => 1,  __("no", 'medicenter') => 0)
        ),
		 array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("图标形状", 'medicenter'),
            "param_name" => "id",
            "value" => array( __("无图标", 'medicenter') => "",__("手术时机PC", 'medicenter') => "operate-time", __("手术方法PC", 'medicenter') => "operate-method",__("美和优势PC", 'medicenter') => "mh-advantage",__("专业医生PC", 'medicenter') => "mh-doctor",__("注意事项PC", 'medicenter') => "pay-attention",
			__("手术视频PC", 'medicenter') => "operate-video",__("手术照片PC", 'medicenter') => "operate-photos",__("科普讲座PC", 'medicenter') => "mh-speech",__("精选文章PC", 'medicenter') => "choice-articles",__("手术时机M", 'medicenter') => "m-operate-time",
			__("手术方法M", 'medicenter') => "m-operate-method",__("美和优势M", 'medicenter') => "m-mh-advantage",__("注意事项M", 'medicenter') => "m-pay-attention",__("专业医生M", 'medicenter') => "m-mh-doctor",__("相关文章M", 'medicenter') => "m-choice-articles"),
            "dependency" => Array('element' => "icon", 'value' => '1')
        ),
		 array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("Top margin", 'medicenter'),
            "param_name" => "top_margin",
            "value" => array(__("None", 'medicenter') => "none", __("Page (small)", 'medicenter') => "page_margin_top", __("Section (large)", 'medicenter') => "page_margin_top_section")
        ),
		 array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Extra class name", 'medicenter'),
            "param_name" => "class",
            "value" => ""
        )
    )
));


//增加预约按钮样式
function custom_iappointment($atts)
{
	extract(shortcode_atts(array(
		 "title" =>"我要预约专家",
         "class" => "",
         "top_margin" => "",
         "link" => "#",
		 "icon"=>1,
		 "state"=>0,
		 "statement_size"=>20,
		 "parent"=>"sec-page-content-left"
	), $atts));
	return '<div class="'.$parent.'"><div class="sec-page-button-box' . ($class!="" ? ' ' . $class : '') . ($top_margin!="none" ? ' ' . $top_margin : '') .'">
     <button><a href="'.$link.'">'.(do_shortcode($title)).((int)$icon==1?'<i></i>':'&nbsp').'</a></button> '. ($state==1 ? '<div style="font-size:'.$statement_size.'px;font-family: Microsoft YaHei;line-height:'. ((int)$statement_size==20 ? '40' . $class : '20') .'px;color:#646464;">(眼科专家一对一针对，图片不会外泄，请您放心上传)</div> ': '') .'</div></div>';
}
add_shortcode("custom_iappointment", "custom_iappointment");

//visual composer
vc_map( array(
    "name" => __("预约按钮", 'medicenter'),
    "base" => "custom_iappointment",
    "class" => "",
    "controls" => "full",
    "show_settings_on_create" => true,
    "icon" => "icon-wpb-layer-box-header",
    "category" => __('美和眼科', 'medicenter'),
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("按钮内容", 'medicenter'),
            "param_name" => "title",
            "value" => ""
        ),       
		array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("所在位置", 'medicenter'),
            "param_name" => "parent",
            "value" => array(__("PC端页面左侧", 'medicenter') => "sec-page-content-left",  __("PC端页面右侧", 'medicenter') => "sec-page-content-right", __("手机端页面", 'medicenter') => "m-sec-content")
        ), 
		array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("是否带图标", 'medicenter'),
            "param_name" => "icon",
            "value" => array(__("yes", 'medicenter') => 1,  __("no", 'medicenter') => 0)
        ),
		array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("是否带说明", 'medicenter'),
            "param_name" => "state",
            "value" => array(__("yes", 'medicenter') => 1,  __("no", 'medicenter') => 0)
        ),
		array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __(" 说明文字大小", 'medicenter'),
            "param_name" => "statement_size",
            "value" => array(__("大", 'medicenter') => 20,  __("小", 'medicenter') => 12),
			"dependency" => Array('element' => "state", 'value' => '1')
        ),
		array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("链接地址", 'medicenter'),
            "param_name" => "link",
            "value" => "#"
        ),
		 array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("Top margin", 'medicenter'),
            "param_name" => "top_margin",
            "value" => array(__("None", 'medicenter') => "none", __("Page (small)", 'medicenter') => "page_margin_top", __("Section (large)", 'medicenter') => "page_margin_top_section")
        ),
		array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Extra class name", 'medicenter'),
            "param_name" => "class",
            "value" => ""
        ) 
    )
));

//增加相关文章样式 仍需修改
function custom_iarticles($atts)
{
	
	extract(shortcode_atts(array(
		"top_margin"=>"",
         "class" => "",
		 "parent"=>"sec-page-content-left",
		 "number"=>8,
		//  "tag"=>"",
		 "category_name"=>""
		//  "link"=>"#"
	), $atts));
   $return_string = '<div class="'.$parent.'"><ul class="'.($class!="" ? ' ' . $class : ''). ($top_margin!="none" ? ' ' . $top_margin : '') .($parent=="m-sec-content-box"?' ':'choice-articles').'">';
   $args = array(
      'showposts'=>$number,
      'category_name'=>$category_name,
    //   'tag'=>$tag,
      'post_type' =>'post', 
      'post_status' =>'publish',      
      'post_type' =>'post', 
      'orderby' => 'date',
      'order' =>'DESC',    
      );
   query_posts($args);
   if (have_posts()) :
      while (have_posts()) : the_post();
         $return_string .= '<li><a href="'.get_permalink().'"> > >'.get_the_title().'</a></li>';
      endwhile;
   endif;
   $return_string .= '<li><span class="read-more"><a href="/?s='.$category_name .'"> > > 查看更多</span></a></li>';
   $return_string .= '</ul></div>';
 
   wp_reset_query();
   return $return_string;}
add_shortcode("custom_iarticles", "custom_iarticles");

//visual composer
function vc_custom_articles(){
	//get categories
	$post_categories = get_terms("category");
	$post_categories_array = array();
	$post_categories_array[__("All", 'medicenter')] = "-";
	foreach($post_categories as $post_category)
		$post_categories_array[$post_category->name] =  $post_category->slug;
	
vc_map( array(
		"name" => __("新相关文章", 'medicenter'),
		"base" => "custom_iarticles",
		"class" => "",
		"controls" => "full",
		"show_settings_on_create" => true,
		"icon" => "icon-wpb-layer-box-header",
		"category" => __('美和眼科', 'medicenter'),
		"params" => array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("所在位置", 'medicenter'),
				"param_name" => "parent",
				"value" => array(__("PC端页面左侧", 'medicenter') => "sec-page-content-left",  __("手机端页面", 'medicenter') => "m-sec-content-box")
			), 
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("输出文章个数", 'medicenter'),
				"param_name" => "number",
				"value" => array(__("3", 'medicenter') => 3,__("5", 'medicenter') => 5,  __("7", 'medicenter') => 7,  __("9", 'medicenter') => 9,  __("11", 'medicenter') => 11)
			),
			array(
				"type" => "dropdownmulti",
				"class" => "",
				"heading" => __("选择分类", 'medicenter'),
				"param_name" => "category_name",
				"value" => $post_categories_array
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Top margin", 'medicenter'),
				"param_name" => "top_margin",
				"value" => array(__("None", 'medicenter') => "none", __("Page (small)", 'medicenter') => "page_margin_top", __("Section (large)", 'medicenter') => "page_margin_top_section")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Extra class name", 'medicenter'),
				"param_name" => "class",
				"value" => ""
			)
		)
	));
}
add_action("init", "vc_custom_articles");
//增加相关文章样式 仍需修改
function relative_articles($atts)
{
	
	extract(shortcode_atts(array(
		"top_margin"=>"",
         "class" => "",
		 "number"=>8,
		 "tag"=>"",
		//  "link"=>"#"
	), $atts));
   $return_string = '<div class="clearfix '.$parent.'"><ul class=" recent-articles'.($class!="" ? ' ' . $class : ''). ($top_margin!="none" ? ' ' . $top_margin : '') .($parent=="m-sec-content-box"?' ':'choice-articles').'">';
   $args = array(
      'showposts'=>$number,
    //   'category_name'=>$category_name,
      'tag'=>$tag,
      'post_type' =>'post', 
      'post_status' =>'publish',      
      'orderby' => 'date',
      'order' =>'DESC',    
      );
   query_posts($args);
   if (have_posts()) :
      while (have_posts()) : the_post();
         $return_string .= '<li><a href="'.get_permalink().'"> > >'.get_the_title().'</a></li>';
      endwhile;
   endif;
   $return_string .= '</ul></div>';
 
   wp_reset_query();
   return $return_string;}
add_shortcode("relative_articles", "relative_articles");

//visual composer
function vc_relative_articles(){
	//get categories
	$post_tags = get_terms("post_tag");
	$post_tags_array = array();
	$post_tags_array[__("All", 'medicenter')] = "-";
	foreach($post_tags as $post_tag)
		$post_tags_array[$post_tag->name] =  $post_tag->slug;
	
vc_map( array(
		"name" => __("Banner相关文章", 'medicenter'),
		"base" => "relative_articles",
		"class" => "",
		"controls" => "full", 
		"show_settings_on_create" => true,
		"icon" => "icon-wpb-layer-box-header",
		"category" => __('美和眼科', 'medicenter'),
		"params" => array(
			// array(
			// 	"type" => "dropdown",
			// 	"class" => "",
			// 	"heading" => __("所在位置", 'medicenter'),
			// 	"param_name" => "parent",
			// 	"value" => array(__("PC端页面左侧", 'medicenter') => "sec-page-content-left",  __("手机端页面", 'medicenter') => "m-sec-content-box")
			// ), 
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("输出文章个数", 'medicenter'),
				"param_name" => "number",
				"value" => array(__("3", 'medicenter') => 3,__("5", 'medicenter') => 5,  __("7", 'medicenter') => 7,  __("9", 'medicenter') => 9,  __("11", 'medicenter') => 11)
			),
			array(
				"type" => "dropdownmulti",
				"class" => "",
				"heading" => __("选择标签", 'medicenter'),
				"param_name" => "tag",
				"value" => $post_tags_array
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Top margin", 'medicenter'),
				"param_name" => "top_margin",
				"value" => array(__("None", 'medicenter') => "none", __("Page (small)", 'medicenter') => "page_margin_top", __("Section (large)", 'medicenter') => "page_margin_top_section")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Extra class name", 'medicenter'),
				"param_name" => "class",
				"value" => ""
			)
		)
	));
}
add_action("init", "vc_relative_articles");

//增加视频 参数视频link  封面链接地址
function custom_ivideo($atts)
{
	extract(shortcode_atts(array(	 
         "class" => "",
         "top_margin" => "",
		 "video_link" =>"#",
         "pic_link" => "#",
		 "width"=>'660', 
	), $atts));
    $attachment = get_posts(array('p' => $pic_link, 'post_type' => 'attachment'));
	return '<div class="'.($class!="" ? ' ' . $class : ''). ($top_margin!="none" ? ' ' . $top_margin : '') .'"><video controls="controls" poster="'.($attachment[0]->guid).'" width="'.$width.'"  src="'.$video_link.'" >您的浏览器不支持 video 标签。</video></div>';
}
add_shortcode("custom_ivideo", "custom_ivideo");

//visual composer
vc_map( array(
    "name" => __("添加视频", 'medicenter'),
    "base" => "custom_ivideo",
    "class" => "",
    "controls" => "full",
    "show_settings_on_create" => true,
    "icon" => "icon-wpb-layer-box-header",
    "category" => __('美和眼科', 'medicenter'),
    "params" => array(
        array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __("视频封面地址", 'medicenter'),
            "param_name" => "pic_link",
            "value" => ""
        ), 
		array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("视频地址", 'medicenter'),
            "param_name" => "video_link",
            "value" => ""
        ),       
		array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("视频宽度", 'medicenter'),
            "param_name" => "width",
            "value" => array(__("50%", 'medicenter') => '50%',__("30%", 'medicenter') => '30%',__("100%", 'medicenter') => '100%' ),
        ),
		array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Top margin", 'medicenter'),
				"param_name" => "top_margin",
				"value" => array(__("None", 'medicenter') => "none", __("Page (small)", 'medicenter') => "page_margin_top", __("Section (large)", 'medicenter') => "page_margin_top_section")
			),
		array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Extra class name", 'medicenter'),
            "param_name" => "class",
            "value" => ""
        ) 
    )
));
//手机端主体图文混排样式
function custom_m_imgarticles($atts,$content=null)
{
	extract(shortcode_atts(array(
         "class" => "",
         "top_margin" => "",
		 "link"=>"sssj01_M.png"		
	), $atts));
   $attachment = get_posts(array('p' => $link, 'post_type' => 'attachment'));
	return ' <div class="m-sec-content-box clearfix '.($class!="" ? ' ' . $class : ''). ($top_margin!="none" ? ' ' . $top_margin : '') .'">
                            <div class="m-sec-content-left">
                            <img src="'.($attachment[0]->guid).'" alt="">
                            </div>
                            <div class="m-sec-content-right">
							  	<div class="m-ellipsis" data-attr="...">
									<div>
									<p>'.$content.'</p>
									</div>
								</div>
								<span class="read-more text-read-more" >查看更多 >></span>
                                <span class="read-more back-text" style="display:none;" >收起 >></span>							
                            </div>
                        </div> ';
}
add_shortcode("custom_m_imgarticles", "custom_m_imgarticles");

//visual composer
vc_map( array(
    "name" => __("手机端图文", 'medicenter'),
    "base" => "custom_m_imgarticles",
    "class" => "",
    "controls" => "full",
    "show_settings_on_create" => true,
    "icon" => "icon-wpb-layer-box-header",
    "category" => __('美和眼科', 'medicenter'),
    "params" => array(
        array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __("文字内容", 'medicenter'),
            "param_name" => "content",
            "value" => ""
        ),       
		array(
            "type" => "attach_image",
            "class" => "",
            "heading" => __( "左侧图片", "medicenter" ),
            "param_name" => "link",
            "value" => ''
            // 改手动输入url为调取媒体库
            ) , 
		 array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("Top margin", 'medicenter'),
            "param_name" => "top_margin",
            "value" => array(__("None", 'medicenter') => "none", __("Page (small)", 'medicenter') => "page_margin_top", __("Section (large)", 'medicenter') => "page_margin_top_section")
        ),
		array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Extra class name", 'medicenter'),
            "param_name" => "class",
            "value" => ""
        ) 
    )
));
//头部组件 图片调用媒体库
function custom_ihead($atts,$content=null)
{
	extract(shortcode_atts(array(
         "class" => "",
         "top_margin" => "",
		 "title"=>"",
		 "position"=>1,
         "appointment_link" =>"#",
		 "link"=>"#",
		 "doctor"=>"于刚",
		 "suitable"=>"",
		//  "read_more_link"=>""
	), $atts));
    $attachment = get_posts(array('p' => $link, 'post_type' => 'attachment'));
	if($position==1){//pc 端
		return '<div class="sec-page-head-box '.($class!="" ? ' ' . $class : ''). ($top_margin!="none" ? ' ' . $top_margin : '') .'">
                    <div class="sec-page-head">
                        <img src="'.($attachment[0]->guid).'"/>
                    </div>
                    <div class="sec-page-head">
                        <h1>'.$title.'</h1>
                         <div class="pc-ellipsis">
									<div>
									<p>'.$content.'</p>
									</div>
                                   
								</div>
								
                        <p class="sec-page-suit"><strong>适宜人群 :</strong>'.$suitable.'</p>
                        <p class="sec-page-doctor"><strong>推荐医生 :</strong>'.$doctor.'</p>
                    </div>
                </div>';
                // <span class="read-more" ><a href="'.$read_more_link.'">查看更多 > ></a></span>
	} else {//手机端
	 return '<div class="mobile-sec-page-head  '.($class!="" ? ' ' . $class : ''). ($top_margin!="none" ? ' ' . $top_margin : '') .'">
                    <h1>'.$title.'</h1>
                    <div class="m-sec-content clearfix">
                        <div class="m-sec-content-left">
                            <img src="'.($attachment[0]->guid).'" alt="">
                            <div class="sec-page-button-box"><button><a href="'.$appointment_link.'">我要预约医生<i></i></a></button></div>
                        </div>
                        <div class="m-sec-content-right">
                            <div class="sec-page-brief m-ellipsis"><div><p>'.$content.'</p></div></div>
                            <span class="read-more text-read-more" >查看更多 > ></span>
                            <span class="read-more back-text" style="display:none;" >收起 >></span>	
                            <p class="sec-page-suit"><strong>适宜人群 :</strong>'.$suitable.'</p>
                            <p class="sec-page-doctor"><strong>推荐医生 :</strong>'.$doctor.'</p>
                        </div>
                    </div>
                </div>
				';

	}
}
add_shortcode("custom_ihead", "custom_ihead");
//visual composer
vc_map( array(
    "name" => __("页面头部", 'medicenter'),
    "base" => "custom_ihead",
    "class" => "",
    "controls" => "full",
    "show_settings_on_create" => true,
    "icon" => "icon-wpb-layer-box-header",
    "category" => __('美和眼科', 'medicenter'),
    "params" => array(
		
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("页面标题", 'medicenter'),
            "param_name" => "title",
            "value" => ""
        ), 
		array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("所在位置", 'medicenter'),
            "param_name" => "position",
            "value" => array(__(" PC端", 'medicenter') => 1, __("手机端", 'medicenter') => 2)
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => __("手机端预约医生链接地址", 'medicenter'),
            "param_name" => "appointment_link",
            "value" => "",
            "dependency" => Array('element' => "position", 'value' => '2')
        ),
		array(
            "type" => "textarea",
            "class" => "",
            "heading" => __("摘要内容", 'medicenter'),
            "param_name" => "content",
            "value" => ""
        ), 
	   array(
            "type" => "textfield",
            "class" => "",
            "heading" => __("适应人群", 'medicenter'),
            "param_name" => "suitable",
            "value" => ""
        ),
		array(
            "type" => "textfield",
            "class" => "",
            "heading" => __("推荐医生", 'medicenter'),
            "param_name" => "doctor",
            "value" => ""
        ), 

        array(
            "type" => "attach_image",
            "class" => "",
            "heading" => __( "左侧图片", "medicenter" ),
            "param_name" => "link",
            "value" => ''
            // 改手动输入url为调取媒体库
            ) ,    

		 array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("Top margin", 'medicenter'),
            "param_name" => "top_margin",
            "value" => array(__("None", 'medicenter') => "none", __("Page (small)", 'medicenter') => "page_margin_top", __("Section (large)", 'medicenter') => "page_margin_top_section")
        ),
		array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Extra class name", 'medicenter'),
            "param_name" => "class",
            "value" => ""
        ) 
    )
));


//专科优势
function custom_iadvantage($atts)
{
	extract(shortcode_atts(array(
        "category"=>"",
        "ids"=>"",
        "class" => "",
        "top_margin" => "",
        "order_by" => "title menu_order",
        "number"=>4,
	), $atts));

    $ids = explode(",", $ids);
    if($ids[0]=="-" || $ids[0]=="")
    {
        unset($ids[0]);
        $ids = array_values($ids);
    }
    $category = explode(",", $category);
    if($category[0]=="-" || $category[0]=="")
    {
        unset($category[0]);
        $category = array_values($category);
    }
    query_posts(array(
        'post__in' => $ids,
        'post_type' => 'post',
        'posts_per_page' => '-1',
        'post_status' => 'publish',
        'category__in' => $category,
        'orderby' => implode(" ", explode(",", $order_by)),
        'order' => $order,
        'showposts'=>$number,
        'tag'=>'zkys'
    
    ));
    
    global $wp_query; 
    $post_count = $wp_query->post_count;
    
    $output = '<div class="sec-page-content-right">';
    if(have_posts())
    {
 
        while(have_posts()): the_post();
        $post_thumbnail_url = get_post_full_url(get_the_ID());
        $output .= '<a href="'. get_permalink() .'"><img src="'.$post_thumbnail_url.'" alt="眼科优势" class="sec-page-advantage"></a>';
        endwhile;
        
    }

    $output.='</div>';
                        
    //Reset Query
    wp_reset_query();
    return $output;

}
add_shortcode("custom_iadvantage", "custom_iadvantage");
//visual composer
function theme_zkys_vc_init(){
  //get posts list
    $posts_list = get_posts(array(
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
        'post_type' => 'post',
        'tag'=>'zkys',
    ));
    $posts_array = array();
    $posts_array[__("All", 'medicenter')] = "-";
    foreach($posts_list as $post)
        $posts_array[$post->post_title . " (id:" . $post->ID . ")"] = $post->ID;
    //get posts categories list
    $posts_categories = get_terms("category");
    $posts_categories_array = array();
    $posts_categories_array[__("All", 'medicenter')] = "-";
   
    foreach($posts_categories as $posts_category)
        $posts_categories_array[$posts_category->name] =  $posts_category->term_id;
        
    vc_map( array(
        "name" => __("专科优势组件", 'medicenter'),
        "base" => "custom_iadvantage",
        "class" => "",
        "controls" => "full",
        "show_settings_on_create" => true,
        "icon" => "icon-wpb-layer-box-header",
        "category" => __('美和眼科', 'medicenter'),
        "params" => array(
            array(
                "type" => "dropdownmulti",
                "class" => "",
                "heading" => __("Display selected", 'medicenter'),
                "param_name" => "ids",
                "description" => __( "请保证‘专科优势’标签下有文章", "medicenter" ),
                "value" => $posts_array
            ),
            array(
                "type" => "dropdownmulti",
                "class" => "",
                "heading" => __("Display from Category", 'medicenter'),
                "param_name" => "category",
                "value" => $posts_categories_array
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("显示文章个数", 'medicenter'),
                "param_name" => "number",
                "value" => ""
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Order by", 'medicenter'),
                "param_name" => "order_by",
                "value" => array(__("Title, menu order", 'medicenter') => "title,menu_order", __("Menu order", 'medicenter') => "menu_order", __("Date", 'medicenter') => "date")
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Order", 'medicenter'),
                "param_name" => "order",
                "value" => array(__("ascending", 'medicenter') => "ASC", __("descending", 'medicenter') => "DESC")
            )
        )
    ));
}
add_action("init", "theme_zkys_vc_init"); 

//咨询平台
function custom_iconsult($atts)
{
	extract(shortcode_atts(array(
         "class" => "",
         "top_margin" => "",
		 "link1"=>"#",
		 "link2"=>"#",
		 "address"=>"/contact",
	), $atts));
   return '<div class="sec-page-content-right '.($class!="" ? ' ' . $class : ''). ($top_margin!="none" ? ' ' . $top_margin : '') .'">
                            <div class="sec-page-consult">
                                <p>门诊时间</p>
                                <p>09：00--17：00</p>
                            </div>
                            <div class="sec-page-consult">
                                <p>医院咨询热线</p>
                                <p>400-895-6500</p>
                            </div>
                            <div class="sec-page-consult">
                                <p style="line-height: 40px;"><a href="'.$address.'">来院路线</a></p>
                            </div>
                            <div class="consult-button-box">
                                <button><a href="'.$link1.'" style="color:#fff;">免费咨询</button></a>
                                <button><a href="'.$link2.'" style="color:#fff;">免费预约</button></a>
                            </div>     
                        </div>';

}
add_shortcode("custom_iconsult", "custom_iconsult");
//visual composer
vc_map( array(
    "name" => __("咨询平台组件", 'medicenter'),
    "base" => "custom_iconsult",
    "class" => "",
    "controls" => "full",
    "show_settings_on_create" => true,
    "icon" => "icon-wpb-layer-box-header",
    "category" => __('美和眼科', 'medicenter'),
    "params" => array(
		
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("免费咨询链接地址", 'medicenter'),
            "param_name" => "link1",
            "value" => "请填写链接地址"
        ), 
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => __("免费预约链接地址", 'medicenter'),
            "param_name" => "link2",
            "value" => " 请填写链接地址 "
        ), 
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => __("来院路线地址", 'medicenter'),
            "param_name" => "address",
            "value" => "/contact"
        ),  
	   array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("Top margin", 'medicenter'),
            "param_name" => "top_margin",
            "value" => array(__("None", 'medicenter') => "none", __("Page (small)", 'medicenter') => "page_margin_top", __("Section (large)", 'medicenter') => "page_margin_top_section")
        ),
		array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Extra class name", 'medicenter'),
            "param_name" => "class",
            "value" => ""
        ) 
    )
));



//微信公共咨询
function theme_wechatbox($atts)
{
	extract(shortcode_atts(array(
		"category" => "",
		"ids" => "",
		"order_by" => "title menu_order",
		"order" => "ASC",
        "number"=>4
	), $atts));

	
	$ids = explode(",", $ids);
	if($ids[0]=="-" || $ids[0]=="")
	{
		unset($ids[0]);
		$ids = array_values($ids);
	}
	$category = explode(",", $category);
	if($category[0]=="-" || $category[0]=="")
	{
		unset($category[0]);
		$category = array_values($category);
	}
	query_posts(array(
		'post__in' => $ids,
		'post_type' => 'post',
		'posts_per_page' => '-1',
		'post_status' => 'publish',
		'category__in' => $category,
		'orderby' => implode(" ", explode(",", $order_by)),
		'order' => $order,
        'showposts'=>$number,
        'tag'=>'wechat'
    
	));
	
	global $wp_query; 
	$post_count = $wp_query->post_count;
	
	$output = '<div class="sec-wechat-box ">';
	if(have_posts())
	{
 
		while(have_posts()): the_post();
        $output .= '<div class="sec-wechat-content">';
        $post_thumbnail_url = get_post_full_url(get_the_ID());
        $excerpt = mb_strimwidth(strip_tags(get_the_content()),0,70,'......');
		$output .= '<h3><a href="'. get_permalink() .'" title="' . esc_attr(get_the_title()) . '">'. get_the_title() .'</a></h3><a href="' . get_permalink() . '"><img src="'.$post_thumbnail_url.'" alt=""></a><p class="sec-wechat-brief">'.$excerpt.'</p><a title="' . __("阅读更多", 'medicenter') . '" href="' . get_permalink() . '" class="wechat-read-more">阅读更多 <span> > ></span></a></div>';
		endwhile;
		
    }
    $output.='<div class="wechat-code-box">
                  <img src="/wp-content/themes/medicenter/images/sec-page/weixin.png" alt="">
                   <p>微信扫一扫</p>
                  <p>关注北京美和眼科诊所</p>
                </div>';
    $output.='</div>';
                        
	//Reset Query
	wp_reset_query();
	return $output;
}
add_shortcode("wechatbox", "theme_wechatbox");

//visual composer
function theme_wechatbox_vc_init()
{
	//get posts list
	$posts_list = get_posts(array(
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order' => 'ASC',
		'post_type' => 'post',
        'tag'=>'wechat'
	));
	$posts_array = array();
	$posts_array[__("All", 'medicenter')] = "-";
	foreach($posts_list as $post)
		$posts_array[$post->post_title . " (id:" . $post->ID . ")"] = $post->ID;

	//get posts categories list
	$posts_categories = get_terms("category");
	$posts_categories_array = array();
	$posts_categories_array[__("All", 'medicenter')] = "-";
	foreach($posts_categories as $posts_category)
		$posts_categories_array[$posts_category->name] =  $posts_category->term_id;

	vc_map( array(
		"name" => __("微信咨询组件", 'medicenter'),
		"base" => "wechatbox",
		"class" => "",
		"controls" => "full",
		"show_settings_on_create" => true,
		"icon" => "icon-wpb-layer-box-header",
		"category" => __('美和眼科', 'medicenter'),
		"params" => array(
			array(
				"type" => "dropdownmulti",
				"class" => "",
				"heading" => __("Display selected", 'medicenter'),
				"param_name" => "ids",
                "description" => __( "请保证‘微信咨询’标签下有文章", "medicenter" ),
				"value" => $posts_array
			),
			array(
				"type" => "dropdownmulti",
				"class" => "",
				"heading" => __("Display from Category", 'medicenter'),
				"param_name" => "category",
				"value" => $posts_categories_array
			),
            array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("显示文章个数", 'medicenter'),
				"param_name" => "number",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Order by", 'medicenter'),
				"param_name" => "order_by",
				"value" => array(__("Title, menu order", 'medicenter') => "title,menu_order", __("Menu order", 'medicenter') => "menu_order", __("Date", 'medicenter') => "date")
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Order", 'medicenter'),
				"param_name" => "order",
				"value" => array(__("ascending", 'medicenter') => "ASC", __("descending", 'medicenter') => "DESC")
			)
		)
	));
}
add_action("init", "theme_wechatbox_vc_init"); 


//科普讲座
function theme_speechbox($atts)
{

    extract(shortcode_atts(array(
        "category"=>"",
        "ids"=>"",
        "class" => "",
        "top_margin" => "",
        "order_by" => "title menu_order",
        "number"=>4,
        "order" => "ASC"
	), $atts));

	
	$ids = explode(",", $ids);
	if($ids[0]=="-" || $ids[0]=="")
	{
		unset($ids[0]);
		$ids = array_values($ids);
	}
	$category = explode(",", $category);
	if($category[0]=="-" || $category[0]=="")
	{
		unset($category[0]);
		$category = array_values($category);
	}
	query_posts(array(
		'post__in' => $ids,
        'post_type' => 'post',
        'posts_per_page' => '-1',
        'post_status' => 'publish',
        'category__in' => $category,
        'orderby' => implode(" ", explode(",", $order_by)),
        'order' => $order,
        'showposts'=>$number,
        'tag'=>'knowledge'
	));
	
	global $wp_query; 
	$post_count = $wp_query->post_count;
	
	$output = '';
	if(have_posts())
	{    
		while(have_posts()): the_post();
        $output .= '<div class="mh-speech-box">';
        $post_full_url = get_post_full_url(get_the_ID());
        $excerpt = mb_strimwidth(strip_tags(get_the_content()),0,70,'......');
        $views=getPostViews(get_the_ID());
        $cat_array=" ";
        foreach(get_the_category() as $category)
        $cat_array.= $category->name .' ';
        
		$output .= '<a href="' . get_permalink() . '"><img src="'.$post_full_url.'" alt=""></a><div class="mh-speech-content"><h3><a href="'. get_permalink() .'" title="'. esc_attr(get_the_title()) . '">'. get_the_title() .'</a></h3><p>'.$excerpt.'<a class="read-more" href="'. get_permalink() .'">  详细 →</a></p><p><span class="speech-content-left">'.$cat_array.'</span><span class="speech-content-right">'.$views.'</span></p></div></div>';
		endwhile;		
    }
                      
	//Reset Query
	wp_reset_query();
	return $output;
}
add_shortcode("speechbox", "theme_speechbox");

//visual composer
function theme_speechbox_vc_init()
{
	//get posts list
	$posts_list = get_posts(array(
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order' => 'ASC',
		'post_type' => 'post',
        'tag'=>'knowledge'
	));
	$posts_array = array();
	$posts_array[__("All", 'medicenter')] = "-";
	foreach($posts_list as $post)
		$posts_array[$post->post_title . " (id:" . $post->ID . ")"] = $post->ID;

	//get posts categories list
	$posts_categories = get_terms("category");
	$posts_categories_array = array();
	$posts_categories_array[__("All", 'medicenter')] = "-";
	foreach($posts_categories as $posts_category)
		$posts_categories_array[$posts_category->name] =  $posts_category->term_id;


	vc_map( array(
		"name" => __("科普讲座组件", 'medicenter'),
		"base" => "speechbox",
		"class" => "",
		"controls" => "full",
		"show_settings_on_create" => true,
		"icon" => "icon-wpb-layer-box-header",
		"category" => __('美和眼科', 'medicenter'),
		"params" => array(
			array(
				"type" => "dropdownmulti",
				"class" => "",
				"heading" => __("Display selected", 'medicenter'),
				"param_name" => "ids",
                "description" => __( "请保证‘科普讲座’标签下有文章", "medicenter" ),
				"value" => $posts_array
			),
			array(
				"type" => "dropdownmulti",
				"class" => "",
				"heading" => __("Display from Category", 'medicenter'),
				"param_name" => "category",
				"value" => $posts_categories_array
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Order by", 'medicenter'),
				"param_name" => "order_by",
				"value" => array(__("Title, menu order", 'medicenter') => "title,menu_order", __("Menu order", 'medicenter') => "menu_order", __("Date", 'medicenter') => "date")
			),
            array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("显示文章个数", 'medicenter'),
				"param_name" => "number",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Order", 'medicenter'),
				"param_name" => "order",
				"value" => array(__("ascending", 'medicenter') => "ASC", __("descending", 'medicenter') => "DESC")
			)
		)
	));
}
add_action("init", "theme_speechbox_vc_init"); 

//专业医生
function custom_doctor($atts,$content=null)
{
	extract(shortcode_atts(array(
         "class" => "",
         "top_margin" => "",
		 "position"=>1,
		 "doctor"=>"",
         "title"=>"",
         "doctor_link"=>"",
		 "link"=>"#",
	), $atts));
    $attachment = get_posts(array('p' => $doctor_link, 'post_type' => 'attachment'));

	return '<div class="special-doctor-box clearfix '.($position==1 ? ' Annetrick ':' m-sec-content ').($class!="" ? ' ' . $class : ''). ($top_margin!="none" ? ' ' . $top_margin : '') .'">
                <img src="'.($attachment[0]->guid).'" alt=""/>
                <div class="special-doctor-content">
                    <h2>'.$doctor.'<span>/'.$title.'</span></h2>
                    <p>'.$content.'</p>
                    <div class="sec-page-button-box"><button><a href="'.$link.'">立即咨询</a></button></div>
                </div></div>';
}
add_shortcode("custom_doctor", "custom_doctor");
//visual composer
vc_map( array(
    "name" => __("专业医生", 'medicenter'),
    "base" => "custom_doctor",
    "class" => "",
    "controls" => "full",
    "show_settings_on_create" => true,
    "icon" => "icon-wpb-layer-box-header",
    "category" => __('美和眼科', 'medicenter'),
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("医生姓名", 'medicenter'),
            "param_name" => "doctor",
            "value" => ""
        ),   
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => __("医生头衔", 'medicenter'),
            "param_name" => "title",
            "value" => ""
        ),  
         array(
            "type" => "textarea",
            "class" => "",
            "heading" => __("医生简介", 'medicenter'),
            "param_name" => "content",
            "value" => ""
        ),  
         array(
            "type" => "attach_image",
            "class" => "",
            "heading" => __("医生图片地址", 'medicenter'),
            "param_name" => "doctor_link",
            "value" => ""
        ),  
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("立即咨询链接地址", 'medicenter'),
            "param_name" => "link",
            "value" => "#"
        ),  
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
            "value" => array(__("None", 'medicenter') => "none", __("Page (small)", 'medicenter') => "page_margin_top", __("Section (large)", 'medicenter') => "page_margin_top_section")
        ),
		array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Extra class name", 'medicenter'),
            "param_name" => "class",
            "value" => ""
        ) 
    )
));

//医生集团页图文组件
function custom_dc_artimg($atts,$content=null)
{
	extract(shortcode_atts(array(
         "class" => "",
         "top_margin" => "",
		 "link"=>""	,
         "number"=>"01"	,
         "header"=>""
	), $atts));
   $attachment = get_posts(array('p' => $link, 'post_type' => 'attachment'));

     return '<div class="company-msg "><div class="company-msg-content  clearfix '.($class!="" ? ' ' . $class : ''). ($top_margin!="none" ? ' ' . $top_margin : '') .'">
                    <div class="company-msg-right ">
                        <img src="'.($attachment[0]->guid).'" alt="">
                    </div>
                    <div class="company-msg-left ">
                        <h2><span>'.$number.'.</span>  '.$header.'</h2>
                        <p>'.$content.'</p>
                    </div>
                    
                </div></div>';
}
add_shortcode("custom_dc_artimg", "custom_dc_artimg");

//visual composer
vc_map( array(
    "name" => __("医生集团图文组件", 'medicenter'),
    "base" => "custom_dc_artimg",
    "class" => "",
    "controls" => "full",
    "show_settings_on_create" => true,
    "icon" => "icon-wpb-layer-box-header",
    "category" => __('美和眼科', 'medicenter'),
    "params" => array(            
		array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("序号", 'medicenter'),
            "param_name" => "number",
            "value" => array(__("01", 'medicenter') => "01",  __("02", 'medicenter') => "02", __("03", 'medicenter') => "03", __("04", 'medicenter') => "04")
        ), 
         array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("标题", 'medicenter'),
				"param_name" => "header",
				"value" => ""
			),
        array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __("文字内容", 'medicenter'),
            "param_name" => "content",
            "value" => ""
        ), 
		array(
            "type" => "attach_image",
            "class" => "",
            "heading" => __( "右侧图片", "medicenter" ),
            "param_name" => "link",
            "value" => ''
            ) , 
		 array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("Top margin", 'medicenter'),
            "param_name" => "top_margin",
            "value" => array(__("None", 'medicenter') => "none", __("Page (small)", 'medicenter') => "page_margin_top", __("Section (large)", 'medicenter') => "page_margin_top_section")
        ),
		array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Extra class name", 'medicenter'),
            "param_name" => "class",
            "value" => ""
        ) 
    )
));
//集团资讯
function custom_dc_news($atts)
{

    extract(shortcode_atts(array(
        "ids"=>"",
        "class" => "",
        "top_margin" => "",
        "number"=>"01",
        "art_from"=>"",
        "art_url"=>"",
        "art_author"=>""
	), $atts));

	
	$ids = explode(",", $ids);
	if($ids[0]=="-" || $ids[0]=="")
	{
		unset($ids[0]);
		$ids = array_values($ids);
	}

	query_posts(array(
		'post__in' => $ids,
        'post_type' => 'post',
        'posts_per_page' => '-1',
        'post_status' => 'publish',
        'showposts'=>1
	));
	
	global $wp_query; 
	$post_count = $wp_query->post_count;
	
	$output = '';
	if(have_posts())
	{    
		while(have_posts()): the_post();
        $output .= '<div class="company-msg " ><div class="company-msg-content  clearfix '.($class!="" ? ' ' . $class : ''). ($top_margin!="none" ? ' ' . $top_margin : '') .'">';
        $post_full_url = get_post_full_url(get_the_ID());
        $excerpt = mb_strimwidth(strip_tags(get_the_content()),0,200,'......');
		$output .=' <div class="company-msg-right ">
                        <a href="' . get_permalink() . '"><img src="'.$post_full_url.'" alt=""></a>
                    </div>
                    <div class="company-msg-left ">
                        <h2><span>'.$number.'.</span> <a href="' . get_permalink() . '">'.get_the_title().'</a></h2>
                        <p>'.$excerpt.'<a href="'. get_permalink() .'" class="read-more">查看详细 →</a></p>
                        <div class="news-info">
                            <span><a href="'.$art_url. '" >'.$art_from.'</a></span> 
                            <span>'. mb_strtoupper(date_i18n("Y.m.d", get_post_time())) . '</span>
                            <span>'.$art_author.'</span>  
                        </div>
                    </div>
                    
                </div></div>';
     endwhile;	
    }
                      
	//Reset Query
	wp_reset_query();
	return $output;
}
add_shortcode("custom_dc_news", "custom_dc_news");

//visual composer
function custom_dc_news_vc_init()
{
	//get posts list
	$posts_list = get_posts(array(
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order' => 'ASC',
		'post_type' => 'post',
        'tag'=>'jtnews',
        'category'=>'uncatelogued'
	));
	$posts_array = array();
	$posts_array[__("All", 'medicenter')] = "-";
	foreach($posts_list as $post)
		$posts_array[$post->post_title . " (id:" . $post->ID . ")"] = $post->ID;



	vc_map( array(
		"name" => __("集团资讯组件", 'medicenter'),
		"base" => "custom_dc_news",
		"class" => "",
		"controls" => "full",
		"show_settings_on_create" => true,
		"icon" => "icon-wpb-layer-box-header",
		"category" => __('美和眼科', 'medicenter'),
		"params" => array(
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("序号", 'medicenter'),
                "param_name" => "number",
                "value" => array(__("01", 'medicenter') => "01",  __("02", 'medicenter') => "02", __("03", 'medicenter') => "03", __("04", 'medicenter') => "04")
            ),
			array(
				"type" => "dropdownmulti",
				"class" => "",
				"heading" => __("Display selected", 'medicenter'),
				"param_name" => "ids",
                "description" => __( "这些文章的分类为‘未分类’，标签为‘集团资讯’", "medicenter" ),
				"value" => $posts_array
			), 
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("文章来源", 'medicenter'),
                "param_name" => "art_from",
                "value" => ""
            ) ,
             array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("文章来源地址（URl）", 'medicenter'),
                "param_name" => "art_url",
                "value" => ""
            ) ,
             array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("文章作者", 'medicenter'),
                "param_name" => "art_author",
                "value" => ""
            ) ,
             array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Top margin", 'medicenter'),
                "param_name" => "top_margin",
                "value" => array(__("None", 'medicenter') => "none", __("Page (small)", 'medicenter') => "page_margin_top", __("Section (large)", 'medicenter') => "page_margin_top_section")
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Extra class name", 'medicenter'),
                "param_name" => "class",
                "value" => ""
            ) 
		)
	));
}
add_action("init", "custom_dc_news_vc_init"); 

//美和动态优惠活动
function mh_news($atts)
{

    extract(shortcode_atts(array(
        "ids"=>"",
        "class" => "",
        "top_margin" => "",
        "summary"=>""
	), $atts));

	
	$ids = explode(",", $ids);
	if($ids[0]=="-" || $ids[0]=="")
	{
		unset($ids[0]);
		$ids = array_values($ids);
	}

	query_posts(array(
		'post__in' => $ids,
        'post_type' => 'post',
        'posts_per_page' => '-1',
        'post_status' => 'publish',
        'tag'=>'discount',
        'showposts'=>1
	));
	
	global $wp_query; 
	$post_count = $wp_query->post_count;
	
	$output = '';
	if(have_posts())
	{    
		while(have_posts()): the_post();
        $output .= '<div class="mh-news clearfix '.($class!="" ? ' ' . $class : ''). ($top_margin!="none" ? ' ' . $top_margin : '') .'">';
        $post_thumbnail_url = get_post_thumbnail_url(get_the_ID());
        $summary1 = mb_strimwidth(strip_tags($summary),0,80,'...');
        $title  = mb_strimwidth(strip_tags(get_the_title()),0,24,'...');
		$output .=' <a href="'. get_permalink() .'"> <img src="'.$post_thumbnail_url.'" alt=""></a>
                    <div class="mh-news-box">
                        <a href="'. get_permalink() .'"><h4>'.$title.'</h4></a>
                        <p>'.$summary1.'<a class="read-more" href="'. get_permalink() .'">详细 →</a></p>
                    </div></div>';
        endwhile;	
    }
                      
	//Reset Query
	wp_reset_query();
	return $output;
}
add_shortcode("mh_news", "mh_news");

//visual composer
function mh_news_vc_init()
{
	//get posts list
	$posts_list = get_posts(array(
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order' => 'DESC',
		'post_type' => 'post',
        'post_status' => 'publish',
        'tag'=>'discount',
	));
	$posts_array = array();
	$posts_array[__("All", 'medicenter')] = "-";
	foreach($posts_list as $post)
		$posts_array[$post->post_title . " (id:" . $post->ID . ")"] = $post->ID;



	vc_map( array(
		"name" => __("美和动态优惠活动", 'medicenter'),
		"base" => "mh_news",
		"class" => "",
		"controls" => "full",
		"show_settings_on_create" => true,
		"icon" => "icon-wpb-layer-box-header",
		"category" => __('美和眼科', 'medicenter'),
		"params" => array(
			array(
				"type" => "dropdownmulti",
				"class" => "",
				"heading" => __("请选择想要展示的文章", 'medicenter'),
				"param_name" => "ids",
                "description" => __( "请保证‘优惠活动’标签下有文章", "medicenter" ),
				"value" => $posts_array
			), 
            array(
				"type" => "textarea",
				"class" => "",
				"heading" => __("请输入摘要", 'medicenter'),
				"param_name" => "summary",
                "description" => __( "考虑到有些优惠活动只放图，手动输入摘要", "medicenter" ),
				"value" => ""
			),
             array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Top margin", 'medicenter'),
                "param_name" => "top_margin",
                "value" => array(__("None", 'medicenter') => "none", __("Page (small)", 'medicenter') => "page_margin_top", __("Section (large)", 'medicenter') => "page_margin_top_section")
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Extra class name", 'medicenter'),
                "param_name" => "class",
                "value" => ""
            ) 
		)
	));
}
add_action("init", "mh_news_vc_init"); 


//精选文章
function custom_selected_articles($atts)
{

    extract(shortcode_atts(array(
        "ids"=>"",
        'summary'=>'',
        "link"=>'#',
        "class" => "",
        "top_margin" => "",
	), $atts));

    
	
	$ids = explode(",", $ids);
	if($ids[0]=="-" || $ids[0]=="")
	{
		unset($ids[0]);
		$ids = array_values($ids);
	}

	query_posts(array(
		'post__in' => $ids,
        'post_type' => 'post',
        'posts_per_page' => '-1',
        'post_status' => 'publish',
        'showposts'=>1,
        'tag'=>'stars'
	));
	
	global $wp_query; 
	$post_count = $wp_query->post_count;
    $attachment = get_posts(array('p' => $link, 'post_type' => 'attachment'));
	
	$output = '';
	if(have_posts())
	{    
		while(have_posts()): the_post();
        $output .= '<div class="company-msg " ><div class="company-msg-content  clearfix '.($class!="" ? ' ' . $class : ''). ($top_margin!="none" ? ' ' . $top_margin : '') .'">';
    
        $excerpt = mb_strimwidth(strip_tags(get_the_content()),0,50,'......');
		$output .=' <div class="company-msg-right ">
                        <a href="' . get_permalink() . '"><img src="'.($attachment[0]->guid).'" alt=""></a>
                    </div>
                    <div class="company-msg-left ">
                        <h2> <a href="' . get_permalink() . '">'.get_the_title().'</a></h2>';
        if($summary!==''){
            $output.='<p>'.$summary.'';
        }else{
            $output.='<p>'.$excerpt.'';
        }
        $output.='<a href="'. get_permalink() .'" class="read-more">查看详细 →</a></p>
                    </div>
                    
                </div></div>';
     endwhile;	
    }
                      
	//Reset Query
	wp_reset_query();
	return $output;
}
add_shortcode("custom_selected_articles", "custom_selected_articles");

//visual composer
function custom_selected_articles_vc_init()
{
	//get posts list
	$posts_list = get_posts(array(
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order' => 'ASC',
		'post_type' => 'post',
        'tag'=>'stars',
	));
	$posts_array = array();
	$posts_array[__("All", 'medicenter')] = "-";
	foreach($posts_list as $post)
		$posts_array[$post->post_title . " (id:" . $post->ID . ")"] = $post->ID;



	vc_map( array(
		"name" => __("精选文章", 'medicenter'),
		"base" => "custom_selected_articles",
		"class" => "",
		"controls" => "full",
		"show_settings_on_create" => true,
		"icon" => "icon-wpb-layer-box-header",
		"category" => __('美和眼科', 'medicenter'),
		"params" => array(
			array(
				"type" => "dropdownmulti",
				"class" => "",
				"heading" => __("Display selected", 'medicenter'),
				"param_name" => "ids",
                "description" => __( "这些文章的标签为‘精选’,请选择一篇并填写摘要", "medicenter" ),
				"value" => $posts_array
			), 
            array(
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => __("摘要内容", 'medicenter'),
                "param_name" => "summary",
                "value" => ""
            ),
            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => __("展示图片", 'medicenter'),
                "param_name" => "link",
                "value" => ""
            ),
             array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Top margin", 'medicenter'),
                "param_name" => "top_margin",
                "value" => array(__("None", 'medicenter') => "none", __("Page (small)", 'medicenter') => "page_margin_top", __("Section (large)", 'medicenter') => "page_margin_top_section")
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Extra class name", 'medicenter'),
                "param_name" => "class",
                "value" => ""
            ) 
		)
	));
}
add_action("init", "custom_selected_articles_vc_init"); 
//手机端首页icons
function mh_icons($atts)
{

    extract(shortcode_atts(array(
        "number"=>12,
        "row"=>"25%",
        "icon_size" =>"40px",
        "bottom_margin"=>"15px",
        "class" => "",
        "top_margin" => "",
	), $atts));
	$output = '<div class="icons-box clearfix '.($class!="" ? ' ' . $class : ''). ($top_margin!="none" ? ' ' . $top_margin : '') .'">';
    for($i=0;$i<$atts["number"];$i++){
            $output.='<a style="margin-bottom:'.$bottom_margin.';width:'.$row.';" href="'. (isset($atts["icon_url" . $i]) && $atts["icon_url" . $i]!="" ? $atts["icon_url" . $i] : '') .'">
            <svg class="icon" style="width:'.$icon_size.';height:'.$icon_size.';" aria-hidden="true">
                <use xlink:href="#'. (isset($atts["icon_id" . $i]) && $atts["icon_id" . $i]!="" ? $atts["icon_id" . $i] : '') .'"></use>
            </svg>
            <p>'. (isset($atts["icon_title" . $i]) && $atts["icon_title" . $i]!="" ? $atts["icon_title" . $i] : '') .'</p>
        </a>';
    }
    $output.='</div>';

	return $output;
}
add_shortcode("mh_icons", "mh_icons");
for($i=0; $i<20; $i++)
{
    $icon_params[] = array(
        "type" => "textfield",
        "heading" => __("icon的ID", 'medicenter') . " " . ($i+1),
        "param_name" => "icon_id" . $i,
        "holder" => "div",
        "value" => "",
        "description" => __('请输入icon在阿里云里的复制代码', 'medicenter')
    );
    $icon_params[] = array(
        "type" => "textfield",
        "class" => "",
        "heading" => __("icon文字", 'medicenter') . " " . ($i+1),
        "param_name" => "icon_title" . $i,
        "holder" => "div",
        "value" => "",
        "description" => __('请输入icon的文字', 'medicenter')
    );
    $icon_params[] = array(
        "type" => "textfield",
        "class" => "",
        "heading" => __("链接地址", 'medicenter') . " " . ($i+1),
        "param_name" => "icon_url" . $i,
        "holder" => "div",
        "value" => "",
        "description" => __('请输入icon的链接', 'medicenter')
    );
}
$params = array_merge($icon_params, array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("icon总共个数", 'medicenter'),
            "param_name" => "number",
            "value" => "",
            "description" => __('默认12个，可以1-20个', 'medicenter')
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("每行icon个数", 'medicenter'),
            "param_name" => "row",
            "value" => array(__("3个", 'medicenter') => "33%", __("4个", 'medicenter') => "25%", __("5个", 'medicenter') => "20%", __("2个", 'medicenter') => "50%")
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("icon大小", 'medicenter'),
            "param_name" => "icon_size",
            "value" => array(__("40px", 'medicenter') => "40px", __("30px", 'medicenter') => "30px", __("20px", 'medicenter') => "20px")
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("icon下边距", 'medicenter'),
            "param_name" => "bottom_margin",
            "value" => array(__("5px", 'medicenter') => "5px", __("10px", 'medicenter') => "10px", __("15px", 'medicenter') => "15px", __("20px", 'medicenter') => "20px")
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Top margin", 'medicenter'),
            "param_name" => "top_margin",
            "value" => array(__("None", 'medicenter') => "none", __("Page (small)", 'medicenter') => "page_margin_top", __("Section (large)", 'medicenter') => "page_margin_top_section")
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Extra class name", 'medicenter'),
            "param_name" => "class",
            "value" => ""
        )
));      

vc_map( array(
    "name" => __("icon组合", 'medicenter'),
    "base" => "mh_icons",
    "class" => "",
    "controls" => "full",
    "show_settings_on_create" => true,
    "icon" => "icon-wpb-layer-box-header",
    "category" => __('美和眼科', 'medicenter'),
    "params" => $params
));

//单篇文章显示
function single_article($atts)
{

    extract(shortcode_atts(array(
        "category"=>"",
        "ids"=>"",
        "class" => "",
        "top_margin" => "",
        "order_by" => "title menu_order",
        "number"=>4,
        "order" => "ASC"
	), $atts));

	
	$ids = explode(",", $ids);
	if($ids[0]=="-" || $ids[0]=="")
	{
		unset($ids[0]);
		$ids = array_values($ids);
	}
	$category = explode(",", $category);
	if($category[0]=="-" || $category[0]=="")
	{
		unset($category[0]);
		$category = array_values($category);
	}
	query_posts(array(
		'post__in' => $ids,
        'post_type' => 'post',
        'posts_per_page' => '-1',
        'post_status' => 'publish',
        'category__in' => $category,
        'orderby' => implode(" ", explode(",", $order_by)),
        'order' => $order,
        'showposts'=>$number,
        'tag'=>'knowledge'
	));
	
	global $wp_query; 
	$post_count = $wp_query->post_count;
	
	$output = '';
	if(have_posts())
	{    
		while(have_posts()): the_post();
        $output .= '<div class="mh-speech-box">';
        $post_full_url = get_post_full_url(get_the_ID());
        $excerpt = mb_strimwidth(strip_tags(get_the_content()),0,70,'......');
        $views=getPostViews(get_the_ID());
        $cat_array=" ";
        foreach(get_the_category() as $category)
        $cat_array.= $category->name .' ';
        
		$output .= '<a href="' . get_permalink() . '"><img src="'.$post_full_url.'" alt=""></a><div class="mh-speech-content"><h3><a href="'. get_permalink() .'" title="'. esc_attr(get_the_title()) . '">'. get_the_title() .'</a></h3><p>'.$excerpt.'<a class="read-more" href="'. get_permalink() .'">  详细 →</a></p><p><span class="speech-content-left">'.$cat_array.'</span><span class="speech-content-right">'.$views.'</span></p></div></div>';
		endwhile;		
    }
                      
	//Reset Query
	wp_reset_query();
	return $output;
}
add_shortcode("single_article", "single_article");

//visual composer
function vc_single_article()
{
	//get posts list
	$posts_list = get_posts(array(
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order' => 'ASC',
		'post_type' => 'post',
	));
	$posts_array = array();
	$posts_array[__("All", 'medicenter')] = "-";
	foreach($posts_list as $post)
		$posts_array[$post->post_title . " (id:" . $post->ID . ")"] = $post->ID;


	vc_map( array(
		"name" => __("单篇文章", 'medicenter'),
		"base" => "speechbox",
		"class" => "",
		"controls" => "full",
		"show_settings_on_create" => true,
		"icon" => "icon-wpb-layer-box-header",
		"category" => __('美和眼科', 'medicenter'),
		"params" => array(
			array(
				"type" => "dropdownmulti",
				"class" => "",
				"heading" => __("Display selected", 'medicenter'),
				"param_name" => "ids",
				"value" => $posts_array
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Order by", 'medicenter'),
				"param_name" => "order_by",
				"value" => array(__("Title, menu order", 'medicenter') => "title,menu_order", __("Menu order", 'medicenter') => "menu_order", __("Date", 'medicenter') => "date")
			),
            array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("显示文章个数", 'medicenter'),
				"param_name" => "number",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Order", 'medicenter'),
				"param_name" => "order",
				"value" => array(__("ascending", 'medicenter') => "ASC", __("descending", 'medicenter') => "DESC")
			)
		)
	));
}
add_action("init", "vc_single_article"); 

?>
