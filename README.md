# Travel Form

A web application for managing travel registration for college students interested in the college trip.

## 🌐 Live Website

**Website is now live!** Visit: https://nikhilpatnaiktravelproject.wuaze.com/index.php

Hosted on **InfinityFree** - Free Web Hosting

## Features

- User-friendly form to collect participant details
- MySQL database integration for storing registrations
- Responsive design with custom styling
- Form validation and error handling
- Prepared statements for secure database queries
- Production-ready with environment configuration

## Tech Stack

- **Frontend:** HTML5, CSS3, JavaScript
- **Backend:** PHP
- **Database:** MySQL
- **Hosting:** InfinityFree (infinityfree.com)
- **Server:** Apache

## Installation (Local Development)

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

## Deployment on InfinityFree

1. Upload all files to InfinityFree via FTP
2. Create MySQL database through InfinityFree control panel
3. Create `.env` file with database credentials:
```
DB_HOST=sql211.infinityfree.com
DB_USER=your-username
DB_PASS=your-password
DB_NAME=your-database-name
```
4. Access your live website

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
├── style.css          # Styling
├── index.js           # JavaScript functionality
├── Rit_image.webp     # Background image
├── .env               # Environment variables
├── .gitignore         # Git ignore rules
└── README.md          # This file
```

## Usage

1. Visit https://nikhilpatnaiktravelproject.wuaze.com/index.php
2. Fill out all form fields
3. Click the **Submit** button
4. Data is stored in MySQL database
5. Success message displays upon submission

## Security Features

- ✓ Prepared statements to prevent SQL injection
- ✓ Input sanitization and validation
- ✓ Type checking for database parameters
- ✓ Environment variables for sensitive data
- ✓ Error logging without exposing details

## Database Schema

| Column | Type | Description |
|--------|------|-------------|
| sno | INT | Primary key (Auto-increment) |
| name | VARCHAR(100) | Participant's name |
| age | INT | Participant's age |
| gender | VARCHAR(20) | Participant's gender |
| mail | VARCHAR(100) | Email address |
| phone | VARCHAR(15) | Phone number |
| desc | VARCHAR(500) | Additional info |
| dt | TIMESTAMP | Registration timestamp |

## Environment Variables

Create a `.env` file in the root directory:

```
DB_HOST=your-database-host
DB_USER=your-database-user
DB_PASS=your-database-password
DB_NAME=your-database-name
```

**Note:** `.env` file is ignored by Git for security reasons.

## Author

Created by Nikhil Patnaik for RIT Travel Program

## License

MIT License - Feel free to use this project for your own purposes.

## Support

For issues or questions, please create an issue on GitHub.
