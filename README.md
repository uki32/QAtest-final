App Name
This is the README file for the Web Shop Management application. <br>

-Description<br>
The Web Shop Management application is a web application that provides user login functionality and allows different roles (administrator, moderator, and user) to perform various actions based on their assigned privileges. The application includes features such as user management, product management, order placement, and logging of administrative and moderation actions.<br>

-Installation and Setup<br>
To run the Web Shop Management application, follow these steps:<br>

Clone the repository from [repository URL].<br>
Navigate to the project directory.<br>
Set up a web server (Apache) and configure it to point to the project's public directory.<br>
Create a MySQL database and import the provided database dump file [qa-test.sql] located inside database folder with the path QAtest-final/database.<br>
Configure the database connection settings same as in the application's 'pdo.php' file.<br>

Install the required dependencies by running the following command:<br>

composer install.<br>
Start the web server.<br>
Open a web browser and access the application using the URL http://localhost/QAtest-final/vendor/mikecao/flight. You should be redirected to the login page.<br>

Usage<br>

User Login<br>
Open the Web Shop Management application in a web browser.<br>
On the login page, enter your credentials (username and password) and click the "Login" button.<br>

For the testing purposes predefined users credencials are:<br>
-for administrator/ username admin, password admin<br>
-for moderator moderator/moderator<br>
-for user/ user1/user1<br>

User Roles and Permissions<br>
Administrator: Has full access to all features and functionalities of the application, including user and product management, order placement, and viewing logs.<br>
When logged administrator tries to delete themself inside the user management page they get an<br>
error message that they cannot delete themselves.<br>

Moderator: Can manage products and product types, view logs, and has limited access to user management.<br>

User: Can view products, add them to the cart, and place orders.<br>

Pages and Functionality<br>
Login Page: Allows users to log in to the application using their credentials.<br>

User Management Page (Administrator Only):<br>
Displays a list of current users and their roles.<br>
Allows editing, deleting, and creating new users.<br>

Product and Product Type Management Pages (Administrator and Moderator Only):<br>
Enables administrators and moderators to create, edit, and delete product types and products.<br>

Product Listing with Shopping Cart Page (User Only):<br>
Shows a list of available products.<br>
Allows users to add products to their cart.<br>

Shopping Cart:<br>
Displays the products added to the user's cart.<br>
Provides an option to confirm the order.<br>

Order Confirmation and Logging:<br>
After confirming the order, the order details are saved in the database, and the cart is reset.<br>
Logging functionality records administrative and moderation actions such as adding and deleting products.<br>

Testing<br>
To test the Web Shop Management application, perform the following steps:<br>

Make sure the application is running and accessible through a web browser.<br>

Create user accounts with different roles (administrator, moderator, and user).<br>

Log in with each role and test the corresponding functionalities based on the provided description.<br>
Verify that appropriate error messages are displayed when incorrect inputs are provided.<br>

Also try deleting an user that have made the order, an error message will appear.<br>

Built With<br>
[PHP/FlightFramework]<br>
Authors<br>
[Uros Kurcubic] - [uros.kurcubic@hotmail.com]<br>
