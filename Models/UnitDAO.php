<?php

namespace Models;

class UnitDAO extends BasePDODAO
{
    /**
     * Récupère toutes les unités
     * @return Unit[] Les unités
     */
    public function getAll() : array
    {
        $sql = 'SELECT * FROM UNIT';
        $response = $this->execRequest($sql)->fetchAll();

        return $this->mapUnits($response);
    }

    /**
     * Récupère une unité par son ID
     * @param string $idUnit L'ID de l'unité
     * @return Unit|null L'unité ou null si non trouvée
     */
    public function getByID(string $idUnit) : ?Unit {
        $sql = 'SELECT * FROM UNIT WHERE ID = :id';
        $response = $this->execRequest($sql, ['id' => $idUnit])->fetch();

        if ($response === false) {
            $result = null;
        } else {
            $unit = new Unit();
            $unit->setId($response['id']);
            $unit->setName($response['name']);
            $unit->setCost($response['cost']);
            $unit->setUrlImg($response['url_img']);

            $originDAO = new OriginDAO();
            $unit->setOrigin($originDAO->getOriginsForUnit($response['id']));

            $result = $unit;
        }

        return $result;
    }

    /**
     * Récupère les noms des colonnes de la table UNIT
     * @return array Les noms des colonnes
     */
    public function getColumnNames() : array {
        $sql = 'SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = "UNIT"';
        $response = $this->execRequest($sql)->fetchAll();

        $columnNames = [];
        foreach ($response as $responseRow) {
            $columnNames[] = $responseRow['COLUMN_NAME'];
        }

        return $columnNames;
    }

    public function addUnit(Unit $unit) : void {
        $unit->setId(uniqid());

        $sql = 'INSERT INTO UNIT (id, name, cost, url_img) VALUES (:id, :name, :cost, :url_img)';
        $this->execRequest($sql, [
            'id' => $unit->getId(),
            'name' => $unit->getName(),
            'cost' => $unit->getCost(),
            'url_img' => $unit->getUrlImg()
        ]);
    }

    public function deleteUnit(string $id) : int {
        $sql = 'DELETE FROM UNIT WHERE ID = :id';
        return $this->execRequest($sql, ['id' => $id])->rowCount();
    }

    public function updateUnit(Unit $unit): void
    {
        $sql = 'UPDATE UNIT SET name = :name, cost = :cost, url_img = :url_img WHERE id = :id';
        $this->execRequest($sql, [
            'id' => $unit->getId(),
            'name' => $unit->getName(),
            'cost' => $unit->getCost(),
            'url_img' => $unit->getUrlImg()
        ]);
    }

    public function addUnitOrigin(Unit $unit, int $originId): void
    {
        $sql = 'DELETE FROM UNITORIGIN WHERE id_unit = :id_unit AND id_origin = :id_origin';
        $this->execRequest($sql, ['id_unit' => $unit->getId(), 'id_origin' => $originId]);

        $sql = 'INSERT INTO UNITORIGIN (id_unit, id_origin) VALUES (:id_unit, :id_origin)';
        $this->execRequest($sql, [
            'id_unit' => $unit->getId(),
            'id_origin' => $originId
        ]);
    }

    public function search(string $search, string $column): array
    {
        if ($column === 'origin') {
            $sql = 'SELECT U.* FROM UNIT U JOIN UNITORIGIN UO ON U.ID = UO.id_unit JOIN ORIGIN O ON O.ID = UO.id_origin WHERE O.NAME LIKE :search';
        } else {
            $sql = 'SELECT * FROM UNIT WHERE ' . $column . ' LIKE :search';
        }

        $response = $this->execRequest($sql, ['search' => '%' . $search . '%'])->fetchAll();

        return $this->mapUnits($response);
    }

    /**
     * @param array $response
     * @return Unit[]
     */
    private function mapUnits(array $response): array
    {
        return array_map(function ($unitRes) {
            $unit = new Unit();
            $unit->setId($unitRes['id']);
            $unit->setName($unitRes['name']);
            $unit->setCost($unitRes['cost']);
            $unit->setUrlImg($unitRes['url_img']);

            $originDAO = new OriginDAO();
            $unit->setOrigin($originDAO->getOriginsForUnit($unitRes['id']));

            return $unit;
        }, $response);
    }
}
