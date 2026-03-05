# 📖 PlotSeed (Novel Universe Manager)

## Description
PlotSeed is a web application designed for fiction writers and novelists. It provides a personal workspace to seamlessly manage novel universes, organize storylines, and keep track of character developments. 

Every author has their own private workspace to create projects (novels) and link their custom characters. Only the owner can view and edit their creations.

## 🚀 Installation Instructions
Follow these steps to set up the project on your local machine:

1. Clone the repository
```bash
git clone [https://github.com/your-username/plotseed.git](https://github.com/your-username/plotseed.git)
cd plotseed
```

2. Install the required dependencies
```bash
composer install
```
3. Set up the environment
```bash
cp .env.example .env
php artisan key:generate
touch database\database.sqlite
```
4. Run the migrations and seed the database
```bash
php artisan migrate:fresh --seed
```

🔑 Usage & Testing
The seeders will automatically create an Admin User with sample novels and characters for testing purposes. You can log in using these credentials:

Email: admin@plotseed.test

Password: password123
