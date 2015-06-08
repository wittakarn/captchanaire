<?php
require_once '../lib/rb.php';

class Register
{
	var $email;
	var $password;
	var $loginType;
	var $name;
	var $sname;

	public function  __construct() {
		R::setup( 'mysql:host=localhost;dbname=qs1', 'admin', 'admin' ); //for both mysql or mariaDB
	}

	function create() {
		R::begin();
		try{
			$regis = R::dispense('user');

			$regis->email = $this->email;
			$regis->password = $this->password;
			$regis->login_type = $this->loginType;
			$regis->name = $this->name;
			$regis->sname = $this->sname;

			echo $regis;

			R::store($regis);
			R::commit();
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			R::rollback();
		}
	}

	function createFacebookUser($email) {
		R::begin();
		try{
			$this->user = R::findOne( 'user', ' email = :email ', [':email' => $email] );
			if(is_null($this->user))
				$this->create();
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}

}

?>