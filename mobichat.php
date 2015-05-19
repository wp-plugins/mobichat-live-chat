<?php
/*
Plugin Name: MobiChat Live Chat Mobile and Desktop
Plugin URI: https://www.mbct.me/manager/signup3
Description: Need more customers? The MobiChat live chat plugin allows you to chat with customers on your desktop or Mobile website. Use our lead capture
to get the information you need from customers right in the chat.
Author: MobiChat LLC
Version: 1.0.9
Author URI: http://www.mobichat.com/
*/
global $wpdb, $wp_version;
define ('mobichat',basename(__FILE__));

function load_mobichat_style() {	
	wp_register_style('mobi_style', plugins_url('mobichat.css', __FILE__));
	wp_enqueue_style('mobi_style');
}
add_action('admin_enqueue_scripts', 'load_mobichat_style');

function mobichat_add_function(){
	add_menu_page( '', 'MobiChat ', 1 , 'mobichat', 'mobichat_page_function');
}

function mobichat_page_function() {
			$url = site_url('wp-admin/', 'admin');	
	$title .=' <h2 class="pricing" >Attention: <a href="http://www.mbct.me/manager/trail-to-paid?plan_id=23" target="_blank"> Click here for the exclusive Wordpress Pricing</a> </h2> ';
	$title .=' <h2> Link Your MobiChat Account 
		<a class="help-icon" href="http://blog.mobichat.com/wordpress​" target="_blank" > </a> </h2>';
	$title .=' <div class="plug-title"> You have successfully installed the MobiChat plugin. Lets link up your Account! </div> ';
	$title .=' <div class="first_title" >';
	$title .=' <p> Dont have MobiChat Account? <a href="https://www.mbct.me/manager/signup3" target="_blank"> Signup Here  </a> </p>  ';
	$title .=' <p> If you have a MobiChat Account, <a href="https://www.mbct.me/manager/" target="_blank"> Login Here </a> &nbsp; and click get widget to get the chat snippet to add to your site. </p>  ';
	$title .=' </div>';
	$title .=' <div class="plug-footer"> Need Help? &nbsp; <a href="https://www.mbct.me/manager/" target="_blank"> Login to your MobiChat Account </a> &nbsp; or &nbsp; Use the Live Chat tab to the right for Help </a>  </div> ';	 	
	echo $title;
	echo '<h2 class="page-title"> Paste the Chat Code below to get the Chat Widget on your site </h2>';	
?>
 <form id="update_code" action="" method="post" class='mobiform' >
	
	<textarea class="chat-area" name="widget-options" style="width:680px; height: 200px;"><?php echo esc_textarea(mobichat_get_widget_options()); ?></textarea>
	<br/>
	<div class="row"><input id="update" type="submit" name="submit" value="Update" class="send-btn" > </div>
	</p>
	
	<p>You can download the agent interfaces from 
<a href="https://www.mbct.me/manager/downloads" target="_blank" >this page</a></p>

</form>
<div class="clear"></div>
<?php
	if(isset($_POST['submit'])){
	echo '<div id="msg" class="success" > MobiChat Widget options updated successfully. </div>';
	  echo "<script type='text/javascript'>
			window.location=document.location.href;			
			jQuery(document).ready(function () {
				setTimeout(function(){ jQuery('#msg').hide(); }, 5000);	
			});			
			</script>";
	}

	if (isset($_POST['widget-options'])) {
			 $opts = $_POST['widget-options'];
			 update_option('mobichatWidgetOptions', $opts);
			 echo '<div id="msg" class="success" > MobiChat Widget options updated successfully. </div>';
		}
	
echo "<!-- admin side script -->";
?> 
<script>
function animation_left(){function e(){move+=10;x.style.right=move+"px";if(move==0){clearInterval(t)}}move=parseInt(x.style.right);var t=setInterval(e,1/100)}function animation_right(){function e(){move-=10;x.style.right=move+"px";if(move==-chat_w){clearInterval(t)}}move=parseInt(x.style.right);var t=setInterval(e,1/100)}function slide_mobi_f34(){x=document.getElementsByClassName("rnd_slide-out")[0];y=x.style.right;if(y=="-"+chat_w+"px"){setTimeout("animation_left()",10);x_ex=document.getElementById("mobichat");if(!x_ex){x.insertAdjacentHTML('beforeend', '<iframe id="mobichat" style="width: '+chat_w+"px; height:"+chat_h+'px; border:none;" src="https://www.mbct.me/backend/chat/Bqg3fFBi5Lo2Wx7Ls09nMtCnGQ?"></iframe>');}}else{setTimeout("animation_right()",10)}}
function func1(){var e=document.getElementsByTagName("body")[0];e.insertAdjacentHTML('beforeend', '<div id="8768339" class="rnd_slide-out" style="width: '+chat_w+"px;border: 1px solid rgb(117, 117, 117); border-top-left-radius: 0px; border-top-right-radius:0px; border-bottom-right-radius: 0px;border-bottom-left-radius: 0px; margin: 0px; padding: 0px; z-index: 2001; font-weight: 700; font-size: 9px; line-height: 1; position: fixed; top: 130px; right: -"+chat_w+'px; background-color: rgb(255, 255, 255);"><a class="rnd_handle" id="rnd_slider_handle" href="#" style=" display:none; width: 40px; height: 224px; display: block; text-indent: -99999px; outline: none; position: absolute; top: 0px; left: -40px; background:url(<?php echo plugin_dir_url(__FILE__); ?>images/livechat_pink.png) no-repeat;" onclick="slide_mobi_f34();">Coupon</a></div>');}
var x_w=window.innerWidth;var y_h=window.innerHeight;var chat_w=parseInt(x_w/40)*10;var chat_h=parseInt(y_h/15)*10;
if(typeof window.orientation=="undefined"){window.addEventListener("load", function load(event) {func1();});}
if (typeof window.orientation !== "undefined") {window.addEventListener("load", function load(event) {var div = document.createElement("div"),a = document.createElement("a"),img = document.createElement("img");div.setAttribute("style", "text-align:center; position:fixed; bottom:0; right:0;z-index:10000;");a.href = "https://www.mbct.me/backend/chat/Bqg3fFBi5Lo2Wx7Ls09nMtCnGQ?";a.setAttribute("style", "color:#fff; margin:0px 10px 20px 0px; text-decoration:none; float:right; display:inline-block;");img.src = "undefined";img.width = "120";a.appendChild(img);div.appendChild(a);document.getElementsByTagName("body")[0].appendChild(div);});}

</script>

<?php	
echo "<!-- End  admin side script -->";
		
} 
 add_action( 'wp_footer', 'mobichat_footer_script' );	
 
function mobichat_footer_script() {
echo "<!-- Start of mobichat Live Chat Script -->";
		echo mobichat_get_widget_options();		
echo "<!-- End of mobichat Live Chat Script -->";
}

function mobichat_get_widget_options() {
	  $opts = get_option('mobichatWidgetOptions');
			
	if ($opts) return stripslashes($opts);
	
	$mobichat_embed_opts = "\$mobichat( function() {";
	$mobichat_embed_opts .= "\n})";
	$opts = $mobichat_embed_opts;

	update_option('mobichatWidgetOptions', $opts);	
} 
add_action('admin_menu', 'mobichat_add_function');
?>
