-- MySQL dump 10.16  Distrib 10.1.39-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: up_fitness
-- ------------------------------------------------------
-- Server version	10.1.39-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `up_fitness`
--


--
-- Table structure for table `nutrition_post`
--

DROP TABLE IF EXISTS `nutrition_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nutrition_post` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(144) NOT NULL,
  `description` varchar(360) NOT NULL,
  `image` varchar(360) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `category` varchar(64) NOT NULL,
  `image_alt` varchar(64) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nutrition_post`
--

LOCK TABLES `nutrition_post` WRITE;
/*!40000 ALTER TABLE `nutrition_post` DISABLE KEYS */;
INSERT INTO `nutrition_post` VALUES (1,'Satay sweet potato curry\r\n','Cook this tasty vegan curry for an exotic yet easy family dinner. With spinach and sweet potato, it boasts two of your five-a-day and itâ€™s under 400 calories.','satay-sweet-potato-curry','Melt 1 tbsp coconut oil in a saucepan over a medium heat and soften 1 chopped onion for 5 mins. Add 2 grated garlic cloves and a grated thumb-sized piece of ginger, and cook for 1 min until fragrant.\r\n\r\nStir in 3 tbsp Thai red curry paste, 1 tbsp smooth peanut butter and 500g sweet potato, peeled and cut into chunks, then add 400ml coconut milk and 200ml water.\r\n\r\nBring to the boil, turn down the heat and simmer, uncovered, for 25-30 mins or until the sweet potato is soft.\r\n\r\nStir through 200g spinach and the juice of 1 lime, and season well. Serve with cooked rice, and if you want some crunch, sprinkle over a few dry roasted peanuts.','vegan','Satay sweet potato curry'),(2,'Roasted Garlic and Fresh Herb Cream Cheez','Creamy, garlicky, and irresistible smeared on crackers or toasted bagels, this cashew-based â€œcheeseâ€ might just remind you of herbed Boursin.','Roasted-Garlic-Herb-Cream-Cheese_Boursin','Serves\r\n2 small rounds\r\n\r\nIngredients\r\n1 small head garlic\r\n4 tablespoons fresh chopped herbs, such as thyme, rosemary, chives, and/or oregano\r\n1 cup raw cashew pieces, soaked in water 8-10 hours, rinsed and drained\r\n1/4 cup coconut butter or 1/4 cup unsweetened coconut flakes, soaked in water for about 15 minutes, drained\r\n1/4 teaspoon sea salt\r\n1/2-1 teaspoon garlic powder\r\n3 tablespoons fresh lemon juice\r\nPreparation\r\nPreheat toaster oven (or oven) to 450Â°F.  Cut off the top 1/3 or so of the garlic and wrap the head in foil.  Place the garlic in the oven and roast for 30-45 minutes, or until fragrant and very soft. Remove from the oven and allow to cool completely before unwrapping.\r\nLine two 3/4 cup ramekins with cheesecloth.  Sprinkle the bottoms of the ramekins with one tablespoon each of the herbs, reserving the remaining herbs.\r\nMeanwhile, in a food processor, process the cashew pieces, coconut butter or coconut flakes, and salt until fairly smooth.  It will not get completely smooth. Squeeze the cloves from the roasted garlic and drop into the bowl of the food processor.  Add the garlic powder and the lemon juice and process until thoroughly combined.\r\nDivide the mixture between the prepared ramekins, pressing the cheese down into the herbs and cheesecloth.  Tap the ramekins on the counter a few times and level the top. Divide the remaining herbs between the two ramekins, gently press them into the cheese and cover with the ends of the cheesecloth.  Put one ramekin on top of the other and fill a third ramekin with water and place it on top of both ramekins (youâ€™ll have a â€œtowerâ€ of 3 ramekins).  Place them in the refrigerator and let set overnight.\r\nThe next day, remove the water-filled ramekin.  Gently tug the cheesecloth to remove the cream cheese from the other ramekins and serve with bread or crackers -  or place them in an air-tight container for up to one week.\r\nNotes\r\nIf you use the Coconut Butter rather than the coconut flakes, you may need to add just a touch of water when processing. I give a range of garlic powder here because itâ€™s pretty powerful stuff. As the cheese sets, the flavor develops, so err on the side of less garlic powder (or none) if youâ€™re not a big fan.\r\n\r\nNutritional Information\r\nTotal Calories: 348 | Total Carbs: 16 g | Total Fat: 30 g | Total Protein: 4 g | Total Sodium: 383 g | Total Sugar: 0 g Per Round: Calories: 174 | Carbs: 8 g | Fat: 15 g | Protein: 2 g | Sodium: 192 mg | Sugar: 0 g Note: The information shown is based on available ingredients and preparation. It should not be considered a substitute for a professional nutritionistâ€™s ','vegan','Roasted Garlic and Fresh Herb Cream Cheez'),(3,'Smoky Beef Tacos\r\n','Turn a super simple dinner into the best Tuesday taco night ever by setting up a topping bar with sliced radishes, diced pineapples, pickled jalapeÃ±os, and shredded cabbage!','smoky-beef-tacos-recipe-1556291028','Heat oil in a large skillet on medium. Add onion and Â¼ tsp salt and cook, covered, stirring occasionally, until tender, 6 to 8 minutes. Stir in garlic and cook 1 minute. \r\nAdd beef and cook, breaking it up into small pieces, 5 minutes. Sprinkle with chipotle powder, cumin, and Â½ tsp salt and cook, continuing to break it up, 2 minutes more. \r\nStir in tomato sauce and simmer until slightly thickened, 4 to 5 minutes. \r\nIn a bowl, toss lettuce and cilantro. Fill taco shells with beef and top with Cheddar, then lettuce. Serve with onion, sour cream, and lime wedges if desired.','omnivorian','Smoky beef'),(4,'Salmon with Creamy Feta Cucumbers\r\n','Make an extra big batch of this creamy whipped feta to serve on toast or as a dip.','salmon-with-creamy-feta-cucumbers-recipe-1556292703','Heat oil in a large skillet on medium. Halve 1 lemon and place halves, cut sides down, in the skillet. Season salmon with Â½ tsp each salt and pepper and cook until golden brown and opaque throughout, 3 to 6 minutes per side. Transfer salmon fillets to plates. Transfer lemon halves to a cutting board and cut each in half. \r\nMeanwhile, in a large bowl, toss cucumbers with 1/4 tsp salt. Finely grate zest of remaining lemon into a food processor and squeeze in 3 Tbsp juice. Add feta and yogurt and puree until smooth. \r\nToss with cucumbers to coat, then fold in mint and freshly cracked pepper. Serve with salmon and a charred lemon wedge for squeezing.','omnivorian','Salmon with Creamy Feta Cucumbers'),(5,'Sweet potato hash, eggs & smashed avo\r\n','This simple quick-fix supper is a great way to use your spiralizer. Sweet potato, avocado, a runny egg and a drizzle of spicy sriracha make a delectable dinner.','IMG_48101','Smash up the avocado with a fork, leaving some pieces chunky, then add the lime juice and season to taste.\r\n\r\nHeat the oil in a large, non-stick frying pan over a medium heat. Add the onion and cook for 2 mins, then stir in the sweet potato. Season and press the potato into the pan with the back of a wooden spoon. Cook for 10-15 mins, stirring occasionally, until the potato is softened and crisping at the edges.\r\n\r\nMake two spaces in the pan, crack in the eggs and cook for 2-3 mins until the whites are just set and the yolks runny. Dollop on the avocado and drizzle with sriracha to serve.','vegetarian','Sweet potato hash, eggs & smashed avo\r\n'),(6,'Vegan Buffalo Cauliflower Tacos','These Vegan Buffalo Cauliflower Tacos are packed full of spicy buffalo sauce, creamy ranch, crunchy romaine and hearty avocados.','vegan-buffalo-cauliflower-tacos-2','Preheat oven to 425 degrees and line a baking sheet with foil. In a large bowl combine cauliflower, olive oil, garlic powder, chili powder, pepper and 1/4 cup of buffalo sauce. Stir to combine. Spread evenly on baking sheet and cook for 20 minutes, flipping halfway. Five minutes before the cauliflower is done cooking, heat up the remaining buffalo sauce in a saucepan or in the microwave. Remove cauliflower from the oven and place it back in the bowl. Add remaining heated buffalo sauce and stir to combine. To assemble tacos, load each tortilla with romaine, avocado and cauliflower. Drizzle with ranch and top with cilantro or green onions.','vegan','Vegan buffalo cauliflower tacos'),(8,'Tomato salad with chilli and coriander\r\n','This tomato salad owes all its refinement to the combination of ingredients from Asian and Mediterranean cuisine. An exciting side dish!\r\n','tomato_salad_chilli_coriander','Wash and halve the tomatoes, remove the stalks and cut the flesh into cubes. Peel the onion and garlic, wash and clean the chilli pepper. Chop all three ingredients very finely. Rinse the coriander cold, shake dry, pluck the leaves, put a few aside for decoration, chop the rest very finely. Mix the lime juice with salt and honey. Gradually add the olive oil until you have a creamy sauce. Mix tomatoes and onion mixture with chopped coriander and salad dressing and season to taste. Garnish with coriander leaves. A simple tomato salad with onions? Uncomplicated and incredibly delicious! Enjoy the classic tomato salad with onions recipe from the GU cookbook \"Vegetarian Basics\".','vegan','Tomato salad with chilli and coriander'),(9,'Frozen fruit & almond crumble','Fresh fruit isnâ€™t the only way to make a crumble, in fact frozen fruit is a gamechanger â€“ try it and see for yourself.','frozen-fruit','Preheat the oven to 200Â°C/400Â°F/gas 6. Tip the frozen berries into a saucepan with half the sugar and place on a medium heat. Squeeze in the juice of half an orange and cook for 5 to 8 minutes, or until the sugar has dissolved and the fruit has softened. Remove from the heat and leave to cool a little. Meanwhile, cube the butter and place in a mixing bowl with the flour. Rub together with your fingertips until it resembles breadcrumbs, then stir in the almonds and remaining sugar. Transfer the berry mixture to a 25cm x 30cm baking dish and sprinkle over the crumble topping. Bake in the oven for 25 to 30 minutes, or until golden and crunchy. Delicious served with vanilla ice cream.\r\n','vegetarian','Frozen fruit cramble'),(10,'Winter Greens Pesto Pizza','Hearty collard greens pack this pesto with vitamin K, an essential nutrient for bone health. Buttery Castelvetrano olives make any extra pesto perfect for adding big flavor to pasta and grilled cheese sandwiches; substitute any green olive if you canâ€™t find them.','winter-greens-pesto-pizza-1812-p30','Place racks in upper third and middle of oven. Place a baking sheet on top rack; place a pizza stone on middle rack. Preheat oven to 500Â°F.\r\n\r\nSpread onion on hot baking sheet; spray with cooking spray. Bake at 500Â°F until browned, 8 to 9 minutes. Set aside.\r\n\r\nProcess collard greens, olives, 3 1/2 tablespoons Parmesan cheese, olive oil, 1 tablespoon canola oil, lemon zest and juice, garlic, and 1/8 teaspoon salt in a food processor until smooth. Brush crust with remaining 1 tablespoon canola oil. Spread pesto mixture on crust. Top with mozzarella and onion.\r\n\r\nTransfer pizza to hot pizza stone. Bake at 500Â°F until cheese is melted, 5 to 7 minutes. Drizzle with balsamic glaze; sprinkle with basil, red pepper, remaining 1 tablespoon Parmesan, and remaining 1/4 teaspoon salt.','vegetarian','Pesto pizza'),(11,'Sesame-Ginger-Chickpea-Stuffed Sweet Potatoes','Sesame, especially toasted sesame oil, is a key flavor in many Asian cuisines. It makes sense that tahini would fit here too, especially as a finishing touch for roasted sweet potatoes with Sriracha.','sesame-ginger-chickpea-stuffed-sweet-potatoes-1705p137','Preheat oven to 400Â°F.\r\n\r\nRub potatoes with canola oil; pierce liberally with a fork. Bake at 400Â°F for 1 hour or until tender. Cool. Split potatoes in half lengthwise. Gently score flesh with the tip of a knife.\r\n\r\nPlace chickpeas on a baking sheet; pat dry with paper towels. Add sesame oil; toss. Sprinkle with garlic powder, 1/4 teaspoon salt, and ground ginger; toss. Bake at 400Â°F for 30 minutes, stirring every 10 minutes.\r\n\r\nCombine tahini, fresh ginger, fresh garlic, and vinegar in a bowl. Add 3 tablespoons hot water; stir until loose and smooth.\r\n\r\nCombine Sriracha and 2 teaspoons water in a bowl. Drizzle about 2 teaspoons tahini mixture over each sweet potato half; top with remaining 1/4 teaspoon salt. Top with chickpea mixture, remaining tahini mixture, Sriracha mixture, green onions, and sesame seeds.','vegetarian','Sesame-Ginger-Chickpea-Stuffed Sweet Potatoes'),(12,'Beef bulgogi stir-fry','Quicker than a takeaway and so much better for you, this low-calorie stir-fry is easy to make and ready in just 20 minutes.','Beef-Bulgogi-Stir-Fry-Serenity-Food','Put the ginger, soy, mirin, garlic, pineapple, chilli flakes, sugar and 1 tsp of the sesame oil in a food processor and blend until fine. Pour the marinade into a bowl, add the meat, mix well and leave to sit while you prepare the onion.\r\n\r\nHeat the remaining sesame oil in a large wok or frying pan until very hot. Add the onion and stir-fry for a few mins. Add the beef and the marinade, stirring constantly until itâ€™s cooked through, about 5 mins. Sprinkle with the sesame seeds and serve with rice and chopped spring onions.','omnivorian','Beef bulgori'),(13,'Chicken & chorizo jambalaya\r\n','A Cajun-inspired rice pot recipe with spicy Spanish sausage, sweet peppers and tomatoes.','Cajun-Jambalaya-Recipe-with-Andouille-Sausage-Shrimp-and-Chicken-32','Heat 1 tbsp olive oil in a large frying pan with a lid and brown 2 chopped chicken breasts for 5-8 mins until golden.\r\n\r\nRemove and set aside. Tip in the 1 diced onion and cook for 3-4 mins until soft.\r\n\r\nAdd 1 thinly sliced red pepper, 2 crushed garlic cloves, 75g sliced chorizo and 1 tbsp Cajun seasoning, and cook for 5 mins more.\r\n\r\nStir the chicken back in with 250g long grain rice, add the 400g can of tomatoes and 350ml chicken stock. Cover and simmer for 20-25 mins until the rice is tender.','omnivorian','Chicken and chorizo');
/*!40000 ALTER TABLE `nutrition_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(144) NOT NULL,
  `password` varchar(144) NOT NULL,
  `goal` varchar(32) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `sex` varchar(9) NOT NULL,
  `confirmation_status` int(16) NOT NULL,
  `confirmation_code` int(16) NOT NULL,
  `reset_confirmation` int(16) DEFAULT NULL,
  `reset_code` int(16) DEFAULT NULL,
  `birthdate` varchar(16) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (52,'admin@sae.edu','$2y$10$tK2DUMszjsbrwyqhtHKC3eR/9656AEZRUI4LkVPcvxHHL6cVW5B6a','Build muscles',177,72,'Male',1,0,1,0,'2/5/1992');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `youtube_videos`
