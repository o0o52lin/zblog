
<div class="mainleft fl <?php if ($zbp->Config('ydcms')->sidegs) { ?>side_relates<?php } ?>" >
   	<?php if ($type=='index') { ?>
    	<?php  include $this->GetTemplate('sidebar');  ?>
    <?php }elseif($type=='category') {  ?> 
    	<?php  include $this->GetTemplate('sidebar2');  ?>
    <?php }elseif($type=='article') {  ?>
    	<?php  include $this->GetTemplate('sidebar3');  ?>
    <?php }elseif($type=='page') {  ?>
    	<?php  include $this->GetTemplate('sidebar4');  ?>
    <?php }else{  ?>
    	<?php  include $this->GetTemplate('sidebar5');  ?>
    <?php } ?>
</div>