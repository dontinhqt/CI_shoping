<?php 
	$menu = navigations();
	
?>
<ul>
<?php if(isset($menu) && is_array($menu) && count($menu) ){ ?>
<?php foreach($menu as $key => $val){ ?>
	<li><?php echo $val['cate_title']; ?>
		<?php if(isset($val['items']) && is_array($val['items']) && count($val['items'])){ ?>
		<ul>
		<?php foreach($val['items'] as $keyItems => $valItems) { ?>
			<li><?php echo $valItems['cate_title']; ?>
				<?php if(isset($valItems['subitems']) && is_array($valItems['subitems']) && count($valItems['subitems'])){ ?>
					<ul>
					<?php foreach($valItems['subitems'] as $keySubItems => $valSubItems) { ?>
						<li><?php echo $valSubItems['cate_title']; ?></li>
					<?php } ?>
					</ul>
					<?php } ?>
			</li>
		<?php } ?>
		</ul>
		<?php } ?>
	</li>
<?php } ?>
<?php } ?>
</ul>