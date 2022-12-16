<?php

    class ClassProduto
    {
        private $conexao;

        public function __construct($hostname, $database, $username, $password)
        {
            try {
                $this->conexao = new PDO("pgsql:host=" . $hostname . ";dbname=" . $database, $username, $password);
            } catch (PDOException $e) {
                echo "erro no banco de dados" . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro " . $e->getMessage();
            }

        }

        public function BuscarProduto()
        {
            $resposta = array();
            $comando = $this->conexao->query("select * from produto order by produto");
            $resposta = $comando->fetchAll(PDO::FETCH_ASSOC);
            return $resposta;
        }

        public function CadastrarProduto($dados)
        {
            $comando = $this->conexao->prepare("INSERT INTO produto(produto) values (:p)");
            $comando->bindValue(":p", $dados);
            $comando->execute();

        }

        public function ExcluirProduto($id)
        {
            $comando = $this->conexao->prepare("DELETE FROM produto  WHERE id=:id");
            $comando->bindValue(":id", $id);
            $comando->execute();

        }

        public function AlteraProduto($id, $a)
        {
            $comando = $this->conexao->prepare("UPDATE produto SET produto =:p WHERE id =:id");
            $comando->bindValue(":p", $a);
            $comando->bindValue(":id", $id);
            $comando->execute();

        }

        public function BuscarElemento($id)
        {
            $resposta = array();
            $comando = $this->conexao->prepare("select * from produto WHERE id =:id ");
            $comando->bindValue(":id", $id);
            $comando->execute();
            $resposta = $comando->fetch(PDO::FETCH_ASSOC);
            return $resposta;

        }
    }