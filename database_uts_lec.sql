-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 04:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_uts_lec`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `Food Name` varchar(512) DEFAULT NULL,
  `Category` varchar(512) DEFAULT NULL,
  `Price` varchar(512) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `id_user` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `Food Name`, `Category`, `Price`, `Qty`, `id_user`) VALUES
(26, 'Dango Milk', 'Drink', '1500', 3, 3),
(27, 'Almond Tofu', 'Food', '1550', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `ID` int(11) NOT NULL,
  `Food Name` varchar(512) DEFAULT NULL,
  `Category` varchar(512) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Image Path` varchar(512) DEFAULT NULL,
  `Description` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`ID`, `Food Name`, `Category`, `Price`, `Image Path`, `Description`) VALUES
(1, 'Aaru Mixed Rice', 'Food', 1925, 'Item_Aaru_Mixed_Rice.webp', 'A large serving of filling staple food. In this dish that combines rice, noodles, and beans together, the secret of great taste lies in the sweet and sour flavor imparted by tomatoes. Owing to its common nature and low price, this dish is a great choice for sating one\'s hunger — which is one of the key reasons why this recipe has spread from Aaru Village to the rest of Sumeru.'),
(2, 'Almond Tofu', 'Food', 1550, 'Item_Almond_Tofu.webp', 'A dessert made out of almond. It has a silky-smooth texture with a long-lasting aroma of almond. It\'s named tofu only because of its tofu-like shape.'),
(3, 'Baklava', 'Food', 5000, 'Item_Baklava.webp', '\"A traditional Sumeru dessert. This puff pastry contains chopped nuts and has been baked after having butter drizzled atop it — and not forgetting some syrup once it comes out of the oven. Some researchers will specially order this veritable \"\"fortress of sweetness\"\" to replenish their energies before an exam. This is also why this dish has great pride of place as the Akademiya\'s favorite dessert.\"'),
(4, 'Bamboo Shoot Soup', 'Food', 5000, 'Item_Bamboo_Shoot_Soup.webp', 'A soup dish that\'s been stewed for a good long while. The meat and ham have been diced into small pieces, and the soup has been kept on low heat till it turned milky white. The process has brought out the distinct flavors of both kinds of meat, making for an especially tasty soup.'),
(5, 'Barbatos Ratatouille', 'Food', 4500, 'Item_Barbatos_Ratatouille.webp', 'A simple chowder with a long history. The ingredients are similarly traditional and simple. No matter where you are, a piping-hot chowder of this sort can always give you a sense of real and unsurpassed satisfaction.'),
(6, 'Barbeque Ribs', 'Food', 750, 'Item_Barbeque_Ribs.webp', 'A crispy meat dish. Lightly fry the surface of the ribs until they exude a faint aroma, then wrap the crispy exterior with sauce, and finally, grill them slowly on low heat. The meticulous temperature control ensures that the exterior is perfectly crisp, while the meat within is kept juicy and tender.'),
(7, 'Black-Back Perch Stew', 'Food', 5000, 'Item_Black-Back_Perch_Stew.webp', 'A poached fish dish. The fresh and tasty fish fillets are tender and juicy. The secret to this recipe is adding powdered Violetgrass into the heated oil to give the dish that aromatic scent. It\'s spicy, but not too spicy.'),
(8, 'Cassoulet', 'Food', 5000, 'Item_Cassoulet.webp', '\"A simple countryside stew. Simply put all the ingredients in a casserole, mix them up, and cook until they are ready to serve. It is worth noting that the full name of this dish is \"\"Glabrous Beans, Fowl Confit, and Smoked Sausage Stew in Cassoulet Casserole with a Side of Marcotte.\"\" The intimidating lengthiness of the name has, understandably, driven people to just call it \"\"Cassoulet.\"\"\"'),
(9, 'Cold Cut Platter', 'Food', 4000, 'Item_Cold_Cut_Platter.webp', 'A plate of cold cut meat. An equal balance of bacon, ham and sausage keeps everyone happy.'),
(10, 'Crab Roe Kourayaki', 'Food', 8000, 'Item_Crab_Roe_Kourayaki.webp', 'A crab meat dish that has been cooked directly over the flames. The meat and roe are mixed evenly, before being garnished with plump crab legs. The happiness that flows forth from that first bite imparts meaning upon your prior forbearance.'),
(11, 'Cured Pork Dry Hotpot', 'Food', 5000, 'Item_Cured_Pork_Dry_Hotpot.webp', 'A dish fried over a great flame. Matsutake and Ham have been sliced up, stir-fried, and garnished with some spicy condiments. The flavor of the Ham is a match for the Matsutake\'s crispness, and the combination grows even lovelier and more addictive as you chew. The heat-conducting wok also serves to keep it piping hot for long periods.'),
(12, 'Dragon Beard Noodles', 'Food', 5000, 'Item_Dragon_Beard_Noodles.webp', 'Noodles that are as slender as the hairs on a dragon\'s beard. The green onion is fried in a wok before the soup and condiments are added. Last in are the noodles, after which the lot is ladled out and plated up. The noodles must be skillfully hand-pulled multiple times before they become extremely thin — a technique that makes this dish the most challenging noodle recipe in Liyue.'),
(13, 'Egg Roll', 'Food', 1250, 'Item_Egg_Roll.webp', 'A fried egg dish. Beat eggs well, season and fry them slowly in a wok, roll up into a fixed shape. Pour our egg liquid in again and continue until it has all reached a certain thickness, then get ready to plate up. This is an ordinary yet welcoming Inazuman delicacy.'),
(14, 'Fish and Chips', 'Food', 3500, 'Item_Fish_and_Chips.webp', 'A deep-fried appetizer. Coat fish fillets with batter and deep-fry until golden and crispy, then add a few chips on the side. This combination is so miraculous that whatever sauce you choose, it will always bring a hearty smile to your face.'),
(15, 'Five Pickled Treasures', 'Food', 2500, 'Item_Five_Pickled_Treasures.webp', '\"Pickled vegetables. A round of fermentation makes food richer and also allows it to keep for longer. There were originally only four \"\"treasures,\"\" but for auspiciousness\' sake, the four vegetables were mixed and plated up with one additional \"\"treasure\"\" added in, hence the name \"\"Five Pickled Treasures.\"\"\"'),
(16, 'Fontainian Foie Gras', 'Food', 7500, 'Item_Fontainian_Foie_Gras.webp', 'A traditional dish of Fontaine. The foie gras only needs to be pan-fried before being served. Thanks to the masterful temperature control, the golden-brown foie gras tastes enticingly tender. The process takes focus and concentration, or else the delicious liver might be liquefied into an oily mess.'),
(17, 'Imported Poultry', 'Food', 1000, 'Item_Imported_Poultry.webp', '\"A meat dish drizzled with sauce. The fowl is marinated before being covered in batter and fried, and a thick sauce is drizzled over it as a finishing touch. The accompanying vegetables are local produce, but the marinating methods and sauce are all imported, hence the name \"\"imported poultry.\"\"\"'),
(18, 'Invigorating Kitty Meal', 'Food', 3000, 'Item_Invigorating_Kitty_Meal.webp', 'This main dish looks rather cute. With Kiminami Anna\'s help, this dish was made with the tastes of the provisional head priestess Neko in mind. Although it does not quite match the flavor that Hibiki used to produce, Lady Neko seems rather pleased with your work nonetheless, Due to lack of spices, humans might find this dish a tad on the plain side.'),
(19, 'Jade Parcels', 'Food', 7500, 'Item_Jade_Parcels.webp', 'An exquisite-looking dish. The ham\'s sweetness is locked inside the fresh vegetables, drizzled with a spicy broth. Delicious is an understatement.'),
(20, 'Jueyun Chili Chicken', 'Food', 5000, 'Item_Jueyun_Chili_Chicken.webp', 'Chicken in a dressing, served cold. The way this dish has been prepared captures the succulence of the chicken perfectly. Beneath the glowing gold skin, the meat has a mildly hot flavor.'),
(21, 'Konda Cuisine', 'Food', 4500, 'Item_Konda_Cuisine.webp', '\"Slowly stewed local cuisine. Everyone in Konda Village knows how to make this dish. It originally had no name but would spread throughout Inazuma on account of its nutritious deliciousness. This eventually caused those from outside the village to give it its name — \"\"Konda Cuisine.\"\"\"'),
(22, 'Lambad Fish Roll', 'Food', 5000, 'Item_Lambad_Fish_Roll.webp', 'A grilled fish dish with a faint floral scent. It is said that Lambad once adventured far and wide in his youth. Everywhere he went, he would taste the grilled fish at local taverns. This dish was not a signature food in Sumeru, and Lambad thought it was a pity, so he invented his own fish roll. According to the gourmets who often dine at his tavern, the tales of his adventures aren\'t necessarily true, but his fish roll is undoubtedly delicious.'),
(23, 'Matsutake Meat Rolls', 'Food', 3000, 'Item_Matsutake_Meat_Rolls.webp', 'A pan-fried meat dish. Ground meat is put on the Matsutake and gently pan-fried on low heat so the Matsutake can fully take in the aromatic juice of the meat. It\'s a mouthwatering delicacy in all of its glory.'),
(24, 'Mushroom Hodgepodge', 'Food', 1500, 'Item_Mushroom_Hodgepodge.webp', 'An Aranara-style dish that Paimon has drained her brain juice dry to improve. But in fact, it only requires a few common mushrooms from Sumeru, along with some extra seasonings. Paimon selected three types of mushrooms, and they were prepared and then cooked in a simple way, but the texture and flavor aren\'t bad at all.'),
(25, 'Northern Apple Stew', 'Food', 5500, 'Item_Northern_Apple_Stew.webp', 'A dish with braised meat and apples. The meat goes down smooth, its flavor dense, and when cut open, the meat juice that flows out bears traces of apple flavoring. An eye-popping, refreshing dish indeed.'),
(26, 'Omelette Rice', 'Food', 7000, 'Item_Omelette_Rice.webp', 'A main dish wrapped up in an egg skin. The evenly beaten egg fluids are fried into half-doneness before being poured out on top of the rice, and tomato ketchup is drizzled over top afterward once it is ready to plate up. They say that this dish was derived from another region, though this version involves a more complicated cooking method.'),
(27, 'Panipuri', 'Food', 10000, 'Item_Panipuri.webp', 'An appetizer served with a green dipping sauce. The crispy balls are first deep-fried, then stuffed with a delicious filling through a hole on the top. The bite-sized snack is a common street food in Sumeru.'),
(28, 'Potato Boat', 'Food', 3500, 'Item_Potato_Boat.webp', 'A baked appetizer. The potato was washed clean and then baked together with cheese and Rukkhashava Mushrooms. The dish guarantees an unmatched experience when eaten hot. This explains its popularity on the streets of Sumeru. Still, be careful not to burn your tongue.'),
(29, 'Qingce Stir Fry', 'Food', 5000, 'Item_Qingce_Stir_Fry.webp', 'A dish cooked over a roaring fire. They say it was originally just a rustic dish that everyone in Qingce Village knew how to make. But quite unexpectedly, its crispy and spicy dishes gained the recognition of people from elsewhere, and thus began to spread throughout the Liyue region.'),
(30, 'Radish Veggie Soup', 'Food', 2500, 'Item_Radish_Veggie_Soup.webp', 'Radish-based vegetable soup. Its flavor is delicately between tart and sweet. With luscious radish, it\'s a well-balanced dish.'),
(31, 'Rice Cake Soup', 'Food', 3000, 'Item_Rice_Cake_Soup.webp', 'Commonly-seen city cuisine. The ingredients have gorged themselves on the soup, making them most enticing indeed. They say that in the first, this dish only had a scant few ingredients, but more were added as time passed, resulting in its present form.'),
(32, 'Samosa', 'Food', 5000, 'Item_Samosa.webp', 'A deep-fried snack. The well-stirred filling is wrapped in a thin crust, shaped into a triangle, then fried in a pan until golden brown. Both meat and vegetarian fillings are common, so the dish has become a point of conflict for those with a strong preference for one over the other.'),
(33, 'Sticky Honey Roast', 'Food', 5000, 'Item_Sticky_Honey_Roast.webp', 'A meat dish in a sweet honey sauce. The carrots take the gamey edge off the meat, and the sauce brings it all together sweetly. The perfect warm dish for a cold winter night.'),
(34, 'Tahchin', 'Food', 5000, 'Item_Tahchin.webp', 'A classic staple served in large quantities. Cooked rice is mixed with meat that was marinated in yogurt, then baked until its surface turns crispy. Don\'t forget to add a handful of Padisarah petals before serving! Both the rice and meat are enough to keep one\'s stomach full for a long time, making it a very popular dish at the Grand Bazaar.'),
(35, 'Tasses Ragout', 'Food', 10000, 'Item_Tasses_Ragout.webp', 'A vegetable ragout. It is an improvised dish created by Fontainian farmers celebrating vegetable harvests. There are no strict rules for the amount of ingredients or the cooking method. Be it stir-fried or baked, this unpretentious dish never fails to delight with its rustic savor.'),
(36, 'Trout Amandine', 'Food', 7500, 'Item_Trout_Amandine.webp', 'Fish fillets of a satisfying size, fried with butter before serving with a side of crispy fried almonds. According to the traditional recipe for this dish, a whole readied trout would be placed into the frying pan, but a new, fillet-featuring recipe for this dish has been gaining popularity recently as well.'),
(37, 'Unagi Chazuke', 'Food', 5000, 'Item_Unagi_Chazuke.webp', '\"A light and tasty main dish. Well-boiled tea is poured over rice with unagi on top and allowed to steep quietly until the rice grains have absorbed the fragrance of the tea. When combined with the lingering sweet aftertaste of the bowl of unagi, you can eat half a bowl before Paimon can say \"\"Whoa!\"\"\"'),
(38, 'Wakatakeni', 'Food', 5000, 'Item_Wakatakeni.webp', 'A light-colored vegetarian dish. Broth is first poured into the pot before the bamboo shoots, and then the seaweed, are added in. The result is an elegant product with a light mouthfeel that agrees well with all palates. Suitable as a pre-meal appetizer or as a side to a main dish.'),
(39, 'Zhongyuan Chop Suey', 'Food', 3000, 'Item_Zhongyuan_Chop_Suey.webp', '\"A seasoned and cooked meat dish. Though it contains animal organ meat and bits and scraps of other things, the strong-flavored seasonings have masked the stench of the meat. Many have had this dish for the entirety of their lives without knowing \"\"chop suey\"\" is not actually a swear word in the local language.\"'),
(41, 'Dango Milk', 'Drink', 1500, 'Item_Dango_Milk.webp', 'A creative snack made by adding sticky dango to milk. It is sweet and has a dense mouthfeel. All the customers who have tried it love it. Still, it is dango that\'s been added in — drink too much and you might lose your appetite.'),
(42, 'Fonta', 'Drink', 500, 'Item_Fonta.webp', 'A specialty drink created by the Fontaine Research Institute. It is well-received by locals.'),
(43, 'Fruits of the Festival', 'Drink', 1500, 'Item_Fruits_of_the_Festival.webp', 'A brightly colored non-alcoholic beverage. Freshly squeezed Sunsettia and Wolfhook juices have been poured into a cup in a specific order. The cool and refreshing flavor and vibrant color remind people of the beautiful holiday times. Do not mess the order up if you want to get the gradient effect right!'),
(44, 'Holy Water', 'Drink', 5000, 'Item_Holy_Water.webp', 'A bottle of clear, colorless, and contaminant-free liquid. Indistinguishable from ordinary spring water. May or may not be worth putting all of one\'s hopes into.'),
(46, 'Sparkling Berry Juice', 'Drink', 1000, 'Item_Sparkling_Berry_Juice.webp', 'An all-new non-alcoholic beverage. Valberries of varying ripeness add layers of sour-to-sweet to this juice while the cooling sparkling water refreshes the soul — a fine companion for a pleasant and leisurely time.'),
(47, 'Wolfhook Juice', 'Drink', 2500, 'Item_Wolfhook_Juice.webp', 'A freshly squeezed, fashionable, and fruity non-alcoholic beverage. Iced Wolfhook juice mixed with a pinch of other ingredients, forming a dreamy shade of violet.'),
(48, 'Pure Water', 'Drink', 500, 'Item_Pure_Water.webp', 'It is said to be the legacy of a genius potioneer. It can draw out the purest strength from within one\'s body'),
(49, 'Minty Fruit Tea', 'Drink', 1500, 'Item_Minty_Fruit_Tea.webp', 'A cooling and refreshing drink. The invigorating tea and the sweet-sour taste of fruit blend together and energize your taste buds, and before you know it, you\'ve already drained your entire cup.'),
(50, 'Sunset Berry Tea', 'Drink', 2500, 'Item_Sunset_Berry_Tea.webp', 'A fruity drink with a pleasantly sour taste. This scented tea gives off the pleasant aroma of fresh fruit. Its cold and refreshing taste is sure to dispel the stifling heat with each gulp.'),
(51, 'Fruity Duet', 'Drink', 2500, 'Item_Fruity_Duet.webp', 'A dual-flavored fruity beverage. Add a thick layer of pulp at the bottom and then pour in a smoothie made out of juice and tea. Its layered flavors of fresh fruit are so tempting that no one is able to refuse the drink.'),
(52, 'Fruity Smoothie', 'Drink', 2000, 'Item_Fruity_Smoothie.webp', 'A beverage with simple colors. The smoothie made out of fruit-flavored yogurt has been arranged to resemble the blue sky and white clouds. At the bottom is a thick layer of jelly and finely-cut fruit. The revitalizing flavor makes this beverage the best choice in the summer.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(25) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `password`, `tanggal_lahir`, `jenis_kelamin`) VALUES
(1, 'admin', 'admin', 'admin', '$2y$10$uQvwnU3QGDJNKzykZiYpDuzh7jN8k0.1vdwepb.ynYmlD9bjP9ovW', '2023-10-11', 'Male'),
(2, 'John', 'Thor', 'user', '$2y$10$sxIDndA3thon5l3z1fSrSO6mnQc/tyc2HcPwWfTXC5r/Dxg/hzLNS', '2023-10-11', 'Female'),
(3, 'John', 'Doe', 'user1', '$2y$10$UZMFk2X7S6u/cBu3YwZ8T.3V6S7g6.FVh4dBN88zr4oZQy1X1NK7G', '2023-10-11', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
