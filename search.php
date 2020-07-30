<?php 
include("connect/db.php");


if ($k = isset($_GET['k']) ? $_GET['k'] : '') {

	// create the base variables for building the search query
$search_string = "SELECT * FROM addmusic WHERE ";
$display_words = "";


// format each of search keywords into the db query to be run
$keywords = explode(' ', $k);            
foreach ($keywords as $word){
    $search_string .= "artist LIKE '%".$word."%' OR ";
    $display_words .= $word.' ';
}
$search_string = substr($search_string, 0, strlen($search_string)-4);
$display_words = substr($display_words, 0, strlen($display_words)-1);


// run the query in the db and search through each of the records returned
$query = mysqli_query($conn, $search_string);
$result_count = mysqli_num_rows($query);
$show = mysqli_fetch_all($query, MYSQLI_ASSOC);
 
// display a message to the user to display the keywords
echo '<div class="right"><b><u>'.number_format($result_count).'</u></b> results found</div>';
echo 'Your search for <i>"'.$display_words.'"</i><hr />';


if ($result_count < 1) {
	
	 echo 'There were no results for your search. Try searching for something else.';

}


}

?>





 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>


 	<table>
 		<tr>
 			<?php foreach ($show as $shows) {?>
 			
 				<td><?php echo $shows['artist'];  ?></td>

 			<?php } ?>
 		</tr>
 	</table>
 
 </body>
 </html>