<?php
    class Breed
    {
        private $breed;
        private $animal_id;
        private $id;
        private $date;
        private $seconds;
        private $sex;
        private $name;


        function __construct($breed, $id = null, $animal_id, $admin_date, $seconds, $sex, $name)
        {
            $this->breed = $breed;
            $this->id = $id;
            $this->animal_id = $animal_id;
            $this->admin_date = $admin_date;
            $this->seconds = $seconds;
            $this->sex = $sex;
            $this->name = $name;
        }

        function setBreed($new_breed)
        {
            $this->breed = (string) $new_breed;
        }

        function getBreed()
        {
            return $this->breed;
        }

        function setDate($new_admin_date)
        {
            $this->admin_date = (string) $new_admin_date;
        }

        function getDate()
        {
            return $this->admin_date;
        }

        function setSeconds($new_seconds)
        {
            $this->seconds = $new_seconds;
        }

        function getSeconds()
        {
            return $this->seconds;
        }

        function setSex($new_sex)
        {
            $this->sex = (string) $new_sex;
        }

        function getSex()
        {
            return $this->sex;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function getName()
        {
            return $this->name;
        }

        function getId()
        {
            return $this->id;
        }

        function getAnimalId()
        {
            return $this->animal_id;
        }

        function save()
        {
            $sql = "INSERT INTO breeds (breed, animal_id, admin_date, seconds, sex, name) VALUES ('{$this->getBreed()}', {$this->getAnimalId()}, '{$this->getDate()}', '{$this->getSeconds()}', '{$this->getSex()}', '{$this->getName()}')";

            $GLOBALS['DB']->exec($sql);
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_breeds = $GLOBALS['DB']->query("SELECT * FROM breeds;");
            $breeds = array();
            foreach($returned_breeds as $breed) {
                $breed_type = $breed['breed'];
                $id = $breed['id'];
                $animal_id = $breed['animal_id'];
                $date = $breed['admin_date'];
                $seconds= $breed['seconds'];
                $sex= $breed['sex'];
                $name= $breed['name'];
                $new_breed = new Breed($breed_type, $id, $animal_id, $date, $seconds, $sex, $name);
                array_push($breeds, $new_breed);
            }
            return $breeds;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM breeds;");
        }

        static function find($search_id)
        {
            $found_breed = null;
            $breeds = Breed::getAll();
            foreach($breeds as $breed) {
                $animal_id = $breed->getId();
                if ($animal_id == $search_id) {
                  $found_breed = $breed;
                }
            }
            return $found_breed;
        }
    }
?>
