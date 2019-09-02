CREATE TABLE `admin_menuitems` (
  `menuitem_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `parent_menuitem_id` int(11) DEFAULT NULL,
  `menuitem_target` varchar(100) NOT NULL,
  `menuitem_link` varchar(255) NOT NULL,
  `menuitem_text` varchar(255) NOT NULL,
  `display_order` int(11) NOT NULL,
  `status_ind` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_menuitems`
--

INSERT INTO `admin_menuitems` (`menuitem_id`, `menu_id`, `parent_menuitem_id`, `menuitem_target`, `menuitem_link`, `menuitem_text`, `display_order`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `last_modified_by`) VALUES
(1, 1, NULL, '', '#', 'Admin Users', 1, 1, '2017-04-04 00:00:00', '2017-04-04 13:09:30', 1, 0),
(2, 1, 1, '', 'adminusers', 'Admin Users List', 1, 1, '2017-04-04 00:00:00', '2017-04-04 05:53:56', 1, 0),
(3, 1, 1, '', 'adminusers/add', 'Add Admin Users', 1, 1, '2017-04-04 00:00:00', '2017-04-04 05:53:59', 1, 0),
(4, 1, NULL, '', '#', 'Page', 4, 1, '2016-07-19 00:00:00', '2019-08-16 13:00:21', 1, 1),
(5, 1, 4, '', 'pages/add', 'Create Page', 1, 1, '2016-07-19 00:00:00', '2019-08-16 13:00:28', 1, 1),
(6, 1, 4, '', 'pages', 'Page List', 1, 1, '2016-07-19 00:00:00', '2019-08-16 13:00:30', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_menus`
--

CREATE TABLE `admin_menus` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_ind` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_menus`
--

INSERT INTO `admin_menus` (`menu_id`, `menu_name`, `status_ind`) VALUES
(1, 'Super Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_ind` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive',
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_modified_by` int(11) NOT NULL,
  `admin_disp` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`role_id`, `role_name`, `status_ind`, `created_date`, `modified_date`, `created_by`, `last_modified_by`, `admin_disp`) VALUES
(1, 'Admin', 1, '2014-07-23 16:13:07', '2014-07-23 19:13:07', 1, 1, 1),
(2, 'Customer', 1, '2019-02-23 19:27:23', '2019-02-23 13:57:23', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles_accesses`
--

CREATE TABLE `admin_roles_accesses` (
  `role_id` int(11) NOT NULL,
  `menuitem_id` int(11) NOT NULL,
  `add_permission` int(11) NOT NULL,
  `edit_permission` int(11) NOT NULL,
  `delete_permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_roles_accesses`
--

INSERT INTO `admin_roles_accesses` (`role_id`, `menuitem_id`, `add_permission`, `edit_permission`, `delete_permission`) VALUES
(2, 7, 1, 1, 1),
(2, 8, 1, 1, 1),
(2, 9, 1, 1, 1),
(2, 10, 1, 1, 1),
(2, 12, 1, 1, 1),
(1, 1, 1, 1, 1),
(1, 2, 1, 1, 1),
(1, 3, 1, 1, 1),
(1, 13, 1, 1, 1),
(1, 7, 1, 1, 1),
(1, 8, 1, 1, 1),
(1, 9, 1, 1, 1),
(1, 10, 1, 1, 1),
(1, 12, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `user_id` int(10) NOT NULL,
  `role_id` tinyint(1) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_ind` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Active, 0=Inactive',
  `created_date` datetime DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`user_id`, `role_id`, `username`, `password`, `first_name`, `last_name`, `email`, `status_ind`, `created_date`, `modified_date`, `created_by`, `last_modified_by`) VALUES
(1, 1, 'admin', 'admin', 'Marco', 'Hijacker', 'info@futmarket.it', 1, NULL, '2017-01-19 11:11:34', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users_accesses`
--

CREATE TABLE `admin_users_accesses` (
  `user_id` int(11) NOT NULL,
  `menuitem_id` int(11) NOT NULL,
  `add_permission` int(11) NOT NULL,
  `edit_permission` int(11) NOT NULL,
  `delete_permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users_accesses`
--

INSERT INTO `admin_users_accesses` (`user_id`, `menuitem_id`, `add_permission`, `edit_permission`, `delete_permission`) VALUES
(14, 7, 1, 1, 1),
(14, 8, 1, 1, 1),
(14, 9, 1, 1, 1),
(14, 10, 1, 1, 1),
(14, 12, 1, 1, 1),
(1, 1, 0, 0, 0),
(1, 2, 0, 0, 0),
(1, 3, 0, 0, 0),
(1, 4, 0, 0, 0),
(1, 5, 0, 0, 0),
(1, 6, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `template_id` int(11) NOT NULL,
  `template_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `template_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status_ind` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Active, 0=Inactive',
  `created_date` datetime NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_template_setup`
--

CREATE TABLE `email_template_setup` (
  `template_id` int(5) DEFAULT NULL,
  `template_name` varchar(100) DEFAULT NULL,
  `template_type` char(1) NOT NULL DEFAULT 'S',
  `status_ind` tinyint(1) DEFAULT '1',
  `created_date` datetime DEFAULT NULL,
  `last_modified_date` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `last_modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_template_variables`
--

CREATE TABLE `email_template_variables` (
  `variable_id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `variable_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `variable_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_ind` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_template_variables`
--

INSERT INTO `email_template_variables` (`variable_id`, `template_id`, `variable_text`, `variable_name`, `status_ind`) VALUES
(1, 1, 'FIRST NAME', '##FIRSTNAME##', 1),
(2, 1, 'LAST NAME', '##LASTNAME##', 1),
(3, 1, 'EMAIL', '##EMAIL##', 1),
(4, 1, 'SALUTATION', '##SALUTATION##', 1),
(5, 1, 'ADDRESS', '##ADDRESS##', 1),
(6, 1, 'POSTAL CODE', '##PINCODE##', 1),
(7, 1, 'COUNTRY NAME', '##COUNTRY##', 1),
(8, 1, 'STATE/PROVINCE', '##STATE##', 1),
(9, 1, 'CITY', '##CITY##', 1),
(10, 1, 'FORM URL', '##FORMURL##', 1),
(11, 1, 'CONFIRMATION CODE', '##CONFIRMATIONCODE##', 1),
(21, 2, 'FIRST NAME', '##FIRSTNAME##', 1),
(22, 2, 'LAST NAME', '##LASTNAME##', 1),
(23, 2, 'EMAIL', '##EMAIL##', 1),
(24, 2, 'SALUTATION', '##SALUTATION##', 1),
(25, 2, 'ADDRESS', '##ADDRESS##', 1),
(26, 2, 'POSTAL CODE', '##PINCODE##', 1),
(27, 2, 'COUNTRY NAME', '##COUNTRY##', 1),
(28, 2, 'STATE/PROVINCE', '##STATE##', 1),
(29, 2, 'CITY', '##CITY##', 1),
(30, 3, 'FIRST NAME', '##FIRSTNAME##', 1),
(35, 8, 'FIRST NAME', '##FIRSTNAME##', 1),
(36, 9, 'FIRST NAME', '##FIRSTNAME##', 1),
(37, 10, 'FIRST NAME', '##FIRSTNAME##', 1),
(38, 11, 'FIRST NAME', '##FIRSTNAME##', 1),
(39, 11, 'FORUMOWNER FIRST NAME', '##FORUMOWNERFIRSTNAME##', 1);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `lang_id` int(11) NOT NULL,
  `lang_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `lang_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_ind` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive',
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified_by` int(11) NOT NULL,
  `display_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`lang_id`, `lang_code`, `lang_name`, `status_ind`, `created_date`, `created_by`, `last_modified_date`, `last_modified_by`, `display_order`) VALUES
(1, 'en', 'English', 1, '2014-04-16 20:20:27', 0, '2014-04-16 20:20:27', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_list`
--

CREATE TABLE `menu_list` (
  `menu_id` int(9) NOT NULL,
  `menu_name` varchar(254) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0->inactive , 1-> active',
  `sort_order` int(9) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `menu_url` varchar(23) DEFAULT NULL,
  `seo_keyword` varchar(200) DEFAULT NULL,
  `parent_id` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_list`
--

INSERT INTO `menu_list` (`menu_id`, `menu_name`, `status`, `sort_order`, `image`, `menu_url`, `seo_keyword`, `parent_id`) VALUES
(1, 'Acquista Crediti FIFA 18', '1', 1, '', '', NULL, 0),
(2, 'Vendi Crediti', '1', 3, '', 'sellcoins', NULL, 0),
(3, 'F.A.Q.', '1', 4, '', 'faq', NULL, 0),
(4, 'Affidabilità 100%', '1', 5, '', 'contact-us', NULL, 0),
(5, 'Withdrawal', '1', 8, '', 'withdrawal', NULL, 6),
(6, 'Scommesse', '1', 2, '', 'bet/bet_events', NULL, 0),
(9, 'Come Acquistare', '1', 6, '', 'about-Us', NULL, 0),
(10, 'Buy coins ', '1', 7, '', 'buycoins', NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `menuitem_id` int(11) DEFAULT NULL,
  `page_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_image` varchar(66) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_top_adv_image` varchar(888) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_bottom_image` varchar(66) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_top_adv_type` enum('I','T') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'I',
  `page_bottom_type` enum('I','T') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'I',
  `page_top_advertiser_content` longtext COLLATE utf8_unicode_ci,
  `page_bottom_advertiser_content` longtext COLLATE utf8_unicode_ci,
  `display_image` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `alt_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `page_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keywords` text COLLATE utf8_unicode_ci,
  `other_meta_tags` text COLLATE utf8_unicode_ci,
  `nofollow_ind` tinyint(1) NOT NULL DEFAULT '0',
  `noindex_ind` tinyint(1) DEFAULT '0',
  `canonical_index` tinyint(1) NOT NULL DEFAULT '0',
  `canonical_url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `redirection_link` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status_ind` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Active, 0=Inactive',
  `created_date` datetime NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `menuitem_id`, `page_title`, `page_image`, `page_top_adv_image`, `page_bottom_image`, `page_top_adv_type`, `page_bottom_type`, `page_top_advertiser_content`, `page_bottom_advertiser_content`, `display_image`, `alt_title`, `page_slug`, `page_short_description`, `page_content`, `meta_title`, `meta_description`, `meta_keywords`, `other_meta_tags`, `nofollow_ind`, `noindex_ind`, `canonical_index`, `canonical_url`, `redirection_link`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `last_modified_by`) VALUES
(1, NULL, 'Peroidic table', NULL, NULL, NULL, 'I', 'I', NULL, '', '1', 'Peroidic table', 'peroidictable', 'Peroidic table', '<p>Peroidic table</p>\r\n\r\n<p>Peroidic table</p>\r\n\r\n<p>Peroidic table</p>\r\n\r\n<p>Peroidic table</p>\r\n\r\n<p>Peroidic table</p>\r\n', 'Peroidic table', '<p>Peroidic table</p>\r\n', 'Peroidic table', NULL, 0, 0, 0, '', '', 1, '2014-04-16 20:20:27', '2019-08-16 13:42:45', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menuitems`
--
ALTER TABLE `admin_menuitems`
  ADD PRIMARY KEY (`menuitem_id`);

--
-- Indexes for table `admin_menus`
--
ALTER TABLE `admin_menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `admin_roles_accesses`
--
ALTER TABLE `admin_roles_accesses`
  ADD KEY `admin_roles_accesses_ibfk_1` (`role_id`),
  ADD KEY `admin_roles_accesses_ibfk_2` (`menuitem_id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin_users_accesses`
--
ALTER TABLE `admin_users_accesses`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `menuitem_id` (`menuitem_id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`template_id`);

--
-- Indexes for table `email_template_variables`
--
ALTER TABLE `email_template_variables`
  ADD PRIMARY KEY (`variable_id`),
  ADD KEY `template_id` (`template_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `menu_list`
--
ALTER TABLE `menu_list`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_list`
--
ALTER TABLE `menu_list`
  MODIFY `menu_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
