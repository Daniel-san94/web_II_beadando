<?php

class Regisztral_Model
{
	public function regisztral($vars)
	{
		$retData['eredmeny'] = "";
		try{
			$connection = Database::getConnection();
			$sql = "insert into felhasznalok values(0, :csaladi_nev, :utonev, 
			:bejelentkezes, :email, sha1(:jelszo), DEFAULT)";
			$sth = $connection->prepare($sql);
			if($sth->execute(Array(':csaladi_nev' => $vars['csaladi_nev'], ':utonev' => $vars['utonev'],
			':bejelentkezes' => $vars['bejelentkezes'], ':email' => $vars['email'], 
			':jelszo' => sha1($vars['jelszo'])
			)))
			{
				$retData['eredmeny'] = "OK";
				$retData['uzenet'] = "Sikeres regisztráció ".$vars['csaladi_nev']. 
				$vars['utonev']."!<br>";
			}
			/*else
			{
				$regisztracio_eredmeny = false;
			}
	*/
		}
		catch (PODException $e)
		{
			$retData['eredmeny'] = "ERROR";
			$retData['Uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}
		return $retData;
	}
	public function letezoEmail($email)
	{
		try
		{
		$connection = Database::getConnection();
		$sql= "select email from felhasznalok where email='".$email."'";
		$stmt = $connection->query($sql);
		$felhasznalo = $stmt->fetch(PDO::FETCH_ASSOC);
		if(isset($felhasznalok['email'])){
			return false;
			
		}
		else{
			return true;
		}
		}
		catch (PODException $e){
			return false;
			
		}
	}
		
}

