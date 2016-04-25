phpShop
=======

## Overview

phpShop is a simple PHP based web store that allows users to browse the items and manage a simple cart.

## Components
### Server
PHP backend, serves the Client files, provides REST endpoints, and interacts with the Database.
### Client
AngularJS based front-end to the Store.
### Database
MySQL based database to hold all of the persistent data.

## Data
Basic data structures

    Product : {
        id : 0,
        categories : [],
        name: ""
        description: ""
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
    
    