# Just Scrapping Studios Web Application

A comprehensive web application for managing courses, trainings, competitions, bookings, and general requests. This application supports both user and admin roles, featuring authentication, dashboards, and dynamic interactions.

---

## Project Setup

### Prerequisites

* **PHP >= 7.3**
* **Composer**
* **Node.js & npm**
* **MySQL**

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/mtauha/just-scrapping-studios
   cd just-scrapping-studios
   ```
2. Install dependencies:

   ```bash
   composer install
   npm install
   ```
3. Copy the `.env.example` file to `.env`:

   ```bash
   cp .env.example .env
   ```
4. Generate an application key:

   ```bash
   php artisan key:generate
   ```
5. Configure the `.env` file:

   * Update database credentials and other settings.
6. Run migrations:

   ```bash
   php artisan migrate
   ```
7. Seed the database:

   ```bash
   php artisan db:seed
   ```
8. Run the development server:

   ```bash
   php artisan serve
   ```

   * **Alternate method** :

   ```bash
   cd ../just-scrapping-studios/public
   php -S 127.0.0.1:80
   ```
9. Compile assets:

   ```bash
   npm run dev
   ```

---

## First Login Information

### Admin User

* **Email** : `admin@example.com`
* **Password** : `password`

### Regular User

* **Email** : `user@example.com`
* **Password** : `password`

> **Note** : Change default passwords after the first login for security.

---

## Flow of the Project

### User Registration and Authentication

* Users can register and log in.
* Admins have a special role for application management.

### Dashboard

* Users see options like Courses, Trainings, Competitions, Bookings, and General Requests.

### Courses

* Users can view, enroll, and manage courses.
* Admins can add, edit, and delete courses.

### Trainings

* Users can view, enroll, and manage training sessions.
* Admins can add, edit, and delete training sessions.

### Competitions

* Users can view, enroll, and manage competitions.
* Admins can add, edit, and delete competitions.

### Bookings

* Users can book services like Coffee and Relaxation Area or Kids Play Area.
* Admins can view and manage all bookings.

### General Requests

* Users submit requests for courses, trainings, competitions, or bookings.
* Admins can approve or reject these requests.

### Enrollments

* Users view their enrollments and bookings, including details like course name, type, date, and duration.

---

## Detailed Description

### Migrations

Key migrations include:

* `create_users_table`: Users table.
* `create_courses_table`: Courses table.
* `create_trainings_table`: Trainings table.
* `create_competitions_table`: Competitions table.
* `create_bookings_table`: Bookings table.
* `create_enrollments_table`: Enrollments table.
* `create_general_requests_table`: General requests table.
* `add_duration_to_general_requests_table`: Adds the `duration` column to general requests.
* `add_enrollment_type_to_enrollments_table`: Adds the `enrollment_type` column to enrollments.

### Models

Key models include:

* `User`: Represents users.
* `Course`: Represents courses.
* `Training`: Represents training sessions.
* `Competition`: Represents competitions.
* `Booking`: Represents bookings.
* `Enrollment`: Represents enrollments.
* `GeneralRequest`: Represents general requests.

### Controllers

Key controllers include:

* `AuthController`: Handles authentication.
* `CourseController`: Manages courses.
* `TrainingController`: Manages trainings.
* `CompetitionController`: Manages competitions.
* `BookingController`: Manages bookings.
* `EnrollmentController`: Manages enrollments.
* `GeneralRequestController`: Manages general requests.

### Routes

* Defined in `web.php`.
* Includes `Auth::routes()` for authentication.
* Resource routes for courses, trainings, competitions, bookings, enrollments, and general requests.

### Views

Key views include:

* `layouts/app.blade.php`: Main layout.
* `home.blade.php`: Home page.
* `courses/index.blade.php`: Courses list.
* `trainings/index.blade.php`: Trainings list.
* `competitions/index.blade.php`: Competitions list.
* `bookings/index.blade.php`: Bookings list.
* `enrollments/index.blade.php`: User enrollments and bookings.
* `admin/general_requests.blade.php`: Admin view for general requests.

---

## Course Learning Outcomes (CLOs)

### **CLO 3** : Build Static and Dynamic Websites and Applications

* Dynamic features like user authentication, enrollments, and bookings.
* JavaScript for DOM manipulation, dynamic styling, and form validation.

### **CLO 4** : Produce Solutions Using Web-Oriented Programming Constructs

* Solves challenges with JavaScript for dynamic content and user inputs.
* Examples: Form validation, dynamic content loading.

### **CLO 5** : Perform Effectively as a Member of a Team

* Collaborative design, coding, and testing.
* Clear communication and task division ensured smooth teamwork.

---

## Example Flow

1. **User Registration** :

* New users register and their data is stored in the `users` table.

1. **User Login** :

* Users log in and are redirected to the dashboard.

1. **Viewing Courses** :

* The `CourseController` fetches courses and passes them to `courses/index.blade.php`.

1. **Enrolling in a Course** :

* Enrollment data is stored in the `enrollments` table with `enrollment_type` set to course.

1. **Submitting a General Request** :

* Request data is stored in the `general_requests` table.

1. **Admin Approving a Request** :

* Approved data moves from the `general_requests` table to the `enrollments` table.
