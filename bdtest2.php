<?php
// Connecting, selecting database
$dbconn = pg_connect("host=34.174.116.218 dbname=dbqv8ubvtbfgg3 user=uegdny76xewlx password=b+7ek1))k#62")
    or die('Could not connect: ' . pg_last_error());

// Closing connection
pg_close($dbconn);
?>