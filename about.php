<?php include("includes/header.php"); ?>
    <!--Page header & Title-->
    <?php
$get_about = "select * from about_us";

    
$run_about = mysqli_query($con,$get_about);
$row_about = mysqli_fetch_array($run_about);

$about_desc = $row_about['about_desc'];
                 
                 
    ?>
    <div id="page_header">
      <div class="page_title">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title">Recommended &nbsp Foods</h2>
              <p>
                Check out our menu and some of our special, featured recipies!
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- recommendations -->

    <section id="overview" class="padding-top" >
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h2 class="heading">Restaurant &nbsp; Overview</h2>
            <hr class="heading_space" />
            <p>
            <?php  echo $about_desc;?>
            </p>
          </div>
        </div>
      </div>
    </section>

    <?php
     $get_chef = "select * from chef where featured='yes'";

    
     $run_chef = mysqli_query($con,$get_chef);
     $countchef=mysqli_num_rows($run_chef);

   if($countchef>0){
   
  ?>
    <section id="cheffs" class="padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="heading">Our &nbsp; Kitchen &nbsp; Staff</h2>
            <hr class="heading_space" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="cheffs_wrap_slider">
              <div id="our-cheffs" class="owl-carousel">

              <?php 
               while($row_chef=mysqli_fetch_assoc($run_chef))
               {
                 $chef_id=$row_chef['chef_id'];
                 $chef_title = $row_chef['chef_title'];
                 
                 $chef_desc = $row_chef['chef_des'];
                 
                 
                 $chef_image = $row_chef['chef_image'];
            
                ?>
                <div class="item">
                  <div class="cheffs_wrap">
                    <img src="admin/other_images/<?php echo $chef_image; ?>" height="315px" width="300px" alt="Kitchen Staff" />
                    <h3><?php echo $chef_title; ?></h3>
                    <small><?php  echo $chef_desc; ?></small>
                    
                  </div>
                </div>
                <?php }}?>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include 'includes/footer.php'; ?>