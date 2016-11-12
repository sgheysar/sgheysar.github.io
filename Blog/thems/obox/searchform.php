<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">

<div><input type="text" value="" name="s" id="s" class="s" onblur="if (value ==''){this.className='s';} if (value !='') {this.className='s_over';} " onfocus="this.className='s_over'" />
<input type="submit" id="searchsubmit" value="Search" />
</div>
</form>
