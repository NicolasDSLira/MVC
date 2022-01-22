<?php

namespace app\model;

require_once '../app/core/Model.php';

use app\core\Model;


class MachineModel
{

    //Instância da classe model
    private $pdo;

    // Instancia das variaveis privadas
    private $id;
    private $name;
    private $desc;
    private $URLImg;
    private $USERId;

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
    public function insert($params)
    {
        $sql = 'INSERT INTO machine (`id`, `name`, `description`, `urlImg`, `UserId`) VALUES (:id ,:nome , :description , :urlImg , :IdUser)';


        dd($this->pdo->executeNonQuery($sql, $params));

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
        $sql = 'SELECT * FROM machine ORDER BY id ASC';

        //Executamos a consulta chamando o método da modelo. Atribuimos o resultado a variável $dr
        $dt = $this->pdo->executeQuery($sql);

        //Declara uma lista inicialmente nula
        $ListaMachine;

        //Percorremos todas as linhas do resultado da busca
        foreach ($dt as $dr)
            //Atribuimos a última posição do array o produto devidamente tratado
            $ListaMachine[] = $this->collection($dr);

        //Retornamos a lista de produtos
        return $ListaMachine;
    }

    /**
     * Retorna todos os registros da base de dados por meio do UserID
     *
     * @return arra[object]
     */
    public function getUserId($id)
    {
        //Excrevemos a consulta SQL e atribuimos a váriavel $sql
        $sql = 'SELECT * FROM machine WHERE UserId = '.$id;

        //Executamos a consulta chamando o método da modelo. Atribuimos o resultado a variável $dr
        $dt = $this->pdo->executeQuery($sql);

        //Declara uma lista inicialmente nula
        $ListaUser;

        //Percorremos todas as linhas do resultado da busca
        foreach ($dt as $dr)
            //Atribuimos a última posição do array o produto devidamente tratado
            $ListMachine[] = $this->collection($dr);

        //Retornamos a lista de produtos
        return $ListMachine;
    }

    /**
     * Retorna um único registro da base de dados através do ID informado
     *
     * @param  int $id ID do objeto a ser retornado
     * @return object Retorna um objeto populado com os dados do produto ou se não encontrar com seus valores nulos
     */
    public function getById($id)
    {
        $sql = 'SELECT * FROM machine WHERE id = '.$id;

        $param = [
            ':id' => $id
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
            'id'       => $param['id']   ,
            'nome'     => $param['name'] ,
            'desc'    => $param['description'],
            'url'     => $param['urlImg'],
            'UserID'     => $param['UserId'],
        ];
    }
}
