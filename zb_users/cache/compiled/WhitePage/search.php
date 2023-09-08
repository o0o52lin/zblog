<?php  include $this->GetTemplate('header');  ?>
<body class="multi <?php  echo $type;  ?>">
<div class="background">
    <div class="background-image"></div>
    <div class="background-mask"></div>
</div>
<div class="mainmenu">
<ul>
<?php  if(isset($modules['menu'])){echo $modules['menu']->Content;}  ?>
</ul>
</div>
<div id="divAll">
	<div id="divPage">
	<div id="divMiddle">
		<div id="divTop">
			<h1 id="BlogTitle"><a href="<?php  echo $host;  ?>"><?php  echo $name;  ?></a></h1>
			<h3 id="BlogSubTitle"><?php  echo $subname;  ?></h3>
		</div>
		<div id="divNavBar">
<hr/>
<ul>
<?php  if(isset($modules['navbar'])){echo $modules['navbar']->Content;}  ?>
</ul>
<hr/>
		</div>
		<div id="divMain">
<div class="post istop">
	<h2 class="post-title"><?php  echo $article->Title;  ?></h2>
</div>
<?php  foreach ( $articles as $article) { ?>
<?php  include $this->GetTemplate('post-search');  ?>
<?php }   ?>
<?php if (count($articles)>0) { ?>
<div class="pagebar"><?php  include $this->GetTemplate('pagebar');  ?></div>
<?php } ?>
		</div>
		<div id="divSidebar">
<?php  include $this->GetTemplate('sidebar');  ?>
		</div>
<?php  include $this->GetTemplate('footer');  ?>