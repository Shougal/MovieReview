# Movie Rating App

## Authors
- Shoug Alharbi
- Rob Keys

## Project Overview
This application allows users to rate and review movies. Ratings and reviews are stored in a database and reflected dynamically on the user interface. The app features a secure login system, personalized user pages, and a recommendation engine that suggests movies based on user preferences.

## Features

### Authentication and User Accounts
- **Login Page:** Users can create accounts with a username and password. Support for Google OAuth is planned for secure and convenient login.
- **Account Page:** Users can view their account details, change their password, and see statistics like the number of movies rated.

### Movie Interaction
- **Home Page:** A landing page that provides navigation across the site and displays key user information or login prompts.
- **Movie Rating Page:** Users can rate movies and write reviews based on multiple categories such as feel-good, funny, thriller, etc.
- **Viewed Movies:** Displays a list of movies a user has rated previously with options to edit ratings and reviews.
- **Recommendations Page:** Suggests movies to the user based on algorithmic analysis of their ratings compared to others in the database.

### UI and Navigation
- Consistent navigation bar across all pages for easy access to different sections of the site.
- Streamlined content display on the home page to highlight user’s top-rated movies and facilitate navigation to other sections.

### Backend and Data Management
- **Data Persistence:** Stores user data (username, email, password hash) and movie data (bio, average rating, number of ratings) in a database.
- **State Management:** Utilizes tokens (refresh and access) stored in local storage, with potential adjustments due to unfamiliarity with PHP.
- **Asynchronous Data Handling:** Uses JavaScript and potentially axios for backend communication to fetch and display data dynamically.

## Technologies Used
- **Frontend:** HTML, CSS, JavaScript (possibly using axios for HTTP requests)
- **Backend:** TBD (considering PHP; open to suggestions)
- **Database:** SQL-based database for storing user and movie data
- **Authentication:** Google OAuth (planned)

## Setup and Installation
Instructions on how to set up and run the project locally, including any required installations or dependencies.

## Future Enhancements
- Implementation of Google OAuth for enhanced security and user convenience.
- Further development of the recommendation algorithm to improve accuracy and user satisfaction.
- Exploration of more robust state management solutions compatible with PHP.
