<?php

include( 'admin/includes/database.php' );
include( 'admin/includes/config.php' );
include( 'admin/includes/functions.php' );

?>
<!doctype html>
<html>
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  
  <title>Tamara Ebi-ukuli | Portfolio</title>
  
  <link href="styles.css" type="text/css" rel="stylesheet">

  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

  <link href="style.css" type="text/css" rel="stylesheet">
  
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  
</head>
<body>

  <h1>Tamara Ebi-ukuli | Portfolio</h1>

  <?php
  echo '';
  echo '<nav>';
  echo '<ul>';
  echo '<li><a href="#">Home</a></li>';
  echo '<li><a href="http://tamaraebi.infinityfreeapp.com/CMS/admin/projects.php">Projects</a></li>';
  echo '<li><a href="http://tamaraebi.infinityfreeapp.com/CMS/admin/skills.php">Skills</a></li>';
  echo '<li><a href="http://tamaraebi.infinityfreeapp.com/CMS/admin/education.php">Education</a></li>';
  echo '<li><a href="http://tamaraebi.infinityfreeapp.com/CMS/admin/work.php">Work</a></li>';
  echo '</ul>';
  echo '<a href="#" class="btn"></a>';
  echo '</nav>';
  ?>
    <!----About---->
  <?php
  echo '<section class="about">';
  echo '<div class="main">';
  echo '<div class="about-text">';
  echo '<h2>About Me</h2>';
  echo '<h5> Web Developer <span>& Web Designer</span></h5>';
  echo '<p>Hello! My name is Tamara and I am a front end developer and designer that is solution-driven, enthusiastic and posses the ability to adapt and collaborate in fast changing environments and concepts</p>';
  echo '<button type="button">Say Hello!</button>';
  echo '</div>';
  echo '</div>';
  echo '</section>';
  ?>
     <!----Skills section---->
  <h2>My Skills</h2>

  <?php

  $query = 'SELECT *
    FROM Skills
    ORDER BY percent DESC';
  $result = mysqli_query($connect, $query);

  ?>
  <?php while($record = mysqli_fetch_assoc($result)): ?>

    <h3><?php echo $record['name']; ?>Html, CSS, Javascript, PHP</h3>

    <p>Percent: <?php echo $record['percent']; ?> 95%</p>

    <div style="background-color: grey;">
      <div style="background-color: red; height: 20px; width:<?php echo $record['percent']; ?>%;"></div>
    </div>

  <?php endwhile; ?>
    <!----Education section---->
  <h2>Education </h2>
  <?php   
    $query = 'SELECT *
    FROM Education
    ORDER BY year DESC';
    $result = mysqli_query( $connect, $query );
  ?>

  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
   <div class="main">
       <div class="font">
          <h3><?php echo $record['Credential']; ?></h3>
       </div>
        <div class="font">
           <h4><?php echo $record['Institution']; ?></h4>
        </div>
        <div class="font">
           <h4><?php echo $record['Year']; ?></h4>
        </div>
   </div>
   <div class="right">
     <h3 class="fontright"><?php echo $record['Institution']; ?></h3>
   </div>
  <?php endwhile; ?>

    <!----Work section---->
    <h2>Work</h2>
    <?php
      $query = 'SELECT *
      FROM work';
      $result= mysqli_query($connect, $query);
    ?>
    <?php while ($record = mysqli_fetch_assoc($result)): ?>
      <div class="wcontent">
        <h3><?php echo $record['Company'];
                  echo $record['Position'];   
              ?>
        </h3>
        </p>
            <div class="responsibilities"><strong>Responsibilities:</strong></div>
            <?php echo $record['Responsibilities'];?>
    <?php endwhile;?>    


    <!----Projects section---->
  <h2>Projects</h2>
  <?php

  $query = 'SELECT *
    FROM projects
    ORDER BY date DESC';
  $result = mysqli_query( $connect, $query );

  ?>

  <p>There are <?php echo mysqli_num_rows($result); ?> projects in the database!</p>

  <hr>

  <?php while($record = mysqli_fetch_assoc($result)): ?>

    <div>

      <h2><?php echo $record['title']; ?></h2>
      <?php echo $record['content']; ?>

      <?php if($record['photo']): ?>

        <p>The image can be inserted using a base64 image:</p>

        <img src="<?php echo $record['photo']; ?>">

        <p>Or by streaming the image through the image.php file:</p>

        <img src="admin/image.php?type=project&id=<?php echo $record['id']; ?>&width=100&height=100">

      <?php else: ?>

        <p>This record does not have an image!</p>

      <?php endif; ?>

    </div>

    <hr>

  <?php endwhile; ?>
  
  <footer class="footer-section" id="contact">
    <div class="page-container">
    <div class="container-fluid px-5 my-5">
  <div class="row justify-content-center">
    <div class="col-xl-10">
      <div class="card border-0 rounded-3 shadow-lg overflow-hidden">
        <div class="card-body p-0">
          <div class="row g-0">
            <div class="col-sm-6 d-none d-sm-block bg-image"></div>
            <div class="col-sm-6 p-4">
              <div class="text-center">
                <div class="h3 fw-light">Contact Form</div>
                <p class="mb-4 text-muted">Contact me to get the job done!</p>
                <div class="information">
                    <h4>Location:</h4>
                    <p>Toronto, Canada</p>
                    </div>
                    <div class="email">
                    <h4>Email:</h4>
                    <p>tamaraebiukuli@gmail.com</p>
                    </div>
                    <div class="number">
                    <h4>Phone Number:</h4>
                    <p>613-501-7278</p>
                    </div>
              </div>
              <form id="contactForm">
                <div class="form-floating mb-3">
                  <input class="form-control" id="name" type="text" placeholder="Name" data-sb-validations="required" />
                  <label for="name">Name</label> 
                </div>
                <div class="form-floating mb-3">
                  <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required,email" />
                  <label for="emailAddress">Email Address</label>
                </div>
                <div class="form-floating mb-3">
                  <label for="message">Message:</label>
                  <div class="invalid-feedback" data-sb-feedback="message:required">Please type your message here</div>
                    <textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;" data-sb-validations="required"></textarea>
                </div>
                <div class="d-grid">
                  <button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
      <div class="footer">
        <h3>Get In Touch</h3>
        <p>I am a quick learner and I'm currently looking to join a dynamic professional environment where I can utilize my skills and I will get back to you as soon as possible
        </p>
        <a href="linkedin.com/in/tamara-u-565713170" >linkedin</a>
        <a href="https://www.instagram.com/eb_tara_/">Instagram</a>
        <a href="https://github.com/tamaraebi">Github</a>
        <h4 class="copyright">© 2023 Tamara Ebi</h4>
      </div>
    </div>
  </footer>

</body>
</html>
