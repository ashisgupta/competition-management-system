# README #
Steps needed to get application up and running

### What is this repository for? ###

* Monad Assignment : Clinic Management System
* Description: 	An application where the User’s data(Patient) can be shared only if they approve it. 
*				There are 3 types of users/roles:
*				Patient/User
*				Doctor
*				Pharmacist
*
*				The Patient has medical records and prescriptions. If a doctor asks for a patient’s prescription, the patient has to approve it. Same goes with the Pharmacist, if the pharmacist wants to view the patient’s prescription, the patient has to approve it.
The admin adds prescription of Patients.
* Version 1.0

### How do I get set up? ###

* Clone the repository, Run migration and seeder.
* Checkout to git branch prod
* Create .env file from copying .env.example, generate key and add database username, password and database name.
* Install all dependcies to run Laravel 5.5 refer(https://laravel.com/docs/5.5/installation).
* Run (Composer Install) for install all Packages.
* Create a database and add the name in .env file.
* Create a virtual host and point it into /public folder under the project.
* Use Admin login : admin@monad.com, Use registeration form to create other users.
* Use Patient login : patient@monad.com
* Use Doctor login : doctor@monad.com
* Use Pharmcist login : pharmacist@monad.com

### Who do I talk to? ###

* Repo owner : Ashis Gupta
* Contact Email : agupta.rkl@gmail.com


