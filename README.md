# Travel Form

A web application for managing travel registration for college students interested in the college trip.

## Features

- User-friendly form to collect participant details
- MySQL database integration for storing registrations
- Responsive design with custom styling
- Form validation and error handling
- Prepared statements for secure database queries

## Tech Stack

- **Frontend:** HTML5, CSS3, JavaScript
- **Backend:** PHP
- **Database:** MySQL
- **Server:** Apache (XAMPP)

## Installation

1. Clone the repository:
```bash
git clone https://github.com/your-username/np-travel-form.git
cd np-travel-form
```

2. Place the project in `C:\xampp\htdocs\np`

3. Start Apache and MySQL using XAMPP

4. Create the database and table:
```sql
CREATE DATABASE trip;

CREATE TABLE `trip`.`trip` (
  `sno` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `age` INT NOT NULL,
  `gender` VARCHAR(20) NOT NULL,
  `mail` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(15) NOT NULL,
  `desc` VARCHAR(500),
  `dt` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

5. Access the form at `http://localhost/np/`

## Form Fields

- **Name:** Participant's full name
- **Age:** Participant's age
- **Gender:** Participant's gender
- **Email:** Contact email address
- **Phone:** Contact phone number
- **Description:** Additional information

## Project Structure

```
np-travel-form/
├── index.php          # Main PHP backend
├── index.html         # Form HTML
├── style.css          # Styling
├── index.js           # JavaScript functionality
├── Rit_image.webp     # Background image
└── README.md          # This file
```

## Usage

1. Fill out all form fields
2. Click the **Submit** button
3. Data is stored in MySQL database
4. Success message displays upon submission

## Security Features

- Prepared statements to prevent SQL injection
- Input sanitization and validation
- Type checking for database parameters

## Author

Created for RIT Travel Program

## License

MIT License
