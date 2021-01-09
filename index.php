<?php
error_reporting(0);
include "head.php";
include "system/db.php";
include "system/dbsecurity.php";

if (abs($_GET["s"]))
	$s = intval($_GET["s"]);
else
	$s = 1;

$limit = 10;
$ilk = $limit*($s-1);


$toplam_al = mysql_query("SELECT count(*) FROM kayitlar WHERE onay = 0");
$sayi1 = mysql_fetch_array($toplam_al);
$sayi = $sayi1[0];
$onhold_al = mysql_query("SELECT note,url,id,hacker FROM kayitlar WHERE onay = 0 ORDER BY tarih DESC LIMIT $ilk,$limit");
$sayfa_sayisi = ceil($sayi/$limit);

?>


<header>
<nav class="navbar navbar-default">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<div class="col-xs-9 logo"><a class="navbar-brand" href="/"><img src="images/logo.png" alt="Clash Of Clans Server List Logo" class="img-responsive"></a></div>
</div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-right" style="margin-top:40px;">
<li><a href="/">Home</a></li>
<li><a href="/">Contact Us</a></li>
</ul>
</div>
</div>
</nav>
</header>
<div class="container">
<div class="row">
<div class="search">
<form id="form_Search" name="form_Search" action="#" method="post">
<div class="col-sm-3 col-md-3 txt"> <h2> Clash Of Clans Server List </h2> </div>
<div class="col-sm-6 col-md-6 box">
<div class="form-group col-sm-3 box">
<select class="form-control" id="search_sort" name="search_sort">
  <option value="">Sort by</option>
  <option value="V">Votes</option>
  <option value="F">Favorites</option>
  <option value="N">Server Name</option>
  <option value="L">Latest</option>
</select>
</div>
<div class="form-group col-sm-3 box">
<select class="form-control" id="search_status" name="search_status">
  <option value="">Status</option>
  <option value="O">Online</option>
  <option value="F">Offline</option>
  <option value="M">Maintenance</option>
</select>
</div>
<div class="form-group col-sm-3 box">
<select class="form-control" id="search_game" name="search_game">
  <option value="">Gameplay</option>
  		<option value="2">Boom Beach</option>	
        		<option value="5">Clash of Clans</option>	
        		<option value="4">Clash Royale</option>	
        </select>
</div>
<div class="form-group col-sm-3 box">
<select class="form-control" id="search_country" name="search_country">
  <option value="">Country</option>
  		<option value="1">Afghanistan</option>	
        		<option value="2">Albania</option>	
        		<option value="3">Algeria</option>	
        		<option value="4">Andorra</option>	
        		<option value="5">Angola</option>	
        		<option value="6">Antigua and Barbuda</option>	
        		<option value="7">Argentina</option>	
        		<option value="8">Armenia</option>	
        		<option value="9">Australia</option>	
        		<option value="10">Austria</option>	
        		<option value="11">Azerbaijan</option>	
        		<option value="12">Bahamas</option>	
        		<option value="13">Bahrain</option>	
        		<option value="14">Bangladesh</option>	
        		<option value="15">Barbados</option>	
        		<option value="16">Belarus</option>	
        		<option value="17">Belgium</option>	
        		<option value="18">Belize</option>	
        		<option value="19">Benin</option>	
        		<option value="20">Bhutan</option>	
        		<option value="21">Bolivia</option>	
        		<option value="22">Bosnia and Herzegovina</option>	
        		<option value="23">Botswana</option>	
        		<option value="24">Brazil</option>	
        		<option value="25">Brunei</option>	
        		<option value="26">Bulgaria</option>	
        		<option value="27">Burkina Faso</option>	
        		<option value="28">Burundi</option>	
        		<option value="29">Cabo Verde</option>	
        		<option value="30">Cambodia</option>	
        		<option value="31">Cameroon</option>	
        		<option value="32">Canada</option>	
        		<option value="33">Central African Republic</option>	
        		<option value="34">Chad</option>	
        		<option value="35">Chile</option>	
        		<option value="36">China</option>	
        		<option value="37">Colombia</option>	
        		<option value="38">Comoros</option>	
        		<option value="40">Congo, Democratic Republic of the</option>	
        		<option value="39">Congo, Republic of the</option>	
        		<option value="41">Costa Rica</option>	
        		<option value="42">Cote d'Ivoire</option>	
        		<option value="43">Croatia</option>	
        		<option value="44">Cuba</option>	
        		<option value="45">Cyprus</option>	
        		<option value="46">Czech Republic</option>	
        		<option value="47">Denmark</option>	
        		<option value="48">Djibouti</option>	
        		<option value="49">Dominica</option>	
        		<option value="50">Dominican Republic</option>	
        		<option value="51">Ecuador</option>	
        		<option value="52">Egypt</option>	
        		<option value="53">El Salvador</option>	
        		<option value="54">Equatorial Guinea</option>	
        		<option value="55">Eritrea</option>	
        		<option value="56">Estonia</option>	
        		<option value="57">Ethiopia</option>	
        		<option value="58">Fiji</option>	
        		<option value="59">Finland
