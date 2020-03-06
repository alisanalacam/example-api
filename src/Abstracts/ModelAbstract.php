<?php
namespace App\Abstracts;

abstract class ModelAbstract
{
    /**
     * @var string|null
     */
    protected $connection;

    /**
     * @var string
     */
    protected $table;

    /**
     * @var
     */
    protected $data;

    public function all()
    {
        $this->getData();
    }

    public function toArray()
    {
        $this->setData((array) $this->getData());
    }

    /**
     * @return string|null
     */
    public function getConnection(): string
    {
        return $this->connection;
    }

    /**
     * @param string|null $connection
     */
    public function setConnection(string $connection)
    {
        $this->connection=$connection;
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @param string $table
     */
    public function setTable(string $table)
    {
        $this->table=$table;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data=$data;
    }

}