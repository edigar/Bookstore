<?php

namespace Bookstore\Model;

class CategoriaService {
    /**
     * @var CategoriaTable
     */
    protected $categoriaTable;

    public function __construct(categoriaTable $table) {
        $this->categoriaTable = $table;
    }

    public function fetchAll() {
        $resultSet = $this->categoriaTable->select();
        return $resultSet;
    }
} 