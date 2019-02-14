A high commission required that information entered on their contact form be saved for future use. Their employees should be able to log in and
pull the data using some key information.

Wordpress was used to build the website, and also used to manage a secure log in area. The specified users would be able to navigate to the search
pages if granted access through wp-admin.

Contact Form 7 was used for its clean look and feel. On clicking "submit" the data was duplicated to a mysql database located on the hosting server.
This is where the data would also be queried from. Contact Form 7 has its own naming conventions and is all stored on the WP database. 
The mysql database was chosen for scalability, ease of use and also to manage the data schema. It was also a better backend for any eventual reporting.

The functions.php file is where the data is pulled from the contact form.

A logged in user could access the search page (a custom php page) from the site menu. results.php

The results would be posted on the results-page.php in a table format.

If the user clicks "View Bio" on the results-page.php, they could see more information about the person who filled out the contact form.