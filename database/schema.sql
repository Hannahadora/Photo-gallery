CREATE TABLE IF NOT EXISTS photos (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    user_id     INT,
    title       VARCHAR(255),
    description TEXT,
    filename    VARCHAR(255),
    filetype    VARCHAR(50),
    filesize    INT,
    upload_date DATETIME
);