</option>	
        		<option value="60">France</option>	
        		<option value="61">Gabon</option>	
        		<option value="62">Gambia</option>	
        		<option value="63">Georgia</option>	
        		<option value="64">Germany</option>	
        		<option value="65">Ghana</option>	
        		<option value="66">Greece</option>	
        		<option value="67">Grenada</option>	
        		<option value="68">Guatemala</option>	
        		<option value="69">Guinea</option>	
        		<option value="70">Guinea-Bissau</option>	
        		<option value="71">Guyana</option>	
        		<option value="72">Haiti</option>	
        		<option value="73">Honduras</option>	
        		<option value="74">Hungary</option>	
        		<option value="75">Iceland</option>	
        		<option value="76">India</option>	
        		<option value="77">Indonesia</option>	
        		<option value="202">International</option>	
        		<option value="78">Iran</option>	
        		<option value="79">Iraq</option>	
        		<option value="80">Ireland</option>	
        		<option value="81">Israel</option>	
        		<option value="82">Italy</option>	
        		<option value="83">Jamaica</option>	
        		<option value="84">Japan
</option>	
        		<option value="85">Jordan</option>	
        		<option value="86">Kazakhstan</option>	
        		<option value="87">Kenya</option>	
        		<option value="88">Kiribati</option>	
        		<option value="89">Kosovo</option>	
        		<option value="90">Kuwait</option>	
        		<option value="91">Kyrgyzstan</option>	
        		<option value="92">Laos</option>	
        		<option value="93">Latvia</option>	
        		<option value="94">Lebanon</option>	
        		<option value="95">Lesotho</option>	
        		<option value="96">Liberia</option>	
        		<option value="97">Libya</option>	
        		<option value="98">Liechtenstein</option>	
        		<option value="99">Lithuania</option>	
        		<option value="100">Luxembourg</option>	
        		<option value="101">Macedonia</option>	
        		<option value="102">Madagascar</option>	
        		<option value="103">Malawi</option>	
        		<option value="104">Malaysia</option>	
        		<option value="105">Maldives</option>	
        		<option value="106">Mali</option>	
        		<option value="107">Malta</option>	
        		<option value="108">Marshall Islands</option>	
        		<option value="109">Mauritania</option>	
        		<option value="110">Mauritius</option>	
        		<option value="111">Mexico</option>	
        		<option value="112">Micronesia</option>	
        		<option value="113">Moldova</option>	
        		<option value="114">Monaco</option>	
        		<option value="115">Mongolia</option>	
        		<option value="116">Montenegro</option>	
        		<option value="117">Morocco</option>	
        		<option value="118">Mozambique</option>	
        		<option value="119">Myanmar (Burma)</option>	
        		<option value="120">Namibia</option>	
        		<option value="121">Nauru</option>	
        		<option value="122">Nepal</option>	
        		<option value="123">Netherlands</option>	
        		<option value="124">New Zealand</option>	
        		<option value="125">Nicaragua</option>	
        		<option value="126">Niger</option>	
        		<option value="127">Nigeria</option>	
        		<option value="128">North Korea</option>	
        		<option value="129">Norway</option>	
        		<option value="130">Oman</option>	
        		<option value="131">Pakistan</option>	
        		<option value="132">Palau</option>	
        		<option value="133">Palestine</option>	
        		<option value="134">Panama</option>	
        		<option value="135">Papua New Guinea</option>	
        		<option value="136">Paraguay</option>	
        		<option value="137">Peru</option>	
        		<option value="138">Philippines</option>	
        		<option value="139">Poland</option>	
        		<option value="140">Portugal</option>	
        		<option value="141">Qatar</option>	
        		<option value="142">Romania</option>	
        		<option value="143">Russia</option>	
        		<option value="144">Rwanda</option>	
        		<option value="148">Samoa</option>	
        		<option value="149">San Marino</option>	
        		<option value="150">Sao Tome and Principe</option>	
        		<option value="151">Saudi Arabia</option>	
        		<option value="152">Senegal</option>	
        		<option value="153">Serbia</option>	
        		<option value="154">Seychelles</option>	
        		<option value="155">Sierra Leone</option>	
        		<option value="156">Singapore</option>	
        		<option value="157">Slovakia</option>	
        		<option value="158">Slovenia</option>	
        		<option value="159">Solomon Islands</option>	
        		<option value="160">Somalia</option>	
        		<option value="161">South Africa</option>	
        		<option value="162">South Korea</option>	
        		<option value="163">South Sudan</option>	
        		<option value="164">Spain</option>	
        		<option value="165">Sri Lanka</option>	
        		<option value="145">St. Kitts and Nevis</option>	
        		<option value="146">St. Lucia</option>	
        		<option value="147">St. Vincent and The Grenadines</option>	
        		<option value="166">Sudan</option>	
        		<option value="167">Suriname</option>	
        		<option value="168">Swaziland</option>	
        		<option value="169">Sweden</option>	
        		<option value="170">Switzerland</option>	
        		<option value="171">Syria</option>	
        		<option value="172">Taiwan</option>	
        		<option value="173">Tajikistan</option>	
        		<option value="174">Tanzania</option>	
        		<option value="175">Thailand</option>	
        		<option value="176">Timor-Leste</option>	
        		<option value="177">Togo</option>	
        		<option value="178">Tonga</option>	
        		<option value="179">Trinidad and Tobago</option>	
        		<option value="180">Tunisia</option>	
        		<option value="181">Turkey</option>	
        		<option value="182">Turkmenistan</option>	
        		<option value="183">Tuvalu</option>	
        		<option value="184">Uganda</option>	
        		<option value="185">Ukraine</option>	
        		<option value="186">United Arab Emirates</option>	
        		<option value="187">United Kingdom (UK)</option>	
        		<option value="188">United States of America (USA)</option>	
        		<option value="189">Uruguay</option>	
        		<option value="190">Uzbekistan</option>	
        		<option value="191">Vanuatu</option>	
        		<option value="192">Vatican City (Holy See)</option>	
        		<option value="193">Venezuela</option>	
        		<option value="194">Vietnam</option>	
        		<option value="195">Yemen</option>	
        		<option value="196">Zambia</option>	
        		<option value="197">Zimbabwe</option>	
        </select>
