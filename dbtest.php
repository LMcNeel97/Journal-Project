<?php
// Error Reporting Settings
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Connecting, selecting database
$dbconn = pg_connect("host=34.174.116.218 dbname=dbqv8ubvtbfgg3 user=uwqkxcqccvglv password=G3A3dc%#67#n")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
$query = 'SELECT * FROM "Accounts"';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
echo "<table border=1>\n";
echo "\t<tr>\n";
echo "\t\t<th class='custom padding'>ID</th>\n";
echo "\t\t<th>Email</th>\n";
echo "\t\t<th>Password</th>\n";
echo "\t\t<th>First Name</th>\n";
echo "\t\t<th>Last Name</th>\n";
echo "\t</tr>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {

    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);
?>