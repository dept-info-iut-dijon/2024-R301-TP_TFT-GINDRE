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

        $units = [];
        foreach ($response as $responseRow) {
            $unit = new Unit();
            $unit->setId($responseRow['id']);
            $unit->setName($responseRow['name']);
            $unit->setCost($responseRow['cost']);
            $unit->setOrigin($responseRow['origin']);
            $unit->setUrlImg($responseRow['url_img']);
            $units[] = $unit;
        }

        return $units;
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
            $unit->setOrigin($response['origin']);
            $unit->setUrlImg($response['url_img']);
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
}
