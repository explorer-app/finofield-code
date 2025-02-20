<?php

include("../database/DbConnection.php");
include("../models/ServiceModel.php");

session_start();

$db = new DbConnection();
$con = $db->getConnection();
$serviceModel = new ServiceModel($con);

$action = $_GET['action'];

if($action == "service_add" && $_SERVER['REQUEST_METHOD']) {

        $service_name = $_POST['service_name'];
        $brief_description = $_POST['brief_description'];
        $detailed_description = $_POST['detailed_description'];

        echo $brief_description;
        echo $service_name;
        $service_image = $_FILES['service_image'];

        $data = ['name' => $service_name, 'brief_description' =>  $brief_description, 'detailed_description' => $detailed_description, 'image' => $service_image];

        $result = $serviceModel->addService($data);

    
        header("location: ../admin/services.php?success= service add successfully");
        exit;
}
   else if($action === "service_update" && $_SERVER['REQUEST_METHOD']==="POST") {

      $service_name = $_POST['service_name'];
      $brief_description = $_POST['brief_description'];
      $detailed_description = $_POST['detailed_description'];
      $service_image = $_FILES['service_image'];
      $service_id = $_POST['service_id'];

      $data = ['service_id' => $service_id, 'name' => $service_name, 'brief_description' => $brief_description, 'detailed_description' => $detailed_description, 'image' => $service_image];

      $result = $serviceModel->updateService($data);

    header("location: ../admin/services.php?success = service update successfully");
    exit;


   }






?>