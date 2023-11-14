<?php

class Client
{
    public function __construct()
    {
        $params = array(
            'location' => 'http://localhost/web_service/soap/server.php',
            'uri' => 'urn://localhost/web_service/soap/server.php',
            'trace' => '1'
        );
        $this->instance = new SoapClient(NULL, $params);
    }

    public function getName($idArray)
    {
        return $this->instance->__soapCall('getStudentName', ['parameters' => $idArray]);
    }
    public function getAllStudents()
    {
        return $this->instance->__soapCall('getAllStudents', []);
    }
}

$client = new Client();
// all
$students = $client->getAllStudents();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="text-center">Demo Soap</h1>
            <?php
            // only one
            $idArray = ['id' => '3']; // Trần Ngọc Hân
            echo "Sinh viên có id " . $idArray['id'] . " là: " . $client->getName($idArray);
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Giới tính</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    $stt = 1;
                    foreach ($students as $student) {
                        $formatVN = date("d/m/Y", strtotime($student['birthday']));
                        echo "<tr>
                                <th scope='row'>$stt</th>
                                <td>" . $student['name'] . "</td>
                                <td>" . $formatVN . "</td>
                                <td>" . $student['gender'] . "</td>
                        </tr>";
                        $stt++;
                    }
                    ?>
                </tbody>
            </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>