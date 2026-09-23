# Jaipur Engineers AI Assistant & Hosting Setup

## First-time hosting setup

1. Upload/deploy the repository to the Jaipur Engineers web root.
2. In Hostinger, create a MySQL database and database user.
3. Open `https://jaipurengineers.com/install/`.
4. Enter DB host, database name, username and password.
5. For lead email alerts, enable mail and enter SMTP settings. SMTP is recommended.
6. Keep **Send a test email** checked. The installer only locks after successful setup.
7. After success, leave `config/install.lock` in place.

The installer creates/upgrades `je_leads`, writes hosting-only `config/database.php` and `config/mail.php`, checks writable storage, and protects runtime lead files from web access.

## AI assistant

The floating assistant assets are loaded from the shared `head.php`, so PHP pages using the common site head get it automatically.

- Frontend: `assets/js/je-ai-assistant.js`
- Styles: `assets/css/je-ai-assistant.css`
- Endpoint: `api/ai-assistant.php`
- Editable local knowledge/rules: `config/ai-assistant.php`
- Database table: `je_leads`
- Fallback queue: `storage/ai-leads-YYYY-MM.jsonl`

This version uses local keyword/rule matching. It does **not** require OpenAI, Gemini or another paid AI API.

## Mail notes

`/install/` supports SMTP with SSL, SMTP with STARTTLS/TLS, and PHP `mail()` as a fallback.

Do not commit generated `config/database.php`, `config/mail.php`, or installer lock files. They are ignored by `.gitignore`.

## Reconfigure

Only when intentionally required, delete `config/install.lock` from Hostinger File Manager, open `/install/` again, re-enter DB/mail details, run the checks, and confirm the installer locks again.
