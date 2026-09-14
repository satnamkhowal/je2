CREATE TABLE IF NOT EXISTS je_leads (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(150) NOT NULL,
    phone VARCHAR(40) NOT NULL,
    email VARCHAR(180) NULL,
    course VARCHAR(180) NULL,
    source VARCHAR(180) NULL,
    message TEXT NULL,
    page_url VARCHAR(255) NULL,
    user_agent VARCHAR(255) NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_created_at (created_at),
    KEY idx_course (course),
    KEY idx_phone (phone)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;