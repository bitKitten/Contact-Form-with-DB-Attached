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
	
	function contactform7_before_send_mail( $form_to_DB ) {
    //set your db details
    $mydb = new wpdb('pnnspdty','bgB9tbP8','nhctt','mysql.nigerianhighcommission.co.tt');

    $form_to_DB = WPCF7_Submission::get_instance();
    if ( $form_to_DB ) 
        $formData = $form_to_DB->get_posted_data();
    $f_name = $formData['p_fname'];
   
    $mydb->insert( 'personalinfo', array( 'p_fname','p_mname','p_lname','p_dob','p_sex','p_maritalstatus','p_passport','p_localaddress','p_nigerianaddress','p_occupation','p_workplace','p_dependents','p_email','p_phone' =>$f_name ), array( '%s' ) );
	/*$mydb->insert( 'personalinfo', array( 'p_fname' =>$f_name ), array( '%s' ) );*/
}
remove_all_filters ('wpcf7_before_send_mail');
add_action( 'wpcf7_before_send_mail', 'contactform7_before_send_mail' );

?>
