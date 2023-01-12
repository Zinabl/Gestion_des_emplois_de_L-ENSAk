<a href='Professeurs.php?menu=true'><button class="boutton" >Visualiser La Liste </button></a> 
<?php 
      if(isset($_GET['menu']))
                { 
                   if($_GET['menu']==true)
                   {  
                      session_destroy();
                      header("location:Professeurs.php?menu=1");
                   }
        }
 ?>