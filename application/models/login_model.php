<?php
Class Login_model extends CI_Model
{
 function login($email, $senha)
 {
   $this -> db -> select('idusuario, email, senha');
   $this -> db -> from('tbl_usuario');
   $this -> db -> where('email', $email);
   $this -> db -> where('senha', $senha);
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>