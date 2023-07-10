App Name
This is the README file for the Web Shop Management application.

-Description
The Web Shop Management application is a web application that provides user login functionality and allows different roles (administrator, moderator, and user) to perform various actions based on their assigned privileges. The application includes features such as user management, product management, order placement, and logging of administrative and moderation actions.

-Installation and Setup
To run the Web Shop Management application, follow these steps:

Clone the repository from [repository URL].
Navigate to the project directory.
Set up a web server (Apache) and configure it to point to the project's public directory.
Create a MySQL database and import the provided database dump file [database_dump.sql].
Configure the database connection settings same as in the application's 'pdo.php' file.

Install the required dependencies by running the following command:

composer install.
Start the web server.
Open a web browser and access the application using the URL http://localhost/QAtest-final/vendor/mikecao/flight. You should be redirected to the login page.

Usage

User Login
Open the Web Shop Management application in a web browser.
On the login page, enter your credentials (username and password) and click the "Login" button.

For the testing purposes predefined users credencials are:
-for administrator/ username admin, password admin
-for moderator moderator/moderator
-for user/ user1/user1

User Roles and Permissions
Administrator: Has full access to all features and functionalities of the application, including user and product management, order placement, and viewing logs.
When logged administrator tries to delete themself inside the user management page they get an
error message that they cannot delete themselves.

Moderator: Can manage products and product types, view logs, and has limited access to user management.

User: Can view products, add them to the cart, and place orders.

Pages and Functionality
Login Page: Allows users to log in to the application using their credentials.

User Management Page (Administrator Only):
Displays a list of current users and their roles.
Allows editing, deleting, and creating new users.

Product and Product Type Management Pages (Administrator and Moderator Only):
Enables administrators and moderators to create, edit, and delete product types and products.

Product Listing with Shopping Cart Page (User Only):
Shows a list of available products.
Allows users to add products to their cart.

Shopping Cart:
Displays the products added to the user's cart.
Provides an option to confirm the order.

Order Confirmation and Logging:
After confirming the order, the order details are saved in the database, and the cart is reset.
Logging functionality records administrative and moderation actions such as adding and deleting products.

Testing
To test the Web Shop Management application, perform the following steps:

Make sure the application is running and accessible through a web browser.

Create user accounts with different roles (administrator, moderator, and user).

Log in with each role and test the corresponding functionalities based on the provided description.
Verify that appropriate error messages are displayed when incorrect inputs are provided.

Also try deleting an user that have made the order, an error message will appear.

Built With
[PHP/FlightFramework]
Authors
[Uros Kurcubic] - [uros.kurcubic@hotmail.com]
