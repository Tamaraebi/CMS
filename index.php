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

  <link href="style.css" type="text/css" rel="stylesheet">
  
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  
</head>
<body>

  <h1>Tamara Ebi-ukuli</h1>

  <?php
  echo '';
  echo '<nav>';
  echo '<h2 class="logo">Portfo<span>lio</span></h2>';
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
  echo '<button type="button">Contact Me</button>';
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
      <div class="expcontent">
        <h3><?php echo $record['Company'];
                  echo $record['Position'];   
              ?>
        </h3>
        </p>
            <div class="responsibilities"><strong>Responsibilities:</strong></div>
            <?php echo $record['Responsibilities'];?>
            <?php endwhile;?>    


    <!----Projects section---->
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

</body>
</html>
