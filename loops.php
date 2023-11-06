<?php
echo "whil loop";
echo "<br>";
echo "<br>";

//while loop
$x = 1;

while($x <= 5) {
  echo "The number is: $x <br>";
  $x++;
}


echo "<hr>";
echo "Do loop";
echo "<br>";
echo "<br>";


//do while loop
$x = 1;

do {
  echo "The number is: $x <br>";
  $x++;
} while ($x <= 5);

echo "<hr>";
echo "Do while loop";
echo "<br>";
echo "<br>";


//for loop
for ($x = 0; $x <= 10; $x++) {
    echo "The number is: $x <br>";
  }


echo "<hr>";
echo "Do foreach loop";
echo "<br>";
echo "<br>";


// foreach loop
//loops through arrays
$towns = [
  "Malindi",
  "Mombasa",
  "Nairoibi",
  "Eldoret",
  "Kapsabet"
];

foreach($towns as $town)
{
  echo $town."<br>";
}
echo "<hr>";

foreach($towns as $key => $town)
{
  echo $town."<br>";
  echo $key."<br>";
}

?>