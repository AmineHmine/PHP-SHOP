<?php
include("../cnx.php");
?>
<?php
ini_set('memory_limit','5512M'); 
set_time_limit(5000);
    $query='';
    $table_data = '';
    $filename = "products1.json";
    $data = file_get_contents($filename); //Read the JSON file in PHP
    $array = json_decode($data, true); //Convert JSON String into PHP Array
    // echo "
    // <table>
    //     <tr>
    //         <td>name</td>
    //     </tr>
    // </table>
    // ";
    $req="SELECT * FROM categorie";
    $res=$dbcnx->query($req);
    $arr=$res->fetch_all();
    // var_dump($arr);

    foreach($arr as $val){
        echo "<br>".$val[1]."---- CATEGORY --------------------------------------------------------------------------------------------------------- <br>";
        $req1="SELECT * FROM products";
        $res1=$dbcnx->query($req1);
        $arr1=$res1->fetch_all();
        echo "<h1  class='uk-margin'>$val[1]</h1>";
        foreach($arr1 as $ligne){
            //echo $ligne[0]."<br>";
            // $catTab=explode(" ",trim($ligne[0]));
            // var_dump($catTab);

                $myString = trim($ligne[5]);
                
                if (strpos($myString, "$val[0]") !== false){
                    //echo "My string contains $val[0] <br>";
                    echo "product is $ligne[1] <br>";
                }
                else{
                    // echo "<br>";
                }
            // foreach($catTab as $val){
            //     echo $val;
                
            // }
            
        }
    }

    
    //var_dump($arr1);
    
    // if($res1->num_rows){
    //     $tab=explode(" ",trim())
    // }
    


        
?>