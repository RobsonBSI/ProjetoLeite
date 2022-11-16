<?php

    class ClassComercio_Produtor
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
        public function CadastrarCP($pontovenda,$outro){
            $comando=$this->conexao->prepare("INSERT INTO produtor_ponto_venda(pontovenda,outro) values (:pv,:o)");
            $comando->bindValue(":pv",$pontovenda);
            $comando->bindValue(":o",$outro);
            $comando->execute();

        }
        public function ExcluirComercioProdutor($id)
        {
            $comando= $this->conexao->prepare("DELETE FROM produtor_ponto_venda  WHERE id=:id");
            $comando->bindValue(":id",$id);
            $comando->execute();

        }
        public function AlteraComercioProdutor($id,$a)
        {
            $comando= $this->conexao->prepare("UPDATE produtor_ponto_venda SET venda =:at WHERE id =:id");
            $comando->bindValue(":at",$a);
            $comando->bindValue(":id",$id);
            $comando->execute();

        }
        public function BuscarComercioProdutor($id){
            $resposta=array();
            $comando=$this->conexao->prepare("select * from produtor_ponto_venda WHERE  pontovenda =:id ");
            $comando->bindValue(":id",$id);
            $comando->execute();
            $resposta= $comando->fetchAll(PDO::FETCH_ASSOC);
            return  $resposta;

        }
    }