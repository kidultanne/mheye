

<?php global $theme_options, $themename; ?>			
			<div class="footer_container">
				<div class="footer">
					<ul class="footer_banner_box_container clearfix">
						<?php
						$sidebar = get_post(get_post_meta(get_the_ID(), "page_sidebar_footer_top", true));
						if(!(int)get_post_meta($sidebar->ID, "hidden", true) && is_active_sidebar($sidebar->post_name))
							dynamic_sidebar($sidebar->post_name);
						?>
					</ul>
					<div class="footer_box_container clearfix">
						<?php
						$sidebar = get_post(get_post_meta(get_the_ID(), "page_sidebar_footer_bottom", true));
						if(!(int)get_post_meta($sidebar->ID, "hidden", true) && is_active_sidebar($sidebar->post_name))
							dynamic_sidebar($sidebar->post_name);
						?>
					</div>
					<?php if($theme_options["footer_text_left"]!="" || $theme_options["footer_text_right"]!=""): ?>
					<div class="copyright_area clearfix">
						<?php if($theme_options["footer_text_left"]!=""): ?>
						<div class="copyright_left">
							<?php echo do_shortcode($theme_options["footer_text_left"]); ?>
						</div>
						<?php 
						endif;
						if($theme_options["footer_text_right"]!=""): ?>
						<div class="copyright_right">
							<?php echo do_shortcode($theme_options["footer_text_right"]); ?>
						</div>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="bottom-footer">
                <div  class="bottom-footer-top"></div>
                <div  class="bottom-footer-box">
                    <div class="bottom-footer-container">
                        <div class="bottom-footer-kid bottom-footer-left"></div>
                        <div class="bottom-footer-kid bottom-footer-middle">
                            <h2>美和指南</h2>
                            <ul>
                                <li class="bottom-footer-link"><a href="/appointment">预约专家</a></li>
                                <li class="bottom-footer-link"><a href="/medical-care">医疗服务</a></li>
                                <li class="bottom-footer-link"><a href="/welfare-2">优惠套餐</a></li>
                                <li class="bottom-footer-link"><a href="/mheyeteam/doctorsteam/#filter-doctor-team">专家团队</a></li>
                                <li class="bottom-footer-link"><a href="/experience">真实体验</a></li>
                                <li class="bottom-footer-link"><a href="/selected-articles">精选文章</a></li>
                                <li class="bottom-footer-link"><a href="/about">关于美和</a></li>
                                <li class="bottom-footer-link"><a href="/contact">联系我们</a></li>
                            </ul>
                        </div>
                        <div class="bottom-footer-kid bottom-footer-right"></div>
                    </div>
                </div>
				<div class="bottom-copyright">
				<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1261117414'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1261117414%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));</script>
					<p>COPYRIGHT©2016 北京美和眼科诊所有限公司&nbsp&nbsp&nbsp<a href="http://icp.alexa.cn/mheye.cn">京 ICP 备 16006074 号</a>&nbsp&nbsp&nbsp<a href="http://218.246.22.51/chaxun.asp">（京）医广【2017】第11-01-0714号</a>     <span style="float:right;">技术支持：北京瞳真视美科技有限公司  POWERED BY WORDPRESS</span></p>
				</div>
			</div>
			<div class="mobi-bottom-footer">
				<div class="mobi-bottom-kid">
						<a href="">在线咨询</a>
						<a href="">电话预约</a>
						<a href="">关注微信</a>
				</div>
				<div class="mobi-bottom-kid">
						<a href="">触屏版</a>
						<a href="">电脑版</a>
						<a href="">网站地图</a>
						<a href="">专科优势</a>
				</div>
				<div class="mobi-bottom-kid">
					<p>©2016-2018 北京美和眼科诊所 </p>
					<p>京ICP备16006074号 </p>
					<p>（京）医广【2017】第11-01-0714号</p>
				</div>


				<div class="mobi-bottom-menu">
					<div id="mobi-bottom-centermenu">
						<a href="http://put.zoosnet.net/LR/Chatpre.aspx?id=PUT52726253&lng=cn">在线挂号</a></div>
					<ul>
					<li>
						<svg class="icon mobi-bottom-icon" aria-hidden="true">
							<use xlink:href="#icon-meiheshouye"></use>
						</svg>
						<a href="/">美和首页</a></li>
					<li>
						<svg class="icon mobi-bottom-icon" aria-hidden="true">
							<use xlink:href="#icon-yiliaofuwu"></use>
						</svg>
						<a href="/medical-care">医疗服务</a></li>
					<li>
						<svg class="icon mobi-bottom-icon" aria-hidden="true">
							<use xlink:href="#icon-lijizixun"></use>
						</svg>
						<a href="http://put.zoosnet.net/LR/Chatpre.aspx?id=PUT52726253&lng=cn">立即咨询</a></li>
					<li>
						<svg class="icon mobi-bottom-icon" aria-hidden="true">
							<use xlink:href="#icon-jingxuanwenzhang"></use>
						</svg>
						<a href="/selected-articles">精选文章</a></li>
					</ul>
				</div>

			</div>
	</div>

			
		<?php
		if((int)$theme_options["layout_picker"])
			mc_get_theme_file("/layout_picker/layout_picker.php");		
		wp_footer();
		?>
