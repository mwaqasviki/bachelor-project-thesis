# QuickMeal - Restaurant Management & Ordering System

[![PHP](https://img.shields.io/badge/PHP-7.4%2B-777BB4?style=flat-square&logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-4479A1?style=flat-square&logo=mysql&logoColor=white)](https://mysql.com)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-4.0-7952B3?style=flat-square&logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg?style=flat-square)](LICENSE)

A comprehensive restaurant management system with integrated sales prediction capabilities, developed as a Bachelor's Final Year Project. The system streamlines restaurant operations from customer ordering to kitchen management and includes an intelligent sales forecasting module.

## 📋 Table of Contents

- [🌟 Overview](#-overview)
- [✨ Features](#-features)
- [💻 System Requirements](#-system-requirements)
- [🏗️ System Architecture](#️-system-architecture)
- [🛠️ Technology Stack](#️-technology-stack)
- [📥 Installation](#-installation)
- [⚙️ Configuration](#️-configuration)
- [🚀 Usage](#-usage)
- [🔌 API Endpoints](#-api-endpoints)
- [🗄️ Database Schema](#️-database-schema)
- [📚 Documentation](#-documentation)
- [📸 Screenshots](#-screenshots)
- [🔧 Troubleshooting](#-troubleshooting)
- [🤝 Contributing](#-contributing)
- [📈 Version History](#-version-history)
- [📝 License](#-license)
- [📞 Contact](#-contact)

## 🌟 Overview

QuickMeal is a full-stack web application that revolutionizes restaurant operations by providing:
- **Customer-facing ordering system** with intuitive UI
- **Administrative dashboard** for complete restaurant management
- **Kitchen management interface** for efficient order processing
- **Sales prediction system** for inventory and business planning

The project also includes a separate Pharmacy Sales Prediction System demonstrating the versatility of the prediction algorithms.

## ✨ Features

### Customer Features
- 🍽️ Browse menu with categories and search functionality
- 🛒 Shopping cart with real-time updates
- 📱 QR code-based table ordering
- 👤 User account management and order history
- ⭐ Food ratings and reviews
- 💝 Wishlist functionality
- 🎯 Personalized food recommendations

### Admin Features
- 📊 Comprehensive dashboard with analytics
- 🍕 Food item management (CRUD operations)
- 📂 Category and menu management
- 👥 Customer and staff management
- 📋 Order tracking and status updates
- 👨‍🍳 Chef profiles and featured items
- 📈 Sales predictions and reporting
- 🔐 Role-based access control

### Kitchen Features
- 📋 Real-time order queue
- ✅ Order status management
- 🔔 Priority-based order display
- 📊 Kitchen performance metrics

### Prediction System
- 📈 Sales forecasting based on historical data
- 📊 Inventory optimization
- 💰 Revenue predictions
- 📉 Trend analysis

## 💻 System Requirements

### Minimum Requirements
- **Operating System**: Windows 10/11, macOS 10.14+, Ubuntu 18.04+
- **RAM**: 2GB minimum (4GB recommended)
- **Storage**: 500MB free disk space
- **Browser**: Chrome 90+, Firefox 88+, Safari 14+, Edge 90+
- **Screen Resolution**: 1366x768 minimum

### Server Requirements
- **PHP**: 7.4 or higher (8.0+ recommended)
- **MySQL**: 5.7 or higher (8.0+ recommended)
- **Apache**: 2.4+ with mod_rewrite enabled
- **PHP Extensions Required**:
  - mysqli
  - gd
  - fileinfo
  - json
  - session
  - mbstring

## 🏗️ System Architecture

```
Bachelor-FYP-Thesis/
├── admin/              # Admin panel
├── cook/               # Kitchen interface
├── customer/           # Customer portal
├── css/                # Stylesheets
├── fonts/              # Font assets
├── images/             # Image assets
├── includes/           # Common PHP includes
├── js/                 # JavaScript files
├── review/             # Review system
├── Prediction System/  # Sales prediction module
└── *.php               # Core application files
```

## 🛠️ Technology Stack

### Backend
- **PHP** (7.4+) - Server-side scripting
- **MySQL** (5.7+) - Database management
- **Apache/Nginx** - Web server

### Frontend
- **HTML5/CSS3** - Markup and styling
- **Bootstrap 4** - Responsive framework
- **jQuery** - JavaScript library
- **AJAX** - Asynchronous requests
- **Chart.js** - Data visualization

### Additional Libraries
- **Revolution Slider** - Homepage carousel
- **Owl Carousel** - Content sliders
- **FontAwesome** - Icons
- **Fancybox** - Image galleries

## 📥 Installation

### Prerequisites
- XAMPP/WAMP/LAMP stack
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache web server
- Git (optional)

### Step 1: Clone the Repository
```bash
git clone https://github.com/yourusername/Bachelor-FYP-Thesis.git
cd Bachelor-FYP-Thesis
```

Or download the ZIP file and extract to your web server directory.

### Step 2: Database Setup

1. Create a new MySQL database:
```sql
CREATE DATABASE quick_meal;
```

2. Import the database schema:
```bash
mysql -u root -p quick_meal < quick_meal.sql
```

3. For the prediction system (optional):
```bash
mysql -u root -p < Prediction\ System/database_structure/dp2_sales_system.sql
```

### Step 3: Configure Database Connection

Update database credentials in the following files:
- `/includes/db.php`
- `/admin/includes/db.php`
- `/customer/includes/db.php`
- `/cook/includes/db.php`
- `/Prediction System/require.php`

Example configuration:
```php
$con = mysqli_connect("localhost", "your_username", "your_password", "quick_meal");
```

### Step 4: Set Permissions

Ensure write permissions for upload directories:
```bash
chmod 755 admin/food_images/
chmod 755 admin/other_images/
chmod 755 customer/customer_images/
```

## ⚙️ Configuration

### Admin Access
Default admin credentials:
- **Email**: admin@quickmeal.com
- **Password**: admin123

⚠️ **Important**: Change these credentials after first login!

### Email Configuration
Configure SMTP settings in `/includes/functions.php` for email notifications.

### Payment Gateway
Update payment gateway credentials in `/checkout.php` if implementing online payments.

## 🚀 Usage

### Accessing the System

1. **Main Website**: `http://localhost/Bachelor-FYP-Thesis/`
2. **Admin Panel**: `http://localhost/Bachelor-FYP-Thesis/admin/`
3. **Kitchen Interface**: `http://localhost/Bachelor-FYP-Thesis/cook/`
4. **Prediction System**: `http://localhost/Bachelor-FYP-Thesis/Prediction System/`

### Quick Start Guide

1. **Admin Setup**:
   - Login to admin panel
   - Add food categories
   - Add food items
   - Configure restaurant settings

2. **Customer Ordering**:
   - Browse menu
   - Add items to cart
   - Proceed to checkout
   - Track order status

3. **Kitchen Operations**:
   - View incoming orders
   - Update order status
   - Mark orders as completed

## 🔌 API Endpoints

### Customer APIs
| Endpoint | Method | Description |
|----------|--------|-------------|
| `/add_cart.php` | POST | Add item to cart |
| `/remove_cart.php` | POST | Remove item from cart |
| `/checkout.php` | POST | Process checkout |
| `/customer/customer_login.php` | POST | Customer login |
| `/customer/confirm.php` | POST | Customer registration |

### Admin APIs
| Endpoint | Method | Description |
|----------|--------|-------------|
| `/admin/insert_food.php` | POST | Add new food item |
| `/admin/edit_food.php` | POST | Update food item |
| `/admin/delete_food.php` | GET | Delete food item |
| `/admin/view_orders.php` | GET | View all orders |

### Kitchen APIs
| Endpoint | Method | Description |
|----------|--------|-------------|
| `/cook/complete_order.php` | GET | Mark order as cooked |
| `/cook/uncooked_orders.php` | GET | View pending orders |

## 🗄️ Database Schema

### Core Tables
- **customers** - User accounts and profiles
- **food** - Food items catalog
- **category** - Food categories
- **customer_orders** - Order records
- **pending_orders** - Order items details
- **cart** - Shopping cart items
- **chef** - Chef profiles
- **admins** - Admin accounts

### Key Relationships
- Customer → Orders (One-to-Many)
- Orders → Order Items (One-to-Many)
- Food → Category (Many-to-One)
- Customer → Cart Items (One-to-Many)

## 📚 Documentation

For detailed documentation including:
- System design and architecture
- Database schema
- API documentation
- User manuals
- Deployment guide

**📖 [View Full Documentation on Google Docs](https://docs.google.com/document/d/1OfIRwbgHyZ69X5E9fG4E88FUsHDVMPcKlTSOm0wyOZw/edit?usp=sharing)**

## 📸 Screenshots

### Customer Interface
![Homepage]
*Homepage with featured items and categories*

![Menu Page]
*Interactive menu with filtering options*

![Shopping Cart]
*Real-time shopping cart updates*

### Admin Dashboard
![Admin Dashboard]
*Comprehensive analytics and management tools*

![Order Management]
*Real-time order tracking and management*

### Kitchen Interface
![Kitchen Queue]
*Efficient order queue management*

### Mobile Responsive
![Mobile View]
*Fully responsive design for all devices*

*Note: Add actual screenshots to enhance the README*

## 🔧 Troubleshooting

### Common Issues

#### 1. Database Connection Error
**Problem**: "Access denied for user" or "Can't connect to MySQL server"
**Solution**:
- Verify MySQL service is running
- Check database credentials in `db.php` files
- Ensure database user has proper permissions

#### 2. 404 Errors on Pages
**Problem**: Pages not loading, showing 404 errors
**Solution**:
- Verify Apache mod_rewrite is enabled
- Check `.htaccess` file exists
- Ensure correct file permissions

#### 3. Images Not Uploading
**Problem**: Food/profile images fail to upload
**Solution**:
- Check directory permissions (755 or 777)
- Verify PHP `upload_max_filesize` in php.ini
- Ensure GD library is installed

#### 4. Session Errors
**Problem**: Login not working or sessions expiring
**Solution**:
- Check PHP session directory is writable
- Clear browser cookies
- Verify session.save_path in php.ini

#### 5. Blank Pages (White Screen)
**Problem**: Pages load but show blank screen
**Solution**:
- Enable PHP error reporting
- Check PHP error logs
- Verify all required PHP extensions are installed

### Getting Help
- Check the [documentation](https://docs.google.com/document/d/1OfIRwbgHyZ69X5E9fG4E88FUsHDVMPcKlTSOm0wyOZw/edit?usp=sharing)
- Search existing [issues](https://github.com/mwaqasviki/bachelor-project-thesis/issues)
- Contact support: m.waqas.pgr@gmail.com

## 🤝 Contributing

We welcome contributions to improve QuickMeal! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

### Development Guidelines
- Follow PSR-12 coding standards
- Write meaningful commit messages
- Update documentation for new features
- Test thoroughly before submitting PR

## 📈 Version History

### v1.0.0 (2022-10-24) - Initial Release
- ✅ Core restaurant management system
- ✅ Customer ordering interface
- ✅ Admin dashboard
- ✅ Kitchen management system
- ✅ Basic sales prediction
- ✅ QR code table ordering
- ✅ Multi-user authentication

### Planned Features (v2.0.0)
- 📱 Mobile application
- 💳 Multiple payment gateways
- 📊 Advanced analytics dashboard
- 🌐 Multi-language support
- 🔔 Real-time notifications
- 📧 Email marketing integration
- 🤖 AI-powered recommendations

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🔒 Security

### Security Features
- Password hashing using PHP's password_hash()
- SQL injection prevention through prepared statements
- XSS protection via input sanitization
- Session security with regeneration
- File upload validation and restrictions

### Reporting Security Issues
Please report security vulnerabilities to: m.waqas.pgr@gmail.com

## 🏆 Project Status

![Project Status](https://img.shields.io/badge/Status-Completed-success?style=flat-square)
![Maintenance](https://img.shields.io/badge/Maintained-Yes-green?style=flat-square)
![Last Updated](https://img.shields.io/badge/Last%20Updated-October%202022-blue?style=flat-square)

## 👥 Team

- **Muhammad Waqas** - *Lead Developer* - [GitHub](https://github.com/mwaqasviki)

### Supervisor
- **[Supervisor Name]** - *Prof. M. Iqbal*

## 📞 Contact

For questions or support:
- Email: m.waqas.pgr@gmail.com
- LinkedIn: [Muhammad Waqas](https://www.linkedin.com/in/muhammad-waqas-99ab40190/)

## 🙏 Acknowledgments

- Thesis supervisor for guidance and support
- Open source community for amazing tools and libraries
- Beta testers for valuable feedback

---

<p align="center">
  Made with ❤️ for Bachelor's Final Year Project Thesis
  <br>
  <sub>© 2022 Muhammad Waqas. All Rights Reserved.</sub>

</p>
