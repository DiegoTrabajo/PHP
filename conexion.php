<?PHP 
function conexion (){
 $host = "host=localhost";
 $dbname = "dbname=bd1 ";
 $user = "user= postgres";
 $password = "password = 1234";

 $db = pg_connect("$host $dbname $user $password"); 	

return $db;
}

?>		
