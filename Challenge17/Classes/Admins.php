<?php

class Admins
{
    protected static $email;
    protected static $password;

    public static function adminExist($email, $password, $connection)
    {

        $sql = "SELECT * FROM admins WHERE email = :email";
        $selectQuery = $connection->prepare($sql);
        $selectQuery->bindParam(":email", $email, PDO::PARAM_STR);
        $selectQuery->execute();
        $admin = $selectQuery->fetch(PDO::FETCH_ASSOC);
        if (empty($admin) || !password_verify($password, $admin['password'])) {
            return false;
        }
        return true;
    }
}
