<?php

include('db/config.php'); 

/**  Switch Case to Get Action from controller  **/

switch($_GET['action'])  {
    case 'get_city' :
            get_city();
            break;

    case 'add_product' :
            add_product();
            break;

    case 'get_product' :
            get_product();
            break;

    case 'edit_product' :
            edit_product();
            break;

    case 'delete_product' :              
            delete_product();
            break;

    case 'update_product' :
            update_product();
            break;

    case 'search_vol' :
            search_vol();
            break;
}


/**  Function to Add Product  **/

function add_product() {
    $data = json_decode(file_get_contents("php://input")); 
    $prod_name      = $data->prod_name;    
    $prod_desc      = $data->prod_desc;
    $prod_price     = $data->prod_price;
    $prod_quantity  = $data->prod_quantity;
 
    print_r($data);
    $qry = 'INSERT INTO product (prod_name,prod_desc,prod_price,prod_quantity) values ("' . $prod_name . '","' . $prod_desc . '",' .$prod_price . ','.$prod_quantity.')';
   
    $qry_res = mysql_query($qry);
    if ($qry_res) {
        $arr = array('msg' => "Product Added Successfully!!!", 'error' => '');
        $jsn = json_encode($arr);
        // print_r($jsn);
    } 
    else {
        $arr = array('msg' => "", 'error' => 'Error In inserting record');
        $jsn = json_encode($arr);
        // print_r($jsn);
    }
}

/**  Function to Get city list  **/
/*
select  pays.paysId, pays.pays_name_fr, city.city_name_fr
from pays
inner join city on pays.paysId = city.paysId
*/
function get_city() {    
    $qryPays = mysql_query('SELECT * from pays');
    $pays = array();
    while($rowsPays = mysql_fetch_array($qryPays))
    {
        $qryVilles = mysql_query('SELECT * from city where paysId='.$rowsPays['paysId']);
        $villes = array();
        while($rowsVille = mysql_fetch_array($qryVilles))
        {
            $villes[] = array(
                    "cityId"            => $rowsVille['cityId'],
                    "city_name_fr"      => $rowsVille['city_name_fr']
                    );
        }

        $pays[] = array(
                    "pays_name_fr"      => $rowsPays['pays_name_fr'],
                    "villes"            => $villes
                    );
    }
    print_r(json_encode($pays));
    return json_encode($pays);  
}

/**  Function to Get Product  **/

function get_product() {    
    $qry = mysql_query('SELECT * from product');
    $data = array();
    while($rows = mysql_fetch_array($qry))
    {
        $data[] = array(
                    "id"            => $rows['id'],
                    "prod_name"     => $rows['prod_name'],
                    "prod_desc"     => $rows['prod_desc'],
                    "prod_price"    => $rows['prod_price'],
                    "prod_quantity" => $rows['prod_quantity']
                    );
    }
    print_r(json_encode($data));
    return json_encode($data);  
}


/**  Function to Delete Product  **/

function delete_product() {
    $data = json_decode(file_get_contents("php://input"));     
    $index = $data->prod_index;     
    //print_r($data)   ;
    $del = mysql_query("DELETE FROM product WHERE id = ".$index);
    if($del)
    return true;
    return false;     
}


/**  Function to Edit Product  **/

function edit_product() {
    $data = json_decode(file_get_contents("php://input"));     
    $index = $data->prod_index; 
    $qry = mysql_query('SELECT * from product WHERE id='.$index);
    $data = array();
    while($rows = mysql_fetch_array($qry))
    {
        $data[] = array(
                    "id"            =>  $rows['id'],
                    "prod_name"     =>  $rows['prod_name'],
                    "prod_desc"     =>  $rows['prod_desc'],
                    "prod_price"    =>  $rows['prod_price'],
                    "prod_quantity" =>  $rows['prod_quantity']
                    );
    }
    print_r(json_encode($data));
    return json_encode($data);  
}


/** Function to Update Product **/

function update_product() {
    $data = json_decode(file_get_contents("php://input")); 
    $id             =   $data->id;
    $prod_name      =   $data->prod_name;    
    $prod_desc      =   $data->prod_desc;
    $prod_price     =   $data->prod_price;
    $prod_quantity  =   $data->prod_quantity;
   // print_r($data);
    
    $qry = "UPDATE product set prod_name='".$prod_name."' , prod_desc='".$prod_desc."',prod_price='.$prod_price.',prod_quantity='.$prod_quantity.' WHERE id=".$id;
  
    $qry_res = mysql_query($qry);
    if ($qry_res) {
        $arr = array('msg' => "Product Updated Successfully!!!", 'error' => '');
        $jsn = json_encode($arr);
        // print_r($jsn);
    } else {
        $arr = array('msg' => "", 'error' => 'Error In Updating record');
        $jsn = json_encode($arr);
        // print_r($jsn);
    }
}

/** Function to search a fly **/

function search_vol() {
    //$str = $_GET['ville_origine'];
    $donnee = json_decode(file_get_contents("php://input"));
    //print_r($donnee);
    $str = $donnee->ville_origine;
    //print_r($str);

    $qry = mysql_query('SELECT * from product WHERE prod_desc LIKE \'%'.$str.'%\'');
    $data = array();
    while($rows = mysql_fetch_array($qry))
    {
        $data[] = array(
                    "id"            => $rows['id'],
                    "prod_name"     => $rows['prod_name'],
                    "prod_desc"     => $rows['prod_desc'],
                    "prod_price"    => $rows['prod_price'],
                    "prod_quantity" => $rows['prod_quantity']
                    );
    }
    print_r(json_encode($data));
    return json_encode($data);
}

?>