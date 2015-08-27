<?php    
/*
 * PHP QR Code encoder
 *
 * Exemplatory usage
 *
 * PHP QR Code is distributed under LGPL 3
 * Copyright (C) 2010 Dominik Dzienia <deltalab at poczta dot fm>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */
    
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = '../view/images/Resources/QRCode/';
    
    //html PNG location prefix
    // $PNG_WEB_DIR = 'temp/';

    include "qrcode/qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'test.png';
    $F_name = $_GET['cin'];
    $data = 'Prenom:'.$_GET['prenom']."\n".'Nom:'.$_GET['nom']."\n".'CIN:'.$_GET['cin']."\n".'Date de Naissance:'.$_GET['date_naissance']."\n".'Sexe:'.$_GET['sexe']."\n".'E-Mail:'.$_GET['email']."\n".'Adresse:'.$_GET['adresse']."\n".'Type de Carte:'.$_GET['statut']."\n";
    
    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    $matrixPointSize = 4;
    if (isset($data)) { 
    
        //it's very important!
        if ($data == '')
            die('data cannot be empty! <a href="?">back</a>');
            
        // user data
        $filename = $PNG_TEMP_DIR.$F_name.'.png';
        QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    }
        
    // //display generated file
    // echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';  
    
    //config form
    // echo '<form action="index.php" method="POST">
    //     File Name: <input type="text" name="F_name" />
    //     <br><br>
    //     Nom: <input type="text" name="name">
    //     <br><br>
    //     Prenom: <input type="text" name="lastname">
    //     <br><br>
    //     age: <input type="text" name="age">
    //     <br><br>
    //     CIN: <input type="text" name="CIN">
    //     <br><br>
    //     email: <input type="text" name="email">
    //     ECC:&nbsp;<select name="level">
    //         <option value="L"'.(($errorCorrectionLevel=='L')?' selected':'').'>L - smallest</option>
    //         <option value="M"'.(($errorCorrectionLevel=='M')?' selected':'').'>M</option>
    //         <option value="Q"'.(($errorCorrectionLevel=='Q')?' selected':'').'>Q</option>
    //         <option value="H"'.(($errorCorrectionLevel=='H')?' selected':'').'>H - best</option>
    //     </select>&nbsp;
    //     Size:&nbsp;<select name="size">';
        
    // for($i=1;$i<=10;$i++)
    //     echo '<option value="'.$i.'"'.(($matrixPointSize==$i)?' selected':'').'>'.$i.'</option>';
        
    // echo '</select>&nbsp;
    //     <input type="submit" value="GENERATE"></form><hr/>';
    header('location:print.php?file_path='.$filename.'&statut='.$_GET['statut'].'&file='.$F_name);
    ?>
    