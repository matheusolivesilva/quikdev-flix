# QuikDevFlix 
This simple software was created as a part of selection process at [QuikDev](http://www.quikdev.com.br/). It shows trending movies from [The Movie Database](https://www.themoviedb.org/).

## Features
The QuikDevFlix show infos of a movie, it's possible to search by name or filter by a category.
![QuickDevFlix Demo](demo.gif)

## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
What things you need to do to run the software:

* PHP 7.3 or greater
* Composer 1.9.0  
* Laravel Framework Lumen (7.2.1) (Laravel Components ^7.0)

### Installing and using
Follow the steps bellow to install and use the QuikDevFlix software:

1. Clone this repo with:
```bash 
  git clone https://github.com/matheusolivesilva/quik-dev-flix.git
```
2. Open terminal in api directory, then download the dependencies running:
```bash
composer install
```
3. Still inside api directory, let the API online with: 
```bash
php -S localhost:typehereyourport -t public/
```
4. Back to the web directory, and inside it run
```bash
php -S localhost:typehereyourport 
```
5. Still inside web directory, open the file config.php and there, enter the host used in step 4 and 5

6. Now you can access the QuikDevFlix, enter with the host informed in the step 4


## Built With
* Lumen Framework
* VS Code with VIM extension
* PHP 7
* Gitflow
* Composer 

## Author
*Matheus Oliveira da Silva* - [Github](https://github.com/matheusolivesilva) | [Linkedin](https://www.linkedin.com/in/matheusoliveirasilva/)
