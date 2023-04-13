<?php
require_once("config.php");
$event = $_POST['event'];

switch ($event) {

        //lấy dữ liệu từ CSDL 
    case "getData":
        $mang = array();

        $maYte = $_POST['maYte'];
        $sdt = $_POST['sdt'];
        $sql = mysqli_query($conn, "SELECT * FROM `otp` , `security` "
            . " WHERE `otp`.`MaYTE` = '$maYte' AND `otp`.`sdt` = '$sdt'");

        while ($rows = mysqli_fetch_array($sql)) {

            $usertemp['APIkey'] = $rows['ApiKey'];
            $usertemp['Secretkey'] = $rows['SecretKey'];
            $usertemp['brand'] = $rows['Brandname'];
            $usertemp['maYTe'] = $rows['MaYTE'];
            $usertemp['sdt'] = $rows['sdt'];
            $usertemp['otp'] = $rows['MaOTP'];

            array_push($mang, $usertemp);
        }

        $jsonData['items'] = $mang;

        echo json_encode($jsonData);
        mysqli_close($conn);
        break;

        //kiểm tra thông tin nhập liệu cùng với dữ liệu từ CSDL để gửi mã otp
    case "inputYTE":
        $YourPhone = $_POST['sdt'];

        $APIKey = $_POST['apikey'];
        $SecretKey = $_POST['secretkey'];
        $Content = "Ma OTP cua ban la: " . $_POST['otp'];

        //gửi thông tin và mã OTP vào số điện thoại cho người nhập
        // $SendContent = urlencode($Content);
        // $data = "http://rest.esms.vn/MainService.svc/"
        //     . "json/SendMultipleMessage_V4_get?Phone=$YourPhone&"
        //     . "ApiKey=$APIKey&SecretKey=$SecretKey&Content=$SendContent&"
        //     . "Brandname=DKQT.SAIGON&SmsType=2";

        $res["success"] = 1;

        // $curl = curl_init($data);
        // curl_setopt($curl, CURLOPT_FAILONERROR, true);
        // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // $result = curl_exec($curl);

        // $obj = json_decode($result, true);
        // if ($obj['CodeResult'] == 100) {
        //     $res["success"] = 1;
        // } else {
        //     $res["success"] = 0;
        // }

        echo json_encode($res);
        mysqli_close($conn);
        break;

        //kiểm tra cuối cùng
    case "finalTest":
        //lấy thông tin từ CSDL
        $maYte = $_POST['maYte'];
        $sdt = $_POST['sdt'];
        $otp = $_POST['otp'];

        $sql = "SELECT * FROM `otp` WHERE"
            . "`MaYTE` = '" . $maYte . "' AND `sdt` = '" . $sdt . "' AND "
            . "`MaOTP` = '" . $otp . "';";

        //kiểm tra dòng dữ liệu có hay không
        $check = mysqli_query($conn, $sql);
        $runcheck = mysqli_num_rows($check);

        if ($runcheck > 0) {
            $res = 1;
        } else {
            $res = 0;
        }

        // $res["success"] = 1;

        echo json_encode($res);
        mysqli_close($conn);
        break;

    case "getPDF":
        $mang = array();

        $maYte = $_POST['maYte'];

        $sql = mysqli_query($conn,"SELECT `otp`.`MaYTE`,`medical_information`.`medical_record`,"
        ."`otp`.`sdt`,`medical_information`.`time`, "
        ."`medical_information`.`pathPDF` "
        ."FROM `medical_information`,`otp` "
        ."WHERE `medical_information`.`MaYTE`=`otp`.`MaYTE`"
        ."AND `medical_information`.`MaYTE`='". $maYte ."';");

        $runcheck = mysqli_num_rows($sql);

        if ($runcheck > 0) {
            while($rows = mysqli_fetch_array($sql)) {
                $usertemp['ktrYTE'] = $rows["MaYTE"];
                $usertemp['benhAn'] = $rows["medical_record"];
                $usertemp['ktrSDT'] = $rows["sdt"];
                $usertemp['time'] = $rows["time"];
                $usertemp['pathPDF'] = $rows["pathPDF"];

                array_push($mang, $usertemp);
              }
              $jsonData['items'] = $mang;
        } else {
            $jsonData = 0;
        }

        echo json_encode($jsonData);
        mysqli_close($conn);
        break;

        case "showPDF":
            $mang = array();
            $maYte = $_POST['maYte'];
            $Benh = $_POST['benhAn'];
    
            $sql = mysqli_query($conn,"SELECT `medical_record`,`pathPDF` "
            ."FROM `medical_information` WHERE `MaYTE`='".$maYte."';");
    
            $runcheck = mysqli_num_rows($sql);
    
            if ($runcheck > 0) {
                while($rows = mysqli_fetch_array($sql)) {
                    $usertemp['benhAn'] = $rows["medical_record"];
                    $usertemp['pdf'] = $rows["pathPDF"];
    
                    array_push($mang, $usertemp);
                  }
                  $jsonData['items'] = $mang;
            } else {
                $jsonData = 0;
            }
    
            echo json_encode($jsonData);
            mysqli_close($conn);
            break;

    default:
        # code...
        break;
}


