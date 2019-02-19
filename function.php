<?php
function InsertRow($tableName,$formData){

    $fields = array_keys($userArr);
    $sql="INSERT INTO ".$tableName."(`".implode('`,`', $fields)."`) VALUES('".implode("','", $formData)."')";
    return mysqli_query($sql);
}
?>