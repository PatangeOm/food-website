<?php

    $Uname = $_POST['Uname']; 
    $Uemail = $_POST['Uemail']; 
    $Unumber = $_POST['Unumber'];  
    $Uquantity = $_POST['Uquantity']; 
    $Ufood = $_POST['Ufood']; 
    $Uaddress = $_POST['Uaddress'];  

    if (!empty($Uname) || !empty($Uemail) || !empty($Unumber)) {
        $host = "localhost" ; 
        $dbUsername = "root" ; 
        $dbPassword = "" ; 
        $dbname = "om patange" ;
        
        $conn = new mysqli($host , $dbUsername , $dbPassword , $dbname) ; 
        if(mysqli_connect_error()){
            die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error()) ; 
        }
        else {
            $INSERT = "INSERT Into OrderTable(Uname , Uemail , Unumber , Uquantity , Ufood , Uaddress) values( ? , ? , ? ,? , ? , ?) " ; 
 
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("ssssss" , $Uname , $Uemail , $Unumber , $Uquantity , $Ufood , $Uaddress);  
                $stmt->execute();
                echo "Order Placed ! " ;  
       
            $stmt->close() ; 
            $conn->close() ; 
        }
    }
    else{
        echo "Please fill all fields" ; 
        die() ; 
    }

?>