<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

include "config.php";

// Ambil data dari JSON body
$data = json_decode(file_get_contents("php://input"), true);

$email     = trim($data['email'] ?? '');
$password  = trim($data['password'] ?? '');
$token     = trim($data['token'] ?? '');

// Validasi input
if (empty($email) || empty($password) || empty($token)) {
    echo json_encode([
        "success" => false,
        "message" => "Email, password, dan token wajib diisi!"
    ]);
    exit;
}

// Query cek user, password, dan token
$sql = "SELECT * FROM users WHERE email=? AND password=? AND token=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $email, $password, $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode([
        "success" => true,
        "message" => "Login berhasil",
        "token"   => $token
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Email, password, atau token salah!"
    ]);
}
// }


// function getInput() {
//     return json_decode(file_get_contents("php://input"), true);
// }


//     $method = $_SERVER['REQUEST_METHOD'];

// switch ($method) {


//     case 'POST':
//         // Login User
//         if (isset($_GET['action']) && $_GET['action'] === 'login') {
//             $input = getInput();
//             $email = $conn->real_escape_string($input['email'] ?? '');
//             $password = $conn->real_escape_string($input['password'] ?? '');

//             if (!$email || !$password) {
//                 echo json_encode(["error" => "Email dan password wajib diisi"]);
//                 exit;
//             }

//             $result = $conn->query("SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1");

//             if ($result->num_rows > 0) {
//                 $user = $result->fetch_assoc();
                
//                 // Buat token sederhana
//                 $token = base64_encode(json_encode([
//                     "id" => $user['id'],
//                     "email" => $user['email'],
//                     "time" => time()
//                 ]));

//                 echo json_encode([
//                     "message" => "Login berhasil",
//                     "token" => $token,
//                     "user" => [
//                         "id" => $user['id'],
//                         "nama" => $user['nama'],
//                         "email" => $user['email']
//                     ]
//                 ]);
//             } else {
//                 echo json_encode(["error" => "Email atau password salah"]);
//             }
//             break;
//         }   
//     }
// }
?>