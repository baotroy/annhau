CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table fur.admin: ~1 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `role`, `active`, `created`, `modified`, `deleted`) VALUES
	(1, 'admin', '1869e5577985ea2ef0a34e443a5b57276f9fb78a', NULL, NULL, NULL, 1, 1, '2015-06-09 18:55:21', '2015-06-11 19:19:40', 0);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;


-- Dumping structure for table fur.banners
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(50) NOT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table fur.banners: ~6 rows (approximately)
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` (`id`, `image`, `del_flg`) VALUES
	(1, 'golden_banner.png', 1),
	(2, 'blue.jpg', 0),
	(3, 'banner150610173133.PNG', 1),
	(4, 'banner150610173703.jpg', 1),
	(5, 'banner150610174118.gif', 0),
	(6, 'banner150611202546.jpeg', 0);
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;


-- Dumping structure for table fur.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(50) NOT NULL,
  `name_vi` varchar(50) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `description_vi` mediumtext,
  `description_en` mediumtext,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table fur.categories: ~3 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name_en`, `name_vi`, `image`, `description_vi`, `description_en`, `created`, `modified`, `deleted`) VALUES
	(1, 'Bedroom', 'Phòng ngủ', 'c150612132117.jpg', 'Mô tả tiến việt', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas sed nunc in ex porttitor ', '0000-00-00 00:00:00', '2015-06-12 13:21:17', 0),
	(2, 'Living Room', 'Phòng khách', NULL, 'Mô tả tiến việt', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas sed nunc in ex porttitor ', '0000-00-00 00:00:00', '2015-06-11 19:17:53', 0),
	(3, 'Kitchen &  Dining', 'Bếp & Nhà ăn', NULL, 'Mô tả tiến việt', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas sed nunc in ex porttitor ', '0000-00-00 00:00:00', '2015-06-11 19:18:20', 0);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table fur.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentator` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `product` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- Dumping data for table fur.comments: ~7 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `commentator`, `email`, `product`, `content`, `created`, `modified`, `deleted`) VALUES
	(15, 'bao', 'troy@kjsl.com', 3, 'jaldkj lksjlfks\r\nsdf\r\nsf\r\nsd\r\nfsd\r\nf', '2015-06-05 18:31:34', '2015-06-11 20:06:21', 1),
	(17, 'sfs', 'kljf@sdlkfj.kjlk', 3, 'lsdkfjlkd', '2015-06-05 18:32:58', '2015-06-11 20:10:19', 1),
	(19, 'Thor', 'thor@heaven.com', 3, 'lkdsfl\r\ndsf\r\nsd\'dfsf\'df', '2015-06-05 18:41:47', '2015-06-11 20:00:35', 1),
	(20, 'troy', 'lks@lhlk.com', 3, 'sdfs', '2015-06-05 18:44:44', '2015-06-11 20:00:06', 1),
	(21, 'dfjl', 'lj@klj.com', 1, 'dsfsdf', '2015-06-08 14:04:21', '2015-06-11 19:58:59', 1),
	(22, 'bao', 'tjlk@ljlk.com', 1, 'sdfsdfsdf', '2015-06-11 20:07:24', '2015-06-11 20:09:23', 1),
	(23, 'Bao', 'baotq@bit-vietnam.com', 4, 'Dhdjdjd', '2015-06-11 20:19:21', '2015-06-11 20:19:21', 0);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


-- Dumping structure for table fur.inqueries
CREATE TABLE IF NOT EXISTS `inqueries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `content` varchar(200) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `read` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table fur.inqueries: ~5 rows (approximately)
/*!40000 ALTER TABLE `inqueries` DISABLE KEYS */;
INSERT INTO `inqueries` (`id`, `name`, `email`, `content`, `tel`, `read`, `created`, `del_flg`) VALUES
	(1, '0', 'baotq@bit-vietnam.com', 'ljla\r\nad\r\n', '9808098', 0, '2015-06-09 17:35:34', 1),
	(2, '0', 'jlj@klsj.com', 'jlsd\r\n\r\nsf', '0809089', 0, '2015-04-09 17:40:34', 0),
	(3, '0', 'baotq@bit-vietnam.com', 'sdfs\r\nsdfsd', '80808', 0, '2015-06-10 20:16:38', 1),
	(4, 'bao', 'baotq@bit-vietnam.com', 'sjdflsdf', '08089', 127, '2015-06-10 20:19:10', 1),
	(5, 'jl', 'jlj@klsj.com', 'lksfs\r\nsdfsf\r\nsdfsf\r\nsfsdf', '324234234', 127, '2015-06-10 20:22:32', 0);
/*!40000 ALTER TABLE `inqueries` ENABLE KEYS */;


-- Dumping structure for table fur.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(100) NOT NULL,
  `name_vi` varchar(100) NOT NULL,
  `short_description_en` text NOT NULL,
  `short_description_vi` text NOT NULL,
  `long_description_en` text NOT NULL,
  `long_description_vi` text NOT NULL,
  `category` int(11) NOT NULL,
  `creator` int(11) NOT NULL DEFAULT '1',
  `image_1` varchar(50) NOT NULL,
  `image_2` varchar(50) NOT NULL,
  `image_3` varchar(50) NOT NULL,
  `image_4` varchar(50) NOT NULL,
  `image_5` varchar(50) NOT NULL,
  `rate` float NOT NULL DEFAULT '0',
  `rate_count` int(11) NOT NULL DEFAULT '0',
  `available` tinyint(4) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table fur.products: ~5 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name_en`, `name_vi`, `short_description_en`, `short_description_vi`, `long_description_en`, `long_description_vi`, `category`, `creator`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `rate`, `rate_count`, `available`, `created`, `modified`, `deleted`) VALUES
	(1, 'Procat1sub11', 'Sản phẩm 1sub11', 'shor shor shor shor shor shor shor shor shor shor shor shor shor shor ', '', 'long long long long long long long long long long long long long long long long long ', '', 1, 0, '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', 3.3125, 9, 1, '2015-05-07 17:18:48', '0000-00-00 00:00:00', 0),
	(2, 'Procat1sub12', 'Sản phẩm 1sub12', '', '', '', '', 1, 0, 'p015150612042218.png', 'p115150612042218.PNG', '3.jpg', '4.jpg', '5.jpg', 0, 0, 1, '2015-06-07 17:17:53', '2015-06-12 16:22:19', 0),
	(3, 'Procat1sub21', 'Sản phẩm 1sub21', '', '', '', '', 2, 0, '3.jpg', '2.jpg', '1.jpg', '4.jpg', '5.jpg', 3.5, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(4, 'Procat2sub41', 'Sản phẩm 2sub41', '', '', '', '', 4, 0, '4.jpg', '2.jpg', '3.jpg', '1.jpg', '5.jpg', 0, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(5, 'Procat1sub21', 'Sản phẩm 1sub21', '', '', '', '', 2, 0, '3.jpg', '2.jpg', '1.jpg', '4.jpg', '5.jpg', 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


-- Dumping structure for table fur.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `map_lat` varchar(20) DEFAULT NULL,
  `map_long` varchar(20) DEFAULT NULL,
  `site_name` varchar(100) DEFAULT '0',
  `address_1_en` varchar(100) DEFAULT NULL,
  `address_2_en` varchar(100) DEFAULT NULL,
  `address_1_vi` varchar(100) DEFAULT NULL,
  `address_2_vi` varchar(100) DEFAULT NULL,
  `tel_1` varchar(20) DEFAULT NULL,
  `tel_2` varchar(20) DEFAULT NULL,
  `fax_1` varchar(20) DEFAULT NULL,
  `fax_2` varchar(20) DEFAULT NULL,
  `contact_info_en` text,
  `contact_info_vi` text,
  `email_1` varchar(30) DEFAULT NULL,
  `email_2` varchar(30) DEFAULT NULL,
  `about_en` longtext,
  `about_vi` longtext,
  `description_vi` text,
  `description_en` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table fur.settings: ~1 rows (approximately)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `map_lat`, `map_long`, `site_name`, `address_1_en`, `address_2_en`, `address_1_vi`, `address_2_vi`, `tel_1`, `tel_2`, `fax_1`, `fax_2`, `contact_info_en`, `contact_info_vi`, `email_1`, `email_2`, `about_en`, `about_vi`, `description_vi`, `description_en`) VALUES
	(1, '30.032948', '-89.861797', '0', 'District 4', 'HCMC', 'Địa chỉ 1 Ho chi Minh', 'Địa chỉ 2, Sài gòn', '1234567890', '9876543210', '1234567890', '9876543210', 'contact\r\ncontact\r\nsdfsdf\r\n', 'Thông tin liên hệ \r\nThông tin liên hệ \r\nThông tin liên hệ', 'admin@ryta.com', NULL, '<div class="content__header tonal__header u-cf">\r\n<div class="gs-container" style="position: relative; margin: 0px auto; max-width: 81.25rem; box-sizing: border-box; padding: 0px 1.25rem;">\r\n<div class="content__main-column" style="max-width: 38.75rem; margin: auto 20rem auto 15rem; position: relative;">\r\n<h1><span style="color:#FF0000">Wikipedia: account at centre of row &#39;not linked&#39; to Grant Shapps</span></h1>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="tonal__standfirst u-cf">\r\n<div class="gs-container" style="position: relative; margin: 0px auto; max-width: 81.25rem; box-sizing: border-box; padding: 0px 1.25rem;">\r\n<div class="content__main-column" style="max-width: 38.75rem; margin: auto 20rem auto 15rem; position: relative;">\r\n<div class="content__standfirst" style="font-size: 1.125rem; line-height: 1.375rem; font-family: \'Guardian Egyptian Web\', \'Guardian Text Egyptian Web\', Georgia, serif; margin-bottom: 0.375rem; color: rgb(118, 118, 118);">\r\n<p>Online encyclopedia&rsquo;s arbitration committee says site administrator had &lsquo;no significant evidence&rsquo; to link account under name Contribsx to Tory MP</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="content__main tonal__main tonal__main--tone-news" style="font-family: \'Guardian Text Egyptian Web\', Georgia, serif; font-size: medium; line-height: 24px;">\r\n<div class="gs-container" style="position: relative; margin: 0px auto; max-width: 81.25rem; box-sizing: border-box; padding: 0px 1.25rem;">\r\n<div class="content__main-column content__main-column--article js-content-main-column " style="min-height: 17.25rem; max-width: 38.75rem; margin: auto 20rem auto 15rem; position: relative;">\r\n<div class="js-football-tabs football-tabs content__mobile-full-width" style="margin-left: 0px; margin-right: 0px;">&nbsp;</div>\r\n\r\n<div><a class="article__img-container js-gallerythumbs" href="http://www.theguardian.com/politics/2015/jun/09/wikipedia-account-at-centre-of-row-not-linked-to-grant-shapps#img-1" style="color: rgb(0, 86, 137); cursor: pointer; text-decoration: none; background: transparent;"><img alt="Former Conservative Party co-chairman Grant Shapps" class="maxed responsive-img" src="http://i.guim.co.uk/static/w-300/h--/q-95/sys-images/Guardian/Pix/pictures/2015/6/9/1433874817113/060da5d2-fed2-4a19-a83e-631064403f5d-300x180.jpeg" style="border:0px; display:block; width:620px" /></a></div>\r\n\r\n<p>&nbsp;The Guardian pointed out that Grant Shapps&rsquo;s Wikipedia page appeared to have had critical comments removed. Photograph: Leon Neal/AFP/Getty Images</p>\r\n\r\n<div class="content__meta-container js-content-meta js-football-meta u-cf\r\n    \r\n    \r\n    \r\n    \r\n    \r\n    \r\n    " style="min-height: 2.25rem; position: absolute; margin-bottom: 1rem; border-top-width: 0px; border-bottom-width: 0px; top: 0px; margin-left: -15rem; width: 13.75rem;">\r\n<p><a class="tone-colour" href="http://www.theguardian.com/profile/randeepramesh" rel="author" style="color: rgb(0, 86, 137); cursor: pointer; text-decoration: none; background: transparent;">Randeep Ramesh</a></p>\r\n\r\n<p>Tuesday 9 June 2015&nbsp;20.06&nbsp;BSTLast modified on Wednesday 10 June 201500.19&nbsp;BST</p>\r\n\r\n<div class="meta__extras" style="position: relative; clear: both;">\r\n<div class="meta__social" style="border-top-width: 0.0625rem; border-top-style: dotted; border-top-color: rgb(223, 223, 223); padding: 0px; box-sizing: border-box;">\r\n<ul>\r\n	<li><a class="social__action social-icon-wrapper" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fgu.com%2Fp%2F49jne%2Fsfb&amp;ref=responsive" style="color: rgb(0, 86, 137); cursor: pointer; text-decoration: none; display: inline-block; background: transparent;" target="_blank" title="Facebook">Share on Facebook</a></li>\r\n	<li><a class="social__action social-icon-wrapper" href="https://twitter.com/intent/tweet?text=Wikipedia%3A+account+at+centre+of+row+%27not+linked%27+to+Grant+Shapps&amp;url=http%3A%2F%2Fgu.com%2Fp%2F49jne%2Fstw" style="color: rgb(0, 86, 137); cursor: pointer; text-decoration: none; display: inline-block; background: transparent;" target="_blank" title="Twitter">Share on Twitter</a></li>\r\n	<li><a class="social__action social-icon-wrapper" href="mailto:?subject=Wikipedia%3A%20account%20at%20centre%20of%20row%20%27not%20linked%27%20to%20Grant%20Shapps&amp;body=http%3A%2F%2Fgu.com%2Fp%2F49jne%2Fsbl" style="color: rgb(0, 86, 137); cursor: pointer; text-decoration: none; display: inline-block; background: transparent;" target="_blank" title="Email">Share via Email</a></li>\r\n	<li><a class="social__action social-icon-wrapper" href="http://www.linkedin.com/shareArticle?mini=true&amp;title=Wikipedia%3A+account+at+centre+of+row+%27not+linked%27+to+Grant+Shapps&amp;url=http%3A%2F%2Fgu.com%2Fp%2F49jne" style="color: rgb(0, 86, 137); cursor: pointer; text-decoration: none; display: inline-block; background: transparent;" target="_blank" title="LinkedIn">Share on LinkedIn</a></li>\r\n	<li><a class="social__action social-icon-wrapper" href="https://plus.google.com/share?url=http%3A%2F%2Fgu.com%2Fp%2F49jne%2Fsgp&amp;amp;hl=en-GB&amp;amp;wwc=1" style="color: rgb(0, 86, 137); cursor: pointer; text-decoration: none; display: inline-block; background: transparent;" target="_blank" title="Google plus">Share on Google+</a></li>\r\n</ul>\r\n</div>\r\n\r\n<div class="meta__numbers modern-visible" style="border-top-width: 0.0625rem; border-top-style: dotted; border-top-color: rgb(223, 223, 223); height: 2.25rem; padding: 0.375rem 0px; border-bottom-width: 0.0625rem; border-bottom-style: dotted; border-bottom-color: rgb(223, 223, 223);">\r\n<div class="meta__number js-sharecount" style="height: 36px; float: left; padding-right: 0.6875rem;" title="Facebook: 18 \r\nTwitter: 33">\r\n<h3>Shares</h3>\r\n\r\n<div class="sharecount__value sharecount__value--full" style="font-family: \'Guardian Egyptian Web\', \'Guardian Text Egyptian Web\', Georgia, serif; font-size: 1.125rem;">51</div>\r\n</div>\r\n\r\n<div class="u-h meta__number" style="border-left-width: 0.0625rem; border-left-style: solid; border-left-color: rgb(241, 241, 241); height: 1px; padding-right: 0px; padding-left: 0.625rem; float: left; border-top-width: 0px !important; border-right-width: 0px !important; border-bottom-width: 0px !important; clip: rect(0px 0px 0px 0px) !important; margin: -0.0625rem !important; overflow: hidden !important; padding-top: 0px !important; padding-bottom: 0px !important; position: absolute !important; width: 0.0625rem !important;">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="content__article-body from-content-api js-article__body" style="word-wrap: break-word; position: relative;">\r\n<p>A Wikipedia account that was suspended on suspicions that it was being used by the former Conservative party co-chairman&nbsp;<a class="u-underline" href="http://www.theguardian.com/politics/grant-shapps" style="color: rgb(0, 86, 137); cursor: pointer; text-decoration: none !important; border-bottom-width: 0.0625rem; border-bottom-style: solid; border-bottom-color: rgb(220, 220, 220); transition: border-color 0.15s ease-out; -webkit-transition: border-color 0.15s ease-out; background: transparent;">Grant Shapps</a>&nbsp;or &ldquo;someone acting on his behalf&rdquo; was unblocked following a vote by members of the site&rsquo;s &ldquo;high court&rdquo;.</p>\r\n\r\n<p>The online encyclopedia&rsquo;s arbitration committee, comprised of volunteers elected to consider controversial decisions, chose to remove the status of site administrator from Richard Symonds, who had blocked an account belonging to a user known as Contribsx because he thought there was evidence linking it to Shapps.</p>\r\n\r\n<p>In a ruling, the committee said Symonds had an &ldquo;apparent&rdquo; conflict of interest because he was a former Lib Dem supporter, that he had not been able to produce three years of records detailing previous investigations and had supplied information to the Guardian which &ldquo;gave the appearance of exert[ing] political or social control&rdquo;.</p>\r\n\r\n<p>A few hours after the vote, another&nbsp;<a class="u-underline" href="http://www.theguardian.com/technology/wikipedia" style="color: rgb(0, 86, 137); cursor: pointer; text-decoration: none !important; border-bottom-width: 0.0625rem; border-bottom-style: solid; border-bottom-color: rgb(220, 220, 220); transition: border-color 0.15s ease-out; -webkit-transition: border-color 0.15s ease-out; background: transparent;">Wikipedia</a>&nbsp;administrator moved to reverse Symonds&rsquo;s decision to block the user Contribsx.</p>\r\n\r\n<p>Wikipedia&rsquo;s arbitration committee decided that there was no &ldquo;definitive&rdquo; evidence that linked the user to Shapps and criticised Symonds for not running his decision past colleagues, who are all volunteers, before blocking the account.</p>\r\n\r\n<p>At the time of&nbsp;<a class="u-underline" href="http://www.theguardian.com/politics/2015/apr/21/grant-shapps-accused-of-editing-wikipedia-pages-of-tory-rivals" style="color: rgb(0, 86, 137); cursor: pointer; text-decoration: none !important; border-bottom-width: 0.0625rem; border-bottom-style: solid; border-bottom-color: rgb(220, 220, 220); transition: border-color 0.15s ease-out; -webkit-transition: border-color 0.15s ease-out; background: transparent;">making of the decision</a>&nbsp;in April, Symonds said that &ldquo;<a class="u-underline" href="http://www.theguardian.com/technology/2015/apr/23/interview-richard-symonds-wikipedia-administrator-blocked-account-linked-to-shapps" style="color: rgb(0, 86, 137); cursor: pointer; text-decoration: none !important; border-bottom-width: 0.0625rem; border-bottom-style: solid; border-bottom-color: rgb(220, 220, 220); transition: border-color 0.15s ease-out; -webkit-transition: border-color 0.15s ease-out; background: transparent;">there&rsquo;s no smoking gun</a>, just a wealth of other evidence that really points in [Shapps&rsquo;s] general direction&rdquo;. Shapps had strenuously denied the allegations, saying they were &ldquo;false and defamatory&rdquo;.</p>\r\n\r\n<p>Symonds&rsquo;s decision to investigate Contribsx was sparked by the Guardian, which had approached Wikipedia to point out that Shapps&rsquo;s page on the site appeared to have had critical comments removed. Other users had also asked whether this was not the result of &ldquo;sock puppetry&rdquo; &ndash; editing under a fake online identity &ndash; by the party co-chairman.</p>\r\n\r\n<p>The Guardian had first approached the website&rsquo;s administrators on 2 April and Symonds said he had &ldquo;decided to look into the edits independently of the newspaper ... I asked them for any evidence they had uncovered themselves and were able to share with me&rdquo;.</p>\r\n\r\n<p>The high-profile nature of the news saw Wikipedia&rsquo;s founder Jimmy Wales briefly drawn into the fray, giving discreet support to Symonds but also reassuring critics that the decision did not represent the site&rsquo;s &ldquo;corporate view&rdquo;.</p>\r\n\r\n<p>The committee singled out Symonds&rsquo;s contact with the Guardian saying that this could be viewed as favouritism. &ldquo;The email sent to The Guardian was not appropriate as it provided not yet public information in Wikipedia&rsquo;s voice to a third party ... [We do] not believe that there was a significant violation of policy through this action but that it creates an appearance of favouritism.&rdquo;</p>\r\n\r\n<p>The identity of Contribsx remains unknown. The user has not reappeared on any part of Wikipedia.</p>\r\n\r\n<p>In an emailed statement, Symonds said: &ldquo;I am happy to see that the committee found no evidence of foul play or political activism on my part, and I am glad to see that they were confident enough with my evidence to not overturn the block I made on Contribsx themselves, even though others might. I understand that they had concerns and had to review my actions, but my losing a few extra buttons is not the end of the world.&rdquo;</p>\r\n\r\n<p>Ahead of the final vote by the committee, Shapps told his local newspaper, published on Tuesday: &ldquo;Wikipedia&rsquo;s investigation has resulted in the strong disciplinary action now being taken. However, the failure of various media outlets to check even basic facts meant that this false and damaging story ran for an entire day during the general election campaign.&rdquo;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', '<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial"><strong>1. MOS l&agrave; g&igrave;????</strong></span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial"><strong>MOS: Microsoft Office&nbsp; Specialist</strong>&nbsp;&nbsp;l&agrave; b&agrave;i thi đ&aacute;nh gi&aacute; kỹ năng tin học văn ph&ograve;ng được sử dụng rộng r&atilde;i nhất tr&ecirc;n thế giới với hơn 1 triệu b&agrave;i thi được tổ chức h&agrave;ng năm.</span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial">B&agrave;i thi MOS được s&aacute;ng tạo bởi Microsoft&nbsp; v&agrave; triển khai bởi Certiport (Hoa Kỳ). B&agrave;i thi được thực hiện hiện trực tuyến, với hơn 25 ng&ocirc;n ngữ được x&acirc;y dựng v&agrave; được được Việt h&oacute;a b&agrave;i thi, gi&aacute;o tr&igrave;nh đ&atilde; được IIG Việt Nam bi&ecirc;n soạn dựa tr&ecirc;n thực tế tại Việt Nam.</span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial">MOS l&agrave; chứng chỉ duy nhất x&aacute;c nhận kỹ năng sử dụng phần mềm tin học văn ph&ograve;ng Microsoft Office v&agrave; do Microsoft trực tiếp cấp chứng chỉ.</span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial">C&aacute;c cấp độ của chứng chỉ MOS</span></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:small"><span style="font-family:arial">&nbsp;Specialist: Chứng nhận kỹ năng cơ bản trong c&aacute;c sản phẩm Microsoft Office: Word, Excel, PowerPoint, Access, Outlook.</span></span></li>\r\n	<li><span style="font-size:small"><span style="font-family:arial">&nbsp;Expert: Chứng nhận kỹ năng cao cấp trong Microsoft Word v&agrave; Microsoft Excel.</span></span></li>\r\n	<li><span style="font-size:small"><span style="font-family:arial">&nbsp;Master: &nbsp;Chứng nhận kỹ năng tổng thể to&agrave;n diện cao cấp nhất trong sử dụng Microsoft Office. Y&ecirc;u cầu 4 b&agrave;i thi: Word Expert, Excel Expert, PowerPoint v&agrave; một trong 2 b&agrave;i thi: Outlook hoặc Access.</span></span></li>\r\n</ul>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial">&nbsp;<br />\r\n<strong>2. Thời gian l&agrave;m b&agrave;i thi</strong><br />\r\nMỗi b&agrave;i thi 50 ph&uacute;t</span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial"><strong>3. Nội dung c&aacute;c b&agrave;i thi</strong></span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial">Chứng chỉ MOS do Microsoft ch&iacute;nh thức cấp cho c&aacute;c chương tr&igrave;nh tr&igrave;nh ứng dụng tin học văn ph&ograve;ng bao gồm</span></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:small"><span style="font-family:arial">C&aacute;c b&agrave;i thi MOS 2007: Word&reg; 2007, Excel&reg; 2007, PowerPoint&reg; 2007, Outlook&reg; 2007, Access&reg; 2007, Word 2007 Expert, Excel&reg; 2007 Expert</span></span></li>\r\n	<li><span style="font-size:small"><span style="font-family:arial">C&aacute;c b&agrave;i thi MOS 2010: Word&reg;2010, 2010, PowerPoint&reg; 2010, Access&reg; 2010, Outlook&reg; 2010, SharePoint&reg; 2010, Word 2010 Expert, Excel&reg; 2010 Expert</span></span></li>\r\n</ul>\r\n\r\n<p style="text-align:center"><span style="font-size:small"><span style="font-family:arial">&nbsp;<img alt="" src="http://localhost/annhau/images/uploads/upl150613092215.png" style="height:200px; width:200px" /></span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial"><strong>4. Lợi &iacute;ch của b&agrave;i thi MOS</strong></span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial">Được c&ocirc;ng nhận rộng r&atilde;i tr&ecirc;n thế giới, chứng chỉ MOS gi&uacute;p bạn chứng tỏ được năng lực một c&aacute;ch dễ d&agrave;ng. Cho d&ugrave; bạn đang t&igrave;m kiếm một c&ocirc;ng việc, một cơ hội thăng tiến trong sự nghiệp hay theo đuổi một mục ti&ecirc;u học tập, MOS l&agrave; c&ocirc;ng cụ hữu hiệu để bạn khẳng định bản th&acirc;n v&agrave; tiến xa hơn trong m&ocirc;i trường học tập v&agrave; l&agrave;m việc cạnh tranh.&nbsp;</span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial"><strong>*Đối với người t&igrave;m việc</strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:small"><span style="font-family:arial">MOS gi&uacute;p bạn nổi bật để gi&agrave;nh được c&ocirc;ng việc m&agrave; bạn mong muốn. Một nghi&ecirc;n cứu cho thấy c&aacute;c ứng vi&ecirc;n c&oacute; chứng chỉ MOS kh&ocirc;ng những t&igrave;m được c&ocirc;ng việc nhanh hơn m&agrave; thu nhập của họ cũng cao hơn khoảng 12% so với những người kh&ocirc;ng c&oacute; chứng chỉ n&agrave;y</span></span></li>\r\n	<li><span style="font-size:small"><span style="font-family:arial">MOS l&agrave; chứng nhận r&otilde; r&agrave;ng nhất cho việc bạn đ&atilde; được đ&agrave;o tạo th&agrave;nh thạo về chương tr&igrave;nh tin học văn ph&ograve;ng của Microsoft.</span></span></li>\r\n	<li><span style="font-size:small"><span style="font-family:arial">Đối với những người đang t&igrave;m kiếm cơ hội thăng tiến</span></span></li>\r\n	<li><span style="font-size:small"><span style="font-family:arial">Tăng mức lương k&igrave; vọng. Nghi&ecirc;n cứu cho thấy 82% số người sở hữu MOS đạt được mức lương cao hơn so với trước khi c&oacute; chứng chỉ n&agrave;y.</span></span></li>\r\n	<li><span style="font-size:small"><span style="font-family:arial">Khẳng định vị thế ti&ecirc;n phong trong c&ocirc;ng ty như một chuy&ecirc;n gia tin học văn ph&ograve;ng.</span></span></li>\r\n	<li><span style="font-size:small"><span style="font-family:arial">Mang lại nhiều cơ hội nghề nghiệp. 88% c&aacute;c nh&agrave; quản l&yacute; cho rằng những nh&acirc;n vi&ecirc;n sở hữu chứng chỉ MOS sẽ c&oacute; lợi thế hơn trong việc tuyển dụng v&agrave; đề bạt, điều n&agrave;y cũng đồng nghĩa với sự gia tăng của mức lương v&agrave; sự t&ocirc;n trọng từ ph&iacute;a c&aacute;c đồng nghiệp kh&aacute;c.</span></span></li>\r\n</ul>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial"><strong>*Đối với sinh vi&ecirc;n</strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:small"><span style="font-family:arial">MOS l&agrave; chứng chỉ đ&aacute;nh gi&aacute; kỹ năng nghệ nghiệp được c&ocirc;ng nhận tr&ecirc;n to&agrave;n cầu</span></span></li>\r\n	<li><span style="font-size:small"><span style="font-family:arial">Chứng minh được năng lực sử dụng m&aacute;y t&iacute;nh đặc biệt trong mội trường l&agrave;m việc</span></span></li>\r\n</ul>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial"><strong>5. Thời hạn</strong>&nbsp;</span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial">Chứng chỉ MOS c&oacute; gi&aacute; trị v&ocirc; thời hạn ( gi&aacute; trị trọn đời)</span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial"><strong>6. Chứng chỉ</strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:small"><span style="font-family:arial">Th&iacute; sinh ho&agrave;n th&agrave;nh b&agrave;i thi n&agrave;o sẽ c&oacute; chứng chỉ của b&agrave;i thi đ&oacute; (Specialist)</span></span></li>\r\n</ul>\r\n\r\n<p><span style="font-size:small"><span style="font-family:arial"><img alt="" src="http://www.iigvietnam.com/userfiles/image/cac%20san%20pham/Noi%20dung.png" style="border:0px none; display:block; height:166px; margin:0px auto; padding:0px; width:440px" /></span></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:small"><span style="font-family:arial">&nbsp;Ngay sau khi ho&agrave;n th&agrave;nh b&agrave;i thi, th&iacute; sinh sẽ biết điểm v&agrave; c&oacute; thể tải về chứng chỉ online tr&ecirc;n website:</span></span><span style="color:rgb(0, 0, 255)"><a href="http://www.certiport.com/" style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); text-decoration: none;"><span style="color:rgb(0, 0, 255); font-size:small"><span style="font-family:arial">www.certiport.com</span></span></a></span><span style="font-size:small"><span style="font-family:arial">&nbsp;c&oacute; m&atilde; x&aacute;c nhận.</span></span></li>\r\n	<li><span style="font-size:small"><span style="font-family:arial">Mẫu chứng chỉ tham khảo</span></span></li>\r\n</ul>\r\n\r\n<p><span style="font-size:small"><span style="font-family:arial"><img src="http://www.iigvietnam.com/images/anh/MOS%20Certi.jpg" style="border:0px none; display:block; margin:0px auto; padding:0px; width:550px" /></span></span></p>\r\n\r\n<p><span style="font-size:small"><span style="font-family:arial"><strong>7. Lịch thi MOS tại c&aacute;c Văn ph&ograve;ng IIG Việt Nam:</strong></span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small">- Tại H&agrave; Nội: 14h chiều thứ 5 h&agrave;ng tuần</span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small">- Tại Đ&agrave; Nẵng: 14h chiều thứ 5 h&agrave;ng tuần</span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small">- Tại TP. Hồ Ch&iacute; Minh:&nbsp;14h chiều thứ 5 h&agrave;ng tuần</span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial"><strong>8. Hướng dẫn dự thi MOS</strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:small"><span style="font-family:arial">Vui l&ograve;ng tải về hướng dẫn dự thi MOS tại</span></span><span style="color:rgb(0, 0, 255)"><a href="http://www.iigvietnam.com/Uploads/Download/HDDT_MOS.pdf" style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); text-decoration: none;"><span style="color:rgb(0, 0, 255); font-size:small"><span style="font-family:arial">&nbsp;đ&acirc;y</span></span></a></span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n', 'mo ta', 'description');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;


-- Dumping structure for table fur.subcategories
CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(50) NOT NULL,
  `name_vi` varchar(50) NOT NULL,
  `category` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table fur.subcategories: ~6 rows (approximately)
/*!40000 ALTER TABLE `subcategories` DISABLE KEYS */;
INSERT INTO `subcategories` (`id`, `name_en`, `name_vi`, `category`, `created`, `modified`, `deleted`) VALUES
	(1, 'Beds', 'Giường', 1, '0000-00-00 00:00:00', '2015-06-11 18:45:39', 0),
	(2, 'Dressers', 'Bàn trang điểm', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(3, 'Bedroom Sets', 'Bộ phòng ngủ', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(4, 'TV Stands', 'Chân TV', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(5, 'Leather Furniture', 'Đồ da', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(6, 'new sub', 'Ten moi', 4, '2015-06-13 10:12:31', '2015-06-13 10:18:36', 1);
/*!40000 ALTER TABLE `subcategories` ENABLE KEYS */;


-- Dumping structure for table fur.uploads
CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(20) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
