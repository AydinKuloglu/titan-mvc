<?php defined('DIRECT') OR exit('No direct script access allowed');
/**
 * Mail Plugin 
 *
 * Mail plugini, PHPMailer kütüphanesini kullanır.
 * Turan Karatuğ - <tkaratug@hotmail.comtr>
 */

// Including PHPMailer Class
require_once 'Phpmailer.php';
require_once 'Smtp.php';

class Mail extends PHPMailer
{
	// Titan Instance
	private $titan;

	// Mail Config
	private $config;

	function __construct()
	{
		parent::__construct();

		// Getting Loader Instance
		$this->titan 	= Loader::getInstance();

		// E-Mail Config
		$this->config 	= $this->titan->config('email');

		// Setting SMTP Protocol
		$this->isSMTP();

		// Default SMTP Auth
		$this->SMTPAuth	= true;

		// Default HTML Format
		$this->isHTML(true);

		// SMTP Server
		$this->Host 	= $this->config['server'];

		// Username
		$this->Username = $this->config['username'];

		// User Password
		$this->Password = $this->config['password'];

		// Default Port
		$this->Port 	= $this->config['port'];

		// Default Charset
		$this->CharSet 	= $this->config['charset'];
	}

	/**
	 * Mail Settings
	 * @param 	array 	$config
	 * @return 	void
	 */
	public function init($config)
	{
		if(array_key_exists('charset', $config))
			$this->CharSet 	= $config['charset'];

		if(array_key_exists('server', $config))
			$this->Host 	= $config['server'];

		if(array_key_exists('port', $config))
			$this->Port 	= $config['port'];
		
		if(array_key_exists('username', $config))
			$this->Username = $config['username'];

		if(array_key_exists('password', $config))
			$this->Password = $config['password'];

		if(array_key_exists('is_html', $config))
			$this->isHTML($config['is_html']);
	}

	/**
	 * Set sender mail address
	 * @param 	string 	$email
	 * @param 	string 	$name
	 * @return 	void
	 */
	public function from($email, $name = null)
	{
		$this->From = $email;
		$this->AddReplyTo($email, $name);

		if(!is_null($name))
			$this->FromName = $name;
	}

	/**
	 * Set receiver mail address
	 * @param 	string 	$email
	 * @param 	string 	$name
	 * @return 	void
	 */
	public function to($email, $name = null)
	{
		$this->AddAddress($email, $name);
	}

	/**
	 * Set mail subject
	 * @param 	string 	$subject
	 * @return 	void
	 */
	public function subject($subject)
	{
		$this->Subject = $subject;
	}

	/**
	 * Set mail content (message)
	 * @param 	string 	$message
	 * @return 	void
	 */
	public function message($message)
	{
		$this->Body = $message;
	}

	function __destruct()
	{
		parent::__destruct();
	}

}

?>
