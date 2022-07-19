<?php

class Database
{

	protected $connection;

	function __construct() {
		$this->connect_db();
	}

	public function connect_db() 
	{
		$this->connection = mysqli_connect('localhost', 'root', 'root', 'oop_crud');
		if (mysqli_connect_error()) {
			die("Database Connection Failed" . mysqli_connect_error() . mysqli_connect_errno());
		}
	}

    /**
     * @param $fname
     * @param $lname
     * @param $email
     * @param $gender
     * @param $age
     * @return bool
     */
    public function create($fname, $lname, $email, $gender, $age): bool
    {
        /** @var boolean $sql */
        $sql = "INSERT INTO `crud` (firstname, lastname, email, gender, age) VALUES ('$fname', '$lname', '$email', '$gender', '$age')";
		$res = mysqli_query($this->connection, $sql);
		if ($res) {
			return true;
		} else {
			return false;
		}
	}

    /**
     * @param $id
     * @return bool|mysqli_result
     */
    public function read($id = null): mysqli_result
    {
		$sql = "SELECT * FROM `crud`";
		if ($id) {
			$sql .= " WHERE id=$id";
		}
        return mysqli_query($this->connection, $sql);
	}

	public function update($fname, $lname, $email, $gender, $age, $id): bool
    {
		$sql = "UPDATE `crud` SET firstname='$fname', lastname='$lname', email='$email', gender='$gender', age='$age' WHERE id=$id";
		$res = mysqli_query($this->connection, $sql);
		if ($res) {
			return true;
		} else {
			return false;
		}
	}

	public function delete($id): bool
    {
        /** @var boolean $sql */
        $sql = "DELETE FROM `crud` WHERE id=$id";
		$res = mysqli_query($this->connection, $sql);
		if ($res) {
			return true;
		} else {
			return false;
		}
	}

	public function sanitize($var): string
    {
        return mysqli_real_escape_string($this->connection, $var);
	}
}


