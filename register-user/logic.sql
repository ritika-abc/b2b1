-- Create the users table if not exists
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
);

-- Create the buy_lead_access table if not exists
CREATE TABLE IF NOT EXISTS buy_lead_access (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    accessed_at DATETIME NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Insert sample users
INSERT INTO users (username, email) VALUES
('user1', 'user1@example.com'),
('user2', 'user2@example.com');

-- Insert sample buy lead accesses
INSERT INTO buy_lead_access (user_id, accessed_at) VALUES
(1, '2024-06-01 10:00:00'),
(1, '2024-06-02 12:00:00'),
(1, '2024-06-05 15:00:00'),
(2, '2024-06-03 09:00:00'),
(2, '2024-06-04 11:00:00'),
(2, '2024-06-06 14:00:00');
