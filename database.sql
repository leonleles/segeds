/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : english_school

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-11-15 22:47:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES ('1', 'Ãudio 1: From Struggle Comes Success', 'audio');
INSERT INTO `categorias` VALUES ('2', 'Ãudio 2: A Unique Friendship Brought Together By Skype', 'audio');

-- ----------------------------
-- Table structure for files
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `texto_english` text,
  `texto_portugues` text,
  `texto_livre` text,
  `tipo` varchar(20) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `data_upload` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of files
-- ----------------------------
INSERT INTO `files` VALUES ('1', '1', 'Parte - 9', 'That is my story in life, it was my story in the past, and itâ€™ll&nbsp;be my story in the future. The ability to never give up, and to always&nbsp;know where I want to go. I will not let anybody deter me from that goal,&nbsp;and I will never let anybody discourage me from achieving my goals.', '<div>Essa Ã© a minha histÃ³ria na vida, essa foi a minha histÃ³ria no passado&nbsp;e serÃ¡ a minha histÃ³ria no futuro. A habilidade de nunca desistir,&nbsp;e sempre saber aonde quero ir. Eu nÃ£o deixarei ninguÃ©m me desviar&nbsp;desse objetivo, e nunca deixarei ninguÃ©m me desencorajar de alcanÃ§ar&nbsp;os meus objetivos.</div>', '<div><span style=\"color: rgb(0, 49, 99); font-weight: bold;\">That is my story in life, it was my story in the past,</span></div><div>Essa Ã© a minha histÃ³ria na vida, essa foi a minha histÃ³ria no passado,</div><div><br></div><div><span style=\"font-weight: bold; color: rgb(0, 49, 99);\">and it\'ll be my story in the future. The ability to never give up,</span></div><div>e serÃ¡ a minha histÃ³ria no futuro. A habilidade de nunca desistir,</div><div><span style=\"font-weight: bold; color: rgb(0, 49, 99);\"><br></span></div><div><span style=\"font-weight: bold; color: rgb(0, 49, 99);\">and to always know where i want to go. I will not let anybody deter me from that goal,</span></div><div>e sempre saber aonde quero ir. Eu nÃ£o deixarei ninguÃ©m me desviar desse objetivo,</div><div><span style=\"font-weight: bold; color: rgb(0, 49, 99);\"><br></span></div><div><span style=\"font-weight: bold; color: rgb(0, 49, 99);\">and I will never let anybody discourage me from achieving my goals.</span></div><div>e nunca deixarei ninguÃ©m me desencorajar de alcanÃ§ar os meus objetivos</div>', 'mp3', '9aad28fa526ab568ed2fac93b5084095.mp3', '2017-11-12 21:16:30');
INSERT INTO `files` VALUES ('2', '2', 'Parte - 1', 'I consider Paige like a long-lost sister that I like never had that I should have had. The crazy thing is me and Paige have been so close, but we actually have never met. Well, this was the first time that I held Sarah.', 'Eu considero a Paige como uma irmÃ£ que nÃ£o vejo a muito tempo que eu tipo, nunca tive, que eu deveria ter tido. O que Ã© maluco Ã© que eu e a Paige somos muito prÃ³ximas, mas nÃ³s na verdade nunca nos encontramos. Bom, essa foi a primeira vez que eu segurei a Sarah.', '<div><span style=\"color: rgb(57, 132, 198); font-weight: bold;\">I consider Paige like a long-lost sister&nbsp;</span></div><div>Eu considero a Paige como uma irmÃ£ que nÃ£o vejo a muito tempo</div><div><br></div><div><span style=\"font-weight: bold; color: rgb(57, 132, 198);\">that I like never had</span></div><div>que eu tipo, nunca tive,</div><div>&nbsp;</div><div><span style=\"font-weight: bold; color: rgb(57, 132, 198);\">that I should have had.&nbsp;</span></div><div>que eu deveria ter tido.</div><div><br></div><div><span style=\"font-weight: bold; color: rgb(57, 132, 198);\">The crazy thing</span></div><div>O que Ã© maluco</div><div><br></div><div><span style=\"font-weight: bold; color: rgb(57, 132, 198);\">is me and Paige have been so close</span></div><div>Ã© que eu e a Paige somos muito prÃ³ximas,</div><div><br></div><div><span style=\"font-weight: bold; color: rgb(57, 132, 198);\">but we actually&nbsp;</span></div><div>mas nÃ³s na verdade</div><div>&nbsp;</div><div><span style=\"font-weight: bold; color: rgb(57, 132, 198);\">have never met.</span></div><div>nunca nos encontramos.</div><div><br></div><div><span style=\"font-weight: bold; color: rgb(57, 132, 198);\">Well, this was the first time that I held Sarah.</span></div><div>Bom, essa foi a primeira vez que eu segurei a Sarah.</div>', 'mp3', '9a3147374ad761b0e812b61f1ae4444d.mp3', '2017-11-12 22:09:20');
INSERT INTO `files` VALUES ('3', '2', 'Parte - 2 ', 'My mom was pregnant of me, and just found out that I had one arm at 20 weeks, I think. She wanted to find someone else that was experiencing the same thing. So she went on a website, and found Teresa and Paige.', 'Minha mÃ£e estava grÃ¡vida de mim, e simplesmente descobriu que eu tinha um braÃ§o sÃ³, com 20 semanas eu acho. Ela queria encontrar mais alguÃ©m que estivesse passando pela mesma coisa. EntÃ£o ela entrou em um website e encontrou a Teresa e a Paige.', '<div><b style=\"color: rgb(206, 0, 0);\">My mom was pregnant of me,</b></div><div>Minha mÃ£e estava grÃ¡vida de mim,</div><div><br></div><div><span style=\"font-weight: bold; color: rgb(206, 0, 0);\">and just found out</span></div><div>e simplesmente descobriu</div><div><span style=\"color: rgb(206, 0, 0);\"><br></span></div><div><span style=\"font-weight: bold; color: rgb(206, 0, 0);\">that I had one arm at 20 weeks, I think.</span></div><div>que eu tinha um braÃ§o sÃ³, com 20 semanas eu acho.</div><div><br></div><div><span style=\"font-weight: bold; color: rgb(206, 0, 0);\">She wanted to find someone else</span></div><div>Ela queria encontrar mais alguÃ©m</div><div><span style=\"color: rgb(206, 0, 0);\"><br></span></div><div><span style=\"font-weight: bold; color: rgb(206, 0, 0);\">that was experiencing the same thing.</span></div><div>que estivesse passando pela mesma coisa.</div><div><br></div><div><span style=\"font-weight: bold; color: rgb(206, 0, 0);\">So she went on a website,</span></div><div>EntÃ£o ela entrou em um website</div><div><span style=\"font-weight: bold; color: rgb(206, 0, 0);\"><br></span></div><div><span style=\"font-weight: bold; color: rgb(206, 0, 0);\">and found Teresa and Paige.</span></div><div>e encontrou a Teresa e a Paige.</div>', 'mp3', '66f924bdee91b1161e85da4a07a6bbf1.mp3', '2017-11-12 22:10:35');
INSERT INTO `files` VALUES ('4', '2', 'Parte - 3', 'When me and Sarah were born, our parents were sending letters and pictures to each other and stuff, so they became close. And then we kind of lost touch, because Teresa had two more kids. When I was eight, I needed someone there that could understand everything about me, and I was like I want to find Paige.', '<div style=\\\"text-align: justify;\\\"><font color=\\\"#222222\\\" face=\\\"Verdana, Geneva, sans-serif\\\">Quando eu e a Sarah nascemos, nossos pais estavam/ficavam enviando cartas e fotos uns para os outros e coisas do tipo, entÃ£o eles se tornaram prÃ³ximos. E entÃ£o nÃ³s meio que perdemos contato, porque a Teresa tinha mais duas crianÃ§as. Quando eu tinha 8 anos, eu precisava de alguÃ©m lÃ¡ que pudesse entender tudo sobre mim, e eu fiquei tipo, eu tenho que encontrar a Paige.</font></div>', '<p><b style=\"color: rgb(255, 156, 0);\">When me and Sarah were born,</b></p><p>Quando eu e a Sarah nascemos,</p><p> </p><p><span style=\"color: rgb(255, 156, 0); font-weight: bold;\">our parents were sending letters and pictures to each other and stuff, </span></p><p>nossos pais ficavam/estavam enviando cartas e fotos uns para os outros e coisas do tipo,</p><p><span style=\"color: rgb(255, 156, 0); font-weight: bold;\">so they became close.</span></p><p><span style=\"color: rgb(255, 156, 0); font-weight: bold;\"> </span></p><p>entÃ£o eles se tornaram prÃ³ximos.</p><p><span style=\"color: rgb(255, 156, 0); font-weight: bold;\">And then we kind of lost touch, </span></p><p><span style=\"color: rgb(34, 34, 34); font-family: Verdana, Geneva, sans-serif; text-align: justify;\">E entÃ£o nÃ³s meio que perdemos contato</span></p><p><span style=\"font-weight: bold; color: rgb(255, 156, 0);\">because Teresa had two more kids.</span></p><p><span style=\"font-weight: bold; color: rgb(255, 156, 0);\"> </span></p><p>porque a Teresa tinha mais duas crianÃ§as.&nbsp;</p><p><span style=\"font-weight: bold; color: rgb(255, 156, 0);\">When I was eight, I needed someone there </span></p><p>Quando eu tinha 8 anos, eu precisava de alguÃ©m lÃ¡</p><p><span style=\"font-weight: bold; color: rgb(255, 156, 0);\">that could understand everything about me, </span></p><p>&nbsp;que pudesse entender tudo sobre mim,</p><p><span style=\"color: rgb(255, 156, 0); font-weight: bold;\">and I was like I want to find Paige.</span></p><p>&nbsp;e eu fiquei tipo, eu tenho que encontrar a Paige.</p><p><br></p>', 'mp3', '24f35e5686e81c425738d01019c1c7b7.mp3', '2017-11-13 22:58:14');
INSERT INTO `files` VALUES ('6', '2', 'Parte - 4', '                                My mom got an email from her mom, and apparently they had been looking for us for three years. We started emailing first. I asked her one day if she had Skype. What time is it for you? When I first saw Paige, it was like I’d seen a mirror image of me. When I saw Sarah, it was kind of like, “Oh, this is how people see me.” We would talk about boys, and life, and compare things.                        ', '                                A minha mãe recebeu um email da mãe dela e, aparentemente, elas estavam procurando por nós há três anos. Nós começamos a trocar e-mails primeiro. Um dia perguntei para ela se ela tinha Skype. Que horas são aí para você? Sarah: Quando eu vi a Paige pela primeira vez, foi como se eu tivesse me visto no espelho. Paige: Quando eu vi a Sarah, foi tipo como, “Oh, é assim que as pessoas me vêem.” Sarah: Nós costumávamos falar sobre garotos, e a vida, e comparar coisas.                        ', '                                Texto Livre...                        ', 'mp3', '8cc81c8348602cfd6f8b02d609c4c094.mp3', '2017-11-16 00:46:19');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL,
  `pass` varchar(32) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'Jolivar Jr.', 'jjr', '912ec803b2ce49e4a541068d495ab570', '2');