</div>
</div>
<div class="col-sm-3 col-md-3 srch">
<div class="form-group col-xs-10 box"><input type="text" class="form-control" placeholder="Search" id="search_name" name="search_name" label="search_for_name" value=""></div>
<div class="form-group col-xs-2 col-sm-2 box"><input type="submit" id="Search_btn" name="Search_btn" value="" class="form-control btn-search"></div>
</div>
</div>
</form>
</div>
<div class="col-sm-12 col-md-12 ad_md">
<div id="google-ads-1"></div>
<script async src="pagead/js/adsbygoogle.js"></script>
<!-- Ucslist2nd -->
<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1104938655908015" data-ad-slot="8446228483" data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-58961290-1', 'auto');
  ga('send', 'pageview');
</script>
<script type="text/javascript" src="js/jquery.min.js"></script>
</div><style>
.scrollToTop{
	width:100px; 
	height:130px;
	padding:10px; 
	text-align:center; 
	background: whiteSmoke;
	font-weight: bold;
	color: #444;
	text-decoration: none;
	position:fixed;
	top:500px;
	right:40px;
	/*display:none;*/
	background: url('https://ucslist.com/arrow_up.png') no-repeat 0px 20px;
}
.scrollToTop:hover{
	text-decoration:none;
}
</style>
</div>
</div>
<a href="#" class="scrollToTop"><img src="images/scrolltop.png" border="0" alt="Scroll to Top" class="img-responsive" title="Scroll to Top"/></a>
<section class="server-list">
<h1>Clash of clans - Boom Beach - Clash Royale servers list</h1>
</div>
<div class="container" id="results">
<div class="row"><div class="col-sm-3 col-md-3">	<div class="ad_area">
			<div class="fb-page" data-href="https://www.facebook.com/ucslistcom" data-width="340" data-hide-cover="false" data-show-facepile="true"></div>
			</div><div class="ad_area">
			<script async src="pagead/js/adsbygoogle.js"></script>
<!-- UCSLIST -->
<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1104938655908015" data-ad-slot="3118664082" data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>                                            
			</div>
			</div>
			
			
			<?
while ($onhold = mysql_fetch_array($onhold_al)){

$tarih = $onhold["tarih"];
$tarih = date("d/m/Y",$tarih);

if ( strlen(strip_tags($onhold["url"])) > 31 ) $url = substr(strip_tags($onhold["url"]), 0, 31)."...";
else $url = strip_tags($onhold["url"]);
?>

<div class="col-sm-6 col-md-6"><a href="view.php?id=<? echo $onhold["id"] ?>" style="text-decoration:none;">
						<div class="white">
						<div class="table-responsive">
						<table class="table-blue">
						<tr>
						<td colspan="4" class="mc"><h3> <? echo' '.$onhold["id"].' '?>.  <? echo' '.$onhold["hacker"].' '?></h3></td>
						</tr>
						<tr>
						<td class="white" align="center" style="border-right:white 1px solid;"><img src="uploads/logo/server_default.png" width="80" height="80" class="img-thumbnail"/></td><td colspan="3" class="white"><? echo' '.$onhold["note"].' '?></td>
					 </tr>
					 <tr>
						<td width="20%">STATUS</td><td width="40%">Website</td><td width="20%">Game Type</td><td width="15%">Votes</td>
					</tr>
					<tr>
						<td><font color="GREEN">ONLINE</font></td><td><? echo $url; ?></td><td><img src="uploads/game/icon_1466487346.jpg" border="0" width="50" height="50" class="img-thumbnail"/></td><td>775000</td>
					</tr>						
					
		
				
				
					</table>
					</div>
					</div>
					</a></div>
					<?}
?>
			<div class="col-sm-3 col-md-3">
			<div class="ad_area-rt">
			<script async src="pagead/js/adsbygoogle.js"></script>
<!-- UCSLIST -->
<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1104938655908015" data-ad-slot="3118664082" data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>                                            
			</div>
			</div>
			</div>
