<?php global $helpdesk; ?>
<?php if ( $helpdesk['headline_search'] == 2 ) { ?>
	<form class="navbar-form search-main" role="filter">
	  <div class="search-form-group">
	    <span class="icon-Magnifi-Glass2"></span>
	    <input type="search" class="form-control" placeholder="<?php echo $helpdesk['search_placeholder']; ?>" name="searchcat" id="searchcat">
	  </div>
	</form>
<?php } ?>