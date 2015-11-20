<?php
namespace Hagane\Controller;

class User extends AbstractController{
	function _init() {
		echo $this->db->database_log['error'];
	}

	function index() {
	}

	function auth() {
		$destination = isset($_GET['dest']) ? $_GET['dest'] : $this->config['document_root'] . "index";

		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->auth->authenticate($_POST['user'], $_POST['password']);
			if ($this->auth->isAuth()) {
				$this->user = new \Hagane\Model\User($this->auth, $this->db);
				header("Location:" . $destination);
			}
		}
	}

	function logout() {
		$this->auth->logout();
	}

	function sign_up() {
	}
}

?>
