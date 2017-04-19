/**
 *  Advanced iframe pro external workaround file 
*/ 

var domain_PARAM_ID = 'WORDPRESS_SITE_URL'; // Check if this is your wordpress root
 
 // Variables are checked with typeof before because this enables that the user can
// define this values before and after including this file and they don't have to set 
// them at all if not needed.
if (typeof iframe_id === 'undefined') {
    var iframe_id_PARAM_ID = "PARAM_ID";
}  else {
    var iframe_id_PARAM_ID = iframe_id;
}
if (typeof updateIframeHeight === 'undefined') {
    var updateIframeHeight = "PARAM_ENABLE_EXTERNAL_HEIGHT_WORKAROUND";
} 
if (typeof keepOverflowHidden === 'undefined') {
    var keepOverflowHidden = "PARAM_KEEP_OVERFLOW_HIDDEN";
}
if (typeof hide_page_until_loaded_external === 'undefined') {
    var hide_page_until_loaded_external = "PARAM_HIDE_PAGE_UNTIL_LOADED_EXTERNAL";
}
 if (typeof iframe_hide_elements === 'undefined') {
  var iframe_hide_elements = "PARAM_IFRAME_HIDE_ELEMENTS";
}
if (typeof onload_show_element_only === 'undefined') {
    var onload_show_element_only = "PARAM_ONLOAD_SHOW_ELEMENT_ONLY"; 
}
if (typeof iframe_content_id === 'undefined') {
    var iframe_content_id = "PARAM_IFRAME_CONTENT_ID"
}
if (typeof iframe_content_styles === 'undefined') {
    var iframe_content_styles = "PARAM_IFRAME_CONTENT_STYLES";
}
if (typeof change_iframe_links === 'undefined') {
    var change_iframe_links = "PARAM_CHANGE_IFRAME_LINKS"
}
if (typeof change_iframe_links_target === 'undefined') {
    var change_iframe_links_target = "PARAM_CHANGE_IFRAME_LINKS_TARGET";
}

if (typeof onload_resize_delay === 'undefined') {
    var onload_resize_delay = 0;
}
if (typeof iframe_redirect_url === 'undefined') {
    var iframe_redirect_url = "PARAM_IFRAME_REDIRECT_URL";
}
if (typeof enable_responsive_iframe === 'undefined') {
    var enable_responsive_iframe = "PARAM_ENABLE_RESPONSIVE_IFRAME";
}




var iframeWidth = 0;

// redirect to a given url if the page is NOT in an iframe
if (iframe_redirect_url != "") {
    if (window==window.top) { /* I'm not in a frame! */     
        /* Add existing parameters */
        if ("" != window.location.search) {
            iframe_redirect_url += "?" + window.location.search;      
        }
        location.replace(iframe_redirect_url);
    }
} 


// load jQuery if not available   TODO - use the one from wordpress!
window.jQuery || document.write("<script src='PARAM_JQUERY_PATH'></script>")

if (typeof ia_already_done === 'undefined') {
    if (window!=window.top) { /* I'm in a frame! */ 
        // dom is not fully loaded therefore jQuery is not used to hide the body!
        if (iframe_hide_elements != "" || onload_show_element_only != "" || 
            iframe_content_id != "" || iframe_content_styles != "") {
            if (document.documentElement) { 
                document.documentElement.style.visibility = 'hidden';
            }
            // Solution if you want to remove the background but you see it for a very short time. 
            // because hiding the iframe content does not help!
            //if (window != window.top) { 
            //    document.write("<style>body { background-image: none; }</style>");
            //}
        }
    }
    var ia_already_done = false;
}

function trimExtraChars(text) {
    return text == null ? "" : text.toString().replace(/^[\s:;]+|[\s:;]+$/g, "");
};

function modifyIframe() {
    if (iframe_hide_elements != "") {
        jQuery(iframe_hide_elements).css('display', 'none');
    }
    if (onload_show_element_only != "") {
        aiShowElementOnly(onload_show_element_only);
    }
    if (iframe_content_id != "" || iframe_content_styles != "") {
        var elementArray = iframe_content_id.split("|");
        var valuesArray = iframe_content_styles.split("|");
        if (elementArray.length != valuesArray.length) {
            alert('Configuration error: The attributes iframe_content_id and iframe_content_styles have to have the amount of value sets separated by |.');
            return;
        } else {
            for (var x = 0; x < elementArray.length; ++x) {
                var valuesArrayPairs = trimExtraChars(valuesArray[x]).split(";");
                for (var y = 0; y < valuesArrayPairs.length; ++y) {
                    var elements = valuesArrayPairs[y].split(":");
                    jQuery(elementArray[x]).css(elements[0],elements[1]);
                }
            }
        }
    }
    // Change links targets.
    if (change_iframe_links != "" || change_iframe_links_target != "") {
        var linksArray = change_iframe_links.split("|");
        var targetArray = change_iframe_links_target.split("|");
        if (linksArray.length != targetArray.length) {
            alert('Configuration error: The attributes change_iframe_links and change_iframe_links_target have to have the amount of value sets separated by |.');
            return;
        } else {
            for (var x = 0; x < linksArray.length; ++x) {
                jQuery(linksArray[x]).attr('target', targetArray[x]);                
            }
        }
    }  
}

