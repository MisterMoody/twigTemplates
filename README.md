# Templating with Twig
Template Layout System that Combines PHP and Twig

1. Installing Twig
2. Project Directory
3. Extending Twig with Functions
4. Designing with Twig
5. TBD

## Installing Twig
*This project utilizes Twig v2.0, which requires PHP 7. Thus, it is important to install the latest version of Xampp.*

To install Twig, open the console and ```cd..``` to your project folder. Then, run the following command:
```composer require "twig/twig:^2.0"```
This command creates a ```vendor/``` folder that contains Composer, Symphony and Twig dependencies, and it also produces to the ```composer.json``` and ```composer.lock```. The ```.json``` file defines project requirements while the ```.lock``` file tells Composer which dependencies and vendors should be currently installed in the ```vendor/``` folder. These two files should always be placed in the root of the project just like the ```vendor/``` folder. When saving to version control include the files, but not this folder.

You can learn more about configuring these files [here](https://composer.json.jolicode.com/) and [here](https://getcomposer.org/doc/04-schema.md).

## Project Directory
![Main Directory](http://github/MisterMoody/twigTemplates/public/img/mainDIR.JPG)
