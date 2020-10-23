CREATE TABLE `merchant` (
  `id` int(11) NOT NULL,
  `name` varchar(16) NOT NULL,
  `code` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `merchant` (`id`, `name`, `code`) VALUES
(1, 'Demo Merchant', 12345678);

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `item_name` varchar(16) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_type` varchar(16) NOT NULL,
  `customer_name` varchar(32) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `references_id` varchar(16) NOT NULL,
  `status` enum('Pending','Paid','Failed','') NOT NULL DEFAULT 'Pending',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `transaction` (`id`, `invoice_id`, `item_name`, `amount`, `payment_type`, `customer_name`, `merchant_id`, `references_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2147483647, 'test', 100, 'virtual_account', 'will', 12345678, '87654321', 'Pending', '2020-10-23 13:44:58', '2020-10-24 05:55:32');

ALTER TABLE `merchant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merchant_id` (`merchant_id`),
  ADD KEY `references_id` (`references_id`);

ALTER TABLE `merchant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`code`);
COMMIT;