/**
 * Removes all elements from an iframe except the given one
 * script tags are also not removed!  
 * 
 * @param iframeId id of the iframe
 * @param showElement the id, class (jQuery syntax) of the element that should be displayed. 
 */ 
function aiShowElementOnly(showElement) {
  var iframe = jQuery('body'); 
  var selectedBox = iframe.find(showElement).clone(); 
  iframe.find("*").not(jQuery('script')).remove();
  iframe.prepend(selectedBox);
}

/**
 * The function creates a hidden iframe and determines the height of the 
 * current page. This is then set as height parameter for the iframe 
 * which triggers the resize function in the parent.  
 */ 
function aiExecuteWorkaround_PARAM_ID() {
    if (window!=window.top) { /* I'm in a frame! */ 

      // first we modify the iframe content - only once in case the script is included several times.
      if (!ia_already_done) { 
        modifyIframe();
        ia_already_done = true;
      }
       
      if (updateIframeHeight == 'true') { 
        
            
        // add the iframe dynamically
        var url = domain_PARAM_ID+'/wp-content/plugins/advanced-iframe/js/iframe_height.html';
        var newElementStr = '<iframe id="ai_hidden_iframe_PARAM_ID" style="display:none;" width="0" height="0" src="';
        newElementStr += url+'">Iframes not supported.</iframe>';
        var newElement = aiCreate(newElementStr);
        document.body.appendChild(newElement);
             
        // add a wrapper div below the body to measure - if you remove this you have to measure the height of the body! 
        // See below for this solution. The wrapper is only created if needed
        createAiWrapperDiv();
        
        // remove any margin,padding from the body because each browser handles this differently
        // Overflow hidden is used to avoid scrollbars that can be shown for a milisecond
        aiAddCss("body {margin:0px;padding:0px;overflow:hidden;}");
        
        // get the height of the element right below the body - Using this solution allows that the iframe shrinks also.
        var wrapperElement = document.body.children[0];
        var newHeightRaw =  Math.max(wrapperElement.scrollHeight, wrapperElement.offsetHeight, 
                                     wrapperElement.scrollHeight, wrapperElement.offsetHeight);
        var newHeight = parseInt(newHeightRaw,10);       

        //  Get the height from the body. The problem with this solution is that an iframe can not shrink anymore.
        //  remove everything from createAiWrapperDiv() until here for the alternative solution. 
        //  var newHeight = Math.max(document.body.scrollHeight, document.body.offsetHeight,
        //    document.documentElement.scrollHeight, document.documentElement.offsetHeight);  

        
       
        var iframe = document.getElementById('ai_hidden_iframe_PARAM_ID');
        // 4 pixels extra are needed because of IE! (2 for Chrome)
        // If you still have scrollbars add a little bit more offset.
       
        var url_str = url + '?height=' + (newHeight + 4) + "&id=" + iframe_id_PARAM_ID; 
        if (onload_resize_delay == 0) {
           iframe.src = url_str; 
        } else {
           setTimeout(function () { resizeLater(iframe); }, onload_resize_delay);
        }
        
        // set overflow to visible again.
        if (keepOverflowHidden == 'false') {
            window.setTimeout("removeOverflowHidden()",500);
        }
        
        if (enable_responsive_iframe == 'true') {
        // this is the width - need to detect a change of the iframe width at a browser resize!
        iframeWidth = getIframeWidth();
        // resize size after resize of window. setup is done 1 sec after first resize to avoid double resize.
            window.setTimeout("initResize()",1000);
        }
  
      } else if (hide_page_until_loaded_external == 'true') {  // only one iframe is rendered - if auto height is disabled still the parent has to be informed to show the iframe ;).
        // add the iframe dynamically
        var url = domain_PARAM_ID + '/wp-content/plugins/advanced-iframe/js/iframe_show.html?id='+ iframe_id_PARAM_ID;
        var newElementStr = '<iframe id="ai_hidden_iframe_show_PARAM_ID" style="display:none;" width="0" height="0" src="';
        newElementStr += url+'">Iframes not supported.</iframe>';
        var newElement = aiCreate(newElementStr);
        document.body.appendChild(newElement);
      }
      // In case html was hidden. 
      document.documentElement.style.visibility = 'visible';   
    }
}

