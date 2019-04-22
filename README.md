# Templating with Twig
Template Layout System that Combines PHP and Twig

1. Installing Twig
2. Project Directory [Pre-Installed]
3. Project Directory [Dev Installed]
4. Desiging with Twig
5. Building a Navigation System
6. Troubleshooting

## Installing Twig
*This project utilizes [Twig v2.0](https://twig.symfony.com/) and requires PHP 7. Prerequisite knowledge of `html`, `css`, `javascript`, `json` and `php` is required.*

### Use Console to Install
To install Twig, open the console and ```cd..``` to  project folder. Then, run the following command:
> ```composer require "twig/twig:^2.0"```


## Project Directory [Pre-Installed]
Once installation is complete, the project will house the ```vendor/``` folder as well as the ```composer.json``` and ```composer.lock``` files in its directory. *The `.git` file was instantiated when setting up this project on Github. Pay no attention to that `.git` behind the curtain!*

![Main Directory](public/img/mainDIR.png)

### The ```vendor/``` Folder

The ```vendor/``` folder contains **required project dependencies** for Composer, Symphony and Twig. Working with this folder requires an advanced skillset that is outside of the scope of this project, but there are considerations to keep in mind. 

In an effort to maximize project management efficiency, it is best to upload this folder to the server at a time when the server is least active as this process can be expensive. As well, when creating a project that *does not* require modification of external dependencies, *do NOT* add this folder to version control. To retrieve the most up-to-date version of all required dependencies, run this command:
> ```composer update```

Composer suggests:
> If you are using git for your project, you probably want to add ```vendor/``` to the ```.gitignore```. You really don't want to add all of that third-party code to your versioned repository.

### The ```composer.json``` File 

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

### The ```composer.lock``` file 

The ```composer.lock``` file **defines dependencies and vendors** that are currently installed in the ```vendor/``` folder. This file is significant in that the state of dependencies are *locked* in a specified version, and as such, *should always be committed to version control*, which ensures that the same dependencies used during development are also used during production. There is no need to manually modify this file, however, when the time arises to update dependencies, run this command:
>```composer install```



## Project Directory [Dev Installed]
After outlining the ```composer.json``` file with suitable properties, prepare a ```README.md``` file and two folders: one named ```public/``` and another named ```templates/```.

![Project Directory](public/img/projectDIR.png)

### The ```README.md``` File

The ```README.md``` file is a **form of documentation** that provides users with pertinent information that instructs them on how to implement a project. Provided explanations and screenshots enhances the level of engagement for users, which is encouraging. This file is commonly written using the markdown language, but can be written in any text format. There is no standard practice for writing such a file as the requirements for all projects vary. However, it is common to include instructions for configuration and installation, copyright and licensing information, credits and acknowledgments, a changelog, and troubleshooting ideas, if applicable. 

![README Markup](public/img/readme.png)

The above illustration outlines how such a file is written using the markdown language while the illustration below highlights how that markdown will be presented to users. 

![README Presentation](public/img/readme2.png)

Learn more about [README.md](https://en.wikipedia.org/wiki/README), the [cheatsheet](https://www.markdownguide.org/cheat-sheet/) and [how to make a readme](https://makeareadme.com).

### The `public/` Folder

The ```public/``` folder **contains all assets and content that is viewable** by users. To quickly jumpstart a project, it is imperative to include an ```index.php``` file, an ```.htaccess``` file, a ```css/``` folder, an ```img/``` folder and a ```js/``` folder.

![Public Directory](public/img/publicDIR.png)

The `css/` folder **stores cascading stylesheets that determine the sites presentation**. The styles for this project consist of a `grid.css` file and a `main.css` file.  The former is a stylesheet that employs the `{display: grid;}` declaration on specified sections of a page in order to create an overall grid layout structure. The latter stylesheet contains universal and general styles that adds aesthetic value to the page.

The `img/` folder **stores the screenshots** or other imagery to enhance text content.

The `js/` folder **stores javascript which creates functionality**. This project has a single script, `siteNav.js`, that provides the functionality for the global navigation system.

#### The `.htaccess` File

The `.htaccess` file is **a configuration file that alters the configuration of the Apache Web Server to enable functionality and features** that the server software has to offer. Some common features include password-protection, URL redirects and custom error pages. 

![Index File](public/img/htaccess.png)

This project file incorporates the `mod_rewrite` module, which uses **a rule-based rewriting engine to rewrite requested URLs**. By default, mod_rewrite maps a URL to a filesystem path. Its initial setup begins by setting up the tag `<IfModule mod_rewrite.c></IfModule>` to contain the following directives:

The `RewriteEngine On` directive **enables (or disables) the runtime rewriting engine**.

The `RewriteBase` directive **specifies the URL prefix** to be used for per-directory (htaccess) `RewriteRule` directives that substitute a *relative path*, and is required when you use a relative path.
*(In Apache HTTP Server 2.4.16 and later, this directive may be omitted when the request is mapped via Alias or mod_userdir.)*

The `RewriteCond` directive **defines a rule condition**. One or more RewriteCond can precede a RewriteRule directive. The following rule is then only used if both the current state of the URI matches its pattern, and if these conditions are met.

The `.htaccess` file can do amazing things, but working with this file depends on the state of that project. During development, this file should be placed in the `public/` folder, however, during production this file should be placed in the root directory. Learn more about the [mod_rewrite rules](https://httpd.apache.org/docs/2.4/mod/mod_rewrite.html).

#### The ```index.php``` File

The ```index.php``` file is essentially **the M-V-Controller** of the project. This file is setup to (a) register the TWIG API, (b) load templates from the `templates/` folder and (c) establish rendering methods for templates and the `$nav` variable that will create the sites overall global navigation. 

![Index File](public/img/indexPHP.png)

The first line **registers a call to the autoloader** (Twig API) using [Composers](https://getcomposer.org) built-in `autoload` function.
> `require_once __DIR__ . '/../vendor/autoload.php';`

This function automates the process for updating dependencies, which will ensure that the latest version for all dependencies are readily available. Without going in-depth, this short line of code does the heavy lifting for the `.json` and `.lock` files. Learn more about Composers [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading) function.

The next two lines create an *environment* that accesses the `$loader` variable to properly amalgamate the two. 

The first part establishes the loader, which will **load templates from the file system**, database or other resources. Although absolute paths are supported, relative paths are preferred as it makes the cache keys independent of the root directory.
> `$loader = new Twig_Loader_Filesystem(__DIR__ . '/../templates');`

The second part establishes the environment constructor, which is a **class instance used to store configurations and load templates from other locations**.
> `$twig = new Twig_Environment($loader);`

The constructor can accept a second argument in the form of an an array.
> `$twig = new Twig_Environment($loader, ['debug' => true]);`

Some of the available options include:

| Options | Value |
| ------- | ------- |
| debug | boolean  *(enable/disable node display)*|
| charset | string *(utf-8 template charset)* |
| cache | string *(absolute path to templates)* |
| auto_reload | boolean *(recompiles templates)* |
| autoescape | string *(sets default strategy)* |

Finally, the `if() {} else {}` statement is used to establish **Routing** methods for a global navigation system based on the `$nav` variable defined above it. The line makes use of `($_SERVER['REQUEST_URI'])`, which is a combination of a superglobal variable that, in this case, acts as an array and provides access to specified paths for `<nav>` links. 

All `<nav>` links are written in a logical order so that the statement can direct the user to a desired page using the `render()` method as illustrated below:
> `echo $twig->render('xxx.twig', ['nav' => $nav]);`

The setup for this system spans three pages and utilizes a routing strategy that is extensible by simply **copying the entire `elseif () {}` statement and modifying page names**. This topic is thoroughly explained in the self-titled section below.

### The `templates/` Folder
The ```templates/``` folder is **a storage facility for the basic layout of a site, and template content that the layout template inherits**. The only kind of files that exist here end with the `.twig` extension.

![Templates Directory](public/img/templatesDIR.png)

This project has six templates, but three of them are *extendable components* of the ```base.twig``` file, which is the template that *contains the `html` structure for the site*. This is the *main* template that all other templates **inherit stylesheets and scripts** for a uniform presentation of the site across pages. Unlike other `.twig` files, this file is never rendered, however, it has portable components **included** from other templates that are *implemented* when the file is [extended](https://twig.symfony.com/doc/2.x/tags/extends.html) to other templates. To extend layout structure to child-templates, simply add the following line as the first line: 
> `{% extends "childTemplate.twig %}`

*This is the beauty of templating: having one file to control the entire site view!* This is also the perfect segway to dive into designing with Twig!


## Designing with Twig
Twig is a high-performant templating language that is reader-friendly. A template is a text file that can generate any text-based format and is parsed by PHP, containing a mix of text and PHP code. As well, variables, expressions and tags are coded to templates to acquire values once a template is evaluated, and control the logic of the template, respectively.

Although Twig code eerily resembles PHP, such tags are not processed due to the fact that Twig templates are compiled to a native PHP class. Moreover, templates are automatically cached and re-compiled after any changes are made.
### Twig Language Constructs
### Expressions and Operators
### Template Inheritance
### Reusable Components
### List of Filters, Functions, Tags and Tests
### Coding Standards


## Building a Navigation System
The setup for the navigation system used in this project was created based on the following procedures: 
1. Define the `$nav` Variable
2. Create `.twig` File to Contain `<nav>` 
3. Pass the `.twig` File to `base.twig`
4. Setup `<nav>` Routing

The `$nav` variable is an array object defined in the `index.php` file. 

![Nav Variable](public/img/navFunction.png)

The array is composed of three inner-array items that contain `href`, `caption` and `status` properties, whose properties assign directory paths, list page name and ascertains page status, respectively. These properties are utilized across all pages, so establishing the criteria first is vital for creating a consistent flow. This array is passed directly to the `render()` method as an argument when setting up routes. The argument `['nav' => $nav]` helps facilitate navigational functionality based on the users selection

Once the `$nav` variable is defined, their sub-array properties can be applied to `<nav>` HTML structure, the markup for which is housed in the `base.twig` and `nav-item.twig` files.

![Nav Item](public/img/navItem.png)

The `nav-item.twig` file is setup as the `<li>...</li>` HTML that will be *included* into the `base.twig` file. This `<li>` accesses all `$nav` variable properties through use of the Twig **variable syntax**:
> `{{ item['xxx']}}` or `{{ item.xxx}}`

![Nav for-Loop](public/img/navLoop.png)

In the `base.twig` file, the `<ul>...</ul>` invokes a *for Loop* to loop through all items (ie pages) in the `$nav` array while including the `<li>` markup derived from the `nav-item.twig` file. Failure of the conditional statement here will return the user to the homepage.

#### Routing

Back in the `index.php` file, utilize the `if() {} else {}` conditional statement to establish routes and render methods for all items, that is, the site pages. 

![Nav Routing](public/img/navRoutes.png)

This statement uses the `substr()` function to *return a portion of a string specified by the start and length parameters* from the `$_SERVER[]` variable, which is a superglobal array that holds item/page *path* information. The `['REQUEST_URI']` array item *provides access to a specified URI* while the length of characters to check totals eight. The superglobal is then *compared against* the desired link: `'/pageLink'`. The formula used here, `if(){...} elseif() {...}...` can be repeated for every added page outside of the homepage.

#### Rendering
The code after the `} else {` at the bottom of the statement illustrates the ease of *rendering* a template. Simply modify the `$nav` inner-array properties to match the page and stage the `.twig` file to be used.



## Troubleshooting
There are a few annoyances with this project depending on its state: development versus production. *Out of the box, this **project works well in development**.* Not so much the case when uploading the project to the server. Thus, there are a few things to consider when things go wrong:

A. Must Specify Template During Edit.
On `line 38` of the `index.php` file, modify the `.twig` file to be rendered so that the page listed reflects the page that needs to be edited. For example, the `about.twig` file needs to be edited, so configure that line to reflect this: 
> `echo $twig->render('about.twig');`

B. Amend ALL `href=""` paths for any `.css` or `.js` file stored in the `base.twig` file with `public/`. During production, this link
> `href="css/fileName.css"`

should look like this link
> `href="public/css/fileName.css"`


C. Amend the `src=""` path for *ALL* images. During production, the path for this image
> `src="img/fileName.jpg"`

should look like this link
> `src="public/img/fileName.jpg"`

D. Place the `.htaccess` file at the *root* of the directory when uploading to the server so that it is a sibling of the `public/` directory as opposed to it being one of its children.

E. [NOT implemented here~]
**ONLY 'cache' templates during production, NOT when in development!
> `['cache' => "false"]


## * ~TO BE CONTINUED~ *
<!--
Variables can be accessed in any `xxx.twig` file by  placing the variable (without the '$') inside of **Output Tag**.
'>' `{{ variable }}`
*EXPLAIN: Add Filters/Functions to 'Output TAGS'
-->
