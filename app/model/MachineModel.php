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

    // List machine
    private $ListaMachine;

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
        $sql = 'INSERT INTO machine (`id`, `name`, `description`, `urlImg`, `UserId`) VALUES (NULL ,:nome , :description , :urlImg , :IdUser)';

        $param = [
            ':nome'        => $params->nomeMachine,
            ':description' => $params->descript,
            ':urlImg'      => $params->URLImage,
            ':IdUser'      => $params->IDUser
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
        $sql = 'UPDATE machine SET name = :nome, description = :descr, urlImg = :urlImg, UserId = :UserId WHERE UserId = :id';

        $params = [
            ':id'    => $params->id,
            ':nome'  => $params->name,
            ':descr' => $params->descr,
            ':urlImg'  => $params->urlImg,
            ':UserId'  => $params->UserId
        ];

        return $this->pdo->executeNonQuery($sql, $params);
    }

     /**
     * Deleta id escolhido
     *
     * @return int
     */

    public function delete($params)
    {
        $sql = 'DELETE FROM machine WHERE id = :id';

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
        $sql = 'SELECT * FROM machine ORDER BY id ASC';

        //Executamos a consulta chamando o método da modelo. Atribuimos o resultado a variável $dr
        $dt = $this->pdo->executeQuery($sql);

        //Percorremos todas as linhas do resultado da busca
        foreach ($dt as $dr)
            //Atribuimos a última posição do array o produto devidamente tratado
            $this->ListaMachine[] = $this->collection($dr);

        //Retornamos a lista de produtos
        return $this->ListaMachine;
    }

    /**
     * Retorna todos os registros da base de dados por meio do UserID
     *
     * @return arra[object]
     */
    public function getUserId($id)
    {
        //Excrevemos a consulta SQL e atribuimos a váriavel $sql
        $sql = 'SELECT * FROM machine WHERE UserId = :id';

        // parametros

        $param = [
            ':id' => $id
        ];

        //Executamos a consulta chamando o método da modelo. Atribuimos o resultado a variável $dr
        $dt = $this->pdo->executeQuery($sql, $param);

        if(!$dt)
            return null;


        //Percorremos todas as linhas do resultado da busca
        foreach ($dt as $dr)

            //Atribuimos a última posição do array o produto devidamente tratado
            $this->ListaMachine[] = $this->collection($dr);

        //Retornamos a lista de produtos
        return $this->ListaMachine;
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
