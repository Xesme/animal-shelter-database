# Animal Shelter Database

#### _A webpage that simulates an animal shelter database, 21 February 2017_

#### By _**Xia Amendolara & Matt Kelley**_

## Description

This webpage will allow two users to play the Extreme version of Rock, Paper, Scissors and display the winner.

## Setup/Installation Requirements

1. _Fork and clone this repository from_ [gitHub]https://github.com/mkelley2/AnimalShelter.
2. Run `composer install --prefer-source --no-interaction` from project root
3. Create a local server in the /web directory within the project folder using the command: `php -S localhost:8000`
4. Open the directory http://localhost:8000/ in any standard web browser.


## Specifications

|Behavior|Input|Output|
|--------|-----|------|
| User can add an animal to the database with custom input options.| type of animal: "gorilla" | Gorilla is added to the list of animals. |
|User clicks on gorilla | "clicks on gorilla" | User is redirected to the gorilla page. (/animals/gorilla)|
|User can add information about a specific animal to that animal's type| name: "Butters" breed: "silverback" sex: "female" admission date : "February 2, 2017" | That animal with that information is displayed in the list of gorillas|
|User can click on the delete button, and all of the animals of that type will be deleted from the database. | "clicks delete button" | All animals of that type are now deleted from the database|
|User clicks on link for homepage | "clicks on home link" | User is now redirected to the homepage|
|From the homepage user can click on the delete button, and all of the animals from the animal category (including all categories) will be deleted from the database. | "clicks delete button" | All animals and categories have been deleted from the database|


## Known Bugs

No known bugs.

## Support and contact details

Please contact XiaEsmeAmen@me.com or m_kelley2@yahoo.com with questions or concerns.

## Technologies Used

* _HTML_
* _CSS_
* _Bootstrap_
* _PHP_
* _Silex_
* _Twig_
* _Composer_

## License

*MIT license*

Copyright (c) 2017 {**Xia Amendolara & Matt Kelley**} All Rights Reserved.
