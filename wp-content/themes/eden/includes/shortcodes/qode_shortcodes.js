(function() {
	tinymce.create('tinymce.plugins.qode_shortcodes', {
		init : function(ed, url) {

			ed.addButton('qode_shortcodes', {
				id : 'qode_shortcode_button',
				title : 'Qode Shortcodes',
				image : url+'/qode_shortcodes.ico',
				onclick : function() {

					jQuery("#qode_shortcode_form_wrapper").remove();

					var shortcodes_visible = jQuery("#qode_shortcodes_menu_holder").length;

					if (shortcodes_visible){
						jQuery("#qode_shortcodes_menu_holder").remove();
					} else{

						var container_element = "";
						var id = jQuery(this).attr("id");

						if(jQuery('#qode_shortcode_button').length && !jQuery('#wp-wpb_tinymce_content-wrap').length){
							container_element = jQuery('#qode_shortcode_button').closest(".mce-toolbar-grp");
						} else if (jQuery("#"+id+"_toolbargroup").length){
							container_element = jQuery("#"+id+"_toolbargroup");
						} else if (jQuery('#wp-wpb_tinymce_content-wrap #qode_shortcode_button').length){
							container_element = jQuery('#wp-wpb_tinymce_content-wrap');
						}

						if(container_element != ""){
							container_element.append("<div id='qode_shortcodes_menu_holder'></div>");
						}

						jQuery('#qode_shortcodes_menu_holder').load(url + '/qode_shortcodes_popup.html#qode_shortodes_popup', function(){

							var y = 0;
							var x = 0;

							if(jQuery('#qode_shortcode_button button').length && !jQuery('#wp-wpb_tinymce_content-wrap').length){
								x = parseInt(jQuery("#qode_shortcode_button button").offset().left) - parseInt(jQuery("#adminmenuwrap").width()) + 10;
							} else if (jQuery("#content_qode_shortcodes").length){
								x = parseInt(jQuery("#content_qode_shortcodes").offset().left) - parseInt(jQuery("#adminmenuwrap").width()) + 10;
							} else if (jQuery('#wp-wpb_tinymce_content-wrap').length){
								y = 70;
								x = 0;
							}
						jQuery("#qode_shortcodes_menu_holder").css({top: y, left: x});
						
						jQuery("#SC_1-2x1-2").click(function(){
							var shortcode = "[vc_row][vc_column width='1/2'][/vc_column][vc_column width='1/2'][/vc_column][/vc_row]";
							ed.execCommand('mceInsertContent', false, shortcode); 
							jQuery("#qode_shortcodes_menu_holder").remove();                           
						})
						
						jQuery("#SC_1-3x2-3").click(function(){
							var shortcode = "[vc_row][vc_column width='1/3'][/vc_column][vc_column width='2/3'][/vc_column][/vc_row]";
							ed.execCommand('mceInsertContent', false, shortcode);  
							jQuery("#qode_shortcodes_menu_holder").remove();                           
						})
						
						jQuery("#SC_2-3x1-3").click(function(){
							var shortcode = "[vc_row][vc_column width='2/3'][/vc_column][vc_column width='1/3'][/vc_column][/vc_row]";
							ed.execCommand('mceInsertContent', false, shortcode);  
							jQuery("#qode_shortcodes_menu_holder").remove();                           
						})
						
						jQuery("#SC_1-3x1-3x1-3").click(function(){
							var shortcode = "[vc_row][vc_column width='1/3'][/vc_column][vc_column width='1/3'][/vc_column][vc_column width='1/3'][/vc_column][/vc_row]";
							ed.execCommand('mceInsertContent', false, shortcode);  
							jQuery("#qode_shortcodes_menu_holder").remove();                           
						})
						
						jQuery("#SC_1-4x1-4x1-4x1-4").click(function(){
							var shortcode = "[vc_row][vc_column width='1/4'][/vc_column][vc_column width='1/4'][/vc_column][vc_column width='1/4'][/vc_column][vc_column width='1/4'][/vc_column][/vc_row]";
							ed.execCommand('mceInsertContent', false, shortcode);   
							jQuery("#qode_shortcodes_menu_holder").remove();                          
						})
						
						jQuery("#SC_1-4x3-4").click(function(){
							var shortcode = "[vc_row][vc_column width='1/4'][/vc_column][vc_column width='3/4'][/vc_column][/vc_row]";
							ed.execCommand('mceInsertContent', false, shortcode);  
							jQuery("#qode_shortcodes_menu_holder").remove();                           
						})
						
						jQuery("#SC_3-4x1-4").click(function(){
							var shortcode = "[vc_row][vc_column width='3/4'][/vc_column][vc_column width='1/4'][/vc_column][/vc_row]";
							ed.execCommand('mceInsertContent', false, shortcode);  
							jQuery("#qode_shortcodes_menu_holder").remove();                           
						})
						
						jQuery("#SC_1-4x1-2x1-4").click(function(){
							var shortcode = "[vc_row][vc_column width='1/4'][/vc_column][vc_column width='1/2'][/vc_column][vc_column width='1/4'][/vc_column][/vc_row]";
							ed.execCommand('mceInsertContent', false, shortcode);  
							jQuery("#qode_shortcodes_menu_holder").remove();                           
						})
						
						jQuery("#SC_5-6x1-6").click(function(){
							var shortcode = "[vc_row][vc_column width='5/6'][/vc_column][vc_column width='1/6'][/vc_column][/vc_row]";
							ed.execCommand('mceInsertContent', false, shortcode);  
							jQuery("#qode_shortcodes_menu_holder").remove();                           
						})
						
						jQuery("#SC_1-6x5-6").click(function(){
							var shortcode = "[vc_row][vc_column width='1/6'][/vc_column][vc_column width='5/6'][/vc_column][/vc_row]";
							ed.execCommand('mceInsertContent', false, shortcode);  
							jQuery("#qode_shortcodes_menu_holder").remove();                           
						})
						
						jQuery("#SC_1-6x1-6x1-6x1-6x1-6x1-6").click(function(){
							var shortcode = "[vc_row][vc_column width='1/6'][/vc_column][vc_column width='1/6'][/vc_column][vc_column width='1/6'][/vc_column][vc_column width='1/6'][/vc_column][vc_column width='1/6'][/vc_column][vc_column width='1/6'][/vc_column][/vc_row]";
							ed.execCommand('mceInsertContent', false, shortcode);  
							jQuery("#qode_shortcodes_menu_holder").remove();                           
						})
						
						jQuery("#SC_1-6x2-3x1-6").click(function(){
							var shortcode = "[vc_row][vc_column width='1/6'][/vc_column][vc_column width='2/3'][/vc_column][vc_column width='1/6'][/vc_column][/vc_row]";
							ed.execCommand('mceInsertContent', false, shortcode);  
							jQuery("#qode_shortcodes_menu_holder").remove();                           
						})
						
						jQuery("#SC_1-6x1-6x1-6x1-2").click(function(){
							var shortcode = "[vc_row][vc_column width='1/6'][/vc_column][vc_column width='1/6'][/vc_column][vc_column width='1/6'][/vc_column][vc_column width='1/2'][/vc_column][/vc_row]";
							ed.execCommand('mceInsertContent', false, shortcode);  
							jQuery("#qode_shortcodes_menu_holder").remove();                           
						})
						
						jQuery("#SC_custom_font").click(function(){
							var shortcode = "[custom_font font_family='Open Sans' font_size='19' line_height='26' font_style='none' text_align='left' font_weight='300' color='' background_color='' text_decoration='none' text_shadow='no' padding='0px' margin='0px']content content content[/custom_font]";
							ed.execCommand('mceInsertContent', false, shortcode);   
							jQuery("#qode_shortcodes_menu_holder").remove();                          
						})

						jQuery("#SC_ordered-list").click(function(){
							var shortcode = "[ordered_list]<ol><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ol>[/ordered_list] "
							ed.execCommand('mceInsertContent', false, shortcode);   
							jQuery("#qode_shortcodes_menu_holder").remove();                          
						})

						jQuery("#SC_parallax").click(function(){
							var shortcode = '[vc_row row_type="parallax" type="full_width" text_align="left" background_image="6880" section_height="500"][vc_column width="1/1"]Enter You content here[/vc_column][/vc_row]';
							ed.execCommand('mceInsertContent', false, shortcode);   
							jQuery("#qode_shortcodes_menu_holder").remove();                          
						})
						
						jQuery("#SC_social_share").click(function(){
							var shortcode = "[social_share]";
							ed.execCommand('mceInsertContent', false, shortcode);   
							jQuery("#qode_shortcodes_menu_holder").remove();                          
						})		
						
						////////////////////////////////
						// pop-up shortcodes          //
						////////////////////////////////
						var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 120;
						
						jQuery("#SC_accordion").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_accordion.php", function(data){
							    var form = jQuery(data);
							    form.appendTo('body').hide();
								colorPicker();
							    tb_show( 'Accordion Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							    jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
								    var style = jQuery('#TB_window #style option:selected').val();
								    var title_color = jQuery('#TB_window #title_color').val();
								    var icon = jQuery('#TB_window #icon option:selected').val();
									var icon_color = jQuery('#TB_window #icon_color').val();
									var background_color = jQuery('#TB_window #background_color').val();
								    var shortcode = "[vc_accordion style='"+style+"'][vc_accordion_tab title='Section 1' title_color='"+title_color+"' icon='"+icon+"' icon_color='"+icon_color+"' background_color='"+background_color+"']Enter You content here[/vc_accordion_tab][vc_accordion_tab title='Section 2' title_color='"+title_color+"' icon='"+icon+"' icon_color='"+icon_color+"' background_color='"+background_color+"']Enter You content here[/vc_accordion_tab][/vc_accordion]";
									jQuery("#qode_shortcode_form_wrapper").remove()
								    ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
								    return false;
							   });							
							});
							jQuery("#qode_shortcodes_menu_holder").remove();                         
						})

						jQuery("#SC_action").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_action.php", function(data){
							    var form = jQuery(data);
							    form.appendTo('body').hide();
								colorPicker();
							    tb_show( 'Call to Action Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							    jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
								    var type = jQuery('#TB_window #type option:selected').val();
								    var icon = jQuery('#TB_window #icon option:selected').val();
								    var icon_size = jQuery('#TB_window #icon_size option:selected').val();
									var icon_color = jQuery('#TB_window #icon_color').val();
									var custom_icon = jQuery('#TB_window #custom_icon').val();
									var text_left_padding = jQuery('#TB_window #text_left_padding').val();
									var background_color = jQuery('#TB_window #background_color').val();
									var border_color = jQuery('#TB_window #border_color').val();
									var show_button = jQuery('#TB_window #show_button option:selected').val();
									var button_text = jQuery('#TB_window #button_text').val();
									var button_position = jQuery('#TB_window #button_position option:selected').val();
									var button_link = jQuery('#TB_window #button_link').val();
									var button_target = jQuery('#TB_window #button_target option:selected').val();
									var button_text_color = jQuery('#TB_window #button_text_color').val();
									var button_background_color = jQuery('#TB_window #button_background_color').val();
									var button_border_color = jQuery('#TB_window #button_border_color').val();
									var button_icon = jQuery('#TB_window #button_icon option:selected').val();
								    var shortcode = "[action type='"+type+"' icon='"+icon+"' icon_size='"+icon_size+"' icon_color='"+icon_color+"' custom_icon='"+custom_icon+"' text_left_padding='"+text_left_padding+"' background_color='"+background_color+"' border_color='"+border_color+"' show_button='"+show_button+"' button_text='"+button_text+"' button_position='"+button_position+"' button_link='"+button_link+"' button_target='"+button_target+"' button_text_color='"+button_text_color+"' button_background_color='"+button_background_color+"' button_border_color='"+button_border_color+"' button_icon='"+button_icon+"']<br /><br /> content content content <br /><br />[/action]";
									jQuery("#qode_shortcode_form_wrapper").remove()
								    ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
								    return false;
							   });							
							});
							jQuery("#qode_shortcodes_menu_holder").remove();                         
						})

						jQuery("#SC_blockquotes").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_blockquotes.php", function(data){
							    var form = jQuery(data);
							    form.appendTo('body').hide();
                                colorPicker();
							    tb_show( 'Blockquote Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							    jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
									var text = jQuery('#TB_window #text').val();
									var text_color = jQuery('#TB_window #text_color').val();
									var width = jQuery('#TB_window #width').val();
									var line_height = jQuery().val('#TB_window #line_height').val();
									var background_color = jQuery('#TB_window #background_color').val();
									var border_color = jQuery('#TB_window #border_color').val();
                                    var show_quote_icon = jQuery('#TB_window #show_quote_icon option:selected').val();
									var quote_icon_color = jQuery('#TB_window #quote_icon_color').val();
									var shortcode = "[blockquote text='"+text+"' text_color='"+text_color+"' width='"+width+"' line_height='"+line_height+"' background_color='"+background_color+"' border_color='"+border_color+"' show_quote_icon='"+show_quote_icon+"' quote_icon_color='"+quote_icon_color+"']";
									jQuery("#qode_shortcode_form_wrapper").remove()
									ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
									return false;
							    });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})

						jQuery("#SC_button").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_button.php", function(data){
							    var form = jQuery(data);
							    form.appendTo('body').hide();
								colorPicker();
							    tb_show( 'Button Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							    jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
							    	var type = jQuery('#TB_window #type option:selected').val();
								    var size = jQuery('#TB_window #size option:selected').val();
								    var text = jQuery('#TB_window #text').val();
								    var icon = jQuery('#TB_window #icon option:selected').val();
								    var icon_color = jQuery('#TB_window #icon_color').val();
								    var link = jQuery('#TB_window #link').val();
								    var target = jQuery('#TB_window #target option:selected').val();
								    var border_color = jQuery('#TB_window #border_color').val();
								    var color = jQuery('#TB_window #color').val();
								    var background_color = jQuery('#TB_window #background_color').val();
								    var font_style = jQuery('#TB_window #font_style option:selected').val();
								    var font_weight = jQuery('#TB_window #font_weight option:selected').val();
								    var text_align = jQuery('#TB_window #text_align option:selected').val();
									var margin = jQuery('#TB_window #margin').val();
								    var shortcode = "[button type='"+type+"' size='"+size+"' text='"+text+"' icon='"+icon+"' icon_color='"+icon_color+"' link='"+link+"' target='"+target+"' color='"+color+"' background_color='"+background_color+"' border_color='"+border_color+"' font_style='"+font_style+"' font_weight='"+font_weight+"' text_align='"+text_align+"' margin='"+margin+"']";
								    jQuery("#qode_shortcode_form_wrapper").remove()
								    ed.execCommand('mceInsertContent', false, shortcode);	
								    tb_remove();
								    return false;
							    });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})	

						jQuery("#SC_counter").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_counter.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
							   tb_show( 'Counter Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
							   	   var type = jQuery('#TB_window #type option:selected').val();
							   	   var box = jQuery('#TB_window #box option:selected').val();
                                   var box_border_color = jQuery('#TB_window #box_border_color').val();
							   	   var position = jQuery('#TB_window #position option:selected').val();
								   var digit = jQuery('#TB_window #digit').val();
								   var font_size = jQuery('#TB_window #font_size').val();
								   var font_color = jQuery('#TB_window #font_color').val();
								   var text = jQuery('#TB_window #text').val();
								   var text_size = jQuery('#TB_window #text_size').val();
                                   var text_color = jQuery('#TB_window #text_color').val();
                                   var separator = jQuery('#TB_window #separator option:selected').val();
                                   var separator_color = jQuery('#TB_window #separator_color').val();
								   var shortcode = "[counter type='"+type+"' box='"+box+"' box_border_color='"+box_border_color+"' position='"+position+"' digit='"+digit+"' font_size='"+font_size+"' font_color='"+font_color+" text='"+text+"' text_color='"+text_color+"' separator='"+separator+"' separator_color='"+separator_color+"']<p>Content content content</p>[/counter]";
								   jQuery("#qode_shortcode_form_wrapper").remove()
								   ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
								   return false;
							   });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})

						jQuery("#SC_cover_boxes").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_cover_boxes.php", function(data){
							    var form = jQuery(data);
							    form.appendTo('body').hide();
								colorPicker();
							    tb_show( 'Cover Boxes Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							    jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
									var image1 = jQuery('#TB_window #image1').val();
									var title1 = jQuery('#TB_window #title1').val();
									var title_color1 = jQuery('#TB_window #title_color1').val();
									var text1 = jQuery('#TB_window #text1').val();
									var text_color1 = jQuery('#TB_window #text_color1').val();
									var link1 = jQuery('#TB_window #link1').val();
									var link_label1 = jQuery('#TB_window #link_label1').val();
								    var target1 = jQuery('#TB_window #target1 option:selected').val();
									var image2 = jQuery('#TB_window #image2').val();
									var title2 = jQuery('#TB_window #title2').val();
									var title_color2 = jQuery('#TB_window #title_color2').val();
									var text2 = jQuery('#TB_window #text2').val();
									var text_color2 = jQuery('#TB_window #text_color2').val();
									var link2 = jQuery('#TB_window #link2').val();
									var link_label2 = jQuery('#TB_window #link_label2').val();
								    var target2 = jQuery('#TB_window #target2 option:selected').val();
									var image3 = jQuery('#TB_window #image3').val();
									var title3 = jQuery('#TB_window #title3').val();
									var title_color3 = jQuery('#TB_window #title_color3').val();
									var text3 = jQuery('#TB_window #text3').val();
									var text_color3 = jQuery('#TB_window #text_color3').val();
									var link3 = jQuery('#TB_window #link3').val();
									var link_label3 = jQuery('#TB_window #link_label3').val();
								    var target3 = jQuery('#TB_window #target3 option:selected').val();
									
									var shortcode = "[cover_boxes image1='"+image1+"' title1='"+title1+"' title_color1='"+title_color1+"' text1='"+text1+"' text_color1='"+text_color1+"' link1='"+link1+"' link_label1='"+link_label1+"' target1='"+target1+"' image2='"+image2+"' title2='"+title2+"' title_color2='"+title_color2+"' text2='"+text2+"' text_color2='"+text_color2+"' link2='"+link2+"' link_label2='"+link_label2+"' target2='"+target2+"' image3='"+image3+"' title3='"+title3+"' title_color3='"+title_color3+"' text3='"+text3+"' text_color3='"+text_color3+"' link3='"+link3+"' link_label3='"+link_label3+"' target3='"+target3+"']";
									jQuery("#qode_shortcode_form_wrapper").remove()
									ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
									return false;
							   });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})

						jQuery("#SC_dropcaps").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_dropcaps.php", function(data){
							    var form = jQuery(data);
							    form.appendTo('body').hide();
								colorPicker();
							    tb_show( 'Dropcap Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							    jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
								   var type = jQuery('#TB_window #type option:selected').val();
								   var letter = jQuery('#TB_window #letter').val();
								   var color = jQuery('#TB_window #color').val();
								   var background_color = jQuery('#TB_window #background_color').val();
								   var border_color = jQuery('#TB_window #border_color').val();
								   var shortcode = "[dropcaps type='"+type+"' color='"+color+"' background_color='"+background_color+"' border_color='"+border_color+"']" + letter + "[/dropcaps]";
								   jQuery("#qode_shortcode_form_wrapper").remove()
								   ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
								   return false;
							    });							
							});
							jQuery("#qode_shortcodes_menu_holder").remove();                                      
						})

						jQuery("#SC_horizontal_progress").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_progress_bar_horizontal.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
								 colorPicker();
							   tb_show( 'Horizontal Progress Bar Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
							   	   var title = jQuery('#TB_window #title').val();
                                   var title_color = jQuery('#TB_window #title_color').val();
                                   var title_tag = jQuery('#TB_window #title_tag option:selected').val();
                                   var percent = jQuery('#TB_window #percent').val();
							   	   var percent_color = jQuery('#TB_window #percent_color').val();
							   	   var show_percent_mark = jQuery('#TB_window #show_percent_mark option:selected').val();
							   	   var active_background_color = jQuery('#TB_window #active_background_color').val();
							   	   var noactive_background_color = jQuery('#TB_window #noactive_background_color').val();
							   	   var height = jQuery('#TB_window #height').val();
								   var shortcode = "[progress_bar title='"+title+"' title_color='"+title_color+"' title_tag='"+title_tag+"' percent='"+percent+"' percent_color='"+percent_color+"' show_percent_mark='"+show_percent_mark+"' active_background_color='"+active_background_color+"' noactive_background_color='"+noactive_background_color+"' height='"+height+"']";
								   jQuery("#qode_shortcode_form_wrapper").remove()
								   ed.execCommand('mceInsertContent', false, shortcode);
								   tb_remove();
								   return false;
							   });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                          
						})

						jQuery("#SC_qode_carousel").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_qode_carousel.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
                               colorPicker();
							   tb_show( 'Qode Carousel Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
								   var carousel = jQuery('#TB_window #carousel').val();
								   var order_by = jQuery('#TB_window #order_by option:selected').val();
								   var order = jQuery('#TB_window #order option:selected').val();
								   var control_style = jQuery('#TB_window #control_style option:selected').val();                         
								   var shortcode = "[qode_carousel carousel='"+carousel+"' order_by='"+order_by+"' order='"+order+"' control_style='"+control_style+"']";
								   jQuery("#qode_shortcode_form_wrapper").remove()
								   ed.execCommand('mceInsertContent', false, shortcode);
								   tb_remove();
								   return false;
					    		});							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})

						jQuery("#SC_icon").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_icons.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
                               colorPicker();
							   tb_show( 'Icon Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
								   var size = jQuery('#TB_window #size option:selected').val();
								   var custom_size = jQuery('#TB_window #custom_size').val();
								   var icon = jQuery('#TB_window #icon option:selected').val();
								   var type = jQuery('#TB_window #type option:selected').val();
								   var position = jQuery('#TB_window #position option:selected').val();
								   var border_color = jQuery('#TB_window #border_color').val();
								   var icon_color = jQuery('#TB_window #icon_color').val();
                                   var background_color = jQuery('#TB_window #background_color').val();
                                   var margin = jQuery('#TB_window #margin').val();
                                   var icon_animation = jQuery('#TB_window #icon_animation option:selected').val();
                                    var icon_animation_delay = jQuery('#TB_window #icon_animation_delay').val();
                                   var link = jQuery('#TB_window #link').val();
                                   var target = jQuery('#TB_window #target option:selected').val();
								   var shortcode = "[icons size='"+size+"' custom_size='"+custom_size+"' icon='"+icon+"' type='"+type+"' position='"+position+"' border='"+border+"' border_color='"+border_color+"' icon_color='"+icon_color+"' background_color='"+background_color+"' margin='"+margin+"' icon_animation='"+icon_animation+"' icon_animation_delay='"+icon_animation_delay+"' link='"+link+"' target='"+target+"']";
								   jQuery("#qode_shortcode_form_wrapper").remove()
								   ed.execCommand('mceInsertContent', false, shortcode);
								   tb_remove();
								   return false;
					    		});							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})

                        jQuery("#SC_icon_text").click(function() {
                            jQuery("#qode_shortcode_form_wrapper").remove();
                            jQuery.get(url + "/qode_shortcodes_icons_text.php", function(data) {
                                var form = jQuery(data);
                                form.appendTo('body').hide();
                                colorPicker();
                                tb_show('Icon Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper');
                                jQuery('#TB_window #qode_insert_shortcode_button').click(function() {
                                    var icon = jQuery('#TB_window #icon option:selected').val();
                                    var image = jQuery('#TB_window #image').val();
                                    var icon_size = jQuery('#TB_window #icon_size option:selected').val();
                                    var custom_icon_size = jQuery('#TB_window #custom_icon_size').val();
                                    var icon_animation = jQuery('#TB_window #icon_animation option:selected').val();
                                    var icon_animation_delay = jQuery('#TB_window #icon_animation_delay').val();
                                    var icon_type = jQuery('#TB_window #icon_type option:selected').val();
                                    var icon_position = jQuery('#TB_window #icon_position option:selected').val();
                                    var icon_margin = jQuery('#TB_window #icon_margin').val();
                                    var icon_border = jQuery('#TB_window #icon_border option:selected').val();
                                    var icon_border_color = jQuery('#TB_window #icon_border_color').val();
                                    var icon_color = jQuery('#TB_window #icon_color').val();
                                    var icon_background_color = jQuery('#TB_window #icon_background_color').val();

                                    var box_type = jQuery('#TB_window #box_type').val();
                                    var box_border_color = jQuery('#TB_window #box_border_color').val();
                                    var box_border = jQuery('#TB_window #box_border option:selected').val();
                                    var box_background_color = jQuery('#TB_window #box_background_color').val();

                                    var title = jQuery('#TB_window #title').val();
                                    var title_tag = jQuery('#TB_window #title_tag option:selected').val();
                                    var title_color = jQuery('#TB_window #title_color').val();
                                    var text = jQuery('#TB_window #text').val();
                                    var text_color = jQuery('#TB_window #text_color').val();

                                    var link = jQuery('#TB_window #link').val();
                                    var link_color = jQuery('#TB_window #link_color').val();
                                    var target = jQuery('#TB_window #target option:selected').val();

                                    var shortcode = "[icon_text box_type='"+box_type+"' box_border='"+box_border+"' box_border_color='"+box_border_color+"' box_background_color='"+box_background_color+"' icon='"+icon+"' icon_type='"+icon_type+"' icon_size='"+icon_size+"' custom_icon_size='"+custom_icon_size+"' icon_animation='"+icon_animation+"' icon_animation_delay='"+icon_animation_delay+"' image='"+image+"'  icon_position='"+icon_position+"' icon_margin='"+icon_margin+"' icon_border='"+icon_border+"' icon_border_color='"+icon_border_color+"' icon_color='"+icon_color+"'  icon_background_color='"+icon_background_color+"'  title='"+title+"' title_tag='"+title_tag+"' title_color='"+title_color+"' text='"+text+"' text_color='"+text_color+"' link='"+link+"' link_color='"+link_color+"' target='"+target+"']";
                                    jQuery("#qode_shortcode_form_wrapper").remove()
                                    ed.execCommand('mceInsertContent', false, shortcode);
                                    tb_remove();
                                    return false;
                                });
                            });
                            jQuery("#qode_shortcodes_menu_holder").remove();
                        });

						jQuery("#SC_icon_list_text").click(function() {
                            jQuery("#qode_shortcode_form_wrapper").remove();
                            jQuery.get(url + "/qode_shortcodes_icons_list_text.php", function(data) {
                                var form = jQuery(data);
                                form.appendTo('body').hide();
                                colorPicker();
                                tb_show('Icon List With Text Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper');
                                jQuery('#TB_window #qode_insert_shortcode_button').click(function() {
                                    var type = jQuery('#TB_window #type option:selected').val();
                                    var image = jQuery('#TB_window #image').val();
                                    var icon_size = jQuery('#TB_window #icon_size option:selected').val();
                                    var custom_icon_size = jQuery('#TB_window #custom_icon_size').val();
                                    var icon_animation = jQuery('#TB_window #icon_animation option:selected').val();
                                    var icon_animation_delay = jQuery('#TB_window #icon_animation_delay').val();
                                    var icon_type = jQuery('#TB_window #icon_type option:selected').val();
                                    var icon_position = jQuery('#TB_window #icon_position option:selected').val();
                                    var icon_margin = jQuery('#TB_window #icon_margin').val();
                                    var icon_border = jQuery('#TB_window #icon_border option:selected').val();
                                    var icon_border_color = jQuery('#TB_window #icon_border_color').val();
                                    var icon_color = jQuery('#TB_window #icon_color').val();
                                    var icon_background_color = jQuery('#TB_window #icon_background_color').val();

                                    var box_type = jQuery('#TB_window #box_type').val();
                                    var box_border_color = jQuery('#TB_window #box_border_color').val();
                                    var box_border = jQuery('#TB_window #box_border option:selected').val();
                                    var box_background_color = jQuery('#TB_window #box_background_color').val();

                                    var title = jQuery('#TB_window #title').val();
                                    var title_tag = jQuery('#TB_window #title_tag option:selected').val();
                                    var title_color = jQuery('#TB_window #title_color').val();
                                    var text = jQuery('#TB_window #text').val();
                                    var text_color = jQuery('#TB_window #text_color').val();

                                    var link = jQuery('#TB_window #link').val();
                                    var link_color = jQuery('#TB_window #link_color').val();
                                    var target = jQuery('#TB_window #target option:selected').val();

                                    var shortcode = "[icon_text box_type='"+box_type+"' box_border='"+box_border+"' box_border_color='"+box_border_color+"' box_background_color='"+box_background_color+"' icon='"+icon+"' icon_type='"+icon_type+"' icon_size='"+icon_size+"' custom_icon_size='"+custom_icon_size+"' icon_animation='"+icon_animation+"' icon_animation_delay='"+icon_animation_delay+"' image='"+image+"'  icon_position='"+icon_position+"' icon_margin='"+icon_margin+"' icon_border='"+icon_border+"' icon_border_color='"+icon_border_color+"' icon_color='"+icon_color+"'  icon_background_color='"+icon_background_color+"'  title='"+title+"' title_tag='"+title_tag+"' title_color='"+title_color+"' text='"+text+"' text_color='"+text_color+"' link='"+link+"' link_color='"+link_color+"' target='"+target+"']";
                                    jQuery("#qode_shortcode_form_wrapper").remove()
                                    ed.execCommand('mceInsertContent', false, shortcode);
                                    tb_remove();
                                    return false;
                                });
                            });
                            jQuery("#qode_shortcodes_menu_holder").remove();
                        });

						jQuery("#SC_icon_progress").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_progress_bar_icon.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
							   colorPicker();
							   tb_show( 'Icon Progress Bar Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
								   var icons_number = jQuery('#TB_window #icons_number').val();
								   var active_number = jQuery('#TB_window #active_number').val();
								   var type = jQuery('#TB_window #type option:selected').val();
								   var icon = jQuery('#TB_window #icon option:selected').val();
								   var size = jQuery('#TB_window #size option:selected').val();
								   var custom_size = jQuery('#TB_window #custom_size').val();
								   var icon_color = jQuery('#TB_window #icon_color').val();
								   var icon_active_color = jQuery('#TB_window #icon_active_color').val();
								   var background_color = jQuery('#TB_window #background_color').val();
								   var background_active_color = jQuery('#TB_window #background_active_color').val();
								   var border_color = jQuery('#TB_window #border_color').val();
								   var border_active_color = jQuery('#TB_window #border_active_color').val();
								   var shortcode = "[progress_bar_icon icons_number='"+icons_number+"' active_number='"+active_number+"' type='"+type+"' icon='"+icon+"' size='"+size+"' custom_size='"+custom_size+"' icon_color='"+icon_color+"' icon_active_color='"+icon_active_color+"' background_color='"+background_color+"' background_active_color='"+background_active_color+"' border_color='"+border_color+"' border_active_color='"+border_active_color+"']";
								   jQuery("#qode_shortcode_form_wrapper").remove()
								   ed.execCommand('mceInsertContent', false, shortcode);
								   tb_remove();
								   return false;
							   });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                          
						})

						jQuery("#SC_latest_post").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_latest_post.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
							   tb_show( 'Latest Posts Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
								   var type = jQuery('#TB_window #type option:selected').val();
								   var number_of_posts = jQuery('#TB_window #number_of_posts').val();
								   var number_of_colums = jQuery('#TB_window #number_of_colums option:selected').val();
								   var order_by = jQuery('#TB_window #order_by option:selected').val();
								   var order = jQuery('#TB_window #order option:selected').val();
								   var category = jQuery('#TB_window #category').val();
								   var text_length = jQuery('#TB_window #text_length').val();
                                   var title_tag = jQuery('#TB_window #title_tag option:selected').val();
								   var display_category = jQuery('#TB_window #display_category option:selected').val();
								   var display_like = jQuery('#TB_window #display_like option:selected').val();
								   var display_share = jQuery('#TB_window #display_share option:selected').val();
								   var display_comments = jQuery('#TB_window #display_comments option:selected').val();
								   var display_time = jQuery('#TB_window #display_time option:selected').val();
								   var shortcode = "[latest_post type='"+type+"' number_of_posts='"+number_of_posts+"' number_of_colums='"+number_of_colums+"' order_by='"+order_by+"' order='"+order+"' category='"+category+"' text_length='"+text_length+"' title_tag='"+title_tag+"' display_category='"+display_category+"' display_time='"+display_time+"' display_comments='"+display_comments+"' display_like='"+display_like+"' display_share='"+display_share+"']";
								   jQuery("#qode_shortcode_form_wrapper").remove()
								   ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
								   return false;
							   });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})

                        jQuery("#SC_line_graph").click(function() {
                            jQuery("#qode_shortcode_form_wrapper").remove();
                            jQuery.get(url + "/qode_shortcodes_line_graph.php", function(data) {
                                var form = jQuery(data);
                                form.appendTo('body').hide();
                                colorPicker();
                                tb_show('Line Graph Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper');
                                jQuery('#TB_window #qode_insert_shortcode_button').click(function() {
                                    var type = jQuery('#TB_window #type option:selected').val();
                                    var custom_color = jQuery('#TB_window #custom_color').val();
                                    if (jQuery('#TB_window #width').val() != "") {
                                        var width = "width='" + jQuery('#TB_window #width').val() + "'";
                                    } else {
                                        var width = "";
                                    }
                                    if (jQuery('#TB_window #height').val() != "") {
                                        var height = "height='" + jQuery('#TB_window #height').val() + "'";
                                    } else {
                                        var height = "";
                                    }
                                    if (jQuery('#TB_window #scaleSteps').val() != "") {
                                        var scaleSteps = "scale_steps='" + jQuery('#TB_window #scaleSteps').val() + "'";
                                    } else {
                                        var scaleSteps = "";
                                    }
                                    if (jQuery('#TB_window #scaleStepWidth').val() != "") {
                                        var scaleStepWidth = "scale_step_width='" + jQuery('#TB_window #scaleStepWidth').val() + "'";
                                    } else {
                                        var scaleStepWidth = "";
                                    }
                                    var shortcode = "[line_graph " + width + " " + height + " " + scaleSteps + " " + scaleStepWidth + " custom_color='" + custom_color + "' type='" + type + "' labels='Label 1, Label 2, Label 3']#00aeef,Legend One,1,5,10;#4cc6f4,Legend Two,3,7,20;#99dff9,Legend Three,10,2,34[/line_graph]";
                                    jQuery("#qode_shortcode_form_wrapper").remove()
                                    ed.execCommand('mceInsertContent', false, shortcode);
                                    tb_remove();
                                    return false;
                                });
                            });
                            jQuery("#qode_shortcodes_menu_holder").remove();
                        })

						jQuery("#SC_message").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_message.php", function(data){
							    var form = jQuery(data);
							    form.appendTo('body').hide();
								colorPicker();
							    tb_show( 'Message Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							    jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
									var type = jQuery('#TB_window #type option:selected').val();
									var background_color = jQuery('#TB_window #background_color').val();
                                    var border_color = jQuery('#TB_window #border_color').val();
									var icon = jQuery('#TB_window #icon option:selected').val();
									var icon_size = jQuery('#TB_window #icon_size option:selected').val();
									var icon_color = jQuery('#TB_window #icon_color').val();
									var icon_background_color = jQuery('#TB_window #icon_background_color').val();
									var custom_icon = jQuery('#TB_window #custom_icon').val();
									var close_button_style = jQuery('#TB_window #close_button_style').val();
								    var shortcode = "[message type='"+type+"' icon='"+icon+"' icon_color='"+icon_color+"' icon_size='"+icon_size+"' icon_background_color='"+icon_background_color+"' custom_icon='"+custom_icon+"' background_color='"+background_color+"' border_color='"+border_color+"' close_button_style='"+close_button_style+"']<h4>Message Title</h4>[/message]";
								    jQuery("#qode_shortcode_form_wrapper").remove()
								    ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
								    return false;
							    });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})

						jQuery("#SC_pie_chart").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_pie_chart.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
                               colorPicker();
							   tb_show( 'Pie Chart Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
									var percentage = jQuery('#TB_window #percentage').val();
                                    var percentage_color = jQuery('#TB_window #percentage_color').val();
                                    var show_percent_mark = jQuery('#TB_window #show_percent_mark option:selected').val();
                                    var active_color = jQuery('#TB_window #active_color').val();
                                    var noactive_color = jQuery('#TB_window #noactive_color').val();
                                    var line_width = jQuery('#TB_window #line_width').val();
									var title = jQuery('#TB_window #title').val();
									var title_color = jQuery('#TB_window #title_color').val();
                                    var title_tag = jQuery('#TB_window #title_tag option:selected').val();
									var text = jQuery('#TB_window #text').val();
									var text_color = jQuery('#TB_window #text_color').val();
								    var shortcode = "[pie_chart percent='"+percentage+"' percentage_color='"+percentage_color+"' show_percent_mark='"+show_percent_mark+"' active_color='"+active_color+"' noactive_color='"+noactive_color+"' line_width='"+line_width+"' title='"+title+"' title_color='"+title_color+"' title_tag='"+title_tag+"' text='"+text+"' text_color='"+text_color+"']";
								    jQuery("#qode_shortcode_form_wrapper").remove()
								    ed.execCommand('mceInsertContent', false, shortcode);
								    tb_remove();
								    return false;
							   });							
							});                        
						})

						jQuery("#SC_pie_chart_with_icon").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_pie_chart_with_icon.php", function(data){
							    var form = jQuery(data);
							    form.appendTo('body').hide();
                                colorPicker();
							    tb_show( 'Pie Chart With Icon Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							    jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
									var percentage = jQuery('#TB_window #percentage').val();
                                    var active_color = jQuery('#TB_window #active_color').val();
                                    var noactive_color = jQuery('#TB_window #noactive_color').val();
                                    var line_width = jQuery('#TB_window #line_width').val();
                                    var icon = jQuery('#TB_window #icon option:selected').val();
                                    var icon_size = jQuery('#TB_window #icon_size option:selected').val();
									var icon_color = jQuery('#TB_window #icon_color').val();
									var title = jQuery('#TB_window #title').val();
									var title_color = jQuery('#TB_window #title_color').val();
                                    var title_tag = jQuery('#TB_window #title_tag option:selected').val();
									var text = jQuery('#TB_window #text').val();
									var text_color = jQuery('#TB_window #text_color').val();
								    var shortcode = "[pie_chart percent='"+percentage+"' active_color='"+active_color+"' noactive_color='"+noactive_color+"' line_width='"+line_width+"' icon='"+icon+"' icon_size='"+icon_size+"' icon_color='"+icon_color+"' title='"+title+"' title_color='"+title_color+"' title_tag='"+title_tag+"' text='"+text+"' text_color='"+text_color+"']";
								    jQuery("#qode_shortcode_form_wrapper").remove()
								    ed.execCommand('mceInsertContent', false, shortcode);
								    tb_remove();
								    return false;
							    });							
							});                        
						})

						jQuery("#SC_pie_chart2").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_pie_chart2.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
                                                           colorPicker();
							   tb_show( 'Pie Chart 2 Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
									 if(jQuery('#TB_window #width').val() != ""){
										var width = "width='"+jQuery('#TB_window #width').val()+"'";
									 }else{ var width = ""; }
									 if(jQuery('#TB_window #height').val() != ""){
										var height = "height='"+jQuery('#TB_window #height').val()+"'";
									 }else{ var height = ""; }
									 var color = jQuery('#TB_window #color').val();
									 var shortcode = "[pie_chart2 "+width+" "+height+" color='"+color+"']15,#00aeef,Legend One; 35,#4cc6f4,Legend Two; 50,#99dff9,Legend Three[/pie_chart2]";
								   jQuery("#qode_shortcode_form_wrapper").remove()
								   ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
								   return false;
							   });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})
						
						jQuery("#SC_pie_chart3").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_pie_chart3.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
                               colorPicker();
							   tb_show( 'Pie Chart 3 Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
									 if(jQuery('#TB_window #width').val() != ""){
										var width = "width='"+jQuery('#TB_window #width').val()+"'";
									 }else{ var width = ""; }
									 if(jQuery('#TB_window #height').val() != ""){
										var height = "height='"+jQuery('#TB_window #height').val()+"'";
									 }else{ var height = ""; }
									 var color = jQuery('#TB_window #color').val();
									 var shortcode = "[pie_chart3 "+width+" "+height+" color='"+color+"']15,#00aeef,Legend One; 35,#4cc6f4,Legend Two; 50,#99dff9,Legend Three[/pie_chart3]";
								   jQuery("#qode_shortcode_form_wrapper").remove()
								   ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
								   return false;
							   });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})

						jQuery("#SC_portfolio_list").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_portfolio_list.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
							   tb_show( 'Portfolio List Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
									var filter = jQuery('#TB_window #filter option:selected').val();
									var lightbox = jQuery('#TB_window #lightbox option:selected').val();
									var type = jQuery('#TB_window #type option:selected').val();
									var columns = jQuery('#TB_window #columns option:selected').val();
									var order_by = jQuery('#TB_window #order_by option:selected').val();
									var order = jQuery('#TB_window #order option:selected').val();
									var number = jQuery('#TB_window #number').val();
									var category = jQuery('#TB_window #category').val();
									var selected_projects = jQuery('#TB_window #selected_projects').val();
									var show_load_more = jQuery('#TB_window #show_load_more option:selected').val();
                                    var title_tag = jQuery('#TB_window #title_tag option:selected').val();
									var shortcode = "[portfolio_list type='" + type + "' columns='"+columns+"' order_by='"+order_by+"' order='"+order+"' number='"+number+"' category='"+category+"' selected_projects='"+selected_projects+"' filter='"+filter+"' lightbox='"+lightbox+"' show_load_more='" + show_load_more +"' title_tag='"+title_tag+"']";
									jQuery("#qode_shortcode_form_wrapper").remove()
									ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
									return false;
							   });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})

						jQuery("#SC_portfolio_slider").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_portfolio_slider.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
							   tb_show( 'Portfolio Slider Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
									var lightbox = jQuery('#TB_window #lightbox option:selected').val();
									var order_by = jQuery('#TB_window #order_by option:selected').val();
									var order = jQuery('#TB_window #order option:selected').val();
									var number = jQuery('#TB_window #number').val();
									var category = jQuery('#TB_window #category').val();
									var selected_projects = jQuery('#TB_window #selected_projects').val();
                                    var title_tag = jQuery('#TB_window #title_tag option:selected').val();
									var shortcode = "[portfolio_slider order_by='"+order_by+"' order='"+order+"' number='"+number+"' category='"+category+"' selected_projects='"+selected_projects+"' lightbox='"+lightbox+"' title_tag='"+title_tag+"']";
									jQuery("#qode_shortcode_form_wrapper").remove()
									ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
									return false;
							   });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})

						jQuery("#SC_pricing_table").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_pricing_table.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
							   tb_show( 'Pricing Table Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
									var title = jQuery('#TB_window #title').val();
									var subtitle = jQuery('#TB_window #subtitle').val();
									var price = jQuery('#TB_window #price').val();
									var currency = jQuery('#TB_window #currency').val();
									var price_period = jQuery('#TB_window #price_period').val();
									var button_text = jQuery('#TB_window #button_text').val();
									var link = jQuery('#TB_window #link').val();
									var target = jQuery('#TB_window #target option:selected').val();
									var button_text2 = jQuery('#TB_window #button_text2').val();
									var link2 = jQuery('#TB_window #link2').val();
									var target2 = jQuery('#TB_window #target2 option:selected').val();
									var active = jQuery('#TB_window #active option:selected').val();
								    var shortcode = "[pricing_column title='"+title+"' subtitle='"+subtitle+"' price='"+price+"' currency='"+currency+"' price_period='"+price_period+"' link='"+link+"' target='"+target+"' button_text='"+button_text+"' link2='"+link2+"' target2='"+target2+"' button_text2='"+button_text2+"' active='"+active+"']<ul><li>content content content</li><li>content content content</li><li>content content content</li></ul>[/pricing_column]";
								    jQuery("#qode_shortcode_form_wrapper").remove()
								    ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
								    return false;
							   });							
							});                                
						})

						jQuery("#SC_separator").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_separator.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
								 colorPicker();
							   tb_show( 'Separator Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
                                    var type = jQuery('#TB_window #type option:selected').val();
                                    var position = jQuery('#TB_window #position option:selected').val();
                                    var color = jQuery('#TB_window #color').val();
									var thickness = jQuery('#TB_window #thickness').val();
									var top = jQuery('#TB_window #top').val();
									var bottom = jQuery('#TB_window #bottom').val();
									var shortcode = "[vc_separator type='"+type+"' position='"+position+"' color='"+color+"' thickness='"+thickness+"'  up='"+top+"' down='"+bottom+"']";
									jQuery("#qode_shortcode_form_wrapper").remove()
									ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
									return false;
							   });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})

						jQuery("#SC_social_icons").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_social_icon.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
							   colorPicker();
							   tb_show( 'Social Icon Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
							   		var type = jQuery('#TB_window #type option:selected').val();
							   		var icon = jQuery('#TB_window #icon option:selected').val();
							   		var size = jQuery('#TB_window #size option:selected').val();
							   		var link = jQuery('#TB_window #link').val();
							   		var target = jQuery('#TB_window #target option:selected').val();
							   		var icon_color = jQuery('#TB_window #icon_color').val();
							   		var top_gradient_background_color = jQuery('#TB_window #top_gradient_background_color').val();
							   		var bottom_gradient_background_color = jQuery('#TB_window #bottom_gradient_background_color').val();
							   		var border_color = jQuery('#TB_window #border_color').val();
								    var shortcode = "[social_icons type='"+type+"' icon='"+icon+"' size='"+size+"' link='"+link+"' target='"+target+"' icon_color='"+icon_color+"' top_gradient_background_color='"+top_gradient_background_color+"' bottom_gradient_background_color='"+bottom_gradient_background_color+"' top_gradient_background_color='"+top_gradient_background_color+"' border_color='"+border_color+"' /]";
									jQuery("#qode_shortcode_form_wrapper").remove()
								    ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
								    return false;
							   });							
							});  
						})

						jQuery("#SC_testimonials").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_testimonials.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
							   colorPicker();
							   tb_show( 'Testimonial Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
                                    var type = jQuery('#TB_window #type option:selected').val();
									var content_in_grid = jQuery('#TB_window #content_in_grid option:selected').val();
                                    var category = jQuery('#TB_window #category').val();
                                    var number = jQuery('#TB_window #number').val();
							   		var text_color = jQuery('#TB_window #text_color').val();
							   		var background_color = jQuery('#TB_window #background_color').val();
							   		var border_color = jQuery('#TB_window #border_color').val();
							   		var author_image = jQuery('#TB_window #author_image option:selected').val();
								    var shortcode = "[testimonials type='"+type+"'  content_in_grid='"+content_in_grid+"' category='"+category+"' number='"+number+"' text_color='"+text_color+"' background_color='"+background_color+"' border_color='"+border_color+"' author_image='"+author_image+"']";
						    		jQuery("#qode_shortcode_form_wrapper").remove()
								    ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
								    return false;
							   });							
							});                     
						})
                                                
                        jQuery("#SC_service").click(function(){
                            jQuery("#qode_shortcode_form_wrapper").remove();
                            jQuery.get(url + "/qode_shortcodes_service.php", function(data){
                               var form = jQuery(data);
                               form.appendTo('body').hide();
                               tb_show( 'Service shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
                               jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
                                    var type = jQuery('#TB_window #type option:selected').val();
                                    var title = jQuery('#TB_window #title').val();
                                    var color = jQuery('#TB_window #color').val();
                                    var link = jQuery('#TB_window #link').val();
                                    var target = jQuery('#TB_window #target').val();
                                    var shortcode = "[service type='"+type+"' title='"+title+"' color='"+color+"' link='"+link+"' target='"+target+"']<p>content content content</p>[/service]";
                                    jQuery("#qode_shortcode_form_wrapper").remove()
                                    ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
                                    return false;
                               });							
                            });  
                            jQuery("#qode_shortcodes_menu_holder").remove();                                    
                        });
                        
                        jQuery("#SC_service_with_animation").click(function(){
                                jQuery("#qode_shortcode_form_wrapper").remove();
                                jQuery.get(url + "/qode_shortcodes_services_with_animation.php", function(data){
                                   var form = jQuery(data);
                                   form.appendTo('body').hide();
                                   tb_show( 'Service shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
                                   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
                                           var type = jQuery('#TB_window #type option:selected').val();
                                           var position = jQuery('#TB_window #position option:selected').val();
                                           var size = jQuery('#TB_window #size').val();
                                           var link = jQuery('#TB_window #link').val();
                                           var target = jQuery('#TB_window #target option:selected').val();
                                           var text = jQuery('#TB_window #text').val();
                                           var icon_color = jQuery('#TB_window #icon_color option:selected').val();
                                           var icon = jQuery('#TB_window #icon option:selected').val();
                                           var background_color = jQuery('#TB_window #background_color').val();
                                           var animation_in = jQuery('#TB_window #animation_in option:selected').val();
                                           var hover = jQuery('#TB_window #hover option:selected').val();
                                           var shortcode = "[service_animate type='"+type+"' size='"+size+"' position='"+position+"' background_color='"+background_color+"' link='"+link+"' target='"+target+"' text='"+text+"' icon_color='"+icon_color+"' icon='"+icon+"' animation_in='"+animation_in+"' hover='"+hover+"']<h4>Title</h4><p>content content content</p>[/service_animate]";
                                           jQuery("#qode_shortcode_form_wrapper").remove()
                                           ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
                                           return false;
                                   });							
                                });  
                                jQuery("#qode_shortcodes_menu_holder").remove();                                    
                        });

						jQuery("#SC_unordered_list").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_unordered_list.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
							   tb_show( 'Unordered Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
								   var style = jQuery('#TB_window #style option:selected').val();
								   var number_type = jQuery('#TB_window #number_type').val();
								   var animate = jQuery('#TB_window #animate option:selected').val();
                                   var font_weight = jQuery('#TB_window #font_weight option:selected').val();
								   var shortcode = "[unordered_list style='" + style + "' number_type='"+number_type+"' animate='"+animate+"' font_weight='"+font_weight+"']<ul><li>Lorem ipsum</li><li>Lorem ipsum</li><li>Lorem ipsum</li></ul>[/unordered_list]";
								   jQuery("#qode_shortcode_form_wrapper").remove()
								   ed.execCommand('mceInsertContent', false, shortcode);
								   tb_remove();
								   return false;
							   });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})

						jQuery("#SC_video").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_video.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
							   tb_show( 'Video Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
								    var video_link = jQuery('#TB_window #video_link').val();
								    var shortcode = "[vc_video link='"+video_link+"']";
								    jQuery("#qode_shortcode_form_wrapper").remove()
								    ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
								    return false;
							   });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})
						
						jQuery("#SC_row").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_row.php", function(data){
							    var form = jQuery(data);
							    form.appendTo('body').hide();
								colorPicker();
							    tb_show( 'Row Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							    jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
									var css_animation = jQuery('#TB_window #css_animation option:selected').val();
									var text_align = jQuery('#TB_window #text_align option:selected').val();
									var shortcode = "[vc_row row_type='row' text_align='"+text_align+"' css_animation='"+css_animation+"'][vc_column width='1/1']<p>Enter content here</p>[/vc_column][/vc_row]";
									jQuery("#qode_shortcode_form_wrapper").remove()
									ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
									return false;
							   });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})
						
						jQuery("#SC_section").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_section.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
								 colorPicker();
							   tb_show( 'Section Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
									var type = jQuery('#TB_window #type option:selected').val();
									var text_align = jQuery('#TB_window #text_align option:selected').val();
									var row_type = jQuery('#TB_window #row_type option:selected').val();
									var video = jQuery('#TB_window #video').val();
									var video_overlay = jQuery('#TB_window #video_overlay').val();
									var video_webm = jQuery('#TB_window #video_webm').val();
									var video_mp4 = jQuery('#TB_window #video_mp4').val();
									var video_ogv = jQuery('#TB_window #video_ogv').val();
									var video_image = jQuery('#TB_window #video_image').val();
									var background_color = jQuery('#TB_window #background_color').val();
									var border_color = jQuery('#TB_window #border_color').val();
									var padding = jQuery('#TB_window #padding').val();
									var padding_top_bottom = jQuery('#TB_window #padding_top_bottom').val();
									var shortcode = "[vc_row row_type='section' type='"+type+"' text_align='"+text_align+"' video='"+video+"' video_overlay='"+video_overlay+"' video_webm='"+video_webm+"' video_mp4='"+video_mp4+"' video_ogv='"+video_ogv+"' video_image='"+video_image+"' background_color='"+background_color+"' border_color='"+border_color+"' padding='"+padding+"' padding_top_bottom='"+padding_top_bottom+"'][vc_column width='1/1'] <p>Enter content here</p> [/vc_column][/vc_row]";
									jQuery("#qode_shortcode_form_wrapper").remove()
									ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
									return false;
							   });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})
						
						jQuery("#SC_box").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_box.php", function(data){
							    var form = jQuery(data);
							    form.appendTo('body').hide();
								colorPicker();
							    tb_show( 'Box Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							    jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
									var text_align = jQuery('#TB_window #text_align option:selected').val();
									var background_color = jQuery('#TB_window #background_color').val();
									var border_color = jQuery('#TB_window #border_color').val();
									var shortcode = "[vc_row row_type='box' text_align='"+text_align+"' background_color='"+background_color+"' border_color='"+border_color+"'][vc_column width='1/1'] <p>Enter content here</p> [/vc_column][/vc_row]";
									jQuery("#qode_shortcode_form_wrapper").remove()
									ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
									return false;
							   });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})
						
						jQuery("#SC_expandable").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_expandable.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
								 colorPicker();
							   tb_show( 'Expandable Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
									var text_align = jQuery('#TB_window #text_align option:selected').val();
									var background_color = jQuery('#TB_window #background_color').val();
									var border_color = jQuery('#TB_window #border_color').val();
									var more_button_label = jQuery('#TB_window #more_button_label').val();
									var less_button_label = jQuery('#TB_window #less_button_label').val();
									var button_position = jQuery('#TB_window #button_position option:selected').val();
									var color = jQuery('#TB_window #color').val();
									var shortcode = "[vc_row row_type='expandable' text_align='"+text_align+"' background_color='"+background_color+"' border_color='"+border_color+"' more_button_label='"+more_button_label+"' less_button_label='"+less_button_label+"' button_position='"+button_position+"' color='"+color+"'][vc_column width='1/1']<p>Enter content here</p>[/vc_column][/vc_row]";
									jQuery("#qode_shortcode_form_wrapper").remove()
									ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
									return false;
							   });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})

						jQuery("#SC_image_with_text_over").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_image_with_text_over.php", function(data){
							    var form = jQuery(data);
							    form.appendTo('body').hide();
								colorPicker();
							    tb_show( 'Image With Text Over Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							    jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
							   		var width = jQuery('#TB_window #width option:selected').val();
									var image = jQuery('#TB_window #image').val();
									var icon = jQuery('#TB_window #icon option:selected').val();
									var icon_size = jQuery('#TB_window #icon_size option:selected').val();
									var icon_color = jQuery('#TB_window #icon_color').val();
									var title = jQuery('#TB_window #title').val();
									var title_color = jQuery('#TB_window #title_color').val();
                                    var title_size = jQuery('#TB_window #title_size').val();
                                    var title_tag = jQuery('#TB_window #title_tag option:selected').val();
									var shortcode = "[image_with_text_over width='"+width+"' image='"+image+"' icon='"+icon+"' icon_size='"+icon_size+"' icon_color='"+icon_color+"' title='"+title+"' title_color='"+title_color+"' title_size='"+title_size+"' title_tag='"+title_tag+"']<p>Enter text here</p>[/image_with_text_over]";
									jQuery("#qode_shortcode_form_wrapper").remove()
									ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
									return false;
							   });
							});
							jQuery("#qode_shortcodes_menu_holder").remove();                             
						})
                        
                        jQuery("#SC_image_hover").click(function() {
                            jQuery("#qode_shortcode_form_wrapper").remove();
                            jQuery.get(url + "/qode_shortcodes_image_hover.php", function(data) {
                                var form = jQuery(data);
                                form.appendTo('body').hide();
                                colorPicker();
                                tb_show('Image Hover Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper');
                                jQuery('#TB_window #qode_insert_shortcode_button').click(function() {
                                    var image = jQuery('#TB_window #image').val();
                                    var hover_image = jQuery('#TB_window #hover_image').val();
                                    var link = jQuery('#TB_window #link').val();
                                    var target = jQuery('#TB_window #target option:selected').val();
                                    var animation = jQuery('#TB_window #animation option:selected').val();
                                    var transition_delay = jQuery('#TB_window #animation transition_delay').val();;
                                    
                                    var shortcode = "[image_hover image='" + image + "' hover_image='" + hover_image + "' link='"+link+"' target='"+target+"' animation='"+animation+"' transition_delay='"+transition_delay+"']";
                                    jQuery("#qode_shortcode_form_wrapper").remove()
                                    ed.execCommand('mceInsertContent', false, shortcode);
                                    tb_remove();
                                    return false;
                                });
                            });
                            jQuery("#qode_shortcodes_menu_holder").remove();
                        });
						
						jQuery("#SC_icon_list_item").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_icon_list_item.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
								 colorPicker();
							   tb_show( 'Icon List Item Shosrtcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
									var icon = jQuery('#TB_window #icon option:selected').val();
									var icon_type = jQuery('#TB_window #icon_type option:selected').val();
									var icon_color = jQuery('#TB_window #icon_color').val();
									var icon_top_gradient_background_color = jQuery('#TB_window #icon_top_gradient_background_color').val();
									var icon_bottom_gradient_background_color = jQuery('#TB_window #icon_bottom_gradient_background_color').val();
									var icon_border_color = jQuery('#TB_window #icon_background_color').val();
									var title = jQuery('#TB_window #title').val();
									var title_color = jQuery('#TB_window #title_color').val();
									var title_size = jQuery('#TB_window #title_size').val();
									var shortcode = "[icon_list_item icon='"+icon+"' icon_type='"+icon_type+"' icon_color='"+icon_color+"' icon_top_gradient_background_color='"+icon_top_gradient_background_color+"' icon_border_color='"+icon_border_color+"' title='"+title+"' title_color='"+title_color+"' title_size='"+title_size+"']";
									jQuery("#qode_shortcode_form_wrapper").remove()
									ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
									return false;
							   });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})
						
						jQuery("#SC_highlights").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_highlights.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
								 colorPicker();
							   tb_show( 'Highlight Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
									var color = jQuery('#TB_window #color').val();
									var background_color = jQuery('#TB_window #background_color').val();
									var shortcode = "[highlight color='"+color+"' background_color='"+background_color+"']enter text here[/highlight]";
									jQuery("#qode_shortcode_form_wrapper").remove()
									ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
									return false;
							   });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})
						
						jQuery("#SC_tabs").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_tabs.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
								 colorPicker();
							   tb_show( 'Icon List Item Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
									var interval = jQuery('#TB_window #interval option:selected').val();
									var style = jQuery('#TB_window #style option:selected').val();
									var shortcode = "[vc_tabs interval='"+interval+"' style='"+style+"'][vc_tab title='Tab 1' tab_id='001'][/vc_tab][vc_tab title='Tab 2' tab_id='002'][/vc_tab][/vc_tabs]";
									jQuery("#qode_shortcode_form_wrapper").remove()
									ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
									return false;
							   });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						})
						
                        jQuery("#SC_steps").click(function() {
                            jQuery("#qode_shortcode_form_wrapper").remove();
                            jQuery.get(url + "/qode_shortcodes_steps.php", function(data) {
                                var form = jQuery(data);
                                form.appendTo('body').hide();
                                colorPicker();
                                tb_show('Steps Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper');
                                jQuery('#TB_window #qode_insert_shortcode_button').click(function() {
                                    var number_of_steps = jQuery('#TB_window #number_of_steps option:selected').val();
                                    var background_color = jQuery('#TB_window #background_color').val();
                                    var number_color = jQuery('#TB_window #number_color').val();
                                    var title_color = jQuery('#TB_window #title_color').val();
                                    var title_tag = jQuery('#TB_window #title_tag option:selected').val();
                                    var circle_wrapper_border_color = jQuery('#TB_window #circle_wrapper_border_color option:selected').val();

                                    var title_1 = jQuery('#TB_window #title_1').val();
                                    var step_number_1 = jQuery('#TB_window #step_number_1').val();
                                    var step_description_1 = jQuery('#TB_window #step_description_1').val();
                                    var step_link_1 = jQuery('#TB_window #step_link_1').val();
                                    var step_link_target_1 = jQuery('#TB_window #step_link_target_1 option:selected').val();

                                    var title_2 = jQuery('#TB_window #title_2').val();
                                    var step_number_2 = jQuery('#TB_window #step_number_2').val();
                                    var step_description_2 = jQuery('#TB_window #step_description_2').val();
                                    var step_link_2 = jQuery('#TB_window #step_link_2').val();
                                    var step_link_target_2 = jQuery('#TB_window #step_link_target_2 option:selected').val();

                                    var title_3 = jQuery('#TB_window #title_3').val();
                                    var step_number_3 = jQuery('#TB_window #step_number_3').val();
                                    var step_description_3 = jQuery('#TB_window #step_description_3').val();
                                    var step_link_3 = jQuery('#TB_window #step_link_3').val();
                                    var step_link_target_3 = jQuery('#TB_window #step_link_target_3 option:selected').val();

                                    var title_4 = jQuery('#TB_window #title_4').val();
                                    var step_number_4 = jQuery('#TB_window #step_number_4').val();
                                    var step_description_4 = jQuery('#TB_window #step_description_4').val();
                                    var step_link_4 = jQuery('#TB_window #step_link_4').val();
                                    var step_link_target_4 = jQuery('#TB_window #step_link_target_4 option:selected').val();

                                    //add general params
                                    var shortcode = "[steps number_of_steps='"+number_of_steps+"' background_color='"+background_color+"' number_color='"+number_color+"' title_color='"+title_color+"' title_tag='"+title_tag+"' circle_wrapper_border_color='"+circle_wrapper_border_color+"'";

                                    //add first step params
                                    shortcode += "title_1='"+title_1+"' step_number_1='"+step_number_1+"' step_description_1='"+step_description_1+"' step_link_1='"+step_link_1+"' step_link_target_1='"+step_link_target_1+"' ";

                                    //add second step params
                                    shortcode += "title_2='"+title_2+"' step_number_2='"+step_number_2+"' step_description_2='"+step_description_2+"' step_link_2='"+step_link_2+"' step_link_target_2='"+step_link_target_2+"' ";

                                    //add third step params
                                    shortcode += "title_3='"+title_3+"' step_number_3='"+step_number_3+"' step_description_3='"+step_description_3+"' step_link_3='"+step_link_3+"' step_link_target_3='"+step_link_target_3+"' ";

                                    //add fourth step params
                                    shortcode += "title_4='"+title_4+"' step_number_4='"+step_number_4+"' step_description_4='"+step_description_4+"' step_link_4='"+step_link_4+"' step_link_target_4='"+step_link_target_4+"'";

                                    //close shortcode string
                                    shortcode += "]";
                                    
                                    jQuery("#qode_shortcode_form_wrapper").remove()
                                    ed.execCommand('mceInsertContent', false, shortcode);
                                    tb_remove();
                                    return false;
                                });
                            });
                            jQuery("#qode_shortcodes_menu_holder").remove();
                        })
						
						jQuery("#SC_separator_with_steps").click(function(){
							jQuery("#qode_shortcode_form_wrapper").remove();
							jQuery.get(url + "/qode_shortcodes_separator_with_text.php", function(data){
							   var form = jQuery(data);
							   form.appendTo('body').hide();
								 colorPicker();
							   tb_show( 'Separator With Text Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
							   jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
									var title = jQuery('#TB_window #title').val();
									var title_align = jQuery('#TB_window #title_align option:selected').val();
									var border = jQuery('#TB_window #border option:selected').val();
									var border_color = jQuery('#TB_window #border_color').val();
									var background_color = jQuery('#TB_window #background_color').val();
									var text_color = jQuery('#TB_window #text_color').val();
									var shortcode = "[vc_text_separator title='"+title+"' title_align='"+title_align+"' border='"+border+"' border_color='"+border_color+"' background_color='"+background_color+"' text_color='"+text_color+"']";
									jQuery("#qode_shortcode_form_wrapper").remove()
									ed.execCommand('mceInsertContent', false, shortcode);		   										   										   tb_remove();
									return false;
							   });							
							});  
							jQuery("#qode_shortcodes_menu_holder").remove();                                    
						});

                      jQuery("#SC_clients").click(function(){
                          jQuery("#qode_shortcode_form_wrapper").remove();
                          jQuery.get(url + "/qode_shortcodes_clients.php", function(data){
                              var form = jQuery(data);
                              form.appendTo('body').hide();
                              colorPicker();
                              tb_show( 'Clients Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
                              jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
                                  var columns = jQuery('#TB_window #columns option:selected').val();
                                  var shortcode = "[qode_clients columns='"+columns+"'][qode_client image='' link='' target='' border_bottom=''][/qode_clients]";
                                  jQuery("#qode_shortcode_form_wrapper").remove();
                                  ed.execCommand('mceInsertContent', false, shortcode);
                                  tb_remove();
                                  return false;
                              });
                          });
                          jQuery("#qode_shortcodes_menu_holder").remove();
                      });
					  jQuery("#SC_animated_icons_with_text").click(function(){
                          jQuery("#qode_shortcode_form_wrapper").remove();
                          jQuery.get(url + "/qode_shortcodes_animated_icons_with_text.php", function(data){
                              var form = jQuery(data);
                              form.appendTo('body').hide();
                              colorPicker();
                              tb_show( 'Animated Icons with Text Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
                              jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
                                  var columns = jQuery('#TB_window #columns option:selected').val();
                                  var shortcode = "[animated_icons_with_text columns='"+columns+"'][animated_icon_with_text title='' title_tag='' text='' icon='' size='' icon_color='' top_gradient_background_color='' bottom_gradient_background_color='' border_color='' icon_color_hover='' top_gradient_background_color_hover='' bottom_gradient_background_color_hover='' border_color_hover=''][/animated_icons_with_text]";
                                  jQuery("#qode_shortcode_form_wrapper").remove();
                                  ed.execCommand('mceInsertContent', false, shortcode);
                                  tb_remove();
                                  return false;
                              });
                          });
                          jQuery("#qode_shortcodes_menu_holder").remove();
                      });
					jQuery("#SC_circles").click(function(){
					  jQuery("#qode_shortcode_form_wrapper").remove();
					  jQuery.get(url + "/qode_circles.php", function(data){
						  var form = jQuery(data);
						  form.appendTo('body').hide();
						  colorPicker();
						  tb_show( 'Circles Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=qode_shortcode_form_wrapper' );
						  jQuery('#TB_window #qode_insert_shortcode_button').click(function(){
							  var columns = jQuery('#TB_window #columns option:selected').val();
							  var circle_line = jQuery('#TB_window #circle_line option:selected').val();
							  var shortcode = "[qode_circles columns='"+columns+"' circle_line='"+circle_line+"'][qode_circle type='' background_color='' border_color='' icon='' size='' icon_color='' image='' text_in_circle='' text_in_circle_tag='' font_size='' text_in_circle_color='' link='' link_target='' title='' title_tag='' title_color='' text='' text_color=''][/qode_circles]";
							  jQuery("#qode_shortcode_form_wrapper").remove();
							  ed.execCommand('mceInsertContent', false, shortcode);
							  tb_remove();
							  return false;
						  });
					});
					jQuery("#qode_shortcodes_menu_holder").remove();
                      });
					})	
				}
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "Shortcodes",
            author : 'Qode Interactive',
            authorurl : 'http://demo.qodeinteractive.com/eden',
            infourl : 'http://demo.qodeinteractive.com/eden',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('qode_shortcodes', tinymce.plugins.qode_shortcodes);
})();