<!-- 右侧悬浮框 -->
	<div class="floating_ck">
		<dl>
			<!-- <dt></dt> -->
			<dd class="consult">
				<span>电话咨询</span>
				<div class="floating_left">
				<p class="qrcord_p02">全国免费服务热线<br><b>400-895-6500<b></p>
				</div>
			</dd>
			<dd class="words">
				<a href="http://put.zoosnet.net/LR/Chatpre.aspx?id=PUT52726253&lng=cn"><span>在线咨询</span></a>
			</dd>
			<dd class="qrcord">
				<span>官方微信</span>
				<div class="floating_left floating_ewm">
					<i></i>
					<p class="qrcord_p01">扫一扫<br>关注我们,与专家面对面</p>					
				</div>
			</dd>
			<dd class="return">
				<a class="scroll_top top_white" href="#top"><span>返回顶部</span></a>
			</dd>
		</dl>
	</div>
		<!--加载阿里图标库-->
		<script type="text/javascript" src="//at.alicdn.com/t/font_df6p5f0jrc2z9f6r.js"></script>
		<script>

		//手机端查看更多
			jQuery(document).ready(function(){

			   jQuery('.text-read-more').bind('click',function(){
				   jQuery(this).parent('.m-sec-content-right').siblings('.m-sec-content-left').hide('slow');
					jQuery(this).parent('.m-sec-content-right').css('width','100%');					
					jQuery(this).siblings('.m-ellipsis').css('height','auto');
					jQuery(this).siblings('.m-ellipsis').attr('data-attr','');
					jQuery(this).siblings('.back-text').show();
					jQuery(this).hide();
			   });

			   jQuery('.back-text').bind('click',function(){
				   	jQuery(this).parent('.m-sec-content-right').siblings('.m-sec-content-left').show('slow');
					jQuery(this).parent('.m-sec-content-right').css('width','50%');					
					jQuery(this).siblings('.m-ellipsis').css('height','82px');
					jQuery(this).siblings('.m-ellipsis').attr('data-attr','...');
					jQuery(this).siblings('.text-read-more').show();
					jQuery(this).hide();
			   });

			   jQuery("#doctor_slider > div:gt(0)").hide();

				var index = 1;
				var maxindex = jQuery('#doctor_slider > div').length;

				setInterval(function () {
					jQuery('#doctor_slider > div:first')
						.fadeOut(1000)
						.next()
						.fadeIn(1000)
						.end()
						.appendTo('#doctor_slider');
					jQuery('#doctor_slider_box li').removeClass('active');
					jQuery('#doctor_slider_box li:eq(' + index + ')').addClass('active');
					index = index < maxindex - 1 ? index + 1 : 0;
				}, 3000);

				for (var i = 0; i < maxindex; i++) {
					jQuery('#doctor_slider_box').append('<li class="' + (i == 0 ? 'active' : '') + '"></li>');
				}

			});
		</script>
		<script type="text/javascript" src="//s.union.360.cn/189836.js" async defer></script>              
	</body>
</html>