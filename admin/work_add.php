<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['Company'] ) )
{
  
  if( $_POST['Position'] and $_POST['Responsibilities'] )
  {
    
    $query = 'INSERT INTO work (
        Company,
        Position,
        Responsibilities
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['Company'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['Position'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['Responsibilities'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Work has been added' );
    
  }
  
  header( 'Location: work.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Work</h2>

<form method="post">
  
  <label for="company">Company:</label>
  <input type="text" name="company" id="company">
    
  <br>

  <label for="position">Position:</label>
  <input type="text" name="position" id="position">
  
  <br>
  
  <label for="position">Responsibilities:</label>
  <textarea type="text" name="responsibilities" id="responsibilities" rows="10"></textarea>
      
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

  <input type="submit" value="Add Work">
  
</form>

<p><a href="work.php"><i class="fas fa-arrow-circle-left"></i> Return to Work List</a></p>


<?php

include( 'includes/footer.php' );

?>