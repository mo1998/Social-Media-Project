<?php  if (count($pageerrors) > 0) : ?>
  <div class="error">
  	<?php foreach ($pageerrors as $pageerror) : ?>
  	  <p><?php echo $pageerror ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>