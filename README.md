# 📖 PlotSeed (Novel Universe Manager)

## 🌟 Description
PlotSeed is a web application designed for fiction writers and novelists. It provides a personal workspace to seamlessly manage novel universes, organize storylines, and keep track of character developments. 

Every author has their own private workspace to create projects (novels) and link their custom characters. Only the owner can view and edit their creations.

---

## ✨ Key Features
* **🔒 Private Workspace:** Secure authentication system where users can only manage their own novels and data.
* **📚 Project Management:** Create and edit novel projects, including book covers, pen names, genres, outlines, and reading links.
* **👥 Character Database:** Build detailed character profiles (roles, arcs, backgrounds) and assign them across multiple novel projects within your universe.
* **⏱️ Sequence Timeline:** A chapter-by-chapter event manager to organize the flow of your story and keep track of draft snippets.
* **🕵️‍♂️ Detective Board (Interactive):** A visual drag-and-drop corkboard to brainstorm plots. Users can create colored post-it notes, move them freely, and draw connecting bridges (with labels) between ideas. Everything auto-saves in real-time.

---

## 🛠️ Tech Stack
* **Backend:** PHP 8+, Laravel v12
* **Frontend:** Blade Templates, Tailwind CSS
* **Database:** SQLite (Default for MVP)
* **Libraries:** Interact.js (for Drag & Drop board functionality), Spatie Media Library (for image uploads)

---

## 🗄️ Data Structure (Entity Relationship)
Our database is fully normalized to ensure data integrity and scalability:

* **User:** The core entity. A User has many Projects and has many Characters.
* **Project:** The main novel. It belongs to a User and contains multiple elements:
  * Has many `Sequences`(Timeline events).
  * Has many `Board_notes` and `Board_links`(Detective Board data).
  * **Many-to-Many Relationship:** A Project belongs to many Characters via a pivot table (`Character_Project`), allowing a character to appear in multiple books.
* **Character:** Contains profile details, Role , Character Arc, and Background.
* **Board_Note:** Stores the idea `content`, `color`, and real-time coordinates (`pos_x`, `pos_y`).
* **Board_Link:** Connects two notes using `source_note_id` and `target_note_id` , and can include a short text `label` describing the relationship.

---

## 🚀 Installation Instructions
Follow these steps to set up the project on your local machine. Ensure you have PHP and Composer installed.

1. Clone the repository
```bash
git clone [https://github.com/your-username/plotseed.git](https://github.com/your-username/plotseed.git)
cd plotseed
```

2. Install the required dependencies
```bash
composer install
```

3. Install and compile Frontend assets (if applicable)
```bash
npm install
npm run build
```

4. Set up the environment
```bash
cp .env.example .env
php artisan key:generate
```

5. Create a SQLite database file (Windows/Mac/Linux)
```bash
touch database\database.sqlite
```

6. Run the migrations and seed the database
```bash
php artisan migrate:fresh --seed
```

7. Start the local development server (if not using Laravel Herd)
```bash
php artisan serve
```

🔑 Usage & Testing
The seeders will automatically create an Admin User with sample novels and characters for testing purposes. You can log in using these credentials:

Email: admin@plotseed.test

Password: password123
