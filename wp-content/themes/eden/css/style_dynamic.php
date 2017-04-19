<?php

$root = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}
header("Content-type: text/css; charset=utf-8");
?>
<?php if (!empty($qode_options_eden['selection_color'])) { ?>
    /* Webkit */
    ::selection {
        background: <?php echo $qode_options_eden['selection_color'];  ?>;
    }
<?php } ?>
<?php if (!empty($qode_options_eden['selection_color'])) { ?>
    /* Gecko/Mozilla */
    ::-moz-selection {
        background: <?php echo $qode_options_eden['selection_color'];  ?>;
    }
<?php } ?>
<?php if (!empty($qode_options_eden['first_color'])) { ?>

	h1 a:hover,	h2 a:hover,	h3 a:hover,	h4 a:hover,	h5 a:hover,	h6 a:hover,
	a,	p a, a:hover, p a:hover,
	.mobile_menu_button span:hover,
	nav.main_menu>ul>li.active > a > span,
	nav.main_menu>ul>li.active > a > i,
	nav.main_menu > ul > li:hover > a > span,
	nav.main_menu > ul > li:hover > a > i,
	nav.mobile_menu ul li a:hover,
	nav.mobile_menu ul li.active > a,
	.side_menu_button > a:hover,
	.dark .side_menu_button > a:hover,
	.light .side_menu_button > a:hover,
	.breadcrumb .current,
	.breadcrumb a:hover,
	.box_image_holder .box_icon .fa-stack i.fa-stack-base,
	.q_icon_list i,
	.box_holder_icon .fa-stack i,
	.qbutton.transparent_button,
	.qbutton.stript_button,
	.qbutton.stript_button:hover,
	.portfolio_social_holder a:hover,
	.portfolio_like a.liked i,
	.portfolio_like a:hover i,
	.portfolio_single .portfolio_like a.liked i,
	.portfolio_single .portfolio_like a:hover i,
	.title .portfolio_like a.liked i,
	.title .portfolio_like a:hover i,
	.q_tabs .tabs-nav li.active a,
	.q_tabs .tabs-nav li a:hover,
	.q_accordion_holder.accordion.with_icon .ui-accordion-header i,
	blockquote i.pull-left,
	.q_dropcap,
	.q_message.with_icon > i,
	.q_font_awsome_icon i,
	.q_icon_with_title .icon_holder .fa-stack i,
	.box_holder_icon_inner .fa-stack i,
	.q_font_awsome_icon_square i,
	.q_font_awsome_icon_stack i,
	.q_icon_with_title .icon_with_title_link,
	.q_icon_list_with_text_icon_holder .q_icon_list_with_text_icon i,
	.q_icon_list_with_text_icon_holder .q_icon_list_with_text_icon .q_icon_list_with_text_in_circle,
	.icon_elegant_holder .fa-stack i,
	.q_progress_bars_icons_inner.square .bar.active i,
	.q_progress_bars_icons_inner.circle .bar.active i,
	.q_progress_bars_icons_inner.normal .bar.active i,
	.q_progress_bars_icons_inner .bar.active i.fa-circle,
	.q_list.number ul>li:before,
	.latest_post_inner .post_infos a:hover,
	.blog_holder article .post_text .post_text_date .post_date_day,
	.blog_holder.blog_large_image article .post_category:hover,
	.blog_holder.blog_large_image article .post_category:hover a,
	.blog_holder article .post_description a:hover,
	.blog_holder.masonry article .post_info a:hover,
	.blog_holder.masonry_full_width article .post_info a:hover,
	.post_info_right a:hover,
	.blog_holder article .post_comments:hover,
	.latest_post_inner .post_comments:hover,
	.blog_like a:hover,
	.blog_like a.liked,
	.social_share_holder:hover .social_share_title,
	.social_share_dropdown ul li:hover .share_text,
	.social_share_dropdown ul li :hover i,
	.blog_holder article.format-quote .post_text_holder i.qoute_mark,
	.blog_holder article.format-link .post_text_holder i.link_mark,
	.blog_holder.masonry article.format-quote .post_text .post_title h4:hover a,
	.blog_holder.masonry article.format-link .post_text .post_title h4:hover a,
	.blog_holder.masonry_full_width article.format-quote .post_text .post_title h4:hover a,
	.blog_holder.masonry_full_width article.format-link .post_text .post_title h4:hover a,
	.blog_holder.blog_single article .post_description_inner span:hover,
	.blog_holder.blog_single article .post_description_inner a:hover,
	.comment_holder .comment .text .reply_holder:hover a,
	.comment_holder .comment .text .reply_holder:hover i,
	.comment_holder .comment .text .comment-respond small > a:hover,
	#respond textarea:focus,
	#respond input[type='text']:focus,
	.contact_form input[type='text']:focus,
	.contact_form  textarea:focus,
	.widget.widget_search form input[type="text"]:focus,
	.header_top #searchform input[type="text"]:focus,
	.q_team .q_team_title_holder span,
	.filter_holder ul li:hover,
	.gallery_holder ul li .gallery_hover i:hover{
		color: <?php echo $qode_options_eden['first_color'];?>;
	}

	.projects_holder article .portfolio_description .portfolio_title:hover a,
	.projects_holder article .feature_holder_info .portfolio_title:hover a,
	.portfolio_slides .feature_holder_info .portfolio_title:hover a,
	.projects_holder article a.lightbox:hover i,
	.projects_holder article a.preview:hover i,
	.projects_holder article .portfolio_like:hover i,
	.projects_holder article .portfolio_like:hover .qode-like-count,
	.portfolio_slides a.lightbox:hover i,
	.portfolio_slides a.preview:hover i,
	.portfolio_slides .portfolio_like:hover i,
	.portfolio_slides .portfolio_like:hover .qode-like-count,
	.q_accordion_holder.accordion .ui-accordion-header:hover span.tab-title,
	.blog_holder.masonry article.format-quote .post_text_holder i.qoute_mark,
	.blog_holder.masonry article.format-link .post_text_holder i.link_mark,
	.blog_holder.masonry_full_width article.format-quote .post_text_holder i.qoute_mark,
	.blog_holder.masonry_full_width article.format-link .post_text_holder i.link_mark,
	aside .widget a:hover,
	.q_steps_holder .circle_small:hover span,
	.q_steps_holder .circle_small:hover .step_title,
	aside .widget #lang_sel_list ul li a.lang_sel_sel,
	aside .widget #lang_sel_list ul li:hover > a,
	.header_top #lang_sel_list ul li a.lang_sel_sel,
	.header_top #lang_sel_list ul li:hover > a,
	aside .widget #lang_sel > ul > li:hover > a,
	aside .widget #lang_sel_click > ul > li:hover > a,
	footer #lang_sel > ul > li:hover > a,
	footer #lang_sel_click > ul > li:hover > a,
	section.side_menu #lang_sel > ul > li:hover > a,
	section.side_menu #lang_sel_click > ul > li:hover > a,
	.header_top #lang_sel > ul > li:hover > a, 
	.header_top #lang_sel_click > ul > li:hover > a,
	.q_circles_holder .q_circle_inner2:hover i{
		color: <?php echo $qode_options_eden['first_color'];?> !important;
	}

	<?php if(function_exists("is_woocommerce")){ ?>

		.woocommerce .select2-results li.select2-highlighted,
		.woocommerce-page .select2-results li.select2-highlighted,
		.woocommerce-checkout .chosen-container .chosen-results li.active-result.highlighted,
		.woocommerce-account .chosen-container .chosen-results li.active-result.highlighted,
		.woocommerce ul.products li.product h4:hover,
		.woocommerce ul.products li.product .price,
		.woocommerce div.product .summary p.price span.amount,
		.woocommerce div.cart-collaterals div.cart_totals table tr.order-total strong span.amount,
		.woocommerce-page div.cart-collaterals div.cart_totals table tr.order-total strong span.amount,
		.woocommerce div.cart-collaterals div.cart_totals table tr.order-total strong,
		.woocommerce .checkout-opener-text a,
		.woocommerce form.checkout table.shop_table tfoot tr.order-total th,
		.woocommerce form.checkout table.shop_table tfoot tr.order-total td span.amount,
		.woocommerce aside ul.product_list_widget li > a:hover,
		.woocommerce aside ul.product-categories li > a:hover,
		.woocommerce aside ul.product_list_widget li span.amount,
		.woocommerce .widget_shopping_cart p.total .amount,
		.woocommerce aside .widget ul.product-categories a:hover,
		.woocommerce-page aside .widget ul.product-categories a:hover,
		.woocommerce .widget #searchform input[type="text"]:focus,
		.shopping_cart_header .header_cart:hover i,
		.shopping_cart_dropdown ul li a:hover,
		.shopping_cart_dropdown span.total span,
		.shopping_cart_dropdown .cart_list span.quantity,
		.woocommerce .summary p.stock.out-of-stock,
		.woocommerce ul.woocommerce-error strong{
			color: <?php echo $qode_options_eden['first_color'];?>;
		}

    <?php } ?>

<?php } ?>

<?php if (!empty($qode_options_eden['first_area_color'])) { ?>

	nav.main_menu > ul > li.active > a span.line,
	.q_progress_bar .progress_content,
	.q_progress_bars_vertical .progress_content_outer .progress_content,
	.qbutton,
	.load_more a,
	#submit_comment,
	.drop_down .wide .second ul li .qbutton,
	.drop_down .wide .second ul li ul li .qbutton,
	.highlight,
	.q_dropcap.circle,
	.q_dropcap.square,
	.price_table_inner.active_price ul li.prices,
	.price_table_inner:hover ul li.prices,
	.service_table_inner li.service_table_title_holder,
	.more_facts_button,
	.q_list.number.circle_number ul>li:before,
	.q_social_icon_holder .fa-stack,
	.blog_holder article.format-link .post_text_holder:hover,
	.blog_holder article.format-quote .post_text_holder:hover,
	.single_tags a,
	.widget .tagcloud a,
	#wp-calendar td#today,
	#back_to_top:hover span,
	.vc_text_separator.full div,
	.mejs-controls .mejs-time-rail .mejs-time-current,
	.mejs-controls .mejs-time-rail .mejs-time-handle,
	.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current,
	.q_pie_graf_legend ul li .color_holder,
	.q_line_graf_legend ul li .color_holder,
	.circle_item .circle:hover,
	.qode_carousels .flex-control-paging li a.flex-active{
		background-color: <?php echo $qode_options_eden['first_area_color'];?>;
	}

	.qbutton.transparent_button:hover,
	.box_holder_icon_inner .fa-stack:hover,
	.q_font_awsome_icon_square:hover,
	.q_font_awsome_icon_stack:hover i.fa-stack-base,
	.q_icon_with_title .icon_holder .fa-stack:hover,
	.icon_elegant_holder .fa-stack:hover,
	.carousel-inner .slider_content .text .qbutton.transparent_button:hover{
		background-color: <?php echo $qode_options_eden['first_area_color'];?> !important;
	}

	.ajax_loader_html,
	.box_image_with_border:hover,
	.qbutton.transparent_button,
	.service_table_inner li.service_table_title_holder,
	.box_holder_icon_inner .fa-stack,
	.q_font_awsome_icon_square,
	.q_font_awsome_icon_stack i.fa-stack-base,
	.q_icon_with_title .icon_holder .fa-stack,
	.latest_post_holder.boxes > ul > li:hover .latest_post,
	.blog_holder.masonry article:hover,
	.blog_holder.masonry_full_width article:hover,
	#back_to_top:hover span,
	.q_steps_holder .circle_small_wrapper,
	.q_team.boxes:hover .q_team_inner{
		border-color: <?php echo $qode_options_eden['first_area_color'];?>;
	}

	.q_tabs .tabs-nav li.active a,
	.q_tabs .tabs-nav li a:hover{
		border-top-color: <?php echo $qode_options_eden['first_area_color'];?> !important;
	}

	.more_facts_button_arrow_inner{
		border-color: <?php echo $qode_options_eden['first_area_color'];?> transparent transparent transparent;
	}

	.icon_elegant_holder .fa-stack:hover .icon_elegant_arrow{
		border-color: <?php echo $qode_options_eden['first_area_color'];?> transparent transparent transparent !important;
	}

	.qbutton.transparent_button:hover{
		border-color: <?php echo $qode_options_eden['first_area_color'];?> !important;
	} 

	<?php if(function_exists("is_woocommerce")){ ?>

		.woocommerce .button,
		.woocommerce-page .button,
		.woocommerce-page input[type="submit"],
		.woocommerce input[type="submit"],
		.woocommerce ul.products li.product .added_to_cart,
		.woocommerce-account table.my_account_orders tbody tr td.order-actions a,
		.woocommerce .product .onsale,
		.woocommerce .product .single-onsale,
		.woocommerce .quantity .minus:hover,
		.woocommerce #content .quantity .minus:hover,
		.woocommerce-page .quantity .minus:hover,
		.woocommerce-page #content .quantity .minus:hover,
		.woocommerce .quantity .plus:hover,
		.woocommerce #content .quantity .plus:hover,
		.woocommerce-page .quantity .plus:hover,
		.woocommerce-page #content .quantity .plus:hover,
		.woocommerce .widget_price_filter .ui-slider-horizontal .ui-slider-range,
		.woocommerce-page .widget_price_filter .ui-slider-horizontal .ui-slider-range,
		.shopping_cart_header .header_cart span{
			background-color: <?php echo $qode_options_eden['first_area_color'];?>;
		}

		.woocommerce .quantity .minus:hover,
		.woocommerce #content .quantity .minus:hover,
		.woocommerce-page .quantity .minus:hover,
		.woocommerce-page #content .quantity .minus:hover,
		.woocommerce .quantity .plus:hover,
		.woocommerce #content .quantity .plus:hover,
		.woocommerce-page .quantity .plus:hover,
		.woocommerce-page #content .quantity .plus:hover{
			border-color: <?php echo $qode_options_eden['first_area_color'];?>;
		}

    <?php } ?>

