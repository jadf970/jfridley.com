<?php

	/**
	*Class to handle user creation, editing, and de-activating.
	*TO FIND OUT
	*Can I use the same property variable for a username being entered during creation, and for a username being pulled from the database for login?  The same question applies for password.
	*/

	/**
	* @var string The user ID
	*/
	private $username = null;

	/**
	* @var string The password
	*/
	private $password = null;
	
	/**
	* Reserved
	*/
	
	/**
	*Not really sure if this is necessary, or if I can combine it somewhere else.  
	*/

	public function __construct ( $data=array() ) {
		if ( isset( $data['username']) ) $this->username = (varchar) $data['username'];
		if ( isset( $data['password']) ) $this->password = (varchar) $data['password'];
	}

	/**
	*Creation of the user ID needs:
	*Requires userid and PW to be present
	*check to see if userid exists; if it does display an error message
	*if it doesnt, create a new row
	*Require that a password must be entered.  No complexity requirements for now.  
	*/
	public function () {
		$username = $_POST['username'];
		$password = $_POST['password'};
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		$sqlCheck = "SELECT username FROM users WHERE username = '" . $username . "' LIMIT 1";
		$st = $conn->prepare($sqlCheck);
		$st->execute();
		$
		

	}	





	
	/*Different take on the above bullshit.  This is sort of independent of the entire class I think, based on the way I wrote it.  This would technically just be the user creation function or METHOD I think.
*I'd have everything defined (is that the word?) in the construct potion, then this would be the user creation method
*/
	if (isset($_POST['username'], $_POST['password'])) {
		$u = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
		$p = $_POST['password'];
		if (!filter_input($u, FILTER_SANITIZE_STRING)) {
			//not a valid username
			$error_msg .= '<p class="error">Invalid username.</p>';
		}

		$prep_stmt = "SELECT username FROM members WHERE username = ? LIMIT 1";
		//different version of conn, sql, and st
		$stmt = mysqli->prepare($prep_stmt);

		//check existing username
		if ($stmt) {
			$stmt->bind_param('s', $u);
			//binds variables to the prepared statement as a parameter.  s indicates it is a string
			$stmt->execute();
			$stmt->store_result();
				
				if ($stmt->num_rows == 1) {
					//username already exists
					$error_msg .= '<p class="error">You will have to choose another user name.  This one has been taken.</p>';
					$stmt->close();
				}
		} else {
			$error_msg .= '<p class="error">Database error.</p>';
		}

		if (empty($error_msg)) {
			if ($insert_stmt = $mysqli->prepare("INSERT INTO members (username, password) VALUES (?, ?)") {
				$insert_stmt->bind_param('ss', $u, $p);
					if (! $insert_stmt->execute()) {
						header('Location: PATH FOR ERROR PAGE: INSERT');
					}
			}
		header('Location: /var/www/jfridley.com/whereeverIputtheerror failure: INSERT');
	}
