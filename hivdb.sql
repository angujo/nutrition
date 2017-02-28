/*
SQLyog Ultimate v12.2.1 (64 bit)
MySQL - 5.7.14-log : Database - hiv
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`nutrition` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `nutrition`;

/*Table structure for table `category_link` */

DROP TABLE IF EXISTS `category_link`;

CREATE TABLE `category_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(160) DEFAULT NULL,
  `publisher` varchar(150) DEFAULT NULL,
  `dated` datetime DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `thumbnail` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `is_link` tinyint(1) DEFAULT '0',
  `organization` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `category_link` */

insert  into `category_link`(`id`,`name`,`publisher`,`dated`,`url`,`thumbnail`,`created`,`created_by`,`updated`,`updated_by`,`is_link`,`organization`) values 

(1,'HIV prevention programmes overview','AVERT','2017-01-31 00:00:00','http://www.avert.org/professionals/hiv-programming/prevention/overview','http://www.avert.org/sites/default/files/logo_0.png','2017-02-17 11:42:30',1,'2017-02-17 14:59:49',1,1,'AVERT Limited'),

(2,'Natural history and management of early HIV infection','Adrian Mindel and Melinda Tenant-Flowers','2001-05-26 00:00:00','https://www.ncbi.nlm.nih.gov/pmc/articles/PMC1120386/','https://static.pubmed.gov/portal/portal3rc.fcgi/4144485/img/3005255','2017-02-17 11:47:44',1,'2017-02-17 15:00:05',1,1,'AFP');

/*Table structure for table `paged` */

DROP TABLE IF EXISTS `paged`;

CREATE TABLE `paged` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key_code` int(2) NOT NULL DEFAULT '0' COMMENT '0=content, 1=ABCs, 2=Chat',
  `content` text,
  `title` varchar(450) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `paged_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  CONSTRAINT `paged_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`),
  CONSTRAINT `paged_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category_link` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `paged` */

insert  into `paged`(`id`,`key_code`,`content`,`title`,`created`,`updated`,`created_by`,`updated_by`,`category_id`) values 

(1,0,'<p>csvsvervr<br></p>',NULL,NULL,NULL,NULL,NULL,NULL),

(3,1,'<h2>ABC of HIV Prevention</h2><p>\r\n HIV can be transmitted in the sexual fluids, blood or breast milk of an\r\n infected person. HIV prevention therefore involves a wide range of \r\nactivities including prevention of mother-to-child transmission, harm \r\nreduction for injecting drug users, and precautions for health care \r\nworkers.</p><p><br></p><p xss=\"removed\">\r\n This page looks at strategies for preventing sexual transmission of \r\nHIV, and in particular the much-discussed \"ABC\" approach. So what \r\nexactly is the ABC approach, why does it cause such controversy, and \r\ndoes it work?</p><hr xss=\"removed\"><h3 id=\"abc-approach\" xss=\"removed\">\r\n What exactly is the ABC approach?</h3><p xss=\"removed\">\r\n One of the difficulties with the ABC approach is the lack of a clear \r\ndefinition. The slogan seems to have first been adopted by the Botswana \r\ngovernment in the late 1990s. Seen on billboards around the country it \r\nexalted the fact that:</p><table class=\"table\" xss=\"removed\">\r\n <tbody xss=\"removed\">\r\n  <tr xss=\"removed\">\r\n   <td xss=\"removed\">\r\n    \"Avoiding AIDS as easy as…</td>\r\n   <td xss=\"removed\">\r\n    <b class=\"red\" xss=\"removed\">A</b> bstain<br xss=\"removed\">\r\n    <b class=\"red\" xss=\"removed\">B</b> e faithful<br xss=\"removed\">\r\n    <b class=\"red\" xss=\"removed\">C</b> ondomise\"</td>\r\n  </tr>\r\n </tbody>\r\n</table><hr class=\"h3\" xss=\"removed\"><h3 id=\"was-saying-something-new\" xss=\"removed\">\r\n Was this saying something new?</h3><p>\r\n Since the late 1980s it had been known that individuals could take \r\naction to either reduce or avoid altogether the risk of becoming \r\ninfected with HIV through sexual transmission.</p><p xss=\"removed\">\r\n The risk could be avoided altogether by avoiding any sexual activities that could cause transmission of HIV (i.e. <b class=\"red\" xss=\"removed\">Abstain</b>).</p><p xss=\"removed\">\r\n The risk could also be reduced, through avoiding sexual intercourse \r\nother than with a mutually faithful uninfected partner (i.e. <b class=\"red\" xss=\"removed\">Be faithful</b>) or through the correct and consistent use of condoms (i.e.<b class=\"red\" xss=\"removed\">Condomise</b>).</p><p xss=\"removed\">\r\n So Botswana hadn’t really developed a new approach to HIV prevention, \r\nbut rather a new way of putting across known risk reduction and risk \r\navoidance strategies.</p><hr class=\"h3\" xss=\"removed\"><h3 id=\"controversial\" xss=\"removed\">\r\n Was this controversial?</h3><p>\r\n The ABC definition adopted by Botswana was not particularly \r\ncontroversial. It was primarily a slogan used as part of a general \r\npublic AIDS awareness campaign, and it did not attempt to define the \r\ncircumstances under which the component parts of A, B and C would be \r\npromoted and whom they would be promoted to.</p><p>\r\n<br></p><p xss=\"removed\">\r\n But since the use of this slogan in Botswana there have been other \r\nvariations which have more specific definitions, most notably those \r\nadopted by the US-funded PEPFAR initiative, and others adopted by \r\nUNAIDS.</p><hr class=\"h3\" xss=\"removed\"><h3 id=\"pepfar-definition\" xss=\"removed\">\r\n What is the PEPFAR definition of ABC?</h3><p>\r\n PEPFAR follows an ABC strategy through \"population-specific interventions\" that emphasise:</p><ul xss=\"removed\"><li xss=\"removed\">\r\n  <b class=\"red\" xss=\"removed\">A</b> bstinence for youth, including the delay of sexual debut and abstinence until marriage</li><li xss=\"removed\">\r\n  <b class=\"red\" xss=\"removed\">B</b> eing tested for HIV and being faithful in marriage and monogamous relationships</li><li xss=\"removed\">\r\n  <b class=\"red\" xss=\"removed\">C</b> orrect and consistent use of condoms for those who practice high-risk behaviours.</li></ul><p>\r\n Those who practice high-risk behaviours include \"prostitutes, sexually \r\nactive discordant couples (in which one partner is known to have HIV), \r\nsubstance abusers, and others\". The PEPFAR definition does not include \r\nthe promotion of condoms to young people in general. However, PEPFAR \r\ndoes say that its funds may be used to support programmes that deliver \r\nage-appropriate \"ABC information\" for young people, provided they are \r\ninformed about failure rates of condoms, and provided the programmes do \r\nnot appear to present abstinence and condom use as equally viable, \r\nalternative choices.</p><hr class=\"h3\" xss=\"removed\"><h3 id=\"unaids-definition\" xss=\"removed\">\r\n And what is the UNAIDS definition of ABC?</h3><p>\r\n For UNAIDS, ABC means:</p><ul xss=\"removed\"><li xss=\"removed\">\r\n  <b class=\"red\" xss=\"removed\">A</b> bstinence or delaying first sex</li><li xss=\"removed\">\r\n  <b class=\"red\" xss=\"removed\">B</b> eing safer by being faithful to one partner or by reducing the number of sexual partners</li><li xss=\"removed\">\r\n  <b class=\"red\" xss=\"removed\">C</b> orrect\r\n and consistent use of condoms for sexually active young people, couples\r\n in which one partner is HIV-positive, sex workers and their clients, \r\nand anyone engaging in sexual activity with partners who may have been \r\nat risk of HIV exposure.</li></ul><hr class=\"h3\" xss=\"removed\"><h3 id=\"controversy\" xss=\"removed\">\r\n So what is the controversy about?</h3><p>\r\n The controversy arises from the differences between these two \r\ndefinitions of ABC, and in particular the fact that with the PEPFAR \r\ndefinition there is no promotion of condoms for young people (or anyone \r\nelse outside the \"high risk groups\"), and that with abstinence the \r\nemphasis is on abstaining until marriage.</p><p xss=\"removed\">\r\n If, in countries where there is a high prevalence of HIV infection \r\nresulting from sexual transmission, young people delay having sex for \r\nthe first time, then this risk avoidance will indeed result in them \r\navoiding infection whilst they are adopting this approach.</p><p xss=\"removed\">\r\n However, abstinence until marriage does not always ensure safety, \r\nbecause marriage in itself provides no protection from infection. Many \r\npeople are unsure of the HIV status of their partners, and those who are\r\n faithful cannot be certain that their partner is maintaining the same \r\ncommitment.</p><p xss=\"removed\">\r\n Abstinence is not a realistic option for the millions of women and \r\ngirls who are in abusive relationships, or those who have been taught \r\nalways to obey men. People who do not abstain should do everything \r\npossible to reduce risk, including using condoms.</p><p xss=\"removed\">\r\n <i xss=\"removed\">\"condoms,\r\n when distributed with educational materials as part of a comprehensive \r\nprevention package, have been shown to significantly lower sexual risk \r\nand activity, both among those already sexually active and those who are\r\n not.\"</i> – UNAIDS, October 2004.</p><p xss=\"removed\">\r\n A large number of AIDS organisations and experts have voiced concern \r\nthat PEPFAR is putting too much emphasis on abstinence until marriage, \r\nand is not doing enough to make young people aware that condoms, if used\r\n correctly and consistently, are highly effective at preventing HIV \r\ninfection.</p><hr class=\"h3\" xss=\"removed\"><h3 id=\"uganda-mentioned\" xss=\"removed\">\r\n Why is Uganda so often mentioned in relation to the ABC of HIV prevention?</h3><p xss=\"removed\">\r\n The ABC approach to HIV prevention is often said to have started in \r\nUganda, and it is said by some people to have been the reason for \r\nUganda’s unique success in reducing its HIV prevalence (defined as the \r\nproportion of adults living with HIV).</p><hr class=\"h3\" xss=\"removed\"><h3 id=\"what-happened-uganda\" xss=\"removed\">\r\n What happened in Uganda?</h3><p>\r\n When HIV was rapidly spreading through the population of Uganda in the \r\nlate 1980s, President Yoweri Museveni, unlike most other African leaders\r\n at the time, recognised the danger and took swift action showing \r\nforceful leadership. Uganda’s response was powerful and wide-ranging. \r\nThe government launched an aggressive media campaign involving posters, \r\nradio messages and rallies; they trained teachers to begin effective HIV\r\n and AIDS education; and – most importantly – they mobilised community \r\nleaders, churches and indeed the public in general.</p><p xss=\"removed\">\r\n The government worked alongside many independent organisations, using \r\ndifferent messages to address different groups of people according to \r\ntheir needs as well as their ability to respond. Young people were \r\nencouraged to wait before first having sex, or to return to abstinence \r\nif they were not virgins. All sexually active people were given the \r\nmessage of \"zero grazing\", which meant staying with regular partners and\r\n not having casual sex. Those who did not abstain were encouraged to use\r\n condoms, which were promoted to the population as a whole.</p><p xss=\"removed\">\r\n In order to encourage people to take up such strategies – and to make \r\nthem effective – action was taken to encourage candid discussion of HIV \r\nand AIDS, to reduce stigma, to better the status of women, to improve \r\ntesting facilities, to treat other sexually transmitted infections and \r\nto provide better care for those already infected. Fear was also a part \r\nof the strategy, but the campaigns explained how to avoid or reduce risk\r\n and so not be overtaken by fear.</p><hr class=\"h3\" xss=\"removed\"><h3 id=\"what-worked-uganda\" xss=\"removed\">\r\n What worked in Uganda?</h3><p>\r\n What appears to have worked in Uganda was a combination of risk \r\navoidance and risk reduction approaches. These resulted in a fall in the\r\n annual number of new infections between the late 1980s and mid 1990s, \r\nwhich in turn led to a reduction in HIV prevalence. In later years, an \r\nincrease in the death rate probably made a contribution to further \r\ndeclines in prevalence, while the number of new infections remained more\r\n or less unchanged.</p><p xss=\"removed\">\r\n What has been particularly important in Uganda has been the combination\r\n of messages and approaches that have been used, including the \r\nwidespread promotion and distribution of condoms. During the 1990s, \r\nschemes funded by USAID and other donors greatly increased condom use.</p><p xss=\"removed\">\r\n <i xss=\"removed\">\"The\r\n ABC approach in Uganda was and still is more than just abstinence and \r\nneeds to be balanced without any emphasis on one aspect. Neither \"A\" nor\r\n \"B\" nor \"C\" on its own can provide the answer to reducing risk of \r\ninfection that is practical for every member of the population.\"</i> – Dr Stella Talisuna, March 2005.</p><hr class=\"h3\" xss=\"removed\"><h3 id=\"relate-pepfar\" xss=\"removed\">\r\n How does this relate to PEPFAR?</h3><p>\r\n<br></p><p>\r\n For a while after being popularised in Botswana in the late 1990s, the \r\nterm ABC of HIV prevention was little used elsewhere. But then, in \r\nDecember 2002, it was decided that America’s approach to the prevention \r\nof sexual HIV transmission would in future be described as ABC. This \r\ndecision appears to have been largely based on, and is now being \r\npromoted and is justified on, the basis that ABC was what worked in \r\nUganda. But the simple catchphrase \"ABC\" cannot sufficiently describe \r\nwhat happened in Uganda.</p><p xss=\"removed\">\r\n Without doubt measures to promote abstinence, fidelity and condom use \r\nare all essential to any comprehensive HIV prevention programme – but \r\nthey alone are not enough. Also required is strong political commitment,\r\n frank and open discourse, community mobilisation and involvement of \r\nlocal organisations and businesses, as well as practical measures such \r\nas HIV testing and counselling, treatment of STIs, campaigns to combat \r\nstigma and discrimination, and efforts to promote gender equality. It \r\nseems misleading and inappropriate to use the example of Uganda, which \r\nemployed such a comprehensive programme, to justify or promote any one \r\nparticular definition of \"ABC\".</p><p><br></p>',NULL,'2017-02-17 09:39:43','2017-02-17 15:06:10',1,1,NULL),

(4,2,'misc,unwanted,aids,great,and another',NULL,'2017-02-17 09:49:00','2017-02-17 15:05:43',1,1,NULL);

/*Table structure for table `session` */

DROP TABLE IF EXISTS `session`;

CREATE TABLE `session` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(250) NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `started` datetime DEFAULT NULL,
  `ended` datetime DEFAULT NULL,
  `app` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=android, 1=web',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `session_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `session` */

insert  into `session`(`id`,`slug`,`user_id`,`started`,`ended`,`app`) values 

(1,'1e8fdab2e9c25e4a9c62eb903b589467',1,'2017-02-17 08:07:51',NULL,1),

(2,'78f303ba90e784dbc45e7b8db660fdce',1,'2017-02-17 08:37:10',NULL,1),

(3,'cf15d6812968aae8a312127f4c23183e',1,'2017-02-17 08:37:30','2017-02-17 09:02:42',1),

(4,'2080c197d0b65ac32a2ad551b7f26204',1,'2017-02-17 09:03:53','2017-02-17 09:04:02',1),

(5,'6dd4695b87a8840723ff6567b61dbc63',1,'2017-02-17 09:05:24',NULL,1);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(120) DEFAULT NULL,
  `last_name` varchar(120) DEFAULT NULL,
  `email` varchar(65) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `is_enabled` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`first_name`,`last_name`,`email`,`username`,`password`,`is_admin`,`is_enabled`,`created`) values 

(1,'John','Doe','jdoe@gmail.com','jdoe','$2y$10$enLFXhbvWXQYlqCvPl1m/urEAg6HG5QoP.mmFKj5OBY.AL0lQ1Hjm',0,0,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
