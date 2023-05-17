<?php

    class ClassPontoVenda
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

        public function BuscarPonto($id)
        {
            $resposta = array();
            $comando = $this->conexao->prepare("SELECT t.venda, p.* FROM pontovenda p INNER JOIN tipo t ON t.id =p.tipo_id  WHERE p.id = :id");
            $comando ->bindValue(":id",$id);
            $comando ->execute();
            $resposta = $comando->fetch(PDO::FETCH_ASSOC);
            return $resposta;
        }
        public function BuscarPontoTabela()
        {
            $resposta = array();
            $comando = $this->conexao->query("SELECT p.id,nome,cidade,estado,cadastro,t.venda FROM pontovenda p INNER JOIN tipo t ON t.id =p.tipo_id where data_aprovacao is  null");
            $resposta = $comando->fetchAll(PDO::FETCH_ASSOC);
            return $resposta;
        }


        public function CadastrarPontoVenda($nome,$inicio,$termino,$regiao,$telefone,$site,$cep,$logradouro,$numero,$complemento,$latitude,$longitude,$cidade,$estado,$tipo,$cadastro,$semana,$produtor,$email)
        {
            $comando=$this->conexao->prepare( " INSERT INTO pontovenda(nome,inicio,termino,regiao,telefone,site,cep,logradouro,numero,complemento,latitude,longitude,cidade,estado,tipo_id,cadastro,semana,produtor,email)   VALUES(:nome,:hInicio,:hTermino,:regiao,:telefone,:site,:cep,:logradouro,:numero,:complemento,:latitude,:longitude,:cidade,:estado,:tipo,:ca,:se,:prod,:email)" );
            $comando ->bindValue(':nome',$nome);
            $comando ->bindValue(':hInicio',$inicio);
            $comando ->bindValue(':hTermino',$termino);
            $comando ->bindValue(':regiao',$regiao);
            $comando ->bindValue(':telefone',$telefone);
            $comando ->bindValue(':site',$site);
            $comando ->bindValue(':cep',$cep);
            $comando ->bindValue(':logradouro',$logradouro);
            $comando ->bindValue(':numero',$numero);
            $comando ->bindValue(':complemento',$complemento);
            $comando ->bindValue(':latitude',$latitude);
            $comando ->bindValue(':longitude',$longitude);
            $comando ->bindValue(':cidade',$cidade);
            $comando ->bindValue(':estado',$estado);
            $comando ->bindValue(':tipo',$tipo);
            $comando ->bindValue(':ca',$cadastro);
            $comando ->bindValue(':se',$semana);
            $comando ->bindValue(':prod',$produtor);
            $comando ->bindValue(':email',$email);
            $comando ->execute();
            $resposta = $this->conexao->lastInsertId();
            return  $resposta;


        }
        public function ExcluirVenda($id)
        {
            $comando= $this->conexao->prepare("DELETE FROM pontovenda WHERE id=:id");
            $comando->bindValue(":id",$id);
            $comando->execute();

        }
        public function AprovacaoPV($id,$data){
            $comando=$this->conexao->prepare("UPDATE pontovenda SET data_aprovacao= :d WHERE id =:id");
            $comando ->bindValue(":id",$id);
            $comando ->bindValue(":d",$data);
            $comando ->execute();
        }
        public function BuscarAprovacao(){
            $resposta=array();
            $comando=$this->conexao->query("SELECT p.id,nome,inicio,termino,regiao,telefone,site,cep,logradouro,numero,complemento,latitude,longitude,cidade,estado,data_aprovacao,semana,produtor,email,t.venda FROM pontovenda p INNER JOIN tipo t ON t.id =p.tipo_id where data_aprovacao is not null");
            $resposta= $comando->fetchAll(PDO::FETCH_ASSOC);
            return  $resposta;
        }

        public function atualizarVenda($id,$nome,$inicio,$termino,$regiao,$telefone,$site,$cep,$logradouro,$numero,$complemento,$latitude,$longitude,$cidade,$estado,$semana,$produtor,$email){
            try {
            $comando= $this->conexao->prepare("UPDATE pontovenda SET nome=:nome,inicio=:hInicio,termino=:hTermino,regiao=:regiao,telefone=:telefone,site=:site,cep=:cep,logradouro=:logradouro,numero=:numero,complemento=:complemento,latitude=:latitude,longitude=:longitude,cidade=:cidade,estado=:estado,semana=:se,produtor=:prod,email=:email WHERE id =:id");
            $comando ->bindValue(':id',$id);
            $comando ->bindValue(':nome',$nome);
            $comando ->bindValue(':hInicio',$inicio);
            $comando ->bindValue(':hTermino',$termino);
            $comando ->bindValue(':regiao',$regiao);
            $comando ->bindValue(':telefone',$telefone);
            $comando ->bindValue(':site',$site);
            $comando ->bindValue(':cep',$cep);
            $comando ->bindValue(':logradouro',$logradouro);
            $comando ->bindValue(':numero',$numero);
            $comando ->bindValue(':complemento',$complemento);
            $comando ->bindValue(':latitude',$latitude);
            $comando ->bindValue(':longitude',$longitude);
            $comando ->bindValue(':cidade',$cidade);
            $comando ->bindValue(':estado',$estado);
            $comando ->bindValue(':se',$semana);
            $comando ->bindValue(':prod',$produtor);
            $comando ->bindValue(':email',$email);
            $comando ->execute();
        } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
        }


    }
    }