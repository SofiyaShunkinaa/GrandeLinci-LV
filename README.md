# README 

## Description of the project
<b>GrandeLinci LV</b> is a website project developed using PHP and MySQL. The site is designed to manage information about Main Coon kittens, cats, their names and images.

## Installation and configuration
If you have installed Php skip step 1.
1. Prebuilt packages and binaries

- Prebuilt packages and binaries can be used to get up and running fast with PHP.
- For Windows, the PHP binaries can be obtained from
- [windows.php.net](https://windows.php.net). After extracting the archive the
`*.exe` files are ready to use.
- For other systems, see the [installation chapter](https://php.net/install).
2. Download all the project files to your local computer.
3. Use files in <i>database/</i> directory to create database in your database management system (for example, phpMyAdmin).
4. Configure the database connection in the file <i>config/core.php</i>, specify the host, username, password, and database name.
5. Start the web server (for example, Apache) and make sure that PHP is working correctly.

## Project structure
- <b>assets/</b> - folder with styles, scripts and images.
    + assets/css - folder with CSS-styles and CSS-variables;
    + assets/images - folder with images;
    + assets/js - folder with JavaScript files;
- <b>config/</b> - folder with configuration files.
- <b>core/</b> - folder with all pages and functional elements like header  or footer.
- <b>database/</b> - folder with MySql scripts for creating db, tables and inserting data.
- <b>includes/</b> - folder with libraries and custom Php content.
- <b>lang/</b> - folder with languages translation.
- index.php - the main controller file.
- template.php - page-controlling file with common layout.


## Usage
- To view the list of kittens, visit home page or page Available kittens.
- To add a new kitten, go to the lang page to add information by same id in db.


## Author
Author: Sofiya Shunkina<br>
Contact the author: sofiyashunkina@gmail.com

## License
This project is licensed under MIT License.

More detailed information about the functionality and use of the site can be found in the corresponding project files. If you have any questions or problems with the installation, contact the author of the project.
