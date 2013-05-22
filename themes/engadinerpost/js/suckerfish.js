
/*var name = "#suckerfish";
	var menuYloc = null;
	
		jQuery(document).ready(function(){ 
										if(document.getElementById("suckerfish")){
			menuYloc = jQuery(name).offset();
			jQuery(window).scroll(function () { 
						if((jQuery(document).scrollTop())>menuYloc.top)	{	
						jQuery(name).css("width",jQuery(document).width());
						loc_top = parseInt(jQuery('body').css("padding-top").substring(0,jQuery('body').css("padding-top").indexOf("px")));
						
				offset = loc_top + jQuery(document).scrollTop()-menuYloc.top+"px";}
				else
				{
					offset = "0px";
				}
				jQuery(name).animate({top:offset},{duration:500,queue:false});
			});}
			
			if(jQuery("#block-aggregator-aggregator-feed-1"))
			{
				jQuery("#block-aggregator-aggregator-feed-1").find('a').colorbox();
			}
			
			
		}); 
*/


var name = "#suckerfish";
	var menuYloc = null;
	var offset = null;
	var loc_top = null;
		jQuery(document).ready(function(){ 
		
												if(document.getElementById("suckerfish")){
	var sfEls = document.getElementById("suckerfish").getElementsByTagName("LI");
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}



										/*if(document.getElementById("suckerfish")){																					
			menuYloc = jQuery(name).offset();
			jQuery(window).scroll(function () { 
						if((jQuery(document).scrollTop()) > menuYloc.top)	{	
							jQuery(name).addClass("menufloat");
							loc_top = parseInt(jQuery('body').css("padding-top").substring(0,jQuery('body').css("padding-top").indexOf("px")));						
				offset = loc_top +"px";
				jQuery(".menufloat").css("top", offset);
				var wwidth = jQuery(window).width();				
				jQuery(".menufloat").css("width", wwidth);
						}
				else if(jQuery(name).hasClass("menufloat"))
				{
					jQuery(".menufloat").css("width", "800px");
					jQuery(name).removeClass("menufloat");					
				}
			});
			
			}*/ // end If		
/*				if(document.getElementById("block-aggregator-aggregator-feed-1"))
			{
				jQuery("#block-aggregator-aggregator-feed-1").find('a').colorbox();
			}	*/	
			if(document.getElementById("poster"))
			{
				jQuery("div.poster_text").css("opacity", "0.40");
			}	
			
			jQuery('[rel=colorboxImg]').colorbox();
			
		}); 
