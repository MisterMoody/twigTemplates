# Templating with Twig
Template Layout System that Combines PHP and Twig

1. Installing Twig
2. Project Directory  
3. Extending Twig with Functions
4. Designing with Twig
5. TBD

## Installing Twig
*This project utilizes [Twig v2.0](https://twig.symfony.com/) and requires PHP 7. Prerequisite knowledge of `html`, `css`, `javascript`, `json` and `php` is required.*

To install Twig, open the console and ```cd..``` to  project folder. Then, run the following command:
> ```composer require "twig/twig:^2.0"```


## Project Directory [Part 1]
Once installation is complete, the project will house the ```vendor/``` folder as well as the ```composer.json``` and ```composer.lock``` files in its directory. *The `.git` file was instantiated when setting up this project on Github. Pay no attention to that `.git` behind the curtain!*

![Main Directory](public/img/mainDIR.png)

The ```vendor/``` folder contains **required project dependencies** for Composer, Symphony and Twig. Working with this folder requires an advanced skillset that is outside of the scope of this project, but there are considerations to keep in mind. 

In an effort to maximize project management efficiency, it is best to upload this folder to the server at a time when the server is least active as this process can be expensive. As well, when creating a project that *does not* require modification of external dependencies, *do NOT* add this folder to version control. To retrieve the most up-to-date version of all required dependencies, run this command:
> ```composer update```

Composer suggests:
> If you are using git for your project, you probably want to add ```vendor/``` to the ```.gitignore```. You really don't want to add all of that third-party code to your versioned repository.

---

The ```composer.json``` file is the **root package**, which defines project requirements and is the resource used by developers to declare project dependencies that Composer will manage. Composer uses a JSON schema to provide human and machine readable documentation of this file which can also validate file content.

![composer.json](public/img/composerJSON.png)

On instantiation, this file will produce a *package link* that will map ```installed``` package names to versions of the package via version constraints listed in the ```"require":``` property. This project has a singular package and that is version 2.0 of the Twig template engine.

Although some properties are required, recommended, optional or should simply be avoided due to potential for human error, the properties listed below (*to the best of my knowledge*) should be included in the file.

The ```"name":``` property includes the vendor and project name.

The ```"description":``` property includes a package description.

The ```"homepage":``` property includes a URL to the website where the project is hosted.

The ```"time":``` property details the package version release date.

The ```"license":``` property details the package license, if any.

The ```"author":``` property acknowledges project developers using an array of sub-properties that identifies devs by name, email, hompage or role.

Learn more about [basic usage](https://getcomposer.org/doc/01-basic-usage.md), configuring [composer.json](https://getcomposer.org/doc/04-schema.md), using [composer commands](https://composer.json.jolicode.com/), and modifying [JSON Schema](http://json-schema.org) and their properties [properties](https://getcomposer.org/doc/04-schema.md#properties).

---

The ```composer.lock``` file **defines dependencies and vendors** that are currently installed in the ```vendor/``` folder. This file is significant in that the state of dependencies are *locked* in a specified version, and as such, *should always be committed to version control*, which ensures that the same dependencies used during development are also used during production. There is no need to manually modify this file, however, when the time arises to update dependencies, run this command:
>```composer install```



## Project Directory [Part 2]
After outlining the ```composer.json``` file with suitable properties, prepare a ```README.md``` file and two folders: one named ```public/``` and another named ```templates/```.

![Project Directory](public/img/projectDIR.png)

The ```README.md``` file is a **form of documentation** that provides users with pertinent information that instructs them on how to implement a project. Provided explanations and screenshots enhances the level of engagement for users, which is encouraging. This file is commonly written using the markdown language, but can be written in any text format. There is no standard practice for writing such a file as the requirements for all projects vary. However, it is common to include instructions for configuration and installation, copyright and licensing information, credits and acknowledgments, a changelog, and troubleshooting ideas, if applicable. 

![README Markup](public/img/readme.png)

The above illustration outlines how such a file is written using the markdown language while the illustration below highlights how that markdown will be presented to users. 

![README Presentation](public/img/readme2.png)

Learn more about [README.md](https://en.wikipedia.org/wiki/README), the [cheatsheet](https://www.markdownguide.org/cheat-sheet/) and [how to make a readme](https://makeareadme.com).

---

The ```public/``` folder **contains all assets and content that is viewable** by users. To quickly jumpstart a project, it is imperative to include an ```index.php``` file, an ```.htaccess``` file, a ```css/``` folder, an ```img/``` folder and a ```js/``` folder.

![Public Directory](public/img/publicDIR.png)

The `css/` folder **stores cascading stylesheets that determine the sites presentation**. The styles for this project consist of a `grid.css` file and a `main.css` file.  The former is a stylesheet that employs the `{display: grid;}` declaration on specified sections of a page in order to create an overall grid layout structure. The latter stylesheet contains universal and general styles that adds aesthetic value to the page.

The `img/` folder **stores the screenshots** or other imagery to enhance text content.

The `js/` folder **stores javascript which creates functionality**. This project has a single script, `siteNav.js`, that provides the functionality for the global navigation system.

---

The `.htaccess` file is **a configuration file that alters the configuration of the Apache Web Server to enable functionality and features** that the server software has to offer. Some common features include password-protection, URL redirects and custom error pages. 

![Index File](public/img/htaccess.png)

This project file incorporates the `mod_rewrite` module, which uses **a rule-based rewriting engine to rewrite requested URLs**. By default, mod_rewrite maps a URL to a filesystem path. Its initial setup begins by setting up the tag `<IfModule mod_rewrite.c></IfModule>` to contain the following directives:

The `RewriteEngine On` directive **enables (or disables) the runtime rewriting engine**.

The `RewriteBase` directive **specifies the URL prefix** to be used for per-directory (htaccess) `RewriteRule` directives that substitute a *relative path*, and is required when you use a relative path.
*(In Apache HTTP Server 2.4.16 and later, this directive may be omitted when the request is mapped via Alias or mod_userdir.)*

The `RewriteCond` directive **defines a rule condition**. One or more RewriteCond can precede a RewriteRule directive. The following rule is then only used if both the current state of the URI matches its pattern, and if these conditions are met.

The `.htaccess` file can do *much more* than rewrite URLS! Learn more about the [mod_rewrite rules](https://httpd.apache.org/docs/2.4/mod/mod_rewrite.html).

<!--
---
The ```index.php``` file is like **a storage facility for the functionality** of the project. A basic setup will (a) make a call to the TWIG API autoloader to require the Composer autoload File, (b) load templates from the `templates/` folder and (c) establish rendering methods for pages and variables. In the illustration below, a `$nav` variable is used for global navigation (more on this later).
![Index File](public/img/indexPHP.png)
-->

# * ~TO BE CONTINUED~ *
<!--
The ```.htaccess``` file
The ```css/``` folder !
[CSS Directory](public/img/cssDIR.png)
The ```js/``` folder 
---
The ```templates/``` folder is like **a storage facility for the basic layout and template content that it inherits** (more on this later).
![Templates Directory](public/img/templatesDIR.png)
Next, setup a ```templates/``` folders to hold ```.twig``` template files, which are *extendable components* of the ```base.twig``` file, which is the singular-template that *contains the `<html>` structure for the site*.
-->