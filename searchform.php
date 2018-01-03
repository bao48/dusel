  <form action="<?php echo home_url(); ?>" id="search-form" method="get">
      <input type="text" value="Looking for something?" name="s" id="s" onblur="if(this.value=='')this.value='Looking for something?'" onfocus="if(this.value=='Looking for something?')this.value=''" />
      <input type="hidden" value="submit" />
 </form>