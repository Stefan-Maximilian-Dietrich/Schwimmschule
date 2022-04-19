<?php  
//export.php  
$connect = mysqli_connect("localhost", "admin1", "l6$1Bp6g", "Schwimmschule"); 
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM customer";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                        <th>Usernamen</th>  
                        <th>Mobilnummer</th>  
                        <th>Zoom-Datum</th>  
                        <th>angemeldet</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                        <td>'.$row["username"].'</td>  
                        <td>'.$row["mobil"].'</td>  
                        <td>'.$row["zoom"].'</td>  
                        <td>'.$row["angemeldet"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
