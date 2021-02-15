
<?php




    class Consignment{

        protected static $table = "users";
        protected static $shipment_table = "shipment";
        public $username;
        public $email;
        public $password;
        public $user_id;
        public static $id;


        public static function generate_username($name){
            $myRand = mt_rand(99, 9999999);
            $myRand = substr($myRand, 0, 5);
            $user_id = $name.$myRand;
            return $user_id;
        }

        //////// Register Users/////
        public function RegisterUser($data){
            global $database;

            $username = self::generate_username($data['fname']);
            $password = password_hash($data['password'], PASSWORD_DEFAULT);
         
            $sql = "INSERT INTO " . static::$table ." (user_id, first_name, last_name, email, password, phone) ";
            $sql .= "VALUES( '";
            $sql .= $database->escape_string($username) . "', '";
            $sql .= $database->escape_string($data['fname']) . "', '";
            $sql .= $database->escape_string($data['lname']) . "', '";
            $sql .= $database->escape_string($data['email']) . "', '";
            $sql .= $database->escape_string($password) . "', '";
            $sql .= $database->escape_string($data['phone']) . "')";
            
            if($database->query($sql)){
               // self::$id = $database->the_insert_id();
                return true;
            }else{
                return false;
            }



        }


       

        public static function verify_email($email){
            global $database;
            $email = $database->escape_string($email);
            $sql = "SELECT * FROM " . self::$table ." WHERE ";
            $sql .= "email = '{$email}' ";
            $sql .= "LIMIT 1";
           
            $result = self::find_this_query($sql);
            return $result;
        }


        private static function find_this_query($sql){
            global $database;
            $result_row = [];
            $result = $database->query($sql);
            while($row = mysqli_fetch_array($result)){
                $result_row = $row;
            }
            return $result_row;
        }


        public function verify_user($data){
            global $database;

            $email = $database->escape_string($data['email']);
            $sql = "SELECT * FROM " . self::$table ." WHERE ";
            $sql .= "email = '{$email}' ";
            $sql .= "LIMIT 1";
           
            $result = self::find_this_query($sql);
            return $result;

        }

        public function get_all_details_by_user_id($user_id){
            global $database;

            $email = $database->escape_string($user_id);
            $sql = "SELECT * FROM " . self::$table ." WHERE ";
            $sql .= "user_id = '{$user_id}' ";
            $sql .= "LIMIT 1";
           
            $result = self::find_this_query($sql);
            return $result;
        }



        public function get_approved_shipping($user_id){
            global $database;

            $user_id = $database->escape_string($user_id);
            $sql = "SELECT * FROM " . self::$shipment_table ." WHERE status = 'approved'";
            $sql .= " AND user_id = '{$user_id}'";
          
            $result = $database->query($sql);
            return $result;
        }



        public function get_recent_booking(){

        }


        public function get_booking_details($booking){
            global $database;

            $booking = $database->escape_string($booking);
            $sql = "SELECT * FROM " . self::$shipment_table ." WHERE ";
            $sql .= "booking_no = '{$booking}' ";
            $sql .= "LIMIT 1";
           
            $result = self::find_this_query($sql);
            return $result;

        }


        public function admin_cancel_booking($booking){
            global $database;

            $sql = "UPDATE " . self::$shipment_table ." SET ";
            $sql .= "status = 'cancelled', ";
            $sql .= "cancelled_by = 'admin' ";
            $sql .= "WHERE booking_no = '" . $database->escape_string($booking). "'";

            $database->query($sql);
            return (mysqli_affected_rows($database->connection) == 1) ? true : false;

        }


        public function get_cancelled_shipping($user_id){
            global $database;

            $user_id = $database->escape_string($user_id);
            $sql = "SELECT * FROM " . self::$shipment_table ." WHERE status = 'cancelled'";
            $sql .= " AND user_id = '{$user_id}'";
          
            $result = $database->query($sql);
            return $result;
        }

        public function get_unapproved_shipping($user_id){
            global $database;

            $user_id = $database->escape_string($user_id);
            $sql = "SELECT * FROM " . self::$shipment_table ." WHERE status = 'unapproved'";
            $sql .= " AND user_id = '{$user_id}'";
          
            $result = $database->query($sql);
            return $result;
        }


        public function store_booking($data){
            global $database;

            $booking_no = "RCC2390" .$_SESSION['user_id'].mt_rand(90, 9999999);
            $email = $data['email'];
            $name = $data['name'];
            $phone = $data['phone'];
            $origin = $data['origin'];
            $destination = $data['destination'];
            $service = $data['service'];
            $weight = $data['weight'];
            $height = $data['height'];
            $length = $data['length'];
            $width = $data['width'];
            $subject = $data['subject'];
            $status = 'unapproved';
            $date = time();
            $id = $_SESSION['user_id'];

            $sql = "INSERT INTO " . static::$shipment_table ." (user_id, booking_no, email, full_name, phone, origin, destination, service, weight, height, length, width, subject, status, date_of_booking) ";
            $sql .= "VALUES( '";
            $sql .= $database->escape_string($id) . "', '";
            $sql .= $database->escape_string($booking_no) . "', '";
            $sql .= $database->escape_string($email) . "', '";
            $sql .= $database->escape_string($name) . "', '";
            $sql .= $database->escape_string($phone) . "', '";
            $sql .= $database->escape_string($origin) . "', '";
            $sql .= $database->escape_string($destination) . "', '";
            $sql .= $database->escape_string($service) . "', '";
            $sql .= $database->escape_string($weight) . "', '";
            $sql .= $database->escape_string($height) . "', '";
            $sql .= $database->escape_string($length) . "', '";
            $sql .= $database->escape_string($width) . "', '";
            $sql .= $database->escape_string($subject) . "', '";
            $sql .= $database->escape_string($status) . "', '";
            $sql .= $database->escape_string($date) . "')";
            
            if($database->query($sql)){
                $res = ['success' => true, 'booking' => $booking_no];
                return $res;
             
               // self::$id = $database->the_insert_id();
               
            }else{
                return false;
            }

           // return $sql;



        }



        public function admin_get_recent_booking(){
            global $database;

            $sql = "SELECT * FROM " . self::$shipment_table ." ORDER BY id DESC";
            $result = $database->query($sql);
            return $result;
        }

        public function admin_get_approved_booking(){
            global $database;
            $sql = "SELECT * FROM " . self::$shipment_table ." WHERE status = 'approved'";
          
            $result = $database->query($sql);
            return $result;
        }

        public function admin_get_unapproved_booking(){
            global $database;
            $sql = "SELECT * FROM " . self::$shipment_table ." WHERE status = 'unapproved'";
          
            $result = $database->query($sql);
            return $result;
        }

        public function admin_get_cancelled_booking(){
            global $database;
            $sql = "SELECT * FROM " . self::$shipment_table ." WHERE status = 'cancelled'";
          
            $result = $database->query($sql);
            return $result;
        }


        
        public function admin_get_all_users(){
            global $database;
            $sql = "SELECT * FROM " . self::$table;
          
            $result = $database->query($sql);
            return $result;
        }

        



    
    
    
        public function instantation($the_record){
           // $calling_class = get_called_class();
            $the_object = new self;
            foreach ($the_record as $property => $value) {
                if($the_object->has_property($property)){
                    $the_object->$property = $value;
                }
            }
            return $the_object;
        }
    
    
        private function has_property($property){
            $object_property = get_object_vars($this);
            return array_key_exists($property, $object_property);
        }
    




    }


