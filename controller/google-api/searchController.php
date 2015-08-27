<?php
$cache = 'userList.json';
$expire = time() -3600 ; // valable une heure

 

if(file_exists($cache))

{
    $list = json_decode(file_get_contents($cache));
    
    if(isset($_POST['action']) && $_POST['action']=== 'hint' ){
    echo '<div class="collection">';
        $str = $_POST['string'];
        if( $str !== ""){
            $len=strlen($str);
            foreach($list as $name) {
                if (stristr($str, substr($name->nom , 0, $len))) {
                echo '<a href="#!" class="collection-item" onclick = "setInput(this.innerHTML,\''.$name->mail.'\')">'.$name->nom.'</a>';
                }             
            }
        }
        else{
            echo '<a href="#!" class="collection-item" >Nom, Prenom..</a>';
        }
        echo '</div>';
    }
}



    
