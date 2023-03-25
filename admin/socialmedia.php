<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM socialmedia
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Social Media has been deleted' );
  
  header( 'Location: socialmedia.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT * FROM socialmedia';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Social Medias</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="left">Name</th>
    <th align="center">Url</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while($record = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['Name'] ); ?>
      </td>
      <<td align="left"><a href="<?php echo htmlentities( $record['url'] ); ?>"><?php echo htmlentities( $record['url'] ); ?></a></td>
      <td align="center"><a href="socialmedia_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="socialmedia.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this social media?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="socialmedia_add.php"><i class="fas fa-plus-square"></i> Add Social Media</a></p>


<?php

include( 'includes/footer.php' );

?>