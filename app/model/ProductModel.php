<?php

namespace app\model;

require_once '../app/core/Model.php';

use app\core\Model;


class ProductModel
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
        $sql = 'INSERT INTO user_table (`name_user`, `emailUser`, `passUser`) VALUES (:nome, :email, :pass)';

        $params = [
            ':nome'  => $params->nameUser,
            ':email' => $params->emailUser,
            ':pass'  => $params->passUser
        ];

        if (!$this->pdo->executeNonQuery($sql, $params)){return -1; }
            		
        return $this->pdo->end();
    }

    /**
     * Atualiza um registro na base de dados através do ID do produto
     *
     * @param  Object $params Lista com os parâmetros a serem inseridos
     * @return bool True em caso de sucesso e false em caso de erro
     */
    public function update($params)
    {
        $sql = 'UPDATE user_table SET nameUser = :nome, emailUser = :email, passUser = :pass WHERE idUser = :id';

        $params = [
            ':id'    => $params->id,
            ':nome'  => $params->nameUser,
            ':email' => $params->emailUser,
            ':pass'  => $params->passUser
        ];

        return $this->pdo->executeNonQuery($sql, $params);
    }

    /**
     * Retorna todos os registros da base de dados em ordem ascendente por nome
     *
     * @return arra[object]
     */
    public function getAll()
    {
        //Excrevemos a consulta SQL e atribuimos a váriavel $sql
        $sql = 'SELECT * FROM user_table ORDER BY idUser ASC';

        //Executamos a consulta chamando o método da modelo. Atribuimos o resultado a variável $dr
        $dt = $this->pdo->executeQuery($sql);

        //Declara uma lista inicialmente nula
        $ListaUser;

        //Percorremos todas as linhas do resultado da busca
        foreach ($dt as $dr)
            //Atribuimos a última posição do array o produto devidamente tratado
            $ListaUser[] = $this->collection($dr);

        //Retornamos a lista de produtos
        return $ListaUser;
    }

    /**
     * Retorna um único registro da base de dados através do ID informado
     *
     * @param  int $id ID do objeto a ser retornado
     * @return object Retorna um objeto populado com os dados do produto ou se não encontrar com seus valores nulos
     */
    public function getById( $id)
    {
        $sql = 'SELECT emailUser, passUser FROM user_table WHERE idUser = :id';

        $param = [
            ':id' => $idUser
        ];

        $dr = $this->pdo->executeQueryOneRow($sql, $param);

        return $this->collection($dr);
    }

    //Pesquisa por email

    public function getByEmail($emailUser)
    {
        $sql = "SELECT * FROM user_table WHERE emailUser = '$emailUser'";

        $param = [
            ':email' => $emailUser,
        ];

        $dr = $this->pdo->executeQueryOneRow($sql, $param);

        return $this->collection($dr);
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
            'id'       => $param['idUser']   ,
            'nome'     => $param['nameUser'] ,
            'email'    => $param['emailUser'],
            'pass'     => $param['passUser'] 
        ];
    }
}
