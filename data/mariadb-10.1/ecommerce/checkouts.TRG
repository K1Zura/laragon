TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER `update_product_contain` AFTER INSERT ON `checkouts` FOR EACH ROW BEGIN\nUPDATE products\n    SET contain = contain - NEW.total\n    WHERE id = NEW.product_id;\nEND'
sql_modes=524288
definers='root@localhost'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_general_ci'
db_cl_names='latin1_swedish_ci'
created=1702831467741058
