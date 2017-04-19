(function ($) {
    $.fn.notificationbar = function (options) {
        var defaults = {
            "defaultstate": "open",
            "staytime": "6000",
            "exmsgstate": "close",
			"exmsgopentm":"4000",
			"exmsgclosetm":"4000",
			"disablecmsg" : "no"
        };
        var options = $.extend(defaults, options);
        return this.each(function () {
            var opts = options;
            obj = $(this).find('.nbar_wrapper'),
            objDwn = $("#notificationbar #nbar_downArr"),
            objPush = $(".notification_push");
            var stayTimer;
			var extmsgopen;
			var extmsgcounter;
			var extmsgclose;

			function clearAll(){
			    clearTimeout(stayTimer);
				clearTimeout(extmsgopen);
				clearTimeout(extmsgcounter);
				clearTimeout(extmsgclose);
				obj.find(".nbar_extendmsg .nbar_extinfo").remove();
			}
			
            function staytime() {
                stayTimer = setTimeout(function () {
                    obj.slideUp(300);
                    objDwn.text('+');
                    pullObj()
                }, opts.staytime)
            }
			
			function exmsgOpenClose(){
				extmsgopen = setTimeout(function(){
					obj.find(".nbar_extendmsg").slideDown(300);
					obj.find("a.nbar_plusminus").addClass("active");
					
					if(opts.disablecmsg =="no"){
						obj.find(".nbar_extendmsg").append('<div class="nbar_extinfo">This Message will close in <span class="nbar_ctm"></span> Seconds.</div>');
						var nbarcounter = opts.exmsgclosetm / 1000;
						obj.find('.nbar_extinfo .nbar_ctm').text(nbarcounter-1);
						extmsgcounter = setInterval(function(){
							nbarcounter--;
							obj.find('.nbar_extinfo .nbar_ctm').text(nbarcounter);
						},1000);
					}
					
					extmsgclose = setTimeout(function(){
						obj.find(".nbar_extendmsg").slideUp(300);
						obj.find("a.nbar_plusminus").removeClass("active");
						obj.find(".nbar_extendmsg .nbar_extinfo").remove();
					},opts.exmsgclosetm);
				},opts.exmsgopentm);
			}
			
            function pushObj() {
				objPush.show().animate({"height":'43px'},300);
            }
            function pullObj() {
                objPush.animate({"height":'0px'},300,function(){$(this).hide();});
            }
            if (opts.defaultstate == "open") {
                obj.slideDown(300);
                pushObj();
				objDwn.text('-');
                if (opts.exmsgstate == "open") {
					exmsgOpenClose();
                    staytime()
                } else staytime()
            } else if (opts.defaultstate == "close") {
                objDwn.text('+');
                if (opts.exmsgstate == "open") {
                    exmsgOpenClose();
                } else staytime()
            } else;
            obj.find("a.nbar_plusminus,.nbar_extclick").click(function () {
                clearAll();
                $("a.nbar_plusminus").toggleClass("active");
                obj.find(".nbar_extendmsg").stop(true,true).slideToggle()
            });
            objDwn.click(function () {
				if(!$('#notificationbar .nbar_wrapper:visible').length){
					clearAll();
					pushObj();
					obj.slideDown(300);
					$(this).text('-');
					if(jQuery('#skenav.fixed-menu').length && obj.hasClass('top')){
						jQuery('#skenav.fixed-menu').animate({'top':'43px'},300);
					}
				}
				else{
					clearAll();
					pullObj();
					obj.slideUp(300);
					$(this).text('+');
					if(jQuery('#skenav.fixed-menu').length && obj.hasClass('top')){
						jQuery('#skenav.fixed-menu').animate({'top':'0px'},300);
					}
				}
            })
        })
    }
})(jQuery);