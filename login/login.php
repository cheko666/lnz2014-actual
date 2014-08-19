<html>
  <head>
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<BASE HREF="/" />
<link href="../css/layout.css" rel="stylesheet" type="text/css">
<link href="../css/global.css" rel="stylesheet" type="text/css">
<link href="../css/general.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="../js/jquery.lightbox-0.5.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="../js/organictabs.jquery.js"></script>
<script type="text/javascript" src="../js/slides.min.jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones_validar.js"></script>
  </head>
  <body>
	  <div style="width:500px; margin:50px auto 20px; min-height:100px; background-color:#FFF; padding:40px;">
	  <h1 class="center">Ingreso para usuarios registrados.</strong></h1>
	  <div id="alertBoxes"></div>
    	<span class="loginBlock"><span class="inner">
        <form method="post" action="">
            <table cellpadding="0" cellspacing="5" border="0">
                <tr>
                    <td width="87">Usuario:</td>
                    <td width="410"><input type="text" name="username" id="username" /></td>
                </tr>
                <tr>
                    <td>Contrase&ntilde;a:</td>
                    <td><input type="password" name="password" id="password" /></td>
                </tr>
                <tr>
                    <input name="uri" id="uri" type="hidden" value="'.isset($_GET['uri']) ? $_GET['uri'] : ''/'" />
                </tr>
                <tr>
                    <td colspan="2" align="right"><span class="timer" id="timer"></span><button id="login_userbttn">Login</button></td>
                </tr>
            </table>
            
        </form>
		</div>
  
  </body>
</html>