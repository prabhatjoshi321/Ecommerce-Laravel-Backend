# Ecommerce Laravel Backend

| Project Title : **Ecommerce**                      Prepared By : **Prabhat Joshi** |
| --- |

### **Product Characteristics and Requirements:**

1. Secure MySQL database.
2. Token based authentication
3. OTP based twilio verification
4. different user roles and type.
5. login, logout, register etc.
6. Product listing and review System.
7. Easy to use and User intuitive Interface.

### **Project Management Deliverables:** <br />

    Project plan, Research finding report, Work breakdown structure, Scope statement, Project charter, Training manuals, lessons learned report etc., **Product-related deliverables:**         Design documents, software code, project documentation and tips on its operation.,   |

## **Statement of Work**

1. Scope of Work

    This project5 is meant to make the users and new residents life a breeze by helping them search places near them that are available to buy/rent. It&#39;s main goal is to reduce the gap between the sellers and buyers and provide a much better experience to the house seekers. It also helps the dealer and the rental company to reach their target audience more efficiently and effectively.

2. Acceptance Criteria:

    The acceptance criteria for the users are

    * The website has to communicate with the database.

    * Users can easily login and register to the site

    * Owners, Dealers and Lawyers can easily put their listing and provide their services.

    * Site owners and administrators can easily administer the site.

    * Company Members can easily manage the working and issues of users.

    * Maintaining the account details of the user.

    * Users can view the available places to rent/buy through online, and review the properties,.

## **Project Design Document**

### **Introduction**

    The project is based on two widely known frameworks, **Angular** that is based on typescript and **Laravel** that is based on php. For Database **MySQL** is used. The frameworks and the database used are based on industry standards and can be scaled via load balancers to handle heavy amounts of traffic resulting in less downtime leading to more profitability and good reputation in the market.

### **Purpose**

    For frontend Angular is used as it provides single page routing that results in a very responsive site. It also helps the different components of a site to be developed independently giving a more independent work approach on the project resulting in higher customisability.

    The backend is built up using Laravel as it has amazing sets of modules that makes API development and scalability of the site a breeze. The modules used in Laravel are passport authentication that provides wonderful features as token-based authentication making our site bulletproof against the hackers. It uses OTP based authentication system via Twilio phone number verification API which prevents repetitive account creation and false users from registering. Laravel also has a database migrate feature which does not require database dump to deploy site on systems, resulting in ease of development and less setup time among the developers.

    This project implements User login, logout, Dashboard for all types of users ranging from admin all the way to the customers, product listing and review system, various user intuitive features, and user register with a Phone number verification support.

### **Scope**

    This project is being developed for the house seekers who are planning to buy a house or rent an existing one in a particular city.

### **Intended Audience**

    This document is intended for use by technical developers. This document also includes sections relevant to the operational and maintenance group.

    * The intended audiences for this document are:
    * The owner of this project.
    * The team members of the company that is registered.
    * The administrative staff of the company that this project is sold to.
    * The future Developer that may work on the project

## **System Architecture: The Three Tier Architecture:**

    To develop this project, the architecture that we are implementing is Three Tier Architecture. The Frontend, Backend and Data Storage Layer together called as Three Tier Architecture.

### **Frontend**

    The Frontend is built up using Angular that has amazing features that makes user interaction and logic implementation a breeze thanks to its single page routing model. All the logics that require manipulation of data on client&#39;s side are handled here.

### **Backend**

    The Backend is handled by Laravel that will give secured access to the database that is used. It also gives us the freedom to develop wide application logics on server side without compromising the security model of the project.

### **Data Storage Layer**

    The Data Storage Layer will record all information required by the APIs developed in the backend. This data will include the details of the house/apartment, the general user and admin user information and much more. All passwords stored in the database will be encrypted to prevent unauthorized access. Within the Data Storage Layer, a collection of SQL Queries will provide access to the data in a meaningful way.

<br /><br /><br />

## **Database Description**

    The Database for this project consists of 5-6 tables and can be deployed by making a database, editing the credentials in the .env file of the backend and running the following command
<br />

    php artisan migrate

<br />

    this will setup the database for the project

### Admin Panel Credentials

    The admin panel can be accessed via following credentials.

    Username: [admin@admin.com](mailto:admin@admin.com)

    Password: 12345678

    It can be changed in the profiles page.

## **Project Requirements Specification**

### *Introduction*

#### **Purpose**

    The main objective of this document is to illustrate the requirements of this project. The document gives the detailed description of the both functional and non-functional requirements of the project

#### **Document Conventions**

    The following are the list of conventions and acronyms used in this document and the project as well:

    - Administrator: A login id representing a user with user administration privileges to the software
    - User: A general login id assigned to most users
    - Client: Intended users for the software
    - Frontend: The section of the assignment referring to what the user interacts with directly.
    - Backend: The section of the assignment referring to the backend. This is where all computations are completed and server-side logics are written.
    - Database: The section of the assignment referring to where all data is stored

#### **Intended Audience and Reading Suggestions**

    The intended audiences for this document are:

    * One who owns the project and is ready to deploy int in production

### **Overall Description**

#### **Product Perspective**

    The **Housing Street Project** is meant to make the users and new residents life a breeze by helping them search places near them that are available to buy/rent. It also helps the dealer and the rental company to reach their target audience more efficiently and effectively.

#### **Product Features**

    There are two different users who will be using this product:

        * Admins, companies and the dealers that will use this project to manage houses

        * House Seeking Users who will be accessing the website.

#### **User Documentation**

    The product will include user manual. The user manual will include product overview, complete configuration of the used software (such as SQL server), technical details, backup procedure and contact information which will include email address. The product will be compatible with all the modern browsers present. The databases will be created in the MySQL.

#### Assumptions and Dependencies

    The product needs following third party product.

    * Online MySQL server to store the database.

    * Shared hosting that supports Laravel and Angular or a secured VPS on which Backend and database server will be deployed

    * Hosting to host frontend.

### **Non Functional Requirements**

#### **Hardware Interfaces**

    **Server Side:**

    * Operating System: Ubuntu or windows-based VPS.

    * Processor: 2 or more vcpus.

    * RAM: 2048 Mb or more

    * Hard Drive: 500 GB or more

#### **Client side:**

    * Operating System: Windows xp or above, MAC or LINUX.

    * Processor: Pentium III or 2.0 GHz or higher.

    * RAM: 256 Mb or more

    * Modern Browser( Safari, Chrome or Firefox) .

#### **4.4. Communications Interfaces**

    The Customer must connect to the Internet to access the Website:

    * Dialup Modem of 52 kbps

    * Broadband Internet

    * Dialup or Broadband Connection with an Internet Provider.


#### Oauth2 is implemented using passport 

## [Link to the Hosted Site!](https://www.housingstreet.com)

