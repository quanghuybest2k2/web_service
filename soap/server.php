<?php

class Server
{
    private $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=restapi_tracnghiem';
        $username = 'root';
        $password = '';

        try {
            $this->pdo = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }
    // lấy theo tên trong bài lab
    public function getStudentName($idArray)
    {
        $studentId = $idArray['id'];
        $stmt = $this->pdo->prepare('SELECT name FROM students WHERE id = :id');
        $stmt->bindParam(':id', $studentId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return ($result) ? $result['name'] : "Chịu!!! Không tìm thấy bạn này trong CSDL.";
    }
    // lấy hết students
    public function getAllStudents()
    {
        $stmt = $this->pdo->query('SELECT * FROM students');
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $students ? $students : "Hiện chưa có sinh viên trong CSDL!";
    }
}

$params = array('uri' => 'server.php');
$server = new SoapServer(NULL, $params);
$server->setClass("Server");
$server->handle();
