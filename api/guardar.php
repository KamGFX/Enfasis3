<?php
header("Content-Type: application/json");
$data = json_decode(file_get_contents("php://input"), true);

$conexion = new mysqli("localhost", "usuario", "password", "basedatos");

$stmt = $conexion->prepare("INSERT INTO datos_agricolas (temp_aire, hum_aire, temp_suelo, humedad_suelo, lat, lng)
VALUES (?, ?, ?, ?, ?, ?)");

$stmt->bind_param("dddddd",
    $data["TempAire"],
    $data["HumAire"],
    $data["TempSuelo"],
    $data["HumedadSuelo"],
    $data["Latitud"],
    $data["Longitud"]
);

$stmt->execute();

echo json_encode(["status"=>"OK"]);
