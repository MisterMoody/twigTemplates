# Templating with Twig
Template Layout System that Combines PHP and Twig

1. Installing Twig
2. Project Directory
3. Extending Twig with Functions
4. Designing with Twig
5. TBD

## Installing Twig
*This project utilizes Twig v2.0, which requires PHP 7. Thus, it is important to install the latest version of Xampp.*

To install Twig, open the console and ```cd..``` to  project folder. Then, run the following command:
> ```composer require "twig/twig:^2.0"```


## Project Directory
Once installation is complete, the project will house the ```vendor/``` folder as well as the ```composer.json``` and ```composer.lock``` in its directory. 
![Main Directory](public/img/mainDIR.png)

The ```vendor/``` folder contains all of the Composer, Symphony and Twig required project dependencies. Working with this folder requires an advanced skillset that it outside of the scope of this project, but there are considerations to keep in mind. 

In an effort to maximize project management efficiency, it is best to upload this folder to the server at a time when the server is least busiest as this process can be time consuming. As well, when creating a project that *does not* require modification of external dependencies, *do NOT* add this folder to version control as you can run the command ```composer update``` to retrieve the most up-to-date version of all required dependencies.  Composer suggests:
> If you are using git for your project, you probably want to add ```vendor/``` to the ```.gitignore```. You really don't want to add all of that third-party code to your versioned repository.

The ```composer.json``` file is the **root package**, which defines project requirements and is the resource used by developers to declare project dependencies that Composer will manage. Composer uses a JSON schema to provide human and machine readable documentation of this file which can also validate file content.

![composer.json](public/img/composrJSON.png)

On instantiation, this file will produce a *package link* that will map ```installed``` package names to versions of the package via version constraints listed in the ```"require":``` property. This project has a singular package and that is version 2.0 of the Twig template engine.

Although some properties are required, recommended, optional or should simply be avoided due to potential for human error, the properties listed below (*to the best of my knowledge*) should be included in the file.

The ```"name":``` property includes the vendor and project name.

The ```"description":``` property includes a package description.

The ```"homepage":``` property includes a URL to the website where the project is hosted.
The ```"time":``` property details the package version release date.

The ```"license":``` property details the package license, if any.

The ```"author":``` property acknowledges project developers using sub-properties housed as an array to identify them by name, email, hompage or role.

Learn more about [basic usage](https://getcomposer.org/doc/01-basic-usage.md), configuring [composer.json](https://getcomposer.org/doc/04-schema.md), using [composer commands](https://composer.json.jolicode.com/) and modifying [JSON Schema](http://json-schema.org) [properties](https://getcomposer.org/doc/04-schema.md#properties).

The ```composer.lock``` file tells Composer which dependencies and vendors should be currently installed in the ```vendor/``` folder. This file is significant in that the state of dependencies are *locked* in a specified version, and as such, *should always be committed to version control*, which ensures that the same dependencies used during development are also used during production. There is no need to manully modify this file, however, when the time arises to update dependencies, run this command:
>```composer install```


<!--
![Project Directory](public/img/projectDIR.png)
After install, setup a ```public/``` folder to contain the content that will be *viewable* by users. At the start of any project, you will require an ```index.php``` file, an ```.htaccess``` file, a ```css/``` folder and an ```img/``` folder.
Next, setup a ```templates/``` folders to hold ```.twig``` template files, which are *extendable components* of the ```base.twig``` file, which is the singular-template that *contains the `<html>` structure for the site*.
-->