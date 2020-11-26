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
	
	
}


?>