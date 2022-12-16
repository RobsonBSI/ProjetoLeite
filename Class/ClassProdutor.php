<?php

class ClassProdutor
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
    public function BuscarDadosProdutor(){
        $resposta=array();
        $comando=$this->conexao->query("select * from produtor where data_aprovacao is null");
        $resposta= $comando->fetchAll(PDO::FETCH_ASSOC);
        return  $resposta;
    }
    public function ExcluirProdutor($id)
      {
        $comando= $this->conexao->prepare("DELETE FROM produtor  WHERE id=:id");
        $comando->bindValue(":id",$id);
        $comando->execute();

     }
    public function CadastrarProdutor( $produtor, $site,$instagram,$cep,$logradouro,$numero,$complemento,$cidade,$estado,$longitude,$latitude,$turismoRural,$vendaFazenda,$vendaSite,$telefone,$dataCadastro){

        $comando =$this->conexao->prepare('INSERT INTO produtor(nome,site,instagran,cep,logradouro,numero,complemento,cidade,estado,longitude,latitude,turismo,fazenda,online,telefone,cadastro) VALUES(:n,:s,:i,:cep,:lo,:nu,:co,:ci,:es,:logi,:lat,:tu,:vf,:vo,:tel,:dataC)');
        $comando ->bindValue(':n', $produtor);
        $comando->bindValue(':s',  $site);
        $comando->bindValue(':i', $instagram);
        $comando->bindValue(':cep', $cep);
        $comando ->bindValue(':lo',$logradouro);
        $comando->bindValue(':nu',   $numero	);
        $comando->bindValue(':co',  $complemento);
        $comando->bindValue(':ci', $cidade);
        $comando ->bindValue(':es', $estado);
        $comando->bindValue(':logi',$longitude);
        $comando ->bindValue(':lat',$latitude	);
        $comando ->bindValue(':tu',  $turismoRural);
        $comando ->bindValue(':vf', $vendaFazenda);
        $comando->bindValue(':vo', $vendaSite);
        $comando->bindValue(':tel',$telefone);
        $comando->bindValue(':dataC',$dataCadastro);
        $comando ->execute();
        $resposta = $this->conexao->lastInsertId();
        echo $resposta;
        return  $resposta;
    }
    public function AprovacaoP($id,$data){
        $comando=$this->conexao->prepare("UPDATE produtor SET data_aprovacao= :d WHERE id =:id");
        $comando ->bindValue(":id",$id);
        $comando ->bindValue(":d",$data);
        $comando ->execute();
    }
    public function BuscarAprovacaoP(){
        $resposta=array();
        $comando=$this->conexao->query("select * from produtor where data_aprovacao is not null");
        $resposta=$comando->fetchAll(PDO::FETCH_ASSOC);
        return $resposta;
    }
    public function BuscarDadosProdutorIndividual($id)
    {
        $resposta = array();
        $comando = $this->conexao->prepare("select * from produtor  WHERE id =:id");
        $comando ->bindValue(":id",$id);
        $comando ->execute();
        $resposta = $comando->fetch(PDO::FETCH_ASSOC);
        return $resposta;
    }

    public function atualizarProdutor($id,$produtor,$site,$instagram,$cep,$logradouro,$numero,$complemento,$cidade,$estado,$longitude,$latitude,$turismoRural,$vendaFazenda,$vendaSite,$telefone){

        $comando= $this->conexao->prepare("UPDATE produtor SET nome=:nome,site=:site,instagran=:inst,cep=:cep,logradouro=:logradouro,numero=:numero,complemento=:complemento,cidade=:cidade,estado=:estado,latitude=:latitude,longitude=:longitude,turismo=:tu,fazenda=:vf,online=:vo,telefone=:telefone WHERE id =:id");
        $comando ->bindValue(':id',$id);
        $comando ->bindValue(':nome',$produtor);
        $comando ->bindValue(':site',$site);
        $comando ->bindValue(':inst',$instagram);

        $comando ->bindValue(':cep',$cep);
        $comando ->bindValue(':logradouro',$logradouro);
        $comando ->bindValue(':numero',$numero);
        $comando ->bindValue(':complemento',$complemento);
        $comando ->bindValue(':cidade',$cidade);
        $comando ->bindValue(':estado',$estado);
        $comando ->bindValue(':latitude',$latitude);
        $comando ->bindValue(':longitude',$longitude);
        $comando ->bindValue(':tu',  $turismoRural);
        $comando ->bindValue(':vf', $vendaFazenda);
        $comando->bindValue(':vo', $vendaSite);
        $comando ->bindValue(':telefone',$telefone);

        $comando ->execute();
    }

}