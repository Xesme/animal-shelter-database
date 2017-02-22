<?php
    class Animal
    {
        private $animal_type;
        private $id;

        function __construct($animal_type, $id = null)
        {
            $this->animal_type = $animal_type;
            $this->id = $id;
        }

        function setAnimalType($new_animal_type)
        {
            $this->animal_type = (string) $new_animal_type;
        }

        function getAnimalType()
        {
            return $this->animal_type;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO animals (animal_type) VALUES ('{$this->getAnimalType()}')");
            $this->id= $GLOBALS['DB']->lastInsertId();
        }

        function findDate($date){
            $date = explode(" ", $date);
            $dateY = $date[0];
            return explode("-", $dateY);
        }

        static function getAll()
        {
            $returned_animals = $GLOBALS['DB']->query("SELECT * FROM animals;");
            $animals = array();
            foreach($returned_animals as $animal) {
                $animal_type = $animal['animal_type'];
                $id = $animal['id'];
                $new_animal = new Animal($animal_type, $id);
                array_push($animals, $new_animal);
            }
            return $animals;
        }

        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM animals;");
        }

        static function find($search_id)
        {
            $found_animal = null;
            $animals = Animal::getAll();
            foreach($animals as $animal) {
                $animal_id = $animal->getId();
                if ($animal_id == $search_id) {
                  $found_animal = $animal;
                }
            }
            return $found_animal;
        }

        function getAnimalsByTime()
        {
            $animals = Array();
            $returned_animals = $GLOBALS['DB']->query("SELECT * FROM breeds WHERE animal_id = {$this->getId()};");
            foreach($returned_animals as $animal) {
                $breed = $animal['breed'];
                $id = $animal['id'];
                $animal_id = $animal['animal_id'];
                $date = $animal['admin_date'];
                $seconds = $animal['seconds'];
                $sex = $animal['sex'];
                $new_animal = new Breed($breed, $id, $animal_id, $date, $seconds, $sex);
                array_push($animals, $new_animal);
            }
            return $animals;
        }

        //
        // function getAnimalsByBreed()
        // {
        //     $animals = Array();
        //     $returned_animals = $GLOBALS['DB']->query("SELECT * FROM breeds WHERE animal_id = {$this->getId()} ORDER BY breed ASC;");
        //     foreach($returned_animals as $animal) {
        //         $breed = $animal['breed'];
        //         $id = $animal['id'];
        //         $animal_id = $animal['animal_id'];
        //         $date = $animal['admin_date'];
        //         $seconds = $animal['seconds'];
        //         $sex = $animal['sex'];
        //         $name = $animal['name'];
        //         $new_animal = new Breed($breed, $id, $animal_id, $date, $seconds, $sex);
        //         array_push($animals, $new_animal);
        //     }
        //     return $animals;
        // }
        //
        // function getAnimalsByName()
        // {
        //     $animals = Array();
        //     $returned_animals = $GLOBALS['DB']->query("SELECT * FROM breeds WHERE animal_id = {$this->getId()} ORDER BY name ASC;");
        //     foreach($returned_animals as $animal) {
        //         $breed = $animal['breed'];
        //         $id = $animal['id'];
        //         $animal_id = $animal['animal_id'];
        //         $date = $animal['admin_date'];
        //         $seconds = $animal['seconds'];
        //         $sex = $animal['sex'];
        //         $name = $animal['name'];
        //         $name = $animal['name'];
        //         $new_animal = new Breed($breed, $id, $animal_id, $date, $seconds, $sex, $name);
        //         array_push($animals, $new_animal);
        //     }
        //     return $animals;
        // }
    }
?>
