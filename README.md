# Just Scrapping Studios Web Application

Laravel based web application for Just Scrapping Studios, allowing users to enroll in courses, training sessions, and competitions, as well as book various services. The application includes user authentication, admin management, and a dynamic user interface.

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
   git clone <repository_url>
   cd <repository_directory>
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
   * Update database credentials and other necessary settings.
6. Run migrations:
   ```bash
   php artisan migrate
   ```
7. Seed the database (optional):
   ```bash
   php artisan db:seed
   ```
9. Compile assets:
   ```bash
   npm run dev
   ```

---

### Run the Development Server

1. Preferred method:
   ```bash
   php artisan serve
   ```
2. Alternate method (if the above doesn’t work):
   ```bash
   cd ../just-scrapping-studios/public
   php -S 127.0.0.1:80
   ```


---

## Project Description

### Flow of the Project

The application enables users to:

* Enroll in courses, training sessions, and competitions.
* Book services.
* Access dynamic user and admin management features.

---

## Detailed Description

### Migrations

Migrations create and manage the database schema. Key migrations include:

* `create_users_table`: Users table.
* `create_courses_table`: Courses table.
* `create_trainings_table`: Trainings table.
* `create_competitions_table`: Competitions table.
* `create_bookings_table`: Bookings table.
* `create_enrollments_table`: Enrollments table.
* `create_general_requests_table`: General requests table.

### Models

Models define data and business logic:

* `User`: Represents a user.
* `Course`: Represents a course.
* `Training`: Represents a training session.
* `Competition`: Represents a competition.
* `Booking`: Represents a booking.
* `Enrollment`: Represents an enrollment.
* `GeneralRequest`: Represents a general request.

### Controllers

Controllers manage request logic:

* `AuthController`: User authentication.
* `CourseController`: Courses management.
* `TrainingController`: Trainings management.
* `CompetitionController`: Competitions management.
* `BookingController`: Bookings management.
* `EnrollmentController`: Enrollments management.
* `GeneralRequestController`: General requests management.

### Routes

Application endpoints are defined in:

* **`web.php`** : Main routes file.
* Authentication routes: `Auth::routes()`.
* Resource routes: Courses, trainings, competitions, bookings, enrollments, and general requests.

### Views

HTML templates for rendering pages:

* `layouts/app.blade.php`: Main layout.
* `home.blade.php`: Home page.
* `courses/index.blade.php`: List of courses.
* `trainings/index.blade.php`: List of training sessions.
* `competitions/index.blade.php`: List of competitions.
* `bookings/index.blade.php`: List of bookings.
* `enrollments/index.blade.php`: User enrollments and bookings.
* `admin/general_requests.blade.php`: Admin general requests.

---

## Course Learning Outcomes (CLOs) Fulfilled

### **CLO 3** : Build Static and Dynamic Websites and Applications

* Implements dynamic features like user authentication and service management.
* JavaScript enhances interactivity (DOM manipulation, dynamic styling, form validation).

### **CLO 4** : Produce Solutions Using Web-Oriented Programming Constructs

* Solves programming challenges with JavaScript for dynamic content and user interface improvements.
* Examples include form validation and dynamic content loading.

### **CLO 5** : Perform Effectively as a Member of a Team

* Team collaboration for design, coding, and testing.
* Clear communication and task division ensured effective teamwork.

---

Enjoy building with  **Just Scrapping Studios Web Application** ! 🚀

Here's the updated **Run the development server** section:

---

### Run the Development Server

1. Preferred method:
   ```bash
   php artisan serve
   ```
2. Alternate method (if the above doesn’t work):
   ```bash
   cd ../just-scrapping-studios/public
   php -S 127.0.0.1:80
   ```
