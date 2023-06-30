<?php

function triHerbergement()
{
switch ($_POST['submit'])
{
    case !empty($_POST['domain_name']&&$_POST['database']&&$_POST['space_disk']&&$_POST['compte_mail']&&$_POST['multisite']&&isset($_POST['certificat'])):
        $domain = $_POST['domain_name'];
        $nb_bdd=$_POST['database'];
        $storage=$_POST['space_disk'];
        $mail_count = $_POST['compte_mail'];
        $multi = $_POST['multisite'];
        $certif = $_POST['certificat'];

        switch ($certif) {
            case "1":
                $sql = "SELECT * FROM hebergement WHERE nom_domaine='$domain' AND bdd ='$nb_bdd'AND storage_disk ='$storage' AND account_mail ='$mail_count' AND multisite LIKE '%$multi%' AND key_ssl = 1 ";
                break;
            case "0":
                $sql = "SELECT * FROM hebergement WHERE nom_domaine='$domain' AND bdd ='$nb_bdd'AND storage_disk ='$storage' AND account_mail ='$mail_count' AND multisite LIKE '%$multi%' AND key_ssl = 0 ";
        }
    case !empty($_POST['domain_name'])&&isset($_POST['certificat']):
        {
            $domain = $_POST['domain_name'];
            $certif = $_POST['certificat'];
            if ($certif=="1")
            {
                $sql = "SELECT * FROM hebergement WHERE nom_domaine = '$domain'  AND key_ssl = 1";
            }elseif($certif=="0")
            {
                $sql = "SELECT * FROM hebergement WHERE nom_domaine = '$domain'  AND key_ssl = 0";
            }
        }

        break;
    case !empty($_POST['domain_name']&&$_POST['database']):
    {
        $domain = $_POST['domain_name'];
        $nb_bdd=$_POST['database'];
        $sql = "SELECT * FROM hebergement WHERE nom_domaine = '$domain'AND bdd='$nb_bdd'";
        break;

    }

    case !empty($_POST['domain_name']&&$_POST['space_disk']):
    {
        $domain = $_POST['domain_name'];
        $storage=$_POST['space_disk'];
        $sql = "SELECT * FROM hebergement WHERE nom_domaine = '$domain'AND storage_disk ='$storage'";
        break;

    }
    case !empty($_POST['domain_name']&&$_POST['compte_mail']):
    {
        $mail_count = $_POST['compte_mail'];
        $domain = $_POST['domain_name'];
        $sql = "SELECT * FROM hebergement WHERE nom_domaine = '$domain' AND account_mail='$mail_count'";
        break;
    }
    case !empty($_POST['domain_name']&&$_POST['multisite']):
    {
        $multi = $_POST['multisite'];
        $domain = $_POST['domain_name'];
        $sql = "SELECT * FROM hebergement WHERE nom_domaine = '$domain' AND multisite LIKE '%$multi%'";
        break;
    }
    case !empty($_POST['database']&&$_POST['space_disk']):
    {
        $nb_bdd=$_POST['database'];
        $storage=$_POST['space_disk'];
        $sql = "SELECT * FROM hebergement WHERE bdd = '$nb_bdd'AND storage_disk ='$storage'";
        break;
    }
    case !empty($_POST['database']&&$_POST['compte_mail']):
    {
        $nb_bdd=$_POST['database'];
        $mail_count = $_POST['compte_mail'];
        $sql = "SELECT * FROM hebergement WHERE bdd = '$nb_bdd'AND account_mail='$mail_count'";
        break;
    }
    case !empty($_POST['database']&&$_POST['multisite']):
    {
        $nb_bdd=$_POST['database'];
        $multi = $_POST['multisite'];
        $sql = "SELECT * FROM hebergement WHERE bdd LIKE '$nb_bdd'AND multisite='$multi'";
        break;
    }
    case !empty($_POST['database'])&&isset($_POST['certificat']):
    {
        $nb_bdd=$_POST['database'];
        $certif = $_POST['certificat'];
        if ($certif=="1")
        {
            $sql = "SELECT * FROM hebergement WHERE bdd LIKE '$nb_bdd'AND key_ssl=1";
        }elseif($certif=="0")
        {
            $sql = "SELECT * FROM hebergement WHERE bdd LIKE '$nb_bdd'AND key_ssl=0";
        }

        break;
    }
    case !empty($_POST['space_disk']&&$_POST['compte_mail']):
    {
        $storage=$_POST['space_disk'];
        $mail_count = $_POST['compte_mail'];
        $sql="SELECT * FROM hebergement WHERE storage_disk ='$storage' AND account_mail ='$mail_count'";
        break;
    }
    case !empty($_POST['space_disk']&&$_POST['multisite']):
    {
        $storage=$_POST['space_disk'];
        $multi = $_POST['multisite'];
        $sql="SELECT * FROM hebergement WHERE storage_disk ='$storage' AND multisite ='$multi'";
        break;
    }
    case !empty($_POST['space_disk'])&&isset($_POST['certificat']):
    {
        $storage=$_POST['space_disk'];
        $certif= $_POST['certificat'];
        if ($certif=="1")
        {
            $sql="SELECT * FROM hebergement WHERE storage_disk ='$storage' AND key_ssl =1";
        }elseif ($certif=="0")
        {
            $sql="SELECT * FROM hebergement WHERE storage_disk ='$storage' AND key_ssl =0";
        }
        break;
    }
    case !empty($_POST['compte_mail'])&&($_POST['multisite']):
    {
        $mail_count=$_POST['compte_mail'];
        $multi = $_POST['multisite'];
        $sql="SELECT * FROM hebergement WHERE account_mail ='$mail_count' AND multisite ='$multi'";
        break;

    }

    case !empty($_POST['compte_mail'])&&isset($_POST['certificat']):
    {
        $mail_count=$_POST['compte_mail'];
        $certif= $_POST['certificat'];
        if ($certif=="1")
        {
            $sql="SELECT * FROM hebergement WHERE account_mail='$mail_count' AND key_ssl =1";
        }elseif ($certif=="0")
        {
            $sql="SELECT * FROM hebergement WHERE account_mail='$mail_count' AND key_ssl =0";
        }
        break;
    }
    case !empty($_POST['multisite'])&&isset($_POST['certificat']):
    {
        $multi = $_POST['multisite'];
        $certif= $_POST['certificat'];
        if ($certif=="1")
        {
            $sql="SELECT * FROM hebergement WHERE multisite='$multi' AND key_ssl =1";
        }elseif ($certif=="0")
        {
            $sql="SELECT * FROM hebergement WHERE multisite='$multi' AND key_ssl =0";
        }
        break;
    }

    case !empty($_POST['domain_name']) :
        $domain = $_POST['domain_name'];
        $sql = "SELECT * FROM hebergement WHERE nom_domaine = '$domain'";
        break;

    case !empty($_POST['database']) :
        $nb_bdd=$_POST['database'];
        $sql = "SELECT * FROM hebergement WHERE bdd ='$nb_bdd'";
        break;
    case !empty($_POST['space_disk']) :
        $storage=$_POST['space_disk'];
        $sql = "SELECT * FROM hebergement WHERE storage_disk ='$storage'";
        break;
    case !empty($_POST['compte_mail']) :
        $mail_count = $_POST['compte_mail'];
        $sql="SELECT * FROM hebergement WHERE account_mail LIKE '%$mail_count%'";
        break;
    case !empty($_POST['multisite']) :
        $multi = $_POST['multisite'];
        $sql = "SELECT * FROM hebergement WHERE multisite LIKE '%$multi%'";
        break;
    case isset($_POST['certificat']) :
        $certif = $_POST['certificat'];
        if ($certif=="1")
        {
            $sql = "SELECT * FROM hebergement WHERE key_ssl = 1";
        }elseif($certif=="0")
        {
            $sql = "SELECT * FROM hebergement WHERE key_ssl = 0";
        }
        break;
    case empty($_POST['domain_name']&&$_POST['database']&&$_POST['space_disk']&&$_POST['compte_mail']&&$_POST['multisite']&&$_POST['certificat']):
        $sql = "SELECT * FROM hebergement ";
        break;
}

if (isset($sql))
{
    require 'connect.php';
    $rs = $db->query($sql);

while ($rows=$rs->fetch())
{

?>
<tr><td>
        <span class="badge badge-info right"><?=$rows['id']?></span>

        <?php
        switch ($rows['id'])
        {
            case 1:
                echo '<img src="assets/uploads/18.jpg" width=40px height=40px>';
                break;
            case 2:
                echo '<img src="assets/uploads/206245683_354029766241422_2205846640921338689_n.jpg" width=40px height=40px>';
                break;
            case 3:
                echo '<img src="assets/uploads/7962921.jpg" width=40px height=40px>';
                break;
            case 4:
                echo '<img src="assets/uploads/AdobeStock_89177014reduit_0.jpg" width=40px height=40px>';
                break;
            case 5:
                echo '<img src="assets/uploads/80e34699a3d677fc73e066ae4b84ded6.jpg" width=40px height=40px>';
                break;

        }
        ?>
    </td><td><a href="<?=$rows['lien']?>"><?=$rows['nom_lien']?></a></td><td><span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span></td>
    <td><?=$rows['nom_offre']?></td><td><?=$rows['tarif']?> €</td><td><?=$rows['nom_domaine']?></td>
    <?php
    if ($rows['bdd']>10)
    {
        echo '<td>Illimité</td>';
    }else
    {
        ?>
        <td><?=$rows['bdd']?></td>
        <?php
    }


        ?>
        <td><?=$rows['storage_disk']?></td>
        <?php

    switch ($rows['account_mail'])
    {
        case $rows['account_mail']=='< 50':
            echo '<td><span class="custom-bar active" data-toggle="tooltip" data-placement="top" title="< 50">I</span>
                                                                    <span class="custom-bar" data-toggle="tooltip" data-placement="top" title="< 50">I</span>
                                                                        <span class="custom-bar" data-toggle="tooltip" data-placement="top" title="< 50">I</span>
                                                                            <span class="custom-bar" data-toggle="tooltip" data-placement="top" title="< 50">I</span></td>';
            break;
        case $rows['account_mail']=='50 - 500':
            echo '<td><span class="custom-bar active" data-toggle="tooltip" data-placement="top" title="50 - 500">I</span>
                                                                     <span class="custom-bar active" data-toggle="tooltip" data-placement="top" title="50 - 500">I</span>
                                                                         <span class="custom-bar" data-toggle="tooltip" data-placement="top" title="50 - 500">I</span>
                                                                            <span class="custom-bar" data-toggle="tooltip" data-placement="top" title="50 - 500">I</span></td>';
            break;
        case   $rows['account_mail']=='Illimité':
            echo '<td><span class="custom-bar active" data-toggle="tooltip" data-placement="top" title="Illimité">I</span>
                                                                    <span class="custom-bar active" data-toggle="tooltip" data-placement="top" title="Illimité">I</span>
                                                                        <span class="custom-bar active" data-toggle="tooltip" data-placement="top" title="Illimité">I</span>
                                                                            <span class="custom-bar active" data-toggle="tooltip" data-placement="top" title="Illimité">I</span></td>';
            break;
            ?>

        <?php
    }
    ?>
    <td><?=$rows['multisite']?></td>
    <?php
    if ($rows['key_ssl']==1)
    {
        echo '<td><i class="fa fa-check" aria-hidden="true"></i></td>';
    }else
    {
        echo '<td><i class="fa fa-times" aria-hidden="true"></i></td>';
    }
    ?>
    <td>
        <a href="#" class="btn btn-primary">Buy</a></td>
    <?php
    }
    }




}
function triePub()
{

    require 'connect.php';
                  if (!isset($_POST['submit1']))
                  {

                  $sql = "SELECT * FROM pub";
                  $rs= $db->query($sql);

                  while ($rows=$rs->fetch())
                  {


                  ?>
                  <tr><td>
                          <span class="badge badge-info right"><?=$rows['id']?></span>
                  <?php
                  switch ($rows['id'])
                  {
                      case 1:
                          echo '<img src="assets/uploads/460x276.jpg" width=40px height=40px>';
                          break;
                      case 3:
                          echo '<img src="assets/uploads/a6528f71b3183d6463a288c37cc60227_400x400.png" width=40px height=40px>';
                          break;
                      case 4:
                          echo '<img src="assets/uploads/61xVh4j40iL._AC_UX569_.jpg" width=40px height=40px>';
                          break;
                      case 5:
                          echo '<img src="assets/uploads/b2b71f4f8f7ad3dac69d1c5fc8c4a5a8.png" width=40px height=40px>';
                          break;
                  }
                  ?>

                      </td><td><a href="<?=$rows['titre']?>"><?=$rows['nom']?></a></td><td><span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star"></span></td><td>

                          <?php

                          switch ($rows['statut']) {
                              case "Standard":
                                  echo '<div class="stand">Standard</div></td>';
                                  break;
                              case "Sérieux":
                                  echo '<div class="srx">Sérieux</div></td>';
                                  break;
                              case "Fermé":
                                  echo '<div class="fermer">Fermé</div></td>';
                                  break;
                          }

                          ?>
                            <td><?=$rows['revenue']?> €</td><td>
                          <?php

                          switch ($rows['payement_method']) {
                              case "1,4,7":
                                  echo '<img src="assets/image/paypal.png" width=30px height=20px data-toggle="tooltip" data-placement="top" title="Paypal">
                                <img src="assets/image/master-card.jpg" width=30px height=20px data-toggle="tooltip" data-placement="top" title="Virement bancaire">
                                <img src="assets/image/Icone-cadeau.png" width=30px height=20px data-toggle="tooltip" data-placement="top" title="Cadeaux"></td>';
                                  break;
                              case "3,4":
                                  echo '<img src="assets/image/payza.png" width=30px height=20px data-toggle="tooltip" data-placement="top" title="Payza">
                                    <img src="assets/image/master-card.jpg" width=30px height=20px data-toggle="tooltip" data-placement="top" title="Virement bancaire"></td>';
                                  break;
                              case "1,3":
                                  echo '<img src="assets/image/paypal.png" width=30px height=20px data-toggle="tooltip" data-placement="top" title="Paypal">
                          <img src="assets/image/payza.png" width=30px height=20px data-toggle="tooltip" data-placement="top" title="Payza"></td>';
                                  break;
                              case "2,8,9":
                                  echo '<img src="assets/image/skrill.jpg" width=30px height=20px data-toggle="tooltip" data-placement="top" title="Skrill">
                          <img src="assets/image/codes.png" width=30px height=20px data-toggle="tooltip" data-placement="top" title="Codes">
                          <img src="assets/image/cart.png" width=30px height=20px data-toggle="tooltip" data-placement="top" title="Autre"></td>';
                                  break;
                          }

                          ?>
                      <td><?=$rows['annee']?></td><td><?=$rows['seuil']?> €</td><td><?=$rows['regie']?></td><td>
                          <a href="#" class="btn btn-primary">Buy</a>
<?php


                          ?>
                      </td></tr>
                    <?php

                    }
                  }
                  else
                  {


                      switch ($_POST['submit1']) {

                          case !empty($_POST['statut']&&$_POST['mode_pay']):
                              switch ($_POST['statut']&&$_POST['mode_pay'])
                              {
                                  case $_POST['statut']=="Standard":
                                      $modPay =$_POST['mode_pay'];
                                      $sql1 = "SELECT * FROM pub WHERE payement_method LIKE '%$modPay%' AND statut LIKE 'Standard'";
                                      break;

                                  case $_POST['statut']=="Sérieux":
                                      $modPay =$_POST['mode_pay'];
                                      $sql1 = "SELECT * FROM pub WHERE payement_method LIKE '%$modPay%' AND statut LIKE 'Sérieux'";
                                      break;
                                  case $_POST['statut']=="Fermé":
                                      $modPay =$_POST['mode_pay'];
                                      $sql1 = "SELECT * FROM pub WHERE payement_method LIKE '%$modPay%' AND statut LIKE 'Fermé'";
                                      break;
                              }
                              break;
                          case !empty($_POST['statut']&&$_POST['type_pub']):
                              switch ($_POST['type_pub']&&$_POST['statut'])
                              {
                                  case $_POST['statut']=="Standard":
                                      $type =$_POST['type_pub'];
                                      if ($type=="Plateforme d'affiliation")
                                      {
                                          $sql1 = "SELECT * FROM pub WHERE regie LIKE 'Plate%' AND statut LIKE 'Standard'";
                                      }else
                                      {
                                          $sql1 = "SELECT * FROM pub WHERE regie LIKE '%$type%' AND statut LIKE 'Standard'";
                                      }

                                      break;

                                  case $_POST['statut']=="Sérieux":
                                      $type =$_POST['type_pub'];
                                      if ($type=="Plateforme d'affiliation")
                                      $sql1 = "SELECT * FROM pub WHERE regie LIKE 'Platefo%' AND statut LIKE 'Sérieux'";
                                      break;
                                  case $_POST['statut']=="Fermé":
                                      $type =$_POST['type_pub'];
                                      if ($type=="Règle au CPC")
                                      $sql1 = "SELECT * FROM pub WHERE regie LIKE 'Règ%' AND statut LIKE 'Fermé'";
                                      break;
                              }
                              break;

                          case !empty($_POST['type_pub']&&($_POST['mode_pay'])):
                              switch ($_POST['type_pub']&&$_POST['mode_pay'])
                              {

                                  case $_POST['type_pub']=="Plateforme d'affiliation":
                                      $modePay =$_POST['mode_pay'];
                                      $sql1 = "SELECT * FROM pub WHERE regie LIKE 'Plateforme%' AND payement_method LIKE '%$modePay%'";
                                      break;

                                  case $_POST['type_pub']=="Régle au CPC":
                                      $modePay =$_POST['mode_pay'];
                                      $sql1 = "SELECT * FROM pub WHERE regie LIKE 'Régle au CPC' AND payement_method LIKE '%$modePay%'";
                                      break;
                                  case $_POST['type_pub']=="Petite régie":
                                      $modePay =$_POST['mode_pay'];
                                      $sql1 = "SELECT * FROM pub WHERE regie LIKE 'Petite régie' AND payement_method LIKE '%$modePay%'";
                                      break;

                              }
                              break;
                          case !empty($_POST['statut']):
                              $statut = $_POST['statut'];
                              $sql1 = "SELECT * FROM pub WHERE statut = '$statut'";
                              break;
                          case !empty($_POST['mode_pay']):
                              switch ($_POST['mode_pay'])
                              {
                                  case "Paypal":
                                      $sql1 = "SELECT * FROM pub WHERE payement_method LIKE '%Paypal%'";
                                       break;
                                  case "Skrill":
                                      $sql1 = "SELECT * FROM pub WHERE payement_method LIKE '%Skrill%'";
                                       break;
                                  case "Payza":
                                      $sql1 = "SELECT * FROM pub WHERE payement_method LIKE '%Payza%'";
                                       break;
                                  case "Virement bancaire":
                                      $sql1 = "SELECT * FROM pub WHERE payement_method LIKE '%Virement bancaire%'";
                                       break;
                                  case "Cadeaux":
                                      $sql1 = "SELECT * FROM pub WHERE payement_method LIKE '%Cadeaux%'";
                                      break;
                                  case "Codes":
                                      $sql1 = "SELECT * FROM pub WHERE payement_method LIKE '%Codes%'";
                                      break;
                                  case "Autre":
                                      $sql1 = "SELECT * FROM pub WHERE payement_method LIKE '%Autre%'";
                                      break;
                              }

                          case !empty($_POST['type_pub']):
                              switch ($_POST['type_pub'])
                              {
                                  case "Plateforme d'affiliation":
                                      $sql1 = "SELECT * FROM pub WHERE regie LIKE 'Plateforme%'";
                                      break;
                                  case "Régle au CPC":
                                      $sql1 = "SELECT * FROM pub WHERE regie LIKE 'Règle au CPC'";
                                      break;
                                  case "Petite régie":
                                      $sql1 = "SELECT * FROM pub WHERE regie LIKE 'Petite régie'";
                                      break;
                              }
                              break;
                          case empty($_POST['statut']&&$_POST['mode_pay']  &&$_POST['type_pub']):
                              $sql1= "SELECT * FROM pub";
                              break;





                      }
                  }

                    if (!isset($sql1))
                    {

                    }else
                    {


                      $rs = $db->query($sql1);
                      while ($rows=$rs->fetch())
                      {

                          ?>
                          <tr><td>
                                  <span class="badge badge-info right"><?=$rows['id']?></span>
                                  <?php
                                  switch ($rows['id'])
                                  {
                                      case 1:
                                          echo '<img src="assets/uploads/460x276.jpg" width=40px height=40px>';
                                          break;
                                      case 3:
                                          echo '<img src="assets/uploads/a6528f71b3183d6463a288c37cc60227_400x400.png" width=40px height=40px>';
                                          break;
                                      case 4:
                                          echo '<img src="assets/uploads/61xVh4j40iL._AC_UX569_.jpg" width=40px height=40px>';
                                          break;
                                      case 5:
                                          echo '<img src="assets/uploads/b2b71f4f8f7ad3dac69d1c5fc8c4a5a8.png" width=40px height=40px>';
                                          break;
                                  }
                                  ?>

                              </td><td><a href="<?=$rows['titre']?>"><?=$rows['nom']?></a></td><td><span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star"></span></td><td>

                                  <?php

                                  switch ($rows['statut']) {
                                      case "Standard":
                                          echo '<div class="stand">Standard</div></td>';
                                          break;
                                      case "Sérieux":
                                          echo '<div class="srx">Sérieux</div>';
                                          break;
                                      case "Fermé":
                                          echo '<div class="fermer">Fermé</div>';
                                          break;
                                  }

                                  ?>
                              <td><?=$rows['revenue']?> €</td><td>
                                  <?php

                                  switch ($rows['payement_method']) {
                                      case "Paypal,Virement bancaire,Cadeaux":
                                          echo '<img src="assets/image/paypal.png" width=30px height=20px data-toggle="tooltip" data-placement="top" title="Paypal">
                                <img src="assets/image/master-card.jpg" width=30px height=20px data-toggle="tooltip" data-placement="top" title="Virement bancaire">
                                <img src="assets/image/Icone-cadeau.png" width=30px height=20px data-toggle="tooltip" data-placement="top" title="Cadeaux"></td>';
                                          break;
                                      case "Payza,Virement bancaire":
                                          echo '<img src="assets/image/payza.png" width=30px height=20px data-toggle="tooltip" data-placement="top" title="Payza">
                                    <img src="assets/image/master-card.jpg" width=30px height=20px data-toggle="tooltip" data-placement="top" title="Virement bancaire"></td>';
                                          break;
                                      case "Paypal,Payza":
                                          echo '<img src="assets/image/paypal.png" width=30px height=20px data-toggle="tooltip" data-placement="top" title="Paypal">
                          <img src="assets/image/payza.png" width=30px height=20px data-toggle="tooltip" data-placement="top" title="Payza"></td>';
                                          break;
                                      case "Skrill,Codes,Autre":
                                          echo '<img src="assets/image/skrill.jpg" width=30px height=20px data-toggle="tooltip" data-placement="top" title="Skrill">
                          <img src="assets/image/codes.png" width=30px height=20px data-toggle="tooltip" data-placement="top" title="Codes">
                          <img src="assets/image/cart.png" width=30px height=20px data-toggle="tooltip" data-placement="top" title="Autre"></td>';
                                          break;
                                  }

                                  ?>
                              <td><?=$rows['annee']?></td><td><?=$rows['seuil']?> €</td><td><?=$rows['regie']?></td><td>
                                  <a href="#" class="btn btn-primary">Buy</a>
                                  <?php


                                  ?>
                              </td></tr>
                          <?php

                      }
                    }


}