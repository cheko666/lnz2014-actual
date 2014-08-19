<?php 
if ($es_principal!=true) {
?>	
<div class="banner_container">
	<table width="165" border="0" cellpadding="0" cellspacing="1">
         <?php if($hay_promos=='true') {?> 
		<tr>
			<td><a href="<?php echo $row_Promociones['url_completa'];?>" target="_self" title="<?php echo $row_Promociones['titulo'];?>"><img src="<?php echo $row_Promociones['url_img_banner_ch'];?>" width="170" height="190" border="0"></a></td>
		</tr>
		<?php } ?>
		<tr>
			<td>
				<a href="newsletter/registro" target="_self" title="Suscribirse para promociones y avisos"><img src="../images/btn-banner-newsletter.jpg" width="170" height="160" border="0"></a>
			</td>
		</tr>
		<tr>
			<td><img src="images/banner-web-linea-productos-ch.jpg" width="170" height="120" border="0" usemap="#MapFolleto">
				<map name="MapFolleto">
					<area shape="rect" coords="1,1,170,120" href="Pdfs/Lanceta-folleto-lineaProductos-2013.pdf" target="_blank">
		  </map></td>
		</tr>
		<tr>
			<td>
				<a href="tarjeta-cliente-distinguido" target="_self" title="Tarjeta de cliente distinguido"><img src="../images/banner-tarjeta-cliente-distinguido.jpg" width="170" height="150" border="0"></a>
			</td>
		</tr>
		<tr>
			<td><img src="images/banner_01800.gif" width="170" height="120"></td>
		</tr>
		<tr>
			<td style="padding-top:5"><a href="sugerencias"><img src="../images/buzon_sugerencias.jpg" width="170" height="145"></a></td>
		</tr>
	</table>
</div>
<?php }?>
