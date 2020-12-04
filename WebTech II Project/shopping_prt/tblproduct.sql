

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'Redgear Pro Wireless Gamepad', 'RPG', 'product-images/1.jpg', 1799.00),
(2, 'Redgear Cloak Wired RGB Gaming Headphones with Microphone', 'CloAk', 'product-images/2.jpg', 1094.00),
(3, 'Redragon Orpheus GS550 Stereo Gaming Speakers Sound bar', 'gS55o', 'product-images/3.jpg', 1240.00),
(4, 'Thrustmaster Ferrari Red Legend', 'redFerr', 'product-images/4.jpg', 5646.00),
(5, 'Logitech G 402 Hyperion Fury Wired Gaming Mouse', '402G420', 'product-images/5.jpg', 2345.00),
(6, 'Finger Mobile Game Controller', 'MgMnG', 'product-images/6.jpg', 296.00),
(7, 'ZEBRONICS Gaming Multimedia USB Keyboard & USB Mouse Combo', 'PnPlaY', 'product-images/7.jpg', 1624.00),
(8, 'Junkyard Vinyl Stickers for Electronic Gadgets, Scrapbook (Pack of 50)', '50c50', 'product-images/8.jpg', 299.00),
(9, 'HP Gaming Mouse G200', 'MG200', 'product-images/9.jpg', 1529.00),
(10, 'Congo Professional USB Condenser Microphone', 'MpHoNE', 'product-images/10.jpg', 1799.00),
(11, 'Choseal High Speed Cat7 LAN Cable', 'LanNoLag', 'product-images/11.jpg', 699.00),
(12, 'Cosmic Byte CB-EP-03 Gaming Earphone', 'EPhonE', 'product-images/12.jpg', 749.00);


ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);


ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;