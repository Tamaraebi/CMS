<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM work
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Work has been deleted' );
  
  header( 'Location: work.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM work';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Work</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="left">Company</th>
    <th align="center">Position</th>
    <th align="center">Responsibilities</th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities( $record['Company'] ); ?></td>
      <td align="left">
        <?php echo htmlentities( $record['Position'] ); ?>
      </td>
      <td align="center"><?php echo $record['Responsibilities']; ?></td>
      <td align="center"><a href="work_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="work.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this project?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="work_add.php"><i class="fas fa-plus-square"></i> Add Work</a></p>


<?php

include( 'includes/footer.php' );

?>