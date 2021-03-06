;(function($,window,undefined){'use strict';var $doc=$(document),Modernizr=window.Modernizr;$(document).ready(function(){$.fn.foundationAccordion?$doc.foundationAccordion():null;$.fn.foundationNavigation?$doc.foundationNavigation():null;$.fn.foundationTabs?$doc.foundationTabs():null;$.fn.foundationClearing?$doc.foundationClearing():null;});if(Modernizr.touch&&!window.location.hash){$(window).load(function(){setTimeout(function(){window.scrollTo(0,1);},0);});}})(jQuery,this);function getParameterByName(name)
{name=name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");var regexS="[\\?&]"+name+"=([^&#]*)";var regex=new RegExp(regexS);var results=regex.exec(window.location.search);if(results==null)
return"";else
return decodeURIComponent(results[1].replace(/\+/g," "));}
(function($){$.fn.meanmenu=function(options){var defaults={meanMenuTarget:jQuery(this),meanMenuClose:"<h3>CLOSE X</h3>",meanMenuCloseSize:"18px",meanMenuOpen:"<h3>Navigation + </h3>",meanRevealPosition:"left",meanRevealPositionDistance:"15px",meanRevealColour:"",meanRevealHoverColour:"",meanScreenWidth:"540",meanNavPush:"",meanShowChildren:true,meanExpandableChildren:true,meanExpand:"+",meanContract:"-",meanRemoveAttrs:true};var options=$.extend(defaults,options);currentWidth=window.innerWidth||document.documentElement.clientWidth;return this.each(function(){var meanMenu=options.meanMenuTarget;var meanReveal=options.meanReveal;var meanMenuClose=options.meanMenuClose;var meanMenuCloseSize=options.meanMenuCloseSize;var meanMenuOpen=options.meanMenuOpen;var meanRevealPosition=options.meanRevealPosition;var meanRevealPositionDistance=options.meanRevealPositionDistance;var meanRevealColour=options.meanRevealColour;var meanRevealHoverColour=options.meanRevealHoverColour;var meanScreenWidth=options.meanScreenWidth;var meanNavPush=options.meanNavPush;var meanRevealClass=".meanmenu-reveal";meanShowChildren=options.meanShowChildren;meanExpandableChildren=options.meanExpandableChildren;var meanExpand=options.meanExpand;var meanContract=options.meanContract;var meanRemoveAttrs=options.meanRemoveAttrs;if((navigator.userAgent.match(/iPhone/i))||(navigator.userAgent.match(/iPod/i))||(navigator.userAgent.match(/iPad/i))||(navigator.userAgent.match(/Android/i))||(navigator.userAgent.match(/Blackberry/i))||(navigator.userAgent.match(/Windows Phone/i))){var isMobile=true;}
if((navigator.userAgent.match(/MSIE 8/i))||(navigator.userAgent.match(/MSIE 7/i))){jQuery('html').css("overflow-y","scroll");}
function meanCentered(){if(meanRevealPosition=="center"){var newWidth=window.innerWidth||document.documentElement.clientWidth;var meanCenter=((newWidth/2)-22)+"px";meanRevealPos="left:"+meanCenter+";right:auto;";if(!isMobile){jQuery('.meanmenu-reveal').css("left",meanCenter);}else{jQuery('.meanmenu-reveal').animate({left:meanCenter});}}}
menuOn=false;meanMenuExist=false;if(meanRevealPosition=="right"){meanRevealPos="right:"+meanRevealPositionDistance+";left:auto;";}
if(meanRevealPosition=="left"){meanRevealPos="left:"+meanRevealPositionDistance+";right:auto;";}
meanCentered();meanStyles="background:"+meanRevealColour+";color:"+meanRevealColour+";"+meanRevealPos;function meanInner(){if(jQuery($navreveal).is(".meanmenu-reveal.meanclose")){$navreveal.html(meanMenuClose);}else{$navreveal.html(meanMenuOpen);}}
function meanOriginal(){jQuery('.mean-bar,.mean-push').remove();jQuery('body').removeClass("mean-container");jQuery(meanMenu).show();menuOn=false;meanMenuExist=false;}
function showMeanMenu(){if(currentWidth<=meanScreenWidth){meanMenuExist=true;jQuery('body').addClass("mean-container");jQuery('.mean-container').prepend('<div class="mean-bar"><a href="#nav" class="meanmenu-reveal" style="'+meanStyles+'">Show Navigation</a><nav class="mean-nav"></nav></div>');var meanMenuContents=jQuery(meanMenu).html();jQuery('.mean-nav').html(meanMenuContents);if(meanRemoveAttrs){jQuery('nav.mean-nav *').each(function(){jQuery(this).removeAttr("class");jQuery(this).removeAttr("id");});}
jQuery(meanMenu).before('<div class="mean-push" />');jQuery('.mean-push').css("margin-top",meanNavPush);jQuery(meanMenu).hide();jQuery(".meanmenu-reveal").show();jQuery(meanRevealClass).html(meanMenuOpen);$navreveal=jQuery(meanRevealClass);jQuery('.mean-nav ul').hide();if(meanShowChildren){if(meanExpandableChildren){jQuery('.mean-nav ul ul').each(function(){if(jQuery(this).children().length){jQuery(this,'li:first').parent().append('<a class="mean-expand" href="#" style="font-size: '+meanMenuCloseSize+'">'+meanExpand+'</a>');}});jQuery('.mean-expand').on("click",function(e){e.preventDefault();if(jQuery(this).hasClass("mean-clicked")){jQuery(this).text(meanExpand);console.log("Been clicked");jQuery(this).prev('ul').slideUp(300,function(){});}else{jQuery(this).text(meanContract);jQuery(this).prev('ul').slideDown(300,function(){});}
jQuery(this).toggleClass("mean-clicked");});}else{jQuery('.mean-nav ul ul').show();}}else{jQuery('.mean-nav ul ul').hide();}
jQuery('.mean-nav ul li').last().addClass('mean-last');$navreveal.removeClass("meanclose");jQuery($navreveal).click(function(e){e.preventDefault();if(menuOn==false){$navreveal.css("text-align","left");$navreveal.css("text-indent","0");$navreveal.css("font-size",meanMenuCloseSize);jQuery('.mean-nav ul:first').slideDown();menuOn=true;}else{jQuery('.mean-nav ul:first').slideUp();menuOn=false;}
$navreveal.toggleClass("meanclose");meanInner();});}else{meanOriginal();}}
if(!isMobile){jQuery(window).resize(function(){currentWidth=window.innerWidth||document.documentElement.clientWidth;if(currentWidth>meanScreenWidth){meanOriginal();}else{meanOriginal();}
if(currentWidth<=meanScreenWidth){showMeanMenu();meanCentered();}else{meanOriginal();}});}
window.onorientationchange=function(){meanCentered();currentWidth=window.innerWidth||document.documentElement.clientWidth;if(currentWidth>=meanScreenWidth){meanOriginal();}
if(currentWidth<=meanScreenWidth){if(meanMenuExist==false){showMeanMenu();}}}
showMeanMenu();});};})(jQuery);

/*Flyout Menu*/

(function($, window, undefined) {
    'use strict';
    $.fn.foundationNavigation = function(options) {
        var lockNavBar = false;
        if (Modernizr.touch || navigator.userAgent.match(/Windows Phone/i)) {
            $(document).on('click.fndtn touchstart.fndtn', '.nav-bar a.flyout-toggle', function(e) {
                e.preventDefault();
                var flyout = $(this).siblings('.flyout').first();
                if (lockNavBar === false) {
                    $('.nav-bar .flyout').not(flyout).slideUp(500);
                    flyout.slideToggle(500, function() {
                        lockNavBar = false;
                    });
                }
                lockNavBar = true;
            });
            $('.nav-bar>li.has-flyout', this).addClass('is-touch');
        } else {
            $('.nav-bar>li.has-flyout', this).on('mouseenter mouseleave', function(e) {
                if (e.type == 'mouseenter') {
                    $('.nav-bar').find('.flyout').hide();
                    $(this).children('.flyout').show();
                }
                if (e.type == 'mouseleave') {
                    var flyout = $(this).children('.flyout'),
                        inputs = flyout.find('input'),
                        hasFocus = function(inputs) {
                            var focus;
                            if (inputs.length > 0) {
                                inputs.each(function() {
                                    if ($(this).is(":focus")) {
                                        focus = true;
                                    }
                                });
                                return focus;
                            }
                            return false;
                        };
                    if (!hasFocus(inputs)) {
                        $(this).children('.flyout').hide();
                    }
                }
            });
        }
    };
})(jQuery, this);