<?php
include './DataClass.php';


$myDataclass = new DataClass();

if (isset($_POST['Save_customer'])){
    
    print_r("back end listen :\n");
    print_r($_POST);
    
    print_r("back end listen from Database function:\n");
    
    $resultset = $myDataclass->Save_user($_POST);
    print_r($resultset);
    
     
    
    
}

if (isset($_POST['liste_user'])){
    
    print_r($_POST);
    $tableau = $myDataclass->afficher_utilisateur();
    
     print_r($tableau);
     
     foreach ($tableau as $data) {
         echo "<tr>";
           echo "<td> <i class='user icon'></i>".$data['Nom']."     </td>";
            echo "<td>".$data['Postnom']."     </td>";
             echo "<td>  ".$data['prenom']."     </td>";
              echo "<td>".$data['gender']."     </td>";
               echo "<td>  <a class ='ui mini red button'>supprimer</a>     </td>";
         
         
          echo "</tr>";
         
         
     }
    
    
}
    

