					<ul class="pagination">
						<li <?php if ($pageNum == 0) { ?> class="disabled"<?php } ?>><a href="<?php printf("%s?pageNum=%d%s", $currentPage, max(0, $pageNum - 1), $queryString); ?>">&laquo;</a></li>
						<?php for ($i=0; $i<=$totalPages; $i++) { ?>
						<li <?php if ($pageNum==$i) { ?> class="active" <?php } ?>><a href="<?php printf("%s?pageNum=%d%s", $currentPage, $i, $queryString);?>"><?php echo $i+1; ?><?php if ($pageNum==$i){?><span class="sr-only">(current)</span><?php  }?></a></li>
						<?php } ?>
						<li <?php if ($pageNum > $totalPages-1) { ?> class="disabled"<?php } ?>><a href="<?php printf("%s?pageNum=%d%s", $currentPage, max(0, $pageNum + 1), $queryString); ?>">&raquo;</a></li>
					</ul>
					<div style="clear:both"></div>
					
