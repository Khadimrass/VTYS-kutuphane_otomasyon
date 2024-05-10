
# Koukutphane: Library Automation System

Koukutphane Library Automation System is a simple website that handles the basic operations of any library including managing books, borrowers, and loans.


## Features

- Manage book collection (add, edit, search)
- Manage borrower information (add, edit)
- Track book loans and returns
- Generate borrowing statistics
- User-friendly interface with header, navigation, and footer


## Technologies Used
### Backend
[![Php](https://www.php.net/images/logos/new-php-logo.svg)](https://www.google.com/url?sa=i&url=https%3A%2F%2Fgithub.com%2Fphp%2Fphp-src&psig=AOvVaw32ppUD69vu-52g9E9grFpG&ust=1715379118739000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCOjchqzLgYYDFQAAAAAdAAAAABAE)


### Frontend
[![frontend_trio](https://fiverr-res.cloudinary.com/images/q_auto,f_auto/gigs/153843217/original/4dd60989b231adcf1648273f970b8d3100e19264/create-a-website-using-html-css-javascript-and-bootstrap.png)](lien_URL_https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.deborahsilvermusic.com%2F%3Fm%3Dhtml-css-javascript-and-bootstrap-for-web-designers-vv-DqJb9Jcg&psig=AOvVaw0WmCmI8-zzaaOkt4WsCd4G&ust=1715379052952000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCNirjIvLgYYDFQAAAAAdAAAAABAEexterne)

### Database (MySQL)

[![Mysql](https://logowik.com/content/uploads/images/mysql8604.logowik.com.webp)](https://www.google.com/url?sa=i&url=https%3A%2F%2Flogowik.com%2Fmysql-logo-vector-51262.html&psig=AOvVaw2ieixfOA890LLNQDv_MBDY&ust=1715379403680000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCLib_bTMgYYDFQAAAAAdAAAAABAE)


## Structure
The project directory (*kutuphane_otomasyonu*) is organized as follows:

- #### *project* : Core application files
  1. *medias* : Stores website images
  2. *pages* : Individual PHP files for functionalities (add book, search, etc.)
  3. *sections* : Reusable UI components (header, footer)

- #### *index.php* : Main entry point for the website

- #### *koullibary.sql* : Defines the database structure (tables and relationships)

- #### *sqlDiagram.mwp* : Visual representation of the database schema.





## Key Functionalities:
- **Home Page:** Displays recently added books with cover images, descriptions, and "View this Book" buttons.
- **Our Books:** Lists all books in the library.
- **Add a Book:** Enables adding new book entries to the database.
- **Book Information:** Provides detailed information about a specific book, including borrowing options.
- **Borrowing:** Facilitates the borrowing process for registered students with no suspensions.
- **Statistics:** Offers a table summarizing student borrowing activity for a particular book.





## Database Design:
The database is built on MySQL Workbench and utilizes Entity-Relationship (ER) diagrams to model relationships between data entities. Key entities include:

- Books
- Writers 
- Students 
- Categories
- Languages
 

[![ER diagram](https://github.com/Khadimrass/VTYS-kutuphane_otomasyon/blob/main/kutuphane_otomasyon/Projet/medias/Capture%20d'%C3%A9cran%202024-05-10%20001422.png?raw=true)](https://github.com/Khadimrass/VTYS-kutuphane_otomasyon/blob/main/kutuphane_otomasyon/Projet/medias/Capture%20d'%C3%A9cran%202024-05-10%20001422.png)
## Prerequisites
To run this project, you are required to fulfill the following requirements

- A Web Server
- Database(MySql)
## Getting Started