<?php } ?>

<?php if (!empty($qode_options_eden['second_color'])) { ?>

	h1,h2,h3,h4,h5,h6,
	h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,
	.title h1,
	.q_progress_bars_vertical .progress_number,
	.q_pie_chart_holder .tocounter,
	.q_percentage_with_icon i,
	.call_to_action .text_wrapper .call_to_action_text,
	.call_to_action .text_wrapper .call_to_action_icon_inner i,
	.portfolio_social_holder a,
	.projects_holder article a.lightbox i,
	.projects_holder article a.preview i,
	.projects_holder article .portfolio_like i,
	.projects_holder article .portfolio_like .qode-like-count,
	.q_message a.close i.dark,
	.q_message .message_text,
	.price_table_inner ul li.prices,
	.price_table_inner.dark_style ul li.prices,
	.blog_holder article.format-quote .post_text .quote_author,
	.single_links_pages span,
	.comment_holder .comment .text .comment-respond small > a,
	.pagination ul li span,
	.pagination ul li a,
	.widget.widget_rss li a.rsswidget,
	#wp-calendar caption,
	#back_to_top span i,
	.call_to_action_text_wrapper span,
	.carousel-control,
	.carousel-control:hover,
	.q_circles_holder .q_circle_inner2 i{
		color: <?php echo $qode_options_eden['second_color'];?>;
	}

	.blog_holder.masonry article.format-quote .post_text .quote_author,
	.blog_holder.masonry_full_width article.format-quote .post_text .quote_author{
		color: <?php echo $qode_options_eden['second_color'];?> !important;
	}

	<?php if(function_exists("is_woocommerce")){ ?>

		.woocommerce ul.products li.product a.qbutton.add-to-cart-button:hover,
		.woocommerce ul.products li.product a.qbutton.added_to_cart:hover,
		.woocommerce ul.products li.product a.qbutton.out-of-stock-button:hover,
		.woocommerce-pagination ul.page-numbers li a,
		.woocommerce-pagination ul.page-numbers li span,
		.woocommerce .quantity .minus,
		.woocommerce #content .quantity .minus,
		.woocommerce-page .quantity .minus,
		.woocommerce-page #content .quantity .minus,
		.woocommerce .quantity .plus,
		.woocommerce #content .quantity .plus,
		.woocommerce-page .quantity .plus,
		.woocommerce-page #content .quantity .plus,
		.woocommerce .quantity input.qty,
		.woocommerce #content .quantity input.qty,
		.woocommerce-page .quantity input.qty,
		.woocommerce-page #content .quantity input.qty,
		.woocommerce div.product div.product_meta > span,
		.woocommerce-cart table.cart thead th,
		.woocommerce-checkout .checkout table thead th,
		.woocommerce-account table.my_account_orders thead tr th,
		.woocommerce-page table.my_account_orders thead tr th,
		.woocommerce #payment ul.payment_methods li label,
		.woocommerce .order_details.clearfix li p,
		.woocommerce-page .order_details.clearfix li p,
		.woocommerce-checkout table.shop_table thead th,
		.woocommerce-checkout table.shop_table tfoot th,
		.woocommerce-account table.shop_table thead th,
		.woocommerce-account table.shop_table tfoot th,
		.woocommerce-account table.my_account_orders thead th,
		.woocommerce-account table.my_account_orders tfoot th,
		.woocommerce-checkout .shop_table.order_details tr td a,
		.woocommerce-checkout .shop_table.order_details tfoot tr:last-child td span.amount,
		.woocommerce-checkout .shop_table.order_details tr td .product-quantity,
		.woocommerce .widget_products ul.product_list_widget li > a,
		.woocommerce .widget_top_rated_products ul.product_list_widget li > a,
		.woocommerce .widget_recent_reviews ul.product_list_widget li > a,
		.woocommerce .widget_shopping_cart ul.product_list_widget li > a,
		.woocommerce .widget_price_filter .button,
		.woocommerce-page .widget_price_filter .button,
		.shopping_cart_dropdown ul li a,
		.select2-results .select2-highlighted ul{
			color: <?php echo $qode_options_eden['second_color'];?>;
		}

		.woocommerce .widget_price_filter .button:hover,
		.woocommerce-page .widget_price_filter .button:hover{
			color: <?php echo $qode_options_eden['second_color'];?> !important;
		}

	<?php } ?>

<?php } ?>

<?php if (!empty($qode_options_eden['second_area_color'])) { ?>

	.gallery_holder ul li .gallery_hover i,
	.price_table_inner.dark_style ul li.pricing_table_content li:nth-child(even),
	.price_table_inner.dark_style ul li.prices,
	.more_facts_inner_holder,
	.more_facts_holder.more_fact_opened .more_facts_button,
	.more_facts_holder:hover .more_facts_button,
	.pagination ul li span,
	.pagination ul li a:hover,
	.mejs-container .mejs-controls div{
		background-color: <?php echo $qode_options_eden['second_area_color'];?>;
	}

	<?php $gallery_f_hover = qode_hex2rgb($qode_options_eden['second_area_color']); ?>

	.projects_holder article span.text_holder,
	.portfolio_slides span.text_holder,
	.gallery_holder ul li .gallery_hover{
		background-color: rgba(<?php echo $gallery_f_hover[0]; ?>,<?php echo $gallery_f_hover[1]; ?>,<?php echo $gallery_f_hover[2]; ?>,0.7);
	}

	.more_facts_holder.more_fact_opened .more_facts_button_arrow_inner,
	.more_facts_holder:hover .more_facts_button_arrow_inner{
		border-top-color: <?php echo $qode_options_eden['second_area_color'];?>;
	}

	<?php if(function_exists("is_woocommerce")){ ?>

		.woocommerce ul.products li.product:hover .image-wrapper,
		.woocommerce-pagination ul.page-numbers li span.current,
		.woocommerce-pagination ul.page-numbers li a:hover{
			background-color: <?php echo $qode_options_eden['second_area_color'];?>;
		}

	<?php } ?>

<?php } ?>

<?php if (!empty($qode_options_eden['background_color']) || !empty($qode_options_eden['text_color']) || !empty($qode_options_eden['text_fontsize']) || !empty($qode_options_eden['text_fontweight']) || $qode_options_eden['google_fonts'] != "-1") { ?>
    body{
    	<?php if($qode_options_eden['google_fonts'] != "-1"){ ?>
    	<?php $font = str_replace('+', ' ', $qode_options_eden['google_fonts']); ?>
    	font-family: '<?php echo $font; ?>', sans-serif;
    	<?php } ?>
    	<?php if (!empty($qode_options_eden['text_color'])) { ?> color: <?php echo $qode_options_eden['text_color'];  ?>; <?php } ?>
    	<?php if (!empty($qode_options_eden['text_fontsize'])) { ?> font-size: <?php echo $qode_options_eden['text_fontsize']; ?>px; <?php } ?>
    	<?php if (!empty($qode_options_eden['text_fontweight'])) { ?>font-weight: <?php echo $qode_options_eden['text_fontweight'];  ?>;<?php } ?>	
    }
    <?php if (!empty($qode_options_eden['background_color'])) { ?> 
        body,
        .content,
        .full_width{
        	background-color:<?php echo $qode_options_eden['background_color'];  ?>; 
        }
    <?php } ?>
<?php } ?>
<?php if (!empty($qode_options_eden['background_color_box'])) { ?>
    .wrapper{
    	<?php if (!empty($qode_options_eden['background_color_box'])) { ?> background-color:<?php echo $qode_options_eden['background_color_box'];  ?>; <?php } ?>
    }
<?php } ?>
<?php
$boxed = "no";
if (isset($qode_options_eden['boxed']))
	$boxed = $qode_options_eden['boxed'];
