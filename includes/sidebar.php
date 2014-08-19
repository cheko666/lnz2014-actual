<div class="bloquecontenido">
<h3>Categor&iacute;as</h3>
    <ul>
        <?php do { ?>
        <li><a href="categorias/<?php echo $row_Categorias['URLSegment']; ?>"><?php echo $row_Categorias['Title']; ?></a></li>
        <?php } while ($row_Categorias = mysql_fetch_assoc($Categorias)); ?>
    </ul>
</div>