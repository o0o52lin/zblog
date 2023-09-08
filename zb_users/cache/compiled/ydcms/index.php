<?php  include $this->GetTemplate('header');  ?>
<body>
<?php  include $this->GetTemplate('post-nav');  ?>
<main>
	<div id="main" class="container clear">
		<div class="mainright">
			<?php if ($zbp->Config('ydcms')->slider) { ?><?php if ($type=='index'&&$page=='1') { ?><?php  include $this->GetTemplate('post-slider');  ?><?php } ?><?php } ?>
			<?php if ($type=='index'&&$page=='1'&&$zbp->Config('ydcms')->Moreimg) { ?>
			<?php  include $this->GetTemplate('post-cms-img');  ?>
			<?php } ?>
			<?php  include $this->GetTemplate('post-breadcrumb');  ?>
			<div class="mainlist">
				<ul <?php if ($zbp->Config('ydcms')->wxjz) { ?> id="divMain" <?php } ?>>
					<?php  foreach ( $articles as $key=>$article) { ?><?php  $i = $key+1;  ?><?php if ($article->IsTop) { ?><?php  include $this->GetTemplate('post-istop');  ?><?php }else{  ?><?php  include $this->GetTemplate('post-multi');  ?><?php } ?><?php }   ?>
				</ul>
				<?php  include $this->GetTemplate('pagebar');  ?>
			</div>
			<!--//-->
		</div>
		<?php  include $this->GetTemplate('post-left');  ?>
	</div>
</main>
<!--//main-->

<?php  include $this->GetTemplate('footer');  ?>