</div>
</section>
<div class="animation_image" style="display:none" align="center"><img src="images/ajax-loader.gif"></div>
<div align="center">Click the down arrow to refresh <!--&#8595;--><br/><a href="javascript:void(0);" id="load_more"><img src="images/more.png" border="0" title="Refresh More" alt="Refresh More"/></a></div>
<script type="text/javascript">
function DaysHMSCounter(initDate, id){
    this.counterDate = new Date(initDate);
    this.container = document.getElementById(id);
    this.update();
}
DaysHMSCounter.prototype.calculateUnit=function(secDiff, unitSeconds){
    var tmp = Math.abs((tmp = secDiff/unitSeconds)) < 1? 0 : tmp;
    return Math.abs(tmp < 0 ? Math.ceil(tmp) : Math.floor(tmp));
}
DaysHMSCounter.prototype.calculate=function(){
    var secDiff = Math.abs(Math.round(((new Date()) - this.counterDate)/1000));
    this.days = this.calculateUnit(secDiff,86400);
    this.hours = this.calculateUnit((secDiff-(this.days*86400)),3600);
    this.mins = this.calculateUnit((secDiff-(this.days*86400)-(this.hours*3600)),60);
    this.secs = this.calculateUnit((secDiff-(this.days*86400)-(this.hours*3600)-(this.mins*60)),1);
}
DaysHMSCounter.prototype.update=function(){ 
    this.calculate();
    this.container.innerHTML =
		"Votes resets on "+
        " <strong>" + this.days + "</strong> " + (this.days == 1? "day" : "days") +
        " <strong>" + this.hours + "</strong> " + (this.hours == 1? "hour" : "hours") +
        " <strong>" + this.mins + "</strong> " + (this.mins == 1? "min" : "mins") +
        " <strong>" + this.secs + "</strong> " + (this.secs == 1? "sec" : "secs");
    var self = this;
    setTimeout(function(){self.update();}, (1000));
}
window.onload=function(){ new DaysHMSCounter('September 30, 2017 23:59:59', 'counter'); }
</script>
</head>
<div class="container">
<div class="row">
<div class="col-sm-12 col-md-12 ad-btm">
<div id="google-ads-1"></div>
<script async src="pagead/js/adsbygoogle.js"></script>
<!-- ucs-FOOTER -->
<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1104938655908015" data-ad-slot="3457625688" data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<footer>
<div class="col-sm-3 col-md-3 center"><img src="images/logo.png" alt="Clash Of Clans Server List Logo" class="img-responsive logo">
<h4> Clash of clans list, you can find new clash of clans server to join. Vote and follow your favorite coc server! ucs list: Your clash of clans companion!</h4></div>
<div class="col-sm-5 col-sm-offset-1 col-md-5 col-md-offset-1">
<div id="counter"></div>
<h4>Useful Links</h4>
<div class="row">
<div class=" col-sm-5 col-md-5">
<a href="submit.php">Add Server</a><br>
<a href="#">Contact</a><br>
</div>
<div class=" col-sm-5 col-md-5">
<a href="/">Home</a><br>
</div>
</div>
</div>
<div class="col-sm-3 col-md-3">
<h4>Follow US</h4>
<a href="https://www.facebook.com/ucslistcom" target="_blank" class="fa fa-facebook"></a> <a href="#" class="fa fa-twitter"></a>
</div>
<div class="col-sm-12 cpl-md-12 terms">Language: English &nbsp;  &nbsp; Terms of Service - Privacy Policy - Disclaimer - Copyright &copy; 2016 Ultrapowa Clash Server List. All rights reserved. Powered by: <a href="" target="_blank">Ultrapowa</a></div>
</footer>
</div>
</div>
<script src="js/bootstrap.min.js"></script>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-sm">
  <!-- Modal content-->
<div class="modal-content" align="left">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Login</h4>
</div>
<div class="modal-body">
<div class="alert alert-dismissible alert-danger" id="err_login" style="display:none;">
    <button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
    Authentication Failed!
</div>
<form name="form_Login" id="form_Login" action="" method="post">
<p><input name="log_username" id="log_username" type="text" class="form-control" required="required" value="" placeholder="Username or Email"/>
</p>
<p>
<input name="log_password" id="log_password" type="password" class="form-control" required="required" value="" placeholder="Password"/>
</p>
<p>
<input type="reset" name="Cancel" value="Cancel" class="btn btn-default">
<input type="submit" name="Submit" value="Sign In" class="btn btn-primary">
</p>
<p><a id="modal_recoverPassword" href="#"><font size="-1">Forgot Password?</font></a></p>
<p><a href="facebook/fbconfig/"><img src="images/facebook-login-button.png" border="0" alt="Sign in with facebook" class="img-responsive"/></a></p>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!-- modal for forgot password-->
<div class="modal fade" id="modal_forgotPassword" role="dialog">
<div class="modal-dialog modal-sm">
  <!-- Modal content-->
<div class="modal-content" align="left">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Recover password</h4>
</div>
<div class="modal-body">
<div class="alert alert-dismissible alert-danger" id="err_email" style="display:none;">
    <button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
    This email is not registered!
</div>
<div class="alert alert-dismissible alert-success" id="succ_email" style="display:none;">
    <button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
    Password reset link has sent!
