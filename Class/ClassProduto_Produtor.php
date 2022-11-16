<?php

    class ClassProduto_Produtor
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
        public function CadastrarPP($produto,$produtor){
            $comando=$this->conexao->prepare("INSERT INTO produto_produtor(produto,produtor) values (:p,:pro)");
            $comando->bindValue(":p",$produto);
            $comando->bindValue(":pro",$produtor);
            $comando->execute();

        }
        public function BuscarPP($id){

            $resposta=array();
            $comando=$this->conexao->prepare("SELECT * FROM produto_Produtor p INNER JOIN produto t ON t.id = p.produto WHERE p.produtor =:id ");
            $comando->bindValue(":id",$id);
            $comando->execute();
            $resposta= $comando->fetchAll(PDO::FETCH_ASSOC);
            return  $resposta;

        }
    }