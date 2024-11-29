<?php

namespace Models;

use Models\BasePDODAO;

class OriginDAO extends BasePDODAO
{

    public function getAll(): array {
        $sql = 'SELECT * FROM ORIGIN';
        $response = $this->execRequest($sql)->fetchAll();

        return array_map(fn($origin) => new Origin($origin), $response);
    }

    public function getByID(int $id): Origin {
        $sql = 'SELECT * FROM ORIGIN WHERE ID = :id';
        $response = $this->execRequest($sql, ['id' => $id])->fetch();

        return new Origin($response);
    }

    public function create(Origin $origin): Origin {
        $sql = 'INSERT INTO ORIGIN (NAME, URL_IMG) VALUES (:name, :url_img)';
        $this->execRequest($sql, ['name' => $origin->getName(), 'url_img' => $origin->getUrlImg()]);

        return $origin;
    }

    public function delete(int $id): int {
        $sql = 'DELETE FROM ORIGIN WHERE ID = :id';
        return $this->execRequest($sql, ['id' => $id])->rowCount();
    }

    public function edit(Origin $origin) {
        $sql = 'UPDATE ORIGIN SET NAME = :name, URL_IMG = :url_img WHERE ID = :id';
        $this->execRequest($sql, ['name' => $origin->getName(), 'url_img' => $origin->getUrlImg(), 'id' => $origin->getId()]);
    }

    public function getOriginsForUnit(string $unitId) : array {
        $sql = 'SELECT O.* FROM ORIGIN O JOIN UNITORIGIN UO ON O.ID = UO.id_origin WHERE UO.id_unit = :unitId';
        $response = $this->execRequest($sql, ['unitId' => $unitId])->fetchAll();

        return array_map(fn($origin) => new Origin($origin), $response);
    }

    public function updateOrigins(string $unitId, array $origins): void
    {
        $sql = 'DELETE FROM UNITORIGIN WHERE id_unit = :id';
        $this->execRequest($sql, ['id' => $unitId]);

        $sql = 'INSERT INTO UNITORIGIN (id_unit, id_origin) VALUES (:id_unit, :id_origin)';
        foreach ($origins as $origin) {
            $this->execRequest($sql, ['id_unit' => $unitId, 'id_origin' => $origin]);
        }
    }
}