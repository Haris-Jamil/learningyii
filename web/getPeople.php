<?php 

include "connection.php";

$keyword = $_GET['keyword'];
$curUser = $_GET['user'];
$result = mysqli_query($conn, "SELECT * FROM user WHERE (first_name LIKE '$keyword%' OR last_name LIKE '$keyword%') AND id != '$curUser' ");
?>

<?php if(mysqli_num_rows($result) > 0): ?>
	<?php while($row = mysqli_fetch_assoc($result)): ?>

		<?php $id = $row['id']; ?>

		<div class="row">
				
		<div style="margin-top: 10px;margin-bottom: 10px;padding: 10px;background-color:#ecf0f1" class="col-md-6">
			<img width="100" src="http://localhost/learningyii/web/assets/imgs/<?=$row['picture']?>" >

			<div class="row">
				<div class="col-md-6">
					<h3 style="color:#2c3e50"><?=$row['first_name'] . ' ' . $row['last_name'] ?></h3>
				</div>

				<div class="col-md-6">

					<?php $alreadyFollowing = mysqli_query($conn, "SELECT * FROM follow WHERE follower_id = '$curUser' AND following_id = '$id' "); ?>

					<?php if(mysqli_num_rows($alreadyFollowing) == 1): ?>

						<?php $row2 = mysqli_fetch_assoc($alreadyFollowing); ?>

						<a style="border-radius: 0px;" href="index.php?r=follow/discon&unfollow=<?=$row2['id']?>" class="btn btn-warning pull-right" >Unfollow <?= $row['first_name'] ?></a>						
					<?php else: ?>
						<a style="border-radius: 0px;" href="index.php?r=follow/connect&following=<?=$row['id']?>" class="btn btn-primary pull-right" >Follow <?= $row['first_name'] ?></a>	
					<?php endif; ?>
					
					<a style="border-radius: 0px;" href="index.php?r=site/otherprofile&id=<?=$row['id']?>" class="btn btn-info pull-right">View Profile</a>

				</div>	

			</div>
			
		</div>

		<div class="col-md-6">
			
		</div>

		</div>

	<?php endwhile; ?>
<?php else: ?>
	<h2>No result</h2>
<?php endif; ?>
