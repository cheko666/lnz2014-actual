<?php
/*
 * UserAuthentication:
 *
 */

class UserAuthentication
{

  private $_session_namespace = "sistema_usuario"; /* Nombre de espacio para no ensuciar en
                                                      cualquier lugar el super arreglo de $_SESSION */

  private $_user_table = "Usuarios"; /* Nombre de la tabla de usuarios */

  private $_db;

  /* Constantes de clase para crear una conexión por defecto */
  const default_db_user = 'lanceta_superAdm';
  const default_db_pass = '070209S';
  const default_db_name = 'lanceta_bd_tw';
  const default_db_host = 'localhost';

  /*
   * Debe recibir una conexión PDO válida o intentará crear una.
   */
  public function __construct($pdoConnection = NULL)
  {
    if(!$pdoConnection)
      $pdoConnection = $this->getConnection();
    $this->_db = $pdoConnection;
	session_start();		
	
  }

  /*
   * Crea una conexión PDO con los datos por default definidos como
   * constantes de clase.
   */
  private function getConnection()
  {
    $dsn = 'mysql:dbname='.self::default_db_name.';host='.self::default_db_host;
    try {
      $dbh = new PDO($dsn, self::default_db_user, self::default_db_pass);
    } catch (PDOException $e) {
      die( 'Connection failed: ' . $e->getMessage() );
    }
    return $dbh;
  }
  
  /*
   * Responde si el usuario activo está autenticado en sesión.
   */
  public function isAuthenticated()
  {
	session_start();			  
    return $this->getSession('user_authenticated') === true;
  }
  /*
   * Realiza un Login y guarda los datos en sesión.
   */
  public function doLogin($username,$password)
  {
    $result = $this->checkLoginInDB($username,$password);
    if(!$result) {
      $this->doLogout();
      return false;
    }

    $this->setSession('user_authenticated',true);
    $this->setSession('username',$result['Username']);
    $this->setSession('id',$result['ID']);
	$this->setSession('nombre',$result['Nombre']);
	$this->setSession('tipo_role',$result['Rol_Tipo']);
	session_start();		

    return true;
  }

  /*
   * Quita al usuario de sesión.
   */
  public function doLogout()
  {
	session_start();		
    $this->destroySession();
  }

  /*
   * Verifica si el usuario está en la base de datos.
   */
  private function checkLoginInDB($username,$password)
  {
    try {
      $query = 'SELECT ID, Username, Nombre, Rol_Tipo FROM '. $this->_user_table . ' WHERE ';
      $query .= ' Username = ? AND Password = ? ';
      $sth = $this->_db->prepare($query);
      $sth->execute(array($username,$this->encryptPassword($password)));
      return $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      die( 'Query failed: ' . $e->getMessage() );
    }
  }

  /*
   * Encripta un password en texto plano.
   */
  private function encryptPassword($password)
  {
    return sha1($password);
  }
  
  private function getSession($key)
  {
    $session = $_SESSION[$this->_session_namespace];
    if(isset($session[$key]))
      return $session[$key];
    return null;
  }
  private function setSession($key,$val)
  {
    return $_SESSION[$this->_session_namespace][$key] = $val;
  }
  private function startSession ()
  {
	session_start();  
  }
  private function destroySession()
  {
    $_SESSION[$this->_session_namespace] = null;
    unset($_SESSION[$this->_session_namespace]);
  }
  public function getUsername()
  {
	return $this->getSession('nombre');
  }
  public function getUserId() {
	 return $this->getSession('id'); 
  }
}