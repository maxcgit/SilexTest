<div class="row">
	<div class="col-md-2">
		<h3>Counts: <?= $count ?></h3>
	</div>
	<div class="col-md-4">
		<a href="<?=$link('blog_delete_all')?>" class = "btn btn-default">Delete All</a>
		<form method="POST" action="<?=$link('blog_add_post')?>">
			<input type="text" name='title' value="Post title">
			<input type="submit" value='Add' class	= "btn btn-default">
		</form>
		<table class="table">

		<?php foreach ($posts as $i): ?>
			<tr>
			<td><?= $i->id ?></td>
			<td><?= $i->title ?> <small>(<?= $i->author->name ?>)</small></td>
			<td><?= $i->rating ?></td>
			<td><a href="<?=$link('blog_delete', array('id'=>$i->id))?>" class = "btn btn-default">X</a></td>
			</tr>
		<?php endforeach ?>
		</table>
	</div>
</div>