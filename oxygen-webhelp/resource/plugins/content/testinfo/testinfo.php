<?php
 defined('_JEXEC') or die;
class PlgContentTestInfo extends JPlugin
{
   public function onContentPrepare($context,&$row,$params,$page =0)
   {      
     // error_log("onContentPrepare:",0);
    
    //  $cookie_name = "TestCookie";
    //  $currenturl = JURI::current();
     
    //  error_log($SCRIPTS_FOLDER . 'testinfo.js',0);
      // setcookie($cookie_name,$currenturl, time()+3600,'http://192.168.191.71/');
      // if(!isset($_COOKIE[$cookie_name])) {
      //     echo "Cookie named '" . $cookie_name . "' is not set!";
      //   } else {
      //       echo "Cookie '" . $cookie_name . "' is set!<br>";
      //       echo "Value is: " . $_COOKIE[$cookie_name];
      //   }
      // if(!empty($_COOKIE)) {
      //     echo '<pre>';
      //     print_r($_COOKIE);
      //     echo '</pre>';
      //   }
      //   else {  
      //     echo 'There are no Cookies, you must bake some.';
      //   }
           
      return true;
   }
   public function onContentBeforeDisplay($context, &$article, &$params, $limitstart)
   {
     // echo JRequest::getVar('id');
      $parts = explode(".", $context);
      //error_log("onContentBeforeDisplay:".print_r( $parts,true),0);     
      //error_log("onContentBeforeDisplay1:".print_r( $article,true),0);   
      return true;     
   }

   public function onAfterRoute()
   {

   //  error_log("onAfterRoute:",0);
   }
   public function onAfterRender()
   {
    //error_log("onBeforeRender:",0);
    $SCRIPTS_FOLDER = JURI::root() . 'plugins/content/testinfo/js/';
    $CSS_FOLDER = JURI::root() . 'plugins/content/testinfo/js/';
    $cookiescript = '';
   // $cookiescript .= '<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>'."\n";
    $cookiescript .= '<script type="text/javascript" src="' . $SCRIPTS_FOLDER . 'jquery.cookie.js"></script>'."\n";	
    $cookiescript .= '<script type="text/javascript" src="' . $SCRIPTS_FOLDER . 'testinfo.js"></script>'."\n";
    $cookiescript .= '<script type="text/javascript" src="' . $SCRIPTS_FOLDER . 'dist/notify.js"></script>'."\n";		
    $cookiescript .= '<script type="text/javascript" src="' . $SCRIPTS_FOLDER . 'dist/styles/metro/notify-metro.js"></script>'."\n";	
    $cookiescript .= '<link href="' . $SCRIPTS_FOLDER . 'dist/styles/metro/notify-metro.css" rel="stylesheet" />'."\n";	
    $body = JResponse::getBody();
    $body = str_replace('</body>', $cookiescript.'</body>', $body);
    ///error_log( $body,0);
     JResponse::setBody($body);
     return true;
    
   }
   public function onBeforeRender()
   {
  
   }
}
