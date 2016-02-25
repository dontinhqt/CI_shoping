<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?php echo base_url().'assets/'.$module.'/js/menu_right.js';?>" type="text/javascript"></script>
<link href="<?php echo base_url();?>assets/<?php echo $module; ?>/css/menu_right.css" rel="stylesheet" type="text/css">
<?php $menu = navigations(); ?>
<div id="menu" class="menu">
	<div class="menu-header"> Danh mục sản phẩm </div>
	<ul>
		<?php if(isset($menu) && is_array($menu) && count($menu) ){ ?>
		<?php foreach($menu as $key => $val){?>
		<li><a href="<?php echo base_url().'loai-san-pham/'.$val['cate_id'].'-'.unicode($val['cate_title']); ?>.html"><?php echo $val['cate_title']; ?></a>
			<?php if(isset($val['items']) && is_array($val['items']) && count($val['items'])){ ?>
			<ul class="submenu">
			<?php foreach($val['items'] as $keyItems => $valItems) { ?>
				<li><a href="<?php echo base_url().'loai-san-pham/'.$valItems['cate_id'].'-'.unicode($valItems['cate_title']); ?>.html"><?php echo $valItems['cate_title']; ?></a>
					<?php if(isset($valItems['subitems']) && is_array($valItems['subitems']) && count($valItems['subitems'])){ ?>
						<ul class="submenu">
						<?php foreach($valItems['subitems'] as $keySubItems => $valSubItems) { ?>
							<li><a href="<?php echo base_url().'loai-san-pham/'.$valSubItems['cate_id'].'-'.unicode($valSubItems['cate_title']); ?>.html"><?php echo $valSubItems['cate_title']; ?></a></li>
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

</div>




<!-- Code basic hiển thị menu -->
<!--
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
-->
<!-- End code basic -->