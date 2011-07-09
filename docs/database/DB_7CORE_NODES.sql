SET client_encoding = 'UNICODE';
BEGIN;

INSERT INTO common_node VALUES (1, 'Main site pages', 'container', NULL, 0, 0, 10, NULL, 'N;', '', '', NULL, '', '', '2006-09-29 18:20:29', '2006-09-30 09:56:48', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (4, 'Further info pages (footer)', 'container', NULL, 0, 0, 5, NULL, 'N;', '', '', NULL, '', '', '2006-09-30 09:56:36', '2006-09-30 09:56:59', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (2, 'Ecommerce pages', 'container', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 09:55:17', '2006-09-30 09:55:17', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (3, 'Special', 'container', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 09:55:36', '2006-09-30 09:55:36', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (5, 'Home', 'page', 'default', 1, 0, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 10:02:51', '2006-09-30 10:02:51', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (6, 'Basket', 'page', 'commerce', 2, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 10:34:35', '2006-09-30 10:34:35', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (7, 'Checkout', 'page', 'commerce', 2, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 10:34:54', '2006-09-30 10:34:54', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (8, 'Login', 'page', 'commerce', 2, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 10:35:02', '2006-09-30 10:35:02', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (9, 'Password reset', 'page', 'commerce', 2, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 10:35:15', '2006-09-30 10:35:15', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (10, 'Payment', 'page', 'commerce', 2, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 10:35:29', '2006-09-30 10:35:29', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (11, 'Payment failure', 'page', 'commerce', 2, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 10:35:43', '2006-09-30 10:35:43', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (12, 'Payment success', 'page', 'commerce', 2, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 10:35:59', '2006-09-30 10:35:59', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (13, 'Registration', 'page', 'commerce', 2, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 10:36:09', '2006-09-30 10:36:09', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (14, '404', 'page', 'default', 3, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 11:56:37', '2006-09-30 11:56:37', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (15, 'My Account', 'page', 'commerce', 2, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 12:02:53', '2006-09-30 12:02:53', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (16, 'Address Management', 'page', 'commerce', 15, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 12:03:13', '2006-09-30 12:03:13', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (17, 'Orders', 'page', 'commerce', 15, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 12:03:28', '2006-09-30 12:03:28', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (18, 'Personal Details', 'page', 'commerce', 15, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 12:03:45', '2006-09-30 12:03:45', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (19, 'Order detail', 'page', 'commerce', 17, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 12:04:12', '2006-09-30 12:04:12', 1, 'no_menu', 1000, NULL);
INSERT INTO common_node VALUES (20, 'Contact', 'page', 'default', 4, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 12:07:59', '2006-09-30 12:07:59', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (21, 'Search', 'page', 'default', 4, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 12:08:07', '2006-09-30 12:08:07', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (22, 'Sitemap', 'page', 'default', 4, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 12:08:21', '2006-09-30 12:08:21', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (23, 'About Us', 'page', 'default', 4, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 12:09:30', '2006-09-30 12:09:30', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (25, 'Privacy Policy', 'page', 'default', 4, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 13:40:37', '2006-09-30 13:40:37', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (26, 'Terms & Conditions', 'page', 'default', 4, 0, 0, '', 'N;', '', '', '', '', '', '2006-09-30 13:40:50', '2006-09-30 13:41:20', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (27, 'Edit your title here', 'layout', '1column', 20, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 13:56:08', '2006-09-30 13:56:08', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (30, 'Edit your title here', 'layout', '1column', 8, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 13:59:39', '2006-09-30 13:59:39', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (31, 'Edit your title here', 'content', 'RTE', 30, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 13:59:44', '2006-09-30 13:59:44', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (32, 'Login Component', 'content', 'component', 30, 1, 0, NULL, 'a:3:{s:8:"template";s:20:"ecommerce/login.html";s:10:"controller";s:0:"";s:9:"parameter";s:0:"";}', '', '', NULL, '', '', '2006-09-30 14:00:05', '2006-09-30 14:00:18', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (33, 'Edit your title here', 'content', 'RTE', 30, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 14:01:24', '2006-09-30 14:01:24', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (34, 'Registration Begin', 'content', 'component', 30, 1, 0, NULL, 'a:3:{s:8:"template";s:33:"ecommerce/registration_start.html";s:10:"controller";s:0:"";s:9:"parameter";s:0:"";}', '', '', NULL, '', '', '2006-09-30 14:01:50', '2006-09-30 14:02:10', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (35, 'Edit your title here', 'layout', '1column', 13, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 14:26:02', '2006-09-30 14:26:02', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (36, 'Registration component', 'content', 'component', 35, 1, 0, NULL, 'a:3:{s:8:"template";s:27:"ecommerce/registration.html";s:10:"controller";s:0:"";s:9:"parameter";s:0:"";}', '', '', NULL, '', '', '2006-09-30 14:26:09', '2006-09-30 14:26:32', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (37, 'Edit your title here', 'layout', '1column', 7, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 14:38:44', '2006-09-30 14:38:44', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (38, 'Edit your title here', 'content', 'RTE', 37, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 14:44:04', '2006-09-30 14:44:04', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (39, 'Checkout Basket', 'content', 'component', 37, 1, 0, NULL, 'a:3:{s:8:"template";s:30:"ecommerce/checkout_basket.html";s:10:"controller";s:0:"";s:9:"parameter";s:0:"";}', '', '', NULL, '', '', '2006-09-30 14:44:34', '2006-09-30 14:44:46', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (41, 'Checkout', 'content', 'component', 37, 1, 0, NULL, 'a:3:{s:8:"template";s:23:"ecommerce/checkout.html";s:10:"controller";s:0:"";s:9:"parameter";s:0:"";}', '', '', NULL, '', '', '2006-09-30 14:47:01', '2006-09-30 14:47:12', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (40, 'Edit your title here', 'content', 'RTE', 37, 1, 0, NULL, '<p></p>', '', '', NULL, '', '', '2006-09-30 14:46:36', '2006-09-30 14:53:26', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (42, 'Address component', 'content', 'component', 7, 1, 0, NULL, 'a:3:{s:8:"template";s:22:"ecommerce/address.html";s:10:"controller";s:0:"";s:9:"parameter";s:0:"";}', '', '', NULL, '', '', '2006-09-30 14:54:43', '2006-09-30 14:54:53', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (43, 'Edit your title here', 'layout', '1column', 16, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 15:19:48', '2006-09-30 15:19:48', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (44, 'Edit your title here', 'content', 'RTE', 43, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 15:19:51', '2006-09-30 15:19:51', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (45, 'Address Management Component', 'content', 'component', 43, 1, 0, NULL, 'a:3:{s:8:"template";s:27:"ecommerce/address_edit.html";s:10:"controller";s:0:"";s:9:"parameter";s:0:"";}', '', '', NULL, '', '', '2006-09-30 15:20:05', '2006-09-30 15:20:17', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (46, 'Edit your title here', 'layout', '1column', 17, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 15:21:01', '2006-09-30 15:21:01', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (47, 'Edit your title here', 'content', 'RTE', 46, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 15:21:05', '2006-09-30 15:21:05', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (48, 'Orders component', 'content', 'component', 46, 1, 0, NULL, 'a:3:{s:8:"template";s:21:"ecommerce/orders.html";s:10:"controller";s:0:"";s:9:"parameter";s:0:"";}', '', '', NULL, '', '', '2006-09-30 15:21:35', '2006-09-30 15:21:46', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (49, 'Edit your title here', 'layout', '1column', 19, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 15:22:32', '2006-09-30 15:22:32', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (50, 'Edit your title here', 'content', 'RTE', 49, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 15:22:36', '2006-09-30 15:22:36', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (51, 'Order detail component', 'content', 'component', 49, 1, 0, NULL, 'a:3:{s:8:"template";s:27:"ecommerce/order_detail.html";s:10:"controller";s:0:"";s:9:"parameter";s:0:"";}', '', '', NULL, '', '', '2006-09-30 15:22:49', '2006-09-30 15:22:59', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (52, 'Edit your title here', 'layout', '1column', 18, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 15:25:00', '2006-09-30 15:25:00', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (53, 'Edit your title here', 'content', 'RTE', 52, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 15:25:05', '2006-09-30 15:25:05', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (54, 'User pref component', 'content', 'component', 52, 1, 0, NULL, 'a:3:{s:8:"template";s:25:"ecommerce/user_prefs.html";s:10:"controller";s:0:"";s:9:"parameter";s:0:"";}', '', '', NULL, '', '', '2006-09-30 15:25:21', '2006-09-30 15:25:33', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (55, 'Edit your title here', 'layout', '1column', 9, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 15:30:11', '2006-09-30 15:30:11', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (56, 'Edit your title here', 'content', 'RTE', 55, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 15:30:19', '2006-09-30 15:30:19', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (57, 'Password reset component', 'content', 'component', 55, 1, 0, NULL, 'a:3:{s:8:"template";s:29:"ecommerce/password_reset.html";s:10:"controller";s:0:"";s:9:"parameter";s:0:"";}', '', '', NULL, '', '', '2006-09-30 15:30:31', '2006-09-30 15:31:00', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (58, 'Edit your title here', 'layout', '1column', 10, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 15:32:15', '2006-09-30 15:32:15', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (59, 'Edit your title here', 'content', 'RTE', 58, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 15:32:20', '2006-09-30 15:32:20', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (60, 'Edit your title here', 'content', 'component', 58, 1, 0, NULL, 'a:3:{s:8:"template";s:22:"ecommerce/payment.html";s:10:"controller";s:0:"";s:9:"parameter";s:0:"";}', '', '', NULL, '', '', '2006-09-30 15:32:26', '2006-09-30 15:32:36', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (61, 'Edit your title here', 'layout', '1column', 11, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 15:41:41', '2006-09-30 15:41:41', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (62, 'Edit your title here', 'content', 'RTE', 61, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 15:41:48', '2006-09-30 15:41:48', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (63, 'Payment failure component', 'content', 'component', 61, 1, 0, NULL, 'a:3:{s:8:"template";s:30:"ecommerce/payment_failure.html";s:10:"controller";s:0:"";s:9:"parameter";s:0:"";}', '', '', NULL, '', '', '2006-09-30 15:42:05', '2006-09-30 15:42:14', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (64, 'Edit your title here', 'layout', '1column', 12, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 15:43:41', '2006-09-30 15:43:41', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (65, 'Edit your title here', 'content', 'RTE', 64, 1, 0, NULL, ' 	<p>Process executed without error and the transaction was successfully Authorised.&nbsp;</p>	', '', '', NULL, '', '', '2006-09-30 15:43:50', '2006-09-30 15:44:03', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (66, 'Payment success component', 'content', 'component', 64, 1, 0, NULL, 'a:3:{s:8:"template";s:30:"ecommerce/payment_success.html";s:10:"controller";s:0:"";s:9:"parameter";s:0:"";}', '', '', NULL, '', '', '2006-09-30 15:44:42', '2006-09-30 15:44:51', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (67, 'Edit your title here', 'layout', '1column', 21, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 15:48:28', '2006-09-30 15:48:28', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (68, 'Search input', 'content', 'component', 67, 1, 0, NULL, 'a:3:{s:8:"template";s:14:"searchbox.html";s:10:"controller";s:0:"";s:9:"parameter";s:0:"";}', '', '', NULL, '', '', '2006-09-30 15:48:45', '2006-09-30 15:49:11', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (69, 'Search nodes', 'content', 'component', 67, 1, 0, NULL, 'a:3:{s:8:"template";s:17:"search_nodes.html";s:10:"controller";s:0:"";s:9:"parameter";s:0:"";}', '', '', NULL, '', '', '2006-09-30 15:49:27', '2006-09-30 15:49:36', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (70, 'Edit your title here', 'layout', '1column', 22, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 15:49:57', '2006-09-30 15:49:57', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (71, 'Edit your title here', 'content', 'RTE', 70, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 15:50:10', '2006-09-30 15:50:10', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (72, 'Sitemap component', 'content', 'component', 70, 1, 0, NULL, 'a:3:{s:8:"template";s:12:"sitemap.html";s:10:"controller";s:0:"";s:9:"parameter";s:0:"";}', '', '', NULL, '', '', '2006-09-30 15:50:21', '2006-09-30 15:50:31', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (73, 'Edit your title here', 'layout', '1column', 6, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 15:52:11', '2006-09-30 15:52:11', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (74, 'Edit your title here', 'content', 'RTE', 73, 1, 0, NULL, ' 	<p>You have the following items in your basket.&nbsp;</p>	', '', '', NULL, '', '', '2006-09-30 15:52:54', '2006-09-30 15:53:44', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (75, 'Basket edit component', 'content', 'component', 73, 1, 0, NULL, 'a:3:{s:8:"template";s:26:"ecommerce/basket_edit.html";s:10:"controller";s:0:"";s:9:"parameter";s:0:"";}', '', '', NULL, '', '', '2006-09-30 15:54:35', '2006-09-30 15:54:46', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (28, 'Edit your title here', 'content', 'RTE', 27, 1, 0, NULL, ' 	 	<p>We are located on the planet Earth<br /></p> 	', '', '', NULL, '', '', '2006-09-30 13:56:14', '2006-09-30 15:55:58', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (76, 'Contact Us', 'content', 'contact_form', 27, 1, 0, NULL, 'a:4:{s:7:"mail_to";s:0:"";s:11:"mail_toname";s:0:"";s:15:"layout_template";s:6:"common";s:4:"text";s:31:"Thanks for your feedback.<br />";}', '', '', NULL, '', '', '2006-09-30 16:00:21', '2006-09-30 16:03:07', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (77, 'Edit your title here', 'layout', '1column', 14, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 16:33:28', '2006-09-30 16:33:28', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (78, 'Edit your title here', 'content', 'RTE', 77, 1, 0, NULL, ' 	 	<p><strong>We have recently restructured this website, you might find what you are looking for by going via the <a href="/">home page</a>.</strong></p> <p><strong>If you believe you have found a broken link please <a href="/page/20">let us know</a>.</strong></p> <div class="line"><hr /></div> <p><strong>Please try the following:</strong></p> <ul> <li>If you typed the page address in the Address bar, make sure that it is spelled correctly.<br /> </li> <li>Click the <a href="javascript:history.go(-1)">Back</a> button to try another link. </li> </ul> <p>HTTP 404 : Page not found</p> 	', '', '', NULL, '', '', '2006-09-30 16:37:05', '2006-09-30 16:43:12', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (79, '404 component', 'content', 'component', 77, 1, 10, NULL, 'a:3:{s:8:"template";s:13:"../blank.html";s:10:"controller";s:14:"../sys/404.php";s:9:"parameter";s:0:"";}', '', '', NULL, '', '', '2006-09-30 16:39:13', '2006-09-30 16:44:55', 1, 'itself', 1000, '');
INSERT INTO common_node VALUES (80, 'Returns policy', 'page', 'default', 4, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 12:07:59', '2006-09-30 12:07:59', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (83, 'Blog page', 'page', 'default', 4, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 12:07:59', '2006-09-30 12:07:59', 1, '', 1000, NULL);

INSERT INTO common_node VALUES (84, 'Articles', 'page', 'default', 3, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 12:07:59', '2006-09-30 12:07:59', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (85, 'Content bits', 'container', 'default', 3, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 12:07:59', '2006-09-30 12:07:59', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (86, 'Edit your title here', 'content', 'RTE', 85, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 15:50:10', '2006-09-30 15:50:10', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (87, 'Edit your title here', 'content', 'RTE', 85, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-30 15:50:10', '2006-09-30 15:50:10', 1, '', 1000, NULL);
INSERT INTO common_node VALUES (88, 'Global Navigation', 'container', 'default', 0, 0, 0, '', NULL, '', '', '', '', NULL, '2009-08-16 13:05:12', '2009-08-16 13:06:13', 1, '', 1000, NULL);

SELECT pg_catalog.setval('common_node_id_seq', 1000, true);




INSERT INTO common_uri_mapping VALUES (1, 5, '/home', 'generic');
INSERT INTO common_uri_mapping VALUES (2, 6, '/basket', 'generic');
INSERT INTO common_uri_mapping VALUES (3, 7, '/checkout', 'generic');
INSERT INTO common_uri_mapping VALUES (4, 8, '/login', 'generic');
INSERT INTO common_uri_mapping VALUES (5, 9, '/password-reset', 'generic');
INSERT INTO common_uri_mapping VALUES (6, 10, '/payment', 'generic');
INSERT INTO common_uri_mapping VALUES (7, 11, '/payment-failure', 'generic');
INSERT INTO common_uri_mapping VALUES (8, 12, '/payment-success', 'generic');
INSERT INTO common_uri_mapping VALUES (9, 13, '/registration', 'generic');
INSERT INTO common_uri_mapping VALUES (10, 14, '/404', 'generic');
INSERT INTO common_uri_mapping VALUES (11, 15, '/my-account', 'generic');
INSERT INTO common_uri_mapping VALUES (12, 16, '/my-account/address-management', 'generic');
INSERT INTO common_uri_mapping VALUES (13, 17, '/my-account/orders', 'generic');
INSERT INTO common_uri_mapping VALUES (14, 18, '/my-account/personal-details', 'generic');
INSERT INTO common_uri_mapping VALUES (15, 19, '/my-account/orders/order-detail', 'generic');
INSERT INTO common_uri_mapping VALUES (16, 20, '/contact', 'generic');
INSERT INTO common_uri_mapping VALUES (17, 21, '/search', 'generic');
INSERT INTO common_uri_mapping VALUES (18, 22, '/sitemap', 'generic');
INSERT INTO common_uri_mapping VALUES (19, 23, '/about-us', 'generic');
INSERT INTO common_uri_mapping VALUES (20, 25, '/privacy-policy', 'generic');
INSERT INTO common_uri_mapping VALUES (21, 26, '/terms-and-conditions', 'generic');

SELECT pg_catalog.setval('common_uri_mapping_id_seq', (SELECT max(id) FROM common_uri_mapping), true);

COMMIT;
