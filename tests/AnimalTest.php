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

    class AnimalTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Animal::deleteAll();
            // Breed::deleteAll();
        }

        function test_getName()
        {
            //Arrange
            $animal_type = "Dog";
            $test_Animal = new Animal($animal_type);

            //Act
            $result = $test_Animal->getAnimalType();

            //Assert
            $this->assertEquals($animal_type, $result);
        }

        function test_getId()
        {
            //Arrange
            $animal_type = "Dog";
            $id = 1;
            $test_Animal = new Animal($animal_type, $id);

            //Act
            $result = $test_Animal->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_save()
        {
            //Arrange
            $animal_type = "Dog";
            $test_Animal = new Animal($animal_type);
            $test_Animal->save();

            //Act
            $result = Animal::getAll();

            //Assert
            $this->assertEquals($test_Animal, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $animal_type = "Dog";
            $test_Animal = new Animal($animal_type);
            $test_Animal->save();
            $animal_type2 = "Cat";
            $test_Animal2 = new Animal($animal_type2);
            $test_Animal2->save();

            //Act
            $result = Animal::getAll();

            //Assert
            $this->assertEquals([$test_Animal, $test_Animal2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $animal_type = "Dog";
            $test_Animal = new Animal($animal_type);
            $test_Animal->save();
            $animal_type2 = "Cat";
            $test_Animal2 = new Animal($animal_type2);
            $test_Animal2->save();

            //Act
            Animal::deleteAll();
            $result = Animal::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $animal_type = "Dog";
            $test_Animal = new Animal($animal_type);
            $test_Animal->save();
            $animal_type2 = "Cat";
            $test_Animal2 = new Animal($animal_type2);
            $test_Animal2->save();

            //Act
            $result = Animal::find($test_Animal->getId());

            //Assert
            $this->assertEquals($test_Animal, $result);
        }

        // function testGetBreed()
        // {
        //     //Arrange
        //     $breed = "Dog"
        //     $id = null;
        //     $test_Animal = new Animal($breed, $id);
        //     $test_Animal->save();
        //
        //     $test_Animal_id = $test_Animal->getId();
        //
        //     $breed = "Siberian";
        //     $test_breed = new Task($breed, $id, $test_Animal_id);
        //     $test_breed->save();
        //
        //     $breed2 = "Pug";
        //     $test_breed2 = new Task($breed2, $id, $test_Animal_id);
        //     $test_breed2->save();
        //
        //     //Act
        //     $result = $test_Animal->getTasks();
        //
        //     //Assert
        //     $this->assertEquals([$test_breed, $test_breed2], $result);
        // }
    }

?>
