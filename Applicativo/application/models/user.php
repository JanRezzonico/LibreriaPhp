<?php
class User
{
    /**
     * @throws Exception
     */
    public static function getUser($username, $password){
        $password = hash(CRYPT_SHA256, $password);
        $statement = 'SELECT * FROM user WHERE username LIKE :username AND password LIKE :password;';
        $result = DB_CONNECTION
            ->prepare($statement)
            ->bindParam(':username', $username, PDO::PARAM_STR)
            ->bindParam(':password', $password, PDO::PARAM_STR)
            ->execute()
            ->fetch(PDO::FETCH_OBJ);

        if (!isset($result)) {
            throw new Exception();
        }
        return $result[0];
    }
}