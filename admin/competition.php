<?php
  ob_start();
  session_start();
  if (isset($_SESSION['admin']))
  {

    if ( $_SESSION['type'] == 2)
{
    $page = isset($_GET['page']) ? $_GET['page'] : 'manage';

    if ($page == 'manage')
    {
      $pageTitle = 'compition management';
      include 'init.php';
      $ord = 'ASC';

      if (isset($_GET['ordering']))
      {
        $ord = $_GET['ordering'];
      }

      $stmt = $conn->prepare("SELECT * FROM competition  ORDER BY id $ord");
                $stmt->execute();
                $posts = $stmt->fetchAll();


        ?>
        <div class="default-management-list users-management">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="page-direction-bnts">
                  <ul>
                    <li>
                      <a href="dashboard.php">
                        <svg width="20" height="auto" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.73331 1.33334H3.66665C3.36131 1.33334 3.09865 1.33334 2.86665 1.388C2.50749 1.47382 2.17911 1.6574 1.91789 1.91839C1.65666 2.17938 1.47279 2.50759 1.38665 2.86667C1.33331 3.09867 1.33331 3.36 1.33331 3.66667V7C1.33331 7.30534 1.33331 7.568 1.38798 7.8C1.4738 8.15915 1.65737 8.48754 1.91837 8.74876C2.17936 9.00999 2.50757 9.19386 2.86665 9.28C3.09865 9.33334 3.35998 9.33334 3.66665 9.33334H6.99998C7.30531 9.33334 7.56798 9.33334 7.79998 9.27867C8.15913 9.19285 8.48751 9.00927 8.74874 8.74828C9.00996 8.48729 9.19384 8.15908 9.27998 7.8C9.33331 7.568 9.33331 7.30667 9.33331 7V3.66667C9.33331 3.36134 9.33331 3.09867 9.27865 2.86667C9.19283 2.50752 9.00925 2.17914 8.74826 1.91791C8.48727 1.65668 8.15905 1.47281 7.79998 1.38667C7.56798 1.33334 7.30665 1.33334 6.99998 1.33334H3.73331ZM3.17731 2.68534C3.23465 2.672 3.32398 2.66667 3.73331 2.66667H6.93331C7.34398 2.66667 7.43198 2.67067 7.48931 2.68534C7.60909 2.71398 7.71858 2.77524 7.80566 2.86232C7.89275 2.9494 7.954 3.0589 7.98265 3.17867C7.99598 3.23467 7.99998 3.32267 7.99998 3.73334V6.93334C7.99998 7.344 7.99598 7.432 7.98131 7.48934C7.95267 7.60911 7.89141 7.71861 7.80433 7.80569C7.71725 7.89277 7.60775 7.95403 7.48798 7.98267C7.43331 7.99467 7.34531 8 6.93331 8H3.73331C3.32265 8 3.23465 7.996 3.17731 7.98134C3.05754 7.95269 2.94804 7.89144 2.86096 7.80436C2.77388 7.71727 2.71262 7.60778 2.68398 7.488C2.67198 7.43334 2.66665 7.34534 2.66665 6.93334V3.73334C2.66665 3.32267 2.67065 3.23467 2.68531 3.17734C2.71395 3.05756 2.77521 2.94806 2.86229 2.86098C2.94937 2.7739 3.05887 2.71264 3.17865 2.684L3.17731 2.68534ZM13.0666 1.33334H13C12.6946 1.33334 12.432 1.33334 12.2 1.388C11.8408 1.47382 11.5124 1.6574 11.2512 1.91839C10.99 2.17938 10.8061 2.50759 10.72 2.86667C10.6666 3.09867 10.6666 3.36 10.6666 3.66667V7C10.6666 7.30534 10.6666 7.568 10.7213 7.8C10.8071 8.15915 10.9907 8.48754 11.2517 8.74876C11.5127 9.00999 11.8409 9.19386 12.2 9.28C12.432 9.33334 12.6933 9.33334 13 9.33334H16.3333C16.6386 9.33334 16.9013 9.33334 17.1333 9.27867C17.4925 9.19285 17.8208 9.00927 18.0821 8.74828C18.3433 8.48729 18.5272 8.15908 18.6133 7.8C18.6666 7.568 18.6666 7.30667 18.6666 7V3.66667C18.6666 3.36134 18.6666 3.09867 18.612 2.86667C18.5262 2.50752 18.3426 2.17914 18.0816 1.91791C17.8206 1.65668 17.4924 1.47281 17.1333 1.38667C16.9013 1.33334 16.64 1.33334 16.3333 1.33334H13.0666ZM12.5106 2.68534C12.568 2.672 12.6573 2.66667 13.0666 2.66667H16.2666C16.6773 2.66667 16.7653 2.67067 16.8226 2.68534C16.9424 2.71398 17.0519 2.77524 17.139 2.86232C17.2261 2.9494 17.2873 3.0589 17.316 3.17867C17.3293 3.23467 17.3333 3.32267 17.3333 3.73334V6.93334C17.3333 7.344 17.328 7.432 17.3146 7.48934C17.286 7.60911 17.2247 7.71861 17.1377 7.80569C17.0506 7.89277 16.9411 7.95403 16.8213 7.98267C16.7653 7.996 16.6773 8 16.2666 8H13.0666C12.656 8 12.568 7.996 12.5106 7.98134C12.3909 7.95269 12.2814 7.89144 12.1943 7.80436C12.1072 7.71727 12.046 7.60778 12.0173 7.488C12.0053 7.43334 12 7.34534 12 6.93334V3.73334C12 3.32267 12.004 3.23467 12.0186 3.17734C12.0473 3.05756 12.1085 2.94806 12.1956 2.86098C12.2827 2.7739 12.3922 2.71264 12.512 2.684L12.5106 2.68534ZM3.66665 10.6667H6.99998C7.30531 10.6667 7.56798 10.6667 7.79998 10.7213C8.15913 10.8072 8.48751 10.9907 8.74874 11.2517C9.00996 11.5127 9.19384 11.8409 9.27998 12.2C9.33331 12.432 9.33331 12.6933 9.33331 13V16.3333C9.33331 16.6387 9.33331 16.9013 9.27865 17.1333C9.19283 17.4925 9.00925 17.8209 8.74826 18.0821C8.48727 18.3433 8.15905 18.5272 7.79998 18.6133C7.56798 18.6667 7.30665 18.6667 6.99998 18.6667H3.66665C3.36131 18.6667 3.09865 18.6667 2.86665 18.612C2.50749 18.5262 2.17911 18.3426 1.91789 18.0816C1.65666 17.8206 1.47279 17.4924 1.38665 17.1333C1.33331 16.9013 1.33331 16.64 1.33331 16.3333V13C1.33331 12.6947 1.33331 12.432 1.38798 12.2C1.4738 11.8409 1.65737 11.5125 1.91837 11.2512C2.17936 10.99 2.50757 10.8061 2.86665 10.72C3.09865 10.6667 3.35998 10.6667 3.66665 10.6667ZM3.73331 12C3.32265 12 3.23465 12.004 3.17731 12.0187C3.05754 12.0473 2.94804 12.1086 2.86096 12.1956C2.77388 12.2827 2.71262 12.3922 2.68398 12.512C2.67198 12.5667 2.66665 12.6547 2.66665 13.0667V16.2667C2.66665 16.6773 2.67065 16.7653 2.68531 16.8227C2.71395 16.9424 2.77521 17.0519 2.86229 17.139C2.94937 17.2261 3.05887 17.2874 3.17865 17.316C3.23465 17.3293 3.32265 17.3333 3.73331 17.3333H6.93331C7.34398 17.3333 7.43198 17.328 7.48931 17.3147C7.60909 17.286 7.71858 17.2248 7.80566 17.1377C7.89275 17.0506 7.954 16.9411 7.98265 16.8213C7.99598 16.7653 7.99998 16.6773 7.99998 16.2667V13.0667C7.99998 12.656 7.99598 12.568 7.98131 12.5107C7.95267 12.3909 7.89141 12.2814 7.80433 12.1943C7.71725 12.1072 7.60775 12.046 7.48798 12.0173C7.43331 12.0053 7.34531 12 6.93331 12H3.73331ZM13.0666 10.6667H13C12.6946 10.6667 12.432 10.6667 12.2 10.7213C11.8408 10.8072 11.5124 10.9907 11.2512 11.2517C10.99 11.5127 10.8061 11.8409 10.72 12.2C10.6666 12.432 10.6666 12.6933 10.6666 13V16.3333C10.6666 16.6387 10.6666 16.9013 10.7213 17.1333C10.8071 17.4925 10.9907 17.8209 11.2517 18.0821C11.5127 18.3433 11.8409 18.5272 12.2 18.6133C12.432 18.668 12.6946 18.668 13 18.668H16.3333C16.6386 18.668 16.9013 18.668 17.1333 18.6133C17.4922 18.5273 17.8203 18.3436 18.0813 18.0827C18.3423 17.8217 18.5259 17.4936 18.612 17.1347C18.6666 16.9027 18.6666 16.64 18.6666 16.3347V13C18.6666 12.6947 18.6666 12.432 18.612 12.2C18.5262 11.8409 18.3426 11.5125 18.0816 11.2512C17.8206 10.99 17.4924 10.8061 17.1333 10.72C16.9013 10.6667 16.64 10.6667 16.3333 10.6667H13.0666ZM12.5106 12.0187C12.568 12.0053 12.6573 12 13.0666 12H16.2666C16.6773 12 16.7653 12.004 16.8226 12.0187C16.9424 12.0473 17.0519 12.1086 17.139 12.1956C17.2261 12.2827 17.2873 12.3922 17.316 12.512C17.3293 12.568 17.3333 12.656 17.3333 13.0667V16.2667C17.3333 16.6773 17.328 16.7653 17.3146 16.8227C17.286 16.9424 17.2247 17.0519 17.1377 17.139C17.0506 17.2261 16.9411 17.2874 16.8213 17.316C16.7653 17.3293 16.6773 17.3333 16.2666 17.3333H13.0666C12.656 17.3333 12.568 17.328 12.5106 17.3147C12.3909 17.286 12.2814 17.2248 12.1943 17.1377C12.1072 17.0506 12.046 16.9411 12.0173 16.8213C12.0053 16.7667 12 16.6787 12 16.2667V13.0667C12 12.656 12.004 12.568 12.0186 12.5107C12.0473 12.3909 12.1085 12.2814 12.1956 12.1943C12.2827 12.1072 12.3922 12.046 12.512 12.0173L12.5106 12.0187Z" fill="#8094ae"/>
                        </svg>
                        dashboard</a>
                    </li>
                    <li>
                      <a href="competition.php?page=manage">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 8C20 8 20 4 16 4C12 4 12 8 12 8M29 17V28H3V17H29ZM2 8H30V16C30 16 24 20 16 20C8 20 2 16 2 16V8ZM16 22V18V22Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                      competition</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6">
                <div class="left-header management-header">
                  <h1>total competitions</h1>
                  <p class="tt">total competitions <?php echo Total($conn, 'competition ') ?> compition.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="right-header management-header">
                  <div class="btns">
                    <a href="competition.php?page=add" class="add-btn">add new compition </a>
                  </div>
                </div>
              </div>

              <div class="col-md-6 srch-sp">
                <div class="search-box">
                  <!-- <input type="search" class="form-control" name="search" id="categories-search" onkeyup="tabletwo()" autocomplete="off" placeholder="search by name"> -->
                </div>
              </div>
              <div class="col-md-6">
                <div class="ordering">
                  <ul>
                    <li class=" dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ordering <i class="fas fa-sort"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="competition.php?page=manage&ordering=ASC">

                                ASC
                              </a>

                              <a class="dropdown-item" href="competition.php?page=manage&ordering=DESC">
                                DESC
                              </a>
                            </div>
                          </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-12">
                <div class="management-body">
                  <div class="default-management-table">
                    <table class="table" id="categories-table">
                      <thead>
                        <tr>
                          <th scope="col">id</th>
                          <th scope="col">description</th>

                          <th scope="col">start</th>
                          <th scope="col">end</th>


                          <th scope="col">action</th>

                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        foreach($posts as $post)
                        {
                          ?>
                          <tr>
                            <td>
                              <p><?php echo $post['id'] ?></p>
                            </td>

                            <td>
                              <p class="f-n"><?php echo $post['title']; ?> </p>
                            </td>
                            <td>
                              <p class="f-n"><?php echo $post['str']; ?> </p>
                            </td>
                            <td>
                              <?php
                              echo $post['ed'];
                               ?>
                            </td>

                            <td>
                              <?php

                                    ?>
                                    <ul>
                                      <li class=" dropdown">
                                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                              </a>
                                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="competition.php?page=winners&id=<?php echo $post['id'] ?>">


                                              winners
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="competition.php?page=delete&id=<?php echo $post['id'] ?>">
                                                <i class="fas fa-trash"></i>

                                              delete
                                                </a>
                                              </div>
                                            </li>
                                    </ul>
                                    <?php




                               ?>

                            </td>

                          </tr>
                          <tr>

                          <?php
                        }
                         ?>



                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <?php


      ?>

        <?php
      include $tpl . 'footer.php';

    }
        elseif ($page == 'winners')
        {
          $pageTitle = 'Winners management';
          include 'init.php';
          $ord = 'ASC';
          $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: index.php');

          if (isset($_GET['ordering']))
          {
            $ord = $_GET['ordering'];
          }

          $stmt = $conn->prepare("SELECT * FROM places WHERE comp = ?  ORDER BY id $ord");
                    $stmt->execute(array($id));
                    $posts = $stmt->fetchAll();



                    $stmt = $conn->prepare("SELECT * FROM competition WHERE id = ?");
                              $stmt->execute(array($id));
                              $comp = $stmt->fetch();



            ?>
            <div class="default-management-list users-management">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div class="page-direction-bnts">
                      <ul>
                        <li>
                          <a href="dashboard.php">
                            <svg width="20" height="auto" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.73331 1.33334H3.66665C3.36131 1.33334 3.09865 1.33334 2.86665 1.388C2.50749 1.47382 2.17911 1.6574 1.91789 1.91839C1.65666 2.17938 1.47279 2.50759 1.38665 2.86667C1.33331 3.09867 1.33331 3.36 1.33331 3.66667V7C1.33331 7.30534 1.33331 7.568 1.38798 7.8C1.4738 8.15915 1.65737 8.48754 1.91837 8.74876C2.17936 9.00999 2.50757 9.19386 2.86665 9.28C3.09865 9.33334 3.35998 9.33334 3.66665 9.33334H6.99998C7.30531 9.33334 7.56798 9.33334 7.79998 9.27867C8.15913 9.19285 8.48751 9.00927 8.74874 8.74828C9.00996 8.48729 9.19384 8.15908 9.27998 7.8C9.33331 7.568 9.33331 7.30667 9.33331 7V3.66667C9.33331 3.36134 9.33331 3.09867 9.27865 2.86667C9.19283 2.50752 9.00925 2.17914 8.74826 1.91791C8.48727 1.65668 8.15905 1.47281 7.79998 1.38667C7.56798 1.33334 7.30665 1.33334 6.99998 1.33334H3.73331ZM3.17731 2.68534C3.23465 2.672 3.32398 2.66667 3.73331 2.66667H6.93331C7.34398 2.66667 7.43198 2.67067 7.48931 2.68534C7.60909 2.71398 7.71858 2.77524 7.80566 2.86232C7.89275 2.9494 7.954 3.0589 7.98265 3.17867C7.99598 3.23467 7.99998 3.32267 7.99998 3.73334V6.93334C7.99998 7.344 7.99598 7.432 7.98131 7.48934C7.95267 7.60911 7.89141 7.71861 7.80433 7.80569C7.71725 7.89277 7.60775 7.95403 7.48798 7.98267C7.43331 7.99467 7.34531 8 6.93331 8H3.73331C3.32265 8 3.23465 7.996 3.17731 7.98134C3.05754 7.95269 2.94804 7.89144 2.86096 7.80436C2.77388 7.71727 2.71262 7.60778 2.68398 7.488C2.67198 7.43334 2.66665 7.34534 2.66665 6.93334V3.73334C2.66665 3.32267 2.67065 3.23467 2.68531 3.17734C2.71395 3.05756 2.77521 2.94806 2.86229 2.86098C2.94937 2.7739 3.05887 2.71264 3.17865 2.684L3.17731 2.68534ZM13.0666 1.33334H13C12.6946 1.33334 12.432 1.33334 12.2 1.388C11.8408 1.47382 11.5124 1.6574 11.2512 1.91839C10.99 2.17938 10.8061 2.50759 10.72 2.86667C10.6666 3.09867 10.6666 3.36 10.6666 3.66667V7C10.6666 7.30534 10.6666 7.568 10.7213 7.8C10.8071 8.15915 10.9907 8.48754 11.2517 8.74876C11.5127 9.00999 11.8409 9.19386 12.2 9.28C12.432 9.33334 12.6933 9.33334 13 9.33334H16.3333C16.6386 9.33334 16.9013 9.33334 17.1333 9.27867C17.4925 9.19285 17.8208 9.00927 18.0821 8.74828C18.3433 8.48729 18.5272 8.15908 18.6133 7.8C18.6666 7.568 18.6666 7.30667 18.6666 7V3.66667C18.6666 3.36134 18.6666 3.09867 18.612 2.86667C18.5262 2.50752 18.3426 2.17914 18.0816 1.91791C17.8206 1.65668 17.4924 1.47281 17.1333 1.38667C16.9013 1.33334 16.64 1.33334 16.3333 1.33334H13.0666ZM12.5106 2.68534C12.568 2.672 12.6573 2.66667 13.0666 2.66667H16.2666C16.6773 2.66667 16.7653 2.67067 16.8226 2.68534C16.9424 2.71398 17.0519 2.77524 17.139 2.86232C17.2261 2.9494 17.2873 3.0589 17.316 3.17867C17.3293 3.23467 17.3333 3.32267 17.3333 3.73334V6.93334C17.3333 7.344 17.328 7.432 17.3146 7.48934C17.286 7.60911 17.2247 7.71861 17.1377 7.80569C17.0506 7.89277 16.9411 7.95403 16.8213 7.98267C16.7653 7.996 16.6773 8 16.2666 8H13.0666C12.656 8 12.568 7.996 12.5106 7.98134C12.3909 7.95269 12.2814 7.89144 12.1943 7.80436C12.1072 7.71727 12.046 7.60778 12.0173 7.488C12.0053 7.43334 12 7.34534 12 6.93334V3.73334C12 3.32267 12.004 3.23467 12.0186 3.17734C12.0473 3.05756 12.1085 2.94806 12.1956 2.86098C12.2827 2.7739 12.3922 2.71264 12.512 2.684L12.5106 2.68534ZM3.66665 10.6667H6.99998C7.30531 10.6667 7.56798 10.6667 7.79998 10.7213C8.15913 10.8072 8.48751 10.9907 8.74874 11.2517C9.00996 11.5127 9.19384 11.8409 9.27998 12.2C9.33331 12.432 9.33331 12.6933 9.33331 13V16.3333C9.33331 16.6387 9.33331 16.9013 9.27865 17.1333C9.19283 17.4925 9.00925 17.8209 8.74826 18.0821C8.48727 18.3433 8.15905 18.5272 7.79998 18.6133C7.56798 18.6667 7.30665 18.6667 6.99998 18.6667H3.66665C3.36131 18.6667 3.09865 18.6667 2.86665 18.612C2.50749 18.5262 2.17911 18.3426 1.91789 18.0816C1.65666 17.8206 1.47279 17.4924 1.38665 17.1333C1.33331 16.9013 1.33331 16.64 1.33331 16.3333V13C1.33331 12.6947 1.33331 12.432 1.38798 12.2C1.4738 11.8409 1.65737 11.5125 1.91837 11.2512C2.17936 10.99 2.50757 10.8061 2.86665 10.72C3.09865 10.6667 3.35998 10.6667 3.66665 10.6667ZM3.73331 12C3.32265 12 3.23465 12.004 3.17731 12.0187C3.05754 12.0473 2.94804 12.1086 2.86096 12.1956C2.77388 12.2827 2.71262 12.3922 2.68398 12.512C2.67198 12.5667 2.66665 12.6547 2.66665 13.0667V16.2667C2.66665 16.6773 2.67065 16.7653 2.68531 16.8227C2.71395 16.9424 2.77521 17.0519 2.86229 17.139C2.94937 17.2261 3.05887 17.2874 3.17865 17.316C3.23465 17.3293 3.32265 17.3333 3.73331 17.3333H6.93331C7.34398 17.3333 7.43198 17.328 7.48931 17.3147C7.60909 17.286 7.71858 17.2248 7.80566 17.1377C7.89275 17.0506 7.954 16.9411 7.98265 16.8213C7.99598 16.7653 7.99998 16.6773 7.99998 16.2667V13.0667C7.99998 12.656 7.99598 12.568 7.98131 12.5107C7.95267 12.3909 7.89141 12.2814 7.80433 12.1943C7.71725 12.1072 7.60775 12.046 7.48798 12.0173C7.43331 12.0053 7.34531 12 6.93331 12H3.73331ZM13.0666 10.6667H13C12.6946 10.6667 12.432 10.6667 12.2 10.7213C11.8408 10.8072 11.5124 10.9907 11.2512 11.2517C10.99 11.5127 10.8061 11.8409 10.72 12.2C10.6666 12.432 10.6666 12.6933 10.6666 13V16.3333C10.6666 16.6387 10.6666 16.9013 10.7213 17.1333C10.8071 17.4925 10.9907 17.8209 11.2517 18.0821C11.5127 18.3433 11.8409 18.5272 12.2 18.6133C12.432 18.668 12.6946 18.668 13 18.668H16.3333C16.6386 18.668 16.9013 18.668 17.1333 18.6133C17.4922 18.5273 17.8203 18.3436 18.0813 18.0827C18.3423 17.8217 18.5259 17.4936 18.612 17.1347C18.6666 16.9027 18.6666 16.64 18.6666 16.3347V13C18.6666 12.6947 18.6666 12.432 18.612 12.2C18.5262 11.8409 18.3426 11.5125 18.0816 11.2512C17.8206 10.99 17.4924 10.8061 17.1333 10.72C16.9013 10.6667 16.64 10.6667 16.3333 10.6667H13.0666ZM12.5106 12.0187C12.568 12.0053 12.6573 12 13.0666 12H16.2666C16.6773 12 16.7653 12.004 16.8226 12.0187C16.9424 12.0473 17.0519 12.1086 17.139 12.1956C17.2261 12.2827 17.2873 12.3922 17.316 12.512C17.3293 12.568 17.3333 12.656 17.3333 13.0667V16.2667C17.3333 16.6773 17.328 16.7653 17.3146 16.8227C17.286 16.9424 17.2247 17.0519 17.1377 17.139C17.0506 17.2261 16.9411 17.2874 16.8213 17.316C16.7653 17.3293 16.6773 17.3333 16.2666 17.3333H13.0666C12.656 17.3333 12.568 17.328 12.5106 17.3147C12.3909 17.286 12.2814 17.2248 12.1943 17.1377C12.1072 17.0506 12.046 16.9411 12.0173 16.8213C12.0053 16.7667 12 16.6787 12 16.2667V13.0667C12 12.656 12.004 12.568 12.0186 12.5107C12.0473 12.3909 12.1085 12.2814 12.1956 12.1943C12.2827 12.1072 12.3922 12.046 12.512 12.0173L12.5106 12.0187Z" fill="#8094ae"/>
                            </svg>
                            dashboard</a>
                        </li>
                        <li>
                          <a href="competition.php?page=manage">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 8C20 8 20 4 16 4C12 4 12 8 12 8M29 17V28H3V17H29ZM2 8H30V16C30 16 24 20 16 20C8 20 2 16 2 16V8ZM16 22V18V22Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                          winners management</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="left-header management-header">
                      <h1>Awards for Competition <?php echo $comp['title'] ?></h1>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="right-header management-header">
                      <div class="btns">
                        <a href="competition.php?page=addwin&id=<?php echo $comp['id'] ?>" class="add-btn">add new Award </a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 srch-sp">
                    <div class="search-box">
                      <!-- <input type="search" class="form-control" name="search" id="categories-search" onkeyup="tabletwo()" autocomplete="off" placeholder="search by name"> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="ordering">
                      <ul>

                      </ul>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="management-body">
                      <div class="default-management-table">
                        <table class="table" id="categories-table">
                          <thead>
                            <tr>
                              <th scope="col">id</th>
                              <th scope="col">From place</th>

                              <th scope="col">To place</th>
                              <th scope="col">Points Wining</th>


                              <th scope="col">action</th>

                            </tr>
                          </thead>
                          <tbody>

                            <?php
                            foreach($posts as $post)
                            {
                              ?>
                              <tr>
                                <td>
                                  <p><?php echo $post['id'] ?></p>
                                </td>

                                <td>
                                  <p class="f-n"><?php echo $post['frm']; ?> </p>
                                </td>
                                <td>
                                  <p class="f-n"><?php echo $post['t']; ?> </p>
                                </td>
                                <td>
                                  <?php
                                  echo $post['points'];
                                   ?>
                                </td>

                                <td>
                                  <?php

                                        ?>
                                        <ul>
                                          <li class=" dropdown">
                                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                  </a>
                                                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="competition.php?page=deletewin&id=<?php echo $post['id'] ?>">
                                                    <i class="fas fa-trash"></i>

                                                  delete
                                                    </a>
                                                  </div>
                                                </li>
                                        </ul>
                                        <?php




                                   ?>

                                </td>

                              </tr>
                              <tr>

                              <?php
                            }
                             ?>



                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <?php


          ?>

            <?php
          include $tpl . 'footer.php';

        }elseif ($page == "addwin") {
      $pageTitle = 'add new service';
      include 'init.php';

      $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: index.php');

      ?>
      <div class="add-default-page add-post-page  add-product-page " id="add-page">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <form class="add-fomr" method="POST" action="competition.php?page=insertwin" enctype="multipart/form-data"  id="ca-form-info"  >
                <h3>add new award <i class="fas fa-plus"></i>  </h3>
                  <div class="row">

                    <div class="form-group col-12">
                      <label for="str">From place</label>
                      <input type="text" name="frm" id="str" placeholder="" class="form-control">
                    </div>
                    <div class="form-group col-12">
                      <label for="tt">To place</label>
                      <input type="text" name="tt" id="tt" placeholder="" class="form-control">
                    </div>
                    <div class="form-group col-12">
                      <label for="points">Winining points</label>
                      <input type="text" name="points" id="points" placeholder="" class="form-control">
                    </div>
                    <input type="hidden" name="comp" value="<?php echo $id ?>">
                    <!-- <div class="form-group col-12">
                      <p for="description" style="display:block;text-align:right">وصف و معلومات حول الخدمة</p>

                      <textarea name="description"  class="form-control "style="text-align:right" ></textarea>

                    </div> -->





                  </div>

                <input type="submit" class="btn btn-primary" id="ca-btn-option"  value="add">
                <div class="err-msg">

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php

      include $tpl . 'footer.php';
    }

        elseif ($page == "add") {
      $pageTitle = 'add new service';
      include 'init.php';
      ?>
      <div class="add-default-page add-post-page  add-product-page " id="add-page">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <form class="add-fomr" method="POST" action="competition.php?page=insert" enctype="multipart/form-data"  id="ca-form-info"  >
                <h3>add new competition <i class="fas fa-plus"></i>  </h3>
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="title">Descrition</label>
                      <input type="text" name="title" id="title" placeholder="exp : compition end on this day" class="form-control">
                    </div>
                    <div class="form-group col-12">
                      <label for="str">start date</label>
                      <input type="date" name="str" id="str" placeholder="" class="form-control">
                    </div>
                    <div class="form-group col-12">
                      <label for="ed">end date</label>
                      <input type="date" name="ed" id="ed" placeholder="" class="form-control">
                    </div>


                    <!-- <div class="form-group col-12">
                      <p for="description" style="display:block;text-align:right">وصف و معلومات حول الخدمة</p>

                      <textarea name="description"  class="form-control "style="text-align:right" ></textarea>

                    </div> -->





                  </div>

                <input type="submit" class="btn btn-primary" id="ca-btn-option"  value="add">
                <div class="err-msg">

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php

      include $tpl . 'footer.php';
    }
    elseif ($page == 'insertwin') {
      $pageTitle = 'insert  post';
      include 'init.php';

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        $frm = $_POST['frm'];
        $tt = $_POST['tt'];
        $comp = $_POST['comp'];
        $points = $_POST['points'];





        $formErrors = array();
        if (empty($frm))
        {
          $formErrors[] = 'From place is required';
        }

        if (empty($tt))
        {
          $formErrors[] = 'to place is required';
        }





                                      foreach ($formErrors as $error ) {
                                        ?>
                                        <div class="container" style="margin-top:50px">
                                          <div class="row justify-content-center">
                                              <div class="col-md-4">
                                                <?php
                                                  echo '<div class="alert alert-danger" style="width: 100%;text-align:center">' . $error . '</div>';
                                                 ?>

                                              </div>
                                          </div>
                                        </div>
                                        <?php
                                      }



                          if (empty($formErrors))
                            {

                                $stmt = $conn->prepare("INSERT INTO places(frm,t,points,comp) VALUES(:zn,:zimg,:zpo, :zdesc )");
                                $stmt->execute(array(
                                  'zn' => $frm,
                                  'zimg' => $tt,
                                  'zpo' => $points,
                                  'zdesc' => $comp


                                ));
                                ?>
                                <div class="alert alert-success" style="margin-top: 15px">
                              The awards has been successfully added
                                </div>
                                <?php
                                header('location: competition.php?page=manage');
                              }




      }else {
        header('location: posts.php');
      }
      include $tpl . 'footer.php';

      ?>
      <?php
    }

    elseif ($page == 'insert') {
      $pageTitle = 'insert  post';
      include 'init.php';

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        $title = $_POST['title'];
        $str = $_POST['str'];
        $ed = $_POST['ed'];





        $formErrors = array();
        if (empty($title))
        {
          $formErrors[] = 'Title is required';
        }

        if (empty($str))
        {
          $formErrors[] = 'start date   is required';
        }

        if (empty($ed))
        {
          $formErrors[] = "End date  is required";
        }



                                      foreach ($formErrors as $error ) {
                                        ?>
                                        <div class="container" style="margin-top:50px">
                                          <div class="row justify-content-center">
                                              <div class="col-md-4">
                                                <?php
                                                  echo '<div class="alert alert-danger" style="width: 100%;text-align:center">' . $error . '</div>';
                                                 ?>

                                              </div>
                                          </div>
                                        </div>
                                        <?php
                                      }



                          if (empty($formErrors))
                            {
                                $image = rand(0,100000) . '_' . $imageName;
                                move_uploaded_file($imageTmp, $images . '/' . $image);
                                $stmt = $conn->prepare("INSERT INTO competition(title,str,ed) VALUES(:zn,:zimg, :zdesc )");
                                $stmt->execute(array(
                                  'zn' => $title,
                                  'zimg' => $str,
                                  'zdesc' => $ed


                                ));
                                ?>
                                <div class="alert alert-success" style="margin-top: 15px">
                              The competition has been successfully added
                                </div>
                                <?php
                                header('location: competition.php?page=manage');
                              }




      }else {
        header('location: posts.php');
      }
      include $tpl . 'footer.php';

      ?>
      <?php
    }

    elseif ($page == 'edit') {
      $pageTitle = "competition edit page";
      include 'init.php';

      $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: competition.php');
      $stmt = $conn->prepare("SELECT * FROM competition WHERE id= ? LIMIT 1");
      $stmt->execute(array($id));
      $checkpost = $stmt->rowCount();
      $postinfo = $stmt->fetch();
      if ($checkpost > 0)
      {


          ?>
          <div class="edit-page user-edit-pages deep-page">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-12">
                  <div class="pg-tt" style="text-align:right">
                    <h1> edit service - <?php echo $postinfo['name'] ?>  </h1>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="page-direction-bnts">
                    <ul>
                      <li>
                        <a href="dashboard.php">
                          <svg width="20" height="auto" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M3.73331 1.33334H3.66665C3.36131 1.33334 3.09865 1.33334 2.86665 1.388C2.50749 1.47382 2.17911 1.6574 1.91789 1.91839C1.65666 2.17938 1.47279 2.50759 1.38665 2.86667C1.33331 3.09867 1.33331 3.36 1.33331 3.66667V7C1.33331 7.30534 1.33331 7.568 1.38798 7.8C1.4738 8.15915 1.65737 8.48754 1.91837 8.74876C2.17936 9.00999 2.50757 9.19386 2.86665 9.28C3.09865 9.33334 3.35998 9.33334 3.66665 9.33334H6.99998C7.30531 9.33334 7.56798 9.33334 7.79998 9.27867C8.15913 9.19285 8.48751 9.00927 8.74874 8.74828C9.00996 8.48729 9.19384 8.15908 9.27998 7.8C9.33331 7.568 9.33331 7.30667 9.33331 7V3.66667C9.33331 3.36134 9.33331 3.09867 9.27865 2.86667C9.19283 2.50752 9.00925 2.17914 8.74826 1.91791C8.48727 1.65668 8.15905 1.47281 7.79998 1.38667C7.56798 1.33334 7.30665 1.33334 6.99998 1.33334H3.73331ZM3.17731 2.68534C3.23465 2.672 3.32398 2.66667 3.73331 2.66667H6.93331C7.34398 2.66667 7.43198 2.67067 7.48931 2.68534C7.60909 2.71398 7.71858 2.77524 7.80566 2.86232C7.89275 2.9494 7.954 3.0589 7.98265 3.17867C7.99598 3.23467 7.99998 3.32267 7.99998 3.73334V6.93334C7.99998 7.344 7.99598 7.432 7.98131 7.48934C7.95267 7.60911 7.89141 7.71861 7.80433 7.80569C7.71725 7.89277 7.60775 7.95403 7.48798 7.98267C7.43331 7.99467 7.34531 8 6.93331 8H3.73331C3.32265 8 3.23465 7.996 3.17731 7.98134C3.05754 7.95269 2.94804 7.89144 2.86096 7.80436C2.77388 7.71727 2.71262 7.60778 2.68398 7.488C2.67198 7.43334 2.66665 7.34534 2.66665 6.93334V3.73334C2.66665 3.32267 2.67065 3.23467 2.68531 3.17734C2.71395 3.05756 2.77521 2.94806 2.86229 2.86098C2.94937 2.7739 3.05887 2.71264 3.17865 2.684L3.17731 2.68534ZM13.0666 1.33334H13C12.6946 1.33334 12.432 1.33334 12.2 1.388C11.8408 1.47382 11.5124 1.6574 11.2512 1.91839C10.99 2.17938 10.8061 2.50759 10.72 2.86667C10.6666 3.09867 10.6666 3.36 10.6666 3.66667V7C10.6666 7.30534 10.6666 7.568 10.7213 7.8C10.8071 8.15915 10.9907 8.48754 11.2517 8.74876C11.5127 9.00999 11.8409 9.19386 12.2 9.28C12.432 9.33334 12.6933 9.33334 13 9.33334H16.3333C16.6386 9.33334 16.9013 9.33334 17.1333 9.27867C17.4925 9.19285 17.8208 9.00927 18.0821 8.74828C18.3433 8.48729 18.5272 8.15908 18.6133 7.8C18.6666 7.568 18.6666 7.30667 18.6666 7V3.66667C18.6666 3.36134 18.6666 3.09867 18.612 2.86667C18.5262 2.50752 18.3426 2.17914 18.0816 1.91791C17.8206 1.65668 17.4924 1.47281 17.1333 1.38667C16.9013 1.33334 16.64 1.33334 16.3333 1.33334H13.0666ZM12.5106 2.68534C12.568 2.672 12.6573 2.66667 13.0666 2.66667H16.2666C16.6773 2.66667 16.7653 2.67067 16.8226 2.68534C16.9424 2.71398 17.0519 2.77524 17.139 2.86232C17.2261 2.9494 17.2873 3.0589 17.316 3.17867C17.3293 3.23467 17.3333 3.32267 17.3333 3.73334V6.93334C17.3333 7.344 17.328 7.432 17.3146 7.48934C17.286 7.60911 17.2247 7.71861 17.1377 7.80569C17.0506 7.89277 16.9411 7.95403 16.8213 7.98267C16.7653 7.996 16.6773 8 16.2666 8H13.0666C12.656 8 12.568 7.996 12.5106 7.98134C12.3909 7.95269 12.2814 7.89144 12.1943 7.80436C12.1072 7.71727 12.046 7.60778 12.0173 7.488C12.0053 7.43334 12 7.34534 12 6.93334V3.73334C12 3.32267 12.004 3.23467 12.0186 3.17734C12.0473 3.05756 12.1085 2.94806 12.1956 2.86098C12.2827 2.7739 12.3922 2.71264 12.512 2.684L12.5106 2.68534ZM3.66665 10.6667H6.99998C7.30531 10.6667 7.56798 10.6667 7.79998 10.7213C8.15913 10.8072 8.48751 10.9907 8.74874 11.2517C9.00996 11.5127 9.19384 11.8409 9.27998 12.2C9.33331 12.432 9.33331 12.6933 9.33331 13V16.3333C9.33331 16.6387 9.33331 16.9013 9.27865 17.1333C9.19283 17.4925 9.00925 17.8209 8.74826 18.0821C8.48727 18.3433 8.15905 18.5272 7.79998 18.6133C7.56798 18.6667 7.30665 18.6667 6.99998 18.6667H3.66665C3.36131 18.6667 3.09865 18.6667 2.86665 18.612C2.50749 18.5262 2.17911 18.3426 1.91789 18.0816C1.65666 17.8206 1.47279 17.4924 1.38665 17.1333C1.33331 16.9013 1.33331 16.64 1.33331 16.3333V13C1.33331 12.6947 1.33331 12.432 1.38798 12.2C1.4738 11.8409 1.65737 11.5125 1.91837 11.2512C2.17936 10.99 2.50757 10.8061 2.86665 10.72C3.09865 10.6667 3.35998 10.6667 3.66665 10.6667ZM3.73331 12C3.32265 12 3.23465 12.004 3.17731 12.0187C3.05754 12.0473 2.94804 12.1086 2.86096 12.1956C2.77388 12.2827 2.71262 12.3922 2.68398 12.512C2.67198 12.5667 2.66665 12.6547 2.66665 13.0667V16.2667C2.66665 16.6773 2.67065 16.7653 2.68531 16.8227C2.71395 16.9424 2.77521 17.0519 2.86229 17.139C2.94937 17.2261 3.05887 17.2874 3.17865 17.316C3.23465 17.3293 3.32265 17.3333 3.73331 17.3333H6.93331C7.34398 17.3333 7.43198 17.328 7.48931 17.3147C7.60909 17.286 7.71858 17.2248 7.80566 17.1377C7.89275 17.0506 7.954 16.9411 7.98265 16.8213C7.99598 16.7653 7.99998 16.6773 7.99998 16.2667V13.0667C7.99998 12.656 7.99598 12.568 7.98131 12.5107C7.95267 12.3909 7.89141 12.2814 7.80433 12.1943C7.71725 12.1072 7.60775 12.046 7.48798 12.0173C7.43331 12.0053 7.34531 12 6.93331 12H3.73331ZM13.0666 10.6667H13C12.6946 10.6667 12.432 10.6667 12.2 10.7213C11.8408 10.8072 11.5124 10.9907 11.2512 11.2517C10.99 11.5127 10.8061 11.8409 10.72 12.2C10.6666 12.432 10.6666 12.6933 10.6666 13V16.3333C10.6666 16.6387 10.6666 16.9013 10.7213 17.1333C10.8071 17.4925 10.9907 17.8209 11.2517 18.0821C11.5127 18.3433 11.8409 18.5272 12.2 18.6133C12.432 18.668 12.6946 18.668 13 18.668H16.3333C16.6386 18.668 16.9013 18.668 17.1333 18.6133C17.4922 18.5273 17.8203 18.3436 18.0813 18.0827C18.3423 17.8217 18.5259 17.4936 18.612 17.1347C18.6666 16.9027 18.6666 16.64 18.6666 16.3347V13C18.6666 12.6947 18.6666 12.432 18.612 12.2C18.5262 11.8409 18.3426 11.5125 18.0816 11.2512C17.8206 10.99 17.4924 10.8061 17.1333 10.72C16.9013 10.6667 16.64 10.6667 16.3333 10.6667H13.0666ZM12.5106 12.0187C12.568 12.0053 12.6573 12 13.0666 12H16.2666C16.6773 12 16.7653 12.004 16.8226 12.0187C16.9424 12.0473 17.0519 12.1086 17.139 12.1956C17.2261 12.2827 17.2873 12.3922 17.316 12.512C17.3293 12.568 17.3333 12.656 17.3333 13.0667V16.2667C17.3333 16.6773 17.328 16.7653 17.3146 16.8227C17.286 16.9424 17.2247 17.0519 17.1377 17.139C17.0506 17.2261 16.9411 17.2874 16.8213 17.316C16.7653 17.3293 16.6773 17.3333 16.2666 17.3333H13.0666C12.656 17.3333 12.568 17.328 12.5106 17.3147C12.3909 17.286 12.2814 17.2248 12.1943 17.1377C12.1072 17.0506 12.046 16.9411 12.0173 16.8213C12.0053 16.7667 12 16.6787 12 16.2667V13.0667C12 12.656 12.004 12.568 12.0186 12.5107C12.0473 12.3909 12.1085 12.2814 12.1956 12.1943C12.2827 12.1072 12.3922 12.046 12.512 12.0173L12.5106 12.0187Z" fill="#8094ae"/>
                          </svg>
                        dashboard</a>
                      </li>
                      <li>
                        <a href="competition.php?page=manage">
                          <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M24 30H8C7.46973 29.9995 6.96133 29.7886 6.58637 29.4136C6.21141 29.0387 6.00053 28.5303 6 28V4C6.00053 3.46973 6.21141 2.96133 6.58637 2.58637C6.96133 2.21141 7.46973 2.00053 8 2H24C24.5303 2.00053 25.0387 2.21141 25.4136 2.58637C25.7886 2.96133 25.9995 3.46973 26 4V20.618L21 18.118L16 20.618V4H8V28H24V24H26V28C25.9992 28.5302 25.7882 29.0384 25.4133 29.4133C25.0384 29.7882 24.5302 29.9992 24 30V30ZM21 15.882L24 17.382V4H18V17.382L21 15.882Z" fill="black"/>
                          </svg>

                          service</a>
                      </li>

                      <li>
                        <a href="competition.php?page=edit&id=<?php echo $postinfo['id'] ?>">

                        <?php echo $postinfo['name'] ?></a>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="col-md-7">
                  <div class="use-fl-info">
                    <form class="add-fomr" method="POST" action="competition.php?page=update" enctype="multipart/form-data"  id="ca-form-info"  >
                        <div class="row">
                          <div class="form-group col-12">
                            <label for="name">name</label>
                            <input type="text" name="name" id="name" placeholder=" " value="<?php echo $postinfo['name'] ?>" class="form-control">
                          </div>

                          <input type="hidden" name="id" id="id" placeholder=" " value="<?php echo $postinfo['id'] ?>" class="form-control">

                          <div class="form-group col-12">
                            <label for="image">new icon</label>
                            <input type="file" name="image"  class="form-control">

                          </div>

                          <div class="form-group col-12">
                            <p for="description" style="display:block;text-align:right">description</p>
                            <textarea name="description" id="content"  class="form-control ckeditor"style="text-align:right" ><?php echo $postinfo['description'] ?></textarea>

                          </div>



                        </div>

                      <input type="submit" class="btn btn-primary" id="ca-btn-option"  value="save">
                      <div class="err-msg">

                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php

      }
      else {
        header('location: competition.php');
      }
      ?>


      <?php

      include $tpl . 'footer.php';
    }

    elseif ($page == 'update') {


      $pageTitle = 'update content page';
      include 'init.php';
      $id=$_POST['id'];

                            $stmt = $conn->prepare("SELECT * FROM competition WHERE id = ? LIMIT 1");
                            $stmt->execute(array($id));
                            $checkpst = $stmt->rowCount();


                            if ($checkpst > 0 )
                            {


                                if($_SERVER['REQUEST_METHOD'] == 'POST')
                                {

                                  $name = $_POST['name'];
                                  $description = $_POST['description'];


                                $imageName = $_FILES['image']['name'];
                                $imageSize = $_FILES['image']['size'];
                                $imageTmp = $_FILES['image']['tmp_name'];
                                $imageType = $_FILES['image']['type'];

                                $imageAllowedExtension = array("jpeg", "jpg", "png");
                                $Infunc = explode('.', $imageName);
                                $imageExtension = strtolower(end($Infunc));
                                $formErrors = array();


                                if (empty($name))
                                {
                                  $formErrors[] = 'service name is required';
                                }

                                if (empty($description))
                                {
                                  $formErrors[] = 'service description is required';
                                }

                                if (empty($imageName))
                                {
                                  $formErrors[] = "service icon is required";
                                }
                                if (!empty($imageName) && ! in_array($imageExtension, $imageAllowedExtension))
                                {
                                  $formErrors[] = 'icon extension is not allowed';
                                }



                                                              foreach ($formErrors as $error ) {
                                                                ?>
                                                                <div class="container" style="margin-top:50px">
                                                                  <div class="row justify-content-center">
                                                                      <div class="col-md-4">
                                                                        <?php
                                                                          echo '<div class="alert alert-danger" style="width: 100%;text-align:center">' . $error . '</div>';
                                                                         ?>

                                                                      </div>
                                                                  </div>
                                                                </div>
                                                                <?php
                                                              }



                                ?>
                                  <div class="container">
                                    <a href="competition.php?page=edit&id=<?php echo $id ?>">click here to back to latest page</a>
                                  </div>
                                <?php

                                if (empty($formErrors))
                                {
                                  if (empty($imageName))
                                  {
                                    $stmt = $conn->prepare("SELECT * FROM competition WHERE id =? LIMIT 1");
                                    $stmt->execute(array($id));
                                    $images = $stmt->fetch();
                                    $image = $images['image'];
                                  }
                                  else {
                                    $image = rand(0,100000) . '_' . $imageName;
                                    move_uploaded_file($imageTmp, $images . '/' . $image);
                                  }
                                  $stmt = $conn->prepare("UPDATE competition SET name = ? ,image=?,description = ? WHERE id=? LIMIT 1  ");
                                  $stmt->execute(array($name,$image,$description,$id));
                                  header('location: ' . $_SERVER['HTTP_REFERER']);
                                }
                              }





                              else {
                                header('location: competition.php');
                              }
                            }
                            else {
                              header('location: competition.php');
                            }
      include $tpl . 'footer.php';


    }elseif ($page == 'delete') {
     include 'init.php';
      if ($_SESSION['type'] == 2)
      {
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: competition.php');;
        $stmt = $conn->prepare("SELECT * FROM competition WHERE id = ? LIMIT 1");
        $stmt->execute(array($id));
        $check = $stmt->rowCount();

        if ($check > 0 )
        {
          $stmt = $conn->prepare("DELETE FROM competition WHERE id = :zid");
          $stmt->bindParam(":zid", $id);
          $stmt->execute();
          header('location: competition.php');

        }
        else {
          header('location: competition.php');
        }
      }
    }
    elseif ($page == 'deletewin') {
     include 'init.php';
      if ($_SESSION['type'] == 2)
      {
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: competition.php');;
        $stmt = $conn->prepare("SELECT * FROM places WHERE id = ? LIMIT 1");
        $stmt->execute(array($id));
        $check = $stmt->rowCount();

        if ($check > 0 )
        {
          $stmt = $conn->prepare("DELETE FROM places WHERE id = :zid");
          $stmt->bindParam(":zid", $id);
          $stmt->execute();
          header('location: ' . $_SERVER['HTTP_REFERER']);

        }
        else {
          header('location: competition.php');
        }
      }
    }


    else {
      header('location: dashboard.php');
    }

    ?>


    <?php

}
  else {
    include 'init.php';
    ?>
    <div class="container" style="text-align:center; margin: 150px auto">
      <p class="alert alert-danger" >ليس لديك صﻻحية الوصول الى هدا المحتوى</p>
    </div>
    <?php
    include $tpl . 'footer.php';
  }
  }else {
    header('location: logout.php');
  }
  ob_end_flush();
 ?>
