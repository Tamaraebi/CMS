<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: work.php' );
  die();
  
}

if( isset( $_POST['Company'] ) )
{
  
  if( $_POST['position'] and $_POST['responsibilities'])
  {
    
    $query = 'UPDATE work SET
      Company = "'.mysqli_real_escape_string( $connect, $_POST['Company'] ).'",
      Position = "'.mysqli_real_escape_string( $connect, $_POST['Position'] ).'",
      Responsibilities = "'.mysqli_real_escape_string( $connect, $_POST['Responsibilities'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Work has been updated' );
    
  }

  header( 'Location: work.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM work
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: work.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Work</h2>

<form method="post">
  
  <label for="companyName">Company:</label>
  <input type="text" name="company" id="company" value="<?php echo htmlentities( $record['company'] ); ?>">
    
  <br>

  <label for="position">Position:</label>
  <input type="text" name="position" id="position" value="<?php echo htmlentities( $record['position'] ); ?>">
    
  <br>
  
  <label for="responsibilities">Responsibilities:</label>
  <textarea type="text" name="responsibilities" id="responsibilities" rows="5"><?php echo htmlentities( $record['responsibilities'] ); ?></textarea>
  
  <script>

  ClassicEditor
    .create( document.querySelector( '#Responsibilities' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script>
  
  <input type="submit" value="Edit Work">
  
</form>

<p><a href="work.php"><i class="fas fa-arrow-circle-left"></i> Return to Work List</a></p>


<?php

include( 'includes/footer.php' );

?>