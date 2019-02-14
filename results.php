<?php /* Template Name: Results */ ?>
<?php get_header();
businex_inner_banner();
?>
<section class="wrapper wrap-detail-page">
	<div class="container">

	
	<h3>Search Messages</h3>
	<form method = "post" action="<?php echo site_url ("/results-page/"); ?>" id="searchform">
	
		<label>First Name<input type="text" name="p_fname"></label>
		<label>Last Name<input type="text" name="p_lname"></label>
		<label>Date of Birth<input type="date" name="p_dob"></label>
		<label>Passport Number<input type="text" name="p_passport"></label>
		<label>Message Date<input type="date" name="p_dateadded"></label>
		<input type = "submit" name="submit" value="Search">
	</form>
	
	
	
	
</div>
</section>
<?php
get_footer();