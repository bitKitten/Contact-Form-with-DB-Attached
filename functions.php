<?php
	function theme_enqueue_styles() {

	    $parent_style = 'businex-style';

	    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

	    wp_enqueue_style( 'my-child-fontawesome', '//use.fontawesome.com/releases/v5.2.0/css/all.css' );

	    wp_enqueue_style( 'child-style',
	        get_stylesheet_directory_uri() . '/style.css',
	        array( $parent_style )
	    );
	}
	add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
	
	//redirect to login 
	add_action('wp', 'redirect_private_page_to_login');

function redirect_private_page_to_login(){

    global $wp_query;

    $queried_object = get_queried_object();

    if ($queried_object->post_status == "private" && !is_user_logged_in()) {

        wp_redirect(home_url('/wp-login.php'));

    } 
}
	
	//end of redirect
	
	//view private pages
	$subRole = get_role( 'author' ); 
	$subRole->add_cap( 'read_private_posts' );
	$subRole->add_cap( 'read_private_pages' );
	//end of view
	
	function contactform7_before_send_mail( $form_to_DB ) {
    //set your db details
    $mydb = new wpdb('pnnspdty','','nhctt','mysql.highcommission.co');

    $form_to_DB = WPCF7_Submission::get_instance();
    if ( $form_to_DB ) 
        $formData = $form_to_DB->get_posted_data();
  //create variables to captur form data
    $f_name = $formData['p_fname'];
	//new from here
	$m_name = $formData['p_mname'];
	$l_name = $formData['p_lname'];
	$dob = $formData['p_dob'];
	$sex = $formData['p_sex'];
	$maritalstatus = $formData['p_maritalstatus'];
	$passport = $formData['p_passport'];
	$local = $formData['p_localaddress'];
	$country = $formData['p_country'];
	$residency = $formData['p_residency'];
	$duration = $formData['p_durationofstay'];
	$nigerian = $formData ['p_nigerianaddress'];
	$state = $formData['p_nstate'];
	$otherchildren = $formData['p_otherchildren'];
	$occupation = $formData['p_occupation'];
	$workplace = $formData['p_workplace'];
	$dependents = $formData['p_dependents'];
	$email = $formData['p_email'];
	$phone = $formData['p_phone'];
	$message = $formData['p_message'];
	
   //insert form data into mysql db 
    $mydb->insert( 'personalinfo', array( 'p_fname' =>$f_name,'p_mname'=> $m_name,'p_lname'=> $l_name,'p_dob' => $dob,'p_sex'=>$sex,'p_maritalstatus'=>$maritalstatus,'p_passport'=>$passport,'p_localaddress'=>$local,'p_nigerianaddress'=>$nigerian, 'p_country'=>$country, 'p_residency'=>$residency,'p_durationofstay'=>$duration,'p_nigerianstate'=>$state,'p_otherchildren'=>$otherchildren,'p_occupation'=>$occupation,'p_workplace'=>$workplace,'p_dependents'=>$dependents,'p_email'=>$email,'p_phone'=>$phone), array( '%s' ) );
	//end new
	$id = $mydb->insert_id;
	
	$mydb->insert('messages', array('p_id' =>$id, 'msg_text'=>$message), array( '%s' ) );
	
}
remove_all_filters ('wpcf7_before_send_mail');
add_action( 'wpcf7_before_send_mail', 'contactform7_before_send_mail' );

?>
