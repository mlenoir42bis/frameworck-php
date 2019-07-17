<?php

session_start(); 
$bearer = '';

if (isset($_SESSION['ASSURBOX_BEARERTOKEN'])) {

    $CustomerPersonLastName = isset($_POST['Customer_Person_LastName'])?$_POST['Customer_Person_LastName']:null;
    $CustomerPersonFirstName = isset($_POST['Customer_Person_FirstName'])?$_POST['Customer_Person_FirstName']:null;
    $CustomerPersonBirthdate = isset($_POST['Customer_Person_BirthDate'])?$_POST['Customer_Person_BirthDate']:null;
    $CustomerPersonEmail = isset($_POST['Customer_Person_Email'])?$_POST['Customer_Person_Email']:null;
    $CustomerPersonPhone = isset($_POST['Customer_Person_Phone'])?$_POST['Customer_Person_Phone']:null;
    $CustomerPersonAdressCity = isset($_POST['Customer_Person_Address_City'])?$_POST['Customer_Person_Address_City']:null;
    $CustomerPersonAdressZipOrPostcode = isset($_POST['Customer_Person_Address_ZipOrPostcode'])?$_POST['Customer_Person_Address_ZipOrPostcode']:null;
    $CustomerPersonAdressStreet = isset($_POST['Customer_Person_Address_Street'])?$_POST['Customer_Person_Address_Street']:null;
    $CustomerPersonAdressNumber = isset($_POST['Customer_Person_Address_Number'])?$_POST['Customer_Person_Address_Number']:null;
    $CarDetailsLicencePlate = isset($_POST['CarDetails_LicencePlate'])?$_POST['CarDetails_LicencePlate']:null;
    $CarDetailsVIN = isset($_POST['CarDetails_VIN'])?$_POST['CarDetails_VIN']:null;
    $CarDetailsVehicleAcquisitionType = isset($_POST['CarDetails_VehicleAcquisitionType'])?$_POST['CarDetails_VehicleAcquisitionType']:null;
    $CarDetailsDateOfVehicleRegistration = isset($_POST['CarDetails_DateOfVehicleRegistration'])?$_POST['CarDetails_DateOfVehicleRegistration']:null;
    $CarDetailsFuel = isset($_POST['CarDetails_Fuel'])?$_POST['CarDetails_Fuel']:null;
    $CarDetailsMake = isset($_POST['CarDetails_Make'])?$_POST['CarDetails_Make']:null;
    $CarDetailsModel = isset($_POST['CarDetails_Model'])?$_POST['CarDetails_Model']:null;
    $CarDetailsVersion = isset($_POST['CarDetails_Version'])?$_POST['CarDetails_Version']:null;
    $CarDetailsEngineSizeInCm3 = isset($_POST['CarDetails_EngineSizeInCm3'])?$_POST['CarDetails_EngineSizeInCm3']:null;
    $CarDetailsEnginePowerInKw= isset($_POST['CarDetails_EnginePowerInKw'])?$_POST['CarDetails_EnginePowerInKw']:null;
    $CarDetailsUnloadedWeightInKg = isset($_POST['CarDetails_UnloadedWeightInKg'])?$_POST['CarDetails_UnloadedWeightInKg']:null;
    $CarDetailsPriceWithOption = isset($_POST['CarDetails_PriceWithOption'])?$_POST['CarDetails_PriceWithOption']:null;
    $CarDetailsPriceWithoutOption = isset($_POST['CarDetails_PriceWithoutOption'])?$_POST['CarDetails_PriceWithoutOption']:null;
    $RecipientInsurerVAT = isset($_POST['RecipientInsurer_VAT'])?$_POST['RecipientInsurer_VAT']:null;
    $EffectiveDate = isset($_POST['EffectiveDate'])?$_POST['EffectiveDate']:null;
    $Communication = isset($_POST['Communication'])?$_POST['Communication']:null;
    $RequestType = isset($_POST['RequestType'])?$_POST['RequestType']:null;
    $LicencePlateToReplace = isset($_POST['LicencePlateToReplace'])?$_POST['LicencePlateToReplace']:null;
    
    $errorMsg = array();
    if(!isset($CarDetailsVehicleAcquisitionType) || $CarDetailsVehicleAcquisitionType==""){
        $errorMsg[] = "CarDetailsVehicleAcquisitionType field is required";
    }
    if(!isset($CarDetailsEngineSizeInCm3) || $CarDetailsEngineSizeInCm3==""){
        $errorMsg[] = "CarDetailsEngineSizeInCm3 field is required";
    }
    if(!isset($CarDetailsEnginePowerInKw) || $CarDetailsEnginePowerInKw==""){
        $errorMsg[] = "CarDetailsEnginePowerInKw field is required";
    }
    if(!isset($CarDetailsFuel) || $CarDetailsFuel==""){
        $errorMsg[] = "CarDetailsFuel field is required";
    }
    if(!isset($EffectiveDate) || $EffectiveDate==""){
        $errorMsg[] = "EffectiveDate field is required";
    }
    if(!isset($RequestType) || $RequestType==""){
        $errorMsg[] = "RequestType field is required";
    }

    $_SESSION['error'] = false;
    if(count($errorMsg)>0) {
        $_SESSION['error'] = true;
        $_SESSION['msg']= implode("<br/>", $errorMsg);
        header('Location: /create.php');
        exit();
    }
    else {
        $bearer = $_SESSION['ASSURBOX_BEARERTOKEN'];
        $ch = curl_init();

        $dateTime = (new \DateTime())->format('Y-m-d H:i:s');
        $postfield = "{\n  \"RequestDateUTC\": \"" . $dateTime. "\",\n  \"RecipientInsurer\": {\n    \"Identifier\": 0,\n    \"VAT\": \"LU345678901\",\n    \"Name\": \"Assurance Delta\"\n  },\n  \"CarDetails\": {\n    \"LicencePlate\": \"" . $CarDetailsLicencePlate . "\",\n    \"VIN\": \"" . $CarDetailsVIN . "\",\n    \"EuroTaxID\": \"string\",\n    \"VehicleAcquisitionType\": " . $CarDetailsVehicleAcquisitionType . ",\n    \"UsedVehicleMileage\": 0,\n    \"DateOfVehicleRegistration\": \"" . $CarDetailsDateOfVehicleRegistration . "\",\n    \"Make\": \"" . $CarDetailsModel  . "\",\n    \"Model\": \"" . $CarDetailsModel  . "\",\n    \"Version\": \"" . $CarDetailsVersion  . "\",\n    \"PriceWithOption\": \"" . $CarDetailsPriceWithOption  . "\",\n    \"PriceWithoutOption\": \"" . $CarDetailsPriceWithoutOption  . "\",\n    \"EngineSizeInCm3\": " . $CarDetailsEngineSizeInCm3  . ",\n    \"EnginePowerInKw\": " . $CarDetailsEnginePowerInKw  . ",\n    \"EnginePowerInCH\": 0,\n    \"Fuel\": " . $CarDetailsFuel  . ",\n    \"UnloadedWeightInKg\": " . $CarDetailsUnloadedWeightInKg  . "\n  },\n  \"Customer\": {\n    \"Person\": {\n      \"LastName\": \"" . $CustomerPersonLastName . "\",\n      \"" . $CustomerPersonFirstName . "\": \"string\",\n      \"BirthDate\": \"" . $CustomerPersonBirthdate . "\",\n      \"Email\": \"" . $CustomerPersonEmail . "\",\n      \"Phone\": \"" . $CustomerPersonPhone . "\",\n      \"Fax\": \"string\",\n      \"Gsm\": \"string\",\n      \"DrivingLicenseNumber\": \"string\",\n      \"Address\": {\n        \"Street\": \"" . $CustomerPersonAdressStreet . "\",\n        \"Number\": \"" . $CustomerPersonAdressNumber . "\",\n        \"PostboxNumber\": \"string\",\n        \"ZipOrPostcode\": \"" . $CustomerPersonAdressZipOrPostcode . "\",\n        \"City\": \"string\",\n        \"Country\": \"string\",\n        \"StateOrProvince\": \"string\",\n        \"OtherAddressDetails\": \"string\"\n      }\n    },\n    \"Company\": {\n      \"Name\": \"string\",\n      \"VAT\": \"string\",\n      \"LegalAddress\": {\n        \"Street\": \"string\",\n        \"Number\": \"string\",\n        \"PostboxNumber\": \"string\",\n        \"ZipOrPostcode\": \"string\",\n        \"City\": \"string\",\n        \"Country\": \"string\",\n        \"StateOrProvince\": \"string\",\n        \"OtherAddressDetails\": \"string\"\n      },\n      \"Representative\": {\n        \"LastName\": \"string\",\n        \"FirstName\": \"string\",\n        \"BirthDate\": \"2018-09-26T10:48:25Z\",\n        \"Email\": \"string\",\n        \"Phone\": \"string\",\n        \"Fax\": \"string\",\n        \"Gsm\": \"string\",\n        \"DrivingLicenseNumber\": \"string\",\n        \"Address\": {\n          \"Street\": \"string\",\n          \"Number\": \"string\",\n          \"PostboxNumber\": \"string\",\n          \"ZipOrPostcode\": \"string\",\n          \"City\": \"string\",\n          \"Country\": \"string\",\n          \"StateOrProvince\": \"string\",\n          \"OtherAddressDetails\": \"string\"\n        }\n      }\n    },\n    \"PartnerOrganizationReference\": \"string\",\n    \"InsuranceOrganizationReference\": \"string\"\n  },\n  \"Driver\": {\n    \"LastName\": \"string\",\n    \"FirstName\": \"string\",\n    \"BirthDate\": \"2018-09-26T10:48:25Z\",\n    \"Email\": \"string\",\n    \"Phone\": \"string\",\n    \"Fax\": \"string\",\n    \"Gsm\": \"string\",\n    \"DrivingLicenseNumber\": \"string\",\n    \"Address\": {\n      \"Street\": \"string\",\n      \"Number\": \"string\",\n      \"PostboxNumber\": \"string\",\n      \"ZipOrPostcode\": \"string\",\n      \"City\": \"string\",\n      \"Country\": \"string\",\n      \"StateOrProvince\": \"string\",\n      \"OtherAddressDetails\": \"string\"\n    }\n  },\n  \"OwnerIfDifferentFromCustomer\": {\n    \"Name\": \"string\",\n    \"VAT\": \"string\",\n    \"LegalAddress\": {\n      \"Street\": \"string\",\n      \"Number\": \"string\",\n      \"PostboxNumber\": \"string\",\n      \"ZipOrPostcode\": \"string\",\n      \"City\": \"string\",\n      \"Country\": \"string\",\n      \"StateOrProvince\": \"string\",\n      \"OtherAddressDetails\": \"string\"\n    },\n    \"Representative\": {\n      \"LastName\": \"string\",\n      \"FirstName\": \"string\",\n      \"BirthDate\": \"2018-09-26T10:48:25Z\",\n      \"Email\": \"string\",\n      \"Phone\": \"string\",\n      \"Fax\": \"string\",\n      \"Gsm\": \"string\",\n      \"DrivingLicenseNumber\": \"string\",\n      \"Address\": {\n        \"Street\": \"string\",\n        \"Number\": \"string\",\n        \"PostboxNumber\": \"string\",\n        \"ZipOrPostcode\": \"string\",\n        \"City\": \"string\",\n        \"Country\": \"string\",\n        \"StateOrProvince\": \"string\",\n        \"OtherAddressDetails\": \"string\"\n      }\n    }\n  },\n  \"Communication\": \"" . $Communication . "\",\n  \"EffectiveDate\": \"" . $EffectiveDate . "\",\n  \"RequestType\": " . $RequestType . ",\n  \"LicencePlateToReplace\": \"" . $LicencePlateToReplace . "\",\n  \"TransfertInsurer\": {\n    \"Identifier\": 0,\n    \"VAT\": \"string\",\n    \"Name\": \"string\"\n  },\n  \"Location\": \"string\",\n  \"MessageId\": \"string\"\n}";

        curl_setopt_array($ch, array(
          CURLOPT_URL => "https://devslot.assurbox.net/api/v1.0/GreenCard/Car/Requests",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $postfield,
          CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer " . $bearer,
            "Cache-Control: no-cache",
            "Content-Type: application/json"
          ),
        ));

        $result = curl_exec($ch);
    
        curl_close($ch);
    
        $createRequest=json_decode($result,true);
        $_SESSION['createRequest'] = $createRequest;
   
        /*
        echo '<pre>';
        print_r($createRequest);
        echo '</pre>';
        */
        if(isset($createRequest['Error'])) {
            echo 'error';
            $i = 0;
            while($i < count($createRequest['Error']['Details'])) {
                //echo $createRequest['Error']['Details'][$i]['Message'];
                if (isset($createRequest['Error']['Details'][$i]['Message'])) {
                    $errorMsg[] = $createRequest['Error']['Details'][$i]['Message'];
                }
                $i++;
            }
            $_SESSION['error'] = true;
            $_SESSION['msg']= implode("<br/>", $errorMsg);
            header('Location: /create.php');
            exit();
        }
        else {
            header('Location: /request.php');
            exit();
        }
    }


}
else {
    header("Location: /");
    exit();
}