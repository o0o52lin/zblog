<?php echo'404';die();?>
<div class="mainleft fl {if $zbp->Config('ydcms')->sidegs}side_relates{/if}" >
   	{if $type=='index'}
    	{template:sidebar}
    {elseif $type=='category'} 
    	{template:sidebar2}
    {elseif $type=='article'}
    	{template:sidebar3}
    {elseif $type=='page'}
    	{template:sidebar4}
    {else}
    	{template:sidebar5}
    {/if}
</div>