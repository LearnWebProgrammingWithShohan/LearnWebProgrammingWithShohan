<?php 



    require_once 'database.php';
    require_once 'session_library.php';
    
    class Auth{

        private $db='';
        public $s;
       
        public function __construct(){

            $this->db = new DB();

        }

     

        public function registration($data){


            // print_r($data);

            $name        = $data['name'];
  
            $email       = $data['email'];      

             $role       = $data['role'];         
               

            $password    = md5($data['password']);

            $sql = "INSERT INTO user(name,email,password,role) VALUES(:name,:email,:password,:role)";
            $query  = $this->db->pdo->prepare($sql);
            $query->bindValue(':name',$name);

            $query->bindValue(':email',$email);
            $query->bindValue(':password',$password);
             $query->bindValue(':role',$role);
      
            $result =  $query->execute();

            if($result){
                $msg = "<h2 style='color:green'><strong>Success!</strong>  Registration Succesfully!</h2>";
                return $msg;
            }else{
                $msg = "<h2 style='color:green''><strong>Error!</strong> Registration Failed !</h2>";
                return $msg;
            }


            


        }

        public function login($data){



  
            $email       = $data['email'];            
               

            $password    = md5($data['password']);

         
            $sql = "SELECT * FROM user WHERE email = :email AND password = :password LIMIT 1";
            $query  = $this->db->pdo->prepare($sql);
            $query->bindValue(':email',$email);
            $query->bindValue(':password',$password);
           
            $query->execute();

            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
    
        }

        public function setUser($data){


            // print_r($data);

            $this->s = new Session();

            $this->s->session_start();

            $this->s->set_session_variable('name',$data->name);
            $this->s->set_session_variable('email',$data->email);
            $this->s->set_session_variable('role',$data->role);

        }


        public function logout(){
            

                $this->s = new Session();
                $this->s = session_destroy();
                

        }
    }


?>