--

DROP TABLE IF EXISTS `youtube_videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `youtube_videos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(207) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `thumbnail` varchar(360) NOT NULL,
  `url` varchar(360) NOT NULL,
  `thumbnail_alt` varchar(128) NOT NULL,
  `category` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `youtube_videos`
--

LOCK TABLES `youtube_videos` WRITE;
/*!40000 ALTER TABLE `youtube_videos` DISABLE KEYS */;
INSERT INTO `youtube_videos` VALUES (1,'Body-Sculpting workout to get your heart rate up','POPSUGAR Fitness offers fresh fitness tutorials, workouts, and exercises that will help you on your road to healthy living, weight loss, and stress relief. Check out Class FitSugar, our do-it-along-with-us real-time workout show hosted by Anna Renderer who will inspire you to sweat alongside fitness experts and Hollywoodâ€™s hottest celebrity trainers.','cardio_1','https://www.youtube.com/embed/XZcDkTtBg0A','Video Thumbnail','cardio'),(2,'Burn Up the Calories With This At-Home Cardio Workout\r\n','POPSUGAR Fitness offers fresh fitness tutorials, workouts, and exercises that will help you on your road to healthy living, weight loss, and stress relief.  Check out Class FitSugar, our do-it-along-with-us real-time workout show hosted by Anna Renderer who will inspire you to sweat alongside fitness experts and Hollywoodâ€™s hottest celebrity trainers.','cardio_2','https://www.youtube.com/embed/2S9YiDUI9hA','Cardio','cardio'),(3,'30-Minute No-Equipment Cardio & HIIT Workout','Get ready to torch calories with Le Sweat founder Charlee Atkins! This no-equipment workout includes three circuits that are going to get your heart rate up and have you feeling the burn. The ab sections at the end will definitely have you feeling Le Burn!','cardio_hiit','https://www.youtube.com/embed/CBWQGb4LyAM','Cardio & HIIT Workout','cardio'),(4,'30-Minute Full-Body Strength-Training Workout\r\n','This strength-training workout will get your heart rate up and tone your full body. Each exercise is 25 reps, so take breaks as needed and know that you can work up to it!','strength-popsugar','https://www.youtube.com/embed/6DrOlw2yEHc','30-Minute Full-Body Strength-Training Workout','strength'),(6,'Shaun T\'s 8-Minute Flat-Abs Workout','Get flat abs in 8 minutes with this workout from Beach Body Super Trainer, Creator of Insanity & Shaun Week, Shaun T. You can find more workouts from Shaun T on.','shaun-t-abs','https://www.youtube.com/embed/22_hoTQrsJA','Shaun T','strength'),(7,'30-Minute Full-Body Toning Workout With Demi Lovato\'s Trainer\r\n','Tone your body with Demi Lovato\'s trainer, silver Olympic medalist Kim Glass. Grab a pair of medium and lightweight free weights and towels to use as gliders and get ready to work! ','full-body-toning','https://www.youtube.com/embed/hMLOzqT_7KY','Full-Body Toning Workout','strength'),(8,'15-Minute Bounce-Back Cardio Dance Workout','POPSUGAR Fitness offers fresh fitness tutorials, workouts, and exercises that will help you on your road to healthy living, weight loss, and stress relief.  Check out Class FitSugar, our do-it-along-with-us real-time workout show hosted by Anna Renderer, who will inspire you to sweat alongside fitness experts and Hollywoodâ€™s hottest celebrity trainers. Class FitSugar regularly covers the most buzzed-about workout classes and trends, including the Victoria\'s Secret workout, Tabata, P90X, Bar Method, and more.','cardio-dance-workout','https://www.youtube.com/embed/Rj2IubFfEqY','Tabata cardio dance','cardio'),(9,'7-Minute STRONG by Zumba Leg Workout','Get set to sweat with this lower-body workout from STRONG by Zumba. The moves â€” like squats, lunges, and kicks â€” are synced to the beat of the music and will have your legs burning! Plus, weâ€™re giving you the chance to win a Zumba Cruise Experience for two and $500 in STRONG by Zumba apparel.','zumba-leg-workout','https://www.youtube.com/embed/Eu8yRXjIaJQ','Leg workout','strength'),(10,'5-Minute Stretch Workout For Leaner, Longer Limbs | Class FitSugar','Get strong and flexible with this sweet little stretch sesh. But wait . . . it\'s not just stretching. We\'ve rounded up our favorite strength-training moves that lengthen as they strengthen. Press play and get ready to feel long and lean.','longer-limbs-workout','https://www.youtube.com/embed/f4CgPUEfPnk','Longer limbs streching','stretching'),(11,'30-Minute Yoga With Adriene to Reduce Stress','Get ready to de-stress with this relaxing yoga series from Yoga With Adriene. Yoga With Adriene\'s new series, TRUE: A 30 Day Yoga Journey, will be released on January 1st on.','yoga-with-adriene','https://www.youtube.com/embed/q2G5ZX0JgvQ','Yoga','stretching'),(12,'6 Exercises to Strengthen Your Back | Class FitSugar','Don\'t let back pain keep you down! Here are six exercises that will keep your spine healthy and your core strong. This five-minute workout will teach you the essentials for maintaining a better back, from flexible hips to strong abs. Press play, get ready to stretch and strengthen your back, and feel relief.','back-exercises','https://www.youtube.com/embed/ql_fjjleuu8','Back exercises','stretching'),(13,'The 5 Minute Full Body Stretch\r\n','If you\'re in need of a five-minute full body stretch, then this video is for you!  This routine has 14 stretches, held for 20 second each, that will loosen your major muscle groups from head to toe.\r\n\r\nOne of the secrets of success with flexibility is having a routine. It doesnâ€™t need to be long or complicated, either. Doing just a few minutes of basic stretches on most days of the week will help prevent the loss of flexibility while keeping your body performing optimally.','full-body-stretch','https://www.youtube.com/embed/2L2lnxIcNmo','Full body stretch','stretching');
/*!40000 ALTER TABLE `youtube_videos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-29  9:29:55