</div>
<form name="form_recoverPassword" id="form_recoverPassword" action="" method="post">
<p><input name="log_email" id="log_email" type="email" class="form-control" required="required" value="" placeholder="Registered Email ID"/>
</p>
<p>
<input type="reset" name="Cancel" value="Cancel" class="btn btn-default">
<input type="submit" name="Submit" value="Send Reset Link" class="btn btn-primary">
</p>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!-- Vote -->
<div class="modal fade" id="modalVote" role="dialog">
<div class="modal-dialog modal-sm">
<!-- Modal content-->
<div class="modal-content" align="left">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title" id="vote_title">Vote</h4>
</div>
<div class="modal-body">
<form name="form_Vote" id="form_Vote" action="" method="post">
<input type="hidden" id="vote_server_id" name="vote_server_id" value=""/>
<p>
<div class="g-recaptcha" data-sitekey="6LczHQcUAAAAAHaX8lUepmDFb64pfXr94u4R_IoG" style="width:80%;"></div>
</p>
<p>
<input type="submit" name="Submit" value="Vote" class="btn btn-primary">
</p>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!-- Favorite -->
<div class="modal fade" id="modalFavorite" role="dialog">
<div class="modal-dialog modal-sm" style="width:25%;">
  <!-- Modal content-->
<div class="modal-content" align="left">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title" id="favorite_title">Add to Favorites</h4>
</div>
<div class="modal-body">
<form name="form_Favorite" id="form_Favorite" action="" method="post">
<input type="hidden" id="fav_server_id" name="fav_server_id" value=""/>
<p>
<div class="g-recaptcha" data-sitekey="6LczHQcUAAAAAHaX8lUepmDFb64pfXr94u4R_IoG" style="width:auto;"></div>
</p>
<p>
<input type="submit" name="Submit" value="Submit" class="btn btn-primary">
</p>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!-- Subscription -->
<div class="modal fade" id="modalSubscribe" role="dialog">
<div class="modal-dialog modal-sm">
  <!-- Modal content-->
<div class="modal-content" align="left">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title" id="favorite_title">Subscribe News</h4>
</div>
<div class="modal-body">
<form name="form_Subscribe" id="form_Subscribe" action="" method="post">
<input type="hidden" id="sub_server_id" name="sub_server_id" value=""/>
<p>
<input type="email" name="subscriber_email" id="subscriber_email" class="form-control" value="" placeholder="Enter your email id" required="required"/>
</p>
<p>
<input type="submit" name="Submit" value="Submit" class="btn btn-primary">
</p>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!-- Remove Subscription -->
<div class="modal fade" id="modalRemoveSubscription" role="dialog">
<div class="modal-dialog modal-sm">
  <!-- Modal content-->
<div class="modal-content" align="left">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title" id="favorite_title">Subscription Removal</h4>
</div>
<div class="modal-body">
<form name="form_Unsubscribe" id="form_Unsubscribe" action="" method="post">
<input type="hidden" id="sub_removal_id" name="sub_removal_id" value=""/>
<p>
<textarea name="removal_reason" id="removal_reason" class="form-control" required="required" placeholder="What is the reason for removal?"></textarea>
</p>
<p>
<input type="submit" name="Submit" value="Submit" class="btn btn-primary">
</p>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!-- -->
<!-- Guidance -->
<div class="modal fade" id="modal_guidance" role="dialog">
<div class="modal-dialog modal-lg">
  <!-- Modal content-->
