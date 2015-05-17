<?php

$regex = "/[a-zA-Z]+-\d+/";
if (preg_match($regex, "June-24")) {
    // Indeed, the expression "[a-zA-Z]+ \d+" matches "June 24"
    echo "Found a match!";
} else {
    // If preg_match() returns false, then the regex does not
    // match the string
    echo "The regex pattern does not match. :(";
}
?>
