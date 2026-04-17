# HeartCare — Comprehensive Heart Health Monitoring System

Bangladesh's dedicated cardiac health platform connecting patients with specialist cardiologists, top-tier hospitals, and emergency services nationwide.

## Features

- **Patient & Physician Registration** — Dual-role signup with NID-based authentication
- **Appointment Booking** — Schedule consultations with cardiologists
- **Hospital Directory** — 80+ partner hospitals across 8 divisions
- **Bed Booking** — Reserve hospital beds in advance
- **Medicine Guide** — Medication recommendations by cardiac condition
- **Health Recommendations** — Diet, exercise, tests, and lifestyle guidance
- **Diagnosis Data** — Monthly trend charts for 10 cardiac conditions
- **Medical History** — Patient record management
- **Analytics Dashboards** — Patient demographics and physician network stats
- **24/7 Ambulance Info** — Emergency contact and service details

## Tech Stack

| Layer | Technology |
|---|---|
| Frontend | HTML5, CSS3, Vanilla JavaScript |
| Backend | PHP 8+ (procedural, no framework) |
| Database | MySQL 8 (`hospitalmanagement`) |
| Charts | Chart.js |
| Icons | Font Awesome 6 |
| Font | Inter (Google Fonts) |

No build step — files are served directly from a PHP web server.

## Setup

### Requirements
- PHP 8.0+
- MySQL 8.0+
- Apache/Nginx (XAMPP or Laragon on Windows)

### Installation

1. Clone the project into your web server root (e.g. `C:/xampp/htdocs/`)
2. Create the database and import schema:
   ```bash
   mysql -u root -p -e "CREATE DATABASE hospitalmanagement"
   # Import each file in mysql/ into that database
   ```
3. Edit `config.php` at the project root — set `DB_PASS` to your MySQL password
4. Visit `http://localhost/Heart-Health-Monitoring-System/`

## File Structure

```
/
├── index.php               # Home page
├── login.php               # Login
├── signup.php              # Patient & physician registration
├── logout.php              # Session termination
├── config.php              # DB credentials & BASE_URL (auto-detected)
│
├── pages/                  # All feature pages
│   ├── appointment.php
│   ├── doctors.php
│   ├── hospital.php
│   ├── medicine.php
│   ├── ambulance.php
│   ├── diagnosis.php
│   ├── medical.php
│   ├── book.php
│   ├── recommended.php
│   └── analytics/
│       ├── patients.php
│       └── doctors.php
│
├── includes/               # Shared PHP partials
│   ├── header.php          # Navbar (single source of truth)
│   ├── footer.php          # Footer + script injection
│   └── auth.php            # require_login(), is_logged_in()
│
├── php/                    # POST handlers — redirect on completion
│   ├── db.php
│   ├── login.php / logout.php
│   ├── patient.php / physician.php
│   ├── appointment.php / bed.php / medical.php
│
├── assets/
│   ├── css/main.css        # Design system, nav, footer, utilities
│   ├── css/pages/          # Per-page styles
│   ├── js/main.js          # Nav toggle, counter animation
│   └── js/pages/           # Per-feature JS
│
├── images/                 # Hospital and doctor photos
├── mysql/                  # DB schema dump files
└── PS1/                    # Academic documents (ERD, proposal)
```

## Security

- All SQL uses prepared statements with `bind_param`
- Passwords hashed with `password_hash(PASSWORD_DEFAULT)`
- Input sanitized with `htmlspecialchars()` on all output
- File uploads validated to PDF only
- Session guards via `require_login()` on protected pages
