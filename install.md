# Installation Guide for Grammagic

**Grammagic** is a web application designed to teach English grammar through interactive lessons and quizzes over 21 days. This guide is intended to facilitate a smooth setup process for the project. The source code has been provided, and by carefully following the steps below, you can successfully run the application on your system.

## Prerequisites

To run Grammagic, please ensure the following tools are installed on your system:

1. **PHP (version 8.0 or higher)**:
   - The programming language used by Grammagic.
   - Visit [php.net](https://www.php.net/downloads.php) and download the version compatible with your operating system (Windows, macOS, or Linux). Version "PHP 8.0" or later is recommended.
   - Installation instructions:
     - **Windows**: Download and extract the zip file, then follow the website’s instructions.
     - **macOS**: Use Homebrew (`brew install php@8.0`) or download from the website.
     - **Linux**: Use your package manager (e.g., `sudo apt install php` on Ubuntu).
   - Verify installation by running `php -v` in a terminal to display the PHP version.

2. **Composer**:
   - A tool for managing PHP dependencies.
   - Visit [getcomposer.org](https://getcomposer.org/download/) and follow the installation instructions.
     - **Windows**: Download and run the `.exe` installer.
     - **macOS/Linux**: Copy and run the installation commands in a terminal.
   - Verify installation by running `composer --version`.

3. **Node.js and npm**:
   - Tools required for the application’s front-end (designed with Tailwind CSS).
   - Visit [nodejs.org](https://nodejs.org/) and download the "LTS" version.
     - **Windows/macOS**: Download and run the installer.
     - **Linux**: Use your package manager (e.g., `sudo apt install nodejs npm` on Ubuntu).
   - Verify installation by running `node -v` and `npm -v`.

4. **SQLite**:
   - A lightweight database used by Grammagic, typically included with PHP.
   - If issues arise, visit [sqlite.org](https://www.sqlite.org/download.html) for installation.

5. **Web Browser**:
   - Use a standard browser such as Chrome, Firefox, or Edge.

**Recommendation**: If you need assistance installing these tools, search online for “install [tool name] on [Windows/macOS/Linux]” or consult a technical colleague.

## Setup Instructions

To set up Grammagic, you will use a **terminal** or **command line**:
- **Windows**: Open “Command Prompt” or “PowerShell” from the Start menu.
- **macOS/Linux**: Open the “Terminal” application.

### 1. Extract the Source Code
- The Grammagic source code has been provided as a zip file or folder.
- Extract it to a location such as your Desktop or a folder like `C:\Projects`.
- In the terminal, navigate to the project folder. For example, if extracted to `Desktop/grammagic`:
  ```bash
  cd Desktop/grammagic
  ```
- **Tip**: To find the exact folder path:
  - **Windows**: Right-click the Grammagic folder, select Properties, and copy the path from the General tab (e.g., `C:\Users\YourName\Desktop\grammagic`).
  - **macOS/Linux**: Drag the folder into the terminal to display its path.
  - Use the path in the `cd` command (e.g., `cd C:\Users\YourName\Desktop\grammagic`).

### 2. Install PHP Dependencies
- Run the following command in the terminal:
  ```bash
  composer install
  ```
- This downloads required PHP files and may take a few minutes.
- If an error occurs, please verify that PHP and Composer are correctly installed.

### 3. Install Front-End Dependencies
- Run these commands in sequence:
  ```bash
  npm install
  npm run build
  ```
- These commands prepare the application’s front-end (page designs).
- If an error occurs, ensure Node.js and npm are installed.

### 4. Configure the Environment File
- Run the following command to create the configuration file:
  ```bash
  cp .env.example .env
  ```
- This creates a `.env` file in the project folder.

### 5. Generate Application Key
- Run the following command:
  ```bash
  php artisan key:generate
  ```
- This generates a secure key for the application.

### 6. Set Up the Database
- Run the following command:
  ```bash
  php artisan migrate --seed
  ```
- This sets up the database and adds sample data (e.g., lessons).
- If an error occurs, ensure SQLite is properly installed.

### 7. Add the Metis AI API Key
- Grammagic uses GPT-4o-mini technology for intelligent quiz feedback and automatic correction. This feature is essential for the application, as quizzes cannot be corrected without it. To obtain the API key, please follow these steps:
  1. Visit [Metis AI](https://metisai.ir/).
  2. Sign up or log in with your account.
  3. Navigate to the dashboard or account settings and locate an option such as “API Keys” or “Generate API Key.”
  4. Create a new API key and copy it. The key is displayed only once, so store it securely.
  5. Open the `.env` file in the project folder using a text editor (e.g., Notepad or Notepad++).
  6. Add the following line at the end of the file:
     ```
     OPENAI_API_KEY=your_openai_api_key_here
     ```
  7. Replace `your_openai_api_key_here` with the API key obtained from Metis AI.
- **Note**: The API key is required to enable automatic quiz correction. Please complete this step carefully.

### 8. Start the Local Server
- Run the following command:
  ```bash
  php artisan serve
  ```
- You will see a message like `Server running on [http://127.0.0.1:8000]`.
- Open your web browser and navigate to `http://localhost:8000` to view Grammagic.

### 9. Explore the Application
- On the Grammagic page, sign up or log in.
- Review daily lessons, take quizzes, and view intelligent feedback (with the API key enabled).
- Check your progress in the dashboard.

## Troubleshooting

If you encounter issues, the following solutions may help:

1. **Commands like `php` or `composer` don’t work**:
   - Ensure PHP and Composer are installed.
   - Run `php -v` and `composer --version` to verify.
   - Search online for “add PHP to PATH [Windows/macOS/Linux]” or “add Composer to PATH” if needed.

2. **Commands like `node` or `npm` don’t work**:
   - Verify Node.js and npm installation with `node -v` and `npm -v`.
   - Reinstall from [nodejs.org](https://nodejs.org/) if necessary.

3. **Database errors**:
   - Ensure SQLite is included with PHP (run `php -m | grep sqlite`).
   - If issues persist, install SQLite from [sqlite.org](https://www.sqlite.org/download.html).

4. **Server doesn’t start**:
   - If port 8000 is in use, try:
     ```bash
     php artisan serve --port=8001
     ```
   - Then visit `http://localhost:8001`.

5. **Grammagic page doesn’t load**:
   - Confirm the server is running with `php artisan serve`.
   - Ensure the URL (`http://localhost:8000`) is entered correctly.
   - Search any browser error messages online.

6. **Quiz feedback and correction don’t work**:
   - Verify the API key in the `.env` file is correct and obtained from [Metis AI](https://metisai.ir/).
   - Contact Metis AI support or use the project’s contact information if issues persist.

**Support**: For any issues, search the error message online or contact us using the details provided in the project documentation.

## Notes for Esteemed Judges

- **Ease of Setup**: This guide is designed to ensure Grammagic can be set up with minimal complexity.
- **Importance of API Key**: The API key from Metis AI is essential for automatic quiz correction. Please complete this step to experience the full functionality.
- **Time Required**: Initial setup (installing tools and running steps) may take 15 to 30 minutes, depending on your system and internet speed.
- **Support**: If you need assistance, please contact us using the provided project contact details for prompt resolution.

## Next Steps

Once Grammagic is running:
- Visit `http://localhost:8000` in your browser.
- Sign up and explore daily lessons.
- Take quizzes and view intelligent feedback.
- Monitor progress in the dashboard.

Thank you for reviewing the Grammagic project. It is designed to provide a simple and interactive way to learn English grammar, and we hope it offers a valuable experience.