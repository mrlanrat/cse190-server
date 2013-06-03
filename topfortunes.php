 <head>


         <meta charset="utf-8">
   
         <link rel="stylesheet" href="bootstrap\css\bootstrap.css">
         <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
      <script src="boostrap/js/bootstrap.min.js"></script>
      <script src="swfobject/swfobject.js"></script>
     	<script src="swfobject/swfobject.js"></script>
   
  <title>Top 25 Fortunes</title>
 </head>

 <body>
 	
  <div class="jumbotron subhead" style="background-color:#191970; padding: 20px;">
  <div class="container" >
    <h1 style="text-align:center; color:#fff; font-size: 100px; line-height: 1; letter-spacing: -2px;">Top Fortunes</h1>

  </div>
	</div>
  <div class="container">
         
   <h3> All-Time</h3>     
  <table class="table table-bordered table-striped">
   <thead>
    <tr>
     <th>Fortune</th>
     <th> Views </th>
     <th>Upvotes</th>
     <th>Downvotes</th>
     <th> Uploaded</th> 
    </tr>
   </thead>
   <tbody>
<?php
function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["DATABASE_URL"]));
  $string = "user=$user password=$pass host=$host dbname=" . substr($path, 1);
  $string . " sslmode=require";
  return $string;
}

$pg_conn = pg_connect(pg_connection_string_from_database_url());

$result = pg_query($pg_conn, "SELECT * FROM fortunes ORDER BY upvote DESC LIMIT 25");

while ($row = pg_fetch_row($result)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row[1]) . "</td>";
    echo "<td>" . htmlspecialchars($row[4]) . "</td>";    
    echo "<td>" . htmlspecialchars($row[2]) . "</td>";
    echo "<td>" . $row[3] . "</td>";
    echo "<td>" . date('m-d-Y',$row[8]) . "</td>";  
    echo "</tr>";
}
$result->closeCursor();
?>
   </tbody>
  </table>
</div>

 </body>
</html>