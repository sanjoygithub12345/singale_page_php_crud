      <!-- conect conbase -->
      <?php 
      $edite_status=false;
      $first_name="";
      $last_name="";
      session_start();
      $con=mysqli_connect("localhost","root","" ,"test") ;
      if(isset($con)){ echo "";} ?>

         <!-- insert query -->
         <?php 
         if(isset($_POST['save']))
         {
          $firstname=$_POST['firstname'];
          $lastname=$_POST['lastname'];
          $sql="INSERT INTO crud (first_name,last_name) VALUES('$firstname','$lastname')";
          $res= mysqli_query($con,$sql);
          if(isset($res))
          {
             $_SESSION['msg']="con inserted";
            header('location:index.php');
          }

         }
         ?>
       <!-- =====================upadate query============== -->
       <?php 
      
       if(isset($_POST['update']))
       {
         $firstname=$_POST['firstname'];
         $lastname=$_POST['lastname'];
         $id=$_POST['idd'];
         echo $id;
         
         $sql="UPDATE crud SET first_name='$firstname',last_name='$lastname' WHERE id = $id ";
         $resu=mysqli_query($con,$sql);
            var_dump($resu);
          if($resu)
          {
             $_SESSION['msg']="con update";
            header('location:index.php');
          }
          else
          {
            $_SESSION['msg']="con not  update";
            header('location:index.php');
          }
       }
        ?>
           <!-- =====================delete query============================ -->
           <?php 
           if(isset($_GET['delete']))
           {
            $id=$_GET['delete'];
            $sql="DELETE FROM crud WHERE id=$id ";
            $result=mysqli_query($con,$sql);
            if(isset($result))
            {
              $_SESSION['msg']="con delete";
            header('location:index.php');

            }
           }
           ?>

