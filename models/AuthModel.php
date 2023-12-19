<?php 

class AuthModel extends BaseModel {
    public function addUser($username, $password) {

        try {
            $sql = "INSERT INTO users(username, password) VALUES(:username, :password)";
            $stmt = self::connect()->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
    
            if (!$stmt->execute()) {
                throw new Exception("Error, registratie mislukt.");
            }  
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function authenticate($username, $password) {
        try {
            $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";

            $stmt = self::connect()->prepare($sql);
            $stmt->bindParam(':username', $username);

            if (!$stmt->execute()) {
                throw new PDOException("Login mislukt.");
            }

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() == 1) {
                $hashpassword = $row['password'];
                if (password_verify($password, $hashpassword)) {
                    $_SESSION['user'] = $row;
                } else {
                    return false;
                }

            }
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}

?>