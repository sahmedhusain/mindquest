# 🧠 MindQuest

[![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?style=flat&logo=php&logoColor=white)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-8.x-FF2D20?style=flat&logo=laravel&logoColor=white)](https://laravel.com/)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE.md)

**MindQuest** is an interactive web-based assessment platform and quiz management system engineered with PHP and Laravel. Featuring user authentication, question bank management, categorized quiz sessions, real-time score evaluations, and global leaderboards.

---

## ⚡ Key Highlights

- **User Authentication**: Secure user registration, login, session management, and profile customization via Laravel Auth controllers.
- **Categorized Question Bank**: Structured models for Quizzes, Questions, and Answers with support for multiple-choice options.
- **Interactive Evaluation**: Real-time evaluation of user submissions with score calculation and performance stats.
- **Leaderboards**: Competitive ranking views displaying top scoring users per quiz category.
- **RESTful Architecture**: Clean MVC organization with Eloquent ORM database abstractions.

---

## 📋 Table of Contents

- [Key Highlights](#-key-highlights)
- [System Architecture](#-system-architecture)
- [Quiz Taking Sequence Flow](#-quiz-taking-sequence-flow)
- [Setup & Execution](#-setup--execution)
- [Project Directory Structure](#-project-directory-structure)
- [License](#-license)

---

## 🏗️ System Architecture

```mermaid
graph TD
    A[Web Client / Browser] --> B[Laravel Router & Middleware]
    B --> C{Authenticated?}
    
    C -- No --> D[Auth Controllers: Login / Register]
    C -- Yes --> E[MVC Controllers Dispatcher]
    
    E --> F1[ProfileController: User Dashboard]
    E --> F2[QuestionController: Quiz & Question Management]
    E --> F3[LeaderboardController: Global Rankings]
    
    F1 --> G[Eloquent ORM Models]
    F2 --> G
    F3 --> G
    
    G --> H1[User & Quiz Models]
    G --> H2[Question & Answer Models]
    G --> H3[Question_Quiz Pivot Model]
    
    H1 --> I[(Relational Database)]
    H2 --> I
    H3 --> I
```

---

## 📐 Quiz Taking Sequence Flow

```mermaid
sequenceDiagram
    participant User
    participant View as Blade Views / UI
    participant Router as Laravel Router
    participant Controller as QuestionController
    participant DB as Eloquent Database

    User->>View: Select Quiz Category & Start
    View->>Router: GET /quizzes/{id}
    Router->>Controller: show(quiz_id)
    Controller->>DB: Fetch Quiz + Questions + Answers
    DB-->>Controller: Quiz Model Object
    Controller-->>View: Render Quiz Interface
    
    User->>View: Select Options & Click Submit
    View->>Router: POST /quizzes/{id}/submit
    Controller->>Controller: Grade Submissions & Calculate Score
    Controller->>DB: Record Quiz Attempt & Update Leaderboard
    Controller-->>View: Render Score Summary & Ranking
```

---

## 🚀 Setup & Execution

### Prerequisites

- **PHP**: 7.4 or 8.0+
- **Composer**: Dependency manager
- **SQLite / MySQL**: Relational database engine

---

### Setup & Run

1. **Clone Repository**:
   ```bash
   git clone https://github.com/sahmedhusain/mindquest.git
   cd mindquest
   ```

2. **Install Composer Dependencies**:
   ```bash
   composer install
   ```

3. **Configure Environment**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Run Database Migrations & Seeds**:
   ```bash
   php artisan migrate --seed
   ```

5. **Start Development Server**:
   ```bash
   php artisan serve
   ```
   *MindQuest will start at `http://127.0.0.1:8000`.*

---

## 📂 Project Directory Structure

```
mindquest/
├── app/
│   ├── Http/
│   │   └── Controllers/     # Auth, Profile, Question, & Leaderboard controllers
│   ├── Models/              # User, Quiz, Question, and Answer Eloquent models
│   └── Providers/           # Service providers
├── config/                  # App, database, and auth configurations
├── database/                # Migrations, factories, and seeders
├── public/                  # Public web root
├── resources/               # Blade templates, CSS, and JS assets
├── routes/                  # Web and API routing manifests
├── composer.json            # PHP dependencies & project manifest
└── README.md                # Documentation
```

---

## 📄 License

Distributed under the MIT License. See [LICENSE](LICENSE.md) for details.
