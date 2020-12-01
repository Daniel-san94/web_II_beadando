<?php

// AJAX keresek kezelese - sajnos nem tudtam OOP-s megoldasba beilleszteni - sajnos nem birtam beleilleszteni az objektum orientalt
// MVC frameworkbe
require_once( $_SERVER['DOCUMENT_ROOT'].'/web_II_beadando/includes/database.inc.php');

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // alapbol nincs $_PUT szuperglobal valtozo, igy letrehozom
    parse_str(file_get_contents('php://input'), $_PUT);

    if (isset($_PUT['velemenyErtek']) && $_PUT['velemenyErtek'] == '') {
        $error = [
            'eredmeny' => 'ERROR',
            'uzenet' => 'Nem hagyhatod üresen a vélemeny értéket. Kérünk irj be egy valódi vélemenyt.'
        ];
        echo json_encode($error);
        return;
    }

    $updateData = [
        'id' => $_PUT['id'],
        'velemenyErtek' => trim($_PUT['velemenyErtek'])
    ];

    $retData = array();

	try{
		$connection = Database::getConnection();
		$sql = "update velemenyek SET velemeny = :velemeny, datum = DEFAULT where id = :id";
		$sth = $connection->prepare($sql);
		if($sth->execute(Array(':velemeny' => $updateData['velemenyErtek'], ':id' => $updateData['id'])))
		{
			$retData['eredmeny'] = "OK";

			$sqlModositottVelemeny = "select id, hozzaszolo, velemeny, datum from velemenyek where id ='" .$updateData['id'] ."'";
			$stmtModositottVelemeny = $connection->query($sqlModositottVelemeny);
			$modositottVelemeny = $stmtModositottVelemeny->fetch(PDO::FETCH_OBJ);
			$retData['ertekek'] = $modositottVelemeny;
			
		}
	}
	catch (PODException $e)
	{
		$retData['eredmeny'] = "ERROR";
		$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
	}

    $encoded = json_encode($retData);

    echo $encoded;

}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents('php://input'), $_DELETE);

    $retData;

    try{
		$connection = Database::getConnection();
		$sql = "delete from velemenyek where id = :id";
		$sth = $connection->prepare($sql);
		if($sth->execute(Array(':id' => $_DELETE['id'])))
		{
			$retData['eredmeny'] = "OK";
	
		} else {
            $retData['eredmeny'] = 'ERROR';
            $retData['uzenet'] = 'Nem talaltuk az uzenetet az adatbazisban';
        }
	}
	catch (PODException $e)
	{
		$retData['eredmeny'] = "ERROR";
		$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
	}

    $encoded = json_encode($retData);

    echo $encoded;
}