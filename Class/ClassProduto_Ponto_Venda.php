<?php

    class ClassProduto_Ponto_Venda
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
        public function CadastrarPPV($produto,$venda){
            $comando=$this->conexao->prepare("INSERT INTO produto_venda(produtovenda,venda) values (:p,:v)");
            $comando->bindValue(":p",$produto);
            $comando->bindValue(":v",$venda);
            $comando->execute();

        }
        public function BuscarComercioProduto($id){

            $resposta=array();
            $comando=$this->conexao->prepare("SELECT p.*, t.produto FROM produto_venda p INNER JOIN produto t ON t.id =p.produtovenda  WHERE p.venda=:id ");
            $comando->bindValue(":id",$id);
            $comando->execute();
            $resposta= $comando->fetchAll(PDO::FETCH_ASSOC);
            return  $resposta;

        }

    }