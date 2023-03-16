# RFP Bidding System

RFP (Request for Proposal) is a web-based bidding system where a sales representative can make a request and the presales can respond with a proposal. The administrator is the third actor who can manage the CRUD processes.

## Prerequisites

* Before running this application, you need to have the following installed on your machine:
* PHP 7.3 or higher
* MySQL or any other database system
* Composer
* PHP 7.3 or higher
* MySQL or any other database system

## Run Locally

Clone the repository to your local machine using the following command:
```shell
git clone https://github.com/hossamsoliuman/petshop.git

cd petshop
```

Generate .env file
```shell
cp .env.example .env
```

Then, configure the .env file according to your use case.

Install the dependencies and then compile the assets
```shell
composer install

npm install
npm run dev
```

Populate the tables to the database.
Create a new database for the project and run the rfp.sql file located in the root directory to create the necessary tables:
```shell
mysql -u your_database_username -p your_database_name < rfp.sql

```

Optional: Seed data to the dabase
```shell
php aritsan db:seed
```

Generate app key
```shell
php artisan key:generate
```

Run the application
```shell
php artisan serve
```

Access the application in your web browser at http://localhost:8000.

## User Logins

- Admin login: email: rfpadmin@gmail.com, password: 12345678.
- Sales member login: email: sales_member@gmail.com, password: 12345678.
- Presales member login: email: presales_member@gmail.com, password: 12345678.

## Observation

I developed this project out of my head, not on YouTube
