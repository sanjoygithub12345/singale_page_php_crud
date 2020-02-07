<?php 
include('process.php');
$data=mysqli_connect('localhost','root','','test');
if(isset($data))
{
  echo "";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<!-- ============display query============= -->
  <div style="background-color: #E8FCFB;color: black;padding: 20px; display: inline-block;width: 250px; margin-bottom:20px; ">
    <?php 
    // session_start();
    if (isset($_SESSION['msg'])) {
       echo $_SESSION['msg'];
       unset($_SESSION['msg']);
    }
    ?>
  </div>
<table>
       <tr>
        <th>id</th>
        <th>firstname</th>
        <th>lastname</th>
        <th>Action</th>

       </tr>
<?php
$sql="SELECT * FROM crud";
$res=mysqli_query($data,$sql);
while ($result=mysqli_fetch_assoc($res)) {
 ?>
   <tr>
     <td><?php echo $result[ 'id'] ?></td>
     <td><?php echo $result[ 'first_name'] ?></td>
     <td><?php echo $result[ 'last_name'] ?></td>
     <td>
         <a href="index.php?edite=<?php echo $result['id']; ?>">edite</a>
         <a href="process.php?delete=<?php echo $result['id']; ?>">delete</a>
     </td>

   </tr>

<?php } ?>
 </table>

     <!-- ======link edite========== -->
        <?php
        if(isset($_GET['edite']))
        {   $edite_status=true;
          $id=$_GET['edite'];
          $sql="SELECT * FROM crud WHERE id=$id ";
          $res=mysqli_query($data,$sql);
           $record=mysqli_fetch_assoc($res);
          //  print_r($record);
           $id=$record['id'];
          

        }
         ?>
 <form method="post" action="process.php">
  <input type="hidden" name="idd" value="<?php  echo $id; ?>">
 
    <label>first name </label><br>
    <input type="text" name="firstname" value="<?php  if(isset($record['first_name'])) echo  $record['first_name']; ?>"><br>
    <label>lastname</label><br>
    <input type="text" name="lastname" value="<?php  if(isset( $record['last_name']))
      echo  $record['last_name']; ?>" ><br><br>
     <?php if($edite_status== false) { ?>
    <input type="submit" name="save" value="save">
<?php } else { ?>
    <input type="submit" name="update" value="update">
<?php } ?>

  </form>
</body>
</html>