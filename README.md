# CarRental - PHP Car Rental System

## Overview
CarRental is a web-based car rental management system built using PHP and MySQL. The project provides a seamless experience for users to browse, book, and manage car rentals while allowing admins to oversee the entire process.

## Features
- **User Authentication**: Secure login and registration system for customers and admins.
- **Car Listings**: View available cars with details like price, model, and availability.
- **Booking System**: Rent a car by selecting available dates and processing payments.
- **Admin Dashboard**: Manage cars, bookings, and users efficiently.
- **Search & Filter**: Search for cars based on criteria such as model, price, and availability.

## Technologies Used
- **Frontend**: HTML, CSS, JavaScript, Bootstrap
- **Backend**: PHP (Core PHP & MySQL)
- **Database**: MySQL
- **Tools & Libraries**: XAMPP/WAMP, AJAX, jQuery

## Installation
1. Clone the repository:
   ```sh
   git clone https://github.com/chandumummadi/CarRental.git
   ```
2. Move the project folder to your local server directory (e.g., `htdocs` in XAMPP).
3. Import the `car_rental.sql` file into your MySQL database.
4. Update database credentials in `config.php`:
   ```php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'your_username');
   define('DB_PASSWORD', 'your_password');
   define('DB_NAME', 'car_rental');
   ```
5. Start Apache and MySQL in XAMPP/WAMP.
6. Open a browser and go to `http://localhost/CarRental`.

## Usage
- **Users**: Register, log in, browse cars, and make bookings.
- **Admins**: Manage users, cars, and bookings from the admin panel.

## Future Enhancements
- Advanced search filters
- Improved UI/UX
- Mobile responsiveness

## Contribution
Contributions are welcome! Feel free to fork the repository and submit pull requests.

## License
This project is licensed under the MIT License.

## Contact
For queries, feel free to reach out via GitHub Issues.

---
**Author**: Sharath Chandra Mummadi  
GitHub: [@chandumummadi](https://github.com/chandumummadi)

