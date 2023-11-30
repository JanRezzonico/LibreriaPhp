<?php
class User
{
    /**
     * @throws Exception
     */
    public static function getUser($username, $password) {
        $statement = 'SELECT * FROM user WHERE username = :username;';
        $result = DB_CONNECTION->prepare($statement);
        $result->bindParam(':username', $username, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch(PDO::FETCH_OBJ);

        if (!$user) {
            throw new Exception();
        }
        if (password_verify($password, $user->password)) {
            unset($user->password);
            return $user;
        } else {
            throw new Exception();
        }
    }
}