function resizeLater(iframe_obj) {
   var url = domain_PARAM_ID+'/wp-content/plugins/advanced-iframe/js/iframe_height.html';
   var wrapperElement = document.body.children[0];
   var newHeightRaw =  Math.max(wrapperElement.scrollHeight, wrapperElement.offsetHeight, 
                                wrapperElement.scrollHeight, wrapperElement.offsetHeight);
   var newHeight = parseInt(newHeightRaw,10);        
   var url_str = url + '?height=' + (newHeight + 4) + "&id=" + iframe_id_advanced_iframe;
   iframe_obj.src = url_str;
}

/**
 *  Remove the overflow:hidden from the body which
 *  what avoiding scrollbars during resize. 
 */ 
function removeOverflowHidden() {
    document.body.style.overflow="auto";
}

/**
 *  Gets the text length from text nodes. For other nodes a dummy length is returned
 *  browser do add empty text nodes between elements which should return a length
 *  of 0 because they should not be counted. 
 */ 
function getTextLength( obj ) {
    var value = obj.textContent ? obj.textContent : "NO_TEXT";
    return value.trim().length;
} 

/**
 * Creates a wrapper div if needed. 
 * It is not created if the body has only one single div below the body.
 * childNdes.length has to be > 2 because the iframe is already attached!    
 */ 
function createAiWrapperDiv() {
    var countElements = 0;   
    // Count tags which are not empty text nodes, no script and no iframe tags
    // because only if we have more than 1 of this tags a wrapper div is needed
    for (var i = 0; i < document.body.childNodes.length; ++i) {
       var nodeName = document.body.childNodes[i].nodeName.toLowerCase(); 
       var nodeLength = getTextLength(document.body.childNodes[i]); 
       if ( nodeLength != 0 && nodeName != 'script' && nodeName != 'iframe') {
           countElements++;  
       }
    }
    if (countElements > 1) {
      var div = document.createElement("div");
  	  div.id = "ai_wrapper_div";
    	// Move the body's children into this wrapper
    	while (document.body.firstChild) {
    		div.appendChild(document.body.firstChild);
    	}
    	// Append the wrapper to the body
    	document.body.appendChild(div);
      
      // set the style
      div.style.cssText = "margin:0px;padding:0px;border: 1px solid transparent;";
    }
}

/**
 *  Creates a new dom fragment from a string
 */ 
function aiCreate(htmlStr) {
    var frag = document.createDocumentFragment(),
    temp = document.createElement('div');
    temp.innerHTML = htmlStr;
    while (temp.firstChild) {
        frag.appendChild(temp.firstChild);
    }
    return frag;
}

function getIframeWidth() { 
  var wrapperElement = document.body.children[0];
  var newWidthRaw =  Math.max(wrapperElement.scrollWidth, wrapperElement.offsetWidth, 
                              wrapperElement.scrollWidth, wrapperElement.offsetWidth);
  return parseInt(newWidthRaw,10);
} 

function initResize() {
// resize the iframe only when the width changes!
jQuery(window).resize(function() {
    if (iframeWidth != getIframeWidth()) {
        iframeWidth = getIframeWidth(); 
        // hide the overflow if not keept
        if (keepOverflowHidden == 'false') {
             document.body.style.overflow="hidden";
        }
        aiExecuteWorkaround_PARAM_ID();
        // set overflow to visible again.
        if (keepOverflowHidden == 'false') {
            window.setTimeout("removeOverflowHidden()",500);
        }
    }   
});
}       

/**
 *  Adds a css style to the head 
 */         
function aiAddCss(cssCode) {
    var styleElement = document.createElement("style");
    styleElement.type = "text/css";
    if (styleElement.styleSheet) {
      styleElement.styleSheet.cssText = cssCode;
    } else {
      styleElement.appendChild(document.createTextNode(cssCode));
    }
    document.getElementsByTagName("head")[0].appendChild(styleElement);
}

if(typeof String.prototype.trim !== 'function') {
  String.prototype.trim = function() {
    return this.replace(/^\s+|\s+$/g, ''); 
  }
}

/**
 * Helper function without jQuery to add a onload event 
 * even if there is already one attached. 
 */ 
function addOnloadEvent(fnc){
  if ( typeof window.addEventListener != "undefined" )
    window.addEventListener( "load", fnc, false );
  else if ( typeof window.attachEvent != "undefined" ) {
    window.attachEvent( "onload", fnc );
  }
  else {
    if ( window.onload != null ) {
      var oldOnload = window.onload;
      window.onload = function ( e ) {
        oldOnload( e );
        window[fnc]();
      };
    }
    else 
      window.onload = fnc;
  }
}

// add the aiUpdateIframeHeight to the onload of the site.
addOnloadEvent(aiExecuteWorkaround_PARAM_ID);


 