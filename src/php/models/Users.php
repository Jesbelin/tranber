<?php

namespace tranber\models;

use tranber\structures\Model;

class Users extends Model
{
	public function loginExists(string $login) :bool
	{
		$sql      = "SELECT * FROM users WHERE login=:login";
		$database = $this->getApp()->getDatabase();
		// si le résultat de la requête SQL n'est PAS vide 
		// alors le login existe déjà :
		$data = [
			':login' => $login,
		];
		return !empty($database->query($sql, $data));
	}

	public function emailExists(string $email) :bool
	{
		$sql      = "SELECT * FROM users WHERE email=:email";
		$database = $this->getApp()->getDatabase();
		// si le résultat de la requête SQL n'est PAS vide 
		// alors l'email existe déjà :
		$data = [
			':email' => $email,
		];
		return !empty($database->query($sql, $data));
	}

	public function createUser(string $login, string $password, string $email)
	{
		$sql = "INSERT INTO users (login, email, password) 
				VALUES (:login, :email, :password)";
		$data = [
			':login'    => $login,
			':email'    => $email,
			':password' => \password_hash($password, \PASSWORD_DEFAULT),
		];
		$database = $this->getApp()->getDatabase();
		return $database->query($sql, $data, false);
	}

	public function logIn(string $login, string $password)
	{
		$sql = "SELECT * FROM users WHERE login=:login";
		$data = [
			':login' => $login,
		];
		$database = $this->getApp()->getDatabase();
		$user = $database->query($sql, $data);

		/*
			return ($user && array_key_exists(0, $user) && password_verify($password, $user[0]['password']))
			? $user[0]
			:null;
		*/
		if($user && array_key_exists(0, $user) && password_verify($password, $user[0]['password'])){
			return $user[0];
		} else {
			return null;
		}
	}

	public function updateUser(string $id, string $login, string $password, string $email)
	{
		$sql = 
			"UPDATE user
			SET login = '$login', password = '$password', email = '$email'
			WHERE id = '$id'";
		$database = $this->getApp()->getDatabase();
		return $database->query($sql);
	}

	/*
		function update_customer($customerID, $firstName, $lastName, $address, $city, $state, $postalCode, $countryCode, $phone, $email) {
		    global $db;
		    $query = "UPDATE customers
		              SET
		                  firstName = '$firstName', lastName = '$lastName', address = '$address', city = '$city', state = '$state',
		                  postalCode = '$postalCode', countryCode = '$countryCode', phone = '$phone', email = '$email'
		              WHERE customerID = '$customerID' ";
		    $db->exec($query);

		}

	*/
}