
<?php
include ('conexao/conexao.php');

$db = new conexao ();

class Usuario{
    private $conn;

    public function __construct($db){

        $this->conn= $db;
    }

public function cadastrar($nome, $email, $senha, $confsenha)
{
    if ($senha === $confsenha){ 

        $nomeexistente=$this->verificarnomeexistente($nome);
        if($nomeexistente){
            print"<script> alert('nome ja cadastrado')</script>";
            return false;
        }
        $emailexistente=$this->verificaremailexistente($email);
        if($emailesistente){
            print"<script> alert('Email ja cadastrado')</script>";
            return false;
        }

    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    $sql= "INSERT INTO usuarios (nome, email, senha) VALUES( ?, ?, ?)";


    $stmt = $this-> conn->prepare($sql);
    $stmt->bindValue(1, $nome);
    $stmt->bindvalue(2, $email);
    $stmt->bindValue(3, $senhaCriptografada);
    $result =$stmt->execute();

    return $result;
    
    }else{
        
    }
}

private function verificarnomeexistente($nome){
 $sql="SELECT COUNT(*) FROM usuarios WHERE nome =?";
 $stmt= $this->conn-> prepare ($sql);
 $stmt->bindParam(1,$nome);
 $stmt->execute ();

    return $stmt->fetchColumn()>0;

}
private function verificaremailexistente($email){
    $sql="SELECT COUNT(*) FROM usuarios WHERE email =?";
    $stmt= $this->conn-> prepare ($sql);
    $stmt->bindParam(1,$email);
    $stmt->execute ();
   
       return $stmt->fetchColumn()>0;
   
   }
public function logar ($nome,$senha){
    $sql= "SELECT * FROM usuarios WHERE nome = :nome";
    $stmt= $this->conn->prepare($sql);
    $stmt->bindValue(':nome', $nome);
    $stmt->execute();

    if($stmt->rowCount() == 1){
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify($senha,$usuario['senha'])){
            return true;
        }
    }

    return false;

}

}

?>