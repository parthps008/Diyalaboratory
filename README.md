# Diya Laboratory - PHP Medical Laboratory Management System

A web-based Laboratory Management System built with PHP and MySQL, ready for deployment to Render.

## Features
- **Patient Portal:** Register, log in, book appointments for laboratory tests (Blood Test, Urine Test, Thyroid Test, Diabetes Test, Full Body Checkup), and track appointment statuses.
- **Admin Portal:** Manage appointments, view registered patients, view contact inquiries, and update test statuses (`Pending`, `Approved`, `Completed`).
- **Contact & Inquiries:** Public contact form for patient inquiries.
- **Render Ready:** Pre-configured Dockerfile, automated database migrations, and Render configuration.

---

## Default Admin Credentials
- **URL:** `/admin_login.php`
- **Username:** `admin`
- **Password:** `admin123`

---

## Deployment to Render (Step-by-Step)

### Option 1: Quick Deployment (Self-Contained Container)
The container comes with MariaDB and Apache pre-configured. It will automatically start the database and create all tables on launch with zero external setup needed.

1. **Push your code to GitHub**:
   ```bash
   git add .
   git commit -m "Add Docker and Render configuration"
   git push origin main
   ```

2. **Log into Render**:
   - Go to [dashboard.render.com](https://dashboard.render.com/).

3. **Create a New Web Service**:
   - Click **New +** > **Web Service**.
   - Select **Build and deploy from a Git repository**.
   - Connect your GitHub repository (`Diyalaboratory`).

4. **Configure Settings**:
   - **Name:** `diyalaboratory` (or your preferred name)
   - **Region:** Choose the nearest region (e.g., Oregon, Frankfurt)
   - **Branch:** `main`
   - **Runtime:** `Docker` (Render will automatically detect the `Dockerfile`)
   - **Instance Type:** `Free`

5. **Deploy**:
   - Click **Deploy Web Service** (or **Create Web Service**).
   - Render will build the Docker container and start your website!

---

### Option 2: Persistent Cloud Database (Recommended for Production)
Render's free tier web services spin down after 15 minutes of inactivity, resetting container storage. If you want patient records and appointments to stay saved permanently across restarts, connect a free cloud MySQL database (such as **TiDB Cloud Serverless** or **Aiven for MySQL**).

1. Create a free MySQL database at [TiDB Cloud](https://tidbcloud.com/) or [Aiven](https://aiven.io/).
2. In the Render Dashboard for your service, go to **Environment** > **Add Environment Variable**.
3. Add the following variables:
   - `DB_HOST`: Your remote database host (e.g., `gateway01.us-east-1.prod.aws.tidbcloud.com`)
   - `DB_PORT`: `4000` (for TiDB) or `3306` (for standard MySQL)
   - `DB_USER`: Your database username
   - `DB_PASSWORD`: Your database password
   - `DB_NAME`: Your database name
4. Save Changes. Render will re-deploy and your app will automatically connect and create the necessary tables!

---

## Local Development (e.g. XAMPP / WAMP)
1. Copy project into `htdocs/diya_laboratory`.
2. Start Apache and MySQL from XAMPP Control Panel.
3. Open `http://localhost/phpmyadmin` and import `database.sql` into a database named `diya_laboratory`.
4. Visit `http://localhost/diya_laboratory` in your browser.
