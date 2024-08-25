<?php
	function encrypt_pwd($string)
	{
		return sha1($string);
	}

	function action_form($query="")
	{
		$query = $query === "" ? $query : "?$query";
		return preg_replace("/index\.php|index|\.php$/", "", htmlspecialchars($_SERVER["PHP_SELF"])) . $query;
	}

	function current_page($query="")
	{
		echo "<script>window.location='".preg_replace("/index\.php|index|\.php$/", "", htmlspecialchars($_SERVER["PHP_SELF"]))."?$query';</script>";
		exit(0);
	}
	
    function error_message()
	{
		require_once($_SERVER["DOCUMENT_ROOT"]."/includes/error_message.php");
	}

	function signin($data)
	{
		global $db;
		extract($data);
		$email_address = htmlspecialchars(trim($email_address));
		$password = encrypt_pwd($password);

		$sql = "SELECT user_id, role FROM user WHERE email_address = :email_address AND password = :password";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':email_address', $email_address, PDO::PARAM_STR);
		$stmt->bindParam(':password',$password, PDO::PARAM_STR);

		if($stmt->execute())
		{
			if($stmt->rowCount() > 0)
			{
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				$_SESSION["user_id"] = $result["user_id"];
				$_SESSION["role"] = $result["role"];
				return true;
			}
		}
		$_SESSION["error_messages"][] = "Invalid Login";
		return false;
	}

	function registration($data)
	{
		global $db;
		extract($data);
		$email_address = htmlspecialchars(trim($email_address));
		$user_name = trim($user_name);

		if (filter_var($email_address, FILTER_VALIDATE_EMAIL) === false) {
			$_SESSION["error_messages"][] = "Invalid Email Address";
		}

		if (emailaddress_checking($email_address) === true) {
			$_SESSION["error_messages"][] = "This email address is already registered";
		}

		if (username_checking($user_name) === true) {
			$_SESSION["error_messages"][] = "User name already taken";
		}

		if ($password != $conf_pass) {
			$_SESSION["error_messages"][] = "Password and Confirm password are not matching";
		}

		if (!isset($_SESSION["error_messages"])) {
			$password = encrypt_pwd($password);
			$image = isset($_FILES['image']) ? upload_file($_FILES['image'], "D:/Ajay Programmers/Xampp/htdocs/News/img/profile_img/", ["jpg", "jpeg", "png"]) : "";
			$image = substr($image, 37);
			$sql = "INSERT INTO user(user_name, email_address, password, img) VALUES (:user_name, :email_address, :password, :image)";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
			$stmt->bindParam(':email_address', $email_address, PDO::PARAM_STR);
			$stmt->bindParam(':password', $password, PDO::PARAM_STR);
			$stmt->bindParam(':image', $image, PDO::PARAM_STR);

			if ($stmt->execute()) {
				$_SESSION["success_messages"][] = "Successfully Registered";
				return true;
			}

			return false;
		}

		return false;
	}

	function emailaddress_checking($email_address)
	{
		global $db;
		$sql="SELECT COUNT(1) as 'count' FROM user WHERE email_address = :email_address" ;
		$stmt=$db->prepare($sql);
		$stmt->bindParam(':email_address',$email_address,PDO::PARAM_STR);
		if($stmt->execute())
		{
			return $stmt->fetch(PDO::FETCH_ASSOC)["count"] > 0? true : false ;
		}
		return false;
	}
	
	function username_checking($user_name)
	{
		global $db;
		$sql="SELECT COUNT(1) as 'count' FROM user WHERE user_name = :user_name" ;
		$stmt=$db->prepare($sql);
		$stmt->bindParam(':user_name',$user_name,PDO::PARAM_STR);
		if($stmt->execute())
		{
			return $stmt->fetch(PDO::FETCH_ASSOC)["count"] > 0? true : false ;
		}
		return false;
	}

	function upload_file($file, $targetDirectory, $allowedExtensions) {
		$fileName = basename($file["name"]);
		$targetFile = $targetDirectory . $fileName;
		$fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
	  
		if (!in_array($fileExtension, $allowedExtensions)) {
		  return ""; 
		}

		if (move_uploaded_file($file["tmp_name"], $targetFile)) {
		  return $targetFile;
		}
	  
		return "";
	}

	function insert_content($data)
	{
		global $db;
		extract($data);
		
		$title = trim($title);
		$content = trim($content);
		
		// Fetch user_id from session
		if (!isset($_SESSION["user_id"]) || !is_numeric($_SESSION["user_id"])) {
			$_SESSION["error_messages"][] = "User not logged in";
			return false;
		}
		
		$user_id = $_SESSION["user_id"];
		
		// Validate and handle image upload
		$image = isset($_FILES['image']) ? upload_file($_FILES['image'], "D:/Ajay Programmers/Xampp/htdocs/News/img/content_img/", ["jpg", "jpeg", "png"]) : "";
		$image = substr($image, 37); // Adjust path according to your needs
		
		// Prepare SQL statement
		$sql = "INSERT INTO content (user_id, title, content, img) VALUES (:user_id, :title, :content, :img)";
		$stmt = $db->prepare($sql);
		
		// Bind parameters
		$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$stmt->bindParam(':title', $title, PDO::PARAM_STR);
		$stmt->bindParam(':content', $content, PDO::PARAM_STR);
		$stmt->bindParam(':img', $image, PDO::PARAM_STR);

		// Execute and return result
		if ($stmt->execute()) {
			$_SESSION["success_messages"][] = "Content successfully added";
			return true;
		} else {
			$_SESSION["error_messages"][] = "Failed to add content";
			return false;
		}
	}

	function get_user_details_by_id()
	{
		global $db;
		$user_id = $_SESSION["user_id"];
		$sql = "SELECT * FROM user WHERE user_id = :user_id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

		if ($stmt->execute())
		{
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		return false;
	}

	function get_user_content($id)
	{
		global $db;
		$sql = "SELECT * FROM content WHERE user_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		if ($stmt->execute())
		{
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return false;		
	}

	function get_content_by_passing_id($id)
	{
		global $db;
		$sql = "SELECT * FROM content WHERE content_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		if ($stmt->execute())
		{
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		return false;
	}

	function insert_comment($data)
	{
		global $db;
		extract($data);

		// Check if user is logged in
		if (!isset($_SESSION["user_id"]) || empty($_SESSION["user_id"]) || !is_numeric($_SESSION["user_id"])) {
			// Redirect to login page
			header("Location: /login");
			exit();
		}

		// Proceed with comment insertion
		$user_id = $_SESSION["user_id"];
		$sql = "INSERT INTO comments(comment, user_id, content_id) VALUES (:comment, :user_id, :content_id)";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
		$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$stmt->bindParam(':content_id', $content_id, PDO::PARAM_INT);

		if ($stmt->execute()) {
			return true;
		}

		return false;
	}


	function get_user_details_by_passing_id($id)
	{
		global $db;
		$sql = "SELECT * FROM user WHERE user_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);

		if ($stmt->execute())
		{
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		return false;
	}

	function get_comment($content_id)
	{
		global $db;
		$sql="SELECT * FROM comments WHERE content_id = :content_id";
		$stmt=$db->prepare($sql);
		$stmt->bindParam(':content_id',$content_id,PDO::PARAM_INT);
		if($stmt->execute())
		{
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return false;
	}

	function update_content($data, $content_id)
	{
		global $db;
		extract($data);
		
		$title = trim($title);
		$content = trim($content);
		
		// Fetch user_id from session
		if (!isset($_SESSION["user_id"]) || !is_numeric($_SESSION["user_id"])) {
			$_SESSION["error_messages"][] = "User not logged in";
			return false;
		}
		
		$user_id = $_SESSION["user_id"];
		
		// Validate and handle image upload
		$image = "";
		if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
			$uploaded_image = upload_file($_FILES['image'], "D:/Ajay Programmers/Xampp/htdocs/News/img/content_img/", ["jpg", "jpeg", "png"]);
			if ($uploaded_image) {
				$image = substr($uploaded_image, 37); // Adjust path according to your needs
			}
		} else {
			// Keep the existing image if no new image is uploaded
			$image = $data['existing_image']; // Assuming you have the existing image path stored
		}
		
		// Prepare SQL statement for updating
		$sql = "UPDATE content SET title = :title, content = :content, img = :img WHERE user_id = :user_id AND content_id = :content_id";
		$stmt = $db->prepare($sql);
		
		// Bind parameters
		$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$stmt->bindParam(':title', $title, PDO::PARAM_STR);
		$stmt->bindParam(':content', $content, PDO::PARAM_STR);
		$stmt->bindParam(':img', $image, PDO::PARAM_STR);
		$stmt->bindParam(':content_id', $content_id, PDO::PARAM_INT);

		// Execute and return result
		if ($stmt->execute()) {
			$_SESSION["success_messages"][] = "Content successfully updated";
			return true;
		} else {
			$_SESSION["error_messages"][] = "Failed to update content";
			return false;
		}
	}

	function get_content()
	{
		global $db;
		$sql = "SELECT * FROM content";
		$stmt = $db->prepare($sql);
		if ($stmt->execute())
		{
			return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all rows as an associative array
		}
		return false;
	}

?>