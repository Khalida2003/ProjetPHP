<?php 
  require "verification.php";
  $page = "1";
 if(isset($_GET["page"])) $page = $_GET["page"];
  if($page == "" || $page == "1")
    $page1 = "0";
  else $page1 = ($page*5)-5;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="styles.css" />
    <title>PAGE ADMIN</title>
  </head>
  <body id="body">
    <div class="container">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
        </div>
        <div class="navbar__right">

        <span ><?php echo $client["usernameClient"] ?></span>
            <a href="#">
              
              <img width="30" src="assets/avatar.svg" alt="" />
              <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
            </a>
        </div>
      </nav>

      <main>
        <div class="main__container">
          <?php
          if($page1 <0 ) header("location:listeclients.php");
          $select_clients = "SELECT * FROM client WHERE typeClient ='user'  limit $page1,5 ";
          $result = mysqli_query($link,$select_clients) or die(mysqli_error($link));
          $clients = mysqli_fetch_all($result,MYSQLI_ASSOC);
          ?>
          <div class="ajouterProduit">
              <a href="Ajouter_client.html" ><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 341.4 341.4" style="enable-background:new 0 0 341.4 341.4;" xml:space="preserve"><g><g><polygon points="192,149.4 192,0 149.4,0 149.4,149.4 0,149.4 0,192 149.4,192 149.4,341.4 192,341.4 192,192 341.4,192     341.4,149.4   "/></g></g></svg>&nbsp;&nbsp;AJOUTER</a>
          </div>
        <table >
          <tr class="first">
                <td>Nom / Prénom</td>
                <td>username</td>
                <td>adresse physique</td>
                <td>email</td>
                <td>Date d'inscription</td>
                <td>Actions</td>
          </tr>
          <?php  $i=0?>
        <?php foreach ($clients as $client) : ?>
          <?php if($i==1)
            $bg = "white";
            else $bg = "#f9f9f9";
          ?>
            <tr class="second" style="background-color: <?php echo $bg?>;">
                <td width="20px" class="referenceTD"><?php echo $client['nomClient'] ?></td>
                <td >
                    
                      <span><?php echo $client['usernameClient'] ?></span>
               </td>
                <td width="30px"><?php echo $client['adresseClient'] ?></td>
                <td><?php echo $client['emailClient'] ?></td>
                <td><?php echo $client['date_inscription'] ?></td>


                <td class="actions">

                <a href="infoclient.php?id=<?php echo $client['usernameClient']?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 477.873 477.873" style="enable-background:new 0 0 477.873 477.873;" xml:space="preserve"><g><g><path d="M392.533,238.937c-9.426,0-17.067,7.641-17.067,17.067V426.67c0,9.426-7.641,17.067-17.067,17.067H51.2    c-9.426,0-17.067-7.641-17.067-17.067V85.337c0-9.426,7.641-17.067,17.067-17.067H256c9.426,0,17.067-7.641,17.067-17.067    S265.426,34.137,256,34.137H51.2C22.923,34.137,0,57.06,0,85.337V426.67c0,28.277,22.923,51.2,51.2,51.2h307.2    c28.277,0,51.2-22.923,51.2-51.2V256.003C409.6,246.578,401.959,238.937,392.533,238.937z"/></g></g><g><g><path d="M458.742,19.142c-12.254-12.256-28.875-19.14-46.206-19.138c-17.341-0.05-33.979,6.846-46.199,19.149L141.534,243.937    c-1.865,1.879-3.272,4.163-4.113,6.673l-34.133,102.4c-2.979,8.943,1.856,18.607,10.799,21.585    c1.735,0.578,3.552,0.873,5.38,0.875c1.832-0.003,3.653-0.297,5.393-0.87l102.4-34.133c2.515-0.84,4.8-2.254,6.673-4.13    l224.802-224.802C484.25,86.023,484.253,44.657,458.742,19.142z M434.603,87.419L212.736,309.286l-66.287,22.135l22.067-66.202    L390.468,43.353c12.202-12.178,31.967-12.158,44.145,0.044c5.817,5.829,9.095,13.72,9.12,21.955    C443.754,73.631,440.467,81.575,434.603,87.419z"/></g></g></svg>&nbsp;Info</a>
              <?php if($client['etat'] =="normal" ): ?>
                <a class="bannir" href="supprimer_user.php?id=<?php echo $client['usernameClient']?>"><svg  xmlns="http://www.w3.org/2000/svg" height="427pt" viewBox="-40 0 427 427.00131" width="427pt"><path d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0"/><path d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/></svg>&nbsp;&nbsp;&nbsp;Bannir</a>
                <?php else: ?>
      <a class="btn debannir" href="debannir_user.php?id=<?php echo $client['usernameClient'];?>"><svg xmlns="http://www.w3.org/2000/svg" height="427pt" viewBox="-40 0 427 427.00131" width="427pt"><path d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0"/><path d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/></svg>&nbsp;&nbsp;&nbsp;Debannir</a>
                    <?php endif; ?>
            </td>

            </tr>
            <?php  $i=!$i?>

           <?php endforeach; ?>
        </table>
            <div class="linkpages">
            <?php  $select_all_clients = "SELECT * FROM client ";
             $result2 = mysqli_query($link,$select_all_clients) or die(mysqli_error($link));
              $numberOfrows = mysqli_num_rows($result2) ;
              $numberOfrows = ceil($numberOfrows)/5;
              if( $page > $numberOfrows) header("location:listeclients.php");
              ?>
              <?php if($page1 !="0"):?>
                <a href="listeclients.php?page=<?php echo $page-1 ?>"><svg class="previous" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 492 492" style="enable-background:new 0 0 492 492;" xml:space="preserve"><g><g><path d="M198.608,246.104L382.664,62.04c5.068-5.056,7.856-11.816,7.856-19.024c0-7.212-2.788-13.968-7.856-19.032l-16.128-16.12    C361.476,2.792,354.712,0,347.504,0s-13.964,2.792-19.028,7.864L109.328,227.008c-5.084,5.08-7.868,11.868-7.848,19.084    c-0.02,7.248,2.76,14.028,7.848,19.112l218.944,218.932c5.064,5.072,11.82,7.864,19.032,7.864c7.208,0,13.964-2.792,19.032-7.864    l16.124-16.12c10.492-10.492,10.492-27.572,0-38.06L198.608,246.104z"/></g></g></svg></a>
                <?php endif; ?>
                <?php for( $i =1 ; $i<= $numberOfrows ; $i++): ?>
                  <?php if($page == $i) $activelink = "activelink"; else $activelink = ''?>
                <a class="<?php echo $activelink?>"href="listeclients.php?page=<?php echo $i ?>"><?php echo $i."&nbsp;&nbsp;&nbsp;" ?></a>
                <?php endfor; ?>
                <?php if($page!=$numberOfrows):?>
                <a href="listeclients.php?page=<?php echo $page+1 ?>"><svg class="next" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004;" xml:space="preserve"><g><g><path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12    c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028    c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265    c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/></g></g></svg></a>
                <?php endif; ?>

                
            </div>
        </div>
      </main>

      <div id="sidebar">
        <div class="sidebar__title">
          <div class="sidebar__img">
            <h1>LYK ADMIN</h1>
          </div>
          <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
          ></i>
        </div>

        <div class="sidebar__menu">
          <div class="sidebar__link ">
            <i class="fa fa-home"></i>
            <a href="index.php">Dashboard</a>
          </div>
          <h2>MNG</h2>
          
          <div class="sidebar__link ">
            <i class="fa fa-building-o " ></i>
            <a href="listeproduits.php">Liste Produits</a>
          </div>
          <div class="sidebar__link active_menu_link" >
            <i class="fa fa-wrench"></i>
            <a href="listeclients.php">Liste Clients</a>
          </div>
          <div class="sidebar__link " >
            <i class="fa fa-wrench"></i>
            <a href="listeadmins.php">Liste Admins</a>
          </div>
          <div class="sidebar__link">
              <i class="fa fa-files-o"></i>
              <a href="Commande.php">Les Commandes</a>
            </div>
          <div class="sidebar__logout">
            <i class="fa fa-power-off"></i>
            <a href="../inscription/logout.php">Log out</a>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
  </body>
</html>