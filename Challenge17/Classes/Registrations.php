<?php

class Registrations
{
    protected static $vehicle_model;
    protected static $vehicle_type;
    protected static $vehicle_chassis_number;
    protected static $vehicle_production_year;
    protected static $registration_number;
    protected static $fuel_type;
    protected static $registration_to;


    public static function checkRegistrationNumber($registrationNumber, $connection)
    {
        $selectSQL = "SELECT r.id, vm.vehicle_model, vt.vehicle_type, r.vehicle_chassis_number, r.vehicle_production_year, r.registration_number, ft.fuel_type, r.registration_to FROM registrations r JOIN vehicle_models vm ON r.vehicle_model=vm.id JOIN vehicle_types vt ON r.vehicle_type=vt.id JOIN fuel_types ft ON r.fuel_type=ft.id WHERE r.registration_number = :registration_number;";
        $selectQuery = $connection->prepare($selectSQL);
        $selectQuery->bindParam(':registration_number', $registrationNumber, PDO::PARAM_STR);
        $selectQuery->execute();
        $result = $selectQuery->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result;
        }
        return false;
    }

    public static function checkChassisNumber($vehicleChassisNumber, $connection)
    {
        $sql = "SELECT * FROM registrations WHERE vehicle_chassis_number = :vehicle_chassis_number";
        $selectQuery = $connection->prepare($sql);
        $selectQuery->bindParam(':vehicle_chassis_number', $vehicleChassisNumber, PDO::PARAM_STR);
        $selectQuery->execute();
        $result = $selectQuery->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        }
        return false;
    }

    public static function selectAllExcept($table, $value, $column, $connection)
    {
        $selectSQL = "SELECT * FROM $table  WHERE $column != :someValue";
        $selectQuery = $connection->prepare($selectSQL);
        $selectQuery->bindParam(':someValue', $value, PDO::PARAM_STR);
        $selectQuery->execute();
        $result = $selectQuery->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function insertIntoRegistrations(array $array, $connection)
    {
        $insertSQL = "INSERT INTO registrations (vehicle_model, vehicle_type, vehicle_chassis_number, vehicle_production_year, registration_number, fuel_type, registration_to) 
        VALUES (:vehicle_model, :vehicle_type, :vehicle_chassis_number, :vehicle_production_year, :registration_number, :fuel_type, :registration_to)";
        $insertQuery = $connection->prepare($insertSQL);
        $insertQuery->execute($array);
    }


    public static function search($search, $connection)
    {
        $sql = "SELECT r.id, vm.vehicle_model, vt.vehicle_type, r.vehicle_chassis_number, r.vehicle_production_year, r.registration_number, ft.fuel_type, r.registration_to FROM registrations r JOIN vehicle_models vm ON r.vehicle_model=vm.id JOIN vehicle_types vt ON r.vehicle_type=vt.id JOIN fuel_types ft ON r.fuel_type=ft.id 
        WHERE vm.vehicle_model LIKE '%$search%'  OR r.registration_number LIKE  '%$search%' OR r.vehicle_chassis_number LIKE '%$search%'  ORDER BY r.id;";
        $selectQuery = $connection->prepare($sql);
        $selectQuery->execute();
        $searchResult = $selectQuery->fetchAll(PDO::FETCH_ASSOC);

        return $searchResult;
    }

    public static function selectAllFrom($tableName, $connection)
    {
        $sql = "SELECT * FROM $tableName";
        $selectQuery = $connection->prepare($sql);
        $selectQuery->execute();
        $result = $selectQuery->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function selectFromRegistrations($connection)
    {
        $selectSQL = "SELECT r.id, vm.vehicle_model, vt.vehicle_type, r.vehicle_chassis_number, r.vehicle_production_year, r.registration_number, ft.fuel_type, r.registration_to
        FROM registrations r JOIN vehicle_models vm ON r.vehicle_model=vm.id JOIN vehicle_types vt ON r.vehicle_type=vt.id JOIN fuel_types ft ON r.fuel_type=ft.id ORDER BY r.id";
        $selectQuery = $connection->prepare($selectSQL);
        $selectQuery->execute();
        $vehicles = $selectQuery->fetchAll(PDO::FETCH_ASSOC);

        return $vehicles;
    }

    public static function selectWhereID($id, $connection)
    {
        $sql = "SELECT r.id, vm.vehicle_model, vt.vehicle_type, r.vehicle_chassis_number, r.vehicle_production_year, r.registration_number, ft.fuel_type, r.registration_to FROM registrations r JOIN vehicle_models vm ON r.vehicle_model=vm.id JOIN vehicle_types vt ON r.vehicle_type=vt.id JOIN fuel_types ft ON r.fuel_type=ft.id 
        WHERE r.id = :id";
        $selectQuery = $connection->prepare($sql);
        $selectQuery->bindParam(':id', $id, PDO::PARAM_INT);
        $selectQuery->execute();
        $vehicleFromID = $selectQuery->fetch(PDO::FETCH_ASSOC);

        return $vehicleFromID;
    }

    public static function selectModels($column, $value, $connection)
    {
        $sql1 = "SELECT * FROM vehicle_models WHERE $column = :someValue";
        $selectQuery1 = $connection->prepare($sql1);
        $selectQuery1->bindParam(':someValue', $value, PDO::PARAM_STR);
        $selectQuery1->execute();
        $vehicleModel = $selectQuery1->fetch(PDO::FETCH_ASSOC);

        return $vehicleModel;
    }

    public static function updateModels($id, $vehicle_model, $connection)
    {
        $updateSQL = "UPDATE vehicle_models SET vehicle_model = :vehicle_model WHERE id = :id";
        $updateQuery = $connection->prepare($updateSQL);
        $updateQuery->bindParam(':id', $id, PDO::PARAM_INT);
        $updateQuery->bindParam(':vehicle_model', $vehicle_model, PDO::PARAM_STR);
        $updateQuery->execute();
    }
    public static function insertModels($vehicleModel, $connection)
    {
        $insertSQL = "INSERT INTO  vehicle_models (vehicle_model) VALUES (:vehicle_model)";
        $insertQuery = $connection->prepare($insertSQL);
        $insertQuery->bindParam(':vehicle_model', $vehicleModel, PDO::PARAM_STR);
        $insertQuery->execute();
    }

    private static function monthsDiff($date1, $date2)
    {
        $diff = strtotime($date2) - strtotime($date1);
        return round($diff / (30 * 24 * 60 * 60));
    }

    public static function expiredDate($vehicle)
    {
        $registrationDate = strtotime($vehicle['registration_to']);
        $currentDate = time();
        $monthsDifference = self::monthsDiff(date('Y-m-d', $currentDate), $vehicle['registration_to']);

        if ($currentDate > $registrationDate) {
            return "class='text-danger fw-bold'";
        } elseif ($monthsDifference <= 1 && $monthsDifference >= 0) {
            return "class='text-warning fw-bold fw-bold'";
        } else {
            return false;
        }
    }

    public static function deleteWhereID($id, $table,  $connection)
    {
        $sql = "DELETE FROM $table WHERE id = :id";
        $selectQuery = $connection->prepare($sql);
        $selectQuery->bindParam(':id', $id, PDO::PARAM_INT);
        $selectQuery->execute();
    }

    public static function updateWhereID(array $array, $connection)
    {
        $updateSQL = "UPDATE registrations SET vehicle_model = :vehicle_model, vehicle_type = :vehicle_type, vehicle_chassis_number = :vehicle_chassis_number, vehicle_production_year = :vehicle_production_year,
        registration_number = :registration_number , fuel_type = :fuel_type, registration_to = :registration_to WHERE id = :id";
        $updateQuery = $connection->prepare($updateSQL);
        $updateQuery->execute($array);
    }

    public static function updateExpiredDates($id, $connection)
    {
        $currentDate = strtotime(date('Y-m-d'));
        $plusOneYear = strtotime('+1 year', $currentDate);
        $newExpirationDate = date('Y-m-d', $plusOneYear);

        $sql = "UPDATE registrations SET registration_to = :registration_to  WHERE id = :id;";
        $selectQuery = $connection->prepare($sql);
        $selectQuery->bindParam(':id', $id, PDO::PARAM_INT);
        $selectQuery->bindParam(':registration_to', $newExpirationDate, PDO::PARAM_STR);
        $selectQuery->execute();
    }
}
