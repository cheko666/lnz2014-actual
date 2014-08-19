					<div class="paginator">
						<div class="paginatorLeft">
							<?php if ($totalPages_Productos<20) { for ($i=0; $i<=$totalPages_Productos; $i++) { ?>
							<a href="<?php printf("%s?pageNum_Productos=%d%s", $currentPage, $i, $queryString_Productos);?>" <?php if ($pageNum_Productos==$i){?> class="visitado"<?php  }?>><?php echo $i+1;}} else { for ($i=0; $i<=27; $i++) { ?><a href="<?php printf("%s?pageNum_Productos=%d%s", $currentPage, $i, $queryString_Productos); ?>" <?php if ($pageNum_Productos==$i) {?>class="visitado"<?php }?>><?php echo $i+1;}}?></a></div>
						<div class="paginatorRight">
						</div>
					</div><!--Termina paginator-->	