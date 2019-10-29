<?php


class Statements extends PDO
{
    //ESTABLISH CONNECTION WITH DATABASE
    public function __construct($host, $user, $password, $database)
    {
        $dsn = 'mysql:host=' . $host . ';dbname=' . $database . ';charset=utf8';

        // CREATE OPTIONS ARRAY FOR PDO
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        try {
            parent::__construct($dsn, $user, $password, $options);
        } catch (PDOException $e) {
            die("The connection to the database failed: " . $e->getMessage());
        }
    }

    //Creates new user
    public function createNewUser($email, $password, $goal, $height, $weight, $sex, $confirmationStatus, $confirmationCode, $birthDate)
    {
        $stmt = $this->prepare(
            "INSERT INTO user (email, password, goal, height, weight, sex, confirmation_status, confirmation_code, birthdate) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute(array($email, $password, $goal, $height, $weight, $sex, $confirmationStatus, $confirmationCode, $birthDate));
    }

    //Helps to fetch data from user
    public function getUser($userEmail)
    {
        $stmt = $this->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->execute(array(':email' => $userEmail));
        $result = $stmt->fetch();
        return $result;
    }

    //Helps to fetch data from all users
    public function getAllUsers()
    {
        $stmt = $this->prepare("SELECT * FROM user");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //Converts birth-date into age
    function calculateAge($userBirthDate)
    {
        $currentDate = new DateTime();
        $dateArray = preg_split('[/]', $userBirthDate);
        $birthDate = $dateArray[0] . "-" . $dateArray[1] . "-" . $dateArray[2];
        $birthDate = new DateTime($birthDate);
        $difference = date_diff($currentDate, $birthDate);
        return $difference->format('%Y');
    }

    //Updates user's goal, sex, weight and height
    public function updateUser($data)
    {
        $stmt = $this->prepare(
            "UPDATE user SET goal = :goal, sex = :sex, weight = :weight, height = :height WHERE email = :email"
        );
        $stmt->execute($data);
    }

    //Gets all videos to be displayed
    public function getAllVideos()
    {
        $stmt = $this->prepare("SELECT * FROM youtube_videos ORDER BY ID");
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    //Gets all video data from database and returns it as JSON Array
    public function getJSONVideos()
    {
        $json_array = array();
        $stmt = $this->prepare("SELECT * FROM youtube_videos ORDER BY ID");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $data) {
            $json_array[] = $data;
        }
        return json_encode($json_array);
    }

    //Gets video data from database
    public function getVideo($video)
    {
        $stmt = $this->prepare("SELECT * FROM youtube_videos WHERE ID = :video");
        $stmt->execute(array(':video' => $video));
        $result = $stmt->fetch();
        return $result;
    }

    //Gets all posts to be displayed
    public function getAllPosts()
    {
        $stmt = $this->prepare("SELECT * FROM nutrition_post ORDER BY ID");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //Gets all posts data from database and returns it as JSON Array
    public function getJSONPosts()
    {
        $json_array = array();
        $stmt = $this->prepare("SELECT * FROM nutrition_post ORDER BY ID");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $data) {
            $json_array[] = $data;
        }
        return json_encode($json_array);
    }

    //Gets post data from database
    public function getPost($post)
    {
        $stmt = $this->prepare("SELECT * FROM nutrition_post WHERE ID = :post");
        $stmt->execute(array(':post' => $post));
        $result = $stmt->fetch();
        return $result;
    }

    //Verifies registration
    public function completeRegistration($email)
    {
        $data = [
            ":confirmation_code" => 0,
            ":confirmation_status" => 1,
            ":email" => $email
        ];

        $stmt = $this->prepare("UPDATE user SET confirmation_code = :confirmation_code, confirmation_status = :confirmation_status WHERE email = :email");
        $stmt->execute($data);
    }

    //Sets first step of password reset
    public function startPasswordReset($email)
    {
        $data = [
            ":reset_confirmation" => 0,
            ":reset_code" => rand(0, 10000000),
            ":email" => $email
        ];

        $query = "UPDATE `user` SET `reset_confirmation` = :reset_confirmation, `reset_code` = :reset_code WHERE `email` = :email";
        $stmt = $this->prepare($query);
        $stmt->execute($data);
    }

    //Completes password reset
    public function completePasswordReset($password, $email)
    {
        $data = [
            ":password" => $password,
            ":reset_confirmation" => 1,
            ":reset_code" => 0,
            ":email" => $email
        ];

        $query = "UPDATE `user` SET `password` = :password, `reset_confirmation` = :reset_confirmation, `reset_code` = :reset_code WHERE `email` = :email";
        $stmt = $this->prepare($query);
        $stmt->execute($data);
    }

    //Login
    public function login($email)
    {
        $stmt = $this->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->execute(array(':email' => $email));
        return $stmt->fetch();
    }

    //Updates user email
    public function changeEmail($newEmail, $email)
    {
        $stmt = $this->prepare("UPDATE user SET email = :newEmail WHERE email = :email");
        $stmt->execute(array('newEmail' => $newEmail, ':email' => $email));
    }

    //Updates user password
    public function changePassword($newPassword, $email)
    {
        $query = "UPDATE `user` SET `password` = :newPassword WHERE `email` = :email";
        $stmt = $this->prepare($query);
        $stmt->execute(array(":newPassword" => $newPassword, ":email" => $email));
    }

    //Delets user account
    public function deleteUser($email){
        $query = "DELETE FROM `user` WHERE `email` = :email";
        $stmt = $this->prepare($query);
        $stmt->execute(array(":email" => $email));
    }
}

