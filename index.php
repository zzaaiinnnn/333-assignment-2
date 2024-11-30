<?php
//Zain Hasan Abbas - 202110360
//Mohammed Abdullah Rashed - 202100574
//Define the API URL
$url="https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

//Fetch the data from the API using file_get_contents()
$response= file_get_contents(filename: $url);

//Decode the JSON response into a PHP associative array
$data= json_decode(json:$response, associative: true);

//Check if there was an error fetching the data & Check if the JSON decoding was successful
if (!$data || !isset($data["results"])) {
    die('error fetching the data from the api');
}

$output = $data["results"];

?>
  
  
  <?php
    //fill table 
    foreach($output as $students) {
        ?>
        <tr>
        <td><?php echo $students["year"];?></td>
        <td><?php echo $students["semester"]; ?></td>
        <td><?php echo $students["the_programs"]; ?></td>
        <td><?php echo $students["nationality"]; ?></td>
        <td><?php echo $students["colleges"]; ?></td>
        <td><?php echo $students["number_of_students"]; ?></td>
        

        </tr>
        <?php
    }

    ?>
