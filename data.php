	<?php  if(count($users) >0) : ?>

	<div>
		<?php  foreach($users as $data) :  ?>

			<p><?php echo $data ?></p>
		<?php endforeach ?>
		</div>

		<?php endif ?>