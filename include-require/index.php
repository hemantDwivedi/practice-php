<?php
# include will only produce a warning (E_WARNING) and the script will continue
# include '_dbconnet.php';

# require will produce a fatal error (E_COMPILE_ERROR) and stop the script
require '_dbconnet.php';

$select_query = "SELECT * FROM `contact_info`.`contacts`";
$result = mysqli_query($conn, $select_query);
$length = mysqli_num_rows($result);

echo $length;
echo ' data found';

?>