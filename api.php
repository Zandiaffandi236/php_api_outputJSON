<?php ERROR_REPORTING(0);
require_once 'koneksi.php';
if (isset($_GET['apicall'])) {
    switch ($_GET['apicall']) {
        case 'api':
        $true = 'true';
        $succes ='Show data user succes';
        $codesc = '200';
      	$sql = "SELECT * FROM user";
          $r = mysqli_query($koneksi,$sql);
      	$result = array();
      	while($row = mysqli_fetch_array($r)){
      		array_push($result,array(
      			"id"=>$row['id'],
      			"username"=>$row['username'],
      			"password"=>$row['password'],
      			"level"=>$row['level'],
      			"fullname"=>$row['fullname']
      		));
      	}
        echo json_encode(array(
          'succes' => $true,
          'data'=>$result,
          'message'=>$succes,
          'code'=>$codesc
        ));
      }
    }else{

        $id = $_GET['id'];

      $true = 'true';
      $succes ='Show data user succes';
      $codesc = '200';
      $coderr = '204';
      $error = 'Data User not Found';
     
      $sql = "SELECT * FROM user WHERE id=$id ;";
      
      $r = mysqli_query($koneksi,$sql);
      
      $result = array();
      $row = mysqli_fetch_array($r);
      array_push($result,array(
          "id"=>$row['id'],
          "username"=>$row['username'],
          "password"=>$row['password'],
          "level"=>$row['level'],
          "fullname"=>$row['fullname']
        ));
 
 if ($id<255) {
    echo json_encode(array(
      'succes' => $true,
      'data'=>$result,
      'message'=>$succes,
      'code'=>$codesc
    ));
  }else{
    echo json_encode(array(
      'succes' => $true,
      'data'=>array(),
      'message'=>$error,
      'code'=>$coderr
    ));
  }
}
/*Cara menampilkan:
tulis pada tab url browser http://localhost:8080/php_DB_outputJSON/api.php?id=25 untuk show by id
tulis pada tab url browser http://localhost:8080/php_DB_outputJSON/api.php?id=256 untuk user not found
tulis pada tab url browser http://localhost:8080/php_DB_outputJSON/api.php?apicall=api untuk show all user
*/
?>