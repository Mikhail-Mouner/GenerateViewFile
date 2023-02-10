# View Generator

### Introduction
**This package is a useful tool to generate View Migration File & Model File** 

the files that will be generated is:
- Migration Files
- Model Files

### Installation
By default, Composer pulls in packages from Packagist so you’ll have to make a slight adjustment to your new project composer.json file. Open the file and update include the following array somewhere in the object:
```shell
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/Mikhail-Mouner/GenerateViewFile"
        }
    ],
```

### Usage
For example if you want to generate a new View named `posts-category`. use the following `artisan` command:
```shell
php artisan make:view posts-category
```
