<?php 
namespace Henshall\Timezones;

class Timezones
{
    //All Possible Timzeones Generates From Mysql Tables 2019
    private $timezones_array;
    private $servername = "localhost";
    private $username = "username";
    private $password = "password";
    private $conn;
    private $local_timezone;
    
    function __construct($servername, $username, $password, $db, $local_timzone = NULL){
        require("timezonesArray.php");
        $this->timezones_array = $timezones_array;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->conn = new \mysqli($servername, $username, $password, $db);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if ($this->local_timezone == NULL) {
            $this->local_timezone = self::get_mysql_local_timezone();
        }
    }
    
    //asks mysql for the current local timezone
    public function get_mysql_local_timezone()
    {
        $sql = "SELECT @@system_time_zone;";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                return $row["@@system_time_zone"];
            }
        } else {
            throw new \Exception("Error no results - timezones probably not recognized", 1);
        }
    }
    
    public function set_local_timezone($timezone){
        $this->local_timezone = $timezone;
    }
    
    public function get_local_timezone(){
        return $this->local_timezone;
    }
    
    // uses local timezone to get current time.
    public function get_time_now($zone)
    {
        $sql = "SELECT CONVERT_TZ(now(),'" . $this->local_timezone . "','" . $zone . "')";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                
                return $row["CONVERT_TZ(now(),'$this->local_timezone','$zone')"];
            }
        } else {
            throw new \Exception("Error no results - timezones probably not recognized", 1);
        }
    }
    
    //returns an array of all timezones with their current computed time
    public function get_timezones_and_current_times(){
        $name_array = [];
        $country_and_time_array = [];
        foreach ($this->timezones_array as $zone) {
            $date_and_time = self::get_time_now($zone);
            $date_time_convert = new \DateTime($date_and_time);
            $time = $date_time_convert->format('Y-m-d H:i:s');
            array_push($name_array,$zone);
            $country_and_time_array[$zone] = $time;
        }
        return $country_and_time_array;
    }
    
}

