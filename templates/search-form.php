<?php global $helpdesk; ?>
<?php if ( $helpdesk['header_filter']) { ?>
	<form class="navbar-form search-main" role="filter">
	  <div class="search-form-group">
	    <span class="icon-Magnifi-Glass2"></span>
	    <input type="search" class="form-control" placeholder="<?php echo $helpdesk['filter_placeholder']; ?>" name="searchcat" id="searchcat">
	  </div>
	</form>
<?php } ?>