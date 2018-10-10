-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2018 at 04:47 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpggame`
--
CREATE DATABASE IF NOT EXISTS `rpggame` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rpggame`;

-- --------------------------------------------------------

--
-- Table structure for table `enemys`
--

CREATE TABLE `enemys` (
  `id` int(11) NOT NULL,
  `enemy_name` varchar(100) NOT NULL,
  `enemy_main_img` varchar(500) NOT NULL,
  `enemy_hp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enemys`
--

INSERT INTO `enemys` (`id`, `enemy_name`, `enemy_main_img`, `enemy_hp`) VALUES
(1, 'Zigzagoon', 'https://vignette.wikia.nocookie.net/es.pokemon/images/b/b3/Zigzagoon_%28dream_world%29.png/revision/latest?cb=20101024023225', 50),
(2, 'Bidoof', 'https://vignette.wikia.nocookie.net/es.pokemon/images/6/6c/Bidoof_%28dream_world%29.png/revision/latest?cb=20101024151056', 60);

-- --------------------------------------------------------

--
-- Table structure for table `guilds`
--

CREATE TABLE `guilds` (
  `id` int(11) NOT NULL,
  `guild_name` varchar(200) NOT NULL,
  `guild_admin` int(11) NOT NULL,
  `guild_icon` int(11) NOT NULL,
  `guild_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guilds`
--

INSERT INTO `guilds` (`id`, `guild_name`, `guild_admin`, `guild_icon`, `guild_points`) VALUES
(1, 'Los guerreros del Admin', 1, 1, 245);

-- --------------------------------------------------------

--
-- Table structure for table `guilds_member`
--

CREATE TABLE `guilds_member` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_guild` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guilds_member`
--

INSERT INTO `guilds_member` (`id`, `id_user`, `id_guild`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `guild_icons`
--

CREATE TABLE `guild_icons` (
  `id` int(11) NOT NULL,
  `guild_icon_img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guild_icons`
--

INSERT INTO `guild_icons` (`id`, `guild_icon_img`) VALUES
(1, 'https://vignette.wikia.nocookie.net/villains/images/e/e8/The_Succubus_Eye_Guild_Emblem.png/revision/latest?cb=20140828175528');

-- --------------------------------------------------------

--
-- Table structure for table `heros`
--

CREATE TABLE `heros` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `main_img` varchar(500) NOT NULL,
  `main_char_icon` varchar(500) NOT NULL,
  `base_damage` int(11) NOT NULL,
  `base_defense` int(11) NOT NULL,
  `base_magic` int(11) NOT NULL,
  `base_hp` int(11) NOT NULL,
  `base_mana` int(11) NOT NULL,
  `available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `heros`
--

INSERT INTO `heros` (`id`, `name`, `main_img`, `main_char_icon`, `base_damage`, `base_defense`, `base_magic`, `base_hp`, `base_mana`, `available`) VALUES
(1, 'Guerrera', 'https://i.pinimg.com/originals/13/e3/e4/13e3e4d296006319d91d983f04b562a2.png', '', 10, 30, 60, 100, 100, 0),
(2, 'Link', 'https://www.smashbros.com/assets_v2/img/fighter/link/main.png', '', 50, 30, 20, 100, 100, 1),
(3, 'Samus', 'https://www.smashbros.com/assets_v2/img/fighter/samus/main.png', '', 10, 10, 10, 100, 100, 1),
(4, 'Lucina', 'https://www.smashbros.com/assets_v2/img/fighter/lucina/main.png', '', 10, 10, 10, 100, 100, 1),
(5, 'Ike', 'https://www.smashbros.com/assets_v2/img/fighter/ike/main.png', '', 10, 10, 10, 100, 100, 1),
(6, 'Marth', 'https://www.smashbros.com/assets_v2/img/fighter/marth/main.png', '', 10, 10, 10, 100, 100, 1),
(7, 'Toon Link', 'https://www.smashbros.com/assets_v2/img/fighter/toon_link/main.png', '', 10, 10, 10, 100, 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `id` int(11) NOT NULL,
  `icon_name` varchar(100) NOT NULL,
  `icon_img` varchar(500) NOT NULL,
  `icon_available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `icon_name`, `icon_img`, `icon_available`) VALUES
(1, 'Jelly Icon', './assets/images/icons/user/jelly.jpg', 1),
(2, 'Anime', './assets/images/icons/user/anime.jpg', 1),
(3, 'Darumaka', './assets/images/icons/user/daru.png', 1),
(4, 'Mudkip', './assets/images/icons/user/mudkip.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `item_img` varchar(500) NOT NULL,
  `item_cost` int(11) NOT NULL,
  `item_rarity` int(11) NOT NULL,
  `item_add_hp` int(11) NOT NULL,
  `item_add_mana` int(11) NOT NULL,
  `item_add_damage` int(11) NOT NULL,
  `item_add_defense` int(11) NOT NULL,
  `item_add_magic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `item_img`, `item_cost`, `item_rarity`, `item_add_hp`, `item_add_mana`, `item_add_damage`, `item_add_defense`, `item_add_magic`) VALUES
(1, 'Escudo verde', 'https://vignette.wikia.nocookie.net/monsterhunter/images/8/8f/ItemIcon015a.png/revision/latest?cb=20100611125008', 1500, 1, 0, 0, 0, 10, 0),
(2, 'Espada y escudo', 'http://images1.wikia.nocookie.net/__cb20100611133422/monsterhunter/images/4/45/ItemIcon034.png', 2500, 2, 0, 0, 7, 5, 0),
(3, 'Pocion magica', 'https://vignette.wikia.nocookie.net/monsterhunter/images/7/77/ItemIcon043f.png/revision/latest?cb=20100611135222', 1500, 3, 0, 0, 0, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `items_rarity`
--

CREATE TABLE `items_rarity` (
  `id` int(11) NOT NULL,
  `rarity_name` varchar(100) NOT NULL,
  `rarity_class` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `items_rarity`
--

INSERT INTO `items_rarity` (`id`, `rarity_name`, `rarity_class`) VALUES
(1, 'Normal', 'item-lvl-normal'),
(2, 'Raro', 'item-lvl-rare'),
(3, 'Épico', 'item-lvl-epic'),
(4, 'Legendario', 'item-lvl-legendary');

-- --------------------------------------------------------

--
-- Table structure for table `items_users`
--

CREATE TABLE `items_users` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `items_users`
--

INSERT INTO `items_users` (`id`, `id_item`, `id_user`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quests`
--

CREATE TABLE `quests` (
  `id` int(11) NOT NULL,
  `quest_name` varchar(500) NOT NULL,
  `quest_description` varchar(500) NOT NULL,
  `quest_mana_need` int(11) NOT NULL,
  `quest_zone` int(11) NOT NULL,
  `quest_enemy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quests`
--

INSERT INTO `quests` (`id`, `quest_name`, `quest_description`, `quest_mana_need`, `quest_zone`, `quest_enemy`) VALUES
(1, 'Una calida bienvenida', '¡Esta es tu primera mision, limpia la zona y vuelve sano y salvo!', 10, 1, 1),
(2, 'Despeja el pueblo', 'Despeja el pueblo de los malos malosos', 20, 1, 2),
(3, 'Busqueda de materiales peligrosos', 'Viaja por las montañas, pero ten cuidado', 20, 2, 1),
(4, 'Aguas peligrosas', 'Aguas que te mojan jiji', 20, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `quests_completed_users`
--

CREATE TABLE `quests_completed_users` (
  `id` int(11) NOT NULL,
  `id_quest` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quests_completed_users`
--

INSERT INTO `quests_completed_users` (`id`, `id_quest`, `id_user`) VALUES
(6, 1, 1),
(7, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `isModerator` int(11) NOT NULL,
  `isAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `isModerator`, `isAdmin`) VALUES
(1, 'user', 0, 0),
(2, 'moderator', 1, 0),
(3, 'admin', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `email` varchar(200) NOT NULL,
  `hero` int(11) NOT NULL,
  `isEmailVerified` int(11) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `icon` int(11) NOT NULL,
  `user_xp` int(11) NOT NULL,
  `user_hp` int(11) NOT NULL,
  `user_mana` int(11) NOT NULL,
  `id_guild` int(11) NOT NULL,
  `register_date` varchar(100) NOT NULL,
  `game_money` int(11) NOT NULL,
  `account_state` varchar(10) NOT NULL,
  `account_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `hero`, `isEmailVerified`, `gender`, `password`, `icon`, `user_xp`, `user_hp`, `user_mana`, `id_guild`, `register_date`, `game_money`, `account_state`, `account_role`) VALUES
(1, 'Jelly', 'jellymudkip@gmail.com', 1, 1, 'hombre', '$2y$15$HWBP29mGqDbzZfILH8cJ4uwtdNp7D5Yg3wMiXoym8MTr2yRHgWxyO', 2, 120, 50, 30, 0, '10/10/2018 - 10:16', 7000, '1', 3),
(2, 'Alex', 'alexkun@gmail.com', 1, 1, 'hombre', '$2y$15$HWBP29mGqDbzZfILH8cJ4uwtdNp7D5Yg3wMiXoym8MTr2yRHgWxyO', 2, 450, 0, 0, 0, '10/10/2018 - 10:16', 1000, '1', 3),
(3, 'anonimo', 'anonimo@gmail.com', 0, 1, 'hombre', '$2y$15$/nz.CLRFjhE6Al72/dovjOP1T7Jci.4V34T08qV6zPxpieABLwa4u', 1, 0, 100, 100, 0, '10/10/2018 - 10:16', 2000, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_equipment`
--

CREATE TABLE `user_equipment` (
  `id` int(11) NOT NULL,
  `equip_id_item` int(11) NOT NULL,
  `equip_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_equipment`
--

INSERT INTO `user_equipment` (`id`, `equip_id_item`, `equip_id_user`) VALUES
(107, 1, 1),
(109, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(11) NOT NULL,
  `zone_name` varchar(100) NOT NULL,
  `default_zone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `zone_name`, `default_zone`) VALUES
(1, 'Prado esmeralda', 1),
(2, 'Montañas abismales', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enemys`
--
ALTER TABLE `enemys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guilds`
--
ALTER TABLE `guilds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guilds_member`
--
ALTER TABLE `guilds_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guild_icons`
--
ALTER TABLE `guild_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heros`
--
ALTER TABLE `heros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_rarity` (`item_rarity`);

--
-- Indexes for table `items_rarity`
--
ALTER TABLE `items_rarity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_users`
--
ALTER TABLE `items_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quests`
--
ALTER TABLE `quests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quests_completed_users`
--
ALTER TABLE `quests_completed_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_equipment`
--
ALTER TABLE `user_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enemys`
--
ALTER TABLE `enemys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guilds`
--
ALTER TABLE `guilds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guilds_member`
--
ALTER TABLE `guilds_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guild_icons`
--
ALTER TABLE `guild_icons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `heros`
--
ALTER TABLE `heros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items_rarity`
--
ALTER TABLE `items_rarity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items_users`
--
ALTER TABLE `items_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quests`
--
ALTER TABLE `quests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quests_completed_users`
--
ALTER TABLE `quests_completed_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_equipment`
--
ALTER TABLE `user_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`item_rarity`) REFERENCES `items_rarity` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
