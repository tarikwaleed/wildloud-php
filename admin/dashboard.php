<?php
  session_start();

  if (isset($_SESSION['admin']))
  {
    $pageTitle = 'Wild & Loud - admin pnel';
    include 'init.php';
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? LIMIT 1 ");
    $stmt->execute(array($_SESSION['id']));
    $admin = $stmt->fetch();

    ?>

      <div class="dashboard lf-pd" id="dashboard">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="content-header">
                <span class="dashboard-overview">dashboard - overview</span>
              </div>
            </div>
            <div class="col-md-6">
                    <div class="dashboard-profile">
                      <div class="d-profile-cover">
                        <?php
                        if (empty($admin['image']))
                        {
                          ?>
                          <img src="<?php echo $avatar  ?>default.png" alt="avart" >

                          <?php
                        }
                        if (!empty($admin['image']))
                        {
                          ?>
                          <img src="<?php echo $avatar . $admin['image']  ?>" alt="avart" >

                          <?php
                        }
                         ?>
                        <p>welcome back, <?php echo $admin['username'] ?></p>
                      </div>
                      <div class="d-profile-info">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="avatar">
                              <?php
                              if (empty($admin['image']))
                              {
                                ?>
                                <img src="<?php echo $avatar  ?>default.png" alt="avart" >

                                <?php
                              }
                              if (!empty($admin['image']))
                              {
                                ?>
                                <img src="<?php echo $avatar . $admin['image']  ?>" alt="avart" >

                                <?php
                              }
                               ?>

                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="name-spc">
                              <p class="name"><?php echo $admin['fname'] ?> </p>
                              <span class="spec"><?php
                                  if ($_SESSION['type'] == 2)
                                  {
                                    echo 'admin';
                                  }else {
                                    echo 'Editor';
                                  }
                               ?></span>
                            </div>
                          </div>
                          <div class="col-md-3">

                          </div>
                          <div class="col-md-3">
                            <div class="projects">
                              <!-- <p class="nbr-rev">$654</p>
                              <span class="tp">revenue</span> -->
                            </div>
                          </div>
                          <div class="col-md-12 p-down-content">
                                <div class="profile-btn">
                                  <a href="users.php?page=edit&id=<?php echo $admin['id'] ?>">settings</a>
                                </div>
                          </div>
                        </div>
                      </div>
                    </div>

            </div>

            <div class="col-md-6">
              <div class="row">

                <div class="col-md-4">
                  <div class="box">
                    <div class="icon money-icon">
                      <svg width="30" height="auto" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M7.28396 9.90375C7.98108 9.50966 8.52809 8.89583 8.83958 8.15808C9.15107 7.42034 9.2095 6.60022 9.00576 5.82576C8.80201 5.05131 8.34755 4.36612 7.71334 3.87718C7.07912 3.38824 6.30086 3.12307 5.50005 3.12307C4.69924 3.12307 3.92098 3.38824 3.28676 3.87718C2.65255 4.36612 2.19809 5.05131 1.99434 5.82576C1.79059 6.60022 1.84903 7.42034 2.16052 8.15808C2.472 8.89583 3.01902 9.50966 3.71614 9.90375C2.4938 10.2939 1.43232 11.0726 0.693143 12.1214C0.66479 12.1616 0.644646 12.2071 0.63386 12.2551C0.623074 12.3032 0.621859 12.3529 0.630283 12.4014C0.638707 12.4499 0.656606 12.4963 0.682957 12.5379C0.709308 12.5795 0.743596 12.6156 0.783862 12.6439C0.824129 12.6723 0.869586 12.6924 0.917637 12.7032C0.965689 12.714 1.01539 12.7152 1.06392 12.7068C1.11244 12.6983 1.15882 12.6804 1.20043 12.6541C1.24203 12.6277 1.27804 12.5935 1.30639 12.5532C1.77937 11.8803 2.4073 11.3312 3.13717 10.9521C3.86703 10.573 4.6774 10.3751 5.49984 10.375C6.32229 10.375 7.13267 10.5729 7.86256 10.9519C8.59245 11.331 9.22043 11.8801 9.69346 12.5529C9.72181 12.5931 9.75782 12.6274 9.79943 12.6538C9.84104 12.6801 9.88742 12.698 9.93595 12.7064C9.98447 12.7148 10.0342 12.7136 10.0822 12.7028C10.1303 12.692 10.1757 12.6719 10.216 12.6435C10.2562 12.6152 10.2905 12.5792 10.3169 12.5376C10.3432 12.4959 10.3611 12.4496 10.3695 12.401C10.378 12.3525 10.3767 12.3028 10.3659 12.2548C10.3552 12.2067 10.335 12.1613 10.3066 12.121C9.56748 11.0724 8.50613 10.2939 7.28396 9.90375V9.90375ZM2.62502 6.75C2.62502 6.18138 2.79363 5.62552 3.10954 5.15273C3.42545 4.67994 3.87447 4.31145 4.3998 4.09384C4.92514 3.87624 5.50321 3.81931 6.0609 3.93024C6.6186 4.04117 7.13087 4.31499 7.53295 4.71707C7.93503 5.11914 8.20884 5.63142 8.31978 6.18911C8.43071 6.74681 8.37377 7.32488 8.15617 7.85021C7.93857 8.37555 7.57007 8.82456 7.09728 9.14047C6.62449 9.45638 6.06864 9.625 5.50002 9.625C4.73779 9.62414 4.00702 9.32096 3.46804 8.78198C2.92906 8.243 2.62588 7.51223 2.62502 6.75V6.75ZM15.3111 12.6436C15.2708 12.6719 15.2254 12.6921 15.1773 12.7029C15.1293 12.7137 15.0796 12.7149 15.031 12.7065C14.9825 12.698 14.9361 12.6801 14.8945 12.6538C14.8529 12.6274 14.8169 12.5931 14.7886 12.5529C14.315 11.8807 13.6869 11.332 12.9572 10.953C12.2275 10.574 11.4174 10.3758 10.5951 10.375C10.4957 10.375 10.4003 10.3355 10.33 10.2652C10.2597 10.1948 10.2201 10.0995 10.2201 10C10.2201 9.90054 10.2597 9.80516 10.33 9.73483C10.4003 9.66451 10.4957 9.625 10.5951 9.625C11.0057 9.62457 11.4114 9.53622 11.785 9.36587C12.1585 9.19553 12.4913 8.94716 12.7608 8.63746C13.0304 8.32776 13.2304 7.96393 13.3476 7.57043C13.4648 7.17694 13.4963 6.76292 13.4401 6.35622C13.3838 5.94952 13.2411 5.55959 13.0216 5.21265C12.8021 4.86571 12.5108 4.56982 12.1673 4.34488C11.8238 4.11995 11.4362 3.97118 11.0304 3.9086C10.6246 3.84601 10.2102 3.87106 9.81489 3.98206C9.71915 4.009 9.61663 3.9968 9.52988 3.94814C9.44313 3.89949 9.37927 3.81837 9.35233 3.72262C9.32539 3.62688 9.3376 3.52436 9.38625 3.43761C9.4349 3.35086 9.51602 3.287 9.61177 3.26006C10.4648 3.01936 11.3765 3.09958 12.1743 3.48555C12.9722 3.87152 13.601 4.53648 13.9418 5.35467C14.2826 6.17287 14.3118 7.08759 14.0238 7.92584C13.7359 8.76409 13.1507 9.46778 12.3791 9.90381C13.6012 10.2939 14.6626 11.0725 15.4018 12.1211C15.459 12.2024 15.4816 12.3031 15.4646 12.4011C15.4476 12.4991 15.3924 12.5863 15.3111 12.6436V12.6436Z" fill="#8094ae"/>
                      </svg>
                    </div>
                    <p> users</p>
                    <?php
                      $stmt = $conn->prepare("SELECT * FROM users");
                      $stmt ->execute();
                      $tt = $stmt->rowCount();
                     ?>
                    <span class="nbr"><?php echo $tt ?></span>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="box">
                    <div class="icon users-icon">
                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M14 4.5V14C14 14.5304 13.7893 15.0391 13.4142 15.4142C13.0391 15.7893 12.5304 16 12 16H4C3.46957 16 2.96086 15.7893 2.58579 15.4142C2.21071 15.0391 2 14.5304 2 14V2C2 1.46957 2.21071 0.960859 2.58579 0.585786C2.96086 0.210714 3.46957 0 4 0L9.5 0L14 4.5ZM11 4.5C10.6022 4.5 10.2206 4.34196 9.93934 4.06066C9.65804 3.77936 9.5 3.39782 9.5 3V1H4C3.73478 1 3.48043 1.10536 3.29289 1.29289C3.10536 1.48043 3 1.73478 3 2V14C3 14.2652 3.10536 14.5196 3.29289 14.7071C3.48043 14.8946 3.73478 15 4 15H12C12.2652 15 12.5196 14.8946 12.7071 14.7071C12.8946 14.5196 13 14.2652 13 14V4.5H11Z" fill="black"/>
                      <path d="M4 6.5C4 6.36739 4.05268 6.24021 4.14645 6.14645C4.24021 6.05268 4.36739 6 4.5 6H11.5C11.6326 6 11.7598 6.05268 11.8536 6.14645C11.9473 6.24021 12 6.36739 12 6.5V13.5C12 13.6326 11.9473 13.7598 11.8536 13.8536C11.7598 13.9473 11.6326 14 11.5 14H4.5C4.36739 14 4.24021 13.9473 4.14645 13.8536C4.05268 13.7598 4 13.6326 4 13.5V6.5ZM4 3.5C4 3.36739 4.05268 3.24021 4.14645 3.14645C4.24021 3.05268 4.36739 3 4.5 3H7C7.13261 3 7.25979 3.05268 7.35355 3.14645C7.44732 3.24021 7.5 3.36739 7.5 3.5C7.5 3.63261 7.44732 3.75979 7.35355 3.85355C7.25979 3.94732 7.13261 4 7 4H4.5C4.36739 4 4.24021 3.94732 4.14645 3.85355C4.05268 3.75979 4 3.63261 4 3.5Z" fill="black"/>
                      </svg>

                    </div>
                    <p> clients</p>
                    <?php
                      $stmt = $conn->prepare("SELECT * FROM users WHERE type = 0");
                      $stmt ->execute();
                      $tt = $stmt->rowCount();
                     ?>
                    <span class="nbr"><?php echo $tt ?></span>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="box">
                    <div class="icon users-icon">
                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M14 4.5V14C14 14.5304 13.7893 15.0391 13.4142 15.4142C13.0391 15.7893 12.5304 16 12 16H4C3.46957 16 2.96086 15.7893 2.58579 15.4142C2.21071 15.0391 2 14.5304 2 14V2C2 1.46957 2.21071 0.960859 2.58579 0.585786C2.96086 0.210714 3.46957 0 4 0L9.5 0L14 4.5ZM11 4.5C10.6022 4.5 10.2206 4.34196 9.93934 4.06066C9.65804 3.77936 9.5 3.39782 9.5 3V1H4C3.73478 1 3.48043 1.10536 3.29289 1.29289C3.10536 1.48043 3 1.73478 3 2V14C3 14.2652 3.10536 14.5196 3.29289 14.7071C3.48043 14.8946 3.73478 15 4 15H12C12.2652 15 12.5196 14.8946 12.7071 14.7071C12.8946 14.5196 13 14.2652 13 14V4.5H11Z" fill="black"/>
                      <path d="M4 6.5C4 6.36739 4.05268 6.24021 4.14645 6.14645C4.24021 6.05268 4.36739 6 4.5 6H11.5C11.6326 6 11.7598 6.05268 11.8536 6.14645C11.9473 6.24021 12 6.36739 12 6.5V13.5C12 13.6326 11.9473 13.7598 11.8536 13.8536C11.7598 13.9473 11.6326 14 11.5 14H4.5C4.36739 14 4.24021 13.9473 4.14645 13.8536C4.05268 13.7598 4 13.6326 4 13.5V6.5ZM4 3.5C4 3.36739 4.05268 3.24021 4.14645 3.14645C4.24021 3.05268 4.36739 3 4.5 3H7C7.13261 3 7.25979 3.05268 7.35355 3.14645C7.44732 3.24021 7.5 3.36739 7.5 3.5C7.5 3.63261 7.44732 3.75979 7.35355 3.85355C7.25979 3.94732 7.13261 4 7 4H4.5C4.36739 4 4.24021 3.94732 4.14645 3.85355C4.05268 3.75979 4 3.63261 4 3.5Z" fill="black"/>
                      </svg>

                    </div>
                    <p> visitors</p>
                    <?php
                      $stmt = $conn->prepare("SELECT * FROM users WHERE type = 0");
                      $stmt ->execute();
                      $tt = $stmt->rowCount();
                     ?>
                    <span class="nbr">0</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="box">
                    <div class="icon users-icon">
                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M14 4.5V14C14 14.5304 13.7893 15.0391 13.4142 15.4142C13.0391 15.7893 12.5304 16 12 16H4C3.46957 16 2.96086 15.7893 2.58579 15.4142C2.21071 15.0391 2 14.5304 2 14V2C2 1.46957 2.21071 0.960859 2.58579 0.585786C2.96086 0.210714 3.46957 0 4 0L9.5 0L14 4.5ZM11 4.5C10.6022 4.5 10.2206 4.34196 9.93934 4.06066C9.65804 3.77936 9.5 3.39782 9.5 3V1H4C3.73478 1 3.48043 1.10536 3.29289 1.29289C3.10536 1.48043 3 1.73478 3 2V14C3 14.2652 3.10536 14.5196 3.29289 14.7071C3.48043 14.8946 3.73478 15 4 15H12C12.2652 15 12.5196 14.8946 12.7071 14.7071C12.8946 14.5196 13 14.2652 13 14V4.5H11Z" fill="black"/>
                      <path d="M4 6.5C4 6.36739 4.05268 6.24021 4.14645 6.14645C4.24021 6.05268 4.36739 6 4.5 6H11.5C11.6326 6 11.7598 6.05268 11.8536 6.14645C11.9473 6.24021 12 6.36739 12 6.5V13.5C12 13.6326 11.9473 13.7598 11.8536 13.8536C11.7598 13.9473 11.6326 14 11.5 14H4.5C4.36739 14 4.24021 13.9473 4.14645 13.8536C4.05268 13.7598 4 13.6326 4 13.5V6.5ZM4 3.5C4 3.36739 4.05268 3.24021 4.14645 3.14645C4.24021 3.05268 4.36739 3 4.5 3H7C7.13261 3 7.25979 3.05268 7.35355 3.14645C7.44732 3.24021 7.5 3.36739 7.5 3.5C7.5 3.63261 7.44732 3.75979 7.35355 3.85355C7.25979 3.94732 7.13261 4 7 4H4.5C4.36739 4 4.24021 3.94732 4.14645 3.85355C4.05268 3.75979 4 3.63261 4 3.5Z" fill="black"/>
                      </svg>

                    </div>
                    <p> online</p>
                    <?php
                      $stmt = $conn->prepare("SELECT * FROM users WHERE type = 0");
                      $stmt ->execute();
                      $tt = $stmt->rowCount();
                     ?>
                    <span class="nbr">0</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="box">
                    <div class="icon users-icon">
                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M14 4.5V14C14 14.5304 13.7893 15.0391 13.4142 15.4142C13.0391 15.7893 12.5304 16 12 16H4C3.46957 16 2.96086 15.7893 2.58579 15.4142C2.21071 15.0391 2 14.5304 2 14V2C2 1.46957 2.21071 0.960859 2.58579 0.585786C2.96086 0.210714 3.46957 0 4 0L9.5 0L14 4.5ZM11 4.5C10.6022 4.5 10.2206 4.34196 9.93934 4.06066C9.65804 3.77936 9.5 3.39782 9.5 3V1H4C3.73478 1 3.48043 1.10536 3.29289 1.29289C3.10536 1.48043 3 1.73478 3 2V14C3 14.2652 3.10536 14.5196 3.29289 14.7071C3.48043 14.8946 3.73478 15 4 15H12C12.2652 15 12.5196 14.8946 12.7071 14.7071C12.8946 14.5196 13 14.2652 13 14V4.5H11Z" fill="black"/>
                      <path d="M4 6.5C4 6.36739 4.05268 6.24021 4.14645 6.14645C4.24021 6.05268 4.36739 6 4.5 6H11.5C11.6326 6 11.7598 6.05268 11.8536 6.14645C11.9473 6.24021 12 6.36739 12 6.5V13.5C12 13.6326 11.9473 13.7598 11.8536 13.8536C11.7598 13.9473 11.6326 14 11.5 14H4.5C4.36739 14 4.24021 13.9473 4.14645 13.8536C4.05268 13.7598 4 13.6326 4 13.5V6.5ZM4 3.5C4 3.36739 4.05268 3.24021 4.14645 3.14645C4.24021 3.05268 4.36739 3 4.5 3H7C7.13261 3 7.25979 3.05268 7.35355 3.14645C7.44732 3.24021 7.5 3.36739 7.5 3.5C7.5 3.63261 7.44732 3.75979 7.35355 3.85355C7.25979 3.94732 7.13261 4 7 4H4.5C4.36739 4 4.24021 3.94732 4.14645 3.85355C4.05268 3.75979 4 3.63261 4 3.5Z" fill="black"/>
                      </svg>

                    </div>
                    <p> subscribers</p>
                    <?php
                      $stmt = $conn->prepare("SELECT * FROM users WHERE type = 0");
                      $stmt ->execute();
                      $tt = $stmt->rowCount();
                     ?>
                    <span class="nbr">0</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="box">
                    <div class="icon users-icon">
                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M14 4.5V14C14 14.5304 13.7893 15.0391 13.4142 15.4142C13.0391 15.7893 12.5304 16 12 16H4C3.46957 16 2.96086 15.7893 2.58579 15.4142C2.21071 15.0391 2 14.5304 2 14V2C2 1.46957 2.21071 0.960859 2.58579 0.585786C2.96086 0.210714 3.46957 0 4 0L9.5 0L14 4.5ZM11 4.5C10.6022 4.5 10.2206 4.34196 9.93934 4.06066C9.65804 3.77936 9.5 3.39782 9.5 3V1H4C3.73478 1 3.48043 1.10536 3.29289 1.29289C3.10536 1.48043 3 1.73478 3 2V14C3 14.2652 3.10536 14.5196 3.29289 14.7071C3.48043 14.8946 3.73478 15 4 15H12C12.2652 15 12.5196 14.8946 12.7071 14.7071C12.8946 14.5196 13 14.2652 13 14V4.5H11Z" fill="black"/>
                      <path d="M4 6.5C4 6.36739 4.05268 6.24021 4.14645 6.14645C4.24021 6.05268 4.36739 6 4.5 6H11.5C11.6326 6 11.7598 6.05268 11.8536 6.14645C11.9473 6.24021 12 6.36739 12 6.5V13.5C12 13.6326 11.9473 13.7598 11.8536 13.8536C11.7598 13.9473 11.6326 14 11.5 14H4.5C4.36739 14 4.24021 13.9473 4.14645 13.8536C4.05268 13.7598 4 13.6326 4 13.5V6.5ZM4 3.5C4 3.36739 4.05268 3.24021 4.14645 3.14645C4.24021 3.05268 4.36739 3 4.5 3H7C7.13261 3 7.25979 3.05268 7.35355 3.14645C7.44732 3.24021 7.5 3.36739 7.5 3.5C7.5 3.63261 7.44732 3.75979 7.35355 3.85355C7.25979 3.94732 7.13261 4 7 4H4.5C4.36739 4 4.24021 3.94732 4.14645 3.85355C4.05268 3.75979 4 3.63261 4 3.5Z" fill="black"/>
                      </svg>

                    </div>
                    <p> messages</p>
                    <?php
                      $stmt = $conn->prepare("SELECT * FROM contact ");
                      $stmt ->execute();
                      $tt = $stmt->rowCount();
                     ?>
                    <span class="nbr"><?php echo $tt ?></span>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-md-12">
              <div class="content-header">
                <span class="dashboard-overview">Dashboard - latest stats</span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                last 5 users <i class="fas fa-users"></i>
                </div>
                <div class="card-body">
                  <ul>
                        <?php
                          $users = latest($conn, 'users');
                          foreach ($users as $user)
                          {
                            ?>
                            <li>
                            <span class="name"> <?php echo $user['fname'] ?></span><br>
                            <span class="email"><?php echo $user['email'] ?></span>
                            <?php
                              if($_SESSION['type'] == 2)
                              {
                                ?>
                                <a href="users.php?page=edit&id=<?php echo $user['id'] ?>">profile</a>

                                <?php
                              }
                             ?>
                            </li>
                            <?php
                          }
                         ?>
                  </ul>
                </div>
              </div>
            </div>

                        <div class="col-md-4">
                          <div class="card">
                            <div class="card-header">
                    lastes 5 messages
                            </div>
                            <div class="card-body">
                              <ul>
                                    <?php
                                      $posts = latest($conn, 'contact');
                                      foreach ($posts as $post)
                                      {
                                        ?>
                                        <li>
                                          <span><?php echo $post['title'] ?></span>
                                        <a href="messages.php?page=manage">details</a>

                                        <?php


                                         ?>
                                        </li>
                                        <?php
                                      }
                                     ?>
                              </ul>
                            </div>
                          </div>
                        </div>

                                    <div class="col-md-4">
                                      <div class="card">
                                        <div class="card-header">
                                        latest 5 transactions<i class="fas fa-box-open"></i>
                                        </div>
                                        <div class="card-body">
                                          <ul>
                                            
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
          </div>
        </div>
      </div>
    <?php
    include $tpl . 'footer.php';
  }else {
    header('location: index.php');

  }

 ?>
