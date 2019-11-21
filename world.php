<?php
$host = "localhost";
$username = 'root';
$password = '';
$dbname = 'world';


function test_input($data){
  $data = trim($data);
  $data = strip_tags($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$country = test_input($_GET["country"]);
$cities = test_input($_GET["context"]);


// if($cities == "cities"){
//   echo "mhm";
// }

// echo $country;
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
if(empty($cities)){

$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");


$results = $stmt->fetchall(PDO::FETCH_ASSOC);
// var_dump($results);

?>


<table>
    <!-- <caption>List of Students</caption> -->
    <thead>
        <tr>
            <th>Name</th>
            <th>Continent</th>
            <th>Independence</th>
            <th>Head of State</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $row): ?>
        <tr>
            <td><?= $row['name']; ?></td>
            <td><?= $row['continent']; ?></td>
            <td><?= $row['independence_year']; ?></td>
            <td><?= $row['head_of_state']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>



<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>

<?php } else {

  $stmt = $conn->query("SELECT cities.name, cities.district,cities.population from cities join countries on cities.country_code = countries.code where countries.name like '%$country%'");
  $results = $stmt->fetchall(PDO::FETCH_ASSOC);
  // var_dump($results); ?>

  <table>
      <thead>
          <tr>
              <th>Name</th>
              <th>District</th>
              <th>Population</th>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($results as $row): ?>
          <tr>
              <td><?= $row['name']; ?></td>
              <td><?= $row['district']; ?></td>
              <td><?= $row['population']; ?></td>
          </tr>
          <?php endforeach; ?>
      </tbody>
  </table>




<?php  } ?>

<!-- <?php $name = $results['0']['name'];
$state = $results['0']['head_of_state'];
echo $name;
echo $state;
?> -->

<!-- <ul><li><?= $name . ' is ruled by ' . $state; ?></li></ul> -->
