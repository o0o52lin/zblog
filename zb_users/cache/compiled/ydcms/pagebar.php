
<?php if ($pagebar) { ?>
<div class="pagebar">
	<?php  foreach ( $pagebar->buttons as $k=>$v) { ?>
	<?php if ($pagebar->PageNow==$k) { ?>
	<span><?php  echo $k;  ?></span>
	<?php }elseif($k=='‹‹' and $pagebar->PageNow!=$pagebar->PageFirst) {  ?>
	<a href="<?php  echo $v;  ?>">‹‹</a>
	<?php }elseif($k=='‹‹' and $pagebar->PageNow==$pagebar->PageFirst) {  ?>
	<?php }elseif($k=='››' and $pagebar->PageNow==$pagebar->PageLast) {  ?>
	<?php }elseif($k=='››' and $pagebar->PageNow!=$pagebar->PageLast) {  ?>
	<a href="<?php  echo $v;  ?>">››</a>
	<?php }elseif($k=='‹') {  ?>
	<a href="<?php  echo $v;  ?>">‹</a>
	<?php }elseif($k=='›') {  ?>
	<a href="<?php  echo $v;  ?>" class="next">›</a>
	<?php }else{  ?>
	<a href="<?php  echo $v;  ?>"><?php  echo $k;  ?></a>
	<?php } ?>
	<?php }   ?>
</div>
<?php } ?>