<?php

namespace app\model;

require_once '../app/core/Model.php';

use app\core\Model;


class PerifericoModel
{

    //Instância da classe model
    private $pdo;

    /**
     * Método construtor
     *
     * @return void
     */
    public function __construct()
    {
        $this->pdo = new Model();
    }

    /**
     * Insere la
     *
     * @param  
     * @return 
     */
    public function insert(object $params)
    {

        $sql = 'INSERT INTO perifericos (`id`, `name`, `description`, `urlImg`, `MachineId`) VALUES (NULL, :nome, :descricao, :URLImg, :IDMAchine)';

        $param = [
            ':nome'       => $params->nome,
            ':descricao'  => $params->descricao,
            ':URLImg'     => $params->URLImg,
            ':IDMAchine'  => $params->IDMachine
        ];

        if (!$this->pdo->executeNonQuery($sql, $param)){return -1; }
            		
        return true;
    }

    /**
     * Atualiza um registro na base de dados através do ID do produto
     *
     * @param  Object $params Lista com os parâmetros a serem inseridos
     * @return bool True em caso de sucesso e false em caso de erro
     */
    public function update($params)
    {
        $sql = 'UPDATE perifericos 
            SET name = :nome, description = :descricao, urlImg = :URLImg, MachineId = :IDMAchine 
            WHERE id = :id';

        $param = [
            ':id'         => $params->id,
            ':nome'       => $params->nome,
            ':descricao'  => $params->descricao,
            ':URLImg'     => $params->URLImg,
            ':IDMAchine'  => $params->IDMachine
        ];

        return $this->pdo->executeNonQuery($sql, $param);
    }

    /**
     * Deleta id escolhido
     *
     * @return int
     */

    public function delete($params)
    {
        $sql = 'DELETE FROM perifericos WHERE id = :id';

        $param = [
            ':id' => $params
        ];

        return $this->pdo->executeNonQuery($sql, $param);
    }

    /**
     * Retorna todos os registros da base de dados em ordem ascendente por nome
     *
     * @return arra[object]
     */
    public function getAll()
    {
        //Excrevemos a consulta SQL e atribuimos a váriavel $sql
        $sql = 'SELECT * FROM perifericos ORDER BY id ASC';

        //Executamos a consulta chamando o método da modelo. Atribuimos o resultado a variável $dr
        $dt = $this->pdo->executeQuery($sql);

        //Declara uma lista inicialmente nula
        $ListaPeriferico;

        //Percorremos todas as linhas do resultado da busca
        foreach ($dt as $dr)
            //Atribuimos a última posição do array o produto devidamente tratado
            $ListaPeriferico[] = $this->collection($dr);

        //Retornamos a lista de produtos
        return $ListaPeriferico;
    }

    /**
     * Retorna um único registro da base de dados através do ID informado
     *
     * @param  int $id ID do objeto a ser retornado
     * @return object Retorna um objeto populado com os dados do produto ou se não encontrar com seus valores nulos
     */
    public function getById( $id)
    {
        $sql = 'SELECT * FROM perifericos WHERE idUser = :id';

        $param = [
            ':id' => $idUser
        ];

        $dr = $this->pdo->executeNonQuery($sql, $param);

        return $this->collection($dr);
    }

    //Pesquisa por email

    public function getMachineId($idMachine)
    {
        $sql = "SELECT * FROM perifericos WHERE MachineId = :idMachine";

        $param = [
            ':idMachine' => $idMachine
        ];

        return $dr = $this->pdo->executeQuery($sql, $param);

    }

    /**
     * Converte uma estrutura de array vinda da base de dados em um objeto devidamente tratado
     *
     * @param  array|object $param Revebe o parâmetro que é retornado na consulta com a base de dados
     * @return object Retorna um objeto devidamente tratado com a estrutura de produtos
     */

    private function collection($param)
    {

        return [
            'id'         => $param['id'],
            'nome'       => $param['name'],
            'descricao'  => $param['description'],
            'URLImg'     => $param['urlImg'],
            'IDMAchine'  => $param['MachineId']
        ];
    }
}
