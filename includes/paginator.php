				<?php if($totalPages_Productos > 0) { ?>
                    <div class="paginator" style="border-bottom:#CCCCCC thin dotted; margin-bottom:10px;">
						<div class="paginatorLeft">
							<?php if ($totalPages_Productos<19) {
								for ($i=0; $i<=$totalPages_Productos; $i++) { ?>
									<a href="<?php printf("%s%d", $currentPage, $i+1);?>" <?php if ($pageNum_Productos==$i){?> class="visitado"<?php  }?>><?php echo $i+1;}} else { for ($i=0; $i<=15; $i++) { ?><a href="<?php printf("%s%d", $currentPage, $i+1); ?>" <?php if ($pageNum_Productos==$i) {?>class="visitado"<?php }?>><?php echo $i+1;}}?></a></div>
						<div class="paginatorRight"></div>
					</div><!--Termina paginator-->
				<?php }?>