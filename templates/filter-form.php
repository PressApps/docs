<?php global $docs; ?>
<?php if ( $docs['header_filter']) { ?>
	<div class="navbar-form search-main" role="filter">
	  <div class="search-form-group">
	    <span class="icon-Magnifi-Glass2"></span>
	    <input type="search" class="form-control" placeholder="<?php echo $docs['filter_placeholder']; ?>" name="searchcat" id="searchcat">
	  </div>
	</div>
<?php } ?>