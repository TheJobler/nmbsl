<?php ob_start(); ?>
<!DOCTYPE html>

<html>

<?php
	$page_directory = "pages";
	$surveys = "surveys";
	$extensions = Array("php","js");
	
	$construction = true;#set this variable when working on the site;
	
	$credentials['un'] = "ce922d89a6c244fb0c5aff66bc46e9be";
	$credentials['pw'] = "65b97bef814ce55421f32e3d7de444b9";
	if($construction){
		if(!((md5($_SERVER['PHP_AUTH_USER'])) == $credentials['un'] && (md5($_SERVER['PHP_AUTH_PW'])) == $credentials['pw'])){
			header("WWW-Authenticate: Basic realm=\"nomorebsl.org Site under Construction, Come back Soon!\"");
			header("HTTP/1.0 401 Unauthorized");
			echo '<div id = "authorization-required"><h1>401 Authentication Failed</h1></div>';
			exit;
		}
		
		include_once($page_directory.'/head.inc.'.$extensions[0]);
	}
	ob_flush();
?>



<body>
	<div class = "container">
		<div class = " no-sub" id = "headerbar">
		</div>
		
		<div class "no-sub" id = "navbar">
			<div class = "navigation">
				<ul id = "navbar-items">
					<li class = "no-sub"><a href = "javascript:link_scroll('#home')">Home</a></li>
					<li class = "no-sub"><a href = "javascript:link_scroll('#about')">About</a></li>
					<li class = "no-sub"><a href = "javascript:link_scroll('#bsl')">What is BSL?</a></li>
					<li class = "sub" id = "survey-menu"><a href = "javascript:link_scroll('#surveys')">Surveys</a></li>
					<li class = "sub" id = "shop-menu"><a href = "javascript:link_scroll('#shop')">Shop</a></li>
					<li class = "no-sub"><a href = "javascript:link_scroll('#contact')">Contact</a></li>
				</ul>
			</div>
		</div><!--     end navbar                                -->
		
		<div id = "extra-nav">
			<div class = "navigation">
				
			</div>
		</div>
		
		<span class = "view no-sub">
			
			
			<span id = "content">
			
				<div id = "home">
					<a href = "#1"><div class = "left-nav" onclick = "javascript:util_scroll('#home','left', true)"></div></a>
					
					<div class = "right-nav" onclick = "javascript:util_scroll('#home','right', false)"></div>
				</div>
				
				<div id = "about">
					<div class = "left-nav" onclick = "javascript:util_scroll('#about','left', false)"></div>
					<div class = "right-nav" onclick = "javascript:util_scroll('#about','right', false)"></div>
				</div>
				
				<div id = "bsl">
					<div class = "left-nav" onclick = "javascript:util_scroll('#bsl','left', false)"></div>
					<div class = "right-nav" onclick = "javascript:util_scroll('#bsl','right', false)"></div>
				</div>
				
				<div id = "surveys">
					<div class = "left-nav" onclick = "javascript:util_scroll('#surveys','left', false)"></div>
					<?php
						if(!empty($_GET['s'])){
							$pages = scandir($page_directory.'/'.$surveys,0);
							unset($pages[0],$pages[1]);
							$s = $_GET['s'];
							if(in_array($s.'.survey.'.$extensions[0],$pages)){
								include($page_directory.'/'.$surveys.'/'.$s.'.survey.'.$extensions[0]);
							}
							else include($page_directory.'/'.'forbidden'.'.inc.'.$extensions[0]);
						}
						else{
							include($page_directory.'/survey-home.inc.'.$extensions[0]);
						}
					?>
					<div class = "right-nav" onclick = "javascript:util_scroll('#surveys','right', false)"></div>
				</div>
				
				<div id = "shop">
					<div class = "left-nav" onclick = "javascript:util_scroll('#shop','left', false)"></div>
					<?php
						if(!empty($_GET['i'])){
							$pages = scandir($page_directory.'/'.$surveys,0);
							unset($pages[0],$pages[1]);
							$i = $_GET['i'];
							if(in_array($i.'.shop.'.$extensions[0],$pages)){
								include($page_directory.'/'.$surveys.'/'.$i.'.shop.'.$extensions[0]);
							}
							else include($page_directory.'/'.'forbidden'.'.inc.'.$extensions[0]);
						}
						else{
							include($page_directory.'/shop-home.inc.'.$extensions[0]);
						}
					?>
					<div class = "right-nav" onclick = "javascript:util_scroll('#shop','right', false)"></div>
				</div>
				
				<div id = "contact">
					<div class = "left-nav" onclick = "javascript:util_scroll('#contact','left', false)"></div>
					<div class = "right-nav" onclick = "javascript:util_scroll('#contact','right', true)"></div>
				</div>
				
			</span>
			
			
		</span>
		
	</div>
	
	<script type = "text/javascript" src = "http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type = "text/javascript" src = "scripts/utilities.js"></script>
	<script type = "text/javascript" src = "scripts/auto.js"     ></script>

</body>

</html>