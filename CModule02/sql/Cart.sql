CREATE TABLE Cart (
    idx BIGINT PRIMARY KEY AUTO_INCREMENT,
    member_idx BIGINT,
    product_idx BIGINT,
    product_count BIGINT DEFAULT 1
);
