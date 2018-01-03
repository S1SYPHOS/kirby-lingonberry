<form class="search-form" method="get" action="<?= url('home') ?>">
  <input value="Type and press enter" onfocus="if(this.value=='Type and press enter')this.value='';" onblur="if(this.value=='')this.value='Type and press enter';" name="s" id="s" type="search">
  <input id="searchsubmit" class="button hidden" value="Search" type="submit">
</form>