<div class="modal-content" align="left">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">User Guide</h4>
</div>
<div class="modal-body">
<p><font face="Verdana"><b><span style="font-size: 14px;">Welcome</span></b><span style="font-size: 14px;"> to the new and improved version of Ultra Powa Clash Server List. The new version is responsive and mobile friendly, so you can view and manage the website in your mobile or tablet device more conveniently.</span></font></p><p><font face="Verdana"><span style="font-size: 14px;"><span style="font-size: 14px;">The new&nbsp;website&nbsp;has all </span><span style="font-size: 14px;">the existing features of the previous version and is enhanced with some additional features. New search area in the top of the page lets you find your favorite servers quickly. In the server list, now it has become easy to identify online and offline servers by its color. The blue colored row is the online server and black colored is offline or under maintenance. </span></span></font></p><p><font face="Verdana"><span style="font-size: 14px;"><span style="font-size: 14px;">Upcoming features in home page are:</span><br></span></font></p><p><font face="Verdana"><span style="font-size: 14px;"><span style="font-size: 14px;">1) Highlighted servers displayed on the top of the page.</span></span></font></p><p><font face="Verdana"><span style="font-size: 14px;"><span style="font-size: 14px;">2) Widgets on side bars in which you can easily monitor the top 3 servers, latest 3 servers and servers with most uptime.</span></span></font></p><p><font face="Verdana"><span style="font-size: 14px;"><span style="font-size: 14px;">3) FAQ link to clear your doubts.</span></span></font></p><p><font face="Verdana"><span style="font-size: 14px;"><span style="font-size: 14px;">4) Statistics of users of server for last 7 days.</span></span></font></p><p><font face="Verdana"><span style="font-size: 14px;">If you have an active Facebook&nbsp;account, you can </span><span style="background-color: rgb(255, 255, 0); font-size: 14px;">login through your&nbsp;Facebook&nbsp;without registration</span><span style="font-size: 14px;">. A welcome email with the login credentials will be sent to your email id for both manually registered members and for those who logged in using&nbsp;Facebook. Upon logging in&nbsp;you will be redirected to your new dashboard where you can manage your profile, servers and other settings. </span></font></p><p><font face="Verdana"><span style="font-size: 14px;">Upcoming features in the dashboard are: </span></font></p><p><font face="Verdana"><span style="font-size: 14px;"><span style="font-size: 14px;">1) You can view last 10 votes received for each server.</span></span></font></p><p><font face="Verdana"><span style="font-size: 14px;"><span style="font-size: 14px;">2)&nbsp;</span></span><span style="font-size: 14px; line-height: 1.42857;">You can m</span><span style="line-height: 1.42857; font-size: 14px;">anage your server subscriptions.</span></font></p><p><font face="Verdana"><span style="line-height: 1.42857; font-size: 14px;">3) Admin announcements.</span></font></p><p><font face="Verdana"><span style="font-size: 14px;"><span style="font-size: 14px;">4) Purchasing and renewal of highlighted positions.</span></span></font></p><p><font face="Verdana"><span style="font-size: 14px;">Going to the server page, the details of the server are displayed in a new interface. Statistics of server votes in last 24 hours and last 7 days can be monitored in a graph. Logged in users as well as guests can vote for a server every 12 hours. If your server have a&nbsp;YouTube video it will be shown in the bottom of the page. </span></font></p><p><font face="Verdana"><span style="font-size: 14px;">Upcoming features in server page are:</span></font></p><p><font face="Verdana"><span style="font-size: 14px;">1) News section in server tab.</span></font></p><p><font face="Verdana"><span style="font-size: 14px;">2) Discussion forum.</span></font></p><p><font face="Verdana"><span style="font-size: 14px;">3) Social media profiles.</span></font></p><p><font face="Verdana"><span style="font-size: 14px;">The website is under improvisation and new features will be updated shortly.</span></font></p></div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!-- Alert Box-->
<div class="modal fade" id="modal_alert_time" role="dialog">
<div class="modal-dialog modal-md">
  <!-- Modal content-->
<div class="modal-content" align="left">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <div class="alert alert-warning">
    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    	<strong>Warning!</strong> You can vote only once in 12 hours!
    </div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<div class="modal fade" id="modal_alert_duplicate" role="dialog">
<div class="modal-dialog modal-md">
  <!-- Modal content-->
<div class="modal-content" align="left">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <div class="alert alert-warning">
    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    	<strong>Warning!</strong> You have already voted for this server.
    </div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<div class="modal fade" id="modal_alert_captcha" role="dialog">
<div class="modal-dialog modal-md">
  <!-- Modal content-->
<div class="modal-content" align="left">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <div class="alert alert-warning">
    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    	<strong>Warning!</strong> Invalid Captcha
    </div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<div class="modal fade" id="modal_alert_ip" role="dialog">
<div class="modal-dialog modal-md">
  <!-- Modal content-->
<div class="modal-content" align="left">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <div class="alert alert-warning">
    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    	<strong>Warning!</strong> Invalid IP Address
    </div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<div class="modal fade" id="modal_alert_subscription" role="dialog">
<div class="modal-dialog modal-md">
  <!-- Modal content-->
<div class="modal-content" align="left">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <div class="alert alert-warning" id="duplicateSubscription" style="display:none;">
    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    	<strong>Warning!</strong> You have already subscribed.
    </div>
    <div class="alert alert-success" id="successSubscription" style="display:none;">
    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    	Your subscription was successfull!
    </div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<script type="text/javascript">
