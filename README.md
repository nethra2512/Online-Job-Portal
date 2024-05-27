# Job Portal

This is a simple Job Portal web application that allows users to register, log in, filter and view job listings, and apply for jobs.

## Features

- User registration and login.
- Filter job listings by domain and tenure.
- Display job details including title, description, and company name.
- Apply Now button for each job listing.
- Submit job applications.

## Prerequisites

- PHP 7.0 or higher
- MySQL
- Web server (e.g., Apache, Nginx)

## Setup

1. **Clone the repository:**

    ```sh
    git clone https://github.com/your-username/online-job-portal.git
    ```

2. **Navigate to the project directory:**

    ```sh
    cd online-job-portal
    ```

3. **Create the MySQL database and table:**

    ```sql
    CREATE DATABASE jobport;
    USE jobport;

    CREATE TABLE joblisting (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        domain VARCHAR(255) NOT NULL,
        tenure VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        company VARCHAR(255) NOT NULL
    );
    
    CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL,
        password VARCHAR(255) NOT NULL
    );
    
    CREATE TABLE applications (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        job_id INT NOT NULL,
        cover_letter TEXT,
        FOREIGN KEY (user_id) REFERENCES users(id),
        FOREIGN KEY (job_id) REFERENCES joblisting(id)
    );
    ```

4. **Insert initial job listings:**

    ```sql
    INSERT INTO joblisting (title, domain, tenure, description, company)
    VALUES 
        ('Software Engineer', 'IT', 'Full-time', 'Seeking a skilled software engineer to join our development team.', 'Tech Solutions'),
        ('Database Administrator', 'IT', 'Contract', 'Looking for a database administrator to manage and optimize our databases.', 'Data Corp'),
        ('Financial Analyst', 'Finance', 'Full-time', 'Seeking a skilled financial analyst to analyze financial data and provide insights.', 'Finance Inc'),
        ('Investment Banker', 'Finance', 'Full-time', 'We are hiring an investment banker to advise clients on financial transactions and investment strategies.', 'Banking Pros'),
        ('Marketing Manager', 'Marketing', 'Full-time', 'Seeking a highly motivated marketing manager to develop and implement marketing strategies.', 'Market Leaders'),
        ('Marketing Coordinator', 'Marketing', 'Contract', 'Looking for a marketing coordinator to assist in executing marketing campaigns on a contractual basis.', 'Market Leaders'),
        ('Social Media Specialist', 'Marketing', 'Part-time', 'We are hiring a part-time social media specialist to manage our social media accounts and engage with our audience.', 'Social Media Corp'),
        ('Full Stack Developer', 'Web Development', 'Full-time', 'Seeking a skilled full stack developer to work on web development projects full-time.', 'Web Wizards'),
        ('Frontend Developer', 'Web Development', 'Contract', 'Looking for a frontend developer to work on a contractual basis.', 'Web Wizards'),
        ('Backend Developer', 'Web Development', 'Part-time', 'We are hiring a part-time backend developer to assist in backend development tasks.', 'Web Wizards'),
        ('Registered Nurse', 'Healthcare', 'Full-time', 'Seeking a registered nurse to provide patient care and assist doctors.', 'HealthCare Solutions'),
        ('Medical Assistant', 'Healthcare', 'Full-time', 'Looking for a medical assistant to support healthcare professionals in patient care.', 'HealthCare Solutions'),
        ('Pharmacy Technician', 'Healthcare', 'Part-time', 'We are hiring a part-time pharmacy technician to assist in preparing and dispensing medications.', 'HealthCare Solutions'),
        ('Healthcare Assistant', 'Healthcare', 'Contract', 'Seeking a healthcare assistant to work on a contractual basis providing support to healthcare professionals.', 'HealthCare Solutions');
    ```

5. **Configure database connection:**

    Open `joblisting.php`, `login.php`, `register.php`, and `apply.php` and update the database connection details:

    ```php
    $conn = new mysqli("localhost", "root", "your-password", "jobport");
    ```

6. **Run the application:**

    - Start your web server and navigate to the project directory.
    - Access the application through your web browser (e.g., `http://localhost/online-job-portal`).

## Usage

1. **Open the main page in your web browser:**
    - `index.html`: The main HTML file with the filter form.

2. **User registration and login:**
    - `register.html` and `register.php`: For user registration.
    - `login.html` and `login.php`: For user login.

3. **Filter and view job listings:**
    - `joblist.php`: To handle form submission and display filtered job listings.

4. **Apply for jobs:**
    - `apply.html` and `apply.php`: To handle job applications.

## Project Structure

- `index.html`: The main HTML file with the filter form.
- `joblist.php`: The PHP script to handle form submission and display filtered job listings.
- `apply.html`: HTML file for the job application form.
- `apply.php`: PHP script to handle job application submissions.
- `login.html`: HTML file for user login.
- `login.php`: PHP script to handle user login.
- `register.html`: HTML file for user registration.
- `register.php`: PHP script to handle user registration.
- `script.js`: JavaScript file for additional client-side functionalities.
- `style.css`: CSS file for styling the application.
- `success.html`: HTML file to display a success message after successful operations.