?>
<?php if($boxed == "yes"){ ?>
body.boxed .wrapper{
	<?php if (!empty($qode_options_eden['background_color_box'])) { ?> background-color:<?php echo $qode_options_eden['background_color_box'];  ?>; <?php } ?>
	
	<?php if($qode_options_eden['pattern_background_image'] != ""){  ?>
		background-image: url('<?php echo $qode_options_eden['pattern_background_image'] ?>');
		background-position: 0px 0px;
		background-repeat: repeat;
	<?php } ?>
	
	<?php if($qode_options_eden['background_image'] != ""){  ?>
		background-image: url('<?php echo $qode_options_eden['background_image'] ?>');
		background-attachment: fixed;
		background-position: center 0px;
		background-repeat: no-repeat;
	<?php } ?>
}
body.boxed .content{
	<?php if (!empty($qode_options_eden['background_color'])) { ?> background-color:<?php echo $qode_options_eden['background_color'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_eden['background_color_boxes'])) { ?>
.projects_holder article .portfolio_description,
.blog_holder.masonry article .post_text,
.q_team,
.q_team .q_team_text,
.price_table_inner,
.latest_post_holder.boxes > ul > li,
.q_counter_holder.boxed_counter
 {
	background-color: <?php echo $qode_options_eden['background_color_boxes'];  ?>;
}
<?php } ?>
<?php if (!empty($qode_options_eden['highlight_color'])) { ?>
span.highlight {
	background-color: <?php echo $qode_options_eden['highlight_color'];  ?>;
}
<?php } ?>

<?php if (!empty($qode_options_eden['header_background_color']) || $qode_options_eden['header_background_transparency_initial'] != "") { 
	if(!empty($qode_options_eden['header_background_color'])){
		$bg_color = qode_hex2rgb($qode_options_eden['header_background_color']);
	}else{
		$bg_color = qode_hex2rgb('#ffffff');
	}
	if ($qode_options_eden['header_background_transparency_initial'] != "") {
		$bg_color_transparency = $qode_options_eden['header_background_transparency_initial'];
	}else{
		$bg_color_transparency = 1;
	}
?>
.header_bottom,
.header_top {
	background-color: rgba(<?php echo $bg_color[0]; ?>,<?php echo $bg_color[1]; ?>,<?php echo $bg_color[2]; ?>,<?php echo $bg_color_transparency; ?>);
}

<?php if(isset($bg_color_transparency) && $bg_color_transparency == 0) { ?>

.header_bottom,
.header_top {
    border-bottom: 0;
}

.header_bottom {
    box-shadow: none;
}

.header_top .right .inner > div:first-child,
.header_top .right .inner > div,
.header_top .left .inner > div:last-child,
.header_top .left .inner > div {
    border: none;
}

<?php } ?>

<?php } ?>

<?php if (!empty($qode_options_eden['header_separator_color'])) { ?>

.header_top,
.header_top .left .inner > div,
.header_top .left .inner > div:last-child,
.header_top .right .inner > div:first-child,
.header_top .right .inner > div,
header .header_top .q_social_icon_holder,
.drop_down .second .inner ul li a,
.header-widget.widget_nav_menu ul.menu li ul li a,
.header_top #lang_sel ul li ul li a,
.header_top #lang_sel ul li ul li a:visited,
.header_top #lang_sel_click ul li ul li a,
.header_top #lang_sel_click ul li ul li a:visited,
.drop_down .second .inner > ul,
li.narrow .second .inner ul,
.drop_down .wide .second ul li,
.header_menu_bottom,
.header-bottom-right-widget
{
	border-color:<?php echo $qode_options_eden['header_separator_color'];  ?>;
}

<?php } ?>
<?php
if (!empty($qode_options_eden['header_background_color_scroll']) || $qode_options_eden['header_background_transparency_scroll'] != "") {
	
	if(!empty($qode_options_eden['header_background_color_scroll'])){
		$bg_color_scroll = qode_hex2rgb($qode_options_eden['header_background_color_scroll']);
	}else{
		$bg_color_scroll = qode_hex2rgb('#ffffff');
	}
	
	if ($qode_options_eden['header_background_transparency_scroll'] != "") {
		$bg_color_scroll_transparency = $qode_options_eden['header_background_transparency_scroll'];
	}else{
		$bg_color_scroll_transparency = 1;
	}
?>
header.scrolled .header_bottom,
header.scrolled .header_top {
	background-color: rgba(<?php echo $bg_color_scroll[0]; ?>,<?php echo $bg_color_scroll[1]; ?>,<?php echo $bg_color_scroll[2]; ?>,<?php echo $bg_color_scroll_transparency; ?>) !important;
}
<?php } ?>

<?php if($qode_options_eden['header_background_transparency_scroll'] != "" && $qode_options_eden['header_background_transparency_scroll'] == 0) { ?>

header.scrolled .header_bottom,
header.scrolled .header_top {
    border-bottom: 0;
}

header.scrolled .header_bottom {
    box-shadow: none;
}

header.scrolled .header_top .right .inner > div:first-child,
header.scrolled .header_top .right .inner > div,
header.scrolled .header_top .left .inner > div:last-child,
header.scrolled .header_top .left .inner > div {
    border: none;
}
<?php } ?>

<?php if($qode_options_eden['header_background_transparency_scroll'] != "" && $qode_options_eden['header_background_transparency_scroll'] > 0) { ?>

header.scrolled .header_bottom {
    -webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.11);
    -moz-box-shadow: 0 1px 3px rgba(0,0,0,0.11);
    -o-box-shadow: 0 1px 3px rgba(0,0,0,0.11);
    box-shadow: 0 1px 3px rgba(0,0,0,0.11);
}

header.scrolled .header_bottom,
header.scrolled .header_top {
    border-bottom:1px solid #ebebeb;
}

header.scrolled .header_top .right .inner > div:first-child {
    border-left: 1px solid #eaeaea;
}

header.scrolled .header_top .right .inner > div {
    border-right: 1px solid #eaeaea;
    border-left: 0
}

header.scrolled .header_top .left .inner > div:last-child {
    border-right: 1px solid #eaeaea;
}

header.scrolled .header_top .left .inner > div {
    border-left: 1px solid #eaeaea;
}

<?php } ?>

<?php
if (!empty($qode_options_eden['header_background_color_sticky']) || $qode_options_eden['header_background_transparency_sticky'] != "") {
	
	if(!empty($qode_options_eden['header_background_color_sticky'])){
		$bg_color_sticky = qode_hex2rgb($qode_options_eden['header_background_color_sticky']);
	}else{
		$bg_color_sticky = qode_hex2rgb('#ffffff');
	}
	
	if ($qode_options_eden['header_background_transparency_sticky'] != "") {
		$bg_color_sticky_transparency = $qode_options_eden['header_background_transparency_sticky'];
	}else{
		$bg_color_sticky_transparency = 1;
	}
?>
header.sticky .header_bottom{
	background-color: rgba(<?php echo $bg_color_sticky[0]; ?>,<?php echo $bg_color_sticky[1]; ?>,<?php echo $bg_color_sticky[2]; ?>,<?php echo $bg_color_sticky_transparency; ?>) !important;
}
<?php } ?>

<?php if (!empty($qode_options_eden['header_top_background_color']) || $qode_options_eden['header_background_transparency_initial'] != "") { 
	if(!empty($qode_options_eden['header_top_background_color'])) {
		$bg_color_top = qode_hex2rgb($qode_options_eden['header_top_background_color']);
	}

	if ($qode_options_eden['header_background_transparency_initial'] != "") {
		$bg_color_transparency = $qode_options_eden['header_background_transparency_initial'];
	} else{
		$bg_color_transparency = 1;
	}
?>

.header_top{
	background-color: rgba(<?php echo $bg_color_top[0]; ?>,<?php echo $bg_color_top[1]; ?>,<?php echo $bg_color_top[2]; ?>,<?php echo $bg_color_transparency; ?>);
}
<?php } ?>
<?php
if (!empty($qode_options_eden['header_top_background_color']) || $qode_options_eden['header_background_transparency_scroll'] != "") {
	
	if(!empty($qode_options_eden['header_top_background_color'])){
		$bg_color_scroll_top = qode_hex2rgb($qode_options_eden['header_top_background_color']);
	}else{
		$bg_color_scroll_top = qode_hex2rgb('#000000');
	}
	
	if ($qode_options_eden['header_background_transparency_scroll'] != "") {
		$bg_color_scroll_transparency = $qode_options_eden['header_background_transparency_scroll'];
	}else{
		$bg_color_scroll_transparency = 0.7;
	}
?>
header.sticky .header_top{
	background-color: rgba(<?php echo $bg_color_scroll_top[0]; ?>,<?php echo $bg_color_scroll_top[1]; ?>,<?php echo $bg_color_scroll_top[2]; ?>,<?php echo $bg_color_scroll_transparency; ?>);
}
<?php } ?>

<?php
$header_bottom_appearance = "fixed";
if (isset($qode_options_eden['header_bottom_appearance'])) {
    $header_bottom_appearance = $qode_options_eden['header_bottom_appearance'];
}
?>

<?php 
	$display_header_top = "yes";
	if(isset($qode_options_eden['header_top_area'])){
		$display_header_top = $qode_options_eden['header_top_area'];
	}
	if (!empty($_SESSION['qode_eden_header_top'])){
		$display_header_top = $_SESSION['qode_eden_header_top'];
	}
	
	if($display_header_top == "no"){
		$margin_top_add = 0;
	}else{
		$margin_top_add = 34;
	}
	if (!empty($qode_options_eden['header_height'])) {
		$header_height = $qode_options_eden['header_height'];
	} else {
		$header_height = 85;
	}
	if($header_bottom_appearance == "stick menu_bottom") {
		$menu_bottom = 46; // border 1px
		if ($qode_options_eden['center_logo_image'] == "yes") {
			if(is_active_sidebar('header_fixed_right')){
				$menu_bottom = $menu_bottom + 22; // 22 is for right widget in header bottom (line height of text)
			}
		}
	} else {
		$menu_bottom = 0;
	}
	$header_height = $header_height + $menu_bottom;
?>

<?php if ($header_bottom_appearance != "fixed") {?>
	<?php if ($qode_options_eden['center_logo_image'] != "yes") { ?>
		<?php if($header_bottom_appearance == "stick menu_bottom") { ?>
		.content{
			margin-top: <?php echo '-'.($margin_top_add + $header_height - 6); // 30 is top and bottom margin of centered logo  + 6 is neagitve margin on header?>px;
		}
		<?php }  else { ?>
			.content{
				margin-top: <?php echo '-'.($header_height + $margin_top_add); ?>px;
			}
		<?php } ?>
		
	<?php } else { 
			$height = 0;
		?>
		<?php if(isset($qode_options_eden['logo_image'])){ 
			if (!empty($qode_options_eden['logo_image'])) {
				$logo_url_obj = parse_url($qode_options_eden['logo_image']); 
				list($width, $height, $type, $attr) = getimagesize($_SERVER['DOCUMENT_ROOT'].$logo_url_obj['path']);  
			} 
		} ?>
		<?php if($header_bottom_appearance == "stick menu_bottom") { ?>
		.content{
			margin-top: <?php echo '-'.(30 + $height + $menu_bottom + $margin_top_add); // 30 is top and bottom margin of centered logo ?>px;
		}
		<?php }  else { ?>
			.content{
				margin-top: <?php echo '-'.(30 + $height + $header_height + $margin_top_add); // 30 is top and bottom margin of centered logo?>px;
			}
		<?php } ?>
	<?php } ?>
<?php } else { ?>
.content{
	margin-top: 0;
}
<?php } ?>

.content.content_top_margin{
	margin-top: <?php echo 85 + $margin_top_add;  ?>px !important;
}

<?php if (!empty($qode_options_eden['header_height'])) { ?>
.logo_wrapper,
.side_menu_button{
	height: <?php echo $qode_options_eden['header_height'];  ?>px;
}
.content.content_top_margin{
	margin-top: <?php echo $qode_options_eden['header_height'] + $margin_top_add;  ?>px !important;
}

header:not(.centered_logo) .header_fixed_right_area {
    line-height: <?php echo $qode_options_eden['header_height'];  ?>px;
}

<?php if ($qode_options_eden['header_background_transparency_initial'] != "1") { ?>

.drop_down .second,
.drop_down .second.bellow_header
{
	top: <?php echo $qode_options_eden['header_height'];  ?>px;
}
<?php } ?>

<?php } ?>

<?php if (!empty($qode_options_eden['header_height_scroll'])) { ?>
header.scrolled .logo_wrapper,
header.scrolled .side_menu_button{
	height: <?php echo $qode_options_eden['header_height_scroll'];  ?>px;
}

header.scrolled nav.main_menu ul li a {
	line-height: <?php echo $qode_options_eden['header_height_scroll'];  ?>px;
}

header.scrolled .drop_down .second{
	top: <?php echo $qode_options_eden['header_height_scroll'];  ?>px;
}
<?php } ?>

<?php if (!empty($qode_options_eden['header_height_sticky'])) { ?>
header.sticky .logo_wrapper,
header.sticky.centered_logo .logo_wrapper,
header.sticky .side_menu_button {
	height: <?php echo $qode_options_eden['header_height_sticky'];  ?>px !important;
}

header.sticky nav.main_menu > ul > li > a, 
.light.sticky nav.main_menu > ul > li > a, 
.light.sticky nav.main_menu > ul > li > a:hover, 
.light.sticky nav.main_menu > ul > li.active > a, 
.dark.sticky nav.main_menu > ul > li > a, 
.dark.sticky nav.main_menu > ul > li > a:hover, 
.dark.sticky nav.main_menu > ul > li.active > a {
	line-height: <?php echo $qode_options_eden['header_height_sticky'];  ?>px;
}

header.sticky .drop_down .second{
	top: <?php echo $qode_options_eden['header_height_sticky'];  ?>px;
}
<?php } ?>

<?php
$parallax_onoff = "on";
if (isset($qode_options_eden['parallax_onoff']))
	$parallax_onoff = $qode_options_eden['parallax_onoff'];
if ($parallax_onoff == "off"){
?>
	.touch section.parallax_section_holder{
		height: auto !important;
		min-height: 300px;  
		background-position: center top !important;  
		background-attachment: scroll;
	}
<?php } ?>
<?php if (!empty($qode_options_eden['header_height'])) { ?>
nav.main_menu > ul > li > a{
	line-height: <?php echo $qode_options_eden['header_height'];  ?>px;
}
<?php } ?>
<?php if (!empty($qode_options_eden['dropdown_background_color'])) { 
	$dropdown_bg_color_initial = qode_hex2rgb($qode_options_eden['dropdown_background_color']);
	if (!empty($qode_options_eden['dropdown_background_transparency'])) {
		$dropdown_bg_transparency = $qode_options_eden['dropdown_background_transparency'];
	}else{
		$dropdown_bg_transparency = 1;
	}
?>
.drop_down .second .inner > ul,
.drop_down .second .inner ul li ul,
li.narrow .second .inner ul
{
	background-color: <?php echo $qode_options_eden['dropdown_background_color'];  ?>;
	background-color: rgba(<?php echo $dropdown_bg_color_initial[0]; ?>,<?php echo $dropdown_bg_color_initial[1]; ?>,<?php echo $dropdown_bg_color_initial[2]; ?>,<?php echo $dropdown_bg_transparency; ?>);
}
<?php } else {
	$dropdown_bg_color_initial = qode_hex2rgb("#000");
	if (!empty($qode_options_eden['dropdown_background_transparency'])) {
		$dropdown_bg_transparency = $qode_options_eden['dropdown_background_transparency'];
	}else{
		$dropdown_bg_transparency = 0.8;
	}
} ?>

<?php if (!empty($qode_options_eden['item_background_hover_color'])) { ?>
	.drop_down .second .inner > ul > li > a:hover,
	.drop_down .second .inner ul li.sub ul li a:hover{
		background-color: <?php echo $qode_options_eden['item_background_hover_color'];  ?>;;
	}
<?php } ?>

<?php if (!empty($qode_options_eden['menu_color']) || !empty($qode_options_eden['menu_fontsize']) || !empty($qode_options_eden['menu_fontstyle']) || !empty($qode_options_eden['menu_fontweight']) || !empty($qode_options_eden['menu_letter_spacing']) || $qode_options_eden['menu_google_fonts'] != "-1") { ?>
nav.main_menu > ul > li > a{
	<?php if (!empty($qode_options_eden['menu_color'])) { ?> color: <?php echo $qode_options_eden['menu_color'];  ?>; <?php } ?>
	<?php if($qode_options_eden['menu_google_fonts'] != "-1"){ ?>
	font-family: '<?php echo str_replace('+', ' ', $qode_options_eden['menu_google_fonts']); ?>', sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_eden['menu_fontsize'])) { ?> font-size: <?php echo $qode_options_eden['menu_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['menu_fontstyle'])) { ?> font-style: <?php echo $qode_options_eden['menu_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_eden['menu_fontweight'])) { ?> font-weight: <?php echo $qode_options_eden['menu_fontweight'];  ?>; <?php } ?>
}

<?php if (!empty($qode_options_eden['menu_color'])) { ?>
.side_menu_button a,
.shopping_cart_header .header_cart i,
.shopping_cart_header .header_cart:hover i,
.side_menu_button a:hover{
	color: <?php echo $qode_options_eden['menu_color'];  ?>;
}
<?php } ?>

<?php } ?>
<?php if (!empty($qode_options_eden['menu_hovercolor'])) { ?>
nav.main_menu>ul>li.active > a > span,
nav.main_menu>ul>li.active > a > i,
nav.main_menu > ul > li:hover > a > span,
nav.main_menu > ul > li:hover > a > i{
	color: <?php echo $qode_options_eden['menu_hovercolor'];  ?>;
}

nav.main_menu > ul > li.active > a span.line{
	background-color: <?php echo $qode_options_eden['menu_hovercolor'];  ?>;	
}

<?php } ?>
<?php if(!empty($qode_options_eden['dropdown_color']) || !empty($qode_options_eden['dropdown_fontsize']) || !empty($qode_options_eden['dropdown_lineheight']) || !empty($qode_options_eden['dropdown_fontstyle']) || !empty($qode_options_eden['dropdown_fontweight']) || $qode_options_eden['dropdown_google_fonts'] != "-1"){ ?>
.drop_down .second .inner > ul > li > a,
.drop_down .second .inner > ul > li > h3,
.drop_down .wide .second .inner > ul > li > h3,
.drop_down .wide .second .inner > ul > li > a,
.drop_down .wide .second ul li ul li.menu-item-has-children > a,
.drop_down .wide .second .inner ul li.sub ul li.menu-item-has-children > a,
.drop_down .wide .second .inner > ul li.sub .flexslider ul li  h5 a,
.drop_down .wide .second .inner > ul li .flexslider ul li  h5 a,
.drop_down .wide .second .inner > ul li.sub .flexslider ul li  h5,
.drop_down .wide .second .inner > ul li .flexslider ul li  h5{
	<?php if (!empty($qode_options_eden['dropdown_color'])) { ?> color: <?php echo $qode_options_eden['dropdown_color']; ?>; <?php } ?>
	<?php if($qode_options_eden['dropdown_google_fonts'] != "-1"){ ?>
	font-family: '<?php echo str_replace('+', ' ', $qode_options_eden['dropdown_google_fonts']) ?>', sans-serif !important;
	<?php } ?>
	<?php if (!empty($qode_options_eden['dropdown_fontsize'])) { ?> font-size: <?php echo $qode_options_eden['dropdown_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['dropdown_lineheight'])) { ?> line-height: <?php echo $qode_options_eden['dropdown_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['dropdown_fontstyle'])) { ?> font-style: <?php echo $qode_options_eden['dropdown_fontstyle'];  ?>;  <?php } ?>
	<?php if (!empty($qode_options_eden['dropdown_fontweight'])) { ?>font-weight: <?php echo $qode_options_eden['dropdown_fontweight'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_eden['dropdown_hovercolor'])) { ?>
.drop_down .second .inner > ul > li > a:hover,
.drop_down .wide .second ul li ul li.menu-item-has-children > a:hover,
.drop_down .wide .second .inner ul li.sub ul li.menu-item-has-children > a:hover{
	color: <?php echo $qode_options_eden['dropdown_hovercolor'];  ?> !important;
}
<?php } ?>
<?php if(!empty($qode_options_eden['dropdown_color_thirdlvl']) || !empty($qode_options_eden['dropdown_fontsize_thirdlvl']) || !empty($qode_options_eden['dropdown_lineheight_thirdlvl']) || !empty($qode_options_eden['dropdown_fontstyle_thirdlvl']) || !empty($qode_options_eden['dropdown_fontweight_thirdlvl']) || $qode_options_eden['dropdown_google_fonts_thirdlvl'] != "-1"){ ?>
.drop_down .wide .second .inner ul li.sub ul li a,
.drop_down .wide .second ul li ul li a,
.drop_down .second .inner ul li.sub ul li a,
.drop_down .wide .second ul li ul li a,
.drop_down .wide .second .inner ul li.sub .flexslider ul li .menu_recent_post,
.drop_down .wide .second .inner ul li .flexslider ul li .menu_recent_post a,
.drop_down .wide .second .inner ul li .flexslider ul li .menu_recent_post,
.drop_down .wide .second .inner ul li .flexslider ul li .menu_recent_post a{
	<?php if (!empty($qode_options_eden['dropdown_color_thirdlvl'])) { ?> color: <?php echo $qode_options_eden['dropdown_color_thirdlvl'];  ?>;  <?php } ?>
	<?php if($qode_options_eden['dropdown_google_fonts_thirdlvl'] != "-1"){ ?>
	font-family: '<?php echo str_replace('+', ' ', $qode_options_eden['dropdown_google_fonts_thirdlvl']) ?>', sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_eden['dropdown_fontsize_thirdlvl'])) { ?> font-size: <?php echo $qode_options_eden['dropdown_fontsize_thirdlvl'];  ?>px;  <?php } ?>
	<?php if (!empty($qode_options_eden['dropdown_lineheight_thirdlvl'])) { ?> line-height: <?php echo $qode_options_eden['dropdown_lineheight_thirdlvl'];  ?>px;  <?php } ?>
	<?php if (!empty($qode_options_eden['dropdown_fontstyle_thirdlvl'])) { ?> font-style: <?php echo $qode_options_eden['dropdown_fontstyle_thirdlvl'];  ?>;   <?php } ?>
	<?php if (!empty($qode_options_eden['dropdown_fontweight_thirdlvl'])) { ?> font-weight: <?php echo $qode_options_eden['dropdown_fontweight_thirdlvl'];  ?>;  <?php } ?>
}
.drop_down .wide.icons .second i{
    <?php if (!empty($qode_options_eden['dropdown_color_thirdlvl'])) { ?> color: <?php echo $qode_options_eden['dropdown_color_thirdlvl'];  ?>;  <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_eden['dropdown_hovercolor_thirdlvl'])) { ?>
.drop_down .second .inner ul li.sub ul li a:hover,
.drop_down .second .inner ul li ul li a:hover,
.drop_down .wide.icons .second a:hover i
{
	color: <?php echo $qode_options_eden['dropdown_hovercolor_thirdlvl'];  ?> !important;
}
<?php } ?>


<?php if(!empty($qode_options_eden['fixed_color']) || !empty($qode_options_eden['fixed_fontsize']) || !empty($qode_options_eden['fixed_lineheight']) || !empty($qode_options_eden['fixed_fontstyle']) || !empty($qode_options_eden['fixed_fontweight']) || $qode_options_eden['fixed_google_fonts'] != "-1"){ ?>
header.fixed nav.main_menu > ul > li > a, 
header.light.fixed nav.main_menu > ul > li > a, 
header.dark.fixed nav.main_menu > ul > li > a{
	<?php if (!empty($qode_options_eden['fixed_color'])) { ?> color: <?php echo $qode_options_eden['fixed_color']; ?>; <?php } ?>
	<?php if($qode_options_eden['fixed_google_fonts'] != "-1"){ ?>
	font-family: '<?php echo str_replace('+', ' ', $qode_options_eden['fixed_google_fonts']) ?>', sans-serif !important;
	<?php } ?>
	<?php if (!empty($qode_options_eden['fixed_fontsize'])) { ?> font-size: <?php echo $qode_options_eden['fixed_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['fixed_lineheight'])) { ?> line-height: <?php echo $qode_options_eden['fixed_lineheight'];  ?>px !important; <?php } ?>
	<?php if (!empty($qode_options_eden['fixed_fontstyle'])) { ?> font-style: <?php echo $qode_options_eden['fixed_fontstyle'];  ?>;  <?php } ?>
	<?php if (!empty($qode_options_eden['fixed_fontweight'])) { ?>font-weight: <?php echo $qode_options_eden['fixed_fontweight'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_eden['fixed_color'])) { ?>
header.fixed .side_menu_button a, 
header.fixed .side_menu_button a:hover{
    <?php if (!empty($qode_options_eden['fixed_color'])) { ?> color: <?php echo $qode_options_eden['fixed_color']; ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_eden['fixed_hovercolor'])) { ?>
header.fixed nav.main_menu > ul > li > a:hover > span,
header.fixed nav.main_menu > ul > li:hover > a > span, 
header.fixed nav.main_menu > ul > li.active > a > span,
header.fixed nav.main_menu > ul > li > a:hover > i, 
header.fixed nav.main_menu > ul > li:hover > a > i,
header.fixed nav.main_menu > ul > li.active > a > i,
.light.fixed nav.main_menu > ul > li > a:hover, 
.light.fixed nav.main_menu > ul > li.active > a, 
.dark.fixed nav.main_menu > ul > li > a:hover, 
.dark.fixed nav.main_menu > ul > li.active > a{
	color: <?php echo $qode_options_eden['fixed_hovercolor'];  ?> !important;
}
<?php } ?>

<?php if(!empty($qode_options_eden['sticky_color']) || !empty($qode_options_eden['sticky_fontsize']) || !empty($qode_options_eden['sticky_lineheight']) || !empty($qode_options_eden['sticky_fontstyle']) || !empty($qode_options_eden['sticky_fontweight']) || $qode_options_eden['sticky_google_fonts'] != "-1"){ ?>
header.sticky nav.main_menu > ul > li > a, 
header.light.sticky nav.main_menu > ul > li > a, 
header.dark.sticky nav.main_menu > ul > li > a{
	<?php if (!empty($qode_options_eden['sticky_color'])) { ?> color: <?php echo $qode_options_eden['sticky_color']; ?>; <?php } ?>
	<?php if($qode_options_eden['sticky_google_fonts'] != "-1"){ ?>
	font-family: '<?php echo str_replace('+', ' ', $qode_options_eden['sticky_google_fonts']) ?>', sans-serif !important;
	<?php } ?>
	<?php if (!empty($qode_options_eden['sticky_fontsize'])) { ?> font-size: <?php echo $qode_options_eden['sticky_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['sticky_lineheight'])) { ?> line-height: <?php echo $qode_options_eden['sticky_lineheight'];  ?>px !important; <?php } ?>
	<?php if (!empty($qode_options_eden['sticky_fontstyle'])) { ?> font-style: <?php echo $qode_options_eden['sticky_fontstyle'];  ?>;  <?php } ?>
	<?php if (!empty($qode_options_eden['sticky_fontweight'])) { ?>font-weight: <?php echo $qode_options_eden['sticky_fontweight'];  ?>; <?php } ?>
}
<?php } ?>

<?php if (!empty($qode_options_eden['sticky_color'])) { ?>
header.sticky .side_menu_button a, 
header.sticky .side_menu_button a:hover{
    <?php if (!empty($qode_options_eden['sticky_color'])) { ?> color: <?php echo $qode_options_eden['sticky_color']; ?>; <?php } ?>
}
<?php } ?>

<?php if (!empty($qode_options_eden['sticky_hovercolor'])) { ?>
header.sticky nav.main_menu > ul > li > a:hover span, 
header.sticky nav.main_menu > ul > li.active > a span,
header.sticky nav.main_menu > ul > li:hover > a > span,
header.sticky nav.main_menu > ul > li > a:hover > i, 
header.sticky nav.main_menu > ul > li:hover > a > i,
header.sticky nav.main_menu > ul > li.active > a > i,
.light.sticky nav.main_menu > ul > li > a:hover, 
.light.sticky nav.main_menu > ul > li.active > a, 
.dark.sticky nav.main_menu > ul > li > a:hover, 
.dark.sticky nav.main_menu > ul > li.active > a{
	color: <?php echo $qode_options_eden['sticky_hovercolor'];  ?> !important;
}
<?php } ?>

<?php if (!empty($qode_options_eden['mobile_color']) || !empty($qode_options_eden['mobile_fontsize']) || !empty($qode_options_eden['mobile_lineheight']) || !empty($qode_options_eden['mobile_fontstyle']) || !empty($qode_options_eden['mobile_fontweight']) || !empty($qode_options_eden['mobile_letter_spacing']) || $qode_options_eden['mobile_google_fonts'] != "-1") { ?>
nav.mobile_menu ul li a,
nav.mobile_menu ul li h3{
	<?php if (!empty($qode_options_eden['mobile_color'])) { ?> color: <?php echo $qode_options_eden['mobile_color'];  ?>; <?php } ?>
	<?php if($qode_options_eden['mobile_google_fonts'] != "-1"){ ?>
	font-family: '<?php echo str_replace('+', ' ', $qode_options_eden['mobile_google_fonts']); ?>', sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_eden['mobile_fontsize'])) { ?> font-size: <?php echo $qode_options_eden['mobile_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['mobile_lineheight'])) { ?> line-height: <?php echo $qode_options_eden['mobile_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['mobile_fontstyle'])) { ?> font-style: <?php echo $qode_options_eden['mobile_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_eden['mobile_fontweight'])) { ?> font-weight: <?php echo $qode_options_eden['mobile_fontweight'];  ?>; <?php } ?>
	<?php if(!empty($qode_options_eden['mobile_letter_spacing'])){ ?>
	letter-spacing: <?php echo $qode_options_eden['mobile_letter_spacing'];  ?>px;
	<?php } ?>
}

<?php if (!empty($qode_options_eden['mobile_color'])) { ?>
@media only screen and (max-width: 1000px){
	header .side_menu_button a:hover,
	header .side_menu_button a,
	header .mobile_menu_button span,
	header.dark .side_menu_button a,
	header.dark .side_menu_button a:hover,
	header.dark .mobile_menu_button span{
		color: <?php echo $qode_options_eden['mobile_color'];  ?>;
	}
}
<?php } ?>
<?php } ?>
<?php if (!empty($qode_options_eden['mobile_hovercolor'])) { ?>
nav.mobile_menu ul li a:hover,
nav.mobile_menu ul li.active > a,
nav.mobile_menu ul li.current-menu-item > a{
	color: <?php echo $qode_options_eden['mobile_hovercolor'];  ?>;
}
<?php } ?>
<?php if (!empty($qode_options_eden['mobile_separator_color'])) { ?>
	nav.mobile_menu ul li a,
	nav.mobile_menu ul li h3,
	nav.mobile_menu ul li ul li a,
	nav.mobile_menu ul li.open_sub > a:first-child{
		border-color: <?php echo $qode_options_eden['mobile_separator_color'];  ?>;
	}
<?php } ?>

<?php if (!empty($qode_options_eden['mobile_background_color'])) { ?>
	@media only screen and (max-width: 1000px){
		.header_bottom,
		nav.mobile_menu{
			background-color: <?php echo $qode_options_eden['mobile_background_color'];  ?> !important;
		}
	}
<?php } ?>

<?php if (!empty($qode_options_eden['h1_color']) || !empty($qode_options_eden['h1_fontsize']) || !empty($qode_options_eden['h1_lineheight']) || !empty($qode_options_eden['h1_fontstyle']) || !empty($qode_options_eden['h1_fontweight']) || !empty($qode_options_eden['h1_letterspacing']) || $qode_options_eden['h1_google_fonts'] != "-1") { ?>
h1{
	<?php if (!empty($qode_options_eden['h1_color'])) { ?>	color: <?php echo $qode_options_eden['h1_color'];  ?>; <?php } ?>
	<?php if($qode_options_eden['h1_google_fonts'] != "-1"){ ?>
	font-family: '<?php echo str_replace('+', ' ', $qode_options_eden['h1_google_fonts']); ?>', sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_eden['h1_fontsize'])) { ?>font-size: <?php echo $qode_options_eden['h1_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['h1_lineheight'])) { ?>line-height: <?php echo $qode_options_eden['h1_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['h1_fontstyle'])) { ?>font-style: <?php echo $qode_options_eden['h1_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_eden['h1_fontweight'])) { ?>font-weight: <?php echo $qode_options_eden['h1_fontweight'];  ?>; <?php } ?>
    <?php if (!empty($qode_options_eden['h1_letterspacing'])) { ?>letter-spacing: <?php echo $qode_options_eden['h1_letterspacing'];  ?>px; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_eden['page_title_color']) || !empty($qode_options_eden['page_title_fontsize']) || !empty($qode_options_eden['page_title_lineheight']) || !empty($qode_options_eden['page_title_fontstyle']) || !empty($qode_options_eden['page_title_fontweight']) || $qode_options_eden['page_title_google_fonts'] != "-1") { ?>
.title h1{
	<?php if (!empty($qode_options_eden['page_title_color'])) { ?>color: <?php echo $qode_options_eden['page_title_color'];  ?>; <?php } ?>
	<?php if($qode_options_eden['page_title_google_fonts'] != "-1"){ ?>
	font-family: '<?php echo str_replace('+', ' ', $qode_options_eden['page_title_google_fonts']); ?>', sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_eden['page_title_fontsize'])) { ?>font-size: <?php echo $qode_options_eden['page_title_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['page_title_lineheight'])) { ?>line-height: <?php echo $qode_options_eden['page_title_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['page_title_fontstyle'])) { ?>font-style: <?php echo $qode_options_eden['page_title_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_eden['page_title_fontweight'])) { ?>font-weight: <?php echo $qode_options_eden['page_title_fontweight'];  ?>; <?php } ?>
}
<?php if($qode_options_eden['page_title_position'] != "0"){ ?>
.title .separator{
	text-align: <?php if($qode_options_eden['page_title_position'] == "1"){echo "left";} if($qode_options_eden['page_title_position'] == "2"){echo "center";} if($qode_options_eden['page_title_position'] == "3"){echo "right";}  ?>;
	<?php if($qode_options_eden['page_title_position'] == "1" || $qode_options_eden['page_title_position'] == "3"){?> 
		margin-left:0;
		margin-right:0;
		display: inline-block;
	<?php } ?>
}
<?php } ?>
<?php if($qode_options_eden['page_title_position'] != "0"){ ?>
.title h6,
.title
{
	text-align: <?php if($qode_options_eden['page_title_position'] == "1"){echo "left";} if($qode_options_eden['page_title_position'] == "2"){echo "center";} if($qode_options_eden['page_title_position'] == "3"){echo "right";}  ?>;
}
<?php } ?>
<?php } ?>
<?php if (!empty($qode_options_eden['h2_color']) || !empty($qode_options_eden['h2_fontsize']) || !empty($qode_options_eden['h2_lineheight']) || !empty($qode_options_eden['h2_fontstyle']) || !empty($qode_options_eden['h2_fontweight']) || !empty($qode_options_eden['h2_letterspacing']) || $qode_options_eden['h2_google_fonts'] != "-1") { ?>
h2,
h2 a{
	<?php if (!empty($qode_options_eden['h2_color'])) { ?>color: <?php echo $qode_options_eden['h2_color'];  ?>; <?php } ?>
	<?php if($qode_options_eden['h2_google_fonts'] != "-1"){ ?>
		font-family: '<?php echo str_replace('+', ' ', $qode_options_eden['h2_google_fonts']); ?>', sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_eden['h2_fontsize'])) { ?>font-size: <?php echo $qode_options_eden['h2_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['h2_lineheight'])) { ?>line-height: <?php echo $qode_options_eden['h2_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['h2_fontstyle'])) { ?>font-style: <?php echo $qode_options_eden['h2_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_eden['h2_fontweight'])) { ?>font-weight: <?php echo $qode_options_eden['h2_fontweight'];  ?>; <?php } ?>
    <?php if (!empty($qode_options_eden['h2_letterspacing'])) { ?>letter-spacing: <?php echo $qode_options_eden['h2_letterspacing'];  ?>px; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_eden['h3_color']) || !empty($qode_options_eden['h3_fontsize']) || !empty($qode_options_eden['h3_lineheight']) || !empty($qode_options_eden['h3_fontstyle']) || !empty($qode_options_eden['h3_fontweight']) || !empty($qode_options_eden['h3_letterspacing']) || $qode_options_eden['h3_google_fonts'] != "-1") { ?>
h3,h3 a{
	<?php if (!empty($qode_options_eden['h3_color'])) { ?>color: <?php echo $qode_options_eden['h3_color'];  ?>; <?php } ?>
	<?php if($qode_options_eden['h3_google_fonts'] != "-1"){ ?>
	font-family: '<?php echo str_replace('+', ' ', $qode_options_eden['h3_google_fonts']); ?>', sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_eden['h3_fontsize'])) { ?>font-size: <?php echo $qode_options_eden['h3_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['h3_lineheight'])) { ?>line-height: <?php echo $qode_options_eden['h3_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['h3_fontstyle'])) { ?>font-style: <?php echo $qode_options_eden['h3_fontstyle'];?>; <?php } ?>
	<?php if (!empty($qode_options_eden['h3_fontweight'])) { ?>font-weight: <?php echo $qode_options_eden['h3_fontweight'];  ?>; <?php } ?>
    <?php if (!empty($qode_options_eden['h3_letterspacing'])) { ?>letter-spacing: <?php echo $qode_options_eden['h3_letterspacing'];  ?>px; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_eden['h4_color']) || !empty($qode_options_eden['h4_fontsize']) || !empty($qode_options_eden['h4_lineheight']) || !empty($qode_options_eden['h4_fontstyle']) || !empty($qode_options_eden['h4_fontweight']) || !empty($qode_options_eden['h4_letterspacing']) || $qode_options_eden['h4_google_fonts'] != "-1") { ?>
h4,
h4 a{
	<?php if (!empty($qode_options_eden['h4_color'])) { ?>color: <?php echo $qode_options_eden['h4_color'];  ?>; <?php } ?>
	<?php if($qode_options_eden['h4_google_fonts'] != "-1"){ ?>
		font-family: '<?php echo str_replace('+', ' ', $qode_options_eden['h4_google_fonts']); ?>', sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_eden['h4_fontsize'])) { ?>font-size: <?php echo $qode_options_eden['h4_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['h4_lineheight'])) { ?>line-height: <?php echo $qode_options_eden['h4_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['h4_fontstyle'])) { ?>font-style: <?php echo $qode_options_eden['h4_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_eden['h4_fontweight'])) { ?>font-weight: <?php echo $qode_options_eden['h4_fontweight'];  ?>; <?php } ?>
    <?php if (!empty($qode_options_eden['h4_letterspacing'])) { ?>letter-spacing: <?php echo $qode_options_eden['h4_letterspacing'];  ?>px; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_eden['h5_color']) || !empty($qode_options_eden['h5_fontsize']) || !empty($qode_options_eden['h5_lineheight']) || !empty($qode_options_eden['h5_fontstyle']) || !empty($qode_options_eden['h5_fontweight']) || !empty($qode_options_eden['h5_letterspacing']) || $qode_options_eden['h5_google_fonts'] != "-1") { ?>
h5,
h5 a{
	<?php if (!empty($qode_options_eden['h5_color'])) { ?>color: <?php echo $qode_options_eden['h5_color'];  ?>; <?php } ?>
	<?php if($qode_options_eden['h5_google_fonts'] != "-1"){ ?>
	font-family: '<?php echo str_replace('+', ' ', $qode_options_eden['h5_google_fonts']); ?>', sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_eden['h5_fontsize'])) { ?>font-size: <?php echo $qode_options_eden['h5_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['h5_lineheight'])) { ?>line-height: <?php echo $qode_options_eden['h5_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['h5_fontstyle'])) { ?>font-style: <?php echo $qode_options_eden['h5_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_eden['h5_fontweight'])) { ?>font-weight: <?php echo $qode_options_eden['h5_fontweight'];  ?>; <?php } ?>
    <?php if (!empty($qode_options_eden['h5_letterspacing'])) { ?>letter-spacing: <?php echo $qode_options_eden['h5_letterspacing'];  ?>px; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_eden['h6_color']) || !empty($qode_options_eden['h6_fontsize']) || !empty($qode_options_eden['h6_lineheight']) || !empty($qode_options_eden['h6_fontstyle']) || !empty($qode_options_eden['h6_fontweight']) || !empty($qode_options_eden['h6_letterspacing']) || $qode_options_eden['h6_google_fonts'] != "-1") { ?>
h6{
	<?php if (!empty($qode_options_eden['h6_color'])) { ?>color: <?php echo $qode_options_eden['h6_color'];  ?>; <?php } ?>
	<?php if($qode_options_eden['h6_google_fonts'] != "-1"){ ?>
	font-family: '<?php echo str_replace('+', ' ', $qode_options_eden['h6_google_fonts']); ?>', sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_eden['h6_fontsize'])) { ?>font-size: <?php echo $qode_options_eden['h6_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['h6_lineheight'])) { ?>line-height: <?php echo $qode_options_eden['h6_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['h6_fontstyle'])) { ?>font-style: <?php echo $qode_options_eden['h6_fontstyle'];  ?>;  <?php } ?>
	<?php if (!empty($qode_options_eden['h6_fontweight'])) { ?>font-weight: <?php echo $qode_options_eden['h6_fontweight'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_eden['h6_letterspacing'])) { ?>letter-spacing: <?php echo $qode_options_eden['h6_letterspacing'];  ?>px; <?php } ?>
}

<?php } ?>

<?php if (!empty($qode_options_eden['text_color']) || !empty($qode_options_eden['text_fontsize']) || !empty($qode_options_eden['text_lineheight']) || !empty($qode_options_eden['text_fontstyle']) || !empty($qode_options_eden['text_fontweight']) || $qode_options_eden['text_google_fonts'] != "-1" || !empty($qode_options_eden['text_margin'])) { ?>
    p{
    	<?php if (!empty($qode_options_eden['text_color'])) { ?>color: <?php echo $qode_options_eden['text_color'];  ?>;<?php } ?>
    	<?php if($qode_options_eden['text_google_fonts'] != "-1"){ ?>
    		font-family: '<?php echo str_replace('+', ' ', $qode_options_eden['text_google_fonts']); ?>', sans-serif;
    	<?php } ?>
    	<?php if (!empty($qode_options_eden['text_fontsize'])) { ?>font-size: <?php echo $qode_options_eden['text_fontsize'];  ?>px;<?php } ?>
    	<?php if (!empty($qode_options_eden['text_lineheight'])) { ?>line-height: <?php echo $qode_options_eden['text_lineheight'];  ?>px;<?php } ?>
    	<?php if (!empty($qode_options_eden['text_fontstyle'])) { ?>font-style: <?php echo $qode_options_eden['text_fontstyle'];  ?>;<?php } ?>
    	<?php if (!empty($qode_options_eden['text_fontweight'])) { ?>font-weight: <?php echo $qode_options_eden['text_fontweight'];  ?>;<?php } ?>
    	<?php if (!empty($qode_options_eden['text_margin'])) { ?>margin-top: <?php echo $qode_options_eden['text_margin'];  ?>px;<?php } ?>
    	<?php if (!empty($qode_options_eden['text_margin'])) { ?>margin-bottom: <?php echo $qode_options_eden['text_margin'];  ?>px;<?php } ?>
    }
    .breadcrumb a,
    .filter_holder ul li,
    .blog_holder article.format-quote .post_text_holder .post_title h3 a,
	.blog_holder article.format-link .post_text_holder .post_title h3 a,
	.blog_holder.blog_single article.format-quote .post_text_holder .post_title h3,
	.blog_holder.blog_single article.format-link .post_text_holder .post_title h3,
	.blog_holder.masonry article.format-quote .post_text_holder .post_title h4 a,
	.blog_holder.masonry article.format-link .post_text_holder .post_title h4 a,
	.blog_holder.masonry_full_width article.format-quote .post_text_holder .post_title h4 a,
	.blog_holder.masonry_full_width article.format-link .post_text_holder .post_title h4 a,
	#respond textarea,
	#respond input[type='text'],
	.contact_form input[type='text'],
	.contact_form textarea,
	.side_menu a,
	.side_menu span,
	.side_menu p,
	.side_menu #wp-calendar caption,
	.side_menu #wp-calendar th, 
	.side_menu #wp-calendar td,
	.widget.widget_archive select, 
	.widget.widget_categories select, 
	.widget.widget_text select,
	.widget.widget_search form input[type="submit"],
	.header_top #searchform input[type="submit"],
	.widget.widget_search form input[type="text"],
	.header_top #searchform input[type="text"],
	nav.content_menu ul li a,
	nav.content_menu ul li i {
    	<?php if (!empty($qode_options_eden['text_color'])) { ?>color: <?php echo $qode_options_eden['text_color'];  ?>;<?php } ?>
    }

    <?php if(function_exists("is_woocommerce") && !empty($qode_options_eden['text_color'])){ ?>
        .woocommerce table tr td,
        .woocommerce del,
		.woocommerce-page del,
		.woocommerce input[type='text']:not(.qode_search_field),
		.woocommerce input[type='password'],
		.woocommerce input[type='email'],
		.woocommerce-page input[type='text']:not(.qode_search_field),
		.woocommerce-page input[type='password'],
		.woocommerce-page input[type='email'],
		.woocommerce textarea,
		.woocommerce-page textarea,
		.woocommerce .select2-container .select2-choice,
		.woocommerce-page .select2-container .select2-choice,
		.woocommerce .select2-dropdown-open.select2-drop-above .select2-choice,
		.woocommerce .select2-dropdown-open.select2-drop-above .select2-choices,
		.woocommerce-page .select2-dropdown-open.select2-drop-above .select2-choice,
		.woocommerce-page .select2-dropdown-open.select2-drop-above .select2-choices,
		.woocommerce .select2-container .select2-choice .select2-arrow .select2-arrow:after ,
		.woocommerce-page .select2-container .select2-choice .select2-arrow:after,
		.woocommerce .chosen-container.chosen-container-single .chosen-single,
		.woocommerce-page .chosen-container.chosen-container-single .chosen-single,
		.woocommerce-checkout .chosen-container.chosen-container-single .chosen-single,
		.woocommerce ul.products li.product .product-categories a,
		.woocommerce .summary .product-categories a,
		.woocommerce div.product p[itemprop='price'] del,
		.woocommerce div.product p[itemprop='price'] del span.amount,
		.woocommerce div.product div.product_meta > span span,
		.woocommerce div.product div.product_meta > span a,
		.woocommerce-cart table.cart tbody tr td a,
		.woocommerce-checkout .checkout table tbody tr td a,
		.woocommerce table.cart tbody tr span.amount,
		.woocommerce-page table.cart tbody span.amount,
		.woocommerce table.cart div.coupon .input-text,
		.woocommerce-page table.cart div.coupon .input-text,
		.woocommerce form.checkout table.shop_table span.amount,
		.woocommerce-checkout table.shop_table td span.amount,
		.woocommerce-account table.shop_table td span.amount,
		.woocommerce aside ul.product-categories li > a,
		.woocommerce aside ul.product_list_widget li del span.amount,
		.woocommerce .widget_shopping_cart .quantity span.amount,
		.woocommerce .widget #searchform input[type="submit"],
		.woocommerce .widget #searchform input[type="text"],
		.select2-container-multi .select2-choices .select2-search-choice{
            color: <?php echo $qode_options_eden['text_color']; ?>;
        }
    <?php } ?>
<?php } ?>
<?php if (!empty($qode_options_eden['link_color']) || !empty($qode_options_eden['link_fontstyle']) || !empty($qode_options_eden['link_fontweight']) || !empty($qode_options_eden['link_fontdecoration'])) { ?>
a, p a{
	<?php if (!empty($qode_options_eden['link_color'])) { ?>color: <?php echo $qode_options_eden['link_color'];  ?>;<?php } ?>
	<?php if (!empty($qode_options_eden['link_fontstyle'])) { ?>font-style: <?php echo $qode_options_eden['link_fontstyle'];  ?>;<?php } ?>
	<?php if (!empty($qode_options_eden['link_fontweight'])) { ?>font-weight: <?php echo $qode_options_eden['link_fontweight'];  ?>;<?php } ?>
	<?php if (!empty($qode_options_eden['link_fontdecoration'])) { ?>text-decoration: <?php echo $qode_options_eden['link_fontdecoration'];  ?>;<?php } ?>
}

h1 a,h2 a,h3 a,h4 a,h5 a,h6 a,
.q_tabs .tabs-nav li a,
.q_icon_with_title .icon_with_title_link,
.blog_holder article .post_description a,
.blog_holder.masonry article .post_info a,
.portfolio_social_holder a,
.latest_post_inner .post_infos a{
    <?php if (!empty($qode_options_eden['link_color'])) { ?>color: <?php echo $qode_options_eden['link_color'];  ?>;<?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_eden['link_hovercolor']) || !empty($qode_options_eden['link_fontdecoration'])) { ?>
a:hover,p a:hover,
h1 a:hover,h2 a:hover,h3 a:hover,h4 a:hover,h5 a:hover,h6 a:hover,
.q_icon_with_title .icon_with_title_link:hover,
.blog_holder article .post_description a:hover,
.blog_holder.masonry article .post_info a:hover,
.breadcrumb .current,
.breadcrumb a:hover,
.portfolio_social_holder a:hover,
.latest_post_inner .post_infos a:hover{
	<?php if (!empty($qode_options_eden['link_hovercolor'])) { ?>color: <?php echo $qode_options_eden['link_hovercolor'];  ?>;<?php } ?>
	<?php if (!empty($qode_options_eden['link_fontdecoration'])) { ?>text-decoration: <?php echo $qode_options_eden['link_fontdecoration'];  ?>;<?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_eden['blockquote_font_color'])) { ?>
	blockquote h5{
		color: <?php echo $qode_options_eden['blockquote_font_color'];  ?>;  
	}
<?php } ?>
<?php if (!empty($qode_options_eden['blockquote_background_color']) && !empty($qode_options_eden['blockquote_border_color'])) { ?>
	blockquote{
		border-color: <?php echo $qode_options_eden['blockquote_border_color'];  ?>; 
		background-color: <?php echo $qode_options_eden['blockquote_background_color'];  ?>;  
	}
<?php } ?>
<?php if(!empty($qode_options_eden['blockquote_quote_icon_color'])) { ?>
    blockquote i.pull-left {
        color: <?php echo $qode_options_eden['blockquote_quote_icon_color']; ?>;
    }
<?php } ?>
<?php if(!empty($qode_options_eden['pricing_table_top_color']) || !empty($qode_options_eden['pricing_table_bottom_color']) || !empty($qode_options_eden['pricing_table_border_color'])) { ?>  
    <?php if(!empty($qode_options_eden['pricing_table_top_color']) && !empty($qode_options_eden['pricing_table_bottom_color'])) { ?>    
        .price_table_inner ul li.table_title{
            background: <?php echo $qode_options_eden['pricing_table_top_color']; ?>;
            background: <?php echo $qode_options_eden['pricing_table_top_color'];?> -ms-linear-gradient(bottom, <?php echo $qode_options_eden['pricing_table_bottom_color'];?> 0%, <?php echo $qode_options_eden['pricing_table_top_color'];?> 100%);
            background: <?php echo $qode_options_eden['pricing_table_top_color'];?> -moz-linear-gradient(bottom, <?php echo $qode_options_eden['pricing_table_bottom_color'];?> 0%, <?php echo $qode_options_eden['pricing_table_top_color'];?> 100%);
            background: <?php echo $qode_options_eden['pricing_table_top_color'];?> -o-linear-gradient(bottom, <?php echo $qode_options_eden['pricing_table_bottom_color'];?> 0%, <?php echo $qode_options_eden['pricing_table_top_color'];?> 100%);
            background: <?php echo $qode_options_eden['pricing_table_top_color'];?> -webkit-gradient(linear, left bottom, left top, color-stop(0,<?php echo $qode_options_eden['pricing_table_bottom_color'];?>), color-stop(1, <?php echo $qode_options_eden['pricing_table_top_color'];?>));
            background: <?php echo $qode_options_eden['pricing_table_top_color'];?> -webkit-linear-gradient(bottom, <?php echo $qode_options_eden['pricing_table_bottom_color'];?> 0%, <?php echo $qode_options_eden['pricing_table_top_color'];?> 100%);
            background: <?php echo $qode_options_eden['pricing_table_top_color'];?> linear-gradient(to top, <?php echo $qode_options_eden['pricing_table_bottom_color'];?> 0%, <?php echo $qode_options_eden['pricing_table_top_color'];?> 100%);
        }

        .price_table_inner ul li.prices{
            background: <?php echo $qode_options_eden['pricing_table_bottom_color']; ?>;
            background: <?php echo $qode_options_eden['pricing_table_bottom_color'];?> -ms-linear-gradient(bottom, <?php echo $qode_options_eden['pricing_table_top_color'];?> 0%, <?php echo $qode_options_eden['pricing_table_bottom_color'];?> 100%);
            background: <?php echo $qode_options_eden['pricing_table_bottom_color'];?> -moz-linear-gradient(bottom, <?php echo $qode_options_eden['pricing_table_top_color'];?> 0%, <?php echo $qode_options_eden['pricing_table_bottom_color'];?> 100%);
            background: <?php echo $qode_options_eden['pricing_table_bottom_color'];?> -o-linear-gradient(bottom, <?php echo $qode_options_eden['pricing_table_top_color'];?> 0%, <?php echo $qode_options_eden['pricing_table_bottom_color'];?> 100%);
            background: <?php echo $qode_options_eden['pricing_table_bottom_color'];?> -webkit-gradient(linear, left bottom, left top, color-stop(0,<?php echo $qode_options_eden['pricing_table_top_color'];?>), color-stop(1, <?php echo $qode_options_eden['pricing_table_bottom_color'];?>));
            background: <?php echo $qode_options_eden['pricing_table_bottom_color'];?> -webkit-linear-gradient(bottom, <?php echo $qode_options_eden['pricing_table_top_color'];?> 0%, <?php echo $qode_options_eden['pricing_table_bottom_color'];?> 100%);
            background: <?php echo $qode_options_eden['pricing_table_bottom_color'];?> linear-gradient(to top, <?php echo $qode_options_eden['pricing_table_top_color'];?> 0%, <?php echo $qode_options_eden['pricing_table_bottom_color'];?> 100%);
        }
    <?php } ?>    

    <?php if(!empty($qode_options_eden['pricing_table_border_color'])) { ?>
        .price_table_inner ul li.table_title{
            border-top-color: <?php echo $qode_options_eden['pricing_table_border_color'];?>;
            border-left-color: <?php echo $qode_options_eden['pricing_table_border_color'];?>;
            border-right-color: <?php echo $qode_options_eden['pricing_table_border_color'];?>;
        }
    <?php } ?>
<?php } ?>
<?php if (!empty($qode_options_eden['separator_thickness']) || !empty($qode_options_eden['separator_topmargin']) || !empty($qode_options_eden['separator_bottommargin']) || !empty($qode_options_eden['separator_color'])) { ?>
.separator{
<?php if (!empty($qode_options_eden['separator_thickness'])) { ?>	height: <?php echo $qode_options_eden['separator_thickness'];  ?>px; <?php } ?>
<?php if (!empty($qode_options_eden['separator_topmargin'])) { ?>	margin-top: <?php echo $qode_options_eden['separator_topmargin'];  ?>px; <?php } ?>
<?php if (!empty($qode_options_eden['separator_bottommargin'])) { ?>	margin-bottom: <?php echo $qode_options_eden['separator_bottommargin'];  ?>px; <?php } ?>
<?php if (!empty($qode_options_eden['separator_color'])) { ?>	background-color: <?php echo $qode_options_eden['separator_color'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_eden['separator_color'])) { ?>
.separator.small{
<?php if (!empty($qode_options_eden['separator_color'])) { ?>	background-color: <?php echo $qode_options_eden['separator_color'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_eden['separator_color'])) { ?>
	.blog_holder article,
	.author_description,
	aside .widget,
	section.section,
	.animated_icons_with_text .animated_icon_with_text_inner:after,
	.animated_icons_with_text .animated_icon_with_text_inner:before{
		border-color:<?php echo $qode_options_satellite['separator_color'];  ?>;
	}
<?php } ?>
<?php if (!empty($qode_options_eden['message_backgroundcolor']) || (isset($qode_options_eden['message_bordercolor']) && !empty($qode_options_eden['message_bordercolor']))) { ?>
.q_message{
	<?php if (!empty($qode_options_eden['message_backgroundcolor'])) { ?>background-color: <?php echo $qode_options_eden['message_backgroundcolor'];  ?><?php } ?>;
	<?php if (isset($qode_options_eden['message_bordercolor']) && !empty($qode_options_eden['message_bordercolor'])) { ?>border-color: <?php echo $qode_options_eden['message_bordercolor'];  ?> <?php } ?>; 
}
<?php } ?>
<?php if (!empty($qode_options_eden['message_title_color']) || !empty($qode_options_eden['message_title_fontsize']) || !empty($qode_options_eden['message_title_lineheight']) || !empty($qode_options_eden['message_title_fontstyle']) || !empty($qode_options_eden['message_title_fontweight']) || $qode_options_eden['message_title_google_fonts'] != "-1") { ?>
.q_message .message_text{
<?php if (!empty($qode_options_eden['message_title_color'])) { ?>	color: <?php echo $qode_options_eden['message_title_color'];  ?>; <?php } ?>
	<?php if($qode_options_eden['message_title_google_fonts'] != "-1"){ ?>
	font-family: '<?php echo str_replace('+', ' ', $qode_options_eden['message_title_google_fonts']); ?>', sans-serif;
	<?php } ?>
<?php if (!empty($qode_options_eden['message_title_fontsize'])) { ?>	font-size: <?php echo $qode_options_eden['message_title_fontsize'];  ?>px; <?php } ?>
<?php if (!empty($qode_options_eden['message_title_lineheight'])) { ?>	line-height: <?php echo $qode_options_eden['message_title_lineheight'];  ?>px; <?php } ?>
<?php if (!empty($qode_options_eden['message_title_fontstyle'])) { ?>	font-style: <?php echo $qode_options_eden['message_title_fontstyle'];  ?>; <?php } ?>
<?php if (!empty($qode_options_eden['message_title_fontweight'])) { ?>	font-weight: <?php echo $qode_options_eden['message_title_fontweight'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_eden['message_icon_fontsize']) && !empty($qode_options_eden['message_icon_color'])) { ?>
.q_message.with_icon > i {
   <?php if (!empty($qode_options_eden['message_icon_color'])) { ?> color:  <?php echo $qode_options_eden['message_icon_color'];  ?>; <?php } ?>
   <?php if (!empty($qode_options_eden['message_icon_fontsize'])) { ?> font-size: <?php echo $qode_options_eden['message_icon_fontsize'];  ?>px; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_eden['social_icon_top_gradient_background_color']) || !empty($qode_options_eden['social_icon_bottom_gradient_background_color']) || !empty($qode_options_eden['social_icon_border_color'])) { ?>
	.q_social_icon_holder .fa-stack {
        <?php if(!empty($qode_options_eden['social_icon_top_gradient_background_color']) && !empty($qode_options_eden['social_icon_bottom_gradient_background_color'])) { ?>
		background: <?php echo $qode_options_eden['social_icon_bottom_gradient_background_color'];  ?>;
        background: <?php echo $qode_options_eden['social_icon_top_gradient_background_color']; ?> -ms-linear-gradient(bottom, <?php echo $qode_options_eden['social_icon_bottom_gradient_background_color'] ?> 0%, <?php echo $qode_options_eden['social_icon_top_gradient_background_color'] ?> 100%);
        background: <?php echo $qode_options_eden['social_icon_top_gradient_background_color']; ?> -moz-linear-gradient(bottom, <?php echo $qode_options_eden['social_icon_bottom_gradient_background_color'] ?>00b2f4 0%, <?php echo $qode_options_eden['social_icon_top_gradient_background_color'] ?> 100%);
        background: <?php echo $qode_options_eden['social_icon_top_gradient_background_color']; ?> -o-linear-gradient(bottom, <?php echo $qode_options_eden['social_icon_bottom_gradient_background_color'] ?> 0%, <?php echo $qode_options_eden['social_icon_top_gradient_background_color'] ?> 100%);
        background: <?php echo $qode_options_eden['social_icon_top_gradient_background_color']; ?> -webkit-gradient(linear, left bottom, left top, color-stop(0,<?php echo $qode_options_eden['social_icon_bottom_gradient_background_color'] ?>), color-stop(1, <?php echo $qode_options_eden['social_icon_top_gradient_background_color'] ?>));
        background: <?php echo $qode_options_eden['social_icon_top_gradient_background_color']; ?> -webkit-linear-gradient(bottom, <?php echo $qode_options_eden['social_icon_bottom_gradient_background_color'] ?> 0%, <?php echo $qode_options_eden['social_icon_top_gradient_background_color'] ?> 100%);
        background: <?php echo $qode_options_eden['social_icon_top_gradient_background_color']; ?> linear-gradient(to top, <?php echo $qode_options_eden['social_icon_bottom_gradient_background_color'] ?> 0%, <?php echo $qode_options_eden['social_icon_top_gradient_background_color'] ?> 100%);

        <?php } ?>

        <?php if(!empty($qode_options_eden['social_icon_border_color'])) { ?>

        border: 1px solid <?php echo $qode_options_eden['social_icon_border_color']; ?>

        <?php } ?>
	}
<?php } ?>

<?php if(!empty($qode_options_eden['social_icon_color'])) { ?>
    .q_social_icon_holder .fa-stack i {
        color: <?php echo $qode_options_eden['social_icon_color']; ?>
    }
<?php } ?>

<?php if (!empty($qode_options_eden['button_title_color']) || !empty($qode_options_eden['button_title_fontsize']) || !empty($qode_options_eden['button_title_lineheight']) || !empty($qode_options_eden['button_title_fontstyle']) || !empty($qode_options_eden['button_title_fontweight']) || $qode_options_eden['button_title_google_fonts'] != "-1" || (!empty($qode_options_eden['button_top_gradient_color']) && !empty($qode_options_eden['button_bottom_gradient_color'])) || !empty($qode_options_eden['button_border_color'])) { ?>
.qbutton, .qbutton.medium, #submit_comment, .load_more a{
<?php if (!empty($qode_options_eden['button_title_color'])) { ?>	color: <?php echo $qode_options_eden['button_title_color'];  ?>; <?php } ?>
	<?php if($qode_options_eden['button_title_google_fonts'] != "-1"){ ?>
	font-family: '<?php echo str_replace('+', ' ', $qode_options_eden['button_title_google_fonts']); ?>', sans-serif;
	<?php } ?>

    <?php if (!empty($qode_options_eden['button_border_color'])) { ?>	border-color: <?php echo $qode_options_eden['button_border_color'];  ?>; <?php } ?>

	<?php if (!empty($qode_options_eden['button_title_fontsize'])) { ?>	font-size: <?php echo $qode_options_eden['button_title_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['button_title_lineheight'])) { ?>	line-height: <?php echo $qode_options_eden['button_title_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['button_title_lineheight'])) { ?>	height: <?php echo $qode_options_eden['button_title_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_eden['button_title_fontstyle'])) { ?>	font-style: <?php echo $qode_options_eden['button_title_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_eden['button_title_fontweight'])) { ?>	font-weight: <?php echo $qode_options_eden['button_title_fontweight'];  ?>; <?php } ?>
    <?php if($qode_options_eden['button_top_gradient_color'] != "" && $qode_options_eden['button_bottom_gradient_color'] != ""){ ?>
    background: -ms-linear-gradient(bottom, <?php echo $qode_options_eden['button_bottom_gradient_color']; ?> 0%, <?php echo $qode_options_eden['button_top_gradient_color']; ?> 100%);
    background: -moz-linear-gradient(bottom, <?php echo $qode_options_eden['button_bottom_gradient_color']; ?> 0%, <?php echo $qode_options_eden['button_top_gradient_color']; ?> 100%);
    background: -o-linear-gradient(bottom, <?php echo $qode_options_eden['button_bottom_gradient_color']; ?> 0%, <?php echo $qode_options_eden['button_top_gradient_color']; ?> 100%);
    background: -webkit-gradient(linear, left bottom, left top, color-stop(0, <?php echo $qode_options_eden['button_bottom_gradient_color']; ?>), color-stop(1, <?php echo $qode_options_eden['button_top_gradient_color']; ?>));
    background: -webkit-linear-gradient(bottom, <?php echo $qode_options_eden['button_bottom_gradient_color']; ?> 0%, <?php echo $qode_options_eden['button_top_gradient_color']; ?> 100%);
    background: linear-gradient(to top, <?php echo $qode_options_eden['button_bottom_gradient_color']; ?> 0%, <?php echo $qode_options_eden['button_top_gradient_color']; ?> 100%);

    <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_eden['button_title_hovercolor']) || (isset($qode_options_eden['button_backgroundhovercolor']) && !empty($qode_options_eden['button_backgroundhovercolor']))) { ?>
	.qbutton:hover,
    .qbutton.medium:hover,
	#submit_comment:hover,
	.load_more a:hover{
		<?php if (!empty($qode_options_eden['button_title_hovercolor'])) { ?> color: <?php echo $qode_options_eden['button_title_hovercolor'];?> !important; <?php } ?>
			}
<?php } ?>
<?php if (!empty($qode_options_eden['button_backgroundcolor_hover'])) { ?>
	.qbutton:hover,
	#submit_comment:hover,
	.load_more a:hover{
		<?php if (!empty($qode_options_eden['button_backgroundcolor_hover'])) { ?> background: <?php echo $qode_options_eden['button_backgroundcolor_hover'];?> !important; <?php } ?>
			}
<?php } ?>
<?php
if(isset($qode_options_eden['google_maps_height'])){
	if (intval($qode_options_eden['google_maps_height']) > 0) {
?>
.google_map{
	height: <?php echo intval($qode_options_eden['google_maps_height']); ?>px;
}
<?php
	}
}
?>
<?php if (!empty($qode_options_eden['footer_top_background_color'])) { ?>
	.footer_top_holder,	footer #lang_sel > ul > li > a,	footer #lang_sel_click > ul > li > a{
		background-color: <?php echo $qode_options_eden['footer_top_background_color']; ?>;
	}
	footer #lang_sel ul ul a,footer #lang_sel_click ul ul a,footer #lang_sel ul ul a:visited,footer #lang_sel_click ul ul a:visited{
		background-color: <?php echo $qode_options_eden['footer_top_background_color']; ?> !important;
	}
<?php } ?>
<?php if (!empty($qode_options_eden['footer_top_title_color'])) { ?>
.footer_top .column_inner > div h4 { 
	color:<?php echo $qode_options_eden['footer_top_title_color'];  ?>;
}
<?php } ?>
<?php if (!empty($qode_options_eden['footer_separator_color'])) { ?>
.footer_top .column_inner { 
	border-color:<?php echo $qode_options_eden['footer_separator_color'];  ?>;
}
<?php } ?>
<?php if (!empty($qode_options_eden['footer_top_text_color'])) { ?>
	.footer_top,
	.footer_top p,
    .footer_top span,
    .footer_top li{
		color: <?php echo $qode_options_eden['footer_top_text_color'];  ?>;
	}
<?php } ?>
<?php if (!empty($qode_options_eden['footer_link_color'])) { ?>
    .footer_top a{
        color: <?php echo $qode_options_eden['footer_link_color']; ?> !important;
    }
<?php } ?>
<?php if (!empty($qode_options_eden['footer_link_hover_color'])) { ?>
    .footer_top a:hover{
        color: <?php echo $qode_options_eden['footer_link_hover_color']; ?> !important;
    }
<?php } ?>
<?php if (!empty($qode_options_eden['footer_bottom_background_color'])) { ?>
	.footer_bottom_holder, #lang_sel_footer{
		background-color:<?php echo $qode_options_eden['footer_bottom_background_color'];  ?>;
	}
<?php } ?>
<?php if (!empty($qode_options_eden['footer_bottom_text_color'])) { ?>
.footer_bottom, .footer_bottom span, .footer_bottom p, .footer_bottom p a, #lang_sel_footer ul li a,
footer #lang_sel > ul > li > a,
footer #lang_sel_click > ul > li > a,
footer #lang_sel a.lang_sel_sel,
footer #lang_sel_click a.lang_sel_sel,
footer #lang_sel ul ul a,
footer #lang_sel_click ul ul a,
footer #lang_sel ul ul a:visited,
footer #lang_sel_click ul ul a:visited,
footer #lang_sel_list.lang_sel_list_horizontal a,
footer #lang_sel_list.lang_sel_list_vertical a,
#lang_sel_footer a{
	color:<?php echo $qode_options_eden['footer_bottom_text_color'];  ?>;
}
<?php } ?>
<?php if (!empty($qode_options_eden['content_bottom_background_color'])) { ?>
	.qode_call_to_action.container{
		background-color:<?php echo $qode_options_eden['content_bottom_background_color'];  ?>;
	}
<?php } ?>
<?php if (isset($qode_options_eden['woocommerce_content_top_padding']) && !empty($qode_options_eden['woocommerce_content_top_padding'])) { ?>
	.woocommerce .content .content_inner > .container > .container_inner,
	.woocommerce-cart .content .content_inner > .container > .container_inner,
	.woocommerce-checkout .content .content_inner > .container > .container_inner,
	.woocommerce-account .content .content_inner > .container > .container_inner{
		padding-top:<?php echo $qode_options_eden['woocommerce_content_top_padding']; ?>px;
	}
<?php } ?>
<?php if (isset($qode_options_eden['woocommerce_single_content_top_padding']) && !empty($qode_options_eden['woocommerce_single_content_top_padding'])) { ?>
	.woocommerce.single .content .content_inner > .container > .container_inner{
		padding-top:<?php echo $qode_options_eden['woocommerce_single_content_top_padding']; ?>px;
	}
<?php } ?>
<?php if (isset($qode_options_eden['woocommerce_single_hide_title']) && !empty($qode_options_eden['woocommerce_single_hide_title'])  && $qode_options_eden['woocommerce_single_hide_title'] == "yes") { ?>
	.woocommerce.single .content .content_inner .title_outer{
		display: none !important;
		height: 0 !important;
	}
<?php } ?>
<?php if (isset($qode_options_eden['side_area_background_color']) && !empty($qode_options_eden['side_area_background_color'])) { ?>
	.side_menu,
	.side_menu #lang_sel,
	.side_menu #lang_sel_click,
	.side_menu #lang_sel ul ul,
	.side_menu #lang_sel_click ul ul{
		background-color:<?php echo $qode_options_eden['side_area_background_color'];  ?>;
	}
<?php } ?>
<?php if (isset($qode_options_eden['side_area_text_color']) && !empty($qode_options_eden['side_area_text_color'])) { ?>
	.side_menu .widget,
	.side_menu .widget.widget_search form,
	.side_menu .widget.widget_search form input[type="text"],
	.side_menu .widget.widget_search form input[type="submit"],
	.side_menu .widget h6,
	.side_menu .widget h6 a,
	.side_menu .widget p,
	.side_menu .widget li a,
	.side_menu .widget.widget_rss li a.rsswidget,
	.side_menu #wp-calendar caption,
	.side_menu .widget li,
	.side_menu_title h3,
	.side_menu .widget.widget_archive select, 
	.side_menu .widget.widget_categories select,
	.side_menu .widget.widget_text select,
	.side_menu .widget.widget_search form input[type="submit"],
	.side_menu #wp-calendar th, 
	.side_menu #wp-calendar td{
		color: <?php echo $qode_options_eden['side_area_text_color'];  ?>;
	}
<?php } ?>
<?php if (isset($qode_options_eden['side_area_title_color']) && !empty($qode_options_eden['side_area_title_color'])) { ?>
	.side_menu .side_menu_title h4,
	.side_menu .widget h4{
		color: <?php echo $qode_options_eden['side_area_title_color'];  ?>;
	}
<?php } ?>

<?php if (isset($qode_options_eden['blog_quote_link_box_color']) && !empty($qode_options_eden['blog_quote_link_box_color'])) { ?>
	.blog_holder article.format-link .post_text .post_text_holder,
	.blog_holder article.format-quote .post_text .post_text_holder{
		background-color: <?php echo $qode_options_eden['blog_quote_link_box_color'];  ?>;
	}
<?php } ?>

<?php
if(is_admin_bar_showing()){
?>

@media only screen and (min-width: 1000px){
	header.sticky.sticky_animate,
	header.fixed{
		padding-top: 32px !important;
	}

	header.sticky .qode_search_form,
	header.fixed .qode_search_form{
		top: 32px;
	}

	.side_menu{
		top: 32px;
	}
}

<?php
}
?>