$(function(){
	$("#form_Login").submit(function(){
		var log_username	=	$("#log_username").val();
		var log_password	=	$("#log_password").val();
		var separator		=	"CHECK_LOGIN";
		$.ajax({
			type: "POST",
			url: "https://ucslist.com/ajax",
			data: "log_username="+log_username+"&log_password="+log_password+"&separator="+separator,
			cache: false,
			success: function(msg){
				if (msg == 'false') {
					$("#err_login").show();
				}
				else {
					$("#err_login").hide();
					window.location.href="https://ucslist.com/dashboard";
				}
			},
			error: function(){
				alert('Something went wrong!');
			}
		});
		return false;
	});
	$("#modal_recoverPassword").click(function(){
		 $('#myModal').modal('hide');
		 $('#modal_forgotPassword').modal('show');
	});
	$("#form_recoverPassword").submit(function(){
		var log_email	=	$("#log_email").val();
		var separator	=	"RESET_PASSWORD";
		$.ajax({
			type: "POST",
			url: "https://ucslist.com/ajax",
			data: "log_email="+log_email+"&separator="+separator,
			cache: false,
			success: function(msg){
				if (msg == 'false') {
					$("#err_email").show();
					$("#succ_email").hide();
				}
				else {
					$("#err_email").hide();
					$("#succ_email").show();
					$("#log_email").val('');
				}
			},
			error: function(){
				alert('Something went wrong!');
			}
		});
		return false;
	});
	$("#voteLink").click(function(){
		var server_dtl	=	$(this).data('id');
		var server_arr	=	server_dtl.split('*');
		var server_id	=	server_arr[1];
		var server_name	=	server_arr[0];
		$("#form_Vote #vote_server_id").val(server_id);
		$("#vote_title").html(server_name);
	});
	$("#form_Vote").submit(function(){
		var separator		=	"VOTE";
		var vote_server_id	=	$("#vote_server_id").val();
		var cv	=	'8561a9951ff868b5fd3e734dd7b970c0';	
		$.ajax({
			type: "POST",
			url: "https://ucslist.com/ajax",
			data: "val=&vote_server_id="+vote_server_id+"&separator="+separator+'&cv='+cv+'&grecaptcha='+grecaptcha.getResponse(),
			cache: false,
			success: function(msg){
				//alert(msg);
				if (msg == 'time_not_reached') {
					$('#modal_alert_time').modal('show');
					//alert("You can vote only once in 12 hours!");
					return false;
				}
				else if (msg == 'user_duplicate_vote') {
					$('#modal_alert_duplicate').modal('show');
//					alert('You have already voted for this server.');
					return false;
				}
				else if (msg == 'invalid_ip') {
					$('#modal_alert_ip').modal('show');
					return false;
				}
				else if (msg == 'invalid_captcha') {
					$('#modal_alert_captcha').modal('show');
					return false;
				}
				else {
					window.location.reload();
				}
			},
			error: function(){
				alert('Process failed!');
				return false;
			}
		});
		return false;
	});
	$("#favoriteLink").click(function(){
		var server_dtl	=	$(this).data('id');
		var server_arr	=	server_dtl.split('*');
		var server_id	=	server_arr[1];
		var server_name	=	server_arr[0];
		$("#form_Favorite #fav_server_id").val(server_id);
		$("#favorite_title").html(server_name);
	});
	$("#form_Favorite").submit(function(){
		var separator		=	"FAVORITE";
		var fav_server_id	=	$("#fav_server_id").val();	
		$.ajax({
			type: "POST",
			url: "https://ucslist.com/ajax",
			data: "val=&fav_server_id="+fav_server_id+"&separator="+separator,
			cache: false,
			success: function(msg){
				window.location.reload();
			},
			error: function(){
				alert('Process failed!');
				return false;
			}
		});
		return false;
	});
	$("#form_Subscribe").submit(function(){
		$("#modalSubscribe").modal('hide');
		var separator	=	"GUEST_SUBSCRIPTION";
		var server_id	=	$("#sub_server_id").val();
		var email_id	=	$("#subscriber_email").val();
		$.ajax({
			type: "POST",
			url: "https://ucslist.com/ajax",
			data: "val="+email_id+"&server_id="+server_id+"&separator="+separator,
			cache: false,
			success: function(msg){
				if (msg == 'duplicate') {
					$("#modal_alert_subscription").modal('show');
					$("#duplicateSubscription").show();
					$("#successSubscription").hide();
				}
				else if (msg == 'true'){
					$("#modal_alert_subscription").modal('show');
					$("#duplicateSubscription").hide();
					$("#successSubscription").show();
				}
			},
			error: function() {
				alert('Process failed!');
				return false;
			}
		});
		return false;
	});
	// banner dimension
	$("#banner_dimension, #b_name, #b_motto, #b_status, #b_rank, #b_uptime").change(function(){
		var param		=	$("#banner_dimension").val();
		var voices		=	'';
		var separator	=	"DRAW_IMAGE";
		if($("#b_name"). prop("checked") == true){
			voices	+=	'*N'; 
		}
		if ($("#b_motto"). prop("checked") == true) {
			voices	+=	'*M'; 
		}
		if ($("#b_status"). prop("checked") == true) {
			voices	+=	'*S'; 
		}
		if ($("#b_rank"). prop("checked") == true) {
			voices	+=	'*R'; 
		}
		if ($("#b_uptime"). prop("checked") == true) {
			voices	+=	'*U'; 
		}
		var param_arr	=	param.split('|');
		var dimensions	=	param_arr[0];
		var identifier	=	param_arr[1];
		var page_no		=	param_arr[2];
		var encoded		=	btoa(identifier);
		var dim_arr		=	dimensions.split('x');
		var new_width	=	dim_arr[0];
		var new_height	=	dim_arr[1];
		$("#draw_image").attr('src', 'draw/image_param/'+encoded+'&show='+btoa(voices)+'&w='+new_width+'&h='+new_height);
		$("#html_code").val('<a href="/'+identifier+'" target="_blank"><img src="draw/image_param/'+encoded+'&show='+btoa(voices)+'&w='+new_width+'&h='+new_height+'" /></a>');
		$("#bb_code").val('[url=https://ucslist.com/'+identifier+'[img]https://ucslist.com/draw/image.php?param='+encoded+'&show='+btoa(voices)+'&w='+new_width+'&h='+new_height+'[/img][/url]');
		/*$.ajax({
			type: "POST",
			url: "php/ajax/ajax_master/",
			data: "param="+param+"&separator="+separator,
			cache: false,
			success: function(msg){
				alert(msg);
			},
			error: function(){
				alert('Process failed!');
				return false;
			}
		});*/
		return false;
	});
	$('#form_Unsubscribe').submit(function(){
		var sub_id			=	$("#sub_removal_id").val();
		var removal_reason	=	$('#removal_reason').val();
		var separator	=	'UNSUBSCRIBE';
		$.ajax({
			type: "POST",
			url: "https://ucslist.com/ajax",
			data: "sub_id="+sub_id+"&removal_reason="+btoa(removal_reason)+"&separator="+separator,
			cache: false,
			success: function(msg){
				if (msg == 'true') {
					window.location.reload();
				}
			},
			error: function(){
				alert('Process failed!');
				return false;
			}
		});
		return false;
	});
});
function confirmDelete(label) {
	if (confirm('Are you sure to delete this '+label+'? The process cannot be undo.')) {
		return true;
	}
	else {
		return false;
	}
}
function add_Favorites(server_id) {
	if (confirm('Are you sure to add this to your favorite?')) {
		var separator		=	"FAVORITE";
//		var fav_server_id	=	server_id;	
		$.ajax({
			type: "POST",
			url: "https://ucslist.com/ajax",
			data: "val=&fav_server_id="+server_id+"&separator="+separator,
			cache: false,
			success: function(msg){
				window.location.reload();
			},
			error: function(){
				alert('Process failed!');
				return false;
			}
		});
		return false;
	}
	else {
		return false;
	}
}
// news subscribe
function subscribe_news(server_id) {
	if (confirm('Are you sure to subscribe to this server?')) {
		var user_id	=	'';
		if (user_id == '') {
			$("#sub_server_id").val(server_id);
			$("#modalSubscribe").modal('show');
			$("#subscriber_email").val('');
		}
		else {
			var separator = 'USER_SUBSCRIPTION';
			$.ajax({
				type: "POST",
				url: "https://ucslist.com/ajax",
				data: 'server_id='+server_id+'&user_id='+user_id+'&separator='+separator,
				cache: false,
				success: function(msg){
					if (msg == 'duplicate') {
						$("#modal_alert_subscription").modal('show');
						$("#duplicateSubscription").show();
						$("#successSubscription").hide();
					}
					else if (msg == 'true'){
						$("#modal_alert_subscription").modal('show');
						$("#duplicateSubscription").hide();
						$("#successSubscription").show();
					}
					return false;
				},
				error: function(){
					alert('Process failed!');
					return false;
				}
			});
		}
	}
	else {
		return false;
	}
}
function removeSubscriber(subid) {
	if (confirm('Are you sure to remove this subscriber?')) {
		$('#sub_removal_id').val(subid);
		$("#modalRemoveSubscription").modal('show');	
	}
	else {
		return false;
	}
}
</script>
<script src="js/jquery.bootstrap.newsbox.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function () {
		$(".demo1").bootstrapNews({
            newsPerPage: 3,
            autoplay: true,
			pauseOnHover:true,
            direction: 'up',
            newsTickerInterval: 4000,
            onToDo: function () {
                //console.log(this);
            }
        });
	});
