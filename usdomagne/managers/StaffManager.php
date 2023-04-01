<?php

class StaffManager extends AbstractManager
{
    
    public function getAllStaffs() : array
    {
        
        // get all the staffs from the database
        $query = $this->db->prepare('SELECT * FROM staff');
        $query->execute();
        $items = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $staffs = [];
        
        foreach($items as $item)
        {
            $staff = new Staff($item["first_name"], $item["last_name"], $item["phone_number"], $item["role"]);
            $staff->setId($item["id"]);
            $staffs[] = $staff;
            
        }
        /*var_dump($staffs);*/
        return $staffs;
        
        
    }

    public function getStaffById(int $id) : Staff
    {
        $query = $this->db->prepare('SELECT * FROM staff WHERE id = :id');
        $parameters = [
        'id' => $id
        ];
        $query->execute($parameters);
        $staff = $query->fetch(PDO::FETCH_ASSOC);

        $staffToLoad = new Staff($staff["first_name"], $staff["last_name"], $staff["phone_number"], $staff["role"]);
        $staffToLoad->setId($staff["id"]);
        
        return $staffToLoad;

    }


    public function insertStaff(Staff $staff) : Staff
    {
        
        $query = $this->db->prepare('INSERT INTO staff (`id`, `first_name`, `last_name`, `phone_number`, `role`) VALUES(NULL, :firstName, :lastName, :phoneNumber, :role)');

        $parameters = [
        'firstName' => $staff->getFirstName(),
        'lastName' => $staff->getLastName(),
        'phoneNumber' => $staff->getPhoneNumber(),
        'role' => $staff->getRole()
        
        ];
        
        $query->execute($parameters);

        $id = $this->db->lastInsertId();
        $staff->setId($id);
        echo "Un staff vient d'être ajouté !";
        return $staff;

    }

    public function editStaff(Staff $staff) : void
    {
        $query = $this->db->prepare('UPDATE staff SET first_name = :firstName, last_name = :lastName, phone_number = :phoneNumber, role = :role WHERE id = :id ');
        $parameters = [
            'id' => $staff->getId(),
            'firstName' => $staff->getFirstName(),
            'lastName' => $staff->getLastName(),
            'phoneNumber' => $staff->getPhoneNumber(),
            'role' => $staff->getRole()
            
            ];

        $query->execute($parameters);
    }
    
    public function deleteStaff(Staff $staff) : void
    {
        // delete the staff from the database
        $query = $this->db->prepare('DELETE FROM staff WHERE id = :id');
        $parameters = [
            'id' => $staff->getId()
        ];
        $query->execute($parameters);
        
    }
    
    
    
    public function addStaffMedia(int $staffId, int $mediaId) : void
    {
        $query = $this->db->prepare('INSERT INTO staff_media VALUES(:staff_id, :media_id)');

        $parameters = [
            'staff_id' => $staffId,
            'media_id' => $mediaId
        ];

        $query->execute($parameters);
    }
    
    public function deleteStaffMedia(Staff $staff) : void
    {
        $query = $this->db->prepare('DELETE FROM staff_media WHERE staff_id = :staff_id');

        $parameters = [

            'staff_id' => $staff->getId()
        ];

        $query->execute($parameters);
    }
}

?>