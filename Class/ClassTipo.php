<?php

class ClassTipo
{
    private $conexao;
    public function __construct($hostname,$database,$username,$password)
    {
        try {
            $this->conexao = new PDO("pgsql:host=".$hostname.";dbname=".$database, $username, $password);
        }catch (PDOException $e){
            echo "erro no banco de dados".$e->getMessage();
        }
        catch (Exception $e){
            echo "Erro ".$e->getMessage();
        }

    }
    public function BuscarTiposDados(){
        $resposta=array();
        $comando=$this->conexao->query("select * from tipo order by id");
        $resposta= $comando->fetchAll(PDO::FETCH_ASSOC);
        return  $resposta;
    }
    public function CadastrarTipo($dados){
        $comando=$this->conexao->prepare("INSERT INTO tipo(venda) values (:t)");
        $comando->bindValue(":t",$dados);
        $comando->execute();


    }
    public function ExcluirTipo($id)
    {
        $comando= $this->conexao->prepare("DELETE FROM tipo  WHERE id=:id");
        $comando->bindValue(":id",$id);
        $comando->execute();

    }
    public function AlteraTipo($id,$a)
    {
        $comando= $this->conexao->prepare("UPDATE tipo SET venda =:at WHERE id =:id");
        $comando->bindValue(":at",$a);
        $comando->bindValue(":id",$id);
        $comando->execute();

    }
    public function BuscarTipo($id){
        $resposta=array();
        $comando=$this->conexao->prepare("select * from tipo WHERE id =:id ");
        $comando->bindValue(":id",$id);
        $comando->execute();
        $resposta= $comando->fetch(PDO::FETCH_ASSOC);
        return  $resposta;

    }

}