</script>
<script type="text/javascript">
/*window.setInterval(function(){
	set_server_status();
}, 900000);*/
function set_server_status() {
	var separator	=	"SET_SERVER_STATUS";
	$.ajax({
		type: "POST",
		url: "https://ucslist.com/ajax",
		data: 'separator='+separator,
		cache: false,
		success: function(msg){
			//alert(msg);
		},
		error: function(){
			//
		}
	});
}
</script>
<script id="dsq-count-scr" src="count.js" async></script>
</body>
</html>
<script type="text/javascript">
$(document).ready(function() {
	//$("#results").html('');
	var track_load = 1; //total loaded record group(s)
	var loading  = false; //to prevents multipal ajax loads
	var total_groups = 140; //total record group(s)
	 //load first group
	$("#load_more").click(function(){
		if(track_load <= total_groups && loading==false) //there's more data to load
		{
			loading = true; //prevent further ajax loading
			$('.animation_image').show(); //show loading image
			//load data from the server using a HTTP POST request
			$.post('https://ucslist.com/autoload',{'group_no': track_load,'search_sort':'','search_status':'','search_game':'','search_country':'','search_name':'','highlight_count':'5'}, function(data){
				$("#results").append(data); //append received data into the element
				//hide loading image
				$('.animation_image').hide(); //hide loading image once data is received
				track_load++; //loaded group increment
				loading = false; 
			}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
				alert(thrownError); //alert with HTTP error
				$('.animation_image').hide(); //hide loading image
				loading = false;
			});
		}
	});
	//$(window).scroll(function() { //detect page scroll
//		
//		//if($(window).scrollTop() + $(window).height() == $(document).height())  //user scrolled to bottom of the page?
//		if ($(window).scrollTop() >= ($(document).height() - $(window).height())*0.7)
//		{
//			
//			
//		}
//		
//		/*if ($(this).scrollTop() > 300) {
//			$('.scrollToTop').fadeIn();
//		} else {
//			$('.scrollToTop').fadeOut();
//		}*/
//		
//	});
	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
});
</script>