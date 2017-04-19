/*-- Notification Bar Pro Admin Script
-----------------------------------------------*/
jQuery(document).ready(function(){

	/*post/page mata option script start*/
		if(jQuery("#nbar_post_metas #nbar_disable").is(':checked')){jQuery('#nbar_post_metas .nbar_disable').hide();}
		if(!jQuery("#nbar_post_metas #nbar_check").is(':checked')){jQuery('#nbar_post_metas .nbar_selection').hide();}

		jQuery("#nbar_post_metas #nbar_check").click(function(){
			if(jQuery("#nbar_post_metas #nbar_check").is(':checked')){jQuery('#nbar_post_metas .nbar_selection').slideDown();}
			else{jQuery('#nbar_post_metas .nbar_selection').slideUp();}
		});

		jQuery("#nbar_post_metas #nbar_disable").click(function(){
			if(jQuery("#nbar_post_metas #nbar_disable").is(':checked')){
				jQuery('#nbar_post_metas .nbar_disable').slideUp();
				jQuery("#nbar_post_metas #nbar_check").prop("checked", false);
			}
			else{jQuery('#nbar_post_metas .nbar_disable').slideDown();}
		});
	/*post/page mata option script end*/

	/*extend maessage check jquery start*/
		jQuery("#nbpro_wrapper #nbar_extchk").click(function(){
			if(jQuery("#nbpro_wrapper #nbar_extchk").is(':checked')){jQuery('#nbpro_wrapper .nbpro_extmsg').fadeIn('fast');}
			else{jQuery('#nbpro_wrapper .nbpro_extmsg').fadeOut('fast');}
		});
	/*extend maessage check jquery end*/
	
	jQuery('#nbpro_wrapper .nbpro_chkbox').click(function(){
		if(jQuery(this).is(':checked')){jQuery(this).prev('label').addClass('checked');}
		else{jQuery(this).prev('label').removeClass('checked');}
	});
	jQuery('#nbpro_wrapper .nbpro_smallchkbox').click(function(){
		if(jQuery(this).is(':checked')){jQuery(this).parent('label').addClass('checked');}
		else{jQuery(this).parent('label').removeClass('checked');}
	});
	
	/*settings check jquery start*/
		jQuery("#nbar_settchk").click(function(){
			if(jQuery(this).is(':checked')){jQuery('#nbar_settfrm .nbar_setblock').fadeIn('fast');}
			else{jQuery('#nbar_settfrm .nbar_setblock').fadeOut('fast');}
		});
	/*settings check jquery end*/
	
	
	jQuery('div.nbar_state').click(function(){
		var nbar_state = jQuery(this).find("input[type='radio']:checked").val();
		if(nbar_state =="open"){
			jQuery(this).find("input[value='close']").attr('checked','checked');
			jQuery(this).addClass('close');
		}
		else{
			jQuery(this).find("input[value='open']").attr('checked','checked');
			jQuery(this).removeClass('close');
		}
	});
	
	jQuery('div.nbar_pos').click(function(){
		var nbar_pos = jQuery(this).find("input[type='radio']:checked").val();
		if(nbar_pos =="top"){
			jQuery(this).find("input[value='bottom']").attr('checked','checked');
			jQuery(this).addClass('bottom');
		}
		else{
			jQuery(this).find("input[value='top']").attr('checked','checked');
			jQuery(this).removeClass('bottom');
		}
	});
	
	jQuery('div.nbar_target').click(function(){
		var nbar_target = jQuery(this).find("input[type='radio']:checked").val();
		if(nbar_target =="_blank"){
			jQuery(this).find("input[value='_self']").attr('checked','checked');
			jQuery(this).addClass('self');
		}
		else{
			jQuery(this).find("input[value='_blank']").attr('checked','checked');
			jQuery(this).removeClass('self');
		}
	});
	
	jQuery('div.nbar_disable').click(function(){
		var nbar_disable = jQuery(this).find("input[type='radio']:checked").val();
		if(nbar_disable =="yes"){
			jQuery(this).find("input[value='no']").attr('checked','checked');
			jQuery(this).addClass('no');
		}
		else{
			jQuery(this).find("input[value='yes']").attr('checked','checked');
			jQuery(this).removeClass('no');
		}
	});
	
	jQuery('div.nbar_fblike').click(function(){
		var nbar_fblike = jQuery(this).find("input[type='radio']:checked").val();
		if(nbar_fblike =="yes"){
			jQuery(this).find("input[value='no']").attr('checked','checked');
			jQuery(this).addClass('no');
		}
		else{
			jQuery(this).find("input[value='yes']").attr('checked','checked');
			jQuery(this).removeClass('no');
		}
	});
	

	/*-- Upload image jquery start 
	--------------------------------------------*/
		var targetfield= '';
		var nbarpro_send_to_editor = window.send_to_editor;
		jQuery('#nbar_uploadbutton').click(function(){
			targetfield = jQuery(this).prev('#nbar_uploadimage');
			tb_show('', 'media-upload.php?type=image&TB_iframe=true');
			window.send_to_editor = function(html) {
				imgurl = jQuery('img',html).attr('src');
				jQuery(targetfield).val(imgurl);
				tb_remove();
				window.send_to_editor = nbarpro_send_to_editor;
			}
			return false;
		});	
	/*-------------------------------------------*/	
	jQuery('#nbpro_wrapper .nbpro_settings').click(function(){
		jQuery('#nbpro_wrapper .nbpro_settings').removeClass('nbbox_active');
		jQuery('#nbpro_wrapper .nbpro_extendbox').removeClass('nbbox_active');
		jQuery(this).toggleClass('nbbox_active');
		jQuery(this).find('.nbpro_plus_minus').toggleClass('active');
		jQuery('#nbpro_wrapper .nbpro_expCol').addClass('active');
		jQuery(this).next('.nbpro_extendbox').stop(true,true).slideToggle('fast',function(){jQuery(this).toggleClass('nbbox_active');});
	});
	
	
	jQuery('#nbpro_wrapper .nbpro_smallblk .nbpro_settings').click(function(){
		jQuery(this).parent().parent().parent('.nbpro_extendbox').addClass('nbbox_active');
		jQuery(this).parent().parent().parent('.nbpro_extendbox').prev('.nbpro_settings').addClass('nbbox_active');
	});

	jQuery('#nbpro_wrapper .nbpro_settings .nbpro_savebox input').click(function(e) {
        e.stopPropagation();
    });
	
	jQuery('#nbpro_wrapper .nbpro_expCol').click(function(){
		var nabr_expcol = jQuery(this);
		if(jQuery(this).is('.active')){
			jQuery('#nbpro_wrapper .nbpro_extendbox').slideUp('fast',function(){
				jQuery('#nbpro_wrapper .nbpro_plus_minus').removeClass('active');
				jQuery(nabr_expcol).removeClass('active');
			});
			
		}else{
			jQuery('#nbpro_wrapper .nbpro_extendbox').slideDown('fast',function(){
				jQuery('#nbpro_wrapper .nbpro_plus_minus').addClass('active');
				jQuery(nabr_expcol).addClass('active');
			});
		}
	});
});

/*-- Nbar Tooltip jquery script 
---------------------------------------------------*/
	ShowTooltip = function(e){
		var text = jQuery(this).find('.nbartooltip_txt');
		if (text.attr('class') != 'nbartooltip_txt')
			return false;
		text.stop(true,true).fadeIn()

		return false;
	}
	HideTooltip = function(e){
		var text = jQuery(this).find('.nbartooltip_txt');
		if (text.attr('class') != 'nbartooltip_txt')
			return false;
		text.stop(true,true).fadeOut();
	}

	SetupTooltips = function(){
		jQuery('.nbar_tooltip')
			.each(function(){
				jQuery(this).append('.');
				jQuery(this)
					.append(jQuery('<span/>')
						.attr('class', 'nbartooltip_txt')
						.html(jQuery(this).attr('title')))
					.attr('title', '');
			})
			.hover(ShowTooltip, HideTooltip);
	}

	jQuery(document).ready(function() {
		SetupTooltips();
	});

/*---------------------------------------------------*/

function nbar_delconfirm(nbar_item){   
	nbar_item = " '"+nbar_item+"' ";
	var nbar_agree = confirm('Are you sure you want to delete ' + nbar_item + ' Notification bar ?');
	return nbar_agree; 
}

function nbar_chksum(){
	a_vb = document.getElementById('stayTime').value;
	b_vb = document.getElementById('extMesgOpenTime').value;
	c_vb = document.getElementById('extMesgCloseTime').value;
	d_vb = parseInt(b_vb) + parseInt(c_vb);
	if(a_vb < d_vb){
		alert("'Stay Time' must be greater than the sum of 'Extend Message Open Time' and 'Extend Message Close Time'.")
		return false;
	}
	return true;
}  

/*---------------------------------------------------*/  
jQuery(document).ready(function($) {
	jQuery("form#nbar_editform").submit(function(event){
		var data = jQuery(this).serializeArray();
		jQuery.ajax({	
			url:ajaxurl,
			data:data,
			type: "POST",
			beforeSend: function(){
				jQuery('#nbar_ajaxloader').fadeIn('fast');
				jQuery('.nbar_overlay').fadeIn('fast');
				jQuery('#nbpro_settsaved').html('');
			},
			success: function(response) {
				if(response == 1){
					jQuery('#nbar_ajaxloader').fadeOut('fast');
					nbpro_show_message(1);
					t = setTimeout('nbpro_fade_message()', 1000);
				}else{
					jQuery('#nbar_ajaxloader').fadeOut('fast');
					nbpro_show_message(0);
					t = setTimeout('nbpro_fade_message()', 2700);
				}    
			}
		});
		return false;
	});
});
function nbpro_show_message(n){
	if(n == 1){ jQuery('#nbpro_settsaved').html('<div class="updated_msg"></div>').fadeIn(500);} 
	else if(n == 0){
		jQuery('#nbpro_settsaved').html('<div class="info_msg"></div>').fadeIn(500);
	}
}
function nbpro_fade_message(){jQuery('#nbpro_settsaved').fadeOut(1000);jQuery('.nbar_overlay').fadeOut(1000);	clearTimeout(t);}                                                                         