<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Animal.php";
    require_once "src/Breed.php";

    $server = 'mysql:host=localhost:8889;dbname=shelter_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);




    class BreedTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Breed::deleteAll();
            Animal::deleteAll();
        }

        function test_getId()
        {
            //Arrange
            $animal_type = "Dog";
            $id = null;
            $test_animal = new Animal($animal_type, $id);
            $test_animal->save();

            $date = "2017-02-01 00:00:00";
            $date_array = $test_animal->findDate($date);
            $date = date('F jS, Y', mktime(0,0,0,$date_array[1],$date_array[2],$date_array[0]));
            $seconds = mktime(0,0,0,$date_array[1],$date_array[2],$date_array[0]);

            $breed = "Siberian";
            $name = "Vanilla";
            $sex = "Female";
            $animal_id = $test_animal->getId();
            $test_breed = new Breed($breed, $id, $animal_id, $date, $seconds, $sex, $name);
            $test_breed->save();

            //Act
            $result = $test_breed->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_getAnimalId()
        {
            //Arrange
            $animal_type = "Dog";
            $id = null;
            $test_animal = new Animal($animal_type, $id);
            $test_animal->save();

            $date = "2017-02-01 00:00:00";
            $date_array = $test_animal->findDate($date);
            $date = date('F jS, Y', mktime(0,0,0,$date_array[1],$date_array[2],$date_array[0]));
            $seconds = mktime(0,0,0,$date_array[1],$date_array[2],$date_array[0]);

            $breed = "Siberian";
            $name = "Vanilla";
            $sex = "Female";
            $animal_id = $test_animal->getId();
            $test_breed = new Breed($breed, $id, $animal_id, $date, $seconds, $sex, $name);
            $test_breed->save();

            //Act
            $result = $test_breed->getAnimalId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
            // $this->assertEquals(true, $result);
        }

        function test_save()
        {
            //Arrange
            $animal_type = "Dog";
            $id = null;
            $test_animal = new Animal($animal_type, $id);
            $test_animal->save();

            $date = "2017-02-01 00:00:00";
            $date_array = $test_animal->findDate($date);
            $date = date('F jS, Y', mktime(0,0,0,$date_array[1],$date_array[2],$date_array[0]));
            $seconds = mktime(0,0,0,$date_array[1],$date_array[2],$date_array[0]);

            $breed = "Siberian";
            $name = "Vanilla";
            $sex = "Female";
            $animal_id = $test_animal->getId();
            $test_breed = new Breed($breed, $id, $animal_id, $date, $seconds, $sex, $name);

            //Act
            $test_breed->save();

            //Assert
            $result = Breed::getAll();

            $this->assertEquals($test_breed, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $animal_type = "Dog";
            $id = null;
            $test_animal = new Animal($animal_type, $id);
            $test_animal->save();

            $animal_type2 = "Cat";
            $id2 = null;
            $test_animal2 = new Animal($animal_type, $id);
            $test_animal2->save();

            $date = "2017-02-01 00:00:00";
            $date_array = $test_animal->findDate($date);
            $date = date('F jS, Y', mktime(0,0,0,$date_array[1],$date_array[2],$date_array[0]));
            $seconds = mktime(0,0,0,$date_array[1],$date_array[2],$date_array[0]);

            $breed = "Siberian";
            $name = "Vanilla";
            $sex = "Female";
            $animal_id = $test_animal->getId();
            $test_breed = new Breed($breed, $id, $animal_id, $date, $seconds, $sex, $name);
            $test_breed->save();

            $date2 = "2017-02-01 00:00:00";
            $date_array2 = $test_animal2->findDate($date2);
            $date2 = date('F jS, Y', mktime(0,0,0,$date_array2[1],$date_array2[2],$date_array2[0]));
            $seconds2 = mktime(0,0,0,$date_array2[1],$date_array2[2],$date_array2[0]);

            $breed2 = "Sphinx";
            $name2 = "Chocolate";
            $sex2 = "Female";
            $animal_id2 = $test_animal2->getId();
            $test_breed2 = new Breed($breed2, $id2, $animal_id2, $date2, $seconds2, $sex2, $name2);
            $test_breed2->save();

            //Act
            $result = Breed::getAll();

            //Assert
            $this->assertEquals([$test_breed, $test_breed2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $animal_type = "Dog";
            $id = null;
            $test_animal = new Animal($animal_type, $id);
            $test_animal->save();

            $animal_type2 = "Cat";
            $id2 = null;
            $test_animal2 = new Animal($animal_type, $id);
            $test_animal2->save();

            $date = "2017-02-01 00:00:00";
            $date_array = $test_animal->findDate($date);
            $date = date('F jS, Y', mktime(0,0,0,$date_array[1],$date_array[2],$date_array[0]));
            $seconds = mktime(0,0,0,$date_array[1],$date_array[2],$date_array[0]);

            $breed = "Siberian";
            $name = "Vanilla";
            $sex = "Female";
            $animal_id = $test_animal->getId();
            $test_breed = new Breed($breed, $id, $animal_id, $date, $seconds, $sex, $name);
            $test_breed->save();

            $date2 = "2017-02-01 00:00:00";
            $date_array2 = $test_animal2->findDate($date2);
            $date2 = date('F jS, Y', mktime(0,0,0,$date_array2[1],$date_array2[2],$date_array2[0]));
            $seconds2 = mktime(0,0,0,$date_array2[1],$date_array2[2],$date_array2[0]);

            $breed2 = "Sphinx";
            $name2 = "Chocolate";
            $sex2 = "Female";
            $animal_id2 = $test_animal2->getId();
            $test_breed2 = new Breed($breed2, $id2, $animal_id2, $date2, $seconds2, $sex2, $name2);
            $test_breed2->save();

            //Act
            Breed::deleteAll();

            //Assert
            $result = Breed::getAll();
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $animal_type = "Dog";
            $id = null;
            $test_animal = new Animal($animal_type, $id);
            $test_animal->save();

            $animal_type2 = "Cat";
            $id2 = null;
            $test_animal2 = new Animal($animal_type, $id);
            $test_animal2->save();

            $date = "2017-02-01 00:00:00";
            $date_array = $test_animal->findDate($date);
            $date = date('F jS, Y', mktime(0,0,0,$date_array[1],$date_array[2],$date_array[0]));
            $seconds = mktime(0,0,0,$date_array[1],$date_array[2],$date_array[0]);

            $breed = "Siberian";
            $name = "Vanilla";
            $sex = "Female";
            $animal_id = $test_animal->getId();
            $test_breed = new Breed($breed, $id, $animal_id, $date, $seconds, $sex, $name);
            $test_breed->save();

            $date2 = "2017-02-01 00:00:00";
            $date_array2 = $test_animal2->findDate($date2);
            $date2 = date('F jS, Y', mktime(0,0,0,$date_array2[1],$date_array2[2],$date_array2[0]));
            $seconds2 = mktime(0,0,0,$date_array2[1],$date_array2[2],$date_array2[0]);

            $breed2 = "Sphinx";
            $name2 = "Chocolate";
            $sex2 = "Female";
            $animal_id2 = $test_animal2->getId();
            $test_breed2 = new Breed($breed2, $id2, $animal_id2, $date2, $seconds2, $sex2, $name2);
            $test_breed2->save();

            //Act
            $result = Breed::find($test_breed->getId());

            //Assert
            $this->assertEquals($test_breed, $result);
        }

    }
?>
