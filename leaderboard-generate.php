<?php

ini_set('memory_limit', '-1');

// Section 1: load the CSV files into variables.
$mi_calls_v1_file = '../raw-leaderboard-data/MichiganCallRecords102018.csv';
$mi_calls_v2_file = '../raw-leaderboard-data/MichiganCalls.csv';
$ut_calls_v1_file = '../raw-leaderboard-data/UtahCallRecords102018.csv';
$ut_calls_v2_file = '../raw-leaderboard-data/UtahCalls.csv';
$nd_calls_v1_file = "../raw-leaderboard-data/NDCalls.csv";
$mo_calls_v1_file = "../raw-leaderboard-data/MissouriCalls.csv";

// Section 2: load the files into arrays - we do this four times
// Once per file.

$nd_calls_v1_array = [];

// Open the file for reading
if (($h = fopen("{$nd_calls_v1_file}", "r")) !== false) {
    // Each line in the file is converted into an individual array that we call $data
    // The items of the array are comma separated
    while (($data = fgetcsv($h, 1000, ",")) !== false) {
        // Each individual array is being pushed into the nested array
        $nd_calls_v1_array[] = $data;
    }
    // Close the file
    fclose($h);
}

// The nested array to hold all the arrays
$mi_calls_v1_array = [];

// Open the file for reading
if (($h = fopen("{$mi_calls_v1_file}", "r")) !== false) {
    // Each line in the file is converted into an individual array that we call $data
    // The items of the array are comma separated
    while (($data = fgetcsv($h, 1000, ",")) !== false) {
        // Each individual array is being pushed into the nested array
        $mi_calls_v1_array[] = $data;
    }
    // Close the file
    fclose($h);
}

// The nested array to hold all the arrays
$mi_calls_v2_array = [];

// Open the file for reading
if (($h = fopen("{$mi_calls_v2_file}", "r")) !== false) {
    // Each line in the file is converted into an individual array that we call $data
    // The items of the array are comma separated
    while (($data = fgetcsv($h, 1000, ",")) !== false) {
        // Each individual array is being pushed into the nested array
        $mi_calls_v2_array[] = $data;
    }
    // Close the file
    fclose($h);
}

// The nested array to hold all the arrays
$ut_calls_v1_array = [];

// Open the file for reading
if (($h = fopen("{$ut_calls_v1_file}", "r")) !== false) {
    // Each line in the file is converted into an individual array that we call $data
    // The items of the array are comma separated
    while (($data = fgetcsv($h, 1000, ",")) !== false) {
        // Each individual array is being pushed into the nested array
        $ut_calls_v1_array[] = $data;
    }
    // Close the file
    fclose($h);
}
// The nested array to hold all the arrays
$ut_calls_v2_array = [];

// Open the file for reading
if (($h = fopen("{$ut_calls_v2_file}", "r")) !== false) {
    // Each line in the file is converted into an individual array that we call $data
    // The items of the array are comma separated
    while (($data = fgetcsv($h, 1000, ",")) !== false) {
        // Each individual array is being pushed into the nested array
        $ut_calls_v2_array[] = $data;
    }
    // Close the file
    fclose($h);
}

$mo_calls_v1_array = [];

// Open the file for reading
if (($h = fopen("{$mo_calls_v1_file}", "r")) !== false) {
    // Each line in the file is converted into an individual array that we call $data
    // The items of the array are comma separated
    while (($data = fgetcsv($h, 1000, ",")) !== false) {
        // Each individual array is being pushed into the nested array
        $mo_calls_v1_array[] = $data;
    }
    // Close the file
    fclose($h);
}


// Section 3: Merge all the arrays
$final_array = array_merge($mi_calls_v1_array, $mi_calls_v2_array, $ut_calls_v1_array, $ut_calls_v2_array, $nd_calls_v1_array, $mo_calls_v1_array);

// var_dump($final_array[1][6]);

// Loop through the array and count the instances of each name
$agents_array = [];
foreach ($final_array as $row) {
  // If the agent name field in the row isn't empty, push it onto the agents array
    if ($row[6] != "") {
        // var_dump($row[6]);
        $agents_array[] = $row[6];
    }
}


$leaderboard_values = array_count_values($agents_array);
arsort($leaderboard_values);
echo("<h1>Leaderboard (updated daily)</h1>");
echo('<h2>' . count($agents_array) . ' calls made</h2>');
echo('<table>');
echo("<tr>");
echo('<th>Name</th>');
echo('<th>Calls Made</th>');
echo("</tr>");

foreach ($leaderboard_values as $key => $value) {
  if ($key != "Agent Name") {
  echo("<tr>");
  echo("<td>");
  echo($key);
  echo("</td>");
  echo("<td>");
  echo($value);
  echo("</td>");
  echo("</tr>");
}
}

echo("</table>");
