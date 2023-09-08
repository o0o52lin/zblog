<?php echo'404';die();?>{template:header}
<body>
{template:post-nav}
<main>
	<div id="main" class="container clear">
		<div class="mainright">
			{if $zbp->Config('ydcms')->slider}{if $type=='index'&&$page=='1'}{template:post-slider}{/if}{/if}
			{if $type=='index'&&$page=='1'&&$zbp->Config('ydcms')->Moreimg}
			{template:post-cms-img}
			{/if}
			{template:post-breadcrumb}
			<div class="mainlist">
				<ul {if $zbp->Config('ydcms')->wxjz} id="divMain" {/if}>
					{foreach $articles as $key=>$article}{$i = $key+1}{if $article.IsTop}{template:post-istop}{else}{template:post-multi}{/if}{/foreach}
				</ul>
				{template:pagebar}
			</div>
			<!--//-->
		</div>
		{template:post-left}
	</div>
</main>
<!--//main-->

{template:footer}