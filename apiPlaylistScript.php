<?php
session_start();
$searchVal = $_GET['search'];
//$searchVal = "Drum&Bass:Ghost-Assassin";

header( "refresh:3;url=MWplaylist.php" );

$servername = "localhost";
$username = "root";
$password = "it490password";
$dbname = "DMZDatabase";

//Connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if (strpos($searchVal, ':') !== false) {
	$playlistQuery = explode(":",$searchVal);
	$playlistName = $playlistQuery['0'];
	$searchVal = $playlistQuery['1'];
}

//echo $searchVal;
//echo $playlistName;

//Initial Search Query For Comparison 
$compare = "SELECT * FROM Playlists WHERE PlayName=title='$searchVal'";
$search1 = $conn->query($compare);

if ($search1->num_rows > 0) {	
	$display1 = "SELECT * FROM queryResults WHERE Artist='$searchVal'";
        $search2 = $conn->query($display1);
        
	echo "Duplicate Records. Try Again";
	exit();
        
} else {

	//curl "https://api.discogs.com/database/search?q=+searchVal+&token=kfxuDYDlKQHgThMykjaEwfMIdcOExpyWqLeAzuMB" | sed 's/\,/\n/g' | grep -w "pages" | sort --unique | cut -c11- > /home/miciah/tempData.txt
	//echo $searchVal;
        $output = shell_exec("/bin/bash /var/www/html/apidmzEX1.sh 2>&1 $searchVal");
        //echo $output;

	$myfile = fopen("tempData.txt", "r") or die("Unable to open file!");
        $pages = fgets($myfile);
                
	if ($pages >= 150) {

		//curl "https://api.discogs.com/database/search?q=+searchVal+&token=kfxuDYDlKQHgThMykjaEwfMIdcOExpyWqLeAzuMB" | sed 's/\,/\n/g' | grep -w "title" | sort --unique | cut -c11- > /home/miciah/tempData2.txt
		$output2 = shell_exec("/bin/bash /var/www/html/apidmzEX2.sh 2>&1 $searchVal");
		//echo $output2;
                //echo "this far now";
		$myfile2 = fopen('tempData2.txt','r') or die("Unable to open file!");
		
		while (($line = fgets($myfile2)) !== false) {
			//echo "This is a line";			
			$insert1 = "INSERT INTO tempNumResults (Artist) VALUES('$line')";
			mysqli_query($conn,$insert1);	
		}
		fclose($myfile2);
                
		$display2 = "SELECT * FROM tempNumResults";
                $search3 = mysqli_query($conn,$display2);
		//echo $seachVal;
                echo "Please Enter one of these Valid Search Queries. Use the - character for spaces within queries Ex. Kendrick-Lamar";
                echo "";
                echo "<table><tr><th>.</th></tr>";
                
		while($row = $search3->fetch_assoc()) {
                	echo "<tr><td>". $row["Artist"]. "</td><tr>";
               	}
               	echo "</table>";

		$drop1 = "DELETE FROM tempNumResults";
		mysqli_query($conn,$drop1);

	} else {
                $output3 = shell_exec("/bin/bash /var/www/html/apidmzEX3.sh 2>&1 $searchVal");
                //echo $output3;
                //echo "this far now 333";

           	$myfile3 = fopen('tempData2.txt','r') or die("Unable to open file!");
                $var = 0;

		while (($line2 = fgets($myfile3)) !== false) {
                	if (strpos($line2, 'style') !== false) {
                        	$styleVal = $line2;
				$var = 1;
                        } elseif (strpos($line2, 'country') !== false) {
                                if ($var == 1) {
                                        $countryVal = $line2;
                                } else {
                                        continue;
                                }
                       	} elseif (strpos($line2, 'year') !== false) {
                        	if ($var == 1) {
					$yearVal = $line2;
				} else {
					continue;
				}
                      	} elseif (strpos($line2, 'cover_image') !== false) {
                                if ($var == 1) {
                                        $imageVal = $line2;
                                } else {
                                        continue;
                                }
                    	} elseif (strpos($line2, 'title') !== false) {
                                if ($var == 1) {
                                        $titleVal = $line2;
                                } else {
                                        continue;
                                }
                        } elseif (strpos($line2, 'label') !== false) {                               	
                                if ($var == 1) {
                                        $labelVal = $line2;
                                	$track = "INSERT INTO Playlists (PlayName, Artist, Country, Label, Genre, Year, Image, Title) VALUES('$playlistName', '$searchVal', '$countryVal', '$labelVal', '$styleVal', '$yearVal', '$imageVal', '$titleVal')";
                                	mysqli_query($conn,$track);
					$var = 0;
					break;
                                } else {
                                        continue;
                                }
			}
       		}

		fclose($myfile3);

		$insertPlay = "SELECT * FROM Playlists";
		$output4 = mysqli_query($conn,$insertPlay);

        	$output5 = shell_exec("/bin/bash /var/www/html/apidmzEX4.sh 2>&1 $searchVal");

	}

}

$conn->close();
?>
