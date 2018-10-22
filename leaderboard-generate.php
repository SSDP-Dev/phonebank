<?php

ini_set('memory_limit', '-1');

$mi_calls_v1_file = '../raw-leaderboard-data/MichiganCallRecords102018.csv';
$mi_calls_v2_file = '../raw-leaderboard-data/MichiganCalls.csv';
$ut_calls_v1_file = '../raw-leaderboard-data/UtahCallRecords102018.csv';
$ut_calls_v2_file = '../raw-leaderboard-data/UtahCalls.csv';

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

// Display the code in a readable format
 var_dump($ut_calls_v2_array);
?>
