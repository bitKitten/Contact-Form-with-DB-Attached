<?php /* Template Name: Results-Bio */ ?>
<?php get_header();
businex_inner_banner();
?>

<section class="wrapper wrap-detail-page">
	<div class="container"> 
	
<h2>View Bio Data</h2><br>	
		<?php	
		$conn = new mysqli("mysql.highcommission.co","pnnspdty"," ","nhctt");
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		 
		 $id = $_GET['id'];

		$query = "SELECT personalinfo.p_id, p_fname, p_mname, p_lname, p_dob, p_sex, p_maritalstatus, p_passport, p_localaddress, p_country, p_residency, p_durationofstay, p_nigerianstate, p_otherchildren, p_address, p_occupation, p_workplace, p_dependents, p_email, p_phone 
				from personalinfo where p_id = $id"; 

//echo "$query<br><br>";

$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result);

mysqli_close($conn); 

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
	$state = $row['p_nigerianstate'];
	$otherchildren = $row['p_otherchildren'];
	$occupation = $row['p_occupation'];
	$workplace = $row['p_workplace'];
	$dependents = $row['p_dependents'];
	$email = $row['p_email'];
	$phone = $row['p_phone'];

echo "<table></tr><td>
	  <b>Name : </b> <br>
      <b>Date of Birth : </b><br> 
	  <b>Gender : </b><br>
	  <b>Marital Status : </b> <br>
	  <b>Passport : </b> <br>
	  <b>Local Address : </b> <br>
	  <b>Residency : </b> <br>
	  <b>Duration of Stay : </b> <br>
	  <b>Nigerian Address : </b> <br>
	  <b>Dependents : </b> <br>
	  <b>With Non-Nigerian National : </b> <br>
	  <b>Occupation : </b> <br>
	  <b>Workplace : </b> <br>
	  <b>email : </b><br>
	  <b>Phone : </b> <br></td>
	  
	  <td>$f_name $m_name $l_name<br>$dob<br> $sex<br>$maritalstatus<br>$passport<br>$local, $country<br>$residency<br>$duration<br>$nigerian, $state<br>$dependents<br>$otherchildren<br>$occupation<br>$workplace<br> $email<br>$phone<br>
	  </td></tr></table>

";
        }		

mysqli_close($con);
	?>
	</div>
	</section>
	
<?php
get_footer();