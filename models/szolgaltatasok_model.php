<?php

class Szolgaltatasok_Model
{
	public function osszesSzolgaltatas()
	{
		$szolgaltatasok = array();
		try{
			$connection = Database::getConnection();
			$sql = "select id, nev, leiras, ar, kep_url from szolgaltatasok";
			$stmt = $connection->query($sql);
			$szolgaltatasok = $stmt->fetchAll(PDO::FETCH_OBJ);
			return $szolgaltatasok;
		}
		catch(PDOException $e){
			$retData['eredmény'] = "ERROR";
			$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
			return $retData;
		}	
	}


	public function szolgaltatasIDAlapjan($id) {
		try{
			$connection = Database::getConnection();
			$sql = "select id, nev, leiras, ar, kep_url from szolgaltatasok where id ='" . $id . "'";
			$stmt = $connection->query($sql);
			$szolgaltatas = $stmt->fetchAll(PDO::FETCH_OBJ);
			


			// ha ures tomb az adatbazis lekerdezes eredmenye, akkor a felhasznalo egy nem letezo termek id-jat irta az url-be
			if (empty($szolgaltatas)) {
				$retData['eredmény'] = "ERROR";
				$retData['uzenet'] = "A keresett szolgaltatás nem létezik. Kérünk válassz a meglévő szolgaltatásaink közül";
				return $retData;
				
			}
			$sqlhozzaszolasok = "select id, hozzaszolo, velemeny, datum from velemenyek where szolgaltatasok_id ='" .$id ."'";
			$stmthozzaszolasok = $connection->query($sqlhozzaszolasok);
			$hozzaszolasok = $stmthozzaszolasok->fetchAll(PDO::FETCH_OBJ);
			
			$retData['szolgaltatas'] = $szolgaltatas;
			$retData['hozzaszolasok'] = $hozzaszolasok;
			return $retData;

		}
		catch(PDOException $e){
			$retData['eredmény'] = "ERROR";
			$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
			return $retData;
		}	
	}

public function velemenyHozzaadas($data){
	$retData['eredmeny'] = "";
	try{
		$connection = Database::getConnection();
		$sql = "insert into velemenyek values(0, :szolgaltatasok_id, :hozzaszolo, :velemeny, DEFAULT)";
		$sth = $connection->prepare($sql);
		if($sth->execute(Array(':szolgaltatasok_id' => $data['szolgaltatasok_id'], ':hozzaszolo' => $data['hozzaszolo'],
		':velemeny' => $data['velemeny'])))
		{
			$retData['eredmeny'] = "OK";

		}
		

	}
	catch (PODException $e)
	{
		$retData['eredmeny'] = "ERROR";
		$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
	}
	return $retData;
}



}
?>