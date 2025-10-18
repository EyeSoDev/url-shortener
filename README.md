## Shortener URL
Scenario: 
Develop a tiny and simple web application to shorten the URL; the requirement is similar to the Bitly: https://bitly.com but only for a core business logic and necessary functionality.

---

## Modules

- [x] User Account Module: Allows users to register and log in with their email or username and password.
- [x] URL Shortage Module: Allows users to input the URL to be shortened and keep the output with the shortened link to share with the public.
- [ ] Admin Module: Allows administrators to see and administrate the links that the users shorten.

---

## Tech Stack

* Laravel v12.34.0
* MySQL

---

## Getting Started

### 1. Clone the repo

```bash
git clone https://github.com/EyeSoDev/url-shortener.git
cd url-shortener
```

### 2. Install dependencies

```bash
npm install
```

### 3. Setting .env

```env
APP_DOMAIN=localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=url_shortener
DB_USERNAME=root
DB_PASSWORD=NewPassword
```

### 4. Run the dev server

```bash
composer run dev
```

---

## System Architecture
<img width="992" height="753" alt="Screenshot 2568-10-18 at 16 31 54" src="https://github.com/user-attachments/assets/85834e44-6b9e-49b3-90db-decabefc4d94" />

---

## Rusult

- User Account Module


https://github.com/user-attachments/assets/b662a677-7045-4e04-ae40-6f5da5d40ea8



- URL Shortage Module


https://github.com/user-attachments/assets/5b8f680b-1781-49eb-9be3-d831354ad5a0


---

## License

MIT

---
