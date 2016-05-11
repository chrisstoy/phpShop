phpShop
=======

## Overview

phpShop is a simple PHP based web store that allows users to browse the items and manage a simple cart.

The goal is to implement a "fully functioning" shop in PHP.  

Currently, there is no support for unique users, and the set of items for sale in the shop is small and hard-coded in `sample-products.json`.


## Components
### Server
PHP backend, serves the Client files, provides REST endpoints, and interacts with the Database.
### Client
Views rendered using the [Laravel Blade](https://laravel.com/docs/5.1/blade) templating engine. 
### Database _(TODO)_
Currently, this is implemented using JSON with a simple file storing system.

## Data
Basic data structures

    Product : {
        id : 0,
        categories : [],
        name: "",
		blurb: "",
        description: "",
    }

    Price : {
        id: 0,
        productId : 0,
        dollars: 0
    }

    Cart : {
        id : 0,
        customerId : 0,
        items : [
            { 
                productId : 0,
                quantity: 0
            }
        ]
    }
    
    Customer : {
        id : 0,
        name : {
            first : ""
            last: ""
        },
        address : ""
    }
          
    

## Development
### [Scotch Box](http://box.scotch.io)
Includes a Vagrant file for creating a VM based on the Scotch-Box VM.
Note: You will need to modify the ```/etc/apache2/sites-enabled/*.conf``` files to have their ```DocumentRoot = /var/www```.
    
    