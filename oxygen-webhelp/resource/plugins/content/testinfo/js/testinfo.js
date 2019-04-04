function notify(style) {
    jQuery.notify({
        title: 'Cookie Notification',
        text: 'Do you want to save cookies',       
        button_text:"Allow"
    }, {
        style: 'metro',
        className: style,
        autoHide: false,
        clickToHide: true
    });
}
jQuery(document).ready(function(){
    var cookieArray = new Array();
    //jQuery.removeCookie('view_page', { path: '/' });
    
    notify('white');
    jQuery("a").click(function () {
        var addressValue = jQuery(this).attr("href");
        var expDate = new Date();  
        expDate = new Date();   
        expDate.setTime(expDate.getTime() + (2 * 60 * 1000)); // add 15 minutes
       
        
        if(jQuery.cookie('view_page') == undefined) {
            jQuery.cookie('view_page',addressValue,  { expires: expDate, path: '/' });
            console.log("LINK:"+jQuery.cookie("view_page"));
        }
        else
        {
           dataCookie =  jQuery.cookie("view_page") ;
           dataCookie = dataCookie + "@" + addressValue;
           jQuery.cookie('view_page',dataCookie,  { expires: expDate, path: '/' });
           console.log("dataCookie:"+jQuery.cookie("view_page"));
         }
         links =  jQuery.cookie("view_page") ;
         var arr = links.split('@');
    });
   
    jQuery('a').mousedown(function(event) {
            switch (event.which) {
                case 1:
                    //alert('Left mouse button pressed');
                    //$(this).attr('target','_self');
                    console.log("LINK:LEFT");
                    break;
                case 2:
                    //alert('Middle mouse button pressed');
                   // $(this).attr('target','_blank');
                   console.log("LINK:Middle");
                    break;
                case 3:
                    //alert('Right mouse button pressed');
                   // $(this).attr('target','_blank');
                   console.log("LINK:Right");
                    break;
                default:
                    //alert('You have a strange mouse');
                   // $(this).attr('target','_self"');
            }
    });
   
});