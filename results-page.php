<?php /* Template Name: Results-Page */ ?>
<?php get_header();
businex_inner_banner();

?>

<section class="wrapper wrap-detail-page">
	<div class="container">
	    <h2>Filters Used</h2></br> <b>First Name:</b> <?php echo $_POST["p_fname"]; ?> <br> 
		<b>Last Name:</b> <?php echo $_POST["p_lname"]; ?> <br>
		<b>Date of Birth :</b> <?php echo $_POST["p_dob"]; ?> <br>
		<b>Passport Number :</b> <?php echo $_POST["p_passport"]; ?> <br>
		<b>Message Date :</b> <?php echo $_POST["p_dateadded"]; ?> <br><br>
		
		
		<?php	
		$conn = new mysqli("mysql.highcommission.co","pnnspdty"," ","nhctt");
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		 echo 'Connected successfully<br>';
		 

if(isset($_POST['submit'])) {
		$fields = array('p_fname', 'p_lname', 'p_dob','p_passport','p_dateadded');
		$conditions = array();
}

		$query = "SELECT personalinfo.p_id, p_fname, p_mname, p_lname, p_dob, p_sex, p_maritalstatus, p_passport, p_localaddress, p_country, p_residency, p_durationofstay, p_nigerianstate, p_otherchildren, p_nigerianaddress, p_occupation, p_workplace, p_dependents, p_email, p_phone, p_dateadded, msg_text 
				from personalinfo join messages on personalinfo.p_id = messages.p_id";
// loop through the defined fields
foreach($fields as $field){
    // if the field is set and not empty
    if(isset($_POST[$field]) && !empty($_POST[$field])) {
        // create a new condition while escaping the value inputed by the user (SQL Injection)
        $conditions[] = "$field LIKE '%" . mysqli_real_escape_string($conn, $_POST[$field]) . "%'";
        }
    }


// if there are conditions defined
if(count($conditions) > 0) {
    // append the conditions
    $query .= " WHERE " . implode (' AND ', $conditions); 
}

//echo "$query<br><br>";

$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result);

//new line
echo "<table border='1'><tr><th>Name</th><th>Date of Birth</th><th>Message</th><th>Date Received</th><th>URL</th></tr>";

mysqli_close($conn); 

if(isset($_POST['submit'])) {
//while($row = mysqli_fetch_array($result)) {
//newline
  while($row = mysqli_fetch_assoc($result)) {  
	$id = $row['p_id'];
	$f_name = $row['p_fname'];
	$m_name = $row['p_mname'];
	$l_name = $row['p_lname'];
	$dob = $row['p_dob'];
	$sex = $row['p_sex'];
	$maritalstatus = $row['p_maritalstatus'];
	$passport = $row['p_passport'];
	$local = $row['p_localaddress'];
	$country = $row['p_country'];
	$residency = $row['p_residency'];
	$duration = $row['p_durationofstay'];
	$nigerian = $row ['p_nigerianaddress'];
	$state = $row['p_nstate'];
	$otherchildren = $row['p_otherchildren'];
	$occupation = $row['p_occupation'];
	$workplace = $row['p_workplace'];
	$dependents = $row['p_dependents'];
	$email = $row['p_email'];
	$phone = $row['p_phone'];
	$message = $row['msg_text'];
	$date = $row['p_dateadded'];
	$id_url = add_query_arg('id', $id, '/results-bio/');

echo "<tr><td> $f_name $m_name $l_name </td><td>$dob</td><td>$message </td><td>$date</td></td><td><a href = '$id_url'>View Bio</a></td></tr>";
        }
echo "</table>";		
}
mysqli_close($con);
	?>
	</div>
	</section>
	
<?